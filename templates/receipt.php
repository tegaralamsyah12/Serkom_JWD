<?php
// Memeriksa apakah parameter booking_id ada dalam URL
if (!isset($_GET['booking_id'])) {
    echo "Invalid request."; // Pesan kesalahan jika tidak ada parameter booking_id
    exit; // Keluar dari skrip PHP
}

$booking_id = $_GET['booking_id']; // Mendapatkan nilai parameter booking_id dari URL

include 'includes/db.php'; // Menyertakan file koneksi database

// Menyiapkan dan mengeksekusi query untuk mengambil data booking berdasarkan ID
$stmt = $pdo->prepare("SELECT * FROM bookings WHERE id = ?");
$stmt->execute([$booking_id]);
$booking = $stmt->fetch(); // Mengambil hasil query sebagai array asosiatif

// Memeriksa apakah booking ditemukan
if (!$booking) {
    echo "Booking not found."; // Pesan kesalahan jika booking tidak ditemukan
    exit; // Keluar dari skrip PHP
}
?>

<!-- HTML untuk menampilkan data booking dalam bentuk struk -->
<div class="receipt max-w-2xl mx-auto my-12 bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-center">Receipt</h1>
    <!-- Menampilkan data booking dengan menggunakan PHP dan htmlspecialchars untuk menghindari serangan XSS -->
    <p><strong>Nama:</strong> <?php echo htmlspecialchars($booking['name']); ?></p>
    <p><strong>Nomor Identitas:</strong> <?php echo htmlspecialchars($booking['identity_number']); ?></p>
    <p><strong>Jenis Kelamin:</strong> <?php echo htmlspecialchars($booking['gender']); ?></p>
    <p><strong>Tipe Kamar:</strong> <?php echo htmlspecialchars($booking['room_type']); ?></p>
    <p><strong>Durasi:</strong> <?php echo htmlspecialchars($booking['duration']); ?> days</p>
    <!-- Menghitung dan menampilkan diskon berdasarkan durasi menginap -->
    <p><strong>Discount:</strong> <?php echo ($booking['duration'] > 3) ? "10%" : "0%"; ?></p>
    <!-- Menampilkan total harga booking dengan format mata uang Rupiah -->
    <p><strong>Total Hasil:</strong> Rp <?php echo number_format($booking['total'], 2, ',', '.'); ?></p>
</div>
