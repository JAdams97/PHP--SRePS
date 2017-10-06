<?php
	require_once ("connect.php");
	$conn = @mysqli_connect($host, $user, $pass, $sql_db);

	if (!$conn)
	{
		die("Failed to connect to $sql_db: " . mysqli_connect_error());
	}

	$sql_table="items";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Add Item</title>
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
							<li><a href="items.php">Items</a></li>
							<li class="active"><a href="items-add.php">Add Item</a></li>
						</ul>
					</li>	
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sales<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="sales.php">Sales</a></li>
							<li><a href="sales-add.php">Add Sale</a></li>
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
					<h1 class="display-3">Add Item</h1>
					<hr />
					<div class="row">
						<div class="col-lg-4">
							<form id="itemAddForm" method="post" action="add_item.php">
								<div class="form-group">
									<label for="itemName">Name:</label>
									<input type="text" class="form-control" name="itemName" id="itemName" />
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
									<label for="itemPrice">Price:</label>
									<input type="text" class="form-control" name="itemPrice" id="itemPrice" />
								</div>
								<div class="form-group">
									<label for="itemStock">Stock:</label>
									<input type="text" class="form-control" name="itemStock" id="itemStock" />
								</div>
								<div class="form-group">
									<label for="itemDesc">Description:</label>
									<input type="text" class="form-control" name="itemDesc" id="itemDesc" />
								</div>
								<input type="submit" class="btn btn-primary" id="subItemAdd" value="Submit" />
								<input type="reset" class="btn" id="resItemAdd" value="Clear Form" />
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<hr/>
					<footer>
						<p>&copy; People Health Pharmacy Inc., 2017</p>
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
