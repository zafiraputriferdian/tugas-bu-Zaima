<?php
if($_POST){
    $nama=$_POST['nama'];
    $kontak=$_POST['kontak'];
    $nama_barang=$_POST['nama_barang'];
    if(empty($nama_barang)){ 
        echo "<script>alert('nama barang tidak boleh kosong');location.href='tambah_vendor.php';</script>"; 
    } else { 
         include "koneksi.php"; 
         $insert=mysqli_query($koneksi,"INSERT INTO vendor (nama,kontak,nama_barang) value ('".$nama."','".$kontak."','".$nama_barang."')");
          if($insert){
           echo "<script>alert('Sukses menambahkan barang');location.href='vendor.php';</script>"; 
        } else { 
           echo "<script>alert('Gagal menambahkan barang');location.href='vendor.php';</script>"; 
        }
    }
}

?>