<!DOCTYPE html>
<html lang="en">
	<head>
		<title>People Health Pharmacy | Update Sale</title>
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
		
		<!-- JavaScript function to go back one page. This way it retains the previous
			inputted data instead of refreshing the page -->
		<script>
			function goBack() {
			    window.history.back();
		}

		</script>
	</head>
	<body>
		<div class="container">

			<?php
				require_once ("connect.php");
				$connect = @mysqli_connect($host, $user, $pass, $sql_db);

				if ($connect)
				{
					$sql_table="sales";
					$error_msg = "";

					$saleID = $_POST["saleID"];
					$itemID = $_POST["itemID"];
					$saleDate = $_POST["saleDate"];
					$saleQuantity = $_POST["saleQuantity"];
					$saleCost = $_POST["saleCost"];


					if ($saleID == "")
					{
						$error_msg .= "<p>SaleID cannot be empty</p>";
					}
					if ($itemID == "")
					{
						$error_msg .= "<p>ItemID cannot be empty</p>";
					}

					if ($saleDate == "")
					{
						$error_msg .= "<p>Sale date cannot be blank.</p>";
					}


					if ($saleQuantity <= 0)
					{
						$error_msg .= "<p>Sale quantity must be more than 0.</p>";
					}
					else if ($saleQuantity == "")
					{
						$error_msg .= "<p>Sale quantity cannot be blank.</p>";
					}

					if ($saleCost <= 0)
					{
						$error_msg .= "<p>Total cost must be more than 0.</p>";
					}
					else if ($saleCost == "")
					{
						$error_msg .= "<p>Total cost cannot be blank.</p>";
					}

					$query = 
					"UPDATE $sql_table 
						SET 
						saleID = '$saleID',
						itemID = '$itemID', 
						saleDate = '$saleDate',
						saleQuantity = '$saleQuantity',
						saleCost = '$saleCost'
						Where
						saleID = $saleID ";

					$result = NULL;

					if ($error_msg != "")
					{
						echo "<p>$error_msg</p>";
						echo "<p><a href=\"#\" onclick=\"goBack()\">Return to edit sales form</a></p>";
					}
					else
					{
						$result = mysqli_query($connect, $query);

						if ($result)
						{
							echo "<p>Successfully updated a sale!</p>";
							echo "<p><a href=\"sales.php\">Return to Sales Page</a></p>";

							// or will automatically return after 3 seconds
                			echo '<meta http-equiv="refresh" content="3; URL=sales.php">';

						}
						else
						{
							echo "<p>Something is wrong with ", $query, "</p>";
							echo "<p>Query was not added, please try again</p>";
							echo "<p><a href=\"sales.php\">Return to Sales Page</a></p>";
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
