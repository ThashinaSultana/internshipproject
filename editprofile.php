<?php
	require('dbfunctions.php');
	session_start();
		$user_id=$_SESSION['user_id'];
	$msg="";
	$usersdet=array("","","","");
	$user_id=$_SESSION['user_id'];
	
	if(isset($_REQUEST['show']))
	{
		$user_id=$_REQUEST['user_id'];
		$usersdet=getUserDetails($user_id);
	}
	if(isset($_REQUEST['edit']))
	{
		$user_id=$_REQUEST['user_id'];
		$pwd=$_REQUEST['pwd'];
		$email=$_REQUEST['email'];
		$phone=$_REQUEST['phone'];
		
		if(updateUserInfo($user_id,$pwd,$email,$phone))
		{
			$msg="<font color=green>Updated successfully</font>";
			
		}
		else
			$msg="<font color=red> Not Updated</font>";
	}
?>
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
		<div class="nav-brand" >EDIT PROFILE<div>
			<a href="service_available.php?id=$idd&rid=$ridd">
			<button class="btn btn-outline-light">LogOut</button>
		</a>
		</nav>
		<div class="container">
		<div class="row">
        <div class="col-md-4 d-flex justify-content-center align-items-center">
        
			
			</div>

				
	
	<form name="edit" method="post" action="" id="my-form" class="mt-2" >
	<div class="row">
		<div class="col-md">
			</div>
</div>
</div>
			
	<label for="user_id">User ID</label>
	
<input type="text"  name="user_id" placeholder="Enter User ID" class="form control mb-2" size="10" value='<?php if(isset($_REQUEST['user_id'])) 
	echo $_REQUEST['user_id']; ?>' />


       <input type="submit" name="show" value="show"><br><br>
      <label for="pwd">Password</label>
	 <input type="text" name="pwd" placeholder="Enter Password" size="10" class="form control mb-2" value='<?php echo $usersdet[1]; ?>' /><br>
	
     <label for="email">Email</label>
	<input type="text" placeholder="Enter Email" name="email" size="10" class="form control mb-2" value='
<?php echo $usersdet[2]; ?>' /><br>
<label for="phone">Phone</label>
 <input type="text" placeholder="enter phone no." name="phone" size="10" class="form control mb-2" value='<?php echo $usersdet[3]; ?>' />  

    <input type="submit" name="edit" value="edit" class="btn btn-primary">

	

	</form> 

	
	<?php 
	echo $msg ; 
	?>
</body>
</html>