<?php
include ("koneksi.php");

$id_inventory = $_GET('id_inventory');

$sql = "SELECT * FROM inventory WHERE id_inventory='$id_inventory'";
$result = $koneksi->query($sql);

if($result->num_rows ===0) {
    die("data tidak ditemukan.");
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $koneksi->real_escape_string($_POST['nama_barang']);
    $jenis_barang = $koneksi->real_escape_string($_POST['jenis_barang']);
    $kuantitas_stok = $koneksi->real_escape_string($_POST['kuantitas_stok']);
    $lokasi_gudang = $koneksi->real_escape_string($_POST['lokasi_gudang']);
    $serial_number = $koneksi->real_escape_string($_POST['serial_number']);

    $sql ="UPDATE inventory SET nama_barang='$nama_barang',jenis_barang='$jenis_barang',kuantitas_stok='$kuantitas_stok',lokasi_gudang='$lokasi_gudang',serial_number='$serial_number'";
     if($koneksi->query($sql) === TRUE) {
        header("Location:inventory.php");
        exit();
     } else { 
        echo "Error:".$sql. "<br>" .$koneksi->error;
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
 </head>
 <body>
    <header>
        <h1>Update Inventory</h1>
    </header>
    <main>
        <form action="update_inventory.php?id_inventory=<?php echo $id_inventory;?>" method="POST">
        <label for="nama_barang">Nama Barang:</label>
        <input type="text" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang'];?>" required > <br><br>
        <label for="nama_barang">Jenis Barang:</label>
        <input type="text" id="nama_barang" name="jenis_barang" value="<?php echo $row['jenis_barang'];?>" required > <br><br>
    </form>
    </main>
 </body>
 </html>