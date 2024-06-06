<!-- Autor : Tegar Alamsyah Surbakti -->
<!-- Versi : 1 -->
<!-- Tanggal : 6 Juni 2024 -->
<?php include 'includes/header.php'; ?>

<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'rooms':
        include 'templates/rooms.php';
        break;
    case 'about':
        include 'templates/about.php';
        break;
    case 'booking':
        include 'templates/booking.php';
        break;
    case 'chart':
        include 'templates/chart.php';
    break;    
    case 'receipt':
        include 'templates/receipt.php';
        break;
    default:
        include 'templates/home.php';
        break;
}
?>

<?php include 'includes/footer.php'; ?>
