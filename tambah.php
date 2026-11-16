
<?php

require_once "Database.php";
require_once "Produk.php";

$db = new Database();

$produk = new Produk($db->getConnection());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $produk->tambah($nama, $harga, $stok);

    header("Location: index.php");
    exit;

}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>

    <h2>Tambah Produk</h2>

    <form method="POST">

        Nama:
        <input type="text" name="nama" required>
        <br><br>

        Harga:
        <input type="number" name="harga" required>
        <br><br>

        Stok:
        <input type="number" name="stok" required>
        <br><br>

        <button type="submit">Simpan</button>

        <a href="index.php">Kembali</a>

    </form>

</body>
</html>
