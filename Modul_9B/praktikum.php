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
// pembuatan class double link list non circular head dan tail
class DLLNCH
{
    // inisialisasi
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
    }

    // membuat fungsi link list empty
    public function LEmpty()
    {
        if ($this->head == null && $this->tail == null)
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
            $this->tail = $newNode;
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

        if ($this->LEmpty())
        {
            $this->head = $newNode;
            $this->tail = $newNode;
        }else {
            $this->tail->next = $newNode;
            $newNode->prev = $this->tail;
            $this->tail = $newNode;
        }
    }

    // membuat fungsi untuk menghapus data di depan
    public function HapusD(){
        if(!$this->LEmpty()){
            if ($this->head->next == null){
                $this->head = $this->tail = null;
            }else{
                $hapus = $this->head;
                $this->head = $this->head->next;
                $this->head->prev = null;
                unset($hapus);
            }
        }else {
            echo "<br>List Kosong";
        }
    }

    // membuat fungsi untuk menghapus data di belakang
    public function HapusB()
    {
        if ($this->head == null){
            echo "Linked List Kosong\n";
            return;
        }
        if ($this->head == $this->tail){
            $this->head = null;
            $this->tail = null;
            return;
        }
        $newTail = $this->tail->prev;
        $newTail->next = null;
        unset ($this->tail);
        $this->tail = $newTail;
    }

    // fungsi untuk menampilkan data yang dimasukan
    public function printList(){
        if($this->head == null){
            echo "linked List Kosong\n";
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
    public function clear()
    {
        if($this->LEmpty()){
            echo "Link List kosong\n";
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
        $this->tail = null;
        echo "Linked List berhasil dihapus\n";
    }
}

// hasil program menggunakan code di atas
$a = new DLLNCH();
$a-> insertD(11);
$a-> insertD(55);
$a-> insertB(33);
$a-> insertB(44);
echo "Isi Linked List : ";
$a->printList();

echo "<hr><br>Hapus node Pertama<br>";
$a->HapusD();
echo "Isi Linked List setelah dihapus : ";
$a->printList();

echo "<hr><br>Hapus node Terakhir<br>";
$a->HapusB();
echo "Isi Linked List setelah dihapus : ";
$a->printList();

echo "<hr><br>Hapus semua node<br>";
$a->clear();
echo "<br>Isi Linked List setelah dihapus : ";
$a->printList();

