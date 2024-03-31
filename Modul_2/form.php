<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <!-- membuat form yang berisikan nama, umur, kota, email dan nomor hp yang 
    di hubungkan ke dalam penyimpanan file bernama simpan.php-->
    <form action="simpan.php" method="POST">  
        <label for="name">Name:</label><br> 
        <input type="text" id="name" name="name"><br> <!--kolom untuk menginputkan nama-->

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age"><br> <!--kolom untuk menginputkan umur-->

        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"><br> <!--kolom untuk menginputkan kota asal-->

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="contacts[email]"><br> <!--kolom untuk menginputkan email-->

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="contacts[phone]"><br><br> <!--kolom untuk menginputkan nomor hp-->

        <input type="submit" value="Submit"> <!--tombol yang menghubungkan ke simpan.php-->
    </form>
</body>
</html>