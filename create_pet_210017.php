<?php
if(isset($_POST)){
    include "koneksi_210017.php";
    $query = "INSERT INTO pets (pet_name, pet_type, pet_gender, pet_age, pet_owner, pet_address, pet_phone) VALUES ('$_POST[pet_name]', '$_POST[pet_type]', '$_POST[pet_gender]', '$_POST[pet_age]', '$_POST[pet_owner]', '$_POST[pet_address]', '$_POST[pet_phone]')";
}

$create = mysqli_query($db_connection, $query);

if($create){
    //echo "<p>Pet added succesfully</p>";
    echo "<script> alert('Pet added succesfully !'); </script>";
} else {
    //echo "<p>Pet add failed</p>";
    echo "<script> alert('Pet add failed !'); </script>";
}
  ?>
  <!--<p><a href="data_peliharaan.php">Back To Pets List</a></p> -->
  <script>window.location.replace('read_pet_210017.php');</script>