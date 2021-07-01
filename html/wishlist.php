<?php
include '../php/config.php';
function removeEvent($eventID)
{
    echo"<script type='text/javascript'> alert($eventId)</script>";
}
if (isset($_GET['error'])) { ?>
 <script type="text/javascript">
 window.onload = function () { alert("<?php echo $_GET['error']; ?>");}</script> <?php }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vuram Culturals</title>
      <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="icon" href="../images/favicon.ico">
<style>
    *{
            font-size: 19px;
  font-family:'Times New Roman', Times, serif;
        }
    body {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

    #login .container #login-row #login-column #login-box {
  margin-top: 40px;
  max-width: 600px;
  height: 650px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
  position:absolute;
  top: -120px;
    }
    #login .container #login-row #login-column #login-box #login-form {
      padding: 5px;
    }
    #login .container #login-row #login-column #login-box #login-form #register-link {
      margin-top: -85px;
    }
    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      
    }
    .myDiv {
          border-radius: 8px;
          background-color: #126E82;
          text-align: center;
          margin-left: 10%;
          height: 250px;
          width: 900px;
    }
 text {
      vertical-align: middle;
      display: table-cell;
      text-align: justify;
    }
    img{
      top: 20px;
      display: table-cell;
      height: 250px;
      width: 250px;
      margin-right: auto;
      vertical-align: middle;
      border-radius: 4px;
    }
</style>
</head>
 
<!------    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="icon" href="../images/favicon.ico">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
Include the above in your HEAD tag ---------->
<script type="text/javascript">
   function removeEvent(eventId)
   {

   }
</script>
<body>
    <div class="wrapper row1">
         <header id="header" class="hoc clear">
      <div id="logo" class="fl_left">

        <h1 class="logoname">VURAM CULTURALS</h1>

      </div>
      <nav id="mainav" class="fl_right">

        <ul class="clear" style="font-family: Times New Roman; font-size: 20px">
          <li><a class="active" href="allevents.php">HOME</a></li>
          <li><a class="active" href="#">WISHLIST</a></li>
          <?php if(isset($_GET['guest']) || isset($_SESSION['guest']))
          {
          ?>
          <li><a class="active" href="../php/logout.php?logout">LOGIN</a></li>
        <?php }else{ ?>
          <li><a class="active" href="../php/logout.php?logout">LOGOUT</a></li>
        <?php } ?>
          </ul>
      </nav>
    </header>
    </div>
    <br>
    <br>
    <?php
    if(isset($_SESSION['guest']))
    {
       ?> <h1 style="text-align: center;font-size: 40px;color:white ;">Login to Add</h1><?php
    }else
    {
        ?><h1 style="text-align: center;font-size: 40px;color:white ;">WISHLIST</h1><?php
        $user_data=mysqli_query($con,"SELECT * FROM userdetails WHERE email_Id='".$_SESSION['User']."' ");
        while($user=  mysqli_fetch_array($user_data))
        {
            $_SESSION['userId']=$user['UserId'];
            $wishlist_data=mysqli_query($con,"SELECT * FROM whishlist WHERE userId= '".$user['UserId']."'");
            if(mysqli_num_rows($wishlist_data) == 0)
            {
               ?> <h1 style="text-align: center;font-size: 30px;color:white ;">It is Empty</h1> <?php
            }
            else
            {
            while($wishlist=mysqli_fetch_array($wishlist_data))
            {
                $event_data=mysqli_query($con,"SELECT * FROM event_details WHERE eventId='".$wishlist['eventId']."'");
                while ($event=mysqli_fetch_array($event_data)) {
                    
                 
        
    ?>
   
    <div id='events' style="display:block;">
    <div class="bgded " style= "padding-top:5px; " >
      <div id="pageintro" class="hoc clear" >
       <div class="myDiv" style="display:flex; font-family: times new roman ;padding-right: 10px; cursor: pointer;"onclick="location.href='eventdescription.php?eventId=<?php echo $event['eventId']?>'" >
            <div class="img"><img src="../images/demo/gallery/<?php echo $event['eventId']?>.png" alt="<?php echo $event['eventId']?>"   />
            </div>
            <div class ="text" style="flex: 5%; padding 5px;">
              <h1 style="padding-top: 10px"> <?php echo $event['event_Name']?></h1>      
              <p><?php echo $event['description']?></p>
            </div>
          </div>
              <button  style="margin-left: 112px;
                color: red;
                background-color: wheat;
                border-radius: 5px;
                cursor: pointer;
                padding-left: 450px;
                padding-right: 390px;" type="submit" onclick="location.href='../php/removeEvent.php?eventId=<?php echo $event['eventId']?>&userId=<?php echo $user['UserId']?>'">Remove</button>
      </div>
    </div>
    </div>
<?php
                }
            }
        }
        }

    } 
?>

</body>
</html>



