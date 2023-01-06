<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  include '../login/dbconnection.php';
  $id=$_GET["id"];
  
  if (isset($id)) {
    $sqlQuery = "SELECT * FROM users WHERE id = $id";
    $result =mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  }

  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';

    $name = $_POST ['name'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $sql ="UPDATE users SET name = '$name', email = '$email', password = '$password' WHERE id = '$id'";


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
  <title>Update User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/users.css"></script>
</head>
<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container">
    <h1>Update User</h1>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="userId">User Id:</label>
          <input type="text" class="form-control" placeholder="Enter User id" name="userId" value="<?=$row["id"]?>" readonly>
        </div>
        <div class="form-group">
          <label for="name">User Name:</label>
          <input type="text" class="form-control" placeholder="Enter User Name" name="name" value="<?=$row["name"]?>">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?=$row["email"]?>">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="text" class="form-control" placeholder="Enter password" name="password" value="<?=$row["password"]?>">
        </div>
        <input type="submit" class="btn btn-warning" id="Butt" name="submit" value="Update"><br><br>
        <?php echo $alert; ?>
      </form>
    </div>
  </div>
</body>
</html>
