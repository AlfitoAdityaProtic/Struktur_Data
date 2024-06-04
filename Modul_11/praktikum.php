<?php 
//Deklarasi tree
class Tree {
    public $data;
    public $left;
    public $right;

    public function __construct($d){
        $this->data = $d;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree{
    public $root;

    public function __construct(){
        $this->root = null;
    }

    public function insert($d){
        $newNode = new Tree ($d);
        if ($this->root === null){
            $this->root = $newNode;
        }else {
            $this->insertNode($this->root, $newNode);
        }
    }

    private function insertNode(&$node, &$newNode){
        if ($node == null){
            $node = $newNode;
        }else {
            if ($newNode->data < $node->data){
                if ($node->left == null){
                    $node->left = $newNode;
                }else{
                    $this->insertNode($node->right, $newNode);
                }
            }else{
                if($node->right == null){
                    $node->right = $newNode;
                }else{
                    $this->insertNode($node->right, $newNode);
                }
            }
        }
    }

    public function preorder($node){
        if ($node !== null){
            echo $node->data . " ";
            $this->preorder($node->left);
            $this->preorder($node->right);
        }
    }

    public function inorder ($node){
        if ($node !== null){
            $this->inorder($node->left);
            echo $node->data . " ";
            $this->inorder($node->right);
        }
    }

    public function postorder($node){
        if ($node !== null){
            $this->postorder($node->left);
            $this->postorder($node->right);
            echo $node->data . " ";
        }
    }

    public function cari ($data){
        return $this->cariNode($this->root, $data);
    }

    public function tinggi ($node){
        if($node == null)
            return 0;
        else{
            $tinggi1 = $this->tinggi ($node->left);
            $tinggi2 = $this->tinggi ($node->right);
            if ($tinggi1 > $tinggi2)
                return $tinggi1 + 1;
            else
                return $tinggi2 + 1;
        }
    }

    public function daun ($node){
        if ($node == null)
            echo "<br>Tree kosong";
        if ($node->left != null)
            $this->daun ($node->left);
        if ($node->right != null)
            $this->daun ($node->right);
        if ($node->left == null && $node->right == null)
            echo $node->data, " ";
    }
}

$tr = new BinaryTree();
$tr->insert(11);
$tr->insert(55);
$tr->insert(33);
$tr->insert(8);
echo "Preorder : "; $tr->preorder($tr->root);
echo "<br>Inorder : "; $tr->inorder($tr->root);
echo "<br>Postorder : "; $tr->postorder($tr->root);
$tr->cek(51);
$tr->cek(33);
echo "<br>Jumlah Node : ", $tr->hitung($tr->root);
echo "<br>Kedalaman Level : ", $tr->tinggi($tr->root);
echo "<br>Daun : ", $tr->daun($tr->root);
?>