<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Add Sale</title>
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
		<!-- styles -->
		<link href="css/style.css" rel="stylesheet" />
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="main.php">
						<img alt="brand logo" src="images/logo.png"/>
					</a>
				</div>
				<div class="nav navbar-nav">
					<h1 class="navbar-text">People Health Pharmacy</h1>
				</div>
				<ul class="nav navbar-nav navbar-left">
					<li><a href="main.php">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Items<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="items.php">Items</a></li>
							<li><a href="items-add.php">Add Item</a></li>
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
				<form class="navbar-form navbar-right" action="index.php">
					<button class="btn" type="submit">Logout</button>
				</form>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php
						require_once ("connect.php");
						$connect = @mysqli_connect($host, $user, $pwd, $sql_db);

						if ($connect)
						{
							$sql_table="sales";
							$error_msg = "";

							$saleitem = $_POST["saleItem"];
							$saledate = $_POST["saleDate"];
							$salequantity = $_POST["saleQuantity"];

							if ($saleitem == "")
							{
								$error_msg .= "<p>Item name cannot be blank.</p>";
							}

							if ($saledate == "")
							{
								$error_msg .= "<p>Sale date cannot be blank.</p>";
							}

							if ($salequantity <= 0)
							{
								$error_msg .= "<p>Sale quantity must be more than 0.</p>";
							}
							else if ($salequantity == "")
							{
								$error_msg .= "<p>Sale quantity cannot be blank.</p>";
							}

							$query = "
							INSERT INTO $sql_table
							VALUES (DEFAULT, '$saleitem', '$saledate', '$salequantity', 0, DEFAULT)";

							$result = NULL;

							if ($error_msg != "")
							{
								echo "<p>$error_msg</p>";
								echo "<p><a href=\"sales-add.php\">Return to add sales form</a></p>";
							}
							else
							{
								$result = mysqli_query($connect, $query);

								if ($result)
								{
									echo "<p>Successfully added a sale!</p>";
									echo "<p><a href=\"sales-add.php\">Return to add sales form</a></p>";
								}
								else
								{
									echo "<p>Something is wrong with ", $query, "</p>";
									echo "<p>Query was not added, please try again</p>";
									echo "<p><a href=\"items-add.php\">Return to add items form</a></p>";
								}
							}
						}
						else
						{
							echo "<p>Failed to connect to the database $sql_db</p>";
						}

						mysqli_close($connect);
					?>
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
		<!-- AngularJS v1.6.3 -->
		<script src="js/angular.min.js"></script>
		<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap plug-in file -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
