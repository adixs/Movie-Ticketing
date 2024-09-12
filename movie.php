<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoy_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve movie ID from URL
$movie_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch movie details from the database
$query = "SELECT * FROM movies WHERE id = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("i", $movie_id);
$stmt->execute();
$result = $stmt->get_result();
$movie = $result->fetch_assoc();

if (!$movie) {
    echo "Movie not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($movie['title']); ?> - SAVOY</title>
    <link rel="stylesheet" href="css/movies.css">
    <link rel="stylesheet" href="css/movies02.css">
</head>
<body>

<header class="main-header">
    <div class="container">
        <div class="logo">
            <a href="/">
                <span class="SAV">SAV</span>
                <span class="best">OY</span>
            </a>
        </div>
        <nav>
            <ul>
                <li><a class="nav-link" href="index.php">MOVIES</a></li>
                <li><a class="nav-link" href="contact.php">CONTACT</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Movie Details Section -->
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="<?php echo htmlspecialchars($movie['image']); ?>" width="100%" id="ProductImg" alt="<?php echo htmlspecialchars($movie['title']); ?>" />
        </div>

        <div class="col-2">
            <center><h2><?php echo htmlspecialchars($movie['title']); ?></h2></center>
            <br>
            <h4><?php echo htmlspecialchars($movie['rating']); ?> / 10</h4>
            <h3>Release Date: <?php echo htmlspecialchars($movie['release_date']); ?><i class="fa fa-indent"></i></h3>
            <br />
            <p><?php echo htmlspecialchars($movie['description']); ?></p>
            <p>Rs<?php echo htmlspecialchars($movie['price']); ?></p>
            <div class="class">
            <a href="booking.php?id=<?php echo urlencode($movie['id']); ?>&price=<?php echo urlencode($movie['price']); ?>" class="button">Book Now</a>

                <a href="<?php echo $movie['mvtle']; ?>" class="button">Watch Trailer</a>

            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php $connection->close(); ?>
