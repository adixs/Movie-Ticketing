<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input
    $movie_id = $_POST['movie_id'];
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $seats = intval($_POST['seats']);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO bookings (movie_id, name, email, seats) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("issi", $movie_id, $name, $email, $seats);

    if ($stmt->execute()) {
        echo "Booking confirmed!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Fetch movie details
    $movie_id = 34; // The movie ID to book
    $stmt = $conn->prepare("SELECT * FROM movies WHERE id = ?");
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $movie = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Ticket</title>
</head>
<body>
    <h1>Book Ticket for <?php echo htmlspecialchars($movie['title']); ?></h1>
    <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt="Movie Image" style="width:200px;height:auto;">
    <p>Rating: <?php echo htmlspecialchars($movie['rating']); ?></p>
    <p>Release Date: <?php echo htmlspecialchars($movie['release_date']); ?></p>
    <p><?php echo htmlspecialchars($movie['description']); ?></p>

    <form method="post" action="">
        <input type="hidden" name="movie_id" value="<?php echo $movie['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="seats">Number of Seats:</label>
        <input type="number" id="seats" name="seats" min="1" required><br><br>
        <input type="submit" value="Book Now">
    </form>
    <a href="index.php">Back to Movies</a>
</body>
</html>
s