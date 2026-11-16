
<?php

require_once "Database.php";
require_once "Produk.php";

$db = new Database();

$produk = new Produk($db->getConnection());

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit;
}

// Mengambil data produk berdasarkan ID
$data = $produk->cari($id);

if (!$data) {
    header("Location: index.php");
    exit;
}

// Menyimpan perubahan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $produk->ubah($id, $nama, $harga, $stok);

    header("Location: index.php");
    exit;

}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>

    <h2>Edit Produk</h2>

    <form method="POST">

        Nama:
        <input
            type="text"
            name="nama"
            value="<?= htmlspecialchars($data['nama']) ?>"
            required
        >
        <br><br>

        Harga:
        <input
            type="number"
            name="harga"
            value="<?= $data['harga'] ?>"
            required
        >
        <br><br>

        Stok:
        <input
            type="number"
            name="stok"
            value="<?= $data['stok'] ?>"
            required
        >
        <br><br>

        <button type="submit">Simpan Perubahan</button>

        <a href="index.php">Kembali</a>

    </form>

</body>
</html>
