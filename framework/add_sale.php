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
	</head>
	<body>
		<div class="container">

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
		<!-- AngularJS v1.6.3 -->
		<script src="js/angular.min.js"></script>
		<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap plug-in file -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
