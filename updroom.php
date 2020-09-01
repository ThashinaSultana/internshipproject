<?php
	require('dbfunctions.php');
	$msg="";
	
	$edit="";
	$roomsdet="";
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
if(isset($_REQUEST['upid']))
	{
	  $edit=$_REQUEST['upid'];
	  $roomsdet=getRoomDetail($edit);
	  
	}
	
	if(isset($_REQUEST['show']))
	{
		$rid=$_REQUEST['rid'];

		//if($food_id!="select")
			
		
	
		//else
			//$msg="please select food_id";
	}
	if(isset($_REQUEST['update']))
	{
		$rid=$_REQUEST['rid'];
		$rname=$_REQUEST['rname'];
		$rtype=$_REQUEST['rtype'];
		$rcategory=$_REQUEST['rcategory'];
		$rrate=$_REQUEST['rrate'];
		$rstatus=$_REQUEST['rstatus'];
		$rdet=$_REQUEST['rdet'];
		$rpics=$_REQUEST['rpics'];

		if(updateRoomInfo($rid,$rname,$rtype,$rcategory,$rrate,$rstatus,$rdet,$rpics))
		{
			$msg="<font color=green>Updated successfully</font>";
			//clearform();
		}
		else
			$msg="<font color=red> Not Updated</font>";
		$roomsdet=array("","","","","","","","");
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
		<div class="navbar-brand">Update Room Info</div>
		<a href="logout.php">
			<button class="btn btn-outline-light">Logout</button>
		</a>
	</nav>
	<form name="upd" method="get" id="my-form" class="mt-2" >
		<div class="container">
			<div class="row">
				<div class="col-md">
		
	
			<div class="form-group mt-4">
				<label for="rid">Room ID</label>
	
		<input type="text" name="rid"   value='<?php echo $edit; ?>' class="form-control mb-2"/>
		</div>
	</div>
</div>
    <div class="form-group">
	<label for="pwd"> Room Name</label>
	<input type="text" name="rname"   value='<?php echo $roomsdet[1]; ?>' class="form-control mb-2"/>
    </div>
     <div class="form-group">
	<label for="pwd1">Room Type </label>
 <input type="text" name="rtype"  value='<?php echo $roomsdet[2]; ?>' class="form-control mb-2"/>
 </div>
 <div class="form-group">
 <label for="pwd1">Room Catergory</label>

<input type="text"  name="rcategory"  value='<?php echo $roomsdet[3]; ?>' class="form-control mb-2"/>
</div>
<div class="form-group">
<label for="pwd1">Room Rate </label>

	<input type="number" name="rrate"   value='<?php echo $roomsdet[4]; ?>' class="form-control mb-2"/>
	</div>
	<div class="form-group">
	<label for="pwd1">Room Status </label>

	</div>
	<div class="form-group"><input type=
	"text"  name="rstatus"  value='<?php echo $roomsdet[5]; ?>' class="form-control mb-2"/>
	<div class="form-group">
	<label for="pwd1">Room Details </label>

	<input type="text"  name="rdet"  value='<?php echo $roomsdet[6]; ?>' class="form-control mb-2"/>
</div>
<div class="form-group">
	<label for="pwd1">Room's Pictures </label>

	<input type="text"  name="rpics"  value='<?php echo $roomsdet[7]; ?>' class="form-control mb-2"/>
	 </div>
	<!--  <br><label for="id">Image ID</label>
	 <input type="text" name="id" size=10 class="form-control mb-4"/>
	   Select images to upload:
    <input type="file" name="filetoupload" id="filetoupload">
    <input type="submit" value="Upload Image" name="submit"> -->
	 <div class="form-group">
<input type="submit" name="update" value="Update" class="btn btn-primary">
	</div>
	<!-- <?php 
	if(isset($msg)) 
		echo "<script>alert('Updated successfully!');</script>"
	?> -->
		</form>
</body>
</html>