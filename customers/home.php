<?php
  include '../login/dbconnection.php';

  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }
  
  $sql = "SELECT * FROM customers";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/customers.css">
</head>
<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container"><br>
    <a href="insert.php" class="btn btn-success" id="Butt">Add New Customer</a><br><br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Customer Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Address</th>
          <th colspan="2"></th>      
        </tr>
      </thead>
      <tbody>
        <?php
          if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
        ?>
              <tr>
                <td><?php echo $row['cusId'];?></td>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['address'];?></td>
                <td><a href="edit.php?id=<?=$row['cusId'];?>" class="btn btn-warning">Edit</a></td>
                <td><a href="delete.php?id=<?=$row['cusId'];?>" class="btn btn-danger">Delete</a></td>
              </tr>
              <?php
            }
          }
          else{
            echo "0 results";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
