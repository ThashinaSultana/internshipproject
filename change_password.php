<?php
require('dbfunctions.php');
$msg="";
if(isset($_REQUEST['change']))
{
	$user_id=$_REQUEST['user_id'];
	$pwd=$_REQUEST['pwd'];
	$pwd1=$_REQUEST['pwd1'];
	$pwd2=$_REQUEST['pwd2'];
	if(!checkid($user_id)){
		$msg="<font color=red>Username doesnot exist...</font>";
	}
		
	else
	{
   		if(retrievePass($user_id)!=$pwd)
   		{
   			$msg="<font color=red>Password mismatch</font>";
   		}
  		else
  		{
			if($pwd1==$pwd2)
			{
				if(changePass($user_id,$pwd1))
				{
					$msg="<font color=green >Password changed</font>";
				}
				else
				{
					$msg="<font color=red >Failed</font>";

				}
			}
			else
			{
				$msg="<font color=dark pink>Password and Confirm Password are not same.......";
			}
		}	
	}

}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<style type="text/css">
	#my-navbar {
			background-color: #7700cc;
		}
		#my-form  {
			width: 40%;

		}
</style>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="my-navbar">
		<div class="nav-brand">CHANGE PASSWORD?<div>
		</nav>
		<div class="container">
		<div class="row">

			<div class="col-md-4 d-flex justify-content-center align-items-center">
				<img src="image/change-password.jpg" width="200" />
			</div>

	
<form name="change" method="post" action="" id="my-form" class="mt-2" >
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="user_id">User ID</label>
	

	<input type="text" name="user_id" placeholder=" Enter User ID" class="form-control mb-2" />
</div>
</div>
</div>
    <label for="pwd"> Old Password</label>
	<input type="password" name="pwd" class="form-control mb-2" placeholder=" Enter Old Password">
	<label for="pwd1">New Password </label>
	<input type="password" name="pwd1" minlength="3" maxlength="15"  title="Must contain more than 2 and less than 15 characters" class="form-control mb-2" placeholder=" Enter New Password"/>
	<label for="pwd2">Confirm Password</label>
	<input type="password" name="pwd2" class="form-control mb-2" placeholder=" Enter Confirm Password"/>
	<input type="submit" name="change" value="Change" class="btn btn-primary">

</form>
<?php
echo "$msg <br>";
?>
</body>
</html>