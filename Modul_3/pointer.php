<p>dalam contoh dibawah, variabel $b adalah referensi ke variabel $a.
ketika kita mengubah nilai melalui $b, nilai dai $a juga ikut berubah 
karena keduanya merujuk ke alamat memori yang sama.
</p>

<?php
$a = 10;
$b = &$a; // $b adalah referensi ke $a

echo "Nilai Awal A = 10<br>";
echo "A = ", $a; // Output 10
echo "<br>";
echo "B = ", $b; // Output 10
echo "<br>";

$b = 20; //mengubah nilai melalui referensi

echo "mengubah nilai A mellaui B = 20<br>";
echo "A = ", $a; // Output: 20
echo "<br>";
echo "B = ", $b; //Output: 20
?>
