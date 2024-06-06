<?php
session_start();
?>

<html>
<h2>SISTEM AKADEMIK POLITEKNIK NEGERI CILACAP</h2>
<h2></h2>
<ol>
    <li><a href="?menu=tambahmhs&nomenu=1">Input Data Mahasiswa</a></li>
    <li><a href="?menu=hapusmhs&nomenu=2">Hapus Data Mahasiswa</a></li>
    <li><a href="?menu=tampil&nomenu=3">Cetak Data Mahasiswa</a></li>

</ol>
<hr />

<?php
if (!isset($_SESSION['mahasiswa'])) {
    $_SESSION['mahasiswa'] = array();
}

if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];

    if ($menu == 'tambahmhs') {
        ?>
        <pre>
                    <h3>Input Data Mahasiswa</h3>
                    <form method="post">
                        <label>Nama Mahasiswa    : </label><input type="text" name="namamhs" required><br>

                        <label>Alamat            : </label><input type="text" name="alamat" required><br>

                        <label>Tahun Masuk       : </label><input type="number" name="tahun_masuk" required><br>

                        <label>Pilih Prodi       : </label>
                        <select name="prodi" required>
                            <option value="">Pilih Prodi</option>
                            <option value="1">D3 Teknik Informatika</option>
                            <option value="2">D3 Teknik Elektro</option>
                            <option value="3">D3 Teknik Mesin</option>
                            <option value="4">D3 Teknik Listrik</option>
                            <option value="5">D4 Teknik Pengendalian Pencemaran Lingkungan</option>
                            <option value="6">D4 Pengembangan Produk Agroindustri</option>
                        </select><br>

                        <label>Jalur Masuk       : </label>
                        <select name="jalur_masuk" required>
                            <option value="">Pilih Jalur Masuk</option>
                            <option value="1">SNMPN</option>
                            <option value="2">SNMPTN</option>
                            <option value="3">SBMPN</option>
                            <option value="4">SBMPTN</option>
                            <option value="5">MANDIRI</option>
                        </select><br>

                        <input type="submit" name="submit" value="Simpan Data">
                    </form>

                    <a href="genap.php">Kembali Ke Menu Utama</a>
        </pre>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $_SESSION['mahasiswa'][] = array(
                "nama" => $_POST['namamhs'],
                "alamat" => $_POST['alamat'],
                "tahun_masuk" => $_POST['tahun_masuk'],
                "prodi" => $_POST['prodi'],
                "jalur_masuk" => $_POST['jalur_masuk']
            );
            echo "<p>Data Mahasiswa berhasil ditambahkan</p>";
        }
    } else if ($menu == 'hapusmhs') {
        unset($_SESSION['mahasiswa']);
        echo 'Data Mahasiswa berhasil dikosongkan';
    } else if ($menu == 'tampil') {
        ?>
        <?php
        foreach ($_SESSION['mahasiswa'] as $mahasiswa) {
            echo "Nama Mahasiswa: " . $mahasiswa['nama'] . "<br>";
            echo "Alamat: " . $mahasiswa['alamat'] . "<br>";
            echo "Tahun Masuk: " . $mahasiswa['tahun_masuk'] . "<br>";
            $prodi = $mahasiswa['prodi'];
            switch ($prodi) {
                case 1:
                    echo "Prodi: D3 Teknik Informatika<br>";
                    break;
                case 2:
                    echo "Prodi: D3 Teknik Elektro<br>";
                    break;
                case 3:
                    echo "Prodi: D3 Teknik Mesin<br>";
                    break;
                case 4:
                    echo "Prodi: D3 Teknik Listrik<br>";
                    break;
                case 5:
                    echo "Prodi: D4 Teknik Pengendalian Pencemaran Lingkungan<br>";
                    break;
                case 6:
                    echo "Prodi: D4 Pengembangan Produk Agroindustri<br>";
                    break;
                default:
                    echo "Prodi tidak valid<br>";
            }
            $jalur_masuk = $mahasiswa['jalur_masuk'];
            switch ($jalur_masuk) {
                case 1:
                    echo "Jalur Masuk: SNMPN<br>";
                    break;
                case 2:
                    echo "Jalur Masuk: SNMPTN<br>";
                    break;
                case 3:
                    echo "Jalur Masuk: SBMPN<br>";
                    break;
                case 4:
                    echo "Jalur Masuk: SBMPTN<br>";
                    break;
                case 5:
                    echo "Jalur Masuk: MANDIRI<br>";
                    break;
                default:
                    echo "Jalur Masuk tidak valid<br>";
            }
            echo "<br>";
        }

        $jumlah = count($_SESSION['mahasiswa']);
        echo "Jumlah Data Mahasiswa : " . $jumlah . "<br>";
        ?>

                <br /><br /><a href="genap.php">Kembali Ke Menu Utama</a>
        <?php
    }

}
?>

</html>