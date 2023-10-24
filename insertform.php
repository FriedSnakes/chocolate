<?php include("topbit.php"); ?> <!-- Include a PHP file named "topbit.php" at the beginning of this script -->

<!DOCTYPE html>
<html>
<head>
    <title>Submit Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Link to an external CSS file for styling -->
</head>
<body>
    <title>Submit form</title> <!-- Note: Duplicate "title" tag, consider removing -->
    <div class="header">
        
    </div>
    <div class="container">
		<h1>Submit Feedback</h1>
        <form action="submit.php" method="post"> <!-- Create an HTML form that will submit data to "submit.php" using the POST method -->

            <label for="ProductID">Product:</label> <!-- Label for the product selection dropdown -->

            <select id="ProductID" name="ProductID" required> <!-- Dropdown menu for selecting a product -->
                <option value='4'>Please select an option</option>
                <option value='1'>Cherry</option>
                <option value='2'>Raspberry</option>
                <option value='3'>Grape</option>
            </select><br><br>

            <label for="Name">Name:</label> <!-- Label for the name input field -->
            <input type="text" id="Name" name="Name" required><br><br> <!-- Input field for entering the name -->

            <label for="rating">Rating:</label> <!-- Label for the rating selection -->
            <div class="rating"> <!-- A group of radio buttons for rating -->
                <input type="radio" name="rating" id="star1" value="5" /><label for="star1"></label>
                <input type="radio" name="rating" id="star2" value="4" /><label for="star2"></label>
                <input type= "radio" name="rating" id="star3" value="3" /><label for="star3"></label>
                <input type="radio" name="rating" id="star4" value="2" /><label for="star4"></label>
                <input type="radio" name="rating" id="star5" value="1" /><label for="star5"></label>
            </div>

            <label for="feedback">Feedback:</label><br> <!-- Label for the feedback input area -->
            <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br> <!-- Textarea for entering feedback comments -->

            <div id="charCount">Character count: 0</div> <!-- A div to display character count -->

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var userInput = document.getElementById('feedback'); // Get the feedback textarea
                    var charCount = document.getElementById('charCount'); // Get the character count div

                    userInput.addEventListener('input', function() { // Add an event listener to track input changes
                        var count = userInput.value.length; // Get the length of the input
                        charCount.textContent = 'Character count: ' + count + ' / 50'; // Update character count display
                    });
                });
            </script>

            <input type="submit" value="Submit"> <!-- Submit button for the form -->
        </form>
    </div>
</body>
</html>
