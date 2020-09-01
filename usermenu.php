<?php
	session_start();
	require('dbfunctions.php');
	$foodids=array();

$user_id=$_SESSION['user_id'];
//echo $user_id;
//	$rid=$_REQUEST['rid'];
$rid=$_SESSION['ridd'];

		if(isset($_REQUEST['submit']))
	{ 
		$user_id=$_REQUEST['user_id'];
		$_SESSION['user_id']=$user_id;
	$idd=$_SESSION['user_id'];


		$rid=$_REQUEST['rid'];
		$_SESSION['rid']=$rid;
		$ridd=$_SESSION['rid'];

		//$rid=$_REQUEST['sel_room'];
		//$_SESSION['sel_room']=$rid;
	}
		

	$tfoodprice="";
    //$rid="";

	$productsids=array();

		//$user_id=$_REQUEST['user_id'];

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
			width: 40%;
		}

button {
  background: blue;
  color: white;
   padding: 30px;
  border-radius: 10px;
}
#space-fill {
	flex-grow: 1;	
}
</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="my-navbar">
		<div class="navbar-brand">Menu</div>
		<div id="space-fill"></div>
		<a href="logout.php">
			<button class="btn btn-outline-light">Logout</button>
		</a>
		<a href="laundry.php?user_id=$idd&rid=$ridd">
			<button class="btn btn-outline-light">submit</button>
		</a>
	</nav>
	
	<div class="container mt-4">
  		<form name="show" method="get" id="my-form" action="">
			<div class="form-group">
				<label for="user_id">User ID</label>
				<input type="text" name="user_id" size="10" value='<?php echo $user_id;?>' class="form-control"/>
			</div>
			<div class="form-group">
       			<label for="user_id">Room ID</label>
				<input type="text" name="rid" size="10" value='<?php echo $rid; ?>' class="form-control"/>
			</div>
			<div class="form-group">
				<label for="user_id">Select Foods</label>
				<span>
					<input type="checkbox" name="breakfast" value="breakfast" /> Breakfast
					<input type="checkbox" name="lunch" value="lunch" /> Lunch
					<input type="checkbox" name="dinner" value="dinner" />Dinner
				</span>
			</div>
			<div class="form-group">
				<input class="btn btn-secondary" type="submit" name="search"  value="search" >
			</div>		
			<?php
			$food_names=array();
			$breakfast=$lunch=$dinner=null;
			if(isset($_REQUEST['search']))
			{
				if(!isset($_REQUEST['breakfast']))	
					$breakfast=null;
				else
					$breakfast='breakfast';

				if(!isset($_REQUEST['lunch']))
					$lunch=null;
				else
					$lunch='lunch';

				if(!isset($_REQUEST['dinner']))
					$dinner=null;
				else
					$dinner='dinner';

				$food_names=getfoods($breakfast,$lunch,$dinner);
				$i=0;
				echo "<table border=0 bgcolor=cyan>
				<tr bgcolor=pink>
					
					<th>food id</th>
					<th> food name</th>
					<th>Price</th>
					<th>noi</th>
					<th>Select</th>
					
				</tr>";

				foreach ($food_names as $food_name)
						{echo "<tr>
							<td>$food_name[0]</td>
							<td>$food_name[1]</td>
							<td>$food_name[2]</td>
							<td><select name=noi$food_name[0]>
										<option>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
								</select></td>
							<td><input type=checkbox name=ch$food_name[0]></td> 
							</tr>";
					

							$foodids[$food_name[0]]=$food_name[2];
						}
						$_SESSION['foodids']=$foodids;

			}
			?>
			<input type=submit value="Show Amount" name=tfoodprice class="btn btn-primary"><br>
			<table border="0">
<?php 
		
		
	
          $input="";
          if(isset($_REQUEST['tfoodprice']))
          {
          	if(isset($_SESSION['foodids']))
          	{

          		$foodids=$_SESSION['foodids'];
          		$tfoodprice=0;

          
		foreach ($foodids as $food_id => $food_price) 
		{	
			$chname="ch".$food_id;

			if(isset($_REQUEST[$chname]))
			{	
				
					$pqty="noi".$food_id;
					$noqty=$_REQUEST[$pqty];
					$tfoodprice=$noqty*$food_price+$tfoodprice;
						echo "<br><tr>
		             <th>id:$food_id</th>
					<th>no of items:$noqty</th>
					<th>price:$food_price</th>
					
				</tr>";
					
                    			if(isset($_REQUEST['user_id']) &&  isset($_REQUEST['rid']))	
                    			{
                    				$user_id=$_REQUEST['user_id'];
                    				$rid=$_REQUEST['rid'];
                    				$nor=addfprice($food_id,$tfoodprice,$user_id,$rid);
                    			}	


				}	

			}
			
		}
	}
	?>
</table><br>
	 <?php  echo "$input" ;
	 ?>
	 <span><?php echo $tfoodprice ?></span><br>
</form>
	</div>
</body>
</html>