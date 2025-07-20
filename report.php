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
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="style/cat.png" rel="icon">
    <title>Petclinic Deni</title>
</head>
<body id="page-top"><br>
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
</nav><br>
<div class="container">
          </div><br>
      <div class="container">
      <h4 style=" font-weight:bold;">Monthly Report</h4>
      <?php
    $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $year = date('Y');
    ?>
    <form>
        <p>
            Select
            <select class="custom-select" name="month" style="width:120px;" required>
                <option value="">Month</option>
                <?php for($m=1; $m <=12; $m++) { ?>
                <option value="<?=$m?>"><?=$months[$m-1]?></option>
                <?php } ?>
            </select>
            <select class="custom-select" name="year" style="width:120px;" required>
                <option value="">Year</option>
                <?php for($y=0; $y <=2; $y++) { ?>
                <option value="<?=$year-$y?>"><?=$year-$y?></option>
                <?php } ?>
            </select>
            <button class= "btn btn-success" type="submit" ><img id="gambar2" class="" src="style/search.png"  width="23px"></button>
        </p>
        <?php if(isset($_GET['year'])) { 
            include "koneksi_210017.php";
            $query = "SELECT m.mr_date_210017, d.doctor_name, p.pet_name, p.pet_owner, m.cost_210017 from medicals_210017
            AS m, doctors AS d, pets AS p where m.doctor_id = d.doctor_id AND m.pet_id=p.pet_id AND MONTH(m.mr_date_210017)=
            '$_GET[month]' AND YEAR(m.mr_date_210017)='$_GET[year]'";
            $report = mysqli_query($db_connection, $query);
            ?>
            <div class="container" id="box">
            <h4 style="color:white; font-weight:bold;" >Report Periode <?=$months[$_GET['month']-1]?> - <?=$_GET['year']?></h4><br>
            <table id="tabel" class="table  table-hover table-dark">
            <tr>
            <th scope="col" style="text-align:center"><p>No</p></th>
                <th scope="col" style="text-align:center"><p>Date</p></th>
                <th scope="col" style="text-align:center"><p>Doctor</p></th>
                <th scope="col" style="text-align:center"><p>Pet</p></th>
                <th scope="col" style="text-align:center"><p>Owner</p></th>
                <th scope="col" style="text-align:center"><p>Pay ($)</p></th>
            </tr>
            <?php
            if(mysqli_num_rows($report) > 0){
                $i=1; $total=0;
                foreach($report as $data) :
                    $total = $total + $data['cost_210017'];
                    ?>
            <tr>
                <td scope="row" style="text-align:center"><?=$i++?></td>
                <td scope="row" style="text-align:center"><?=$data['mr_date_210017']?></td>
                <td scope="row" style="text-align:center"><?=$data['doctor_name']?></td>
                <td scope="row" style="text-align:center"><?=$data['pet_name']?></td>
                <td scope="row" style="text-align:center"><?=$data['pet_owner']?></td>
                <td scope="row" style="text-align:center"><?=$data['cost_210017']?></td>
            </tr>
            <?php endforeach; ?>
            <tr><td style="text-align:right" colspan="7">Total : $ <?=$total?></td></tr>
            <?php } else { ?>
            <tr><td class = "td" colspan="7" align="center">No Record</td></tr>
            <?php } ?>
        </table></div><br>
        <?php } ?>
        <a type="button" class="btn btn-danger btn-sm" href="index.php">Back to Home</a>
        </div>
</div>
    </form> 
      <br><br>
            <?php
        include "koneksi_210017.php";
        $query = "SELECT * FROM users_210017 WHERE userid_210017 = '$_SESSION[userid_210017]'";
        $user = mysqli_query($db_connection, $query);   
        $data = mysqli_fetch_array($user);
          ?>
<br><br>
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
                    <a href="report.php" class="button btn btn-primary">Cancel</a>
                    <input  type="hidden" name="user_photo_210017" value="<?=$data['user_photo_210017']?>"></input>
                    <input  type="hidden" name="userid_210017" value="<?=$data['userid_210017']?>"></input>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>

<script type="text/javascript" src="js/jQuery3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
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
                    <a href="report.php" class="button btn btn-primary">Cancel</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
 <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Users</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                    <div class="modal-body">
                        <form method="post" action="create_user_210017.php">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Username</label>
                                <input type="text" class="form-control" name="username_210017">
                            </div>
                            <div class="input-group">
  <div class="input-group-prepend">
  <label for="exampleFormControlInput1">Usertype</label>&nbsp;&nbsp;
    <div class="input-group-text">
    <input type="radio"  name="usertype_210017" value="Staff" aria-label="Radio button for following text input">&nbsp; Staff
    </div>
    <div class="input-group-text">
    <input type="radio" name="usertype_210017" value="Manager" aria-label="Radio button for following text input">&nbsp; Manager
    </div>
  </div>
</div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Fullname</label>
                                <input type="text" class="form-control" name="fullname_210017">
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                    <button class= "btn btn-success" type="submit" name="save">Save</button>
                    <button class= "btn btn-danger" type="reset" name="reset">Reset</button>
                    <a href="read_user_210017.php" class="button btn btn-primary">Cancel</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
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