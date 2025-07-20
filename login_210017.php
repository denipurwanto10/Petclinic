<?php
session_start(); //start the session
if(isset($_POST['login'])){ //check post variable from form
    include "koneksi_210017.php"; //call koneksi

    //make the query based on username
    $query="SELECT * FROM users_210017 WHERE username_210017='$_POST[username_210017]'";

    //run the query
    $login=mysqli_query($db_connection,$query); 
    if(mysqli_num_rows($login) > 0){    //check if the username found or not
        $user=mysqli_fetch_assoc($login);   //if user found, extract the data
        if(password_verify($_POST['password_210017'], $user['password_210017'])){   //verify the password
            //if password match, then make session variable
            $_SESSION['login'] = TRUE;
            $_SESSION['userid_210017'] = $user['userid_210017'];
            $_SESSION['username_210017'] = $user['username_210017'];
            $_SESSION['password_210017'] = $user['password_210017'];
            $_SESSION['usertype_210017'] = $user['usertype_210017'];
            $_SESSION['fullname_210017'] = $user['fullname_210017'];

            //success login msg
            echo "<script>alert('Login Success !'); window.location.replace('index.php');</script>";
        } else { //password did not match
            //wrong password msg then redirect to login form
            echo "<script>alert('Login failed, wrong password !'); window.location.replace('form_login_210017.php');</script>";
        }
    } else {    //user not found
        //login failed msg then redirect to login form
        echo "<script>alert('Login failed, user not found !'); window.location.replace('form_login_210017.php');</script>";
    }
}
 ?>