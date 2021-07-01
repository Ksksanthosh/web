<?php
include 'config.php';
if(isset($_GET['eventId']) && isset($_GET['userId']))
{
	$remove_event=mysqli_query($con,"DELETE FROM whishlist WHERE userId= '".$_GET['userId']."' and eventId = '".$_GET['eventId']."'");
	header('location:../html/wishlist.php');
}
else
{
	header('location:../html/wishlist.php?error=Internal Error Occur');
}
?>