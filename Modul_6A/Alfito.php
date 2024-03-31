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

        print_r($temp);
        while($temp != null){
            echo "Judul Buku: " .$temp['data']['judul']. "<br>".
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
        <select name="menu">
            <option value="tambah_dpn">Tambah Data Buku di Depan</option><br><br>
            <option value="tambah_blkg">Tambah Data Buku di Belakang</option><br><br>
            <option value="hps_dpn">Hapus Data Buku di Depan</option><br><br>
            <option value="hps_blkg">Hapus Data Buku di Belakang</option><br><br>
            <option value="tampil_data">Tampil Data Buku</option><br><br>
            <option value="reset">Reset Data Buku</option><br><br>
        </select>
        <button type="submit">submit</button>
    </form>
    <br>
    <hr>
</body>
</html>
<?php
    $data = menu();

    $menuUtama = isset($_POST['menu']) ? $_POST['menu'] : '';
    
    switch ($menuUtama){
        case 'tambah_dpn':
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
            break;
        case 'tambah_blkg':
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
                break;
        case 'hps_dpn':
            HapusD($head, $empty);
            break;
        case 'hps_blkg':
            HapusB($head, $empty);
            break;
        case 'tampil_data':
            //menampilkan data
            cetak($head, $empty);
            break;
        case 'reset':
            clear($head, $empty);
            break;
    }
    if(isset($_POST['submit_buku_dpn'])){
        InsertD($head, $data, $empty);
    }elseif(isset($_POST['submit_buku_blkg'])){
        InsertB($head, $data, $empty);
    }
?>
