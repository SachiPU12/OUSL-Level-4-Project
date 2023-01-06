<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';
   
    $sql = "INSERT INTO users (id, name, email, password) VALUES ('".$_POST["userId"]."','".$_POST["name"]."','".$_POST["email"]."','".$_POST["password"]."')";

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
  <title>Insert User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/customers.css"></script>
</head>

<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container">
    <h1>Insert User</h1><br>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="id">User Id:</label>
          <input type="id" class="form-control" placeholder="Enter Id" name="userId" required>
        </div>
        <div class="form-group">
          <label for="name">User Name:</label>
          <input type="text" class="form-control" placeholder="Enter User Name" name="name">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="text" class="form-control" placeholder="Enter Password" name="password"></input>
        </div>
        <input id="Butt" type="submit" class="btn btn-primary" name="submit" value="Submit">
        <br><br>
        <?php echo $alert; ?>
      </form>
    </div>
  </div>
</body>
</html>
