<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST" >
    <h3 style= "text-align: center">Pilihan Menu : 3</h3><br>
    <label for="">Masukan Saldo</label><br>
    <input type="number" name="saldo3"><br><br> <!-- menginputkan nilai yang ingin ditambahkan ke dalam tampil saldo -->
    <input type="submit" name="tambah"><br><br>  <!-- tombol yang menghubungkan ke dalam penyimpanan tampil saldo -->
    </form>

</body>
<?php
session_start();
//melakukan penyimpanan data pengguna di seluruh sesi dengan kondisi yang berbeda dengan syntax if
if (!isset($_SESSION['saldo3'])){
    $_SESSION['saldo3'] = 0;
}
if (isset($_POST['tambah'])){
    $saldo = $_POST['saldo3'];

    if($saldo < 0 || $saldo == ""){
        echo "gabisa ditambahkan, input nilai lain";  //menampilkan output yang keluar jika tidak menginputkan nilai integer yang di inginkan
    }
    else {
    $_SESSION['saldo3'] += $_POST['saldo3'];
    echo "Berhasil menambahkan saldo rekening";
    }
}
?><br><br><br>
<a href="menu_utama.html">Kembali Ke Menu Utama</a>

</body>
</html>