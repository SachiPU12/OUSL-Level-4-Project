<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';
   
    $sql = "INSERT INTO indoorstock (inStId, name, itemType, capacity) VALUES ('".$_POST["inStId"]."','".$_POST["name"]."','".$_POST["itemType"]."','".$_POST["capacity"]."')";

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
  <title>Insert Indoor Items</title>
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
    <h1>Insert Indoor Items</h1><br>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="id">Item Id:</label>
          <input type="id" class="form-control" placeholder="Enter Item Id" name="inStId" required>
        </div>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" placeholder="Enter Name" name="name">
        </div>
        <div class="form-group">
          <label for="itemType">Item Type:</label>
          <select class="form-control" name="itemType" id="sel1">
            <option></option>
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
          <input type="text" class="form-control" placeholder="Enter Capacity" name="capacity">
        </div>
        <input id="Butt" type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>
        <?php echo $alert; ?>
      </form>
    </div>
  </div>
</body>
</html>
