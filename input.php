<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
<?php
if ($_POST) {
    // Variable penampung
    $judul = $_POST['judul'];
    $Production = $_POST['Production'];
    $tahun_rilis = $_POST['tahun_rilis'];
    $durasi = $_POST['durasi'];
    $sutradara = $_POST['sutradara'];
    $kategori = $_POST['kategori'];
    $kode_film = $_POST['kode_film'];

    // Informasi file foto
    $foto = $_FILES['foto'];
    $foto_name = $foto['name'];
    $foto_tmp_name = $foto['tmp_name'];

    // Mendapatkan ekstensi file foto
    $foto_ext = pathinfo($foto_name, PATHINFO_EXTENSION);

    // Membuat nama unik untuk file foto
    $nama_file = $judul . '_' . $sutradara . '.' . $foto_ext;

    // Memindahkan foto ke lokasi yang diinginkan
    $foto_destination = 'uploads/' . $nama_file;

    // Pindahkan file ke direktori uploads/
    if (move_uploaded_file($foto_tmp_name, $foto_destination)) {
        // Data buku
        $film = $judul . "-" . $Production . "-" . $tahun_rilis . "-" . $durasi . "-" . $sutradara . "-" . $kategori . "-" . $kode_film . "-" . $foto_destination . "\n";

        // Simpan ke file
        $file = "film.txt";
        if (file_put_contents($file, $film, FILE_APPEND) !== false) {
            echo "Data berhasil disimpan";
        } else {
            echo "Data gagal disimpan";
        }
    } else {
        echo "Gagal mengunggah foto";
    }

    echo '<br><br><a href="index.php">Kembali ke Form</a>';
    echo '<br><br><a href="read.php">Lihat Data</a>';
}
?>


</body>

</html>