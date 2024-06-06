<?php 
session_start(); 
?>

<html>
<h2>SISTEM AKADEMIK POLITEKNIK NEGERI CILACAP</h2>
    <h2></h2>
    <ol>
        <li><a href="?menu=tambahmk&nomenu=1">Input Data Mata Kuliah</a></li>
        <li><a href="?menu=hapusmk&nomenu=2">Hapus Data Mata Kuliah</a></li>
        <li><a href="?menu=tampil&nomenu=3">Cetak Data Mata Kuliah</a></li>

    </ol>
    <hr/>
</html>

<?php
    if (!isset($_SESSION['matakuliah'])) {
        $_SESSION['matakuliah'] = array();
    }

    if(isset($_GET['menu'])) {
        $menu = $_GET['menu'];

        if($menu == 'tambahmk'){
            ?>
<pre>
            <h3>Input Data Mata Kuliah</h3>
<label>No Urut Matkul   : </label><input type="number" name="kodemk[no_urut]" required>

<label>Nama Matkul      : </label><input type="string" name="namamk[namamk]" required>

<label>SKS              : </label><input type="number" name="kodemk[sks]" required>

<label>Semester         : </label><input type="number" name="kodemk[smt]" required>

<label>Pilih Prodi      : </label>
<label>1. D3 Teknik Informatika</label>
<label>2. D3 Teknik Elektro</label>
<label>3. D3 Teknik Mesin</label>
<label>4. D3 Teknik Listrik</label>
<label>5. D4 Teknik Pengendalian Pencemaran Lingkungan</label>
<label>6. D4 Pengembangan Produk Agroindustri</label>
<input type="number" name="kode[kodep]" required>

<label>Pilih Teori/Praktek : </label>
<label>1. Teori</label>
<label>2. Praktek</label>
<input type="number" name="kode[tp]" required>
</pre>
            <form method="post">
                <br/><input type="submit" name="submit" value="Simpan Data">
            </form>

            <a href="index.php">Kembali Ke Menu Utama</a>
            <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $_SESSION['matakuliah'][] = array(
                    "kodemk" => array(//definisi array kodemk
                        "no_urut" => $_POST['kodemk']['no_urut'],
                        "sks" => $_POST['kodemk']['sks'],
                        "smt" => $_POST['kodemk']['smt'],
                        "kodep" => $_POST['kodemk']['kodep'],
                        "tp" => $_POST['kodemk']['tp']
                        //array kode mk tidak terbaca, error
                        //mohon maaf ibu, tapi saya gatau kenapa arraynya tidak terbaca
                    )
                );
                echo "<p>Mata Kuliah 1 berhasil ditambahkan</p>";
            }
        }
        else if($menu == 'hapusmk'){
            unset($_SESSION['matakuliah']);
            echo 'Data berhasil dikosongkan';
        }
        else if($menu == 'tampil'){
            ?>
            <?php                  
            foreach ($_SESSION['matakuliah'] as $record) {
                if (isset($record['kode']['no_urut']['sks']['smt']['kodep']['tp'])) {
                    echo "Saldo Rekening 1 : Rp. ".$record['kode']['no_urut']['sks']['smt']['kodep']['tp']. "<br>";
                }
                
            }

            $jumlah = 0;
            echo "Jumlah Data Mata kuliah : </br>". $jumlah."<br>";
            ?>

            <br/><br/><a href="index.php">Kembali Ke Menu Utama</a>
            <?php
        }
        
    }
?>
