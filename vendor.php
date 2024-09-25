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
<h1 class="recent-Articles">Vendor</h1>
        
    </div>
<table border="1">
        <tr>
        <th>ID </th>
        <th>Nama </th>
        <th>Kontak</th>
        <th>Nama Barang</th>
        <th>Aksi</th>
</tr>
<?php
$dbuser = "SELECT*FROM vendor";
$hasil_dbuser = mysqli_query ($koneksi,$dbuser);
if(!$hasil_dbuser){
    die("koneksi gagal".mysqli_connect_errno().
    mysqli_connect_error($koneksi));
}
while($data = mysqli_fetch_assoc($hasil_dbuser))
{
    echo "<tr>";
    echo "<td>$data[id_vendor]</td>";
    echo "<td>$data[nama]</td>";
    echo "<td>$data[kontak]</td>";
    echo "<td>$data[nama_barang]</td>";
    echo "<td><a href=edit_vendor.php?id_vendor={$data['id_vendor']}'><button>Edit</button>
    </td>";
    echo "<td><a href=hapus_vendor.php?id_vendor={$data['id_vendor']}><button>Hapus</button>
    </td>";
    echo "</tr>";
}
mysqli_free_result($hasil_dbuser);
?>
<?php
echo '
<form action="tambah_vendor.php"method="POST">
<button>Tambah Vendor</button>
</form>';
?>


</body>
</html>