
<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['role'])) {
    header("Location: index1");
    exit;
}

// Retrieve user data from session
$office = $_SESSION['role'];

?>