<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  include '../login/dbconnection.php';
  $id = $_GET["id"];

  if (isset($id)) {
    $sqlQuery = "SELECT * FROM indoorstock WHERE inStId = $id";
    $result = mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_array($result);
  }

  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';

    $sql = "DELETE FROM indoorstock WHERE inStId = '$id'";
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
  <title>Delete Indoor Items</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/stock.css"></script>
</head>

<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container">
    <h1>Delete Indoor Items</h1>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="id">Item Id:</label>
          <input type="text" class="form-control" placeholder="Delete Item Id" name="inStId" value="<?=$row["inStId"]?>">
        </div>
        <div class="form-group">
          <label for="name">Item Name:</label>
          <input type="text" class="form-control" placeholder="Delete Item Name" name="name" value="<?=$row["name"]?>">
        </div>
        <div class="form-group">
          <label for="itemType">Item Type:</label>
          <input type="text" class="form-control" placeholder="Delete Item Type" name="itemType" value="<?=$row["itemType"]?>">
        </div>
        <div class="form-group">
          <label for="capacity">Capacity:</label>
          <input type="capacity" class="form-control" placeholder="Delete Capacity" name="capacity" value="<?=$row["capacity"]?>">
        </div>
        <input type="submit" class="btn btn-danger" id="Butt" name="submit" value="Delete"><br><br>
        <?php echo $alert; ?>
      </form>
    </div>
  </div>
</body>
</html>
