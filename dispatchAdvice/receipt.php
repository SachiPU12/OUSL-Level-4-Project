<?php
  session_start();
  if(!isset($_SESSION['username'])){
    header("Location: index.php");
  }

  $alert = "";
  include '../login/dbconnection.php';

  if (isset($id)) {
  	$sql = "SELECT * FROM dispach WHERE dispId=$id";
  	$result = mysqli_query($conn, $sqlQuery);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Insert Dispach Advice</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/dispachAdvice.css"></script>

	<script language="javascript" type="text/javascript">
        function printDiv(divID) {
            //Get the HTML of div
            var divElements = document.getElementById(divID).innerHTML;
            //Get the HTML of whole page
            var oldPage = document.body.innerHTML;
            //Reset the page's HTML with div's HTML only
            document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
            //Print Page
            window.print();
            //Restore orignal HTML
            document.body.innerHTML = oldPage;
        }
	</script>
</head>

<body>
	<header><?php include '../login/nav.php'?></header>

	<div id="rightcontent">
		<div class="alert alert-info">
			<center><h2>Dispach Advice Receipt</h2></center>
		</div>
		<br>

		<div class="alert alert-info">
			<form method="post" class="well" style="background-color:#fff; overflow:hidden;">
				<div id="printablediv">
				<center>
					<table class="table" style="width:50%;">
						<label style="font-size:30px;">Dispach Advice Receipt</label>
						<br>
						<label style="font-size:20px;">Official Receipt</label>
						<tr>
							<th><h5>Dispach Date</h5></td>
							<th><h5>Dispach Id</h5></td>
							<th><h5>Item Name</h5></td>
							<th><h5>Quantity</h5></td>
							<th><h5>Total</h5></td>
						</tr>
		
						<?php
							$id = $_GET['id'];

							$sql = $conn->query("SELECT * FROM dispach WHERE dispId = '$id'") or die (mysqli_error());

							$fetch = $sql->fetch_array();

							$total = $fetch['total'];
							echo "Date : ". date("Y-m-d"). " : ". date("h.i.sa");
							
							$date = $fetch['dispDate'];
							$iId = $fetch['itemId'];
							$iName = $fetch['itemName'];
							$qty = $fetch['quantity'];
							$total = $fetch['total'];

							echo "<tr>";
								echo "<td>".$date."</td>";
								echo "<td>".$iId."</td>";
								echo "<td>".$iName."</td>";
								echo "<td>".$qty."</td>";
								echo "<td>".$total."</td>";
							echo "</tr>";
						?>
					</table>
					<h4>TOTAL: <?php echo $total; ?></h4>
				</center>
				<br>
				</div>

				<div class="col-md-12 bg-light text-right">
					<div class="add">
						<a onclick="javascript:printDiv('printablediv')" name="print" style="cursor:pointer;" class="btn btn-info"><i class="icon-white icon-print"></i> Print Receipt</a>
					</div>
				</div>
				<br>
			</form>
		</div>
	</div>	
</body>

</html>
