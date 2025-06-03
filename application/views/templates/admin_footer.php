
<?php
// application/views/templates/admin_footer.php
?>
            </main>
        </div>
    </div>

    <script>
        // Auto hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);

        // Confirm delete actions
        function confirmDelete(url) {
            if (confirm('Yakin ingin menghapus data ini?')) {
                window.location.href = url;
            }
        }
    </script>
</body>
</html>