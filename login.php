<?php session_start(); ?>
<?php include("server.php"); ?>
<?php 
	$msg = " ";
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//create a query
		$sql = "SELECT * FROM admin WHERE username = '$username' AND  password = '$password' ";
		//run the query
		$result = $mysqli->query($sql) or die($mysqli->error.__LINE__);
		if($result->num_rows==1){
			$_SESSION['login'] = $username;
			header('Location: violet.php');
		}
		else{

			$msg = "Invalid Username/Password!";
		}
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="style4.css">
	

	</style>
</head>
<body>
	<form action="login.php" method="post">
	<div class="login">
		<div class="logo">
			<i class="fa fa-empire"></i>
		</div>
		
			<h2>Login</h2>
		
				<h4 class="<?php if(isset($_POST['submit'])){ echo "alert alert-danger";}else{echo "";} ?>" style="color: #ff0000; text-align: center; font-weight: bold;"><?php echo $msg; ?></h4>
			
			<div class="group">
				<input type="text" name="username" placeholder="Username"]" >
				<i class="fa fa-user"></i>
			</div>

			<div class="group">
				<input type="password" name="password" placeholder="Password" minlength="6" maxlength="8">
				<i class="fa fa-lock"></i>
			</div>
			<button type="submit" name="submit" >Login</button>
			<p class="f">Don't have an account ? <a href="register.php">Signup</a></p>
	</div>
	</form>
	
	<div class="bottom">
		<p class="s">Design By: <a href="http://about.me/ibrobk" target="_blank">Ibrahim G Yusuf</a> | Department of Computer Science, Faculty of Computer Science and Information Technology | <a href="http://www.buk.edu.ng" target="_blank"> Bayero University, Kano.</a></p>
		
	</div>

</body>
</html>