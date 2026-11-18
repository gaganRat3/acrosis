<?php
/**
 * Lint every PHP source file in the repository.
 *
 * Usage: php tools/lint.php
 */

declare(strict_types=1);

$root = dirname(__DIR__);
$files = [];

$directory = new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS);
$iterator = new RecursiveIteratorIterator($directory);

foreach ($iterator as $file) {
    if (!$file->isFile() || strtolower($file->getExtension()) !== 'php') {
        continue;
    }

    $relativePath = str_replace('\\', '/', substr($file->getPathname(), strlen($root) + 1));
    if (str_starts_with($relativePath, '.git/') || str_starts_with($relativePath, 'vendor/')) {
        continue;
    }

    $files[] = [$file->getPathname(), $relativePath];
}

usort($files, static fn(array $left, array $right): int => strcmp($left[1], $right[1]));

if ($files === []) {
    fwrite(STDERR, "No PHP files found.\n");
    exit(1);
}

$failed = 0;
foreach ($files as [$path, $relativePath]) {
    $output = [];
    $exitCode = 0;
    exec(
        escapeshellarg(PHP_BINARY) . ' -l ' . escapeshellarg($path),
        $output,
        $exitCode
    );

    if ($exitCode === 0) {
        echo "[PASS] {$relativePath}\n";
        continue;
    }

    $failed++;
    echo "[FAIL] {$relativePath}\n";
    echo implode(PHP_EOL, $output) . PHP_EOL;
}

if ($failed > 0) {
    fwrite(STDERR, "{$failed} PHP file(s) failed linting.\n");
    exit(1);
}

echo count($files) . " PHP file(s) passed linting.\n";
