<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Home</title>
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
					VALUES (DEFAULT, '$itemname', '$itemtype', '$itemprice', '$itemstock', '$itemdesc')";

					$result = NULL;

					if ($error_msg != "")
					{
						echo "<p>$error_msg</p>";
						echo "<p><a href=\"items-add.php\">Return to add items form</a></p>";
					}
					else
					{
						$result = mysqli_query($connect, $query);

						if ($result)
						{
							echo "<p>Successfully added an item!</p>";
							echo "<p><a href=\"items-add.php\">Return to add items form</a></p>";
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

		<!-- AngularJS v1.6.3 -->
		<script src="js/angular.min.js"></script>
		<!-- jQuery - required for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.min.js"></script>
		<!-- Bootstrap plug-in file -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
