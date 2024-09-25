<?php 
include ("koneksi.php");
if(isset($_GET['id_vendor'])){
    $id = $_GET['id_vendor'];

    $sql = "DELETE FROM vendor WHERE id_vendor ='$id'";
    $hsl = mysqli_query($koneksi, $sql);
    var_dump($hsl);

    if($hsl){
        echo "<script>
        alert('Data Berhasil Dihapus');
        location='vendor.php';
        </script>";
    }else{
        echo "<script>
        alert('Data Gagal Dihapus: ". mysqli_error($koneksi) ."');
        location='vendor.php';
        </script>";
    }
}else{
    echo "<script>
    alert('ID Tidak Ditemukan');
    location='vendor.php';
    </script>";
}
?>