<?php
// Establish a database connection (replace with your database credentials)
$servername = "localhost";
$username = "_team23L2B";
$password = "zLHt6pioEvoD18uk";
$dbname = "team23L2B_reviews";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productname = $_POST['ProductID'];
    $name = $_POST['Name'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

	
    // Check if the selected product is the unwanted "default" option
    if ($productname == 4) {
        echo "Error: Please select a valid product option.";
    } else {
        // Create a new mysqli connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		
		// Prepare and bind the statement
		$stmt = $conn->prepare("INSERT INTO ratings (ProductID, Name, rating, feedback) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("isis", $productname, $name, $rating, $feedback);


        if ($stmt->execute()) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>


<script>
    // Redirect the user back to insertform.php
    setTimeout(function () {
        window.location.href = "insertform.php";
    }, 500
			  ); // Redirect after 3 seconds (adjust as needed)
</script>
