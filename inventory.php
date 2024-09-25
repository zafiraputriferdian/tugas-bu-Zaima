<?php
include ("navbar.php");
?>
<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_stok1";
$koneksi = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$koneksi){
    die ("koneksi gagal". mysqli_connect_errno().
    mysqli_connect_error());
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
<style type="text/css">
    table{
  width: 100%;
  border-collapse: collapse;
}
th{
  padding: 15px;
  text-align: left;
}

td{
  padding: 15px;
  font-size: 14px;
  color: #ce555f;
}
</style>
<div class="report-header">
<h1 class="recent-Articles">Inventory</h1>
        
    </div>
<table border="1">
        <tr>
        <th>ID </th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Kuantitas Stok</th>
        <th>Lokasi Gudang</th>
        <th>Serial Number</th>
        <th>Harga</th>
        <th>Aksi</th>
</tr>
<?php
$dbuser = "SELECT*FROM inventory 
INNER JOIN vendor ON inventory.nama_barang = id_vendor 
INNER JOIN storageunit ON inventory.lokasi_gudang = id_storageunit";

$hasil_dbuser = mysqli_query ($koneksi,$dbuser);
if(!$hasil_dbuser){
    die("koneksi gagal".mysqli_connect_errno().
    mysqli_connect_error($koneksi));
}
while($data = mysqli_fetch_assoc($hasil_dbuser))
{
    echo "<tr>";
    echo "<td>$data[id_inventory]</td>";
    echo "<td>$data[nama_barang]</td>";
    echo "<td>$data[jenis_barang]</td>";
    echo "<td>$data[kuantitas_stok]</td>";
    echo "<td>$data[lokasi_gudang]</td>";
    echo "<td>$data[serial_number]</td>";
    echo "<td>$data[harga]</td>";
    echo "<td><a href=edit_inventory.php?id_inventory={$data['id_inventory']}><button>Edit</button>
    </td>";
    echo "<td><a href=hapus_inventory.php?id_inventory={$data['id_inventory']} onclick='return confirm(\"Apa yakin DiHapus?\")'><button>Hapus</button>
    </td>";
    echo "</tr>";
}
mysqli_free_result($hasil_dbuser);
?>
<?php
echo '
<form action="tambah_inventory.php"method="POST">
<button>Tambah Inventory</button>
</form>';
?>


</body>
</html>