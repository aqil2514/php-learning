<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Ambil semua nilai yang diperlukan 
    $nama_minyak = $_POST["nama-minyak"];
    $jumlah_pembelian = $_POST["jumlah-pembelian"];
    $kode_ukuran = $_POST["kode-ukuran"];

    $kode_minyak_goreng = [
        "Bimoli" => "BML",
        "Sanco" => "SNC",
        "Filma" => "FLM",
    ];

    $kode_ukuran_jumlah = [
        "S" => "",
        "M" => "",
        "L" => "",
    ];

    $harga_ukuran_minyak = [
        "S" => "",
        "M" => "",
        "L" => "",
    ];

    if ($nama_minyak === "Bimoli") {
        $kode_ukuran_jumlah["S"] = "500 ml";
        $kode_ukuran_jumlah["M"] = "1000 ml";
        $kode_ukuran_jumlah["L"] = "2000 ml";
        $harga_ukuran_minyak["S"] = 15000;
        $harga_ukuran_minyak["M"] = 25000;
        $harga_ukuran_minyak["L"] = 40000;
    } else if ($nama_minyak === "Sanco") {
        $kode_ukuran_jumlah["S"] = "500 ml";
        $kode_ukuran_jumlah["M"] = "1000 ml";
        $kode_ukuran_jumlah["L"] = "2000 ml";
        $harga_ukuran_minyak["S"] = 17000;
        $harga_ukuran_minyak["M"] = 29000;
        $harga_ukuran_minyak["L"] = 43000;
    } else if ($nama_minyak === "Filma") {
        $kode_ukuran_jumlah["S"] = "500 ml";
        $kode_ukuran_jumlah["M"] = "1000 ml";
        $kode_ukuran_jumlah["L"] = "2000 ml";
        $harga_ukuran_minyak["S"] = 13000;
        $harga_ukuran_minyak["M"] = 23000;
        $harga_ukuran_minyak["L"] = 29000;
    }

    // Buat array kosong khusus menangkap error
    $errors = [];

    // <<<<< VALIDASI >>>>>

    // Nama-nama minyak yang diizinkan
    $nama_minyak_valid = ["Bimoli", "Sanco", "Filma"];

    // Jika nama minyak tidak valid, tampilkan error
    if (!in_array($nama_minyak, $nama_minyak_valid)) {
        $errors[] = "Minyak yang dipilih tidak tersedia";
    }

    if (empty($nama_minyak)) {
        $errors[] = "Nama minyak belum diisi";
    }

    // Jika jumlah pemesanan bukan angka, tampilkan error
    if (!is_numeric($jumlah_pembelian)) {
        $errors[] = "Jumlah pemesanan harus berupa angka";
    }

    // Jika jumlah pembelian belum diisi, kembalikan error
    if (empty($jumlah_pembelian)) {
        $errors[] = "Jumlah pembelian belum diisi";
    }

    // Jika jumlah pembeliannya minus atau 0, tampilkan error
    if ($jumlah_pembelian <= 0) {
        $errors[] = "Jumlah pembelian minimal 1";
    }

    // Jika ada error, simpan pesan error ke dalam session
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        // Redirect kembali ke halaman index.php
        header("Location: index.php");
        exit; // Pastikan untuk menghentikan eksekusi script setelah melakukan redirect
    }

    $total_harga = $harga_ukuran_minyak[$kode_ukuran] * $jumlah_pembelian;

    $diskon = 0;

    if ($jumlah_pembelian > 10) {
        $diskon = $total_harga * (1 - 0.05);
    } else {
        $diskon = $total_harga * 0;
    }

    $pajak = $total_harga * 0.1;

    $result = [
        "tanggal_pemesanan" => date("d-m-Y"),
        "nomor_nota" => "F0250524001",
        "kode_minyak" => $kode_minyak_goreng[$nama_minyak],
        "nama_minyak" => $nama_minyak,
        "ukuran" => $kode_ukuran_jumlah[$kode_ukuran],
        "harga" => "Rp. ". number_format($harga_ukuran_minyak[$kode_ukuran], 0, ",", "."),
        "jumlah_beli" => $jumlah_pembelian,
        "total_harga" => "Rp. ". number_format($total_harga, 0, ",", ".") ,
        "diskon" => "Rp. ". number_format($diskon, 0, ",", ".") ,
        "pajak" => "Rp. ". number_format($pajak, 0, ",", ".") ,
        "total_pembayaran" => "Rp. ". number_format($total_harga - $diskon + $pajak, 0, ",", ".")
    ];

    // Jika tidak ada error, redirect ke konfirmasi.php
    $_SESSION["result"] = $result;
    header("Location: konfirmasi.php");
    exit;
}
