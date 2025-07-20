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
    border-radius: 18px;
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
</nav><br><br>
<div class="container">
          </div><br>
      <div id="box" class="container">
      <h4 style="color:white; font-weight:bold;">Pets List</h4><br> 
      <div class="btn-group" role="group" aria-label="Basic example">
    <button class="btn btn-info btn-sm"><a href=""  data-toggle="modal"
            data-target="#modal9"><img id="gambar2" class="rounded float-right" src="style/plus.png"  width="30px" height="30px"></a></button>
            <br>
        </div><div class="btn-group rounded float-right" role="group" aria-label="Basic example">
  <button type="button" id="tombol2" class="btn btn-success btn-sm "><img id="gambar2" class="" src="style/show.png"  width="20ox" height="20px"></button>
  <button type="button" id="tombol" class="btn btn-danger btn-sm"><img id="gambar2" class="" src="style/hidden.png"  width="20ox" height="20px"></button>
</div><br><br>
      <table id="tabel" class="table table-striped table-hover table-dark">
        <thead>
        <tr>
            <th scope="col" style="text-align:center"><p>No</p></th>
            <th scope="col" style="text-align:center"><p>Name</p></th>
            <th scope="col" style="text-align:center"><p>Type</p></th>
            <th scope="col" style="text-align:center"><p>Gender</p></th>
            <th scope="col" style="text-align:center"><p>Age (Month)</p></th>
            <th scope="col" style="text-align:center"><p>Photo</p></th>
            <th scope="col" style="text-align:center"><p>Owner</p></th>
            <th scope="col" style="text-align:center"><p>Address</p></th>
            <th scope="col" style="text-align:center"><p>Phone</p></th>
            <th scope="col" style="text-align:center"colspan="2"><p>Action</p></th>
        </tr> 
        <?php
        include "koneksi_210017.php";
        $query = "SELECT * FROM pets ";
        $pets = mysqli_query($db_connection, $query);

        $i=1;
        foreach($pets as $data) :
        ?>
        </thead>
        <tbody>
        <tr>
            <td scope="row" style="text-align:center"><?php echo $i++; ?></td>
            <td scope="row" style="text-align:center"><a class="btn btn-primary btn-sm" href="medicals_210017.php?id=<?php echo $data['pet_id']?>"><?php echo $data['pet_name']; ?></a></td>
            <td scope="row" style="text-align:center"><?php echo $data['pet_type']; ?></td>
            <td scope="row" style="text-align:center"><?php echo $data['pet_gender']; ?></td>
            <td scope="row" style="text-align:center"><?php echo $data['pet_age']; ?></td>
            <td scope="row" style="text-align:center"><img src="uploads/pets/<?php echo $data['pet_photo']; ?>" width="50" height="50">&nbsp;&nbsp;<a style="text-align:center" class="badge badge-primary" data-toggle="modal" data-target="#modal5<?php echo $data['pet_id']; ?>" id="btn" href="">Change Photo</a></td>
            <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="modal5<?php echo $data['pet_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <form method="post" action="pet_upload_210017.php" enctype="multipart/form-data">
                            <div class="form-group">
                            <img src="uploads/pets/<?php echo $data['pet_photo']; ?>" width="100" height="100">
                            </div>
                            <div class="form-group">
                            <div class="input-group">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" name="new_photo" class="custom-file-input" id="inputGroupFile01"
      aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
</div>
<div class="modal-footer">
                    <button class= "btn btn-success" type="submit" name="upload">Save</button>
                    <button class= "btn btn-danger" type="reset" name="reset">Reset</button>
                    <a href="read_pet_210017.php" class="button btn btn-primary">Cancel</a>
                    <input  type="hidden" name="pet_photo" value="<?=$data['pet_photo']?>"></input>
                    <input  type="hidden" name="pet_id" value="<?=$data['pet_id']?>"></input>
                    </form>
                    </div>
                </div>
            </div>
            <td scope="row" style="text-align:center"><?php echo $data['pet_owner']; ?></td>
            <td scope="row" style="text-align:center"><?php echo $data['pet_address']; ?></td>
            <td scope="row" style="text-align:center"><?php echo $data['pet_phone']; ?></td>
            <td scope="row" style="text-align:center"><a class="btn btn-warning btn-sm" href="" data-toggle="modal"
            data-target="#modal3<?php echo $data['pet_id']; ?>"><img id="gambar2" class="rounded float-right" src="style/pencil.png"  width="20px" height="20px"></a></td>
             <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="modal9" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Pets</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                    <div class="modal-body">
                        <form method="post" action="create_pet_210017.php">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" name="pet_name">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Type</label>
                            <select name="pet_type" class="custom-select">
                            <option value="">Choose</option>
                        <option value="Cat">Cat</option>
                        <option value="Dog">Dog</option>
                        <option value="Reptil">Reptil</option>
                        <option value="Bird">Bird</option>
                        <option value="Rodent">Rodent</option>
  </select>
        </div>
                            <div class="input-group">
  <div class="input-group-prepend">
  <label for="exampleFormControlInput1">Gender</label>&nbsp;&nbsp;
    <div class="input-group-text">
    <input type="radio"  name="pet_gender" value="Male" aria-label="Radio button for following text input">&nbsp; Male
    </div>
    <div class="input-group-text">
    <input type="radio" name="pet_gender" value="Female" aria-label="Radio button for following text input">&nbsp; Female
    </div>
  </div>
</div>
<div class="form-group">
                                <label for="exampleFormControlInput1">Age (Month)</label>
                                <input type="number" class="form-control" name="pet_age">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Owner</label>
                                <input type="text" class="form-control" name="pet_owner">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Address</label>
                                <textarea type="text" class="form-control" name="pet_address"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Phone</label>
                                <input type="number" class="form-control" name="pet_phone">
                            </div>
                    </div>
                    <div class="modal-footer">
                    <button class= "btn btn-success" type="submit" name="save">Save</button>
                    <button class= "btn btn-danger" type="reset" name="reset">Reset</button>
                    <a href="read_pet_210017.php" class="button btn btn-primary">Cancel</a>
                    </form>
                    </div>
                </div>
            </div>
        </div><!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
        <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="modal3<?php echo $data['pet_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Pets</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                    <div class="modal-body">
                        <form method="post" action="update_pet_210017.php">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" name="pet_name" value="<?php echo $data['pet_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Type</label>
                            <select name="pet_type" class="custom-select">
                            <option value="">Choose</option>
                        <option value="Cat" <?php echo ($data['pet_type']=='Cat')?'selected':'';?>>Cat</option>
                        <option value="Dog" <?php echo ($data['pet_type']=='Dog')?'selected':'';?>>Dog</option>
                        <option value="Reptil" <?php echo ($data['pet_type']=='Reptil')?'selected':'';?>>Reptil</option>
                        <option value="Bird" <?php echo ($data['pet_type']=='Bird')?'selected':'';?>>Bird</option>
                        <option value="Rodent" <?php echo ($data['pet_type']=='Rodent')?'selected':'';?>>Rodent</option>
  </select>
        </div>
                            <div class="input-group">
  <div class="input-group-prepend">
  <label for="exampleFormControlInput1">Gender</label>&nbsp;&nbsp;
    <div class="input-group-text">
    <input type="radio"  name="pet_gender" value="Male"  <?php echo ($data['pet_gender']=='Male')?'checked':'';?> aria-label="Radio button for following text input">&nbsp; Male
    </div>
    <div class="input-group-text">
    <input type="radio" name="pet_gender" value="Female"  <?php echo ($data['pet_gender']=='Female')?'checked':'';?> aria-label="Radio button for following text input">&nbsp; Female
    </div>
  </div>
</div>
<div class="form-group">
                                <label for="exampleFormControlInput1">Age (Month)</label>
                                <input type="number" class="form-control" name="pet_age" value="<?php echo $data['pet_age']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Owner</label>
                                <input type="text" class="form-control" name="pet_owner" value="<?php echo $data['pet_owner']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Address</label>
                                <textarea type="text" class="form-control" name="pet_address"><?php echo $data['pet_address']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Phone</label>
                                <input type="number" class="form-control" name="pet_phone" value="<?php echo $data['pet_phone']; ?>">
                            </div>
                    </div>
                    <div class="modal-footer">
                    <button class= "btn btn-success" type="submit" name="save">Save</button>
                    <button class= "btn btn-danger" type="reset" name="reset">Reset</button>
                    <a href="read_pet_210017.php" class="button btn btn-primary">Cancel</a>
                    <input type="hidden" name="pet_id" value="<?=$data['pet_id']; ?>">
                    </form>
                    </div>
                </div>
            </div>
            <td scope="row" style="text-align:center"><a class="btn btn-danger btn-sm" href="delete_pet_210017.php?id=<?php echo $data['pet_id']?>" onclick="return confirm('Are you sure?')"><img id="gambar2" class="rounded float-right" src="style/trash.png"  width="20px" height="20px"></a></td>
            </tr>
            <tbody>
            <?php endforeach; ?>
            
        </table><button class="btn btn-info btn-sm"><a href="index.php"><img id="gambar2" class="rounded float-right" src="style/back.png"  width="30px" height="30px"></a></button><br><br>
        
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
                    <a href="read_pet_210017.php" class="button btn btn-primary">Cancel</a>
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
                    <a href="read_pet_210017.php" class="button btn btn-primary">Cancel</a>
                    </form>
                    </div>
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