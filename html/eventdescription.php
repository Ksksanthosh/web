<?php 
include "../php/config.php";
if(isset($_GET['message'])){
?>
                                <script type="text/javascript">
                                          window.onload = function () { alert("<?php echo $_GET['message']; ?>");}</script>
                                <?php
}
function whishlist($con)
{
  if(isset($_SESSION['guest']))
  {
    return "Please Login";
  }
  elseif(isset($_SESSION['User']))
  {
    $user_data=mysqli_query($con,"SELECT * FROM userdetails WHERE email_Id= '".$_SESSION['User']."' ");
    while ($userdata = mysqli_fetch_array($user_data)) 
    { 
        $whishlistval=mysqli_query($con,"SELECT * FROM whishlist WHERE eventId='".$_GET['eventId']."' and userId= '".$userdata['UserId']."' ");
        $count=mysqli_num_rows($whishlistval);
        if( $count > 0)
        {
          return "Already in Whishlist";
        }
        else{
          $add=mysqli_query($con,"INSERT INTO whishlist (userId,eventId) VALUES ('".$userdata['UserId']."','".$_GET['eventId']."')");
          if($add)
            {
              return("Added to Whishlist");
            }
            else
            {
              return("Internal error occured");
            } 
        }
    }
  }

}
if(isset($_SESSION['User']) || isset($_SESSION['guest']))
{
  $details=mysqli_query($con,"SELECT * FROM event_details");
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Vuram Culturals</title>
  <link rel="icon" href="images/favicon.ico">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  
  <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  
 

  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
 


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
    * body {
      margin: 0;
      color: #40514E;
      text-align: center;
      font-family: arial;
    }

    h1 {
      color: #17a2b8;
      font-size: 4rem;
      font-family: arial;
    }

    h2 {
      font-size: 2rem;
      color: wheat;
      padding-bottom: 20px;
    }

    h3 {
      color: #F7DAD9;
    }

    p {
      line-height: 2;
      line-height: 2;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      color: #01937C;
      font-size: 18px;
    }

    hr {
      border: dotted #FFC107 6px;
      border-bottom: none;
      width: 50%;
      margin: 100px auto 100px auto;
    }

    a {
      color: #11999E;
      font-family: arial;
      margin: 10px 20px;
    }

    a:hover {
      color: #F3C583;
    }

    .top {
      background: #FFEAC9;
      position: relative;
      padding-top: 100px;
    }

    .middle-container {
      margin: auto;
    }


    .intro {
      width: 40%;
      margin: auto;
    }

    .skill-row {
      width: 50%;
      margin: 0px auto 10px auto;
      text-align: left;
    }

    .top-cloud {
      position: absolute;
      right: 300px;
      top: 50px;
    }

    .bottom-cloud {
      position: absolute;
      left: 300px;
      bottom: 300px;
    }

    .left {
      float: left;
      width: 25%;
      margin-right: 20px;
    }

    .right {
      float: right;
      width: 25%;
      margin-left: 20px;
    }

    .contact-me {
      width: 40%;
      margin: 0px 0 100px auto;
    }

    .Team-Events-name {
      line-height: 2;
    }

    .space {
      margin-left: 150px;
    }

    .extra_space {
      margin-left: 230px;
    }

    .participant {
      
      color: #BF1363;
      font-size: 22px;
    }

    .Date {
      margin-top: 70px;
      color: white;
    }

    .oll {
      line-height: 2;
      font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
      color: #01937C;
      font-size: 18px;
    }
    .button {
  background-color: #01937C;
  border: none;
  color: white;
  padding: 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
}
    

    .BUTTON_RKR {
      background: #3D94F6;
      background-image: -webkit-linear-gradient(top, #3D94F6, #1E62D0);
      background-image: -moz-linear-gradient(top, #3D94F6, #1E62D0);
      background-image: -ms-linear-gradient(top, #3D94F6, #1E62D0);
      background-image: -o-linear-gradient(top, #3D94F6, #1E62D0);
      background-image: -webkit-linear-gradient(to bottom, #3D94F6, #1E62D0);
      -webkit-border-radius: 8px;
      -moz-border-radius: 8px;
      border-radius: 20px;
      color: #FFFFFF;
      font-family: 'Merienda', cursive;
      font-size: 40px;
      font-weight: 100;
      padding: auto;
      -webkit-box-shadow: 1px 1px 20px 0 #000000;
      -moz-box-shadow: 1px 1px 20px 0 #000000;
      box-shadow: 1px 1px 20px 0 #000000;
      text-shadow: 1px 1px 20px #000000;
      border: solid #337FED 1px;
      text-decoration: none;
      display: inline-block;
      cursor: pointer;
      text-align: center;
    }

    .BUTTON_RKR:hover {
      border: solid #337FED 1px;
      background: #1E62D0;
      background-image: -webkit-linear-gradient(top, #1E62D0, #3D94F6);
      background-image: -moz-linear-gradient(top, #1E62D0, #3D94F6);
      background-image: -ms-linear-gradient(top, #1E62D0, #3D94F6);
      background-image: -o-linear-gradient(top, #1E62D0, #3D94F6);
      background-image: -webkit-linear-gradient(to bottom, #1E62D0, #3D94F6);
      -webkit-border-radius: 20px;
      -moz-border-radius: 20px;
      border-radius: 20px;
      text-decoration: none;
    }
    .button_small
    {
    background-color: #01937C;
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;
}
    }
  </style>
  <script type="text/javascript">
    function addtoWhishlist()
    {
      alert("<?php echo whishlist($con)?>");
      document.getElementById('whishlist').disabled=true;
    }
  </script>
</head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
   <div class="wrapper row1">
   <header id="header" class="hoc clear">
      <div id="logo" class="fl_left">

        <h1 class="logoname">VURAM CULTURALS</h1>

      </div>
      <nav id="mainav" class="fl_right">

        <ul class="clear" style="font-family: Times New Roman; font-size: 20px">
          <li><a class="active" href="allevents.php">HOME</a></li>
          <li><a class="active" href="wishlist.php">WISHLIST</a></li>
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

    <div class="skills" style="background: white;
    margin-left: 250px;
    margin-right: 250px;
    margin-top: 20px;">

      <div class="skill-row ">
        <?php
         $event_query = "SELECT * FROM event_details WHERE eventId=".$_GET['eventId']." ";
         $eventdata = mysqli_query($con,$event_query);
        while ($data = mysqli_fetch_array($eventdata)) {
        ?>
        <img class="image" src="../images/demo/gallery/<?php echo $data['eventId'];?>.png" alt="">
        <h2><?php echo $data['event_Name'];?></h2>

        <p><?php echo $data['description'];?></p>
        <h2>Rules</h2>     
         <ol class="oll">
            <li >The paper submitted will have to be presented during the event.</li>
            <li>The Teams will get 8 minutes to present their paper. And 2 minutes will be
              for questioning by judges.</li>
            <li>The participants can present their presentation by any means.</li>
            <li>Abstract may not exceed the limit of one Page.</li>
          </ol>
        
        <h2 class="oll" style="color:black;">Event Date : <?php echo $data['event_date'];?></h2>
        <button id="whishlist" class="button_small" onclick="addtoWhishlist()" >Add to Wishlist</button>
        <div class="contact-me" style="margin-left: 200px;">
          <?php 
          ?>
          <button class="button" onclick="location.href='eventregistration.php?eventid=<?php echo($data['eventId']);?>'"> <?php if(isset($_GET['guest']) || isset($_SESSION['guest']))
          {echo"SignUp to Register";}else
          {
            echo "Register";
          } ?></button>
        </div>
      </div>
    <?php } ?>
      <hr>

    </div>
</body>

</html>
<?php
  }else
  {
    header('location:../html/index.php');
  }
?>