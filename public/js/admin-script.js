document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Sidebar Toggle Logic
    const sidebarBtn = document.getElementById('sidebarCollapse');
    const sidebar = document.getElementById('sidebar');
    
    if (sidebarBtn && sidebar) {
        sidebarBtn.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    }

    // 2. Logout Logic (Event Delegation)
    // Menangkap klik pada semua element yang punya class .btn-logout atau .btn-logout-sidebar
    document.addEventListener('click', function(e) {
        const btnLogout = e.target.closest('.btn-logout, .btn-logout-sidebar');
        
        if (btnLogout) {
            e.preventDefault();
            const url = btnLogout.getAttribute('href');

            // Pastikan URL tidak kosong
            if (!url || url === '#') return;

            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Yakin mau keluar?',
                    text: "Sesi Anda akan berakhir dan harus login kembali.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0d6efd',
                    cancelButtonColor: '#dc3545',
                    confirmButtonText: 'Ya, Logout!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true // Tombol Batal di kiri, Logout di kanan
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            } else {
                if (confirm("Yakin ingin logout?")) {
                    window.location.href = url;
                }
            }
        }
    });
});