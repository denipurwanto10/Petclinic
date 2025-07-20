<?php
session_start();
if(isset($_POST['change'])){
    include "koneksi_210017.php";
    $password = password_hash($_POST['new_password_210017'], PASSWORD_DEFAULT);
    $query="UPDATE users_210017 SET password_210017='$password' WHERE userid_210017='$_SESSION[userid_210017]'";
    $update=mysqli_query($db_connection, $query);
    if($update){
        $_SESSION['password_210017']=$password;
        echo "<script>alert('Change Password Successed !');window.location.replace('index.php');</script>";
    } else {
        echo "<script>alert('Change Password Failed !');window.location.replace('change_password_210017.php');</script>";

    }
}
?>