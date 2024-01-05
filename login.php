<?php

include('connectDB/config.php');

session_start();

error_reporting(0);

// if(isset($_SESSION['user_id'])){
//     header('location: index.php');
// }

if (isset($_POST['signup'])) {
  $full_name = mysqli_real_escape_string($conn, $_POST['signup_full_name']);
  $email = mysqli_real_escape_string($conn, $_POST['signup_email']);
  $password = mysqli_real_escape_string($conn, $_POST['signup_password']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['signup_cpassword']);

  // check if email already exists
  $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));

  if ($password !== $cpassword) {
    echo '<script>alert("Passwords did not match!")</script>';
  } elseif ($check_email > 0) {
    echo '<script>alert("Email already exists!")</script>';
  } else {
    $sql = "INSERT INTO users (name, email, pass)
        VALUES ('$full_name', '$email', '$password')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $_POST['signup_full_name'] = '';
      $_POST['signup_email'] = '';
      $_POST['signup_password'] = '';
      $_POST['signup_cpassword'] = '';
      echo '<script>alert("Signup successful!")</script>';
    } else {
      echo '<script>alert("Signup failed!")</script>';
    }
  }
}


if (isset($_POST['signin'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $check_admin = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin WHERE admin_name = '$email' AND admin_pass = '$password'"));
  $check_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pass = '$password'"));

  if ($check_admin > 0) {
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE admin_name = '$email' AND admin_pass = '$password'"));
    $_SESSION['admin_id'] = $row['admin_id'];
    $_SESSION['admin_name'] = $row['admin_name'];
    header('location: admin.php');
  } elseif ($check_user > 0) {
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pass = '$password'"));

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_email'] = $row['email'];
    header('location: main.php');
  } else {
    echo '<script>alert("Invalid login details!")</script>';
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css" />
    <title>Sujog</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" method="POST" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Email" name="email" value="" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" value="" />
                    </div>
                    <input type="submit" value="Login" name="signin" class="btn solid" />
                    <p class="social-text"></p>
                </form>
                <form action="" class="sign-up-form" method="POST">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Full Name" name="signup_full_name" value="" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="signup_email" value="" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="signup_password" value="" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" name="signup_cpassword" value=""
                            required />
                    </div>
                    <input type="submit" class="btn" name="signup" value="Sign up" />
                    <p class="social-text"></p>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Sujog is a free platform that helps you to find the best opportunities for you.
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                <img src="images/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        The most reliable source for young people to obtain the
                        latest opportunities for free and access essential educational materials for ongoing
                        self-development.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                <img src="images/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>

</html>