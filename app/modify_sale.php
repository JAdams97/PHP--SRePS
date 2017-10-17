<!DOCTYPE html>

<?php
	require_once ("connect.php");
	$conn = @mysqli_connect($host, $user, $pass, $sql_db);

	if ($conn)
	{
		$sql_table="sales";
		$id = $_GET['id'];

		if (!$id)
			{
				echo "<p>No ID given, please try again</p>";
				echo "<a href=\"items.php\">Return to items</a>";
				mysqli_close($connect);
			}
	}
	else
	{
		echo "<p>Failed to connect to the database $sql_db</p>";
		echo "<p>Connection error: $conn->connect_error</p>";
	}

	$query = "SELECT * FROM $sql_table WHERE saleID =$id";
	$result = mysqli_query($conn, $query);

	if ($result)
		{
			$row = mysqli_fetch_array($result);
		}
		else
		{
			echo "<p>Something is wrong with ", $query, "</p>";
			echo "<p><a href=\"sales.php\">Return to sales</a></p>";
			mysqli_close($connect);
		}		
?>

<html lang="en">

<head>
	<title>People Health Pharmacy | Edit Sale</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="display-3">Modify Sale Information</h1>
				<hr />
				<div class="row">
					<div class="col-lg-4">
						<form method="post" action="update_sale.php">
							<div class="form-group">
								<label for="saleID"> Sale ID:</label>
								<input type="text" class="form-control" name="saleID" id="saleID" value="<?php echo $row['saleID']; ?>"  readonly/> 
							</div>
							<div class="form-group">
								<label for="itemID">Item ID:</label>
								<input type="text" class="form-control" name="itemID" id="itemID" value="<?php echo $row['itemID']; ?>"  size="2"/>
							</div>
							<div class="form-group">
								<label for="saleDate">Sale Date:</label>
								<input type="date" class="form-control" name="saleDate" id="saleDate" value="<?php echo $row['saleDate']; ?>" />
							</div>
							<div class="form-group">
								<label for="saleQuantity">Item Quantity:</label>
								<input type="text" class="form-control" name="saleQuantity" id="saleQuantity" value="<?php echo $row['saleQuantity']; ?>" size="4"/>
							</div>
							<div class="form-group">
								<label for="saleCost">Total Cost:</label>
								<input type="text" class="form-control" name="saleCost" id="saleCost" value="<?php echo $row['saleCost']; ?>" size="4"/> 
							</div>
								<input type="submit" class="btn btn-primary" id="subSaleAdd" value="Submit" />
								&emsp;
						<a href="sales.php">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- AngularJS v1.6.3 -->
	<script src="js/angular.min.js"></script>
	<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap plug-in file -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
