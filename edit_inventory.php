<?php
include "koneksi.php";
if(isset($_GET['id_inventory'])){
    $id_inventory = mysqli_real_escape_string($koneksi, $_GET['id_inventory']);

    $sql = "SELECT * FROM inventory WHERE id_inventory = '$id_inventory'";
    $hsl = mysqli_query($koneksi, $sql);

    if(!$hsl){
        die("GAGAL" . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($hsl);
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id_inventory = mysqli_real_escape_string($koneksi, $_POST['id_inventory']);
    $nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
    $jenis_barang = mysqli_real_escape_string($koneksi, $_POST['jenis_barang']);
    $kuantitas_stok = mysqli_real_escape_string($koneksi, $_POST['kuantitas_stok']);
    $lokasi_gudang = mysqli_real_escape_string($koneksi, $_POST['lokasi_gudang']);
    $serial_number = mysqli_real_escape_string($koneksi, $_POST['serial_number']);
    $harga = mysqli_real_escape_string($koneksi, $_POST['harga']);

    $sql = "UPDATE inventory SET
    id_inventory ='$id_inventory',
    nama_barang = '$nama_barang',
    jenis_barang = '$jenis_barang',
    kuantitas_stok = '$kuantitas_stok',
    lokasi_gudang = '$lokasi_gudang',
    serial_number = '$serial_number',
    harga = '$harga'
    WHERE id_inventory = '$id_inventory'";
    
    if(mysqli_query($koneksi, $sql)){
        echo "<script>
        alert('berhasil');
        location='inventory.php';
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
    <link rel="stylesheet" href="../CSS/upd_inven.css">
</head>
<body>
    <form action="" method="post">
        <h1>Update Inventory</h1>
        <input type="hidden" name="id_inventory" value="<?php echo htmlspecialchars($data['id_inventory']); ?>">
        <label for="">Nama Barang</label><br>
        <select name="nama_barang" id="id_inventory">
            <option value="<?php echo htmlspecialchars($data['nama_barang']); ?>"><?php echo htmlspecialchars($data['nama_barang']); ?></option>
            <?php 
            $sql1 = "SELECT * FROM vendor";
            $hsl1 = mysqli_query($koneksi, $sql1);

            if(!$hsl1){
                die("GAGAL" . mysqli_error($koneksi));
            }

            if($hsl1){
                while($data1 = mysqli_fetch_assoc($hsl1)){
                    $sel = ($data1['id_vendor'] == $data1['nama_barang']) ? 'selected' : ''; 
                    echo "<option value='{$data1['id_vendor']}' $sel>{$data1['nama_barang']}</option>";
                }
            }
            ?>
        </select><br><br>
        <label for="">Jenis Barang</label><br>
        <input type="text" name="jenis_barang" value="<?php echo htmlspecialchars($data['jenis_barang']); ?>"><br><br>
        <label for="">Kuantitas Stok</label><br>
        <input type="text" name="kuantitas_stok" value="<?php echo htmlspecialchars($data['kuantitas_stok']); ?>"><br><br>
        <label for="">Lokasi Gudang</label><br>
        <select name="lokasi_gudang" id="id_inventory">
            <option value="<?php echo htmlspecialchars($data['lokasi_gudang']); ?>"><?php echo htmlspecialchars($data['lokasi_gudang']); ?></option>
            <?php 
            $sql2 = "SELECT * FROM storageunit";
            $hsl2 = mysqli_query($koneksi, $sql2);

            if(!$hsl2){
                die("GAGAL" . mysqli_error($koneksi));
            }
            if($hsl2){
                while($data2 = mysqli_fetch_assoc($hsl2)){
                    echo "<option value='{$data2['id_storageunit']}'>{$data2['lokasi']}</option>";
                }
            }
            ?>
        </select><br><br>
        <label for="">Serial Number</label><br>
        <input type="number" name="serial_number" value="<?php echo htmlspecialchars($data['serial_number']); ?>"><br><br>
        <label for="">Harga</label><br>
        <input type="text" name="harga" value="<?php echo htmlspecialchars($data['harga']); ?>"><br><br>
        <button type="submit">Update</button>
        <a href="inventory.php">
            <button class="back">Back</button>
        </a>
    </form>
</body>
</html>