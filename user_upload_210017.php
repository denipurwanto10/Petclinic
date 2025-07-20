<?php
session_start();
if (isset($_POST['upload'])){
    include "koneksi_210017.php";
    $folder = 'uploads/users/';
    if(move_uploaded_file($_FILES['new_photo_210017']['tmp_name'],$folder . $_FILES['new_photo_210017']['name'] )){
        $photo=$_FILES['new_photo_210017']['name'];
        $query="UPDATE users_210017 set user_photo_210017='$photo' WHERE userid_210017='$_POST[userid_210017]'";
        $upload=mysqli_query($db_connection ,$query);
        if($upload){
            if($_POST['user_photo_210017'] !== 'default.png') unlink($folder . $_POST['user_photo_210017']);
            echo "<script>alert('Change Photo Successed');window.location.replace('index.php');</script>";
        } else {
            echo "<script>alert('Change Photo Failed');window.location.replace('user_photo_210017.php?id=$_POST[userid_210017]');</script>";
        }
    } else {
        echo "<script>alert('Upload Photo Failed');window.location.replace('user_photo_210017.php?id=$_POST[userid_210017]');</script>";
    }
}
  ?>