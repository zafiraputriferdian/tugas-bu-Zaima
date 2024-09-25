<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_stok1";
$koneksi = mysqli_connect($dbhost ,$dbuser ,$dbpass ,$dbname);

if(!$koneksi){
    die ("koneksi gagal". mysqli_connect_errno().
    mysqli_connect_error());
}
$Query = "DROP TABLE IF EXISTS db_stok1";
$hsl_query = mysqli_query ($koneksi,$Query);

if(!$hsl_query){
    die("db tidak ada".mysqli_errno($koneksi).
    mysqli_error($koneksi));
}
?>



</body>
</html>