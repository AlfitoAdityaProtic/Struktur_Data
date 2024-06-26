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
    <h3>+++++Single Link List Circular dengan HEAD dan TAIL+++++</h3><br><br>

    <h3>MENU : </h3>
    <ol>
        <li><a href="?menu=insertD">TAMBAH DATA DI DEPAN</a></li>
        <li><a href="?menu=insertB">TAMBAH DATA DI BELAKANG</a></li>
        <li><a href="?menu=hapusD">HAPUS DATA DEPAN</a></li>
        <li><a href="?menu=tampil">CETAK DATA</a></li>
    </ol>
</body>

</html>
<?php
class Node
{
    public $data;
    public $next;

    public function __construct($d)
    {
        $this->data = $d;
        $this->next = null;
    }
}

class SLLCHT
{
    private $head,$tail;
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }

    public function isEmpty()
    {
        if ($this->head == null) {
            return true;
        } else {
            return false;
        }
    }

    public function insertD($d)
    {
        $newNode = new Node($d);
        if ($this->isEmpty()) {
            $newNode->next = $newNode;
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->tail->next = $newNode;
            $this->head = $newNode;
        }
    }

    public function insertB($d)
    {
        $newNode = new Node($d);
        if ($this->isEmpty()) {
            $newNode->next = $newNode;
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }

    }

    public function hapusD()
    {
        if (!$this->isEmpty()) {
            if ($this->head->next === $this->head) {
                $this->head = null;
                $this->tail = null;
            } else {
                $this->tail->next = $this->head->next;
                $this->head = $this->head->next;
            }
        }
    }

    public function tampil()
    {
        if ($this->isEmpty()) {
            echo "Maaf data Kosong <br>";
            return;
        }
        $temp = $this->head;
        echo "isi Link List : <br>";
        while ($temp->next !== $this->head) {
            echo $temp->data . "<br>";
            $temp = $temp->next;
        }
        echo $temp->data;
    }

}

if (!isset($_SESSION['list'])) {
    $_SESSION['list'] = new SLLCHT();
}

function deleteD()
{
    $_SESSION['list']->hapusD();
}

if (isset($_GET['menu'])) {
    $menu = $_GET['menu'];
    if ($menu == 'insertD') {
        ?>
        <h3>Tambah Data di Depan</h3>
        <form method="post">
            <label for="">Masukan Data</label><br><br>
            <input type="text" name="data" required><br><br>
            <input type="submit" name="submit" value="Simpan Data">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST['data'];
            $_SESSION['list']->insertD($data);
            echo "<p>Data berhasil ditambahkan di depan</p>";
        }
    } elseif ($menu == "insertB") {
        ?>
        <h3>Tambah Data di Belakang</h3>
        <form method="post">
            <label for="">Masukan Data : </label><br><br>
            <input type="text" name="data" required><br><br>
            <input type="submit" name="submit" value="Simpan Data">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = $_POST['data'];
            $_SESSION['list']->insertB($data);
            echo "<p>Data berhasil ditambahkan di Belakang</p>";
        }
    } elseif ($menu == "hapusD") {
        if (!empty($_SESSION['list'])) {
            $_SESSION['list']->hapusD();
            echo "<p>Data pertama berhasil dihapus</p>";
        } else {
            echo "<p>Data link list masih kosong</p>";
        }
    } elseif ($menu == "tampil") {
        ?>
        <h3>Daftar Data : </h3><br>
        <table>
            <?php
            $_SESSION['list']->tampil();
            ?>
        </table>
        <?php
    }
}
?>