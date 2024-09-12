<?php
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

$movie = null;
$message = "";  // Variable to hold any success or error messages

if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];
    $price = $_GET['price'];

    // Prepare and execute SQL query to get movie details
    $sql = "SELECT * FROM movies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $movie_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $movie = $result->fetch_assoc();

    // Check if the movie exists
    if ($movie) {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $seats = $_POST['seats'];
            $total_price = $seats * $price; // Calculate total price

            // Validate available seats
            if ($seats <= $movie['available_seats']) {
                // Insert booking into the database
                $sql = "INSERT INTO bookings (movie_id, name, seats, total) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isid", $movie_id, $name, $seats, $total_price);
                if ($stmt->execute()) {
                    // Update the available seats
                    $new_available_seats = $movie['available_seats'] - $seats;
                    $sql = "UPDATE movies SET available_seats = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ii", $new_available_seats, $movie_id);
                    if ($stmt->execute()) {
                        $message = "Booking successful! You have booked $seats seat(s) for the movie '" . htmlspecialchars($movie['title']) . "'. Total price: $" . number_format($total_price, 2) . ".";
                    } else {
                        $message = "Error updating available seats.";
                    }
                } else {
                    $message = "Error inserting booking.";
                }
            } else {
                $message = "Not enough seats available!";
            }
        }

        $stmt->close();
    } else {
        $message = "Movie not found.";
    }
} else {
    $message = "Movie ID not provided.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking</title>
</head>
<body>

<?php if (!empty($message)) { ?>
    <p><?php echo $message; ?></p>
    <?php unset($message); ?>
<?php } ?>

<!-- Booking Form -->
<?php if (isset($movie)) { ?>
    <img src="<?php echo htmlspecialchars($movie['image']); ?>" alt="Movie Image">
    <h2>Book Tickets for <?php echo htmlspecialchars($movie['title']); ?></h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id=" . $movie_id . "&price=" . $price; ?>">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="seats">Number of Seats:</label>
        <input type="number" id="seats" name="seats" min="1" max="<?php echo htmlspecialchars($movie['available_seats']); ?>" required oninput="calculateTotalPrice()"><br><br>

        <input type="hidden" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>">

        <p>Total Price: $<span id="totalPrice">0.00</span></p>

        <button type="submit">Book Now</button>
    </form>
    <p>Available Seats: <?php echo htmlspecialchars($movie['available_seats']); ?></p>
<?php } ?>

<script>
function calculateTotalPrice() {
    var seats = document.getElementById('seats').value;
    var price = document.getElementById('price').value;
    var totalPrice = seats * price;
    document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
}
</script>

</body>
</html>
