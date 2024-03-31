<?php
//QUEUE/ANTRIAN
define ("MAX",6);

//deklarasi queue/antrian
$antrian = array (
    'head' => -1,
    'tail' => -1,
    'data' => array()
);
$Q = $antrian;

//prosedure untuk inisialisasi/memberikan nilai awal
//menyatakan bahwa antrian masih KOSONG
function inisialisais(){
    global $Q;

    $Q['head'] = $Q['tail'] = -1;
}

//preosedure untuk menambah/Enqueue isi antrian
function enqueue($d){
    global $Q;
    if (isFull() == 0){
        if (isEmpty() == 1){
            $Q['head'] = $Q['tail'] = 0;
        }else{
            $Q['tail']++;
        }
        $Q['data'][$Q['tail']] = $d;
    }else{
        echo "<br> Maaf Antrian sudah penuh";
    }
}

//prosedur untuk menghapus/dequeue elemen antrian
function dequeue(){
    global $Q;

    if(isEmpty() !=1){
        echo "<br> Data yang keluar dari antrian : ", $Q['data'][$Q['head']];
        for ($i=$Q['head']; $i<$Q['tail']; $i++){
            $Q['data'][$i] = $Q['data'][$i + 1];
        }
        $Q['tail']--;
    }echo "<br>Data sat ini : ";
}

//fungsi untuk cek apakah antrian penuh/tidak
function isFull(){
    global $Q;
    if($Q['tail'] == MAX-1){
        return 1; //true/penuh
    } else{
        return 0; //false/ tidak penuh
    }
}


//fungsi untuk cek apakah antrian kosong/tidak
function isEmpty(){
    global $Q;
    if($Q['tail'] == -1){
        return 1;
    } else{
        return 0;
    }
}

//prosedure menghapus semua elemen antrian
function clear(){
    global $Q;
    $Q['head'] = $Q['tail'] = -1;
}

//prosedure cetak elemen antrian
function cetak(){
    global $Q;
    if($Q['tail'] != -1){
        for($i=$Q['head']; $i <=$Q['tail'];$i++){
            echo "<br> Antrian ke ", $i+1, ": ", $Q['data'][$i], " ";
        }
    }
    //echo "<br>Antrian Kosong !!!!!";}
}

//output Program
echo "<br>Menambah Data : ";
enqueue(11);
enqueue(22);
enqueue(33);
enqueue(44);
cetak();
dequeue();
cetak();
clear();
cetak();
?>