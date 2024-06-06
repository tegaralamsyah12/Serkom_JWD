// Event listener untuk memvalidasi form setelah DOM terload
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const identityNumberInput = document.getElementById('identity_number');
    const durationInput = document.getElementById('duration');
    
    // Event listener untuk submit form
    form.addEventListener('submit', function (event) {
        // Validasi nomor identitas
        const identityNumber = identityNumberInput.value;
        if (!/^\d{16}$/.test(identityNumber)) {
            alert('isian salah..data  harus 16 digit.');
            event.preventDefault();
            return;
        }
        
        // Validasi durasi
        const duration = durationInput.value;
        if (isNaN(duration) || duration <= 0) {
            alert('Duration must be a positive number.');
            event.preventDefault();
            return;
        }
    });
});
