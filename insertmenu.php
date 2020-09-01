<?php
require('dbfunctions.php');
$msg="";
$pid=getNewMenuid();
if(isset($_REQUEST['submit']))
{
	$food_name=$_REQUEST['food_name'];
	$food_category=$_REQUEST['food_category'];
	$food_price=$_REQUEST['food_price'];
	if (addMenu($food_name,$food_category,$food_price))
		$msg="<font color=green>Added</font>";
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
		<div class="navbar-brand">Insert New Menu</div>
	<div id="space-fill"></div>
</nav>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="container">
			<div class="row">
				<div class="col-md">
					<div class="form-group mt-4">
		<label for="id" >New Food ID :</label>
	
		<span id=span1 name=id>
			<?php
			
			echo $pid;


			?>
		</span>
	</div>
		Food name:
		<input type=text size=10 name=food_name class="form-control mb-2"><br>
		<strong>Food category:</strong>
		<select name="food_category">
			<option>Select</option>
			<option>breakfast</option>
			<option>lunch</option>
			<option>Dinner</option>
		</select><br><br>
		
		Food price:
		<input type=number size=10 name=food_price class="form-control mb-2"><br>
		
		<input type=submit name=submit value="Add" class="btn btn-primary">
		<input type=reset value=Reset class="btn btn-primary">
	</div>
</div>
</div>
</body>
	</form>
	<?php
	echo $msg;
	?>

</body>
</html>