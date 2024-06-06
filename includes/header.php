<!DOCTYPE html> <!-- Deklarasi tipe dokumen HTML5 -->
<html lang="en"> <!-- Tag html pembuka dengan atribut bahasa yang diatur ke "en" untuk bahasa Inggris -->
<head>
    <meta charset="UTF-8"> <!-- Menetapkan karakter encoding dokumen ke UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur viewport agar halaman web diresponsifkan pada berbagai ukuran perangkat -->
    <title>Hotel Booking</title> <!-- Judul halaman web yang akan ditampilkan di tab browser -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> <!-- Link ke file CSS eksternal dari Tailwind CSS versi 2.2.19 -->
</head>
<body class="bg-gray-100 text-gray-900"> <!-- Tag body pembuka dengan kelas CSS untuk memberikan background abu-abu muda dan teks abu-abu gelap -->
<header class="bg-blue-600 text-white py-4"> <!-- Tag header pembuka dengan kelas CSS untuk background biru, teks putih, dan padding vertikal -->
    <nav class="container mx-auto flex justify-center"> <!-- Tag nav pembuka dengan kelas CSS untuk kontainer dengan margin otomatis, flexbox, dan konten yang rata tengah -->
        <ul class="flex space-x-4"> <!-- Membuka elemen ul dengan kelas flex dan spasi horizontal antar elemen sebesar 4 -->
            <li><a href="index.php?page=home" class="hover:text-gray-300">Home</a></li> <!-- Item menu dengan link ke halaman home dan kelas hover untuk teks abu-abu muda saat di-hover -->
            <li><a href="index.php?page=rooms" class="hover:text-gray-300">List Kamar</a></li> <!-- Item menu dengan link ke halaman list kamar dan kelas hover untuk teks abu-abu muda saat di-hover -->
            <li><a href="index.php?page=about" class="hover:text-gray-300">Tentang Kami</a></li> <!-- Item menu dengan link ke halaman tentang kami dan kelas hover untuk teks abu-abu muda saat di-hover -->
            <li><a href="index.php?page=booking" class="hover:text-gray-300">Pesan Kamar</a></li> <!-- Item menu dengan link ke halaman pesan kamar dan kelas hover untuk teks abu-abu muda saat di-hover -->
            <li><a href="index.php?page=chart" class="hover:text-gray-300">Chart</a></li> <!-- Item menu dengan link ke halaman chart dan kelas hover untuk teks abu-abu muda saat di-hover -->
        </ul>
    </nav> <!-- Menutup tag nav -->
</header> <!-- Menutup tag header -->
<main class="container mx-auto my-8"> <!-- Tag main pembuka dengan kelas CSS untuk kontainer dengan margin otomatis dan margin vertikal sebesar 8 -->
