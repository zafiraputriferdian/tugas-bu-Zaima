<?php 
if($_POST){
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $lokasi_gudang = $_POST['lokasi_gudang'];
    $serial_number = $_POST['serial_number'];
    $harga = $_POST['harga'];

    if(empty($nama_barang) || empty($jenis_barang) || empty($kuantitas_stok) || empty($lokasi_gudang) || empty($serial_number) || empty($harga)){
        echo "<script>
        alert('Harap Diisi');
        location='inventory.php';
        </script>";
    }else{
        include "koneksi.php";

        $sql = "INSERT INTO inventory (nama_barang, jenis_barang, kuantitas_stok, lokasi_gudang, serial_number, harga)
        VALUES ('$nama_barang', '$jenis_barang', '$kuantitas_stok', '$lokasi_gudang', '$serial_number', '$harga')";
        $hsl = mysqli_query($koneksi, $sql);

        if($hsl){
            echo "<script>
            alert('Berhasil ');
            location='inventory.php';
            </script>";
        }
    }
}
?>