<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  include '../login/dbconnection.php';
  $sql = "SELECT * FROM dispach";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dispach Advice Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/dispachAdvice.css">
</head>
<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container"><br>
    <a href="insert.php" class="btn btn-success" id="Butt">New Dispach Advice</a><br><br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Dispach Id</th>
          <th>Dispach Date</th>
          <th>Item Id</th>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Receipt</th>
          <th colspan="2">Functions</th>      
        </tr>
      </thead>
      <tbody>
        <?php
          if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
        ?>
              <tr>
                <td><?php echo $row['dispId'];?></td>
                <td><?php echo $row['dispDate'];?></td>
                <td><?php echo $row['itemId'];?></td>
                <td><?php echo $row['itemName'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['total'];?></td>
                <td><a href="receipt.php?id=<?=$row['dispId'];?>" class="btn btn-primary">Receipt</a></td>
                <td><a href="edit.php?id=<?=$row['dispId'];?>" class="btn btn-warning">Edit</a></td>
                <td><a href="delete.php?id=<?=$row['dispId'];?>" class="btn btn-danger">Delete</a></td>
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
