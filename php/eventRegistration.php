<?php
	include "config.php";
	// include "gmailtogmail.php";
	function addUser($userId,$eventId,$con)
	{
			
            	$sql="INSERT INTO registration_details (userId, eventId) VALUES ('".$userId."','".$eventId."')";
				$result =mysqli_query($con,$sql);
				// header("Location: ../html/userRegistrationConformation.php?message=Registration is confirmed. Check your inbox");
            
	}
	// function returnUserId($emailid,$con)
	// {
	// 	$co_detail=mysqli_query($con,"SELECT * FROM  coparticipants WHERE emailId='".$emailid."'");
	// 	while($data=mysqli_fetch_array($co_detail))
	// 	{
	// 		return $data['userId'];
	// 	}
	// }
	function validate($data){
		       $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
	}
	function send_email($userid,$eventid,$con)
	{
		$userdata=mysqli_query($con,"SELECT * FROM userdetails WHERE UserId='".$userid."'");
		$eventdata=mysqli_query($con,"SELECT * FROM event_details WHERE eventId=".$eventid."");
		$regdata=mysqli_query($con,"SELECT * FROM registration_details WHERE userId='".$userid."'  and eventId='".$eventid."' ");
		while($user=mysqli_fetch_array($userdata))
		{
			while($event=mysqli_fetch_array($eventdata))
			{
				while($reg=mysqli_fetch_array($regdata))
				{
					require_once('gmailtogmail.php');
					// header('location:gmailtogmail.php?receiver='.$user['email_Id'].'&receivername='.$user['user_Name'].'&evename='.$event['event_Name'].'&evedate='.$event['event_date'].'&stime='.$event['stime'].'&etime='.$event['etime'].'&id='.$reg['registration_id']);
					mailto($user['email_Id'],$user['user_Name'],$event['event_Name'],$event['event_date'],$event['stime'],$event['etime'],$reg['registration_id']);
				}
			}
		}
	}
	if(isset($_SESSION['eventId']) && isset($_SESSION['User']))
	{
		
		if( !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phonenumber'])){
			$co_name= $_POST['name'];
			$co_email= $_POST['email'];
			$co_phonenumber= $_POST['phonenumber'];
			// echo  count($co_name);
			for ($i=0; $i< count($co_name); $i++)

			{
				
				$username=validate($co_name[$i]);
				$email=validate($co_email[$i]);
				$phonenumber=validate($co_phonenumber[$i]);
				// echo $username;
				// echo $email;
				// echo $phonenumber;
				$query="INSERT INTO userdetails(user_Name,email_Id,phone_Number) VALUES ('$username', '$email' , '$phonenumber')";
				$data=mysqli_query($con,$query );
				$user_data_q= "SELECT * FROM userdetails WHERE email_Id='".$email."' ";
	            $user_data = mysqli_query($con,$user_data_q);
	            while($user=mysqli_fetch_array($user_data))
	            {
					echo addUser($user['UserId'],$_SESSION['eventId'],$con);
					echo send_email($user['UserId'],$_SESSION['eventId'],$con);
				}
				$user_data_q= "SELECT * FROM userdetails WHERE email_Id='".$_SESSION['User']."' ";
	            $user_data = mysqli_query($con,$user_data_q);
	            while($user=mysqli_fetch_array($user_data))
	            {
					echo addUser($user['UserId'],$_SESSION['eventId'],$con);
					echo send_email($user['UserId'],$_SESSION['eventId'],$con);
				}
				// header("Location: ../html/userRegistrationConformation.php?message=Registration is confirmed. Check your inbox");
			}

				
		}else
		{
			$user_data_q= "SELECT * FROM userdetails WHERE email_Id='".$_SESSION['User']."' ";
            $user_data = mysqli_query($con,$user_data_q);
            while($user=mysqli_fetch_array($user_data))
            {
				echo addUser($user['UserId'],$_SESSION['eventId'],$con);
				echo send_email($user['UserId'],$_SESSION['eventId'],$con);
			}
			header("Location: ../html/userRegistrationConformation.php?message=Registration is confirmed. Check your inbox");
		}
	}
?>