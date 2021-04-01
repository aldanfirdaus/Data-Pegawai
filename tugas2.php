<?php
 $servername = "localhost";
 $username = "root";
 $password = "";

 //create connection
 $conn = mysqli_connect($servername, $username, $password, "pegawai"); //membuat variabel yang menampung status hasil koneksi kepada database

 //Check conection
 if(!$conn){ //membuat kondisi jika konek error
     die("Connection failed: " . mysqli_connect_error()); //jika konek ke mysql error maka akan menampilkan teks 
 }
//Create database
    // $sql = "CREATE DATABASE pegawai"; //membuat variabel untuk menampung database baru 
    // if(mysqli_query($conn, $sql)){ //membuat kondisi 
    //         echo "Database created successfully"; //menampilkan teks database berhasil dibuat
    //     } else {
    //         echo "Error creating database: " . mysqli_error($conn); //menampilkan database error dibuat
    //     }

    //     mysqli_close($conn); //menghentikan koneksi php ke server mysql dengan cara otomatis
        
//membuat relasi tabel
$query  = "CREATE TABLE data_pegawai(ID INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,NIK INT(50),NAMA VARCHAR(200), JABATAN VARCHAR(200), TGL_MSK DATE, DIVISI VARCHAR(50))";   
$hasil_query = mysqli_query($conn, $query); //membuat variabel untuk menampung query 
if(!$conn){ //melakukan kondisi jika konek error untuk memastikan query berjalan
  die ("Query Error: ".mysqli_errno($conn). //menampilkan string error 
       " - ".mysqli_error($conn));
}
else {
echo "Tabel data_pegawai sukses dibuat... "; //jika berhasil dibuat maka menampilkan string sukses
}
mysqli_close($conn);
?>