<?php
	require_once ("connect.php");
	$conn = mysqli_connect($host, $user, $pass, $sql_db);

	if (!$conn)
	{
		die("Failed to connect to $sql_db: " . mysqli_connect_error());
	}

	$sql_table = "sales";
	
	$query = "
	SELECT s.itemID, i.itemName, DAY(s.saleDate) AS saleDay, SUM(s.saleQuantity) AS totalSold, SUM(s.saleCost) AS totalProfit
	FROM sales s
	INNER JOIN items i ON s.itemID = i.itemID
	WHERE MONTH(s.saleDate) = MONTH(CURRENT_DATE) AND YEAR(s.saleDate) = YEAR(CURRENT_DATE)";
	
	$result = mysqli_query($conn, $query);

	if (!$result)
	{
		die(mysqli_error($conn));
	}

	var $json_array = array();

	$row = mysqli_fetch_assoc($result)
	{
		array_push($json_array, $row);
	}

	echo json_encode($json_array);
?>