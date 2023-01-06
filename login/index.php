<?php
	session_start();
	include 'dbconnection.php';
	$msg="";
	if (isset($_POST['submit'])){
		$email = $_POST['email'];
	    $password = $_POST['password']; 
	      
	    $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
		
		$result = $conn->query($sql);
	    $row = $result->fetch_array(MYSQLI_ASSOC);
	    $row_count = $result->num_rows;

		if($row_count == 1) {
			$_SESSION['username'] = $row['name'];
			header("refresh:0;url=welcome.php");
		}else{
			$msg = '<div class="alert altert-danger">Your Login Name or Password is invalid</div>';
		}
		$conn->close();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>AFI Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/login.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<h1>Login</h1><br><br>
				<form action="" method="post">
					<div class="form-group">
						<label for="email">Email :</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
					</div>
					<div class="form-group">
						<label for="pwd">Password :</label>
						<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
					</div>
					<input type="submit" class="btn btn-primary" value="Submit" name="submit"><br>
				</form>
				<br>

				<div align="center">
					<img src="../images/login.jpg" alt="login pic">
				</div>
				<div class="alert alert-primary" role="alert">
					<?php echo $msg; ?>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
