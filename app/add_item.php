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
					<?php
						require_once ("connect.php");
						$connect = mysqli_connect($host, $user, $pass, $sql_db);

						if ($connect)
						{
							$sql_table="items";
							$error_msg = "";

							$itemname = $_POST["itemName"];
							$itemtype = $_POST["itemType"];
							$itemprice = $_POST["itemPrice"];
							$itemstock = $_POST["itemStock"];
							$itemdesc = $_POST["itemDesc"];

							if ($itemname == "")
							{
								$error_msg .= "<p>Item name cannot be blank.</p>";
							}

							if ($itemtype == "def")
							{
								$error_msg .= "<p>Item type cannot be blank.</p>";
							}

							if ($itemprice < 0.00)
							{
								$error_msg .= "<p>Item price must be greater than $0.00.</p>";
							}
							else if ($itemprice == "")
							{
								$error_msg .= "<p>Item price cannot be blank.</p>";
							}

							if ($itemstock < 0)
							{
								$error_msg .= "<p>Item stock must be 0 or more</p>";
							}
							else if ($itemstock == "")
							{
								$error_msg .= "<p>Item stock cannot be blank.</p>";
							}

							$query = "
							INSERT INTO $sql_table
							VALUES (DEFAULT, '$itemname', '$itemtype', '$itemprice', '$itemstock', '$itemdesc', DEFAULT)";

							$result = NULL;

							if ($error_msg != "")
							{
								echo "<p>$error_msg</p>";
								echo "<p><a href=\"items-add.html\">Return to add items form</a></p>";
							}
							else
							{
								$result = mysqli_query($connect, $query);

								if ($result)
								{
									echo "<p>Successfully added an item!</p>";
									echo "<p><a href=\"items-add.html\">Return to add items form</a></p>";
								}
								else
								{
									echo "<p>Something is wrong with ", $query, "</p>";
									echo "<p>Query was not added, please try again</p>";
									echo "<p><a href=\"items-add.html\">Return to add items form</a></p>";
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
