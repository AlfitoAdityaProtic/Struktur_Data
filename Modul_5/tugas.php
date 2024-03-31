<?php
session_start();

//QUEUE/ANTRIAN
define ("MAX",6);

//deklarasi queue/antrian
if(!isset($_SESSION['antrian'])) {
    $_SESSION['antrian'] = array (
        'head' => -1,
        'tail' => -1,
        'data' => array()
    );
}

$Q = $_SESSION['antrian'];

//prosedure untuk inisialisasi/memberikan nilai awal
//menyatakan bahwa antrian masih KOSONG
function inisialisais(){
    global $Q;

    $Q['head'] = $Q['tail'] = -1;
}

//preosedure untuk menambah/Enqueue isi antrian
function enqueue($d){
    global $Q;
    if (isFull() == 0){
        if (isEmpty() == 1){
            $Q['head'] = 0;
        }
            $Q['tail']++;
            $Q['data'][$Q['tail']] = $d;
            echo "<br>Data Telah Ditambahkan ke antrian.";
            $_SESSION['antrian'] = &$Q;
    }else{
        echo "<br> Maaf Antrian sudah penuh";
    }
}

//prosedur untuk menghapus/dequeue elemen antrian
function dequeue(){
    global $Q;

    if(isEmpty() !=1){
        echo "<br> Data yang keluar dari antrian : ", $Q['data'][$Q['head']];
        for ($i=$Q['head']; $i<$Q['tail']; $i++){
            $Q['data'][$i] = $Q['data'][$i + 1];
        }
        $Q['tail']--;
        $_SESSION['antrian'] = $Q;
    }else{
        echo "<br>Maaf, Antrian Kosong.";
    }
}

//fungsi untuk cek apakah antrian penuh/tidak
function isFull(){
    global $Q;
    if($Q['tail'] == MAX-1){
        return 1; //true/penuh
    } else{
        return 0; //false/ tidak penuh
    }
}


//fungsi untuk cek apakah antrian kosong/tidak
function isEmpty(){
    global $Q;
    if($Q['tail'] == -1){
        return 1;
    } else{
        return 0;
    }
}

//prosedure menghapus semua elemen antrian
function clear(){
    global $Q;
    $Q['head'] = $Q['tail'] = -1;
    $_SESSION['antrian'] = $Q;
}

//prosedure cetak elemen antrian
function cetak(){
    global $Q;
    if($Q['tail'] != -1){
        echo "<br>Antrian:";
        for($i=$Q['head']; $i <=$Q['tail'];$i++){
            echo "<br> Antrian ke ".($i+1). ": ", $Q['data'][$i], " ";
        }
    }else{
    echo "<br>Antrian Kosong !!!!!";}
}

//Pilihan Menu antrian
$menuUtama = isset($_POST['menu']) ? $_POST['menu'] : '';

//Memproses pilihan menu
switch ($menuUtama){
    case '1':
    //nambah data antrian
        echo "<h3>Tambah Data Antrian</h3>";
        echo '<form action ="" method="post">
                <label for = "nama">Nama :</label>
                <input type="text" id="nama" name="nama"><br><br>

                <label for="rekening">Nomor Rekening</label>
                <input type="text" id="nomer" name="nomer"><br><br>
                <input type="submit" name="tambah" value="tambah">
                <input type="submit" name="menu_utama" value="menu utama">
                </form>';
        break;
    case '2':
        //Hapus Data Antrian
        echo "<h3>Hapus Data Antrian</h2>";
        dequeue();
        echo "<br/>";
        echo '<form action="" method="post">
        <input type="submit" value="menu utama">
        </form>';
        break;
    case '3':
        // kode Membersihkan Antrian
        echo "<h3>Bersihkan Antrian</h3>";
        clear();
        echo "<br>";
        echo '<form action="" method="post">
        <input type="submit" value="menu utama">
        </form>';
        break;
    case '4':
        // Cetak antrian
        echo "<h2>Menu Cetak Antrian</h2>";
        cetak();
        echo"<br>";
        echo '<form action="" method="post">
        <input type="submit" value="menu utama">
        </form>';
        break;
    default:
        // form html untuk menu utama yang ditampilkan
        echo "<h3>Menu Pada ANTRIAN :<h3>";
        echo '<form action="" method="post">
                <label for"menu">Pilih Menu :</label>
                <select id="menu" name="menu" >
                    <option value="1">Tambah Data Antrian</option>
                    <option value="2">Hapus Data Antrian</option>
                    <option value="3">Bersihkan Antrian</option>
                    <option value="4">Cetak Antrian</option>
                </select>
                <input type="submit" value="pilih">
            </form>';
        break;
}

//kondisi yang berjalan jika tombol tambah di tekan
if(isset($_POST['tambah']) && isset($_POST['nama']) && isset($_POST['nomer'])){
    $nama = $_POST['nama'];
    $rekening = $_POST['nomer'];
    enqueue($nama . ' - ' . $rekening);
}
?>