<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  include '../login/dbconnection.php';
  $id=$_GET["id"];
  
  if (isset($id)) {
    $sqlQuery = "SELECT * FROM storekeepers WHERE skId = $id";
    $result =mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  }

  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';

    $firstname = $_POST ['firstname'];
    $lastname = $_POST ['lastname'];
    $email = $_POST ['email'];
    $address = $_POST ['address'];

    $sql ="UPDATE storekeepers SET firstname = '$firstname', lastname = '$lastname', email = '$email', address = '$address' WHERE skId = '$id'";


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
  <title>Update StoreKeepers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/storeKeeper.css"></script>
</head>
<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container">
    <h1>Update StoreKeepers</h1>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="firstname">First Name:</label>
          <input type="text" class="form-control" placeholder="Enter First Name" name="firstname" value="<?=$row["firstname"]?>">
        </div>
        <div class="form-group">
          <label for="lastname">Last Name:</label>
          <input type="text" class="form-control" placeholder="Enter Last Name" name="lastname" value="<?=$row["lastname"]?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?=$row["email"]?>">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input type="text" class="form-control" placeholder="Enter address" name="address" value="<?=$row["address"]?>">
        </div>
        <input type="submit" class="btn btn-warning" id="Butt" name="submit" value="Update"><br><br>
        <?php echo $alert; ?>
      </form>
    </div>
  </div>
</body>
</html>
