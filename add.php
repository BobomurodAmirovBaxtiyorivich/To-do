<?php
require 'Database.php';
date_default_timezone_set('Asia/Tashkent');
try {
    $db = new Database();
    $title = $_POST['title'] ?? ''; // Handle missing POST data
    $status = $_POST['status'] ?? '';

    // Create DateTime object from the current date and time
    $crDate = new DateTime();

    if ($db->store($title, $status, $crDate)) {
        header('Location: index.php');
        exit; // Crucial: Exit after header redirect
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}// Log or display database connection errors

//header('Location: index.php');