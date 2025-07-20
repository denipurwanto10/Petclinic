<?php
if(isset($_POST)){
    include "koneksi_210017.php";

    $query = "UPDATE users_210017 set
    username_210017 = '$_POST[username_210017]',
    usertype_210017 = '$_POST[usertype_210017]',
    fullname_210017 = '$_POST[fullname_210017]'
    WHERE userid_210017 = '$_POST[userid_210017]'
    ";
}

$update = mysqli_query($db_connection, $query);

if($update){
    //echo "<p>Pet added succesfully</p>";
    echo "<script> alert('User updated succesfully !'); </script>"; 
} else {
    //echo "<p>Pet add failed</p>";
    echo "<script> alert('User updated failed !'); </script>";
}
  ?>
  <!--<p><a href="data_peliharaan.php">Back To Pets List</a></p> -->
  <script>window.location.replace('read_user_210017.php');</script>