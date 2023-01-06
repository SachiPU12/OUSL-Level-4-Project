<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
	include('nav.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome AFI</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/welcome.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<br>
		<div class="row">
			<div class="col-md-10">
				<h2>Hi...! Welcome <?php echo $_SESSION['username']; ?></h2>
			</div>
		</div>
		<br>

		<table>
			<tr>
				<td>
					<div class="row justify-content-center">
						<div class="card" style="width: 25rem;">
							<ul class="list-group list-group-flush">
								<li class="list-group-item">
									<a href="../users/home.php">User</a>
								</li>
								<li class="list-group-item">
									<a href="../customers/home.php">Customer</a>
								</li>
								<li class="list-group-item">
									<a href="../suppliers/home.php">Supplier</a>
								</li>
								<li class="list-group-item">
									<a href="../storeKeeper/home.php">Store keeper</a>
								</li>
								<li class="list-group-item">Stock -->
								    <div align="center">
									    <a href="../indoorStock/home.php">Indoor</a><br>
									    <a href="../outdoorStock/home.php">Outdoor</a>
								    </div>
								</li>
								<li class="list-group-item">
									<a href="../purchaseOrder/home.php">Purchase Order</a>
								</li>
								<li class="list-group-item">
									<a href="../dispatchAdvice/home.php">Dispatch Advice</a>
								</li>
							</ul>
						</div>
					</div>
				</td>
				
				<td style="padding-left: 80px;">
					<div class="row justify-content-center">
						<img src="../images/welcome.jpg" class="img-fluid" alt="welcome pic">
					</div>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>
