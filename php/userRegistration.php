<?php
include "config.php";
if (isset($_POST['name']) && isset($_POST['password'])
    && isset($_POST['emailid']) && isset($_POST['phonenumber'])) 
{

		session_start();
		function validate($data){
		       $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
			}
		function email_validation($str) {
		    	return (!preg_match(
				"^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str))
		        ? FALSE : TRUE;
		}
		function validate_mobile($mobile)
		{
			return (!preg_match('/^[0-9]{10}+$/', $mobile)) ? FALSE : TRUE;
		}
		$name = validate($_POST['name']);
		$password =validate($_POST['password']);
		$emailid = validate($_POST['emailid']);
		$phonenumber = validate($_POST['phonenumber']);

		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);

		$user_data = 'name='. $name. '&phonenumber='. $phonenumber. '&emailid='. $emailid;
		if (empty($name)) {
		header("Location: ../html/userRegistration.php?error=Name is required&$user_data");
	    exit();
		}
		else if(empty($phonenumber)){
	        header("Location: ../html/userRegistration.php?error=Phone Number is required&$user_data");
		    exit();
		}
		else if(empty($emailid)){
	        header("Location: ../html/userRegistration.php?error=Email ID is required&$user_data");
		    exit();
		}
		else if(empty($password)){
	        header("Location: ../html/userRegistration.php?pass_error=Password is required&$user_data");
		    exit();
		}
		

	
	else{

		// hashing the password
        // $pass = md5($pass);

	    $sql = "SELECT * FROM logindetails WHERE email_Id='$emailid' ";
		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: ../html/userRegistration.php?error=The Email ID  is already registered &$user_data");
	        exit();
		}
		else if(!validate_mobile($phonenumber)){
	        header("Location: ../html/userRegistration.php?error=Enter valid Phone Number.&$user_data");
		    exit();
		}
		else if(!email_validation($emailid)){
	        header("Location: ../html/userRegistration.php?error=Enter valid Email Id.&$user_data");
		    exit();
		}
		elseif (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
			header("Location: ../html/userRegistration.php?pass_error=Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.&$user_data");
	        exit();
		}
		else {
           $sql2 = "INSERT INTO userdetails(user_Name, email_Id, phone_Number, password) VALUES('$name', '$emailid', '$phonenumber', '$password')";
           $result2 = mysqli_query($con, $sql2);
           if ($result2) {
           	 header("Location: ../html/userRegistration.php?success=Your account has been created successfully, Please Login");
	         exit();
           }else {
	           	header("Location: ../html/userRegistration.php?error=Unknown error occurred&$user_data");
		        exit();
           }
		}
	}
}
?>