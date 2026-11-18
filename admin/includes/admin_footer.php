</div></div><!-- end page-body and main-content -->
<script>
function toggleSidebar() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    if (sidebar) sidebar.classList.toggle('open');
    if (overlay) overlay.classList.toggle('open');
}

document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (sidebar) sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('open');
        }
    });
});
</script>
</body></html>
