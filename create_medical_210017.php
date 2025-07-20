<?php
if(isset($_POST['save'])){
    include "koneksi_210017.php";
    $query = "INSERT INTO medicals_210017 (pet_id, doctor_id, symptom_210017, diagnose_210017, treatment_210017, cost_210017) VALUES ('$_POST[pet_id]', '$_POST[doctor_id]', '$_POST[symptom_210017]', '$_POST[diagnose_210017]', '$_POST[treatment_210017]', '$_POST[cost_210017]')";
}

$create = mysqli_query($db_connection, $query);

if($create){
    //echo "<p>Pet added succesfully</p>";
    echo "<script> alert('Medical added succesfully !'); </script>";
} else {
    //echo "<p>Pet add failed</p>";
    echo "<script> alert('Medical add failed !'); </script>";
}
  ?>
  <!--<p><a href="data_peliharaan.php">Back To Pets List</a></p> -->
  <script>window.location.replace("medicals_210017.php?id=<?php echo $_POST['pet_id']; ?>");</script>