<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for=""></label>
</body>
</html>
<?php
echo "STACK/TUMPUKAN";

// Deklarasi Stack
$tumpukan = array(
    'top' => -1, //inisialisasi top dengan nilai -1
    'data' => array() //array untuk menampung data
);

$A = $tumpukan;
define("max",10);

//prosedur inisialisasi stack
function inisial(){
    global $A; //menggunakan variabel global $A

    $A['top'] = -1; //menginisialisasi top dengan nilai -1
}

//fungsi push/menambah data dalam stack
function push($d){
    global $A; //menggunakan variabel global $A

    if($A['top'] != max - 1){
        $A['top'] = $A['top'] + 1;
        $A['data'][$A['top']] = $d; //menambahkan data ke dalam stack
        echo "<br/>Nilai ", $d, " Sudah ditambahkan"; //pesan konfirmasi penambahan
    } else {
        echo "<br/>Maaf elemen stack sudah penuh"; //pesan jika stack penuh
    }
}

function pop(){
    global $A; //menggunakan variabel global $A

    if ($A['top'] != -1){
        echo "<br/> Data yang di POP adalah ", $A['data'][$A['top']];
        $A['top']--;
    } else {
        echo "<br/>Maaf stack kosong"; //pesan jika stack kosong
    }
}

//fungsi menampilkan data teratas/PEAK
function peak(){
    global $A;

    return $A['data'][$A['top']];
}

//prosedur cetak isi stack
function cetak(){
    global $A;

    if($A['top'] != -1){
        echo "<br/>Data pada stack = ";
        for ($i=$A['top']; $i>=0; $i--)
        echo "<br>".$A['data'][$i];
    } else {
        echo "Stack Kosong";
    }
}
//menampilkan fungsi searching apakah data yang akan di swap ada dalam stack
function ada($dicari){
    global $A;

    for($i = $A['top']; $i>=0; $i--){
        if($A['data'][$i] == $dicari) {
            echo "<br>" . $dicari ." ditemukan pada array index ke " .$i."<br>";
            $ketemu = true;
        }
    }
    if($ketemu = false){
        echo "<br> nilai tidak ditemukan";
    }
}

function index($urut){
    global $A;

    for($i = $A['top']; $i>=0; $i--){
        if($A['data'][$i] == $urut){
            return $i; //echo "index ke".$urut. " adalah" .$A['data']."<br>"; 
        }
    }
    return -1;
}
//menukar data yang di inginkan ke indeks berikutnya
 function swap(&$A){
    global $A;
    $dicari = false;
    $angka = 10;

    for($i = $A['top']; $i>=0; $i--){
        if($A['data'][$i] == $angka) {
            $dicari = true;

            $temp = $A['data'][$i];
            $A['data'][$i] = $A['data'][$A['top']];
            $A['data'][$A['top']] = $temp;

            $a = &$a;

            echo "<br>$angka berhasil ditukar dengan nilai puncak stack";
        }
 }
}

//memanggil/menjalankan prosedur dan fungsi
push (10); // contoh penambahan angka 5 ke dalam stack
push (5); // contoh penambahan angka 5 ke dalam stack
push (3); // contoh penambahan angka 5 ke dalam stack
push (4);
pop (); //melakukan penghapusan dari stack
echo "<br>Data teratas = ", peak(); //menampilkan data teratas
cetak(); 
ada(5);
index(2);
swap($A);
cetak();

?>