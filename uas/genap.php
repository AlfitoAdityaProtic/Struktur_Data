<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLLCHT</title>
</head>

<body>
    <h1>Single Linked List Circular Head Tail</h1>
    <h3>Pilih Menu</h3>
    <ol>
        <li><a href="?menu=insertD">Tambah Data di depan</a></li>
        <li><a href="?menu=insertB">Tambah Data di belakang</a></li>
        <li><a href="?menu=deleteD">Hapus Data di depan</a></li>
        <li><a href="?menu=cetak">Cetak</a></li>
    </ol>
</body>

</html>

<?php

class Node
{
    public $data;
    public $next;
    // proses pembuatan node baru
    public function __construct($d)
    {
        $this->data = $d;
        $this->next = null;
    }
}

class SLLCH
{
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }
    // fungsi cek list empty
    public function LEmpty()
    {
        if ($this->head === null) {
            return true;
        } else {
            return false;
        }
    }
    //fungsi tambah data depan 
    public function insertD($d)
    {
        $newNode = new Node($d);
        if ($this->LEmpty()) {
            $newNode->next = $newNode;
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->tail->next = $newNode;
            $this->head = $newNode;
        }
    }
    //fungsi tambah data belakang
    public function insertB($d)
    {
        $newNode = new Node($d);
        if ($this->LEmpty()) {
            $newNode->next = $newNode;
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
    }
    //fungsi hapus data depan
    public function deleteD()
    {
        if (!$this->LEmpty()) {
            if ($this->head->next === $this->head) {
                $this->head = null;
                $this->tail = null;
            } else {
                $this->tail->next = $this->head->next;
                $this->head = $this->head->next;
            }
        }
    }
    //fungsi cetak data
    public function printList()
    {
        if ($this->LEmpty()) {
            echo "List kosong";
        } else {
            $temp = $this->head;
            do {
                echo $temp->data . " ";
                $temp = $temp->next;
            } while ($temp != $this->head);
        }
    }

}
//memasukan ke session
if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = new SLLCH();
}

function hapusD()
{
    $_SESSION['list']->deleteD();
}

if (isset($_GET['menu'])) {

    $menu = $_GET['menu'];
    //jika memilih menu pertama
    if ($menu == 'insertD') {
        ?>
        <h3>Tambah data di depan</h3>
        <form method="post">
            <label>Masukkan data :</label>
            <input type="text" name="data" required><br>
            <input type="submit" name="submit" value="Simpan Data">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST['data'];
            $_SESSION['list']->insertD($data);
            echo "<p>Data berhasil ditambahkan didepan.</p>";
        }
    }
    //perintah menu kedua
    elseif ($menu == 'insertB') {
        ?>
        <h3>Tambah data dibelakang</h3>
        <form method="post">
            <label>Masukkan data :</label>
            <input type="text" name="data" required><br>
            <input type="submit" name="submit" value="Simpan Data">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST['data'];
            $_SESSION['list']->insertB($data);
            echo "<p>Data berhasil ditambahkan dibelakang.</p>";
        }
    }
    //menu hapus depan
    elseif ($menu == 'deleteD') {
        if (!empty($_SESSION['list'])) {
            hapusD();
            echo "<p>Data pertama berhasil dihapus</p>";
        } else {
            echo "<p>List masih kosong</p>";
        }
    } elseif ($menu == 'cetak') {
        ?>
        <h3>Daftar data :</h3>
        <table>
            <?php
            $_SESSION['list']->printList();
            ?>
        </table>
        <?php
    }
}
?>