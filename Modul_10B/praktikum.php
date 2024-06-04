<?php 
// deklarasi DLLCHT
    class node {
        public $data;
        public $next;
        public $prev;

    // pembentukan node baru
        public function __construct($d){
            $this->data = $d;
            $this->next = $this;
            $this->prev = $this;
        }
    }
    
    class DLLNCHT {
        private $head;
        private $tail;
    
    // inisialisasi
    public function __construct(){
        $this->head = null;
        $this->tail = null;
    }

    // fungsi untuk mengecek apakah link itu kosong atau tidak
    public function LEmpty(){
            if ($this->head == null){
                return 1;
            }else{ 
                return 0;
            }   
        }

    // fungsi untuk menambahkan data di depan link list
    public function insertD($d){
        $newNode = new Node($d);
        // $newNode->data = $d;
        // $newNode->next = $newNode;
        // $newNode->prev = $newNode;

        if($this->LEmpty())
        {
            $this->head = $newNode;
            $this->tail = $newNode;
            $this->head->next = $this->head;
            $this->tail->prev = $this->head;
        }else
        {
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
            $this->head->prev = $this->tail;
            $this->tail->next = $this->head;
        }
    }

    // fungsi untuk menambahkan data di belakang link list
    public function insertB($d) 
    {
        $newNode = new Node($d);
        // $newNode->data = $d;
        // $newNode->next = $newNode;
        // $newNode->prev = $newNode;
        if ($this->LEmpty())
        {
            $this->head = $newNode;
            $this->tail = $newNode;
            $this->head->next = $this->head;
            $this->head->prev = $this->head;
        }else
        {
            $this->tail->next = $newNode;
            $newNode->prev = $this->tail;
            $this->tail = $newNode;
            $this->tail->next = $this->head;
            $this->head->prev = $this->tail;
        }
    }

    // fungsi untuk menghapus data di depan link list
    public function HapusD(){
        if (!$this->LEmpty()){
            if($this->head->next == $this->head){
               $this->head = $this->tail = null;
            }else
            {
                $hapus = $this->head;
                $this->head = $this->head->next;
                $this->tail->next = $this->head;
                $this->head->prev = $this->tail;
                unset ($hapus);
            }
        }else
        {
            echo "<br>LIST kosong";
        }
    }

    //fungsi untuk menghapus data di belakang link list
    public function HapusB(){
        if($this->head == null){
            echo "Linked List Kosong\n";
            return;
        }
        if($this->head->next == $this->head){
            $this->head = $this->tail = null;
            return;
        }else
        {
            $hapus = $this->tail;
            $this->tail = $this->tail->prev;
            $this->head->next = $this->head;
            $this->head->prev = $this->tail;
            unset($hapus);
        }
    }

    // fungsi untuk menampilkan data double link list circular HEAD and TAIL
    public function printList(){
        $current = $this->head;
        if (!$this->LEmpty())
        {
            do{
                echo $current->data . " ";
                $current = $current->next;
            }while($current != $this->head);
        }else
        {echo "<br>List Kosong";}
    }

    // fungsi untuk menghapus data double link list circular HEAD and TAIL
    public function clear()
    {
        if($this->LEmpty())
        {
            echo "Link List kosong\n";
            return;
        }
        $temp = $this->head;
        $hapus = null;
        do {
            $hapus = $temp;
            $temp = $temp->next;
            unset ($hapus);
        }while ($temp != $this->head);
        $this->head = null;
        echo "Link List berhasil dihapus\n";
    }
}

// output yang muncul menggunakan codingan di atas
$CL = new DLLNCHT();
$CL->insertD(11);
$CL->insertD(55);
$CL->insertB(33);
$CL->insertB(44);
echo "Isi Linked List: ";
$CL->printList();

echo "<hr><br>Hapus Node Pertama<br>";
$CL->HapusD();
echo "Isi Linked list setelah dihapus: ";
$CL->printList();

echo "<hr><br>Hapus Node Terakhir<br>";
$CL->HapusB();
echo "Isi Linked List setelah dihapus: ";
$CL->printList();

echo "<hr><br>Hapus semua Node<br>";
$CL->clear();
echo  "<hr><br>Isi Linked List setelah dihapus: ";
$CL->printList();
?>