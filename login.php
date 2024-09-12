<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "savoy_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$login_error = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Input validation
    if (empty($email) || empty($password)) {
        $login_error = "Please fill in all fields.";
    } else {
        // Check if user exists in the database
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Set session and redirect to dashboard or homepage
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['roll'] = $user['roll'];

                header("Location: index.php");
                exit();
            } else {
                $login_error = "Invalid password.";
            }
        } else {
            $login_error = "User does not exist.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="login.css" />
    <title>Web Design Mastery | Login</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login__form">
            <h1>Login</h1>

            <!-- Display Login Error -->
            <?php if (!empty($login_error)): ?>
                <p style="color: red;"><?php echo $login_error; ?></p>
                
            <?php
        $login_error = "";
         endif; ?>

            <div class="input__row">
                <span><i class="ri-user-3-line"></i></span>
                <div class="input__group">
                    <input type="text" placeholder=" " id="email" name="email" required />
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="input__row">
                <span><i class="ri-lock-2-line"></i></span>
                <div class="input__group">
                    <input id="password" type="password" placeholder=" " name="password" required />
                    <label for="password">Password</label>
                </div>
                <span id="password-eye"><i class="ri-eye-off-line"></i></span>
            </div>
            <div class="action__btns">
                <div class="remember__me">
                    <input type="checkbox" id="check" />
                    <label for="check">Remember me</label>
                </div>
                <a href="#" class="forgot__password">Forgot Password?</a>
            </div>
            <button type="submit" class="login__btn">Login</button>
            <div class="register">
                Don't have an account? <a href="register.html">Register</a>
            </div>
        </form>
    </div>

    <script src="login.js"></script>
</body>
</html>
