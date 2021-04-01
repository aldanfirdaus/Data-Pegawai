<?php

require 'function.php'; //memanggil seluruh elemen yg ada di function.php
global $conn; //memanggil variabel global

//mencari data pegawai
if(isset($_POST['search'])){ //mengecek tombol cari diklik
    $cari = $_POST['cari']; //menampung keyword cari ke variabel
    //melakukan pengambilan data yang sesuai dengan keyword cari
    $query = "SELECT * FROM data_pegawai WHERE NIK LIKE '%$cari%' OR NAMA LIKE '%$cari%' OR JABATAN LIKE '%$cari%' OR TGL_MSK LIKE '%$cari%' OR DIVISI LIKE '%$cari%'";
    $data = mysqli_query($conn,$query); //melakukan query data
}else{
    $data = mysqli_query($conn, "SELECT * from data_pegawai"); //menampung data dari tabel data_pegawai jika tombol cari tidak ditekan
}
?>



<html>
<head>
<title>Daftar Pegawai</title>
<link rel="stylesheet" href="style.css">
</head>
<body>  
    <br>
    <h2>Halaman Daftar Pegawai</h2>
    <br>
    <div class="atas">
    <div class="tambah">
    <a href="tambah.php">Tambah</a></div>
    <br>
    <div class="form">
    <!-- pencarian data pegawai -->
    <form action="" method="POST">
        <input type="text" name="cari" size="40" placeholder="Cari data pegawai" autocomplete="off">
        <button type="submit" name="search">Cari</button> 
    </form>
    </div>
    </div>
    <br>
    
    <!-- membuat tabel data pegawai -->
    <table class="table">
        <tr>
            <th>No.</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal Masuk</th>
            <th>Divisi</th>
            <th>Aksi</th>
        </tr>
        <?php $no=1; ?>
        <?php foreach($data as $row) : //menampilakn data di tabel dengan melakukan foreach?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $row['NIK'];?></td>
            <td><?php echo $row['NAMA'];?></td>
            <td><?php echo $row['JABATAN'];?></td>
            <td><?php echo $row['TGL_MSK'];?></td>
            <td><?php echo $row['DIVISI'];?></td>
            <td class="aksi">    
            <div class="edit"><a href="edit.php?id=<?php echo $row['ID'];?>"`>Edit</a></div> | 
            <div class="hapus"><a href= "hapus.php?id=<?php echo $row['ID'];?>">Hapus</a></div>
            </td>
        </tr>
        <?php $no++ ;?>
        <?php endforeach?>
    </table>
</body>
</html>