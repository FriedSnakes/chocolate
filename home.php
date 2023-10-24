<?php include("topbit.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<main id="content">
	<h1>Home</h1>
</main>
	
<main id="content">
	
	<?php
	// Connect to the database
	require_once "reviews_mysqli.php";

	// Fetch data from the product table
	$sql = "SELECT * FROM product";
	$productResult = $conn->query($sql);

	// Fetch average ratings for specific products
	$fruits = array('1', '2', '3'); // List of ProductIDs to filter by
	$fruit_condition = "'" . implode("','", $fruits) . "'";
	$query = "SELECT ProductID, AVG(rating) AS avg_rating FROM ratings WHERE ProductID IN ($fruit_condition) GROUP BY ProductID";
	$ratingResult = $conn->query($query);

	// Create an associative array to store average ratings
	$averageRatings = array();

	// Process and store the average ratings
	if ($ratingResult->num_rows > 0) {
		while ($row = $ratingResult->fetch_assoc()) {
			$averageRatings[$row['ProductID']] = $row['avg_rating'];
		}
	}

	// Display the fetched data and average ratings
	if ($productResult->num_rows > 0) {
		while ($row = $productResult->fetch_assoc()) {
			echo '<div class="tile2" class="image">';
			 "<p>ID: " . $row['ID'] . "</p>";
			echo "<p>" . $row['product'] . "</p>";
			// Display the image using the <img> tag                                     
			echo '<img src="' . $row['image'] . '" alt="' . $row['product'] . '" width="200" height="200" style="border-radius: 50px; padding: 20px;">';

			// Display the average rating if available
			if (isset($averageRatings[$row['ID']])) {
				echo "<p>Average Rating: " . $averageRatings[$row['ID']] . "</p>";
			}

			echo "</div>";
		}
	} else {
		echo "No records found.";
	}
	$conn->close();
	?>
	</main>
</body>
</html>
