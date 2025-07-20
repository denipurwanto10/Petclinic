<?php
if(isset($_POST)){
    include "koneksi_210017.php";
    $folder = 'uploads/doctors/';
    if(empty($_FILES['new_photo']['name'])){
    $query = "UPDATE doctors set
    doctor_name = '$_POST[doctor_name]',
    doctor_gender = '$_POST[doctor_gender]',
    doctor_address = '$_POST[doctor_address]',
    doctor_phone = '$_POST[doctor_phone]'
    WHERE doctor_id = '$_POST[doctor_id]'
    ";
    $upload = mysqli_query($db_connection, $query);
    if($upload){
        echo "<script>alert('Update Doctor Successed');window.location.replace('read_doctors_210017.php');</script>";
    } else {
        echo "<script>alert('Update Doctor Failed');window.location.replace('edit_doctors_210017.php?id=$_POST[doctor_id]');</script>";
    }
}
}
    if(move_uploaded_file($_FILES['new_photo']['tmp_name'],$folder . $_FILES['new_photo']['name'] )){
        $photo=$_FILES['new_photo']['name'];
    $query = "UPDATE doctors set
    doctor_name = '$_POST[doctor_name]',
    doctor_gender = '$_POST[doctor_gender]',
    doctor_address = '$_POST[doctor_address]',
    doctor_phone = '$_POST[doctor_phone]',
    doctor_photo = '$photo'
    WHERE doctor_id = '$_POST[doctor_id]'
    ";
    $upload = mysqli_query($db_connection, $query);
    if($upload){
        if($_POST['doctor_photo'] !== 'default.png') unlink($folder . $_POST['doctor_photo']);
        echo "<script>alert('Update Doctor Successed');window.location.replace('read_doctors_210017.php');</script>";
    } else {
        echo "<script>alert('Update Doctor Failed');window.location.replace('edit_doctors_210017.php?id=$_POST[doctor_id]');</script>";
    }
} else {
    echo "<script>alert('Upload Photo Failed');window.location.replace('edit_doctors_210017.php?id=$_POST[doctor_id]');</script>";
}

?>