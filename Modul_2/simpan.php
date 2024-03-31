<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simpan</title>
</head>
<body>
    
</body>
</html>
<?php
// membuat array asosiatif sebagai struktur data
    $person = array(
        "name" => $_POST['name'], 
        "age" => $_POST['age'],
        "city" => $_POST['city'],
        "contacts" => array( //array dalam array yang berisikan email dan nomor hp
            "email" => $_POST['contacts']['email'],
            "phone" => $_POST['contacts']['phone'],

        )
        );
// menampilkan array asosiatif yang sudah dibuat sebelumnya
        echo 'Name: ' .$person["name"].'<br><br>';
        echo 'Age: ' .$person["age"].'<br><br>';
        echo 'City: ' .$person["city"].'<br><br>';
        echo 'Email: ' .$person["contacts"]["email"].'<br><br>';
        echo 'Phone: ' .$person["contacts"]["phone"].'<br><br>';
?>