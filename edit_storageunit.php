<?php 
include "koneksi.php";
if(isset($_GET['id_storageunit'])){
    $id = mysqli_real_escape_string($koneksi, $_GET['id_storageunit']);

    $sql = "SELECT * FROM storageunit WHERE id_storageunit = '$id'";
    $hsl = mysqli_query($koneksi, $sql);

    if(!$hsl){
        die("GAGAL" . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($hsl);
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_storageunit = mysqli_real_escape_string($koneksi, $_POST['id_storageunit']);
    $gudang = mysqli_real_escape_string($koneksi, $_POST['nama_gudang']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);

    $sql1 = "UPDATE storageunit SET
    nama_gudang = '$gudang',
    lokasi = '$lokasi'
    WHERE id_storageunit = '$id_storageunit'";
    $hsl1 = mysqli_query($koneksi, $sql1);

    if($hsl1){
        echo "<script>
        alert('Data Berhasil Diupdate');
        location='storageunit.php';
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
        <h1>Edit Gudang</h1>
        <input type="hidden" name="id_storageunit" value="<?php echo htmlspecialchars($data['id_storageunit']); ?>">
        <label for="">Nama Gudang</label><br>
        <input type="text" name="nama_gudang" value="<?php echo htmlspecialchars($data['nama_gudang']); ?>"><br>
        <label for="">Lokasi</label><br>
        <input type="text" name="lokasi" value="<?php echo htmlspecialchars( $data['lokasi']); ?>"><br><br>
        <button>Edit</button>
    </form> 
</body>
</html>