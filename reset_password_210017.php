<?php
    if(isset($_GET['id'])) {
        include "koneksi_210017.php";
        $password = password_hash($_GET['type'], PASSWORD_DEFAULT);
        $query = "UPDATE users_210017 SET password_210017='$password' WHERE userid_210017='$_GET[id]'";
        $update = mysqli_query($db_connection,$query);
        if($update){
            echo "<script>alert('Reset password successed !')</script>";
        } else {
            echo "<script>alert('Reset password failed !')</script>";
        }
    }
?>
<script>window.location.replace("read_user_210017.php");</script>