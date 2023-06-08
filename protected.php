<?php
session_start();

// Database credentials
$dbHost = 'localhost';
$dbUser = 'project';
$dbPass = 'project';
$dbName = 'project';

// Connect to the database
$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process sign-up form submission
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')";
    mysqli_query($conn, $sql);
}

// Process login form submission
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the user record from the database
    $sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // Verify the password
    if ($user && password_verify($password, $user['password'])) {
        // Login successful, create a session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: project.php'); // Redirect to the dashboard page
        exit();
    } else {
        // Invalid login credentials
        $loginError = "Invalid username/email or password";
    }
}

// Process logout request
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: protected.php'); // Redirect to the login page
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <style>
        /* CSS styles here */

body {
    font-family: Arial, sans-serif;
    margin: 20px;
    text-align: center;
}

h1 {
    font-weight: bold;
}

h2 {
    font-weight: bold;
    margin-top: 40px;
}

p {
    margin-top: 20px;
}

form {
    margin-top: 20px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    padding: 10px;
    width: 300px;
    margin-bottom: 10px;
}

input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #3498db;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

a {
    color: #3498db;
    text-decoration: none;
    margin-top: 10px;
    display: inline-block;
    transition: color 0.3s;
}

a:hover {
    color: #2980b9;
}

    </style>
</head>
<body>
    <h1>Task Manager</h1>

    <?php if (isset($_SESSION['user_id'])) { ?>
        <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
        <a href="?logout">Logout</a>
    <?php } else { ?>
        <h2>Login</h2>
        <?php if (isset($loginError)) { ?>
            <p><?php echo $loginError; ?></p>
        <?php } ?>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username/Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="login" value="Login">
        </form>

        <h2>Sign up</h2>
        <form action="" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" name="signup" value="Sign up">
        </form>
    <?php } ?>
</body>
</html>
