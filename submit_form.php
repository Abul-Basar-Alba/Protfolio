<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        die("Please fill in all required fields");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Insert into database
    $sql = "INSERT INTO contacts (name, email, phone, message, created_at)
            VALUES ('$name', '$email', '$phone', '$message', NOW())";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.html#contact?success=1");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>