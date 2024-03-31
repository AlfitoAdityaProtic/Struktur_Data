<?php
//membuat Array
$array = [1,2,3,4,5];

//membuat referensi ke array
$referensi_array = &$array;

//mengubah nilai array melalui referensi
$referensi_array[0] = 10;

//menampilkan nilai array asli
echo "menampilkan nilai array asli<br>";
print_r($array);
echo "<br>";
echo "menampilkan isi array index ke 0 melalui pointer = ", $referensi_array[0]."<br>";

for ($i=0; $i < count($referensi_array); $i++){
    echo $referensi_array[$i]." ";
}
?>