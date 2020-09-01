<?php
require('dbfunctions.php');
session_start();
$rids=array();
$rprice="";

$uri="";
?>
<?php
if(isset($_REQUEST['droomid']))
{
	$id=$_REQUEST['droomid'];
		if(DeleteRoomDetails($id))
		{
			$msg="deleted successfully";
					}
		else
			$msg="not deleted";
	
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
		<a href="admin.php" class="navbar-brand">Select Room</a>
		<div id="space-fill"></div>
		<a href="insertroom1.php">
			<button class="btn btn-outline-light mr-2">Add Room</button>
		</a>
		<a href="login.php?id=$idd&rid=$ridd">
			<button class="btn btn-outline-light">Logout</button>
		</a>
	</nav>

<br>
<form name="show" method="get" action="">
		<div class="form-group">
			<label>Room Category</label>
			<select name=categry onchange="this.form.submit()">
				<option>choose</option>
				<?php
					$catgs=getRoomcategory();
					$categry="";
					if(isset($_REQUEST['categry']))
						$categry=$_REQUEST['categry'];
					foreach ($catgs as $value)
					{
						if($categry==$value)
							echo "<option selected>".$value."</option>";
						else	
							echo "<option>".$value."</option>";
					}
				?>
			</select>
		</div>
		<?php
		$msg="";
		$catgs="";
		$roomdets=array();
			if(isset($_REQUEST['categry']))
				if($_REQUEST['categry']!='choose') { ?>
					<table class="table table-striped">
						<tr>
							<th>rid</th>
							<th>rname</th>
							<th>rtype</th>
							<th>rrate</th>
							<th>rstatus</th>
							<th>rdet</th>
							<th>rpics</th>
							<th>pictures</th>
							<th>Modify</th>
							<th>Remove</th>
  						</tr>
				<?php
					$catgs=$_REQUEST['categry'];
					$roomdets=getRoomsBycategory($catgs);
					$roomids=array("","","","","","","","","");
					$i=0;
					$str="";
					foreach ($roomdets as $roomdet) 
					{
						//$filesrc="images/$pdet[0]".".jpg";
						//$str="<tr><td><img height=100 width100 src=$filesrc></td>";
						$str=$str."<tr><td>$roomdet[0]</td>";
						$str=$str."<td>$roomdet[1]</td>";
						$str=$str."<td>$roomdet[2]</td>";
                        $str=$str."<td>$roomdet[3]</td>";
						$str=$str."<td>$roomdet[4]</td>";
						$str=$str."<td>$roomdet[5]</td>";
						$str=$str."<td>$roomdet[6]</td>";
						$str=$str."<td><img src=image/".$roomdet[0].".jpg height=100 width=100</td>";
						//$str=$str."<td>$roomdet[7]</td>";
						//$str=$str."<td><input type=checkbox name=ch$fooddet[0]></td>";
						
						$str=$str."<td><a href='updroom.php?upid=$roomdet[0]'>Edit</a></td>";
						$uri=$_SERVER['REQUEST_URI'];
						$pos=strpos($uri,"droomid");
						//die($pos);
						//die(substr($uri,0,$pos-1));
                        if(strpos($uri,"droomid")>0)
                        	$uri=substr($uri,0,$pos-1);
						$str=$str."<td><a href=".$uri."&droomid=".$roomdet[0].">Delete</a></td></tr>";

						$id=$roomdet[0];
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
	</table>
</form>	
<?php
echo $msg;
?>
</body>
</html> 