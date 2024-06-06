<?php
// Menyertakan file koneksi database
include 'includes/db.php';

// Mengambil data booking dari database
$stmt = $pdo->query("SELECT room_type, COUNT(*) as count FROM bookings GROUP BY room_type");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Mendeklarasikan array untuk menyimpan tipe kamar dan jumlah booking
$room_types = [];
$counts = [];

// Mengisi array dengan data yang diambil dari database
foreach ($bookings as $booking) {
    $room_types[] = $booking['room_type'];
    $counts[] = $booking['count'];
}
?>

<!-- HTML untuk container chart -->
<div class="chart-container max-w-4xl mx-auto my-12 bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-8 text-center">Chart Booking</h1>
    <canvas id="bookingChart"></canvas>
</div>

<!-- Menyertakan library Chart.js dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Mendapatkan konteks canvas untuk menggambar chart
    const ctx = document.getElementById('bookingChart').getContext('2d');

    // Membuat chart baru dengan Chart.js
    const bookingChart = new Chart(ctx, {
        type: 'bar', // Tipe chart: bar (batang)
        data: {
            // Menggunakan data yang diambil dari PHP
            labels: <?php echo json_encode($room_types); ?>,
            datasets: [{
                label: 'Jumlah Booking',
                data: <?php echo json_encode($counts); ?>,
                // Warna background untuk batang chart
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                // Warna border untuk batang chart
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1 // Lebar border
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Memulai skala Y dari nol
                }
            }
        }
    });
</script>
