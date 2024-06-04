<?php
// deklarasi double link list non circular
class Node
{
    public $data;
    public $next;
    public $prev;

    // pembentukan node baru
    public function __construct($d)
    {
        $this->data = $d;
        $this->next = null;
        $this->prev = null;
    }
}
// pembuatan class double link list non circular head
class DLLNCH
{
    // inisialisasi
    public function __construct()
    {
        $this->head = null;
        $this->prev = null;
    }
    // membuat fungsi link list empty
    public function LEmpty()
    {
        if ($this->head == null)
            return 1;
        else
            return 0;
    }

    // membuat fungsi untuk menambahkan data di depan
    public function insertD($d)
    {
        $newNode = new Node($d);

        if ($this->LEmpty()) {
            $this->head = $newNode;
        } else {
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
    }
    // membuat fungsi untuk menambahkan data di belakang
    public function insertB($d)
    {
        $newNode = new Node($d);

        if ($this->LEmpty()) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $temp = $this->head;
            while($temp->next != null){
                $temp = $temp->next;
            }
            $temp->next = $newNode;
            $newNode->prev = $temp;
            $newNode->next = null;
        }
    }

    // membuat fungsi untuk menghapus data di depan
    public function HapusD(){
        if (!$this->LEmpty()){
            if($this->head->next == null){
               $this->head = $this->tail = null;
            }else{
                $hapus = $this->head;
                $this->head = $this->head->next;
                $this->head->prev = null;
                $hapus->next = null;
                unset ($hapus);
            }
        }else{
            echo "<br>List Kosong";
        }
    }

    // membuat fungsi untuk menghapus data di belakang
    public function HapusB(){
        if ($this->head == null) {
            echo "Linked List kosong\n";
            return;
        }
        if ($this->head->next == null){
            $this->head = null;
            return;
        }else{
            $temp = $this->head;
            while ($temp->next->next != null){
                $temp = $temp->next;
            }
            $hapus = $temp->next;
            $temp->next = null;
            $hapus->prev = null;
            unset ($hapus);
        }
    }

    // fungsi untuk menampilkan data yang dimasukan
    public function printList(){
        if ($this->head == null){
            echo "Linked List kosong\n";
            return;
        }
        $current = $this->head;
        while ($current != null){
            echo $current->data . " ";
            $current = $current->next;
        }
        echo "\n";
    }

    // fungsi untuk menghapus semua data
    public function clear(){
        if ($this->LEmpty()){
            echo "Link List Kosong\n";
            return;
        }
        $temp = $this->head;
        $hapus = null;

        do{
            $hapus = $temp;
            $temp = $temp->next;
            unset ($hapus);
        }while ($temp != null);
        $this->head = null;
        echo "link list berhasil dihapus\n";
    }
}

// hasil program menggunakan code di atas
$a = new DLLNCH();
$a->insertD(11);
$a->insertD(55);
$a->insertD(33);
$a->insertD(44);
$a->insertB(00);

echo "Isi Linked List : ";
$a->printList();

echo "<hr><br>Hapus Node Pertama<br>";
$a->HapusD();
echo "Isi Linked List setelah dihapus: ";
$a->printList();

echo "<hr><br>Hapus node terakhir<br>";
$a->HapusB();
echo "isi link list setelah dihapus: ";
$a->printList();

echo "<hr><br>Hapus semua node<br>";
$a->clear();
echo "<br>isi Linked list setelah dihapus: ";
$a->printList();
?>