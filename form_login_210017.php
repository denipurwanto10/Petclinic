<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style/login.css">
    <link href="style/cat.png" rel="icon">
    <title>Document</title>
</head>
<body>
    <style>
        body{
            background-image: url("style/gambar.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        #box{
            background-image: url("style/gambar2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 17px;
        }
    </style>
<div class="container" id="box">
    <h4 style="font-weight:bold; color:white;">Petclinic Deni<img class="rounded float-right" src="style/cat.png" width="40px;"></h4><br>
    <form method="post" action="login_210017.php">
        <div class="form-group">
            <label style="color:white"><img class="rounded float-left" src="style/user.png" width="23px;">Username</label>
            <input type="text" name="username_210017" class="form-control" placeholder="Username">
</div>
<div class="form-group">
            <label style="color:white"><img class="rounded float-left" src="style/lock.png" width="23px;">Password</label>
            <input type="password" name="password_210017" id="pass" class="form-control" placeholder="Password">
</div>
<div class="input-group mb-3" style="color:white">
  <div class="input-group-prepend">
      <input type="checkbox" onclick="show()" >&nbsp; Show Password 
    </div>
</div>
<button type="submit" class="btn btn-primary" name="login">LOGIN</button>
<button type="reset" class="btn btn-danger" name="reset">RESET</button>
    </form>
</div>
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