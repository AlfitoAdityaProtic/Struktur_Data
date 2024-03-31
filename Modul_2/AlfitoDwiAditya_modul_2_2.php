<!-- Dalam PHP, data struktur lebih umum diwakili
menggunakan array atau objek. -->

<?php
//membuat array homogen
$larik = array ("satu", "dua", "tiga", "empat");

// membuat array heterogen
$data = array (5, "enam", 7.8, "delapan");

// membuat array asosiatif sebagai struktur data
$person1 = array(
    "name" => "Alfito",
    "age" => 21,
    "gender" => "Male",
    "contact" => array(
    "phone" => "0895416117049",
    "email" => "alfitodwiaditya87@gmail.com",
    )
    
    );

    //menampilkan data array homogen
echo "<p><b>Array homogen</b><hr>";
echo "<pre>";
print_r($larik);
echo "</pre>";
echo "</p>";

//menampilkan data array heterogen
echo "<p><b>Array Heterogen</b><hr>";
echo "<pre>";
print_r ($data);
echo "</pre>";
echo "</p>";

//menampilkan data array asosiatif
echo "<p><b>Array asosiatif</b><hr>";
echo "Person 1 : {$person1['name']},{$person1['age']},{$person1['gender']},{$person1['contact']['email']},{$person1['contact']['phone']}<br>";
echo "</p>"

?>