<?php
session_start();

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
    public $head;
    public $tail;

    public function __construct(){
        $this->head = null;
        $this->tail = null;
    }

    public function isEmpty()
    {
        if($this->head == null && $this->tail == null){
            return true;
        }else{
            return false;
        }
    }

    public function insertD($d)
    {
        $newNode = new Node($d);
        if ($this->isEmpty()) {
            $newNode->next = $newNode;
            $this->head = $this->tail = $newNode;
        }else{
            $newNode->next = $this->head;
            $this->head = $newNode;
            $this->tail = $this->head;
        }
        
    }

    public function insertB($d)
    {
        $newNode = new Node($d);
        if ($this->isEmpty()) {
            $newNode->next = $newNode; 
            $this->head = $this->tail = $newNode;
        }else{
            $this->tail->next = $newNode;
            $this->tail = $this->tail->next;
            $this->tail->next = $this->head;
        }
        
    }

    public function hapusD()
    {
        if ($this->isEmpty()) {
            echo "Link List kosong";
            return;
        }
        $del = $this->head;
        $this->head = $this->head->next;
        unset($del);
    }
    
    public function cetak()
    {
        if ($this->isEmpty()) {
            echo "Maaf data Kosong";
        } else {
            $temp = $this->head;
            do {
                echo "Isi Link List : ";
                $temp = $temp->next;
            }while($temp != $this->head);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>+++++Single Link List Circular dengan HEAD dan TAIL+++++</h3><br><br>

    <h3>MENU : </h3>
    <form action="">
        <ol>
            <li><label for="insertD">TAMBAH DATA DI DEPAN</label></li>
            <input type="text" name="insertD" id="insertD">
            <li><label for="insertB">TAMBAH DATA DI BELAKANG</label></li>
            <input type="text" name="insertB" id="insertB">
            <li><a href="">HAPUS DATA DEPAN</a></li>
            <li><a href="">CETAK DATA</a></li>
        </ol>
    </form>

</body>

</html>