<?php
if (isset($_POST['upload'])){
    include "koneksi_210017.php";
    $folder = 'uploads/pets/';
    if(move_uploaded_file($_FILES['new_photo']['tmp_name'],$folder . $_FILES['new_photo']['name'] )){
        $photo=$_FILES['new_photo']['name'];
        $query="UPDATE pets set pet_photo='$photo' WHERE pet_id='$_POST[pet_id]'";
        $upload=mysqli_query($db_connection ,$query);
        if($upload){
            if($_POST['pet_photo'] !== 'default.jpg') unlink($folder . $_POST['pet_photo']);
            echo "<script>alert('Change Photo Successed');window.location.replace('read_pet_210017.php');</script>";
        } else {
            echo "<script>alert('Change Photo Failed');window.location.replace('pet_photo_210017.php?id=$_POST[pet_id]');</script>";
        }
    } else {
        echo "<script>alert('Upload Photo Failed');window.location.replace('pet_photo_210017.php?id=$_POST[pet_id]');</script>";
    }
}
  ?>