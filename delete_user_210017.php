<?php
if(isset($_GET['id'])){
    include "koneksi_210017.php";

    $query = "DELETE FROM users_210017 WHERE userid_210017 = '$_GET[id]'
    ";
}

$delete = mysqli_query($db_connection, $query);

if($delete){
    //echo "<p>Pet added succesfully</p>";
    echo "<script> alert('Delete deleted succesfully !'); </script>";
} else {
    //echo "<p>Pet add failed</p>";
    echo "<script> alert('Delete deleted failed !'); </script>";
}
  ?>
  <!--<p><a href="data_peliharaan.php">Back To Pets List</a></p> -->
  <script>window.location.replace('read_user_210017.php');</script>