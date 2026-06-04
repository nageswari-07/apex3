<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

$id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");

$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container py-5">

    <div class="dashboard-card text-center">
        <img src="assets/uploads/<?php echo $user['profile_pic']; ?>"
             class="profile-img mb-3">

        <h2><?php echo $user['name']; ?></h2>

        <p><?php echo $user['email']; ?></p>

        <div class="mt-4">
            <a href="edit.php" class="btn btn-warning">Edit</a>

            <a href="delete.php" class="btn btn-danger"
               onclick="return confirm('Delete account?')">
                Delete
            </a>

            <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>

    </div>

</div>

</body>
</html>
