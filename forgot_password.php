<?php
require('dbfunctions.php');
$msg="";
if(isset($_REQUEST['submit']))
{
	$user_id=$_REQUEST['user_id'];
	$ques=$_REQUEST['ques'];
	$ans=$_REQUEST['ans'];

	if(!checkid($user_id))
	{
		$msg="<font color=red>Username doesnot exist...</font>";
	}
	else
	{
		$pwd=checkQA($user_id,$ques,$ans);
		if($pwd)
		{
			$msg="<font color=green>Your password is ".$pwd." </font>";
		}
		else
		{
			$msg="<font color=red>Question and Answer not matched</font>";
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
			width: 80%;

		}
</style>
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="my-navbar">
		<div class="nav-brand">FORGOT PASSWORD?<div>
		</nav>
		<div class="container">
		<div class="row">

			<div class="col-md-4 d-flex justify-content-center align-items-center">
				<img src="image/forgot-password.png" width="200" />
			</div>

			<div class="col-md-8 d-flex justify-content-center align-items-center">
	

<form name="forgot" method="post" action="" id="my-form" class="mt-2" >
	<div class="row">
		<div class="col-md">
			<div class="form-group">
				<label for="user_id">User ID</label>
	
	<input type="text" name="user_id" placeholder=" Enter User ID" class="form-control" />
</div>
</div>
</div>
<div class="form-group">
<label for="sec_ques">Security Question</label>
					
	<select name="ques" placeholder="Select Question" class="form-control mb-2" id="sec_ques"/>
		<option >Select</option>
		<option  >pet's name?</option>
		<option>What is your nick name?</option>
		<option >nationality?</option>
		<option >What is your favourite food?</option>
		<option>how r u?</option>
		<option>age?</option>
		<option>Who is your favourite actor?</option>
	</select>
</div>
</div>
	<input type="text" name="ans" placeholder="Answer to Security" class="form-control"/>
	<br><br><input type="submit" name="submit" class="btn btn-primary" value="Submit" ></div>
</div>

</form>
<?php
echo "$msg<br>";
?>
</body>
</html>