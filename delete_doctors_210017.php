<?php
if(isset($_GET['id'])){
    include "koneksi_210017.php";

    $query = "DELETE FROM doctors WHERE doctor_id = '$_GET[id]'
    ";
}

$delete = mysqli_query($db_connection, $query);

if($delete){
    //echo "<p>Pet added succesfully</p>";
    echo "<script> alert('Doctor deleted succesfully !'); </script>";
} else {
    //echo "<p>Pet add failed</p>";
    echo "<script> alert('Doctor deleted failed !'); </script>";
}
  ?>
  <!--<p><a href="data_peliharaan.php">Back To Pets List</a></p> -->
  <script>window.location.replace('read_doctors_210017.php');</script>