<?php
require('dbfunctions.php');
$msg="";

$pid=getNewRoomid();

if(isset($_REQUEST['submit']))
{
	$filename=$_FILES['filetoupload']['name'];
	$file_temp=$_FILES['filetoupload']['tmp_name'];
	$path_parts=pathinfo($_FILES['filetoupload']['name']);
	//die($path_parts);
	$extension=$path_parts['extension'];
	if(!($extension=="jpg" || $extension=="png" || $extension=="bmp"))
		die("file format is not correct");
	if($filename!="")
	{
		//$target_dir="images/";
		$newfilename=$_REQUEST['id'].".jpg";
		move_uploaded_file($file_temp,"image/".$newfilename);
		
	}
	else
		die("error");
}


if(isset($_REQUEST['add']))
{
$rid=$_REQUEST['rid'];
	$rname=$_REQUEST['rname'];
	$rtype=$_REQUEST['rtype'];
	$rcategory=$_REQUEST['rcategory'];
	$rrate=$_REQUEST['rrate'];
	$rstatus=$_REQUEST['rstatus'];
	$rdet=$_REQUEST['rdet'];
	$rpics=$_REQUEST['rpics'];

	if (addRoom($rid,$rname,$rtype,$rcategory,$rrate,$rstatus,$rdet,$rpics))
	{
		header("location:selectroom.php");
	}
	else
		$msg="<font color=red> not Added</font>";
	
}
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />	
	<style type="text/css">
		#my-navbar {
			background-color: #7700cc;
		}
		#my-form {
			width: 40%;}
</style>		
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="my-navbar">
		<div class="navbar-brand">Insert New Rooms</div>
	<div id="space-fill"></div>
</nav>
	
	<form action="" method="post" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-md">
					<div class="form-group mt-4">
		<label for="id" >New Room ID</label>
	<span id=span1 name=id>
		<?php
		echo $pid;
		?>
    
       <br><label for="id">Image ID</label>
</div>
   <input type="text" name="id" size=10 class="form-control mb-4"/>
    Select images to upload:
    <input type="file" name="filetoupload" id="filetoupload">
    <input type="submit" value="Upload Image" name="submit">
      <br>  <label for="rname">Room Name</label>
		<input type=text size=10 name=rname class="form-control mb-2">
		<label for="rtype">Room Type</label>
		<select name="rtype">
			<option>AC</option>
			<option>non-AC</option>
			
		</select><br><br>
		<label for="rcategory">Room Category</label>
		<select name="rcategory" class="form-control mb-2">
			
			
			<option>single</option>
			<option>double</option>
			<option>deluxe</option>
			<option> super deluxe</option>
			<option>king</option>
			<option>queen</option>
		</select><br><br>
		
		<label for="rrate">Room Rate</label>
		<input type=text size=10 name=rrate class="form-control mb-2">
		<label for="rstatus">Room Status</label>
		<select name="rstatus" class="form-control mb-2">
		
			<option>Not available</option>
			<option>Available</option>
			
		</select>
		<label for="rdet">Room Details</label>
		<input type=text size=10 name=rdet class="form-control mb-2">
		<label for="rpics">Room Pics</label>
		<input type=text size=10 name=rpics class="form-control mb-2"><br>
	
		<input type="submit" value="add" name="add" class="btn btn-primary">
   </div>
	</div>
	</form>
	<?php
	echo $msg;
	?>


</body>
</html>