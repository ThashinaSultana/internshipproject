
<?php
require('dbfunctions.php');
session_start();
$msg="";

if(isset($_REQUEST['submit']))
{
    $user_id=$_REQUEST['user_id'];

    $pwd=$_REQUEST['pwd'];

    
    if(checkaccount($user_id,$pwd))

    {
        if(getAtype($user_id)=='admin')
        {

        
            $_SESSION['user_id']=$user_id;
            header('location:admin.php');
        }
        
           else if(getAtype($user_id)=='user')
            {
            $_SESSION['user_id']=$user_id;
            header('location:service_available.php');
        }
         else if(getAtype($user_id)=='')
            {
            $_SESSION['user_id']=$user_id;
            header('location:service_available.php');
        }
     else
    {
        $msg="<font color=red> <center>invalid !!!</center></font>";
        echo "$msg";
    }
}
    else
    {
        $msg="<font color=red> <center>Please enter user id!!!</center></font>";
        echo "$msg";
    }

}
if(isset($_REQUEST['submit']))
    {
        $user_id=$_REQUEST['user_id'];
        $_SESSION['user_id']=$user_id;
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <style type="text/css">
            #root {
                display: flex;
                width: 100%;
                height: 100vh;
            }
            #login-image-container {
                flex-basis: 46%;
                background-image: url(image/hotel.jpg);
                background-size: cover;
            }
            #image-overlay {
                width: 100%;
                height: 100%;
                background-color: rgba(250, 250, 250, 0.8);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            #login-form-container {
                display: flex;
                flex-direction: column;
                flex-basis: 54%;
                justify-content: center;
                align-items: center;
            }
            #my-form {
                width: 50%;
                padding: 1rem;
            }
            #options-div {
                display: flex;
                justify-content: space-between;
            }
            #options {
                font-size: 80%;
            }
        </style>
    </head>
    <body>
        <div id="root">
            <div id="login-image-container">
                <div id="image-overlay">
                    <h1>&star;</h1>
                    <h2>HOTEL STAR</h2>
                    <p>Extra info here</p>
                </div>
            </div>
            <div id="login-form-container">
                <form name="login" method="get" action="" id="my-form">
                    <h2 class="h2 text-center mb-4">Sign In</h2>
                    <input type="text" name="user_id" size="10" placeholder="Username" class="form-control mb-3" />
                    <input type="password" name="pwd" size="10" placeholder="Password" class="form-control mb-4" />
                    <button type="submit" name="submit" class="form-control btn btn-primary mb-4">Sign in</button>

                    <div id="options-div">
                        <a href="register.php" id="options">Create new account?</a>
                        <a href="change_password.php" id="options">Change password?</a>
                        <a href="forgot_password.php" id="options">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
