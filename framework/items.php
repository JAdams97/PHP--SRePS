<?php
	require_once ("connect.php");
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	if ($conn)
	{
		$sql_table="items";
	}
	else
	{
		echo "<p>Failed to connect to the database $sql_db</p>";
		echo "<p>Connection error: $conn->connect_error</p>";
	}

	$query = "SELECT * FROM $sql_table WHERE itemStatus = 1";
	$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Items</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
				<div class="col-sm-10">
					<h1>Company Logo</h1>
					<!-- style the company logo to be center of page?-->
				</div>
				<br>
				<div class="col-sm-2">
					<form action="index.php">
						<button type="submit">Logout</button>
					</form>

				</div>
			</div>
			<div class="row">
				<!-- For now using <br> tag to seperate each section. Use CSS style instead  -->
				<br><br>
				<div class="col-sm-3">
				<!-- This will be the dashboard which contains links to the other pages -->
				<!-- will be styled -->
					<div class="dashboard">
						<strong>Dashboard (aka nav bar)</strong>
						<ul>
							<li><a href="main.php">Home</a></li>
							<li><a href="items.php">Items</a></li>
							<li><a href="items-add.php">Add Item</a></li>
							<li><a href="sales.php">Sales</a></li>
							<li><a href="report.php">Report</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-8">
					<strong>Middle Content: Item screen, display item stock etc</strong>
					<hr />
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th scope="col" id="itemID">Item ID</th>
									<th scope="col" id="itemName">Item Name</th>
									<th scope="col" id="itemType">Item Type</th>
									<th scope="col" id="itemPrice">Item Price</th>
									<th scope="col" id="saleStatus">Item Stock</th>
									<th scope="col" id="itemDesc">Item Description</th>
									<th scope="col" id="itemManage">Manage</th>
								</tr>
							</thead>
							<tbody>
								<?php
									while($row = mysqli_fetch_array($result))
									{
										echo "<tr><td>", $row["itemID"], "</td><td>", $row["itemName"], "</td><td>", $row["itemType"], "</td><td>", $row["itemPrice"], "</td><td>", $row["itemStock"], "</td><td>", $row["itemDescription"], "</td><td><a href=\"delete_item.php?id=", $row['itemID'], "\">Delete</a></td></tr>";
									}
								?>
							</tbody>
						</table>
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
