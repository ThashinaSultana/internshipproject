<?php
session_start();
$user_id=$_SESSION['user_id'];
if(isset($_REQUEST['book']))
{
    $user_id=$_SESSION['user_id'];
    header('location:userroom.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	
	<style type="text/css">
            #root {
                display: flex;
                width: 100%;
                height: 100vh;
            }
            #login-image-container {
                flex-basis: 100%;
                background-image: url(image/hotel.jpg);
                background-size: cover;
            }
            #image-overlay {
                width: 100%;
                height: 50%;
                background-color: rgba(250, 250, 250, 0.8);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            button {
  background: blue;
  color: white;
   padding: 30px;
  border-radius: 10px;
}
              
        
	

	</style>
            }
</head>
<body>
    <form action="">
<div id="root">
            <div id="login-image-container">
                <div id="image-overlay">
                    <h1>&star;</h1>
                    <h2>SERVICES AVAILABLE</h2>
                    <h3 style="color: blue;">ROOM</h3>
                    <h3 style="color: blue;">FOOD</h3>
                    <h3 style="color: blue;">LAUNDRY</h3>
                    <input type="submit" name="book" value="click here to book"><br>
                   <!-- <p> <a href="userroom.php">click here to book</a></p>!-->
                  
                    <p align="bottom">
   <!-- <a href="profile.php">  -->
    <input type=button name="button" value="Edit"class="form_control btn btn-primary"><!-- </a></p> -->
                </div>
            </div>
</div>
</form>
	
	
</body>
</html>