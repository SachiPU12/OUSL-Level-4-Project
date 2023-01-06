<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  include '../login/dbconnection.php';
  $id = $_GET["id"];

  if (isset($id)) {
    $sqlQuery = "SELECT * FROM dispach WHERE dispId = $id";
    $result = mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_array($result);
  }

  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';

    $sql = "DELETE FROM dispach WHERE dispId = '$id'";
    if ($conn->query($sql) === TRUE) {
        $alert = '<div class="alert alert-success">Record Delete Successfully</div>';
    }
    else {
        $alert = '<div class="alert alert-danger">Error: '.$sql.'<br>'.$conn->error.'</div>';
    }
    header("refresh:3;url=home.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Delete Dispach Advice</title>
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
    <h1>Delete Dispach Advice</h1><br>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="dispDate">Dispach Date:</label>
          <input type="text" class="form-control" placeholder="Enter Dispach Date" name="dispDate" value="<?=$row["dispDate"]?>">
        </div>
        <div class="form-group">
          <label for="id">Item Id:</label>
          <input type="id" class="form-control" placeholder="Enter Id" name="itemId" value="<?=$row["itemId"]?>">
        </div>
        <div class="form-group">
          <label for="itemName">Item Name:</label>
          <input type="text" class="form-control" placeholder="Enter Item Name" name="itemName" value="<?=$row["itemName"]?>">
        </div>
        <div class="form-group">
          <label for="quantity">Quantity:</label>
          <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" value="<?=$row["quantity"]?>">
        </div>
        <div class="form-group">
          <label for="total">Total:</label>
          <input type="text" class="form-control" placeholder="Enter Total" name="total" value="<?=$row["total"]?>">
        </div>
        <br>
        <input id="Butt" type="submit" class="btn btn-danger" name="submit" value="Delete">
        <?php echo $alert; ?>
      </form>
      </div>
    </div>
  </div>
</body>
</html>
