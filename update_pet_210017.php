<?php
if(isset($_POST)){
    include "koneksi_210017.php";

    $query = "UPDATE pets set
    pet_name = '$_POST[pet_name]',
    pet_type = '$_POST[pet_type]',
    pet_gender = '$_POST[pet_gender]',
    pet_age = '$_POST[pet_age]',
    pet_owner = '$_POST[pet_owner]',
    pet_address = '$_POST[pet_address]',
    pet_phone = '$_POST[pet_phone]'
    WHERE pet_id = '$_POST[pet_id]'
    ";
}

$update = mysqli_query($db_connection, $query);

if($update){
    //echo "<p>Pet added succesfully</p>";
    echo "<script> alert('Pet updated succesfully !'); </script>";
} else {
    //echo "<p>Pet add failed</p>";
    echo "<script> alert('Pet updated failed !'); </script>";
}
  ?>
  <!--<p><a href="data_peliharaan.php">Back To Pets List</a></p> -->
  <script>window.location.replace('read_pet_210017.php');</script>