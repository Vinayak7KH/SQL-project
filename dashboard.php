<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

echo "<h2>Welcome to the Dashboard</h2>";

if ($_SESSION['role'] == 'admin') {
    echo "<a href='manage_courses.php'>Manage Courses</a><br>";
} elseif ($_SESSION['role'] == 'teacher') {
    echo "<a href='create_course.php'>Create Course</a><br>";
}

echo "<a href='view_courses.php'>View Courses</a><br>";
echo "<a href='logout.php'>Logout</a>";
?>
