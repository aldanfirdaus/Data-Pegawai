<?php
global $conn; //memanggil variabel global
require "function.php"; //memanggil seluruh elemen yg ada di function.php
$id = $_GET["id"]; //menampung id pegawai dari form

//query data pegawai berdasarkan idnya
$row =mysqli_query($conn,"SELECT * FROM data_pegawai WHERE ID = $id"); //melakukan query select data
$data = mysqli_fetch_assoc($row); //variabel untuk menampung array asosiatif
if(isset($_POST["submit"])){ //mengecek tombol submit
    //ambil data tiap elemen dari form tambah
    $nik = $_POST["nik"];
    $nama = $_POST["nama"];
    $jabatan = $_POST["jabatan"];
    $tgl_msk = $_POST["tgl_msk"];
    $divisi = $_POST["divisi"];
    // melakukan update data tabel data_pegawai
    $query = "UPDATE data_pegawai SET 
                NIK = '$nik',
                NAMA = '$nama',
                JABATAN = '$jabatan',
                TGL_MSK = '$tgl_msk',
                DIVISI = '$divisi' WHERE ID = '$id'
                ";
    mysqli_query($conn,$query); //melakukan query
    //mengecek data berhasil diubah atau tidak
    if(mysqli_affected_rows($conn) >0){
        echo "<script>
        alert('data berhasil diubah');
        document.location.href='tugas3.php';
        </script>";
    }else{
        echo "
		<script>
				alert('data gagal diubah');
				document.location.href='tugas3.php';
		</script>
		";
    }
}
?>
<html>
    <head>
        <title>Edit Data Pegawai</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="cont_tambah">
            <h2>Edit Data Pegawai</h2>

            <div class="kembali">
                <a href="tugas3.php">Kembali</a>
            </div>

            <div class="cont_form">
                <form class="cont_form_tambah" action="" method="POST"  enctype="multipart/form-data">
                <ul>
                    <label class="label" for="nik">NIK</label>
                    <li><input type="text" name="nik" id="nik" required value="<?php echo $data['NIK'];?>"></li>
                    <div>
                    <label for="nama">Nama</label>
                    <li class="label"><input type="text" name="nama" id="nama" required value="<?php echo $data['NAMA'];?>"></li>
                    </div>
                    <div>
                    <label for="jabatan">Jabatan</label>
                    <li class="label"><input type="text" name="jabatan" id="jabatan" required value="<?php echo $data['JABATAN'];?>"></li>
                    </div>
                    <div>
                    <label for="tgl_msk">Tanggal Masuk</label>
                    <li class="label"><input type="date" name="tgl_msk" id="tgl_msk" required value="<?php echo $data['TGL_MSK'];?>"></li>
                    </div>
                    <div>
                    <label for="divisi">Divisi</label>
                    <li class="label"><input type="text" name="divisi" id="divisi" required value="<?php echo $data['DIVISI'];?>"></li>
                    </div>
                    <div>
                    <li><button type="submit" name="submit">Ubah</button></li>
                    </div>
                </ul>
            </form>
            </div>
        </div>
    </body>
</html>