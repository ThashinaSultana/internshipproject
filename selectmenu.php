<?php
require('dbfunctions.php');
session_start();
$foodids=array();
$foodprice="";
$uri="";
?>

<?php
if(isset($_REQUEST['dmenuid']))
{
	$id=$_REQUEST['dmenuid'];
		if(DeleteDetails($id))
		{
			$msg="deleted successfully";
					}
		else
			$msg="not deleted";
	
}
?>

<?php

if(isset($_SESSION['food_id']))
	header ("location:error.php");
?>
<!DOCTYPE html>
<html>
<head>
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
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="my-navbar">
		<div class="navbar-brand">Adding New Menu</div>
		<div id="space-fill"></div>
		<a href="login.php?id=$idd&rid=$ridd">
			<button class="btn btn-outline-light">LogOut</button>
		</a>
		<a href="insertmenu.php">
			<button class="btn btn-outline-light mr-2">Add menu</button>
		</a>
		
	</nav>

<form name="show" method="get" action="">
	<div class="form-group">
	<div class="container">
			<div class="row">
				<div class="col-md">
					<div class="form-group mt-4">
						<label for="categry">Menu Category</label>						
		

	<select name=categry class="form-control mb-2" onchange="this.form.submit()">
		<option>choose</option>


		<?php

			$catgs=getMenucategory();
			$categry="";
			if(isset($_REQUEST['categry']))

				{
					$categry=$_REQUEST['categry'];
					

				}
			foreach ($catgs as $value)
			{
				if($categry==$value)
					echo "<option selected>".$value."</option>";
				else	
					echo "<option>".$value."</option>";
			}
		?>
		</select><br>
	</div>
  		
  				
		<?php
		$msg="";
		$catgs="";
		$fooddets=array();
			if(isset($_REQUEST['categry']))
				if($_REQUEST['categry']!='choose')
				{
					
					echo "<table border=0 bgcolor=cyan><tr bgcolor=pink>
  				<th>food_id</th>
  				<th>food_name</th>
  				<th>food_price</th>
  				<th>Modify</th>
  				<th>Remove</th>
  				
  				</tr>";


					$catgs=$_REQUEST['categry'];
					$fooddets=getMenuBycategory($catgs);
					$foodids=array("","","","");
					$i=0;
					$str="";
					
					foreach ($fooddets as $fooddet) 
					{
						//$filesrc="images/$pdet[0]".".jpg";
						//$str="<tr><td><img height=100 width=100 src=$filesrc></td>";
						$str=$str."<tr><td>$fooddet[0]</td>";
						$str=$str."<td>$fooddet[1]</td>";
						$str=$str."<td>$fooddet[2]</td>";
//str=$str."<td>$roomdet[3]</td>";
						
						//$str=$str."<td><input type=checkbox name=ch$fooddet[0]></td>";
						$str=$str."<td><a href='updmenu.php?upid=$fooddet[0]'>Edit</a></td>";
						$uri=$_SERVER['REQUEST_URI'];
						$pos=strpos($uri,"dmenuid");
						//die($pos);
						//die(substr($uri,0,$pos-1));
                        if(strpos($uri,"dmenuid")>0)
                        	$uri=substr($uri,0,$pos-1);
						$str=$str."<td><a href=".$uri."&dmenuid=".$fooddet[0].">Delete</a></td></tr>";
						$id=$fooddet[0];
					/*	$foodids[$fooddet[0]]=$fooddet[3];
						$_SESSION['foodids']=$foodids;
						if(isset($_REQUEST['food_id']))
							$msg=$fooddet[2];*/
					}

						$str = $str."</table>";
						echo $str;    
				}
				else
					$msg="please select the category";
  					


		?>
</table></br>

	


</form>	
<?php
echo $msg;
?>
</body>
</html> 