<?php
	require('dbfunctions.php');
	session_start();
	$laundry_price="";
	$lndsdet=array("","","");
	$user_id=$_SESSION['user_id'];
		//$rid=$_REQUEST['rid'];
		$rid=$_SESSION['ridd'];
		
	
	
	if(isset($_REQUEST['show']))
	{
		$user_id=$_REQUEST['user_id'];
		$_SESSION['user_id']=$user_id;
		$rid=$_REQUEST['rid'];
		$_SESSION['rid']=$rid;
			
		$Noofdays=$_REQUEST['nod'];
		$laundry_price=50*$Noofdays;
		$lndsdet=addlprice($laundry_price,$user_id,$rid);
		
		
		
	}


?>
<html>
<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />	
	<style type="text/css">
		#my-navbar {
			background-color: #7700cc;
		}
		#my-form {
			width: 40%;
		}
		#space-fill {
			flex-grow: 1;
		}
	</style>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="my-navbar">
		<div class="navbar-brand">Laundry</div>
		<div id="space-fill"></div>
		<a href="bill.php?id=$idd&rid=$ridd">
			<button class="btn btn-outline-light">Reciept</button>
		</a>
	</nav>



	<form name="upd" method="get" action="">
		<div class="container">
			<div class="row">
				<div class="col-md">
					<div class="form-group mt-4">
						<label for="user_id">User ID</label>		
	 <input type="text" name="user_id" size="10" value='<?php echo $user_id; ?>' class="form-control"/>
	</div>
	<div class="form-group">
		<label for="user_id">Room ID</label>
	<input type="text" name="rid" size="10" value='<?php echo $rid;?>' class="form-control mb-4"/>

	 ChargePerDay:50-/ <br><br>
	    <label for="user_id">No.Of Days</label>
		<input type="number" name="nod" size="10" class="form-control mb-4"/>
	
	
<input type="submit" name="show" value="Show Amount" class="btn btn-primary"></br><br>
	
	
	
		</form>
		<?php
		echo "$laundry_price";
		?>
</body>
</html>