<?php
session_start();
session_destroy();
echo "<script>alert('Logout succes !'); window.location.replace('form_login_210017.php');</script>";
 ?>