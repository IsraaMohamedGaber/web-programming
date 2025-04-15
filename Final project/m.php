<?php
require"d.php";
$name=$_POST["name"];
$last=$_POST["las"];
$mail=$_POST["email"];
$pass=$_POST["password"];
$repass=$_POST["repassword"];
$addre=$_POST["add"];
$p=$_POST["phone"];
if($name==""||$last==""||$mail==""|| $pass=="" || $repass=="" || $addre==""|| $p=="")
{
    echo '<script> alert("empty filled")
    </script>';
    require "signup.html";
}
    else if($pass!=$repass){
        echo '<script> alert("password not match")
        </script>';
        require "signup.html";
        
    }
    else if(! filter_var($mail,FILTER_VALIDATE_EMAIL))
    {
        echo '<script> alert("invalied email")
        </script>';
        require "signup.html";
      
    }
   // else {
     //   $sql ="select * from sm where name='$name'"; /*query*/
     //   $res=mysqli_query($con,$sql) or 
      //  die(mysqli_error($con)); /* ترجعلي ايرور die مهمه */
       // if(mysqli_num_rows($res)>=1)
       // {
     // echo '<script> alert("username Already taken")
      //  </script>';
       //}
        else {
        $sql ="select * from sm where email='$mail'"; /*query*/
        $res=mysqli_query($con,$sql) or 
        die(mysqli_error($con)); /* ترجعلي ايرور die مهمه */
        if(mysqli_num_rows($res)>=1)
        {
      echo '<script> alert("This Email Already taken")
        </script>';
        require "signup.html";
    }
      
        else {
        mysqli_query($con,"insert into sm (	name,last,email,password,address,phone) values ('$name','$last','$mail','$pass','$addre','$p')");
        echo '<script> alert("done") </script>';
        require "login.html";
        }
        }
   // }
    mysqli_close($con); 
    

?>