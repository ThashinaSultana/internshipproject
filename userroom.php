<?php
	require('dbfunctions.php');
	session_start();
	$roomids=array();
	$rprice="";
	$msg="";
	$dateDiff="";
	$totamt="";
	$rrate="";
	$id="";
	$tprice="";
	$uid="";
	$bid=getNewBillid();

	$user_id=$_SESSION['user_id'];


	$productsids=array();
	if(isset($_REQUEST['submit'])) {
		$idd=$_SESSION['user_id'];
		$sel_room=$_REQUEST['sel_room'];
		$_SESSION['ridd']=$sel_room;
		$ridd=$_SESSION['ridd'];
	}
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
		<div class="navbar-brand">Room Booking</div>
		<div id="space-fill"></div>
		<a href="usermenu.php?id=$idd&rid=$ridd">
			<button class="btn btn-outline-light">Submit</button>
		</a>
	</nav>

	<form name="show" method="get"  action="">
		<div class="container">
			<div class="row">
				<div class="col-md">
					<div class="form-group mt-4">
						<label for="user_id">User ID</label>						
						<input type="text" name="user_id" size="10" value='<?php echo $user_id; ?>'  class="form-control"/>
					</div>
					<div class="form-group">
						<label for="pwd"> Category</label>
						<select name=categry class="form-control mb-2" onchange="this.form.submit()">
							<option>choose</option>
							<?php
								$catgs=getRoomcategory();
								$categry="";
								if(isset($_REQUEST['categry']))
									$categry=$_REQUEST['categry'];
								foreach ($catgs as $value) {
									if($categry==$value)
										echo "<option selected>".$value."</option>";
									else
										echo "<option>".$value."</option>";
								}
							?>
						</select>
					</div>
  	 				<label for="pwd"> Type</label>	
					<select name=types  class="form-control mb-4" onchange="this.form.submit()">
						<option>choose</option>
						<?php
							$typ=getTypecategory();
							$types="";
							if(isset($_REQUEST['types']))
								$types=$_REQUEST['types'];
							foreach ($typ as $value) {
								if($types==$value)
									echo "<option selected>".$value."</option>";
								else	
									echo "<option>".$value."</option>";
							}
						?>
					</select>
  	 				<label for="pwd"> In Date</label>			
					<input type="date" name="cin_date"  value="<?php if(isset($_REQUEST['cin_date'])) echo $_REQUEST['cin_date']; else echo "" ?>" class="form-control mb-2"/>
					<label for="pwd"> Out Date</label>
					<input type="date" name="cout_date" value="<?php if(isset($_REQUEST['cout_date'])) echo $_REQUEST['cout_date']; else echo "" ?>" class="form-control mb-2"/>
					<input type="submit"  name="show" value="show" class="btn btn-primary">
					<input type="submit"  name=tprice value="Show Amount" class="btn btn-primary">
				</div>
				<div class="col-md mt-5">
					<?php
						function dateDiffInDays($cin_date,$cout_date) {
							$diff=strtotime($cout_date)-strtotime($cin_date);
							return abs(round($diff/86400));
						}

						if(isset($_REQUEST['show'])) {
							$catgs="";
							$typ="";
							$cin_dte="";
							$roomdets=array();
							if(isset($_REQUEST['categry']) && isset($_REQUEST['types'])  && isset($_REQUEST['cin_date'])) {
								$cin_date=$_REQUEST['cin_date'];
								$cout_date=$_REQUEST['cout_date'];
								if(($_REQUEST['categry']!='choose' )&&($_REQUEST['types']!='choose')) {
									echo "<table border=0 bgcolor=grey><tr bgcolor=black>
									<th>rid</th>
					  				<th>rname</th>
					  				<th>rtype</th>
					  				<th>rrate</th>
					  				<th>rstatus</th>
					  				<th>rdet</th>
					  				<th>rpics</th>
					  				<th>pictures</th>
					  				<td>select</td>  				
					  				</tr>";
									$catgs=$_REQUEST['categry'];
									$typ=$_REQUEST['types'];
									$cin_dte=$_REQUEST['cin_date'];
									$roomdets=getRoomTypeBycategory($catgs,$typ,$cin_dte);
									$roomids=array("","","","","","","","","");
									$i=0;
									$str="";
									foreach ($roomdets as $roomdet) {
										$str=$str."<tr><td>$roomdet[0]</td>";
										$str=$str."<td>$roomdet[1]</td>";
										$str=$str."<td>$roomdet[2]</td>";
				                       	$str=$str."<td>$roomdet[3]</td>";
										$str=$str."<td>$roomdet[4]</td>";
										$str=$str."<td>$roomdet[5]</td>";
										$str=$str."<td>$roomdet[6]</td>";
										$str=$str."<td><img src=image/".$roomdet[0].".jpg height=100 width=100</td>";
										$str=$str."<td><input type=radio name=sel_room value=$roomdet[0] ></td>";
									}
									echo $str;  
									echo "</table>";
									$_SESSION['pids']=$productsids;
								} else {
									$msg="please select the category or type";
								}				
							}
							$datediff=dateDiffInDays($cin_date,$cout_date);
							$_SESSION['datediff']=$datediff;
							printf("number of days ".$datediff);
						}
					?>
					<?php 
					$input="";
					if(isset($_REQUEST['tprice'])) {
						$tprice=0;
						if(isset($_REQUEST['sel_room'])) {	
							$sel_room=$_REQUEST['sel_room'];
							$_SESSION['ridd']=$sel_room;
							$ridd=$_SESSION['ridd'];
								$rrrate=$rrate;
								$rrrate=getrrrate($sel_room);
								
								$datediff=$_SESSION['datediff'];
								$tprice=$datediff*$rrrate+$tprice;
								?>
								<table class="table table-striped">
								<tr>
									<td>Room ID :</td><td><?php echo $sel_room ?></td>
								</tr>
								<tr> 
									<td> No.Of Days:</td><td><?php echo $datediff ?></td>
								</tr>
								<tr>
									<td> Total Price:</td><td><?php echo $tprice ?></td>
								</tr>
								</table>
								<?php
								if(isset($_REQUEST['user_id']) && isset($_REQUEST['cin_date']) && isset($_REQUEST['cout_date']) ) {
									$bid=getNewBillid();               
									$user_id=$_REQUEST['user_id'];
									$cin_date=$_REQUEST['cin_date'];
									$cout_date=$_REQUEST['cout_date'];
									$nor=addrprice($bid,$user_id,$sel_room,$cin_date,$cout_date,$tprice);
								}				
							}
						}
					?>
				</div>
			</div>
		</div>
	</form>
</body>
</html> 