<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/inven.css">
</head>
<body>
    <form action="proses_tambah_inventory.php" method="post">
        <h1 class="hed">Tambah Inventory</h1>
        <label for="nama">Nama Barang</label><br>
        <select name="nama_barang" required>
            <option value=""></option>
            <?php 
            include "koneksi.php";

            $sql = "SELECT * FROM vendor";
            $hsl = mysqli_query($koneksi, $sql);

            if($hsl -> num_rows > 0 ){
                while($data = mysqli_fetch_assoc($hsl)){
                    echo "<option value='{$data['id_vendor']}'>{$data['nama_barang']}</option>";
                }
            }
            ?>
        </select><br>
        <label for="">Jenis Barang</label><br>
        <input type="text" name="jenis_barang" required><br>
        <label for="">Kuantitas Stok</label><br>
        <input type="number" name="kuantitas_stok" required><br>
        <label for="">Lokasi Gudang</label><br>
        <select name="lokasi_gudang" required>
            <option value=""></option>
            <?php 
            include "koneksi.php";

            $sql = "SELECT * FROM storageunit";
            $hsl = mysqli_query($koneksi, $sql);

            if(!$hsl){
                die("gagal" . mysqli_connect_error($koneksi) . mysqli_connect_erno($koneksi));
            }
            if($hsl -> num_rows > 0 ){
                while($data = mysqli_fetch_assoc($hsl)){
                    echo "<option value='{$data['id_storageunit']}'>{$data['nama_gudang']} Di {$data['lokasi']}</option>";
                }
            }
            ?>
        </select><br>
        <label for="">Serial Number</label><br>
        <input type="number" name="serial_number" required><br>
        <label for="">Harga</label><br>
        <input type="text" name="harga" required><br>
        <button>Tambah</button>
        
    </form>
    
</body>
</html>