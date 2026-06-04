<?php
session_start();
include 'includes/db.php';

$id = $_SESSION['user_id'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn,
    "UPDATE users SET name='$name', email='$email' WHERE id='$id'");

    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">

    <div class="col-md-5 auth-card">

        <h2 class="text-center mb-4">Edit Profile</h2>

        <form method="POST">

            <input type="text" name="name"
                   value="<?php echo $user['name']; ?>"
                   class="form-control mb-3">

            <input type="email" name="email"
                   value="<?php echo $user['email']; ?>"
                   class="form-control mb-3">

            <button type="submit" name="update"
                    class="btn btn-custom w-100">
                Update
            </button>

        </form>

    </div>
</div>

</body>
</html>