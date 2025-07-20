<?php
session_start();
if(!isset($_SESSION['login'])){
  echo "<script>alert('Please Login First !'); window.location.replace('form_login_210017.php');</script>";
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="style/cat.png" rel="icon">
    <title>Medicals Record</title>
</head>
<body id="page-top">
<style>
  body{
    background-image: url('style/gambar.jpg');
    background-repeat: no-repeat;
    background-size: cover;
  }
  #box {
    width: 200%;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.3);
    background-image: url('style/gambar2.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    border-radius: 10px;
    padding: 10px;
}
</style>
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:black;">
    <div class="container">
  <a class="navbar-brand" href="#page-top" style="font-weight:bold">Petclinic Deni&nbsp;<img id="gambar2" class="rounded float-right" src="style/cat.png"  width="30px" height="30px"></a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-item nav-link active" href="index.php"><img id="gambar2" class="rounded float-left" src="style/home.png"  width="23px">&nbsp;Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link"  data-toggle="modal" data-target="#modal" href=""><img id="gambar2" class="rounded float-left" src="style/image.png"  width="23px">&nbsp;Change Photo</a>
      <a class="nav-item nav-link" data-toggle="modal" data-target="#modal2" href=""><img id="gambar2" class="rounded float-left" src="style/password.png"  width="23px">&nbsp;Change Password</a>
      <a class="nav-item nav-link" href="logout_210017.php"><img id="gambar2" class="rounded float-left" src="style/logout.png"  width="23px">&nbsp;Logout</a>
    </div>
  </div>
</div>
</nav><br><br><br>
<div class="container" id="box">
    <h2 style="color:white; font-weight:bold;">Medicals Record</h2><br>
    <?php
        include "koneksi_210017.php";
        $query = "SELECT * FROM pets WHERE pet_id = '$_GET[id]'";
        $pets = mysqli_query($db_connection, $query);   
        $data1 = mysqli_fetch_assoc($pets);
        $querymed = "SELECT * FROM medicals_210017 AS m, doctors AS d WHERE m.pet_id = '$_GET[id]' AND m.doctor_id = d.doctor_id";
        $medicals = mysqli_query($db_connection, $querymed);   
          ?>
          <table class="table  table-hover table-striped table-dark">
            <tr>
                <td>Pet ID / Name</td>
                <td> <?php echo $data1['pet_id']; ?> / <?php echo $data1['pet_name']; ?> </td>
            </tr>
            <tr>
                <td>Type / Gender / Age</td>
                <td> <?php echo $data1['pet_type']; ?> / <?php echo $data1['pet_gender']; ?> / <?php echo $data1['pet_age']; ?> </td>
            </tr>
            <tr>
                <td>Owner</td>
                <td> <?php echo $data1['pet_owner']; ?> / <?php echo $data1['pet_address']; ?> / <?php echo $data1['pet_phone']; ?> </td>
            </tr>
          </table><div class="btn-group rounded float-right" role="group" aria-label="Basic example">
  <button type="button" id="tombol2" class="btn btn-success btn-sm "><img id="gambar2" class="" src="style/show.png"  width="20ox" height="20px"></button>
  <button type="button" id="tombol" class="btn btn-danger btn-sm"><img id="gambar2" class="" src="style/hidden.png"  width="20ox" height="20px"></button>
</div><br><br>
          <table id="tabel" class="table  table-hover table-striped table-dark">
            <tr>
                 <th scope="col" style="text-align:center"><p class = "th">No</p></th>
                 <th scope="col" style="text-align:center"><p class = "th">Date</p></th>
                 <th scope="col" style="text-align:center"><p class = "th">Doctor</p></th>
                 <th scope="col" style="text-align:center"><p class = "th">Symptom</p></th>
                 <th scope="col" style="text-align:center"><p class = "th">Diagnose</p></th>
                 <th scope="col" style="text-align:center"><p class = "th">Treatment</p></th>
                 <th scope="col" style="text-align:center"><p class = "th">Cost ($)</p></th>
</tr>
<?php
if(mysqli_num_rows($medicals)>0){
    $i = 1;
    foreach($medicals as $data2) :
?>
<tr>
    <td class="td"><?php echo $i++ ?></td>
    <td class="td"><?php echo $data2['mr_date_210017']; ?></td>
    <td class="td"><?php echo $data2['doctor_name']; ?></td>
    <td class="td"><?php echo $data2['symptom_210017']; ?> </td>
    <td class="td"><?php echo $data2['diagnose_210017']; ?></td>
    <td class="td"><?php echo $data2['treatment_210017']; ?></td>
    <td class="td"><?php echo $data2['cost_210017']; ?></td>
</tr>
<?php
endforeach;
} else {
 ?>
<tr><td class = "td" colspan="7" align="center">No Record</td></tr>
<?php } ?>
          </table><br>
          <a class="btn btn-success btn-sm" href="" data-toggle="modal" data-target="#modal8">Add New Record</a>
          <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="modal8" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Medicals</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                    <div class="modal-body">
                    <?php
        include "koneksi_210017.php";
        $query = "SELECT * FROM pets WHERE pet_id = '$_GET[id]'";
        $pets = mysqli_query($db_connection, $query);   
        $data1 = mysqli_fetch_assoc($pets);
        $querydoc = "SELECT * FROM doctors";
        $doctors = mysqli_query($db_connection, $querydoc);   
          ?>
                    <table class="table  table-hover table-striped table-dark">
            <tr>
                <td>Pet ID / Name</td>
                <td> <?php echo $data1['pet_id']; ?> / <?php echo $data1['pet_name']; ?> </td>
            </tr>
            <tr>
                <td>Type / Gender / Age</td>
                <td> <?php echo $data1['pet_type']; ?> / <?php echo $data1['pet_gender']; ?> / <?php echo $data1['pet_age']; ?> </td>
            </tr>
            <tr>
                <td>Owner</td>
                <td> <?php echo $data1['pet_owner']; ?> / <?php echo $data1['pet_address']; ?> / <?php echo $data1['pet_phone']; ?> </td>
            </tr>
          </table>
          <form method="post" action="create_medical_210017.php">
          <div class="form-group">
            <label for="exampleFormControlInput1">Doctor</label>
            <select class="custom-select" name="doctor_id" required>
                            <option value="">Choose</option>
                            <?php foreach ($doctors as $data2) : ?>
                            <option value="<?php echo $data2['doctor_id']; ?>"><?php echo $data2['doctor_name']; ?></option>
                            <?php endforeach; ?>
                            </select>
</div>
                <div class="form-group">
                <label for="exampleFormControlInput1">Symptom</label>
                <td><textarea class="form-control" name="symptom_210017" required></textarea></td>
                            </div>
                            <div class="form-group">
                <label for="exampleFormControlInput1">Diagnose</label>
                <td><textarea class="form-control" name="diagnose_210017" required></textarea></td>
                            </div>
                            <div class="form-group">
                <label for="exampleFormControlInput1">Treatment</label>
                <td><textarea class="form-control" name="treatment_210017" required></textarea></td>
                            </div>
                            <div class="form-group">
                <label for="exampleFormControlInput1">Cost ($)</label>
                <td><textarea class="form-control" name="cost_210017" required></textarea></td>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                    <button class= "btn btn-success" type="submit" name="save">Save</button>
                    <button class= "btn btn-danger" type="reset" name="reset">Reset</button>
                    <a href="medicals_210017.php?id=<?php echo $data1['pet_id']?>" class="button btn btn-primary">Cancel</a>
                    <input type="hidden" name="pet_id" value="<?=$data1['pet_id']?>">
                    </form>
                    </div>
                </div>
            </div>
        </div>
          <a class="btn btn-danger btn-sm" href="read_pet_210017.php">Back To Pet List</a>
          
</div>
<?php
        include "koneksi_210017.php";
        $query = "SELECT * FROM users_210017 WHERE userid_210017 = '$_SESSION[userid_210017]'";
        $user = mysqli_query($db_connection, $query);   
        $data = mysqli_fetch_array($user);
          ?>
<!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
        <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                    <div class="modal-body">
                        <form method="post" action="user_upload_210017.php" enctype="multipart/form-data">
                            <div class="form-group">
                            <img src="uploads/users/<?php echo $data['user_photo_210017']; ?>" width="100" height="100">
                            </div>
                            <div class="form-group">
                            <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" name="new_photo_210017" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
</div>
                    <div class="modal-footer">
                    <button class= "btn btn-success" type="submit" name="upload">Save</button>
                    <button class= "btn btn-danger" type="reset" name="reset">Reset</button>
                    <a href="medicals_210017.php?id=<?php echo $data1['pet_id']?>" class="button btn btn-primary">Cancel</a>
                    <input  type="hidden" name="user_photo_210017" value="<?=$data['user_photo_210017']?>"></input>
                    <input  type="hidden" name="userid_210017" value="<?=$data['userid_210017']?>"></input>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
        <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                    <div class="modal-body">
                    <form method="post" action="update_password_210017.php">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">New Password</label>
                                <input type="password" class="form-control" id="pass" name="new_password_210017">
                            </div>
                            <div class="input-group">
    <div class="input-group mb-3">
  <div class="input-group-prepend">
      <input type="checkbox" onclick="show()">&nbsp; Show Password 
    </div>
</div>
                    <div class="modal-footer">
                    <button class= "btn btn-success" type="submit" name="change">Save</button>
                    <button class= "btn btn-danger" type="reset" name="reset">Reset</button>
                    <a href="medicals_210017.php?id=<?php echo $data1['pet_id']?>" class="button btn btn-primary">Cancel</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript" src="js/jQuery3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--<script>
$(document).ready(function(){
        $("body").css("background-color","");
      });
</script> -->
<script>
  $(document).ready(function(){
    $("#tombol").click(function() {
    $('#tabel').fadeOut('slow');
  });
});
$(document).ready(function(){
    $("#tombol2").click(function() {
    $('#tabel').fadeIn('slow');
  });
});
</script>
<script>
    function show(){
    var x = document.getElementById("pass");
    if(x.type === "password"){
        x.type = "text" ;
    } else {
        x.type = "password" ;
    }
}
    </script>
    
</body>
</html>