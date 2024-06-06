<?php
//Deklarasi tree 
class Tree
{
    public $data;
    public $left;
    public $right;

    // pembentukan node baru
    public function __construct($d)
    {
        $this->data = $d;
        $this->left = null; //mengatur referensi anak kiri ke null
        $this->right = null; //mengatur referensi anak kanan ke null
    }
}

//membuat class binarytree
class BinaryTree
{
    public $root; //membuat global variabel agar bisa di akses

    public function __construct()
    {
        $this->root = null;
    }

    // membuat fungsi insert untuk menambahkan data pada tree
    public function insert($d)
    {
        $newNode = new Tree($d); //membuat node baru 
        if ($this->root === null) { //jika root bernilai null maka jadikan newNode sebagai root
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $newNode); //jika tidak maka masukan newNode ke dalam tree
        }
    }

    // membuat fungsi rekursif untuk memasukan node baru ke dalam tree
    private function insertNode(&$node, &$newNode)
    {
        if ($node == null) { //jika node bernilai null maka jadikan node menjadi newNode
            $node = $newNode;
        } else {
            if ($newNode->data < $node->data) { //jika newNode-data lebih kecil dari node-data maka lakukan seleksi berikut
                if ($node->left == null) {//jika child kiri node bernilai null 
                    $node->left = $newNode; // maka pasang newNode sebagai child-kiri
                } else {
                    $this->insertNode($node->right, $newNode);
                }
            } else { //jika newNode-data lebih besar atau sama dengan node-data maka lakukan seleksi dibawah ini
                if ($node->right == null) { //jika child-kanan bernilai null maka
                    $node->right = $newNode; //pasang newNode sebagai child-kanan
                } else { //selain itu
                    $this->insertNode($node->right, $newNode); //lanjutkan ke child-kanan
                }
            }
        }
    }

    //membuat fungsi untuk melakukan traversal preorder
    public function preorder($node)
    {
        if ($node !== null) { //jika node tidak null maka
            echo $node->data . " "; //tampilkan node-data  yang dikunjungi
            $this->preorder($node->left); //kunjungi left
            $this->preorder($node->right); //kunjungi right
        }
    }

    //membuat fungsi untuk melakukan traversal inorder
    public function inorder($node)
    {
        if ($node !== null) { //jika node tidak null maka
            $this->inorder($node->left); //kunjungi left
            echo $node->data . " "; //cetak node yang dikunjungi
            $this->inorder($node->right); //kunjungi right
        }
    }

    public function postorder($node)
    {
        if ($node !== null) { //jika node tidak null maka
            $this->postorder($node->left); //kunjungi left
            $this->postorder($node->right); //kunjungi right
            echo $node->data . " "; //cetak node yang dikunjungi
        }
    }

    //membuat fungsi cari
    public function cari($data)
    {
        return $this->cariNode($this->root, $data);
    }

    //membuat fungsi untuk menghitung kedalaman tree
    public function tinggi($node)
    {
        if ($node == null) //jika node bernilai null maka akan bernilai salah
            return 0;
        else { //selain itu
            $tinggi1 = $this->tinggi($node->left); //hitung tinggi child-kiri secara rekursif
            $tinggi2 = $this->tinggi($node->right); //hitung tinggi child-kanan secara rekursif
            if ($tinggi1 > $tinggi2) //jika tinggi child kiri lebih besar maka
                return $tinggi1 + 1; //hitung kedalaman child-kiri ditambah 1
            else //jika kedalaman child-kanan lebih besar atau sama dengan kedalaman child-kiri maka
                return $tinggi2 + 1; //hitung kedalaman child-kanan ditambah 1
        }
    }

    //membuat fungsi daun untuk menampilkan daun-daun(node tanpa anak) dalam tree
    public function daun($node)
    {
        if ($node == null) //jika node bernilai null maka tampilkan tree kosong
            echo "<br>Tree kosong";
        if ($node->left != null) //jika child-kiri tidak bernilai null maka
            $this->daun($node->left); //kunjungi child-kiri secara rekursif
        if ($node->right != null) //jika child-kanan tidak bernilai null maka
            $this->daun($node->right); //kunjungi child-kanan secara rekursif
        if ($node->left == null && $node->right == null) //jika node-left dan node-right sama sama bernilai null maka 
            echo $node->data, " "; //tampilkan data node saat ini
    }

    //membuat privat fungsi cariNode dengan data tertentu
    private function cariNode($node, $data)
    {
        if ($node == null) //jika node saat ini null, maka data tidak ditemukan
            return 0; //bernilai false
        if ($node->data == $data) //jika node-data sama dengan data maka data ditemukan
            return 1; // bernilai true
        if ($data < $node->data) { //jika data lebih kecil dari node-data maka
            return $this->cariNode($node->left, $data); //lanjutkan ke child-kiri
        } else { //selain itu jika data lebih besar dari node-data maka
            return $this->cariNode($node->right, $data); //lanjutkan ke child-kanan
        }
    }

    //membuat fungsi cek untuk mengecek apakah data tertentu berada dalam tree
    public function cek($data)
    {
        if ($this->cari($data)) { //jika data ditemukan
            echo "ditemukan";
        } else {
            echo "Tidak Ditemukan"; //jika data tidak ditemukan
        }
    }

    //membuat fungsi hitung untuk menghitung jumlah node yang ada pada tree
    public function hitung($node)
    {
        if ($node == null) { //jika node bernilai null maka 
            return 0; //kembalikan false
        } else { //selain itu jika node tidak null maka
            return 1 + $this->hitung($node->left) + $this->hitung($node->right); //hitung node saat ini dan childnya secara rekursif
        }
    }
}

//membuat instance dari BinaryTree
$tr = new BinaryTree();

//menambahkan data ke dalam tree
$tr->insert(11);
$tr->insert(55);
$tr->insert(33);
$tr->insert(8);

//cetak hasil traversal preorder
echo "Preorder : ";
$tr->preorder($tr->root);
//cetak hasil traversal inorder
echo "<br>Inorder : ";
$tr->inorder($tr->root);
//cetak hasil traversal postorder
echo "<br>Postorder : ";
$tr->postorder($tr->root);

//menampilkan fungsi cek untuk mengecek apakah data yang dicari ada dalam tree atau tidak
echo "<br>Data 51 : ";
$tr->cek(51);
echo "<br>Data 33 : ";
$tr->cek(33);

//menampilkan jumlah node yang ada dalam tree
echo "<br>Jumlah Node : ", $tr->hitung($tr->root);
//mencetak kedalaman tree
echo "<br>Kedalaman Level : ", $tr->tinggi($tr->root);
//menampilkan daun (node tanpa anak) di dalam tree
echo "<br>Daun : ", $tr->daun($tr->root);
?>