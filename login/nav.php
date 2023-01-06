<?php
	if(!isset($_SESSION['username'])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>
  <div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">

      <!-- Brand/logo -->
      <a class="navbar-brand" href="../login/welcome.php">
        <img src="../images/logo.jpg" alt="logo" style="width:80px;">
      </a>

      <!-- Links -->
      <ul class="navbar-nav">
      	<li class="nav-item">
          <a class="nav-link" href="../users/home.php">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../customers/home.php">Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../suppliers/home.php">Supplier</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../storeKeeper/home.php">Store keeper</a>
        </li>
      
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Stock</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../indoorStock/home.php">Indoor</a>
            <a class="dropdown-item" href="../outdoorStock/home.php">Outdoor</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../purchaseOrder/home.php">Purchase Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../dispatchAdvice/home.php">Dispatch Advice</a>
        </li>
      </ul>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

      <!-- User details -->
      <ul style="">
        <li class="nav-item">
          <h4 style="color: #ffffff;"><?php echo $_SESSION['username'] ;?></h4>
          <a href="../login/logout.php"><b>Logout</b></a>
        </li>
      </ul>

    </nav>
  </div>
</body>
</html>
