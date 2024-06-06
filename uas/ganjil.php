<?php

session_start();

class Node{
    public $data;
    public $next;
    public $prev;

    public function __construct($d){
        $this->data = $d;
        $this->next = $this->prev = null;
    }
}

class DLLNCH{
    public $head;

    public function __construct(){
        $this->head = null;
    }

    public function LEmpty(){
        return $this->head == null;
    }

    public function insertD($d){
        $newNode = new Node($d);

        if ($this->LEmpty()) {
            $this->head = $newNode;
        }else {
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
    }

    public function insertB($d){
        $newNode = new Node($d);

        if ($this->LEmpty()) {
            $this->head = $newNode;
        }else {
            $temp = $this->head;
            while ($temp->next != null) {
                $temp = $temp->next;
            }
            $temp->next = $newNode;
            $newNode->prev = $temp;
        }
    }

    public function hapusD(){
        if ($this->LEmpty()) {
            echo "data sudah kosong";
        }else {
            if ($this->head->next == null) {
                $this->head = null;
            }else {
                $hapus = $this->head;
                $this->head = $this->head->next;
                $this->head->prev = null;
                unset($hapus);
            }
        }
    }

    public function hapusB(){
        if ($this->LEmpty()) {
            echo "data sudah kosong";
        }else {
            if ($this->head->next == null) {
                $this->head = null;
            }else {
                $temp = $this->head;
                while ($temp->next->next != null) {
                    $temp = $temp->next;
                }
                $hapus = $temp->next;
                $temp->next = null;
                unset($hapus);
            }
        }
    }

    public function printList(){
        if ($this->LEmpty()) {
            echo "maaf data kosong";
        }else {
            echo "isi link list:";
            $current = $this->head;
            while ($current != null) {
                echo "<br>".$current->data;
                $current = $current->next;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ganjil</title>
</head>
<body>
    <h1>link list</h1>
    <form action="" method="get">
        <label for="insertD">Tambah data di depan</label><br>
        <input type="text" name="insertD" id="insertD"><br>
        <button name="insertDepan" id="insertDepan">Tambahkan</button><br>

        <label for="insertB">Tambah data di belakang</label><br>
        <input type="text" name="insertB" id="insertB"><br>
        <button name="insertBelakang" id="insertBelakang">Tambahkan</button><br>

        <label for="hapusD">Hapus data di depan</label><br>
        <button name="hapusDepan" id="hapusDepan">Hapus Depan</button><br>
        
        <label for="hapusB">Hapus data di belakang</label><br>
        <button name="hapusBelakang" id="hapusBelakang">Hapus Belakang</button><br>

        <label for="cetak">Cetak data</label><br>
        <button name="cetak" id="cetak">Cetak</button><br>
    </form>
</body>
</html>

<?php

if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = new DLLNCH();
}

if (isset($_GET['insertDepan'])) {
    $newData = $_GET['insertD'];
    $_SESSION['data']->insertD($newData);
}

if (isset($_GET['insertBelakang'])) {
    $newData = $_GET['insertB'];
    $_SESSION['data']->insertB($newData);
}

if (isset($_GET['hapusDepan'])) {
    $_SESSION['data']->hapusD();
}

if (isset($_GET['hapusBelakang'])) {
    $_SESSION['data']->hapusB();
}

if (isset($_GET['cetak'])) {
    $_SESSION['data']->printList();
}

// session_destroy();
print_r($_SESSION['data']);

?>