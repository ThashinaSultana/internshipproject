<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.min.css" />	
	<style type="text/css">
	html, body {
		height: 90vh;
		width: 100%;
	}
		#my-navbar {
			background-color: #7700cc;
		}
		#space-fill {
			flex-grow: 1;
		}
		#my-container {
			display: flex;
			width: 100%;
			height: 100%;
			font-weight: bold;
			font-size: 150%;
		}
		#rooms-div {
			display: flex;
			flex-basis: 50%;
			height: 100%;
			justify-content: center;
			align-items: center;
			background-image: url("image/562.jpg");
			font-decoration: none;
			color: rgb(0,0,0);
		}
		#menu-div {
			display: flex;
			flex-basis: 50%;
			height: 100%;
			justify-content: center;
			align-items: center;
			background-image: url("image/12.jpg");
			font-decoration: none;
			color: rgb(0,0,0);
		}
		#rooms-div:hover {
			background-image: none;
			background-color: rgba(230, 100, 230, 0.7);
		}
		#menu-div:hover {
			background-image: none;
			background-color: rgba(70, 120,80 , 0.0);
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" id="my-navbar">
		<div class="navbar-brand">Room Booking.....</div>
		<div id="space-fill"></div>
		<a href="logout.php">
			<button class="btn btn-outline-light">Logout</button>
		</a>
	</nav>
	<div id="my-container">
		<a href="selectroom.php" id="rooms-div">
			ROOMS
		</a>
		<a href="selectmenu.php" id="menu-div">
			MENU
		</a>
	</div>
</body>
</html>