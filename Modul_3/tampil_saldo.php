<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Saldo</title>
</head>
<body>
    <h1 style="text-align: center">Tampil Saldo</h1>
</body>
</html>
<?php
//melakukan penyimpanan data pengguna di seluruh sesi dengan kondisi yang berbeda dengan syntax if
session_start();

if(!isset($_SESSION['saldo1'])){
    $_SESSION['saldo1'] = 0;
}
if (!isset($_SESSION['saldo2'])){
    $_SESSION['saldo2'] = 0;
}
if (!isset($_SESSION['saldo3'])){
    $_SESSION['saldo3'] = 0;
}
if (!isset($_SESSION['depo'])){
    $_SESSION['depo'] = 0;
}

$total = $_SESSION['saldo1'] + $_SESSION['saldo2'] + $_SESSION['saldo3'] + $_SESSION['depo']; //melakukan rumus total yang dihitung dari seluruh data yang sudah di inputkan sebelumnya

echo "Saldo Rekening 1 : ".$_SESSION['saldo1']."<br>"; //menampilkan saldo rekening 1 yang sudah di inputkan dalam form sebelumnya
echo "Saldo Rekening 2 : ".$_SESSION['saldo2']."<br>"; //menampilkan saldo rekening 2 yang sudah di inputkan dalam form sebelumnya
echo "Saldo Rekening 3 : ".$_SESSION['saldo3']."<br>"; //menampilkan saldo rekening 3 yang sudah di inputkan dalam form sebelumnya
echo "Saldo Deposito : ".$_SESSION['depo']."<br><br>"; //menampilkan saldo Deposito yang sudah di inputkan dalam form sebelumnya

echo "Total Saldo : ".$total."<hr>"; //menampilkan nilai total yang sudah di hitung dari rumus di atas
?>

<br>

<a href="menu_utama.html">Kembali Ke Menu Utama</a>