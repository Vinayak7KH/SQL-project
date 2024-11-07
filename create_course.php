<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in and has the 'role' session variable
// if (!isset($_SESSION['role']) || $_SESSION['role'] != 'teacher') {
//     echo "Access Denied!";
//     exit();
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    // $created_by = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO courses (title, description, created_by) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $description, $created_by);

    if ($stmt->execute()) {
        echo "Course created successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>