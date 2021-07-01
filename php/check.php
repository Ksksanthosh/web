<?php
include "config.php";

$uname = mysqli_real_escape_string($con,$_POST['emailid']);
$password = mysqli_real_escape_string($con,$_POST['password']);

/*$uname='sundar';
$password='sundar';*/
if ($uname != "" && $password != ""){

    $sql_query = "SELECT * FROM login WHERE email_Id='".$uname."' and password='".$password."'";
   
    $result = mysqli_query($con,$sql_query);
     
    $count = mysqli_num_rows($result);

    if($count > 0){
    	echo "successfully logged in";
        $_SESSION['User']=$uname;
         header('location:../html/allevents.php');

    }else{
        // header('location:login.html');
        header('location:../html/index.php?error=Invalid User name/password');
        // echo $result;
        
    }

}else {
	header('location:../html/index.php?error=Invalid User name/password');
}
?>