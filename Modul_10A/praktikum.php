<?php
// deklarasi DLLC
class Node
{
    public $data;
    public $next;
    public $prev;

    // pembentukan node baru
    public function __construct($d)
    {
        $this->data = $d;
        $this->next = $this;
        $this->prev = $this;
    }
}
class DLLCH
{
    // pembentukan node baru
    public function __construct()
    {
        $this->head = null;
    }
    // fungsi untuk mengecek apakah link itu kosong atau tidak
    public function LEmpty()
    { //jika kosong akan bernilai benar
        if ($this->head == null)
            return 1;
        else //jika tidak kosong bernilai salah atau false
            return 0;
    }
    // fungsi untuk menambahkan data di depan link list
    public function insertD($d)
    {
        $newNode = new Node($d);
        // $newNode->data = $d;
        // $newNode->next = $newNode;
        // $newNode->prev = $newNode;
        if ($this->LEmpty()) { //kondisi jika awal link list kosong
            $this->head = $newNode;
            $this->head->next = $this->head;
            $this->head->prev = $this->head;
        } else { //jika kondisi awal link list sudah ada isinya
            $temp = $this->head->prev;
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
            $this->head->prev = $temp;
            $temp->next = $this->head;
        }
    }
    // fungsi untuk menambahkan data di belakang link list
    public function insertB($d)
    {
        $newNode = new Node($d);
        // $newNode->data = $d;
        // $newNode->next = $newNode;
        // $newNode->prev = $newNode;

        if ($this->LEmpty()) { //kondisi jika awal link list kosong
            $this->head = $newNode;
            $this->head->next = $this->head;
            $this->head->prev = $this->head;
        } else {//jika kondisi awal link list sudah ada isinya
            $temp = $this->head->prev;
            $temp->next = $newNode;
            $newNode->prev = $temp;
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
        }
    }
    // fungsi untuk menghapus data di depan link list
    public function HapusD()
    {
        if (!$this->LEmpty())
        {
            if ($this->head->next == $this->head){ //jika kondisi awal link list hanya terdapat 1 datanya saja
                $this->head = null;
            } else { //jika kondisi awal link list memiliki 2 data atau lebih maka akan menjalankan perintah berikut
                $hapus = $this->head;
                $temp = $hapus->prev;
                $this->head = $this->head->next;
                $temp->next = $this->head;
                $this->head->prev = $temp;
                unset ($hapus);
            }
        }else{ //jika kondisi awal link list kosong
            echo "<br>LIST Kosong";
        }
    }
    //fungsi untuk menghapus data di belakang link list
    public function HapusB(){
        if ($this->head == null){ //jika kondisi awal link list kosong
            echo "Linked List Kosong\n";
            return;
        }
        if ($this->head->next == $this->head){ //jika kondisi awal link list berisi setidaknya 1 data
            $this->head = null;
            return;
        }else{ //jika kondisi awal link list berisi 2 data atau lebih
            $hapus = $this->head->prev;
            $temp = $hapus->prev;
            $temp->next = $this->head;
            $this->head->prev = $temp;
            unset ($hapus);
        }
    }

    // fungsi untuk menampilkan data double link list circular
    public function printList (){
        $current = $this->head;
            if(!$this->LEmpty()){//kondisi jika link list tidak kosong maka
                do{ //mencetak link list satu persatu
                    echo $current->data . " ";
                    $current = $current->next;
                }while ($current != $this->head);
            }else{ //kondisi jika link list kosong
                echo "<br>List Kosong";
            }
    }

    // fungsi untuk menghapus data double link list circular
    public function clear(){
        if ($this->LEmpty()){ //jika kondisi link list kosong
            echo "Link List kosong\n";
            return;
        }
        $temp = $this->head;
        $hapus = null;
        do { //akan menghapus isi link list satu per satu
            $hapus = $temp;
            $temp = $temp->next;
            unset ($hapus);
        }while ($temp != $this->head);
        $this->head = null;
        echo "Link List berhasil dihapus\n";
    }
}

// output yang muncul menggunakan codingan di atas
$a = new DLLCH();
$a->insertD(11);
$a->insertD(55);
$a->insertB(33);
$a->insertB(44);
echo "Isi Link List adalah : ";
$a->printList();

echo "<hr><br>Hapus Node pertama<br>";
$a->HapusD();
echo "isi link list setelah dihapus : ";
$a->printList();

echo "<hr><br>Hapus Node terakhir<br>";
$a->HapusB();
echo "Isi Link List setelah dihapus : ";
$a->printList();

echo "<hr><br>Hapus semua node<br>";
$a->clear();
echo "<hr><br>isi link list setelah dihapus: ";
$a->printList();
?>