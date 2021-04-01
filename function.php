<?php
//koneksi ke database
$servername = "localhost"; 
$username = "root";
$password = "";

//create connection
$conn = mysqli_connect($servername, $username, $password,"pegawai"); //membuat variabel yang menampung status hasil koneksi kepada database

//Check conection
if(!$conn){ //membuat kondisi jika konek error
    die("Connection failed: " . mysqli_connect_error()); //jika konek ke mysql error maka akan menampilkan teks 
}
?>