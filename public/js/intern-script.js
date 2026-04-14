document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Sidebar Toggle Logic
    const sidebarBtn = document.getElementById('sidebarCollapse');
    const sidebar = document.getElementById('sidebar');
    
    if (sidebarBtn && sidebar) {
        sidebarBtn.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });
    }

    // 2. Tombol Absensi
    const btnAttend = document.getElementById('btn-attendance');
    if (btnAttend) {
        btnAttend.onclick = function(e) {
            e.preventDefault();
            
            if (typeof BASEURL === 'undefined' || BASEURL === "") {
                Swal.fire('Error', 'Konfigurasi BASEURL hilang!', 'error');
                return;
            }
            
            Swal.fire({
                title: 'Konfirmasi Kehadiran',
                text: "Catat kehadiran Anda sekarang?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Absen!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = BASEURL + "/intern/attendance/checkin";
                }
            });
        };
    }

    // 3. Jam Realtime
    function updateClock() {
        const clockElement = document.getElementById('realtime-clock');
        if (clockElement) {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clockElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
    }
    setInterval(updateClock, 1000); // Jalankan setiap detik
    updateClock(); // Jalankan langsung saat page load

    // 4. Global Event Listener untuk Logout
    document.addEventListener('click', function(e) {
        const btnLogout = e.target.closest('.btn-logout, .btn-logout-sidebar');
        
        if (btnLogout) {
            e.preventDefault();
            const url = btnLogout.getAttribute('href');

            if (!url || url === '#') return;

            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Yakin mau keluar?',
                    text: "Sesi Anda akan berakhir dan harus login kembali.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545', // Merah untuk logout
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Keluar!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
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