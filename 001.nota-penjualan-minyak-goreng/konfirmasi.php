<?php
session_start();

if (!isset($_SESSION["result"]) || empty($_SESSION["result"])) {
    header("Location: index.php");
    exit;
}

$data = $_SESSION["result"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="konfirmasi.css">
    <title>Nota Penjualan</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align:center">Nota Penjualan Minyak Goreng</h1>
        <h2 style="text-align:center">PT. AE</h2>
        <div class="divider"></div>
        <div>
            <p><strong>Tanggal Pemesanan : </strong><?php echo $data["tanggal_pemesanan"] ?></p>
            <p><strong>Nomor Nota : </strong><?php echo $data["nomor_nota"] ?></p>
            <p><strong>Kode Minyak : </strong><?php echo $data["kode_minyak"] ?></p>
            <p><strong>Nama Minyak : </strong><?php echo $data["nama_minyak"] ?></p>
            <p><strong>Ukuran : </strong><?php echo $data["ukuran"] ?></p>
            <p><strong>Harga : </strong><?php echo $data["harga"] ?></p>
            <p><strong>Jumlah Beli : </strong><?php echo $data["jumlah_beli"] ?></p>
            <p><strong>Total Harga : </strong><?php echo $data["total_harga"] ?></p>
            <p><strong>Diskon : </strong><?php echo $data["diskon"] ?></p>
            <p><strong>Pajak : </strong><?php echo $data["pajak"] ?></p>
            <p><strong>Total Pembayaran : </strong><?php echo $data["total_pembayaran"] ?></p>
        </div>
        <a href="index.php">
            <button>
                Input Lagi
            </button>
        </a>
    </div>

</body>

</html>