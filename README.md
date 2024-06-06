# Hotel Booking System

## Struktur/Hirarki Folder
- `index.php`: File utama yang mengontrol routing halaman.
- `assets/`: Berisi resource statis seperti CSS, gambar, dan JavaScript.
  - `css/style.css`: File CSS untuk styling halaman.
  - `images/`: Folder berisi gambar-gambar kamar.
    - `deluxe.jpg`, `executive.jpg`, `standard.jpg`: Gambar untuk masing-masing tipe kamar.
  - `js/script.js`: File JavaScript untuk validasi form dan interaktivitas.
- `includes/`: Berisi file PHP yang di-include di beberapa halaman.
  - `db.php`: Koneksi ke database.
  - `footer.php`: Template footer.
  - `header.php`: Template header.
  - `phpinfo.php`: Informasi PHP.
  - `test_db.php`: Tes koneksi database.
- `templates/`: Berisi file template untuk setiap halaman.
  - `about.php`: Halaman tentang kami.
  - `booking.php`: Halaman untuk pemesanan kamar.
  - `chart.php`: Halaman untuk menampilkan chart.
  - `home.php`: Halaman beranda.
  - `receipt.php`: Halaman untuk menampilkan receipt.
  - `rooms.php`: Halaman daftar kamar.

## Sumber Daya Pemrograman
- **PHP**: Digunakan untuk backend dan koneksi ke database.
- **MySQL**: Database untuk menyimpan data pemesanan.
- **JavaScript**: Digunakan untuk validasi form dan chart.
- **CSS**: Styling halaman.
- **TailwindCSS**: Framework CSS untuk styling komponen.

### Coding Guidelines and Best Practices
1. **Commenting Code**: Setiap fungsi/prosedur memiliki komentar deskriptif.
2. **Indentation**: Menggunakan indentation 4 spaces untuk keterbacaan.
3. **Sanitization**: Data yang diterima dari form disanitasi untuk mencegah SQL Injection.
4. **Error Handling**: Menggunakan try-catch untuk menangani error.
5. **File Organization**: Struktur file yang jelas untuk memisahkan resource.

## Initial State and Final State
### Initial State
- Halaman pemesanan dengan form kosong.
- Tidak ada data pemesanan di database.

### Final State
- Data pemesanan disimpan di database.
- Halaman receipt menampilkan detail pemesanan.

### Author
- **Name**: Tegar Alamsyah Surbakti
- **Date**: 2024-05-30

---