<?php

class Node{
    public $data, $next;
    public function __construct($d){
        $this->data = $d;
    }
}

class sllncht{
    private $head, $tail;

    public function isEmpty(){
        return $this->head == null;
    }
    public function insertD($d){
        $newNode = new Node($d);
        if($this->isEmpty()){
            $this->head = $this->tail = $newNode;
        }
        $newNode->next = $this->head;
        $this->head = $newNode;

    }
    public function insertB($d){
        $newNode = new Node($d);
        if($this->isEmpty()){
            $this->head = $this->tail = $newNode;
        }
        $this->tail->next = $newNode;
        $this->tail = $this->tail->next;
    }
    public function deleteD(){
        if( $this->isEmpty()){
            echo "Link list kosong";
        }
        $del = $this->head;
        $this->head = $this->head->next;
        unset($del);
    }
    public function deleteB(){
        if( $this->isEmpty()){
            echo "link list kosong";
            return;
        }
        $del = $this->tail;
        $prev = $this->head;
        while($prev->next->next != null){
            $prev = $prev->next;
        }
        $this->tail = $prev;
        $this->tail->next = null;
        unset($del);
    }
}
$p = new sllncht();
$p->insertD(9);
$p->insertD(8);
$p->insertD(7);
$p->insertb(10);
$p->deleteB();
print_r($p);