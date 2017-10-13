<?php
	date_default_timezone_set('Australia/Melbourne');

	$date = getdate();
	$stamp = $date['year'] . "-" . $date['mon'] . "-" . $date['mday'] . "T" . sprintf("%02d", $date['hours']) . sprintf("%02d", $date['minutes']) . sprintf("%02d", $date['seconds']);

	$type = $_POST['type'];
	$month = $_POST['month'];
	$year = $_POST['year'];

	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=' . $stamp . '.csv');

	$output = fopen('php://output', 'w');
	$placed_header = false;

	require_once("connect.php");
	$conn = mysqli_connect($host, $user, $pass, $sql_db);

	if (!$conn)
	{
		die("Failed to connect to $sql_db: " . mysqli_connect_error());
	}

	$query = 'SELECT i.itemName, SUM(s.saleQuantity) AS totalSold, SUM(s.saleCost) AS totalProfit FROM sales s INNER JOIN items i ON s.saleID = i.itemID WHERE MONTH(s.saleDate) = 9 AND YEAR(s.saleDate) = 2017 GROUP BY s.itemID ORDER BY totalProfit';

	if (!$query)
	{
        echo 'MySQL Error: ' . mysqli_error();
        exit;
    }

	$result = mysqli_query($conn, $query);

	while ($row = mysqli_fetch_assoc($result))
	{ 
		if (!$placed_header)
		{
			fputcsv($output, array_keys($row));
			$placed_header = true;
		}

		fputcsv($output, array_values($row));
	}

	fclose($output);
?>