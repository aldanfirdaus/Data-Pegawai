<?php
global $conn; //memanggil variabel global
require "function.php"; //memanggil seluruh elemen yg ada di function.php
if(isset($_POST["submit"])){ //mengecek tombol submit diklik
    //ambil data tiap elemen dari form tambah
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $jabatan = $_POST["jabatan"];
    $tgl_msk = $_POST["tgl_msk"];
    $divisi = $_POST["divisi"];

    $query = "INSERT INTO data_pegawai VALUES('','$nik','$nama','$jabatan','$tgl_msk','$divisi')"; //memasukkan data pegawai ke tabel data_pegawai
    mysqli_query($conn,$query); //query data

    if(mysqli_affected_rows($conn) >0){ //melakukan kondisi jika ada baris yang terpengaruh 
        echo "<script>
        alert('data berhasil ditambah');
        document.location.href='tugas3.php';
        </script>";
    }else{ 
        echo "
		<script>
				alert('data gagal ditambah');
				document.location.href='tugas3.php';
		</script>
		";
    }
}
?>
<html>
    <head>
        <title>Tanbah Data Pegawai</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="cont_tambah">
            <h2>Tambah Data Pegawai</h2>

            <div class="kembali">
                <a href="tugas3.php">Kembali</a>
            </div>

            <div class="cont_form">
                <form class="cont_form_tambah" action="" method="POST">
                <ul>
                    <label class="label" for="nik">NIK</label>
                    <li><input type="number" name="nik" id="nik" required=""></li>
                    <div>
                    <label for="nama">Nama</label>
                    <li class="label"><input type="text" name="nama" id="nama" required=""></li>
                    </div>
                    <div>
                    <label for="jabatan">Jabatan</label>
                    <li class="label"><input type="text" name="jabatan" id="jabatan" required=""></li>
                    </div>
                    <div>
                    <label for="tgl_msk">Tanggal Masuk</label>
                    <li class="label"><input type="date" name="tgl_msk" id="tgl_msk" required=""></li>
                    </div>
                    <div>
                    <label for="divisi">Divisi</label>
                    <li class="label"><input type="text" name="divisi" id="divisi" required=""></li>
                    </div>
                    <div>
                    <li><button type="submit" name="submit">Submit</button></li>
                    </div>
                </ul>
            </form>
            </div>
        </div>
    </body>
</html>