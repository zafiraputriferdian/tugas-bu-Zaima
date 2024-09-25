<?php
include ("koneksi.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = mysqli_real_escape_string($koneksi, $_POST['Username']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['Password']);

    $sql = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
    $hsl = mysqli_query($koneksi, $sql);

    if($hsl -> num_rows >0){
        while($data = mysqli_fetch_assoc($hsl)){
            $_SESSION['username'] = $user;
            $_SESSION['level'] = $data['level'];

            if($data['level'] == 'admin'){
                header("location:inventory.php");
            }else if($data['level'] == 'user'){
                header("location:user.php");

            }
        }
    }else{
        echo"SALAH";
    }
}

?>