/**
 * Auth & UI Helper Functions
 */

// 1. Fungsi Toggle Password (Lihat/Sembunyikan)
function togglePassword(inputId, iconId) {
    const passwordInput = document.getElementById(inputId);
    const eyeIcon = document.getElementById(iconId);

    if (!passwordInput || !eyeIcon) return;

    const isPassword = passwordInput.type === 'password';
    
    // Toggle tipe input
    passwordInput.type = isPassword ? 'text' : 'password';
    
    // Toggle icon (Bootstrap Icons)
    if (isPassword) {
        eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
    } else {
        eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
    }
}

// 2. Fungsi Anti-Spasi
const preventWhitespace = (element) => {
    if (!element) return;

    // Blokir tombol spasi saat ditekan
    element.addEventListener('keydown', (e) => {
        if (e.key === " " || e.code === "Space") {
            e.preventDefault();
        }
    });

    // Bersihkan jika ada spasi dari copy-paste
    element.addEventListener('input', function() {
        if (this.value.includes(' ')) {
            this.value = this.value.replace(/\s/g, '');
        }
    });
};

// 3. Inisialisasi Otomatis
document.addEventListener('DOMContentLoaded', () => {
    
    // Daftar ID input yang tidak boleh ada spasi
    const noSpaceInputs = [
        'username', 
        'password-login', 
        'password-reg', 
        'confirm-reg'
    ];

    noSpaceInputs.forEach(id => {
        const el = document.getElementById(id);
        if (el) preventWhitespace(el);
    });
});