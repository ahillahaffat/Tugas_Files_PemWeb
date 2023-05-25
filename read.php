<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Cart</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
    echo "<p class=\"title2\">Data Film</p>";
    $file = "film.txt";

    $read = file($file); // array

    echo "<table border='1'>
    <thead>
        <th>Judul Film</th>
        <th>Production</th>
        <th>Tahun Rilis</th>
        <th>Durasi</th>
        <th>Sutradara</th>
        <th>Kategori</th>
        <th>Kode Film</th>
        <th>Foto Cover</th>
    </thead>";

    foreach ($read as $film) {
        $data_film = explode("-", $film); // array
        echo "<tr>";
        echo "<td>$data_film[0]</td>";
        echo "<td>$data_film[1]</td>";
        echo "<td>$data_film[2]</td>";
        echo "<td>$data_film[3]</td>";
        echo "<td>$data_film[4]</td>";
        echo "<td>$data_film[5]</td>";
        echo "<td>$data_film[6]</td>";
        echo "<td><img src='$data_film[7]' alt='Foto Cover' style='width: 100px;'></td>";
        echo "</tr>";
    }
    echo "</table>";

    echo '<br><br><a href="index.php">Kembali ke Form</a>';
    ?>

</body>

</html>