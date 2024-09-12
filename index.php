<?php
// Connection to MySQL
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

// Fetch all movies from the database
$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAVOY</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/spinner.css">
    <link rel="stylesheet" href="css/n.css">
    <script src="js/script.js" defer></script>
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

<!-- Now Playing Section -->
<section class="now-playing">
    <br><br>
    <center><h1>Now Playing</h1></center>
    <div class="swiper">
        <div class="swiper-wrapper"></div>
    </div>
</section>

<!-- Featured Categories -->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3"><img src="./assets/images/01.jpg" alt="" /></div>
            <div class="col-3"><img src="./assets/images/02.jpg" alt="" /></div>
            <div class="col-3"><img src="./assets/images/03.jpg" alt="" /></div>
        </div>
    </div>
</div>

<!-- Search Movies -->
<section class="search">
    <div class="container">
        <div id="alert"></div>
        <form action="search.php" class="search-form">
            <div class="search-radio"></div>
            <div class="search-flex">
                <input type="text" name="search-term" id="search-term" placeholder="Enter search term" />
                <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</section>

<!-- Popular Movies -->
<section class="container">
    <h2>Popular Movies</h2>
    <div id="popular-movies" class="grid"></div>
</section>

<!-- Movies Section (Dynamic using PHP) -->
<div class="small-container">
    <div class="row">
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-4">
                    <a href="movie.php?id=<?php echo $row['id']; ?>">
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" />
                    </a>
                    <br><br>
                    <center><h4><?php echo htmlspecialchars($row['title']); ?></h4></center>
                    <div class="rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <?php if ($i <= floor($row['rating'])): ?>
                                <i class="fa fa-star"></i>
                            <?php else: ?>
                                <i class="fa fa-star-o"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No movies available.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Footer -->
<section>
    <footer class="bottom">
        <p class="copyright">© Created by 2024 / Achini Nethmini</p>
        <div class="legal"></div>
    </footer>
</section>

</body>
</html>

<?php
$conn->close();
?>
