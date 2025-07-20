<?php
if(isset($_POST['save'])){
    include "koneksi_210017.php";
    $password = password_hash($_POST['usertype_210017'], PASSWORD_DEFAULT);
    $query = "INSERT INTO users_210017 (username_210017, usertype_210017, fullname_210017) VALUES ('$_POST[username_210017]', '$_POST[usertype_210017]', '$_POST[fullname_210017]')";
}

$create = mysqli_query($db_connection, $query);

if($create){
    //echo "<p>Pet added succesfully</p>";
    echo "<script> alert('User added succesfully !'); </script>";
} else {
    //echo "<p>Pet add failed</p>";
    echo "<script> alert('User add failed !'); </script>";
}
  ?>
  <!--<p><a href="data_peliharaan.php">Back To Pets List</a></p> -->
<script>window.location.replace('read_user_210017.php');</script>