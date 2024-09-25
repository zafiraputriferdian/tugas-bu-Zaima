<?php 
include ("koneksi.php");
if(isset($_GET['id_inventory'])){
    $id = $_GET['id_inventory'];

    $sql = "DELETE FROM inventory WHERE id_inventory ='$id'";
    $hsl = mysqli_query($koneksi, $sql);
    var_dump($hsl);

    if($hsl){
        echo "<script>
        alert('Data Berhasil Dihapus');
        location='inventory.php';
        </script>";
    }else{
        echo "<script>
        alert('Data Gagal Dihapus: ". mysqli_error($koneksi) ."');
        location='inventory.php';
        </script>";
    }
}else{
    echo "<script>
    alert('ID Tidak Ditemukan');
    location='inventory.php';
    </script>";
}
?>