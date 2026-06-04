<?php
session_start();
include 'includes/db.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $image = $_FILES['profile_pic']['name'];
    $tmp_name = $_FILES['profile_pic']['tmp_name'];

    $folder = 'assets/uploads/' . $image;

    move_uploaded_file($tmp_name, $folder);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        echo "<script>alert('Email already exists')</script>";
    } else {
        $query = "INSERT INTO users(name, email, password, profile_pic)
                  VALUES('$name','$email','$password','$image')";

        if (mysqli_query($conn, $query)) {
            header('Location: login.php');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-5 auth-card">

        <h2 class="text-center mb-4">Create Account</h2>

        <form method="POST" enctype="multipart/form-data">

            <input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>

            <input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <input type="file" name="profile_pic" class="form-control mb-3" required>

            <button type="submit" name="register" class="btn btn-custom w-100">
                Register
            </button>

        </form>

        <p class="mt-3 text-center">
            Already have an account?
            <a href="login.php">Login</a>
        </p>

    </div>
</div>

</body>
</html>