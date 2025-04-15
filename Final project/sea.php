<?php
require"d.php";
$nme=$_POST["name"];
if ($nme=="")
{
    echo '<script> alert("empty filled")
    </script>';
    require "home.html";
}
else {
    $sql="select * from se where name='$nme'";
    $res=mysqli_query($con,$sql);
    $rows=mysqli_num_rows($res);
    if($rows>0){
     print" <table border=1><tr><th>Name </th>
     
     <th>price</th>
     </tr>";
      for($r=1;$r<=$rows;$r++){
     $ro=mysqli_fetch_array($res);
     print "<tr><td>".$ro["name"];      /*  بحول صف لاراري عن طريق اجيب داتا بتاعتها*/
         
     print "</td><td>".$ro["price"];
     print"</td></tr>";
      }
      print"</table>";
    }
    else {                           /* بعمل سيرش علي حاجه مش موجوده*/ 
        echo '<script> alert("not exist")
        </script>';
        require "home.html";                           
        
    }
}
?>