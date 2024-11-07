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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $hash, $role);

    if ($stmt->fetch() && password_verify($pass, $hash)) {
        // Ensure these session variables are set
        $_SESSION['user_id'] = $id;
        $_SESSION['role'] = $role;
        
        header("Location: dashboard.php"); // Redirect to dashboard or other page
        exit();
    } else {
        echo "Invalid username or password";
    }
    $stmt->close();
}
$conn->close();
?>

