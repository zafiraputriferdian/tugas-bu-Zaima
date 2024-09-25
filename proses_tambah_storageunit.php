<?php
if($_POST){
    $nama_gudang=$_POST['nama_gudang'];
    $lokasi=$_POST['lokasi'];
    if(empty($nama_gudang)){ 
        echo "<script>alert('nama barang tidak boleh kosong');location.href='tambah_storageunit.php';</script>"; 
    } else { 
         include "koneksi.php"; 
         $insert=mysqli_query($koneksi,"INSERT INTO storageunit (nama_gudang,lokasi) value ('".$nama_gudang."','".$lokasi."')");
          if($insert){
           echo "<script>alert('Sukses menambahkan barang');location.href='storageunit.php';</script>"; 
        } else { 
           echo "<script>alert('Gagal menambahkan barang');location.href='storageunit.php';</script>"; 
        }
    }
}

?>