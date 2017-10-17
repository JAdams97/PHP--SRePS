<!DOCTYPE html>

<?php
	require_once ("connect.php");
	$conn = @mysqli_connect($host, $user, $pass, $sql_db);

	if ($conn)
	{
		$sql_table="items";
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

	$query = "SELECT * FROM $sql_table WHERE itemId =$id";
	$result = mysqli_query($conn, $query);

	if ($result)
		{
			$row = mysqli_fetch_array($result);

		}
		else
		{
			echo "<p>Something is wrong with ", $query, "</p>";
			echo "<p><a href=\"items.php\">Return to items</a></p>";
			mysqli_close($connect);
		}		
?>

<html lang="en">

<head>
	<title>People Health Pharmacy | Edit Item</title>
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
				<h1 class="display-3">Modify Item Information</h1>
				<hr />
				<div class="row">
					<div class="col-lg-4">
						<form method="post" action="update_item.php">
							<div class="form-group">
								<label for="itemID"> Item ID:</label>
								<input type="text" name="itemID" class="form-control" id="itemID" value="<?php echo $row['itemID']; ?>" readonly/>
							</div>
							<div class="form-group">
								<label for="itemName">Item Name:</label>
								<input type="text" class="form-control"  name="itemName" id="itemName" value="<?php echo $row['itemName']; ?>"  />
							</div>
							<div class="form-group">
								<label for="itemType">Type:</label>
								<select class="form-control" name="itemType" id="itemType">
									<option value="def"></option>
									<option value="baby">Baby Care</option>
									<option value="cosmetics">Cosmetics</option>
									<option value="medicine">Medicine</option>
									<option value="purfume">Purfume</option>
									<option value="vitamins">Vitamins</option>
								</select>
							</div>
							<div class="form-group">
								<label for="itemPrice">Item Price:</label>
								<input type="text" class="form-control" name="itemPrice" id="itemPrice" value="<?php echo $row['itemPrice']; ?>"/>
							</div>
							<div class="form-group">
								<label for="itemStock">Item Stock:</label>
								<input type="text" class="form-control" name="itemStock" id="itemStock" value="<?php echo $row['itemStock']; ?>"/>
							</div>
							<div class="form-group">
								<label for="itemDescription">Item Description:</label>
								<input type="text" class="form-control" name="itemDescription" id="itemDescription" value="<?php echo $row['itemDescription']; ?>" size="50" /> 
							</div>
							<input type="submit" class="btn btn-primary" id="subItemAdd" value="Update Item" />
							&emsp;
							<a href="items.php">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>				

	</div>

	<script>
	    document.getElementById("itemType").value = "<?php echo $row['itemType']?>";
	    el.size = parseInt(el.value.length);
	</script>

	<!-- AngularJS v1.6.3 -->
	<script src="js/angular.min.js"></script>
	<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<!-- Bootstrap plug-in file -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
