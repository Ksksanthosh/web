        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Vuram Culturals</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <link rel="icon" href="../images/favicon.ico">
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
              margin-top: 90px;
              max-width: 600px;
              height: auto;
              border: 1px solid #9C9C9C;
              background-color: #EAEAEA;
              position:absolute;
              top: -120px;
            }
            #login .container #login-row #login-column #login-box #login-form {
              padding: 10px;
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
         
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <body>
            <?php
            include "../php/config.php";
            $register="SELECT UserId FROM userdetails WHERE email_Id='".$_SESSION['User']."'";
            $register_user=mysqli_query($con,$register);
            while($data = mysqli_fetch_array($register_user))
            {
                $data['UserId'] ; 
            }
            if(isset($_SESSION['guest']))
            {
                header("location:userRegistration.php");
                exit();
            }
            elseif(isset($_SESSION['User']) && isset($_GET['eventid']))
                {                    
                $sql_query = "SELECT * FROM event_details WHERE eventId=".$_GET['eventid']." ";
                $query = mysqli_query($con,$sql_query);
                $sql_query2= "SELECT * FROM userdetails WHERE email_Id='".$_SESSION['User']."' ";
                $query2 = mysqli_query($con,$sql_query2);
                $_SESSION['eventId']=$_GET['eventid'];
            ?> 
            <script type="text/javascript">
                function coparticipant() {
                  var x = document.getElementById("coParticipants");
                  if (x.style.display === "none") {
                    x.style.display = "block";
                    document.getElementById("part_btn").value="Remove Participant";
                    // document.getElementById("part_btn").style. background='red';
                    document.getElementById("copart_emailid").required=true;
                    document.getElementById("copart_name").required=true;
                    document.getElementById("copart_phonenumber").required=true;
                  } else {
                    x.style.display = "none";
                    document.getElementById("part_btn").value="Add Participant";
                    // document.getElementById("part_btn").style. background='blue';
                    document.getElementById("copart_emailid").value='';
                    document.getElementById("copart_name").value='';
                    document.getElementById("copart_phonenumber").value='';
                    document.getElementById("copart_emailid").required=false;
                    document.getElementById("copart_name").required=false;
                    document.getElementById("copart_phonenumber").required=false;
                  }
                }
                </script>
                
            <nav class="navbar navbar-expand-lg bg-white">
                <h1>VURAM CULTURALS</h1>
                     <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                         <a class="nav-link" href="event.php">Home</a>
                    
                          </li>
                     
                 </li>
                 
                     <li class="nav-item">
                         <a class="nav-link" href="#">Wishlist</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="../php/logout.php?logout">Logout</a>
                     </li>
                     
                 </ul>
                 </div>
             </nav>   
            <form action="../php/eventRegistration.php" method="post">
                <div id="login">
                    <h3 class="text-center text-white pt-5"></h3>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <form id="login-form" class="form" method="post">
                                        <h3 class="text-center text-info">EVENT REGISTRATION</h3>
                                        <div class="form-group">
                                            <?php if (isset($_GET['error'])) { ?>
                                            <script type="text/javascript">
                                                      window.onload = function () { alert("<?php echo $_GET['error']; ?>");}</script>
                                            <?php } ?>
                                            <?php if (isset($_GET['success'])) { ?>
                                            <script type="text/javascript">
                                                      window.onload = function () { alert("<?php echo $_GET['success']; ?>");}</script>
                                            <?php } ?>
                                            <?php
                                            while($data = mysqli_fetch_array($query2)){
                                            ?>
                                            <label for="name" class="text-info">Full Name:</label>
                                            <input type="text" name="name" id="name" placeholder="name" class="form-control" value="<?php echo $data['user_Name'] ; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-info">Phone number:</label>
                                            <input type="text" name="phonenumber" id="phonenumber" placeholder="phonenumber" class="form-control" value="<?php echo $data['phone_Number'] ; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="text-info">Email id:</label>
                                            <input type="text" name="emailid" id="emailid" placeholder="emailid" class="form-control" value="<?php echo $data['email_Id'] ; ?>" readonly>
                                        </div>
                                        <?php }?>
                                        <div class="form-group">
                                            <label for="text" class="text-info">Event Name:</label>
                                            <input type="text" name="eventName" id="eventName" class="form-control"  value= "<?php while($data = mysqli_fetch_array($query)){echo $data['event_Name'] ; } ?> " readonly>
                                        </div>
                                        <div id="coParticipants" style="display:none;" required>
                                            <div class="form-group">
                                                <label for="name" class="text-info"  >Participants Name:</label>
                                                <input type="text" name="copart_name" id="copart_name" placeholder="Name" class="form-control"   >
                                            </div>
                                            <div class="form-group">  
                                                <label for="" class="text-info">Phone number:</label>
                                                <input type="text" name="copart_phonenumber" id="copart_phonenumber" placeholder="Phone Number" class="form-control"   >
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="text-info">Email id:</label>
                                                <input type="text" name="copart_emailid" id="copart_emailid" placeholder="Emailid" class="form-control"  >
                                            </div>
                                            <br>
                                        </div>                                 
                                        <div class="form-group "><input type="button"  name="addparticipant" value="Add Participant" id="part_btn" class="btn btn-info " name="btnParticipant" onclick="coparticipant()"></div>
                                        
                                      <div class="form-group center">
                                           
                                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <?php }
            else
            {
                header("location:../html/event.php");
            }
            ?>
            
        </body>
        </html>

