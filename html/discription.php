<?php 
include "../php/config.php";
if(isset($_SESSION['User']) || isset($_SESSION['guest']))
{
  $details=mysqli_query($con,"SELECT * FROM event_details");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Event</title>
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="icon" href="../images/favicon.ico">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Merienda&family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
</head>

<body>
  <div class="middle-container">
    <div class="profile">
      <img src="../images/Vuram_Logo-1.png" alt="photo">

      </ul>
    </div>
    <hr>

    <div class="skills">

      <div class="skill-row">

          <img class="image" src="../images/paper.jpg" alt="">
        <h2>Paper presentation</h2>

        <p>Paper presentation is a competition where each participant/team is required to
          make a paper about a given topic or area, and then present it in front of the juries.</p>
        <h2>Rules</h2>

        <ol class="oll">
          <li>The paper submitted will have to be presented during the event.</li>
          <li>The Teams will get 8 minutes to present their paper. And 2 minutes will be
            for questioning by judges.</li>
          <li>The participants can present their presentation by any means.</li>
          <li>Abstract may not exceed the limit of one Page.</li>
        </ol>

        <p class="participant">No Of participants: 0</p>



        <p class="Date">Date And Time: xx/yy/zz</p>



        <div class="contact-me">
          <a class="BUTTON_RKR" href="">registration</a>
        </div>
      </div>

      <hr>

    </div>


    <!-- <div class="bottom-container">
      <a class="footer-link" href="https://www.linkedin.com/">LinkedIn</a>
      <a class="footer-link" href="https://twitter.com/">Twitter</a>
      <a class="footer-link" href="https://www.appbrewery.co/">Website</a>
      <p>© 2021 Sri nandhan.</p>
    </div> -->

</body>

</html>
<?php
  }else
  {
    header('location:../html/index.php');
  }
?>