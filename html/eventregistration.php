        <?php 
        include "../php/config.php"; 
        if(isset($_SESSION['guest']))
            {
                header('location:userRegistration.php');
                exit();
            }
        ?>
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
              margin-top: 0px;
               max-width: 600px;
               height: auto;
               border: 1px solid #9C9C9C;
               background-color: #EAEAEA;
               position: absolute;
               top: -200px;
               padding: 20px;
               border-radius: 10px;

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
            .table_c {
              width: 100%;
              max-width: 100%;
              margin-bottom: 1rem;
              background-color: white;
          }
          .btn_center {
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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
 

          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
                         <script>  
                     $(document).ready(function(){  
                     var i=0;  
                     $('#add').click(function(){  
                          i++; 
                            if (i<6){ 
                          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter Name" class="form-control name_list" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
                          $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="email" name="email[]" placeholder="Enter Email ID" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,}$" class="form-control name_list" required/>');  
                           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="tel" id="co_phone" pattern="[7-9]{1}[0-9]{9}" title="Enter valid Phone Number" name="phonenumber[]" placeholder="Enter Phone Number" class="form-control name_list" required/>');  
                     }});  
                     $(document).on('click', '.btn_remove', function(){  i--;
                          var button_id = $(this).attr("id");   
                          $('#row'+button_id+'').remove();  
                          $('#row'+button_id+'').remove(); 
                          $('#row'+button_id+'').remove(); 
                            
                     });  
                     
                         
                     });  
                

                    // var phone_input = document.getElementById("co_phone");

                    // phone_input.addEventListener('input', () => {
                    //   phone_input.setCustomValidity('');
                    //   phone_input.checkValidity();
                    // });

                    // phone_input.addEventListener('invalid', () => {
                    //   if(phone_input.value === '') {
                    //     phone_input.setCustomValidity('Enter phone number!');
                    //   } else {
                    //     phone_input.setCustomValidity('Enter phone number in this format: 1234567890');
                    //   }
                    // });

                </script>

            <?php
            // include "../php/config.php";
            // $register="SELECT UserId FROM userdetails WHERE email_Id='".$_SESSION['User']."'";
            // $register_user=mysqli_query($con,$register);
            
            // elseif(isset($_SESSION['User']))
            // {
            // $user_data_q= "SELECT * FROM userdetails WHERE email_Id='".$_SESSION['User']."' ";
            //         $user_data = mysqli_query($con,$user_data_q);
            //         $_SESSION['eventId']=$_GET['eventid'];
            //         while($user=mysqli_fetch_array($user_data))
            //         {
            //             $reg=mysqli_query($con,"SELECT * FROM registration_details WHERE userId='".$user['UserId']."' and eventId='".$_GET['eventid']."' ");
            //             if(mysqli_num_rows($reg)>0)
            //             {
            //                 header('location:eventdescription.php?eventId='.$_GET['eventid'].'&message=Already registered');
                            
            //             }
            //         }
            // }
            if(isset($_SESSION['User']) && isset($_GET['eventid']))
                {                    
                $sql_query = "SELECT * FROM event_details WHERE eventId=".$_GET['eventid']." ";
                $query = mysqli_query($con,$sql_query);
                $user_data_q= "SELECT * FROM userdetails WHERE email_Id='".$_SESSION['User']."' ";
                $user_data = mysqli_query($con,$user_data_q);
                $_SESSION['eventId']=$_GET['eventid'];
                while($user=mysqli_fetch_array($user_data))
                {
                        $reg=mysqli_query($con,"SELECT * FROM registration_details WHERE userId='".$user['UserId']."' and eventId='".$_GET['eventid']."' ");
                        if(mysqli_num_rows($reg)>0)
                        {
                            header('location:eventdescription.php?eventId='.$_GET['eventid'].'&message=Already registered');
                            
                        }
                        else
                        {


                
            ?>  

  
           <div class="container">  
            <br> <br> <br>
            <form action="../php/eventRegistration.php" method="post">
                <div id="login">
                    <h3 class="text-center text-white pt-5"></h3>
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">
                                    <div class="form-group">  
                                         <form name="add_name" id="add_name">  
                                              <div class="table-responsive">  
                                                   <table class="table_c table-bordered" id="dynamic_field">  
                                                        <tr>  
                                                        
                                                        <input type="text" name="username" placeholder="Enter Name" value="<?php echo $user['user_Name'] ; ?>" class="form-control name_list"  readonly/> <br>
                                                        
                                                        <input type="text" name="useremail" placeholder="Enter Email ID" value="<?php echo $user['phone_Number'] ; ?>" class="form-control name_list" readonly/><br>
                                                        <input type="text" name="userphonenumber" placeholder="Enter Phone Number"  value="<?php echo $user['email_Id'] ; ?>" class="form-control name_list" readonly/><br>
                                                        <input type="text" name="event_name" placeholder="Event Name" class="form-control name_list" value=" <?php while($data = mysqli_fetch_array($query)){echo $data['event_Name'] ; } ?> " readonly/><br>
                                                        <td><button type="button" name="add" id="add" class="btn btn-success">Add Participants</button></td>   
                                                        </tr>  
                                                        <tr></tr>
                                                  </table>
                                             </div>  
                                             <button type="submit" name="submit"  class=" btn btn_center" style="align-self: center;">Submit</button> 
                                        </form>  
                                   </div>  
                              </div> 
                           </div> 
                         </div>
                    </div>
                 </div>
               </form>
      
            <?php }}}
            else
            {
                header("location:../html/allevents.php");
            }
            ?>
            
        </body>
        </html>


   