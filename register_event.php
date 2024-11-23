<?php
session_start();
include('db.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO registrations (user_id, event_id) VALUES ('$user_id', '$event_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Successfully registered for the event. <a href='payment.php'>Proceed to Payment</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
