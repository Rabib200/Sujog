<?php 

    include '../connectDB/config.php';

    session_start();

    error_reporting(0);

    if(isset($_POST['signup'])){
      $full_name = mysqli_real_escape_string($conn, $_POST['signup_full_name']);
      $email = mysqli_real_escape_string($conn, $_POST['signup_email']);
      $password = mysqli_real_escape_string($conn, $_POST['signup_password']);
      $cpassword = mysqli_real_escape_string($conn, $_POST['signup_cpassword']);

      // check if email already exists
      $check_email = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'"));

      if($password !== $cpassword){
          echo '<script>alert("Passwords did not match!")</script>';
      }elseif($check_email > 0){
          echo '<script>alert("Email already exists!")</script>';
      }else{
        $sql = "INSERT INTO users (name, email, pass)
        VALUES ('$full_name', '$email', '$password')";
        $result = mysqli_query($conn, $sql);	
        if($result){
          $_POST['signup_full_name'] = '';
          $_POST['signup_email'] = '';
          $_POST['signup_password'] = '';
          $_POST['signup_cpassword'] = '';
          echo '<script>alert("Signup successful!")</script>';
          echo '<script>window.location.href = "../login.php"</script>';
        }else{
          echo '<script>alert("Signup failed!")</script>';
          echo '<script>window.location.href = "../login.php"</script>';
        }
    }
  }


  if(isset($_POST['signin'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    $check_admin = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin WHERE admin_name = '$email' AND admin_pass = '$password'"));
    $check_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pass = '$password'"));

    if($check_admin > 0){
      $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE admin_name = '$email' AND admin_pass = '$password'"));
      $_SESSION['admin_id'] = $row['admin_id'];
      $_SESSION['admin_name'] = $row['admin_name'];
      header('location: ../admin.php');
    }elseif($check_user > 0){
      $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND pass = '$password'"));

      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_name'] = $row['name'];
      $_SESSION['user_email'] = $row['email'];
      header('location: ../main.php');
    }else{
      echo '<script>alert("Invalid login details!")</script>';
    }


    }


?>

