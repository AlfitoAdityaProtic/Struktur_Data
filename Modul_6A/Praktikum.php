<?php
//Single Linked List Non Circular dengan Head
//Deklarasi Linked List
$node = array(
    'data' => null,
    'next' => null
);

$head = null;

//prosedur Inisialisasi
function Inisialisasi(){
    global $head;
    $head = null;
}

//fungsi LEmpty
function LEmpty($head){
    if($head == null){
        return 1;
    }else{
        return 0;
    }
    
}

//prosedur menyisipkan data ke dalam linked list (depan)
function InsertD($d){
    global $head;
    $baru = array(
        'data' => $d,
        'next' => null
    );

    if(LEmpty($head) == 1){
        $head = $baru;
        $head['next'] = null;
    }else{
        $baru['next'] = $head;
        $head = $baru;
    }
}

//prosedur tambah data linked list (belakang)
function InsertB($d){
    global $head;
    $baru = array(
        'data' => $d,
        'next' => null
    );
    if($head === null){
        $head = $baru;
    }else {
        $temp = $head;
        while ($temp['next'] != null){
            $temp = $temp['next'];
        }
        $temp['next'] = $baru;
    }
}

//Prosedur untuk melakukan hapus depan linked list
function HapusD(){
    global $head;
    if(LEmpty($head)==0){
        if($head['next'] != null){
            $temp = $head;
            $head = $head['next'];
            unset ($temp);
        }else{
            $head = null;
        }
    }else{
        echo "<br>List Kosong";
    }
} 

//Prosedur Hapus Semua Elemen Linked List
function clear(){
    global $head;
    $temp = $head;
    $del = null;
    while ($temp != null){
        $del = $temp;
        $temp = $temp['next'];
        unset ($del);
    }
    $head = null;
}

//Prosedur Cetak elemen linked list
function cetak(){

    global $head;
    $temp = $head;
    if(LEmpty($head) == 0){
        echo "<hr>Cetak Data </hr>";
        while ($temp != null){
            echo $temp['data'], " ";
            $temp = $temp['next'];
        }
    }else
    echo "<br> List Kosong";
}

//hasil output yang akan ditampilkan
InsertB(44);
InsertD(55);
InsertD(66);
echo "Isi Link List :";
cetak();
HapusD();
echo "<p>Setelah Hapus :</p>";
cetak();
HapusD();
cetak();
?>