<!DOCTYPE html>

<?php
	require_once ("connect.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

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
		<form method="post" action="update_sale.php">
			<fieldset>
				<legend>Edit Sales Information</legend>
					<p>
						<label for="saleID"> Sale ID:</label>
						<input type="text" name="saleID" id="saleID" value="<?php echo $row['saleID']; ?>" readonly size="2"/> <small>This cannot be edited</small>
					</p>
					<p>
						<label for="itemID">Item ID:</label>
						<input type="text" name="itemID" id="itemID" value="<?php echo $row['itemID']; ?>"  size="2"/>
					</p>
					<p>
						<label for="saleDate">Sale Date:</label>
						<input type="date" name="saleDate" id="saleDate" value="<?php echo $row['saleDate']; ?>" />
					</p>
					<p>
						<label for="saleQuantity">Item Quantity:</label>
						<input type="text" name="saleQuantity" id="saleQuantity" value="<?php echo $row['saleQuantity']; ?>" size="4"/>
					</p>
					<p>
						<label for="saleCost">Total Cost:</label>
						<input type="text" name="saleCost" id="saleCost" value="<?php echo $row['saleCost']; ?>" size="4" readonly/> <small>This cannot be edited</small>
					</p>
					</fieldset>
					<p>
						<input type="submit" title="submit" value="Update Sales" /> 
						&emsp;
						<a href="sales.php">Cancel</a>
					</p>
			</form>
		

	</div>

	<!-- AngularJS v1.6.3 -->
	<script src="js/angular.min.js"></script>
	<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap plug-in file -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
