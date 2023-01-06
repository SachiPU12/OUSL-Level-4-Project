<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  include '../login/dbconnection.php';
  $id=$_GET["id"];
  
  if (isset($id)) {
    $sqlQuery = "SELECT * FROM indoorstock WHERE inStId = $id";
    $result =mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  }

  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';

    $name = $_POST ['name'];
    $itemType = $_POST ['itemType'];
    $capacity = $_POST ['capacity'];

    $sql ="UPDATE indoorstock SET name = '$name', itemType = '$itemType', capacity = '$capacity' WHERE inStId = '$id'";


    if ($conn->query($sql) === TRUE) {
        $alert = '<div class="alert alert-success">Update successfully</div>';
    }
    else {
        $alert = '<div class="alert alert-danger">Error: '.$sql .'<br>'.$conn->error.'</div>';
    }
    header("refresh:3;url=home.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Outdoor Items</title>
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
    <h1>Update Outdoor Items</h1>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="name">Item Name:</label>
          <input type="text" class="form-control" placeholder="Enter Item Name" name="name" value="<?=$row["name"]?>">
        </div>
        <div class="form-group">
          <label for="nameType">Item Type:</label>
          <select class="form-control" name="itemType" id="sel1">
            <option><?=$row["itemType"]?></option>
            <option>Bearings</option>
            <option>Chemicals</option>
            <option>Nuts & Bolts washer</option>
            <option>Machine parts</option>
            <option>Materials</option>
            <option>Hand tools</option>
            <option>Welding consumebles</option>
            <option>Gases</option>
            <option>Lubricats</option>
            <option>Row materials</option>
            <option>Finishing materials</option>
          </select>
        </div>
        <div class="form-group">
          <label for="capacity">Capacity:</label>
          <input type="text" class="form-control" placeholder="Enter capacity" name="capacity" value="<?=$row["capacity"]?>">
        </div>
        <input type="submit" class="btn btn-warning" id="Butt" name="submit" value="Update"><br><br>
        <?php echo $alert; ?>
      </form>
    </div>
  </div>
</body>
</html>
