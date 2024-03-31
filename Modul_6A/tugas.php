<?php
session_start();

if(!isset($_SESSION['node'])){
    $_SESSION['node'] = array(
        'data' => null,
        'next' => null
    );
}
$node = $_SESSION['node'];

if(!isset($_SESSION['head'])){
    $_SESSION['head'] = null;
}

$head = $_SESSION['head'];

//prosedur inisialisasi
function inisialisasi(&$head){
    $head = null;
}

//fungsi LEmpty
function LEmpty($head){
    if($head == null){
        return 1;
    }else{
        return 0;
    }
}

$empty = LEmpty($head);

//prosedur menyisipkan data ke dalam linked list(depan)
function InsertD(&$head, $data, $empty){
    $baru = array(
        'data' => $data,
        'next' => null
    );
    if($empty){
        $head = $baru;
        $head['next'] = null;
    }else{
        $baru['next'] = $head;
        $head = $baru;
    }
    $_SESSION['head'] = $head;
}

//function tambah data linked list (belakang)
function InsertB(&$head, $data, $empty){
    $baru = array(
        'data' => $data,
        'next' => null
    );

    if($empty){
        $head = $baru;
    }else{
        $temp = &$head;
        while($temp['next'] != null){
            $temp = &$temp['next'];
        }
        $temp['next'] = $baru;
    }
    $_SESSION['head'] = $head;
}

//function untuk menghapus depan linked list
function HapusD(&$head,$empty){
    if(!$empty){
        if($head['next'] != null){
            $temp = $head;
            $head = $head['next'];
            unset($temp);
        }else{
            $head = null;
        }
        echo "Data Buku Depan Berhasil Dihapus!";
        $_SESSION['head'] = $head;
    }else{
        echo "List Kosong!";
    }
}

//menghapus belakang linked lis
function HapusB(&$head, $empty){
    if(!$empty){
        if($head['next'] != null){
            $temp = &$head;
            while($temp['next']['next'] != null){
                $temp = &$temp['next'];
            }

            $temp['next'] = null;
            $hapus = &$temp['next'];
            unset ($hapus);
        }else{
            $head = null;
        }
        echo "Data Buku Belakang Berhasil Dihapus!";
        $_SESSION['head'] = $head;
    }else{
        echo "List Kosong!";
    }
}

//function Hapus semua list linked list
function clear($head, $empty){
    $temp = $head;
    $delete = null;

    if(!$empty){
        while($temp != null){
            $delete = $temp;
            $temp = $temp['next'];
            unset($delete);
        }echo "Data Buku berhasil di reset!";
    }else{
        echo "List Sudah Kosong!";
    }
    $_SESSION['node'] = null;
    $_SESSION['head'] = null;
    $_SESSION['data'] = null;
}

//fungsi untuk mencetak linked list yang sudah di buat
function  cetak($head, $empty){
    $temp = $head;
    if(!$empty){
        echo "<br>Cetak Data : ";
        echo "<br><br>";

        // print_r($temp);
        while($temp != null){
            echo "<br> Judul Buku: " .$temp['data']['judul']. "<br>".
            "Harga Buku : ". $temp['data']['harga'] . "<br><br>";
            $temp = $temp['next'];
        }
    }else {
        echo "List Kosong!";
    }
}

//fungsi untuk memilih menu
function menu(){
    if(!isset($_POST['judul_buku']) && !isset($_POST['harga_buku'])){
        $_POST['judul_buku'] = $_POST['harga_buku'] = "";
    }else{
        if($_POST['judul_buku'] != "" && $_POST['harga_buku'] != ""){
            $_SESSION['data'] = [
                'judul' => $_POST['judul_buku'],
                'harga' => $_POST['harga_buku']
            ];
            echo "Tambah data Berhasil!";
            return $_SESSION['data'];
        }echo "JUDUL atau HARGA buu tidak boleh kosong!!!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Data Buku</title>
</head>
<body>
    <h3>Menu Data Buku</h3><br>
    <form method= "POST">
        <label for="tambah_dpn">1. </label>
        <button type="submit" id="tambah_dpn" name="tambah_dpn">Tambah Data Buku di Depan</button><br><br>

        <label for="tambah_blkg">2. </label>
        <button type="submit" id="tambah_blkg" name="tambah_blkg">Tambah Data Buku di Belakang</button><br><br>

        <label for="hps_dpn">3. </label>
        <button type="submit" id="hps_dpn" name="hps_dpn">Hapus Data Buku di Depan</button><br><br>

        <label for="hps_blkg">4. </label>
        <button type="submit" id="hps_blkg" name="hps_blkg">Hapus Data Buku di Belakang</button><br><br>

        <label for="tampil_data">5. </label>
        <button type="submit" id="tampil_data" name="tampil_data">Tampil Data Buku</button><br><br>

        <label for="reset">6. </label>
        <button type="submit" id="reset" name="reset">Reset Data Buku</button><br><br>
    </form>
    <br>
    <hr>
</body>
</html>
<?php
    $data = menu();

    if(isset($_POST['tambah_dpn'])){
        echo "<h3>Masukan Data Buku Untuk di Input di Depan: </h3>
                <form method ='post'>
                    <label for='judul_buku'>Judul Buku : </label>
                    <input type='text' id='judul_buku' name='judul_buku'>
                    <br><br>
                    <label for='harga_buku'>Harga Buku : </label>
                    <input type='number' id='harga_buku' name='harga_buku'>
                    <br><br>
                    <button type='submit' name='submit_buku_dpn'>Masukan Data</button>
                </form>";
    }elseif(isset($_POST['tambah_blkg'])){
        echo "<h3>Masukan Data Buku Untuk di Input di Belakang : </h3>
                <form method='post'>
                    <label for='judul_buku'>Judul Buku : </label>
                    <input type='text' id='judul_buku' name='judul_buku'>
                    <br><br>
                    <label for='harga_buku'>Harga Buku : </label>
                    <input type='number' id='harga_buku' name='harga_buku'>
                    <br><br>
                    <button type='submit' name='submit_buku_blkg'>Masukan Data</button>
                </form>";
    }elseif(isset($_POST['hps_dpn'])){
        HapusD($head, $empty);
    }elseif(isset($_POST['hps_blkg'])){
        HapusB($head, $empty);
    }elseif(isset($_POST['tampil_data'])){
        cetak($head, $empty);
    }elseif(isset($_POST['reset'])){
        clear($head, $empty);
    }
    
    if(isset($_POST['submit_buku_dpn'])){
        InsertD($head, $data, $empty);
    }elseif(isset($_POST['submit_buku_blkg'])){
        InsertB($head, $data, $empty);
    }
?>