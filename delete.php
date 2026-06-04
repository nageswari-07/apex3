<?php
session_start();
include 'includes/db.php';

$id = $_SESSION['user_id'];

mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

session_destroy();

header('Location: register.php');
?>