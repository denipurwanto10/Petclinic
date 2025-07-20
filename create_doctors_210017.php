<?php
if(isset($_POST)){
    include "koneksi_210017.php";
    $query = "INSERT INTO doctors (doctor_name, doctor_gender, doctor_address, doctor_phone) VALUES ('$_POST[doctor_name]', '$_POST[doctor_gender]', '$_POST[doctor_address]', '$_POST[doctor_phone]')";
}

$create = mysqli_query($db_connection, $query);

if($create){
    //echo "<p>Doctors added succesfully</p>";
    echo "<script> alert('Doctors added succesfully !'); </script>";
} else {
    //echo "<p>Doctors add failed</p>";
    echo "<script> alert('Doctors add failed !'); </script>";
}
  ?>
  <!--<p><a href="data_peliharaan.php">Back To Pets List</a></p> -->
  <script>window.location.replace('read_doctors_210017.php');</script>