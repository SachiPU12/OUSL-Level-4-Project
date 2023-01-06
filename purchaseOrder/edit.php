<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  include '../login/dbconnection.php';
  $id=$_GET["id"];
  
  if (isset($id)) {
    $sqlQuery = "SELECT * FROM purchaseorder WHERE itemId = $id";
    $result =mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  }

  if (isset($_POST["submit"])) {
    include '../login/dbconnection.php';

    $itemId = $_POST ['itemId'];
    $itemName = $_POST ['itemName'];
    $quantity = $_POST ['quantity'];
    $unitPrice = $_POST ['unitPrice'];
    $total = $_POST["total"];
    $purDate = $_POST["purDate"];
    $purAddress = $_POST["purAddress"];
    $delivery = $_POST["delivery"];
    $deliveryDate = $_POST["deliveryDate"];
    $payTerms = $_POST["payTerms"];

    $sql ="UPDATE purchaseorder SET itemId = '$itemId', itemName = '$itemName', quantity = '$quantity', unitPrice = '$unitPrice', total = '$total', purDate = '$purDate' ,purAddress = '$purAddress', delivery = '$delivery', deliveryDate = '$deliveryDate', payTerms = '$payTerms' WHERE itemId = '$id'";


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
  <title>Update Purchase Order</title>
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
    <h1>Update Purchase Order</h1><br>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10" id="cover">
      <form action="" method="post">
        <div class="form-group">
          <label for="id">Item Id:</label>
          <input type="id" class="form-control" placeholder="Enter Id" name="itemId" value="<?=$row["itemId"]?>">
        </div>
        <div class="form-group">
          <label for="itemName">Item Name:</label>
          <input type="text" class="form-control" placeholder="Enter Item Name" name="itemName" value="<?=$row["itemName"]?>">
        </div>
        <div class="form-group">
          <label for="quantity">Quantity:</label>
          <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" value="<?=$row["quantity"]?>">
        </div>
        <div class="form-group">
          <label for="unitPrice">Unit Price:</label>
          <input type="text" class="form-control" placeholder="Enter Unit Price" name="unitPrice" value="<?=$row["unitPrice"]?>">
        </div>
        <div class="form-group">
          <label for="total">Total:</label>
          <input type="text" class="form-control" placeholder="Enter Total" name="total" value="<?=$row["total"]?>">
        </div>

        <br><br><br>
        <div class="form-group">
          <label for="purDate">Purchasing Date:</label>
          <input type="date" class="form-control" placeholder="Enter Purchasing Date" name="purDate" value="<?=$row["purDate"]?>"></textarea>
        </div>
        <div class="form-group">
          <label for="purAddress">Purchasing Address:</label>
          <input type="text" class="form-control" placeholder="Enter Purchasing Address" name="purAddress" value="<?=$row["purAddress"]?>">
        </div>

        <br><br><br>
        <div class="form-group">
          <label for="delivery">Delivery:</label>
          <input type="text" class="form-control" placeholder="Enter Delivery" name="delivery" value="<?=$row["delivery"]?>"></textarea>
        </div>
        <div class="form-group">
          <label for="deliveryDate">Delivery Date:</label>
          <input type="date" class="form-control" placeholder="Enter Delivery Date" name="deliveryDate" value="<?=$row["deliveryDate"]?>"></textarea>
        </div>
        <div class="form-group">
          <label for="paymentTerms">Payment Terms:</label>
          <input type="text" class="form-control" placeholder="Enter Payment Terms" name="payTerms" value="<?=$row["payTerms"]?>"></textarea>
        </div>
        <br>
        <input id="Butt" type="submit" class="btn btn-warning" name="submit" value="Update">
        <?php echo $alert; ?>
      </form>
      </div>
    </div>
  </div>
</body>
</html>
