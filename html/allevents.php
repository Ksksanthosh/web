<?php 
include "../php/config.php";
if(isset($_GET['guest']))
{
  $_SESSION['guest']=1;
}
if(isset($_SESSION['User']) || isset($_GET['guest']) || isset($_SESSION['guest']))
{
  if(!empty($_GET['filter']))
  {
    if($_GET['filter']=='all')
    {
      $details=mysqli_query($con,"SELECT * FROM event_details");
    }else
    {
      $details=mysqli_query($con,"SELECT * FROM event_details WHERE eventType='".$_GET['filter']."' ");
    }
  }
  else
  {
  $details=mysqli_query($con,"SELECT * FROM event_details");
  }
  if (mysqli_num_rows($details) < 0) 
  {
    echo '<script type="text/javascript">displaynone();</script>';
  }
?>

<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->

<head>
  <title>Vuram Culturals</title>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> -->
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
    /*body{
      background-image: url('../images/demo/gallery/eventpage.png');
    }*/
    .dropbtn {
      background-color: #334443;
      width: min-content;
      color: white;
      padding: 16px;
      font-size: 20px;
      font-family: 'Times New Roman', Times, serif;
      border-radius: 4px;
      width: 180px;
      cursor: pointer;

    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #34656D;
      min-width: 180px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #34656D;
    }
    .label_text
    {
      font-size: 35;
      font-style: italic;
      font-family: ve;
      background: black;
      padding-top: 20;
      padding-bottom: 20;
      padding-left: 10;
      padding-right: 10;
      border-radius: 10px;
    }
    .categories_option
    {
      width: 225;
      bottom: 10;
      position: absolute;
      left: 230;
      background: black;
      padding-top: 20;
      padding-bottom: 15;
      border-radius: 10px;
    }
.myDiv {
      border-radius: 8px;
      background-color: #126E82;
      text-align: center;
      margin-left: 10%;
      height: 250px;
      width: 900px;
          }

    img {
      top: 20px;
      display: table-cell;
      height: 250px;
      width: 250px;
      margin-right: auto;
      vertical-align: middle;
      border-radius: 4px;
    }
    text{ 
    vertical-align:middle;
    display:table-cell;
    text-align:justify;
}
  </style>
</head>
<script type="text/javascript">
  function displaynone()
  {
    document.getElementById('events').style.display=none;
  }
</script>
<body id="top">
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
  <div class="bgded ">
    <div id="pageintro" class="hoc clear" style="padding-top: 20px;">
      <div style="padding-bottom: 150px;">
      <article>
        <h3 class="heading">Events</h3>
        <div class="dropdown">
          <form>
            <label class="label_text">CATEGORIES </label>

            <select class="categories_option" name="filter" onchange ="this.form.submit()">
                <option  value='all' <?php if(isset($_GET['filter'])&&$_GET['filter']=='all'){echo 'selected';}?> > All</option>
                <option  value="Dance" <?php if(isset($_GET['filter'])&&$_GET['filter']=='Dance'){echo 'selected';}?> > Dance </option>
                <option  value="Debate" <?php if(isset($_GET['filter'])&&$_GET['filter']=='Debate'){echo 'selected';}?> > Debate </option>
                <option  value="Singing" <?php if(isset($_GET['filter'])&&$_GET['filter']=='Singing'){echo 'selected';}?>> Singing </option>
            </select>
          </form>
         </div>
       </article>
     </div>
     <div id='events' style="display:block;">
     <?php 
      while ($data = mysqli_fetch_array($details)) {
      
      ?>
    <div class="bgded overlay" style= "padding-top:5px; " onclick="location.href='eventdescription.php?eventId=<?php echo($data['eventId']);?>'">
      <div id="pageintro" class="hoc clear" >
       <div class="myDiv" style="display:flex; font-family: times new roman ;padding-right: 10px; cursor: pointer;">
            <div class="img"><img src="../images/demo/gallery/<?php echo($data['eventId']);?>.png" alt="<?php echo($data['eventId']);?>" />
            </div>
            <div class ="text" style="flex: 5%; padding 5px;">
              <h1 style="padding-top: 10px"> <?php echo $data['event_Name'];?></h1>      
              <p><?php echo $data['description'];?> </p>
            </div>
          </div>
      </div>
    </div>
     <?php 
      } ?>
    </div>
  </div>
  <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
  <!-- JAVASCRIPTS -->
  <script src="../layout/scripts/jquery.min.js"></script>
  <script src="../layout/scripts/jquery.backtotop.js"></script>
  <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  <!-- Homepage specific -->
  <script src="../layout/scripts/jquery.easypiechart.min.js"></script>
  <!-- / Homepage specific -->
</body>

</html>
<?php
  }else
  {
    header('location:../html/index.php');
  }
?>