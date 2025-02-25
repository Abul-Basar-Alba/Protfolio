<?php
// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Set charset to UTF-8
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $e) {
    // Log the error
    error_log("Database connection failed: " . $e->getMessage());

    // Display a user-friendly message
    die("Oops! Something went wrong. Please try again later.");
}

// Use the $conn object for database operations
// ...

// Close the connection when done
$conn->close();
?>