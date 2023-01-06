<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  include '../login/dbconnection.php';
  $sql = "SELECT * FROM purchaseorder";
  $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Purchase Order Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/purchaseOrder.css">
</head>
<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container"><br>
    <a href="insert.php" class="btn btn-success" id="Butt">New Purchase Order</a><br><br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Item Id</th>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total</th>
          <th>Purchase Date</th>
          <th>Purchase Address</th>
          <th>Delivery</th>
          <th>Delivery Date</th>
          <th>Payment Terms</th>
          <th colspan="2"></th>      
        </tr>
      </thead>
      <tbody>
        <?php
          if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
        ?>
              <tr>
                <td><?php echo $row['itemId'];?></td>
                <td><?php echo $row['itemName'];?></td>
                <td><?php echo $row['quantity'];?></td>
                <td><?php echo $row['unitPrice'];?></td>
                <td><?php echo $row['total'];?></td>
                <td><?php echo $row['purDate'];?></td>
                <td><?php echo $row['purAddress'];?></td>
                <td><?php echo $row['delivery'];?></td>
                <td><?php echo $row['deliveryDate'];?></td>
                <td><?php echo $row['payTerms'];?></td>
                <td><a href="edit.php?id=<?=$row['itemId'];?>" class="btn btn-warning">Edit</a></td>
                <td><a href="delete.php?id=<?=$row['itemId'];?>" class="btn btn-danger">Delete</a></td>
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
