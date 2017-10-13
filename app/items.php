<?php
	require_once ("connect.php");
	$conn = mysqli_connect($host, $user, $pass, $sql_db);

	if (!$conn)
	{
		die("Failed to connect to $sql_db: " . mysqli_connect_error());
	}

	$sql_table = "items";
	$query = "SELECT * FROM $sql_table WHERE itemStatus = 1";
	$result = mysqli_query($conn, $query);

	if (!$result)
	{
		die(mysqli_error($conn));
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Items</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!-- Stylesheets -->
		<link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body class="content-body">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="main.html">
						<img alt="brand logo" src="img/logo.png"/>
					</a>
				</div>
				<div class="nav navbar-nav">
					<h1 class="navbar-text">People Health Pharmacy</h1>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="main.html">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="active"><a href="#">Items</a></li>
							<li><a href="items-add.html">Add Item</a></li>
						</ul>
					</li>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sales<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="sales.php">Sales</a></li>
							<li><a href="sales-add.html">Add Sale</a></li>
						</ul>
					</li>
					<li><a href="report.php">Report</a></li>
					<li><a href="forecast.php">Forecasting</a></li>
				</ul>
				<form class="navbar-form navbar-right" action="index.html">
					<button class="btn" type="submit">Logout</button>
				</form>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
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
									if(mysqli_num_rows($result) > 0)
									{
										while($row = mysqli_fetch_assoc($result))
										{
											echo
											"<tr>
												<td>", $row['itemID'], "</td>
												<td>", $row['itemName'], "</td>
												<td>", $row['itemType'], "</td>
												<td>", $row['itemPrice'], "</td>
												<td>", $row['itemStock'], "</td>
												<td>", $row['itemDescription'], "</td>
												<td>
													<a href=\"modify_item.php?id=", $row['itemID'], "\">Modify</a>
													<a href=\"delete_item.php?id=", $row['itemID'], "\">Delete</a>
												</td>
											</tr>";
										}
									}
									else
									{
										echo "<tr><td colspan=7>No records</td></tr>";
									}
									
									mysqli_close($conn);
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<hr/>
					<footer>
						<p>&copy; People Health Pharmacy Inc., 2017</p>
						<a href="aboutus.html">About Us</a>
						<a href="contactus.html">Contact Us</a>
					</footer>
				</div>
			</div>
		</div>
		<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap plug-in file -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
