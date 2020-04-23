	<?php
		session_start();
		if(isset($_SESSION["username"])){
		session_unset();
	session_destroy();
	}	
	include('conn.php');
	if(isset($_POST['submit'])){
	$qry=mysqli_query($conn,'select * from tbllogin');
	if(mysqli_num_rows($qry)==1)
		{
	
		$_SESSION["username"]=$_POST["Username"];
	//	print_r($_SESSION);
			header("Location:./dashboard.php");
			
		}
		else
		{
			header("Location:index.php");
		}
		} 	
	
	?>
	<!DOCTYPE html>
	<html>
	<head>
	<title>AndroidSutra Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Custom Theme files -->
	<link href="./reg_logincss/styles.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //Custom Theme files -->
	<!-- web font -->
	<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- //web font -->
	</head>
	<body>
	
		<!-- main -->
		<div class="main-w3layouts wrapper" style="background-color:rgb(128,128,128,0.50)" >
			<h1>Login Form</h1>
			<div class="main-agileinfo">
				<div class="agileits-top" style="background-color:rgb(128,128,128,0.50)">
					<form  method="post" enctype="multipart/form-data">
						<input class="text email" type="email" name="Username" placeholder="abcd@gmail.com" required="">
					
						<input class="text" type="password" name="password" placeholder="Password" required="">
						
						<input type="submit" name="submit" value="LOGIN">
					</form>
					<p>Don't have an Account? <a href="registration.php"> SignUp Now!</a></p>
				</div>
			</div>
			<!-- copyright -->
			<div class="colorlibcopy-agile">
				<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
			</div>
			<!-- //copyright -->
			<ul class="colorlib-bubbles" >
				<li  style="background-color:rgb(128,128,128,0.50)" ></li>
				<li style="background-color:rgb(128,128,128,0.50)" ></li>
				<li style="background-color:rgb(128,128,128,0.50)"></li>
				<li style="background-color:rgb(128,128,128,0.50)"></li>
				<li style="background-color:rgb(128,128,128,0.50)"></li>
				<li style="background-color:rgb(128,128,128,0.50)"></li>
				<li style="background-color:rgb(128,128,128,0.50)" ></li>
				<li style="background-color:rgb(128,128,128,0.50)" ></li>
				<li style="background-color:rgb(128,128,128,0.50)" ></li>
				<listyle="background-color:rgb(128,128,128,0.50)"></li>
			</ul>
		</div>
		<!-- //main -->
	</body>
	</html>