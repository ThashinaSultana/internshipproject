
<?php
  require('dbfunctions.php');
   session_start();
   $bdet=array("","","","","","","","","","","");
   $msg="";
   $tprice="";
   $tfoodprice="";
  // $total_payment="";
   $laundry_price="";


  // $bill_id=$_SESSION['bill_id'];
$user_id=$_SESSION['user_id'];
//echo $user_id;
$rid=$_SESSION['ridd'];




//$cabid=$_SESSION['cid']
//$jdate=$_SESSION['jdate'];
//$total_payment=$tprice+$tfoodprice+$laundry_price;
//$bid=getNewBillid();
//echo $tamt;
//$bdate=date("Y/m/d");
//echo $jdate;
//$adv=$tamt*0.20;
//echo $adv;
//$billsdet=AddToBill($user_id,$rid);
//$ramt=$tamt-$adv;
//$bdet=getcab($cabid);
$bdet=getBillDetail($user_id,$rid);
foreach ($bdet as $key ) {
	# code...
}
if(isset($_REQUEST['submit']))
{   
	$user_id=$_SESSION['user_id'];
	$rid=$_SESSION['rid'];
	$bill_id=1;
		$bdets=getBillDetail($user_id,$rid);
			foreach ($bdets as $keyy ) {
	if (DeleteDetail($bill_id,$user_id,$rid))
	{
		$msg="<font color=green>Bookin Cancelled.....</font>";
	}
	else
		$msg="<font color=green>Bookin  not Cancelled.....</font>";
}
}
?>
<!DOCTYPE html>
<html>
<style>
button {
  background: blue;
  color: white;
   padding: 30px;
  border-radius: 10px;
}
</style>
<head>
	<title>Bill</title>
</head>

<body>

<form action="">
	<div id="space-fill"></div>


	<h1>
		Thank You For Booking...
	</h1>
	<div>
		<table>

			<tr><td><b>Bill No.</b></td><td><?php echo $key[0]; ?></td></tr>
			<tr><td><b>User id</b></td><td><?php echo $key[1]; ?></td></tr>
			<tr><td><b>Room id</b></td><td><?php echo $key[2]; ?></td></tr>
			<tr><td><b>check in date:</b></td><td><?php echo $key[3]; ?></td></tr>
			<tr><td><b>chek out date</b></td><td><?php echo $key[4]; ?></td></tr>
			<tr><td><b>Total Room Price</b></td><td><?php echo $key[5]; ?></td></tr>
			<!-- <tr><td><b>Booking date</b></td><td><?php echo $key[6]; ?></td></tr> -->
			<tr><td><b>food id</b></td><td><?php echo $key[7] ?></td></tr>
			<tr><td><b>total food price</b></td><td><?php echo $key[8]; ?></td></tr>
			<tr><td><b>laundry price</b></td><td><?php echo $key[9]; ?></td></tr>
			<!-- <tr><td><b>Total Payment.</b></td><td><?php echo $key[10]; ?></td></tr> -->
		</table>
	</div><br><br><br><br><br><br><br>
	<p align="bottom">
	<input type=submit name=submit  value="cancel"></p>

<?php
echo $msg;
?>

</form>
</body>
</html>