<?php 
session_start();
?>

<html>
    <h2>SISTEM AKADEMIK POLITEKNIK NEGERI CILACAP</h2><br>
    <ol>
        <li><a href="?menu=tmbhmhs">Input Data Mahasiswa</a></li>
        <li><a href="?menu=hpsmhs">Hapus Data Mahasiswa</a></li>
        <li><a href="?menu=tampil">Cetak Data Mahasiswa</a></li>
    </ol><hr>

<?php 
if (!isset($_SESSION['mahasiswa'])){
    $_SESSION['mahasiswa'] = array();
}

if (isset($_GET['menu'])){
    $menu = $_GET['menu'];
    if ($menu == "tmbhmhs"){
    ?>
        <pre>
            <h3>Input data mahasiswa</h3><br>
            <form action="" method="POST">
                <label for="">Nama Mahasiswa    : </label><input type="text" name="nama" required>

                <label for="">Alamat            : </label><input type="text" name="alamat" required>
                
                <label for="">Tahun Masuk       : </label><input type="number" name="tahun_msk" required>

                <label for="">pilih prodi       : </label><br>
                <select name="prodi" id="" required>
                    <option value="">pilih prodi</option>
                    <option value="1">D3 Teknik Informatika</option>
                    <option value="2">D3 Teknik Elektro</option>
                    <option value="3">D3 Teknik Mesin</option>
                    <option value="4">D3 Teknik Listrik</option>
                    <option value="5">D4 Teknik Pengendalian Pencemaran Lingkungan</option>
                    <option value="6">D4 Pengembangan Produk Agroindustri</option>
                    <option value="7">D4 Rekayasa Keamanan Siber</option>
                </select><br>

                <label for="">Jalur Masuk       : </label>
                <select name="jalur_masuk" id="" required>
                    <option value="">Pilih jalur masuk</option>
                    <option value="1">SNMPTN</option>
                    <option value="2">SBMPTN</option>
                    <option value="3">SNMPN</option>
                    <option value="4">SBMPN</option>
                    <option value="5">MANDIRI</option>
                </select><br>

                <input type="submit" name="submit" value="Simpan Data"><br><br>

                <a href="latihan.php">Kembali Ke Menu Utama</a>
            </form>
        </pre>
        <?php
     
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $_SESSION['mahasiswa'][] = array(
                'nama'=> $_POST['nama'],
                'alamat'=> $_POST['alamat'],
                'tahun_msk'=> $_POST['tahun_msk'],
                'prodi'=> $_POST['prodi'],
                'jaslur_masuk'=> $_POST['jalur_masuk'],
            );
            echo "Data Mahasiswa Berhasil Ditambahkan";
        }
    
    }else if ($menu == 'hpsmhs') {
        unset($_SESSION['mahasiswa']);
        echo 'Data Mahasiswa Berhasil Dikosongkan';
    }else if ($menu == 'tampil') {
        ?>
        <?php 
         foreach ($_SESSION['mahasiswa'] as $mahasiswa) {
            echo "Nama Mahasiswa: " . $mahasiswa["nama"] ."br";
            echo "Alamat: " . $mahasiswa["alamat"] ."br";
            echo "Tahun Masuk: ". $mahasiswa["tahun_msk"] ."br";
            $prodi = $mahasiswa['prodi'];
            switch ($prodi) {
                case '1':
                    echo "Prodi : D3 Teknik Informatika<br>";
                    break;
                case '2':
                    echo "Prodi : D3 Teknik Elektro<br>";
                    break;
                case '3':
                    echo "Prodi : D3 Teknik Mesin<br>";
                    break;
                case '4':
                    echo "Prodi : D3 Teknik Listrik<br>";
                    break;
                case '5':
                    echo "Prodi : D4 Teknik Pengendalian Pencemaran Lingkungan<br>";
                    break;
                case '6':
                    echo "Prodi : D4 Teknik Pengembangan Produk Agroindustri<br>";
                    break;
                case '7':
                    echo "Prodi : D4 Rekayasa Keamanan Siber<br>";
                    break;
                default:
                    echo "prodi tidak valid<br>";
                    break;
            }
            $jalur_masuk = $mahasiswa['jalur_masuk'];
            switch ($jalur_masuk) {
                case '1':
                    echo "Jalur Masuk: SNMPTN<br>";
                    break;
                case '2':
                    echo "Jalur Masuk: SBMPTN<br>";
                    break;
                case '3':
                    echo "Jalur Masuk: SNMPN<br>";
                    break;
                case '4':
                    echo "Jalur Masuk: SBMPN<br>";
                    break;
                case '5':
                    echo "Jalur Masuk: MANDIRI<br>";
                    break;    
                default:
                    echo "jalur masuk tidak valid<br>";
                    break;
            }
            echo "<br>";
         }
         $jumlah = count($_SESSION['mahasiswa']);
         echo "jumlah Data Mahasiswa : " . $jumlah. "<br>";
        ?>

        <br><br><a href="latihan.php">Kembali ke menut utama</a>
        <?php 
    }
}
    
?>
</html>