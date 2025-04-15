<?php
require"d.php";
$mail=$_POST["email"];
$pass=$_POST["password"];
$query ="select * from sm where email='$mail' and password='$pass'"; 
$res=mysqli_query($con,$query); 
if(mysqli_num_rows($res)>=1)
{
    echo '<script> alert("you have avalid USer logged in succeffly")
    </script>';
    require "home.html";
}
else {
    echo '<script> alert("invalid usrname/password")
    </script>';
    require "signup.html";
}
mysqli_close($con); 
?>
