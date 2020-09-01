
<?php
require('dbfunctions.php');
$msg="";
if(isset($_REQUEST['submit']))
{

	$user_id=$_REQUEST['user_id'];
	$pwd=$_REQUEST['pwd'];
	//$pwd1=$_REQUEST['pwd1'];
	$email=$_REQUEST['email'];
	$phone=$_REQUEST['phone'];
	//$dob=$_REQUEST['dob'];
	//$gender=$_REQUEST['a'];
	//$atype=$_REQUEST['atype'];
	$ques=$_REQUEST['ques'];
	$ans=$_REQUEST['ans'];

//	$reg=array("$fname","$lname","$id","$pwd","$email","$mno","$gender","$dob",)
	/*if($pwd==$pwd1)
	{*/
		if(setAccDetails($user_id,$pwd,$email,$phone,$ques,$ans))
			
				$msg="<font color=green >Added Successfully!!!</font>";
			
				//header('location:user.php');
		

		 else 
		 
			$msg="<font color=red >Not Added.....</font>";
		//	echo "$msg";

		 
		}
	
	/*else
		{
			$msg="<font color=dark pink>Password and Confirm Password are not same.......";
			echo "$msg";
		}*/


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<style type="text/css">
		#my-navbar {
			background-color: #7700cc;
		}
		#my-form {
			width: 80%;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="my-navbar">
		<div class="navbar-brand">Register</div>
	</nav>

	<div class="container">
		<div class="row">

			<div class="col-md-4 d-flex justify-content-center align-items-center">
				
			</div>

			<div class="col-md-8 d-flex justify-content-center align-items-center">
				<form name="Register" method="post" action="" id="my-form" class="mt-2">
					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label for="user_id">User ID</label>
								<input type="text" required name=user_id  placeholder="Enter User ID" class="form-control" />
								<small class="form-text text-muted">Should be unique to you</small>
							</div>
						</div>
						<div class="col-md">
							<div class="form-group">
								
								
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name=pwd required  class="form-control mb-2" placeholder="Enter password" />
						<!-- <input type="password" name="pwd1" required id="password" class="form-control" placeholder="Re-type to confirm" />
						<small class="form-text text-muted">Must contain more than 4 and less than 8 characters</small> -->
					</div>

					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" name=email required  class="form-control" placeholder="Enter email" />
							</div>
						</div>
						<div class="col-md">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="numder" name=phone required  maxlength="10" pattern="[0-9]{10}" class="form-control" placeholder="Enter phone number" />
							</div>
						</div>
					</div>
					
					
					<div class="form-group">
						<label for="sec_ques">Security Question</label>
						<select name="ques"  class="form-control mb-2">
							<option>Select</option>
							<option>What is your pet's name?</option>
							<option>What is your nick name?</option>
							<option>What is your nationality?</option>
							<option>What is favourite food?</option>
							<option>When is your birthday?</option>
							<option>Who is your favourite actor?</option>
							<option>Which is your favourite movie?</option>
						</select>
						<input type="text" name="ans" placeholder="Answer to security question" class="form-control" />
						<small class="form-text text-muted">To be answered appropriately</small>
					</div>

					<input type="submit" name="submit" class="btn btn-primary" value="Register">
				</form>
			</div>
		</div>
	</div>
	<?php
		echo "$msg <br>";
	?>
</body>
</html>

