<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Add Item</title>
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
			?>

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
							<li><a href="sales.php">Sales</a></li>
							<li><a href="report.php">Report</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-8">
					<strong>Middle Content: Item screen, display item stock etc</strong>
					<hr />
					<form id="itemAddForm" method="post" action="add_item.php">
						<p>
							<label for="itemName">Name:</label>
							<input type="text" name="itemName" id="itemName" />
						</p>
						<p>
							<label for="itemType">Type:</label>
							<select name="itemType" id="itemType">
								<option value="def"></option>
								<option value="baby">Baby Care</option>
								<option value="cosmetics">Cosmetics</option>
								<option value="medicine">Medicine</option>
								<option value="purfume">Purfume</option>
								<option value="vitamins">Vitamins</option>
							</select>
						</p>
						<p>
							<label for="itemPrice">Price:</label>
							<input type="text" name="itemPrice" id="itemPrice" />
						</p>
						<p>
							<label for="itemStock">Stock:</label>
							<input type="text" name="itemStock" id="itemStock" />
						</p>
						<p>
							<label for="itemDesc">Description:</label>
							<input type="text" name="itemDesc" id="itemDesc" />
						</p>
						<input type="submit" id="subItemAdd" value="Submit" />
						<input type="reset" id="resItemAdd" value="Clear Form" />
					</form>
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
