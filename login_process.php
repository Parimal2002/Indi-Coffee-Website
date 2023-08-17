<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection details
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password (for example, using password_hash)
    // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the user exists in the database
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User is authenticated
        // You can set session variables or perform other actions here
        echo "Login successful!";
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }

    // Close the database connection
    $conn->close();
}
?>
