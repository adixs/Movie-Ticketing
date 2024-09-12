<?php
// Include database connection file
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoy_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $image = $_POST['image'];
    $rating = $_POST['rating'];
    $release_date = $_POST['release_date'];
    $description = $_POST['description'];
    $available_seats = $_POST['available_seats'];
    $mvtle = $_POST['mvtle'];

    // Insert movie into the database
    $sql = "INSERT INTO movies (title, image, rating, release_date, description, available_seats, mvtle)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $title, $image, $rating, $release_date, $description, $available_seats, $mvtle);
    
    if ($stmt->execute()) {
        echo "Movie added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!-- HTML form for adding movies -->
<h2>Add New Movie</h2>
<form method="POST" action="">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="image">Image URL:</label>
    <input type="text" id="image" name="image" required><br><br>

    <label for="rating">Rating:</label>
    <input type="text" id="rating" name="rating" required><br><br>

    <label for="release_date">Release Date:</label>
    <input type="date" id="release_date" name="release_date" required><br><br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea><br><br>

    <label for="available_seats">Available Seats:</label>
    <input type="number" id="available_seats" name="available_seats" min="1" required><br><br>

    <label for="mvtle">Trailer URL:</label>
    <input type="text" id="mvtle" name="mvtle" required><br><br>

    <button type="submit">Add Movie</button>
</form>
