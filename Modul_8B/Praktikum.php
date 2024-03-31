<?php
class Node{
    public $data;
    public $next;

    public function __construct($d){
        $this->data = $d;
        $this->next = null;
    }
}

//deklarasi SLLC
class SLLCH{
    public $head;
    public $tail;

    //inisialisasi
    public function __construct(){
        $this-> head = null;
        $this->tail= null;
    }

    //fungsi LEmpty
    public function LEmpty(){
        if ($this->head == null && $this->tail == null){
            return 1;
        }else{
            return 0;
        }
    }

    //fungsi untuk menambahkan data di depan
    public function insertD($d){
        $newNode = new Node($d);

        if($this->LEmpty()){ //kalo linked list kosonn
            $newNode->next = $newNode;
            $this -> head = $newNode;
            $this -> tail = $newNode;
        }else{ //jika linkedlist tidak kosong maka menjalankan fungsi dibaawah ini
            $newNode -> next = $this -> head;
            $this -> head = $newNode;
            $this -> tail = $this->head;
        }
    }

    //fungsi untuk menambahkan data di belakang
    public function insertB($d){
        $newNode = new Node($d);

        //jika linked list kosong
        if($this->LEmpty()){
            $newNode->next = $newNode;
            $this->head = $newNode;
            $this->tail = $newNode;
        }else{ //jika linked list ada isinya
            $this->tail->next = $newNode;
            $this->tail = $this->tail->next;
            $this -> tail ->next = $this->head;
        }
    }

    //fungsi untuk menghapus data di depan
    public function HapusD(){    
        if(!$this->LEmpty()){ //kalo linked list tidak kosong
            if($this->tail === $this->head){//kalo linked list cuma 1
                $this -> head = null;
                $this -> tail = null;
            }else { 
                $hapus = $this->head;
                $this -> head = $hapus->next;
                $this -> tail -> next = $this->head;
            }
        }
        
    }

    //fungsi yang menghapus data di belakang
    public function HapusB(){
        if(!$this->LEmpty()){//kalo linked list tidak kosong
            if($this->tail === $this->head){//kalo linked list cuma 1
                $this->head = null;
                $this->tail =null;
            }else{
                $temp = $this->head;
                $hapus = $this->tail;
                while($temp->next->next != $this->head){
                    $temp = $temp->next;
                }
                $this ->tail = $temp;
                $this->tail->next = $this->head;
            }
        }
    }

    //fungsi untuk mencetak semua isi linked list
    public function printList(){
        if ($this->LEmpty()){
            echo "List Kosong";
        }else {
            $temp =$this ->head;
            do{
                echo $temp->data . " ";
                $temp = $temp->next;
            }while($temp != $this->head);
        }
    }

    //fungsi untuk menghapus seluruh data
    public function clear(){
         if($this->LEmpty()){
            echo "Linked List Kosong ";
            return;
         }
         $temp = $this->head;
         $hapus = null;

         do{
            $hapus = $temp;
            $temp = $temp->next;
            unset($hapus);
         }while($temp != $this->head);

         $this->head = null;
         $this->tail = null;
         echo "Linked list Berhasil dihapuss gaesss";
    }
}

//output
$CL = new SLLCH();
$CL -> insertD(11);
$CL -> insertD(22);
$CL -> insertD(33);
$CL -> insertB(44);
echo "ISI Linked List : ";
$CL -> printList();

echo "<hr><br>Hapus Node Pertama<br>";
$CL -> HapusD();
echo "Isi Linked List Setelah Dihapus : ";
$CL -> printList();

echo "<hr><br>Hapus Node Terakhir<br>";
$CL -> HapusB();
echo "Isi Linked List setelah Dihapus : ";
$CL -> printList();

echo "<hr><br>Hapus semua<br>";
$CL->clear();
echo "Isi Linked List setelah dihapus : ";
$CL->printList();
?>