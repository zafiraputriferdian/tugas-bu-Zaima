<?php 
include "koneksi.php";
if(isset($_GET['id_vendor'])){
    $id = mysqli_real_escape_string($koneksi, $_GET['id_vendor']);

    $sql = "SELECT * FROM vendor WHERE id_vendor = '$id'";
    $hsl = mysqli_query($koneksi, $sql);

    if(!$hsl){
        die("GAGAL" . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($hsl);
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_vendor = mysqli_real_escape_string($koneksi, $_POST['id_vendor']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kontak = mysqli_real_escape_string($koneksi, $_POST['kontak']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);

    $sql1 = "UPDATE vendor SET
    nama = '$nama',
    kontak = '$kontak',
    nama_barang = '$nama_barang'
    WHERE id_vendor = '$id_vendor'";
    $hsl1 = mysqli_query($koneksi, $sql1);

    if(!$hsl1){
        die("" . mysqli_error($koneksi));
    }

    if($hsl1){
        echo "<script>
        alert('Data Berhasil Diupdate');
        location='vendor.php';
        </script>";
        exit();
    }else{
        die("GAGAL" . mysqli_error($koneksi));
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/upd_storage.css">
</head>
<body>
    <form action="" method="post">
        <h1>Edit Vendor</h1>
        <input type="hidden" name="id_vendor" value="<?php echo htmlspecialchars($data['id_vendor']); ?>">
        <label for="">Nama</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($data['nama']); ?>"><br>
        <label for="">Kontak</label><br>
        <input type="text" name="kontak" value="<?php echo htmlspecialchars( $data['kontak']); ?>"><br><br>
        <label for="">Nama Barang</label><br>
        <input type="text" name="nama_barang" value="<?php echo htmlspecialchars( $data['nama_barang']); ?>"><br><br>
        <button>Edit</button>
    </form> 
</body>
</html>