<?php
// Mulai sesi
session_start();

// Inisialisasi pesan Error
$errors = [];

if (isset($_SESSION['errors'])) {
    $errors = $_SESSION["errors"];

    unset($_SESSION["errors"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Nota Penjualan Minyak Goreng</title>
</head>

<body>
    <div id="judul">
        <h1>Minyak Goreng yang Tersedia</h1>
    </div>

    <div id="daftar-item">
        <table border="all">
            <thead id="table-header">
                <tr>
                    <th>Kode Minyak</th>
                    <th>Nama Minyak</th>
                    <th>Kode Ukuran</th>
                    <th>Ukuran</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <!-- Bagian Minyak Bimoli  -->
                <tr>
                    <td rowspan="3">BML</td>
                    <td rowspan="3">Bimoli</td>
                    <td>S</td>
                    <td>500 ml</td>
                    <td>15000</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>1000 ml</td>
                    <td>25000</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>2000 ml</td>
                    <td>40000</td>
                </tr>

                <!-- Bagian Minyak Sanco  -->
                <tr>
                    <td rowspan="3">SNC</td>
                    <td rowspan="3">Sanco</td>
                    <td>S</td>
                    <td>500 ml</td>
                    <td>17000</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>1000 ml</td>
                    <td>29000</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>2000 ml</td>
                    <td>43000</td>
                </tr>
                <tr>

                    <!-- Bagian Minyak Filma -->
                    <td rowspan="3">FLM</td>
                    <td rowspan="3">Filma</td>
                    <td>S</td>
                    <td>500 ml</td>
                    <td>13000</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>1000 ml</td>
                    <td>23000</td>
                </tr>
                <tr>
                    <td>L</td>
                    <td>2000 ml</td>
                    <td>29000</td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php if (!empty($errors)): ?>
        <div id="error">
            <h3 style="color:red; text-align:center; margin:0.5rem">Error</h3>
            <?php foreach ($errors as $error): ?>
                <p style="color:red">- <?php echo $error; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="process.php" method="post">
        <h2>Form Pembelian Minyak Goreng</h2>
        <div class="input-class">
            <label for="nama-minyak">Nama Minyak : </label>
            <input type="text" name="nama-minyak" id="nama-minyak" placeholder="Masukkan nama Minyak"
                list="list-nama-minyak">
        </div>

        <div class="input-class">
            <label for="jumlah-pembelian">Jumlah Pembelian: </label>
            <input type="number" name="jumlah-pembelian" id="jumlah-pembelian" placeholder="Masukkan Jumlah Pembelian">
        </div>

        <div class="input-class">
            <label for="kode-ukuran">Kode Ukuran: </label>
            <input type="text" name="kode-ukuran" id="kode-ukuran" placeholder="Masukkan Kode Ukuran"
                list="list-ukuran">
        </div>

        <button type="submit">Konfirmasi Pemesanan</button>
    </form>

    <datalist id="list-nama-minyak">
        <option value="Bimoli">
        <option value="Sanco">
        <option value="Filma">
    </datalist>
    <datalist id="list-ukuran">
        <option value="S">
        <option value="M">
        <option value="L">
    </datalist>
</body>

</html>