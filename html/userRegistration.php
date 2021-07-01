<?php
include '../php/config.php';
session_destroy(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vuram Culturals</title>
    <style>
    
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
  margin-top: 10px;
  max-width: 600px;
  height: auto;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
  border-radius: 10px;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
  margin-top: -85px;
}
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  
}
</style>
</head>
   <meta charset="UTF-8">
  <title>Vuram Culturals</title>
  <link rel="icon" href="images/favicon.ico">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  
  <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
  <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="icon" href="../images/favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  
 

  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
 

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="non-empty.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
<!--     <nav class="navbar navbar-expand-lg bg-white">
        <h1>VURAM CULTURALS</h1>
             <ul class="navbar-nav ml-auto">
        
             <li class="nav-item">
                 <a class="nav-link" href="index.php">Login</a>
             </li>
             
         </ul>
         
     </nav>  --> 
       <div class="wrapper row1">
    <header id="header" class="hoc clear">
      <div id="logo" class="fl_left">

        <h1 class="logoname">VURAM CULTURALS</h1>

      </div>
      <nav id="mainav" class="fl_right">

        <ul class="clear" style="font-family: Times New Roman; font-size: 20px">
          <li><a class="active" href="allevents.php">HOME</a></li>
          <li><a class="active" href="wishlist.php">WISHLIST</a></li>
          <?php if(isset($_GET['guest'])  || isset($_SESSION['guest']))
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
    <form action="../php/userRegistration.php" method="post" >
    <div id="login">
        <h3 class="text-center text-white pt-10"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post">
                            <h3 class="text-center text-info">Sign Up</h3>
                            <div class="form-group">
                              <?php if (isset($_GET['error'])) { ?>
                                <script type="text/javascript">
                                          window.onload = function () { alert("<?php echo $_GET['error']; ?>");}</script>
                                <?php } ?>
                                <?php if (isset($_GET['success'])) { ?>
                                <script type="text/javascript">
                                          window.onload = function () { alert("<?php echo $_GET['success']; ?>");}</script>
                                <?php } ?>
                                <label for="name" class="text-info">Full Name:</label><br>
                                <?php if (isset($_GET['name'])) { ?>
                                     <input type="text" 
                                            name="name" 
                                            placeholder="Name" 
                                            class="form-control"
                                            value="<?php echo $_GET['name']; ?>" required>
                                <?php }else{ ?>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" required>
                                <?php }?>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-info">Phone number:</label><br>
                                <?php if (isset($_GET['phonenumber'])) { ?>
                                   <input type="text" 
                                          name="phonenumber" 
                                          placeholder="Phone Number"
                                          class="form-control"
                                          value="<?php echo $_GET['phonenumber']; ?>" required>
                              <?php }else{ ?>
                                <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number" class="form-control" required>
                                <?php }?>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-info">Email id:</label><br>
                                <?php if (isset($_GET['emailid'])) { ?>
                                 <input type="text" 
                                        name="emailid" 
                                        placeholder="Email Id"
                                        class="form-control"
                                        value="<?php echo $_GET['emailid']; ?>" required>
                                  <?php }else{ ?>
                                <input type="text" name="emailid" id="emailid" placeholder="Email Id" class="form-control" required>
                                <?php }?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                                <?php if (isset($_GET['pass_error'])) { ?>
                                  <script type="text/javascript">
                                          window.onload = function () { alert("<?php echo $_GET['pass_error']; ?>");}</script>
                                <?php } ?>
                            </div>
                            <div class="form-group center ">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    
</body>
</html>
