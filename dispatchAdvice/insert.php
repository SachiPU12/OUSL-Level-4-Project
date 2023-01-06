<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';
   
    $sql = "INSERT INTO dispach (dispDate, itemId, itemName, quantity, total) VALUES ('".$_POST["dispDate"]."','".$_POST["itemId"]."','".$_POST["itemName"]."','".$_POST["quantity"]."','".$_POST["total"]."')";

    if ($conn->query($sql) === TRUE) {
        $alert = '<div class="alert alert-success">New record created successfully</div>';
    }
    else {
        $alert = '<div class="alert alert-success">Error: '.$sql.'<br>'.$conn->error.'</div>';
    }
    header("refresh:3;url=home.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert Dispach Advice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/dispachAdvice.css"></script>
</head>

<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container">
    <h1>Insert Dispach Advice</h1><br>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="dispDate">Dispach Date:</label>
          <input type="date" class="form-control" placeholder="Enter Dispaching Date" name="dispDate"></textarea>
        </div>
        <div class="form-group">
          <label for="id">Item Id:</label>
          <input type="id" class="form-control" placeholder="Enter Id" name="itemId" required>
        </div>
        <div class="form-group">
          <label for="itemName">Item Name:</label>
          <input type="text" class="form-control" placeholder="Enter Item Name" name="itemName">
        </div>
        <div class="form-group">
          <label for="quantity">Quantity:</label>
          <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity">
        </div>
        <div class="form-group">
          <label for="total">Total:</label>
          <input type="text" class="form-control" placeholder="Enter Total" name="total">
        </div>
        <input id="Butt" type="submit" class="btn btn-primary" name="submit" value="Submit">
        <?php echo $alert; ?>
      </form>
      </div>
    </div>
  </div>
</body>
</html>
