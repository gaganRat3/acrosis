<?php
require_once '../includes/functions.php';
requireLogin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Logout must be submitted as a form.');
}

requireCsrfToken();
$_SESSION = [];
session_destroy();
header('Location: login.php');
exit;
