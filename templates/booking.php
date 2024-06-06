<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'includes/db.php';

    // Mendapatkan dan membersihkan data formulir
    $name = htmlspecialchars($_POST['name']);
    $gender = htmlspecialchars($_POST['gender']);
    $identity_number = htmlspecialchars($_POST['identity_number']);
    $room_type = htmlspecialchars($_POST['room_type']);
    $booking_date = htmlspecialchars($_POST['booking_date']);
    $duration = (int) htmlspecialchars($_POST['duration']);
    $include_breakfast = isset($_POST['include_breakfast']) ? 1 : 0;

    // Hasil debug
    echo "Name: $name<br>";
    echo "Gender: $gender<br>";
    echo "Identity Number: $identity_number<br>";
    echo "Room Type: $room_type<br>";
    echo "Booking Date: $booking_date<br>";
    echo "Duration: $duration<br>";
    echo "Include Breakfast: $include_breakfast<br>";

    // Tetapkan harga kamar
    $room_prices = [
        'standard' => 500000,
        'deluxe' => 800000,
        'executive' => 1000000
    ];

    $price = $room_prices[$room_type];
    $total = $price * $duration;

    // Terapkan diskon
    $discount = 0;
    if ($duration > 3) {
        $discount = $total * 0.1;
        $total -= $discount;
    }

    // Tambahkan biaya sarapan
    if ($include_breakfast) {
        $total += 80000 * $duration;
    }

    // Masukkan ke dalam basis data
    try {
        $stmt = $pdo->prepare("INSERT INTO bookings (name, gender, identity_number, room_type, price, booking_date, duration, include_breakfast, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $gender, $identity_number, $room_type, $price, $booking_date, $duration, $include_breakfast, $total]);

        // Dapatkan ID pemesanan yang terakhir dimasukkan
        $booking_id = $pdo->lastInsertId();

        // Redirect ke halaman tanda terima
        header("Location: index.php?page=receipt&booking_id=$booking_id");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<div class="booking max-w-2xl mx-auto my-12 bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-3xl font-bold mb-6 text-center">Pesan Kamar</h1>
    <form method="post" action="">
        <label for="name" class="block mb-2">Nama:</label>
        <input type="text" id="name" name="name" required class="w-full p-2 mb-4 border rounded">

        <label class="block mb-2">Jenis Kelamin:</label>
        <label>
            <input type="radio" name="gender" value="laki_laki" required class="mr-2"> Laki-Laki
        </label>
        <label>
            <input type="radio" name="gender" value="perempuan" required class="mr-2"> Perempuan
        </label>

        <label for="identity_number" class="block mb-2">Nomor Identitas:</label>
        <input type="text" id="identity_number" name="identity_number" required pattern="\d{16}" title="isian salah..data  harus 16 digit" class="w-full p-2 mb-4 border rounded">

        <label for="room_type" class="block mb-2">Tipe Kamar:</label>
        <select id="room_type" name="room_type" required class="w-full p-2 mb-4 border rounded" onchange="updatePriceAndTotal()">
            <option value="standard">Standard</option>
            <option value="deluxe">Deluxe</option>
            <option value="executive">Executive</option>
        </select>

        <label for="price" class="block mb-2">Harga:</label>
        <input type="text" id="price" name="price" readonly class="w-full p-2 mb-4 border rounded">

        <label for="booking_date" class="block mb-2">Tanggal Booking:</label>
        <input type="date" id="booking_date" name="booking_date" required class="w-full p-2 mb-4 border rounded">

        <label for="duration" class="block mb-2">Durasi (hari):</label>
        <input type="number" id="duration" name="duration" required min="1" class="w-full p-2 mb-4 border rounded" onchange="updateTotal()">

        <label for="include_breakfast" class="block mb-2">
            <input type="checkbox" id="include_breakfast" name="include_breakfast" class="mr-2" onchange="updateTotal()"> Termasuk Makan Pagi?
        </label>

        <label for="total" class="block mb-2">Total Bayar:</label>
        <input type="text" id="total" name="total" readonly class="w-full p-2 mb-4 border rounded">

        <button type="submit" class="w-full p-2 bg-blue-600 text-white rounded">Pesan Sekarang</button>
    </form>
</div>

<script>
    const roomPrices = {
        'standard': 500000,
        'deluxe': 800000,
        'executive': 1000000
    };
    
    function updatePriceAndTotal() {
        const roomType = document.getElementById('room_type').value;
        const price = roomPrices[roomType];
        document.getElementById('price').value = price;
        updateTotal();
    }

    function updateTotal() {
        const price = parseInt(document.getElementById('price').value) || 0;
        const duration = parseInt(document.getElementById('duration').value) || 0;
        const includeBreakfast = document.getElementById('include_breakfast').checked;

        let total = price * duration;
        
        // Terapkan diskon
        if (duration > 3) {
            total -= total * 0.1;
        }

        // Tambahkan biaya sarapan
        if (includeBreakfast) {
            total += 80000 * duration;
        }

        document.getElementById('total').value = total;
    }

    // Inisialisasi harga dan total pemuatan halaman
    document.addEventListener('DOMContentLoaded', () => {
        updatePriceAndTotal();
    });
</script>
