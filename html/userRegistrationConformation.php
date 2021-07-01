<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="center.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

	<h1 class="text-center" style="font-size: 40px; margin-top: 100px"><?php echo $_GET['message'];?> </h1></body>
</html>