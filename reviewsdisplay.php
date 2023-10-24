<?php include("topbit.php"); ?>  <!-- Include the "topbit.php" file at the beginning of the page -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reviews</title>
    <link href="css/style.css" rel="stylesheet" type="text/css"/> <!-- Link to the CSS stylesheet -->
</head>
<body>

<main id="content">
	<h2>View Reviews Here</h2>
</main>
	
<main id="content">

  <form id="sortForm" action="" method="get"> <!-- Create a form for sorting -->
    <select name="sort" id="sortSelect">
        <option value="high" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'high') echo 'selected'; ?>>Highest Rated</option>
        <option value="low" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'low') echo 'selected'; ?>>Lowest Rated</option>
        <option value="productid" <?php if(isset($_GET['sort']) && $_GET['sort'] == 'productid') echo 'selected'; ?>>Product</option>
    </select>
    <input type="submit" value="Sort">

</form>
</main>
<main id="content">

    <?php
    // Connect to the database
    require_once "reviews_mysqli.php";

    // Fetch data from the database based on the selected sorting option
    if(isset($_GET['sort']) && $_GET['sort'] == 'high') {
        $sql = "SELECT * FROM ratings ORDER BY rating DESC";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'low') {
        $sql = "SELECT * FROM ratings ORDER BY rating ASC";
    } elseif(isset($_GET['sort']) && $_GET['sort'] == 'productid') {
        $sql = "SELECT * FROM ratings ORDER BY ProductID";
    } else {
        $sql = "SELECT * FROM ratings";
    }
    $result = $conn->query($sql);
    // Define the associative array for ProductID mapping
    $productIdMap = array(
        1 => "Cherry",
        2 => "Raspberry",
        3 => "Grape"
        // Add more mappings as needed
    );

    // Display the fetched data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="tile" class="image">';

            // Replace numeric ProductID with corresponding word
            $productId = $row['ProductID'];
            if (isset($productIdMap[$productId])) {
                echo "<p>Product: " . $productIdMap[$productId] . "</p>";
            } else {
                echo "<p>Product ID: " . $productId . "</p>";
            } 
			
            echo "<p>Name: " . $row['Name'] . "</p>"; 
            echo "<p>Rating: " . $row['rating'] . "/5</p>";
            echo "<p>Feedback: " . $row['feedback'] . "</p>"; 
            echo "</div>";
        }
    } else {
        echo "No records found.";
    }

    $conn->close(); // Close the database connection
    ?>

</main>

<script>
    document.getElementById('sortForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        var sortValue = document.getElementById('sortSelect').value; // Get the selected value
        var currentSort = '<?php echo (isset($_GET['sort']) ? $_GET['sort'] : 'high'); ?>';
        if (sortValue !== currentSort) {
            window.location.href = '?sort=' + sortValue; // Redirect to the sorted URL
        }
    });
</script>

</body>
</html>
