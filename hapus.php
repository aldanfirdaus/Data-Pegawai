<?php
global $conn; //memanggil variabel global
require "function.php"; //memanggil seluruh elemen yg ada di function.php
$id = $_GET["id"]; //variabel untuk menampung id dari form dibawah

//melakukan query delete data
mysqli_query($conn, "DELETE FROM data_pegawai WHERE ID= $id");
//mengecek jika data berhasil dihapus
if (mysqli_affected_rows($conn)>0) {
    # code...
    echo "
    <script>
            alert('data berhasil dihapus');
            document.location.href='tugas3.php';
        </script>";
}
else{
    echo 
    "<script>
            alert('data gagal dihapus');
            document.location.href='tugas3.php';
        </script>";
    }
?>