<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';
   
    $sql = "INSERT INTO purchaseorder (itemId, itemName, quantity, unitPrice, total, purDate, purAddress, delivery, deliveryDate, payTerms) VALUES ('".$_POST["itemId"]."','".$_POST["itemName"]."','".$_POST["quantity"]."','".$_POST["unitPrice"]."','".$_POST["total"]."','".$_POST["purDate"]."','".$_POST["purAddress"]."','".$_POST["delivery"]."','".$_POST["deliveryDate"]."','".$_POST["payTerms"]."')";

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
  <title>Insert Purchase Order</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/purchaseOrder.css"></script>
</head>

<body>
  <header><?php include '../login/nav.php'?></header>
  <div class="container">
    <h1>Insert Purchase Order</h1><br>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="id">Item Id:</label>
          <input type="id" class="form-control" placeholder="Enter Id" name="itemId" required>
        </div>
        <div class="form-group">
          <label for="itemName">Item Name:</label>
          <input type="text" class="form-control" placeholder="Enter Item Name" name="itemName">
        </div>
        <div class="form-group">
          <label for="quantity">Quantity:</label>
          <input type="text" id="quantity" class="form-control" placeholder="Enter Quantity" name="quantity">
        </div>
        <div class="form-group">
          <label for="unitPrice">Unit Price:</label>
          <input type="text" id="unitPrice" class="form-control" placeholder="Enter Unit Price" name="unitPrice" oninput="calTotal()">
        </div>
        <div class="form-group">
          <label for="total">Total:</label>
          <input type="text" id="total" class="form-control" placeholder="Enter Total" name="total">
        </div>

        <br><br><br>
        <div class="form-group">
          <label for="purDate">Purchasing Date:</label>
          <input type="date" class="form-control" placeholder="Enter Purchasing Date" name="purDate"></textarea>
        </div>
        <div class="form-group">
          <label for="purAddress">Purchasing Address:</label>
          <textarea type="text" class="form-control" placeholder="Enter Purchasing Address" name="purAddress"></textarea>
        </div>

        <br><br><br>
        <div class="form-group">
          <label for="delivery">Delivery:</label>
          <input type="text" class="form-control" placeholder="Enter Delivery" name="delivery" required></textarea>
        </div>
        <div class="form-group">
          <label for="deliveryDate">Delivery Date:</label>
          <input type="date" class="form-control" placeholder="Enter Delivery Date" name="deliveryDate"></textarea>
        </div>
        <div class="form-group">
          <label for="paymentTerms">Payment Terms:</label>
          <input type="text" class="form-control" placeholder="Enter Payment Terms" name="payTerms" required></textarea>
        </div>
        <br>
        <input id="Butt" type="submit" class="btn btn-primary" name="submit" value="Submit">
        <?php echo $alert; ?>
      </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    document.getElementById('total').innerHTML = quantity;
    function calTotal(){
      var quantity = document.getElementById('quantity');
      var unitPrice = document.getElementById('unitPrice');
      var total = quantity.value * unitPrice.value;
      document.getElementById('total').value = total;
    }
  </script>

</body>
</html>
