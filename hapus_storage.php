<?php
include("koneksi.php");
if(isset($_GET['id_storageunit'])){
    $id = mysqli_real_escape_string($koneksi, $_GET['id_storageunit']);

    $sql = "DELETE FROM storageunit WHERE id_storageunit = '$id'";
    $hsl = mysqli_query($koneksi, $sql);

    if($hsl){
        echo "<script>
        alert('Data berhasil dihapus');
        location='storageunit.php';
        </script>";
    }else{
        echo "<script>
        alert('Data gagal dihapus');
        location='storageunit.php';
        </script>";
    }
}else{
    echo "<script>
    alert('Data berhasil dihapus');
    location='storageunit.php';
    </script>";
}
?>