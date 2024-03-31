<?php
//membuat array asosiatif sebagai struktur data
$negara = array(
    "nama_negara" => "Indonesia",
    "presiden" => "SBY",
    "provinsi" => array( //array provinsi yang terdiri dari nama provinsi, gubernur dan kota yang ada di dalamnya
        array(
        "nama_provinsi" => "Jawa Tengah",
        "gubernur" => "Vyon",
        "kota" => [ //terdapat array dalam array yang berisi informasi mengenai nama kota dan bupati
            array("nama_kota" => "Semarang", "bupati" => "Shiro"),
            array ("nama_kota" => "Salatiga", "bupati" => "Mr.Joni")
        ]
        ),
        array(
            "nama_provinsi" => "Jawa Barat",
            "gubernur" => "Mikel",
            "kota" => [
                array("nama_kota" => "Bandung", "bupati" => "Alfito"),
                array ("nama_kota" => "Bogor", "bupati" => "Bikra")]
        )
    )
);
//menampilkan data array asosiatif
echo 'Negara '.$negara['nama_negara'].'<br>';
echo 'Presiden : '.$negara['presiden'].'<br>';
echo 'Jumlah Provinsi : '.count ($negara['provinsi']).'<br>';
echo "--------------------------------------------------------------------------------<br>";
//melakukan perulangan foreach untuk mengakses setiap elemen array tanpa harus mengkhawatirkan indeksnya.
foreach ($negara['provinsi'] as $key => $provinsi ){
    echo 'Nama Provinsi Ke '.($key+1)." : ".$provinsi['nama_provinsi'].'<br>';
    echo 'Nama Gubernur ' .$provinsi['nama_provinsi'].": ".$provinsi['gubernur'].'<br>';
    echo 'Jumlah Kota : '.count($provinsi['kota']).'<br>';
    echo "+++++++++++++++++++++++++++++++++++++++++++++++<br>";
//membuat nested foreach untuk menampilkan data dari kota yang terdapat dalam array provinsi
    foreach ($provinsi['kota'] as $key => $kota){
        echo "Nama Kota Ke ".($key+1)." : ".$kota['nama_kota']."\n<br>";
        echo "Nama Bupati " .$kota["nama_kota"]. ": ".$kota["bupati"]."\n<br>";
        echo "+++++++++++++++++++++++++++++++++++++++++++++++<br>";
    }
}
?>