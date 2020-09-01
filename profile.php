<!DOCTYPE html>
<html>
<?php
	require('dbfunctions.php');
	session_start();
		$user_id=$_SESSION['user_id'];
		if(isset($_REQUEST['submit']))
{
    $user_id=$_SESSION['user_id'];
    header('location:userroom.php');
}
		?>
<body>
<font color=blue size=5><h1><center>Edit profile:</center></h1></font><br> 
<form name="profile" method="get" action="editprofile.php"><br>
	<center><img src="image/edit.png"><br>
		<input type="submit" name="submit" value="Edit-Profile"></center><br><br>
	<a href="service_available.php"><font color=black>Go to next page </font></a>

</body>
</html>