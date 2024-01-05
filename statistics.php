<?php

session_start();

include 'connectDB/config.php';


if (!isset($_SESSION['admin_id'])) {
    header('location: login.php');
}

$sql = "SELECT COUNT(id) from users";

$result = mysqli_query($conn, $sql);

$count = mysqli_fetch_array($result)[0];

$sql1 = "SELECT COUNT(post_id) FROM post";

$result1 = mysqli_query($conn, $sql1);

$count1 = mysqli_fetch_array($result1)[0];

$sql = "SELECT COUNT(post_id) from post WHERE approveByAdmin = 0";

$result2 = mysqli_query($conn, $sql);

$count2 = mysqli_fetch_array($result2)[0];


$sql = "SELECT COUNT(post_id) from post WHERE approveByAdmin = 1";

$result3 = mysqli_query($conn, $sql);

$count3 = mysqli_fetch_array($result3)[0];







?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sujog</title>
    <link rel="stylesheet" href="searchHistory.css">
    <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <!-- navbar-->
    <div class="wrapper">
        <header>
            <div class="logo">
                <a href="index.html"><img src="icons/opportunity.png" alt=""></a>
            </div>
            <nav class="nav-margin">
                <ul>
                    <li>
                        <h4 class="t-white"> <a href="admin.php"> Admin Panel </a></h4>
                    </li>
                    <li>
                        <h6 class="t-white"> <a href="admin.php"> Back </a></h6>
                    </li>
                    <li>
                        <h6 class="t-red"> <a href="logout.php">Log out</a></h6>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="container-fluid post-margin bg-header">
        <div class="row">
            <div class="col-md-12 mt-4 mb-0">
                <h1 class="text-left t-blue mb-4 ">Statistics</h1>
            </div>
        </div>
    </div>

    <!-- Now make a box Inside the box make A headline a in the top right corner and make 
            value in the bottom left First box name will be
            1. Users
            2. Posts
            3. Pending Posts
            4. Approved Posts
            5. Apply by form
            6. Apply by CV
            lAST BOX WILL BE A GRAPH
        -->


    <div class="container-fluid post-margin bg-header ">
        <div class="row justify-content-center ">
            <div class="col-md-5 mt-5 mb-0">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text"><?php echo " (" . $count . ")"; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mt-5 mb-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title>">Posts</h5>
                        <p class="card-text"><?php echo " (" . $count1 . ")"; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mt-5 mb-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pending Posts</h5>
                        <p class="card-text"><?php echo " (" . $count2 . ")"; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mt-5 mb-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Approved Posts</h5>
                        <p class="card-text"><?php echo " (" . $count3 . ")"; ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mt-5 mb-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Apply by form</h5>
                        <p class="card-text">0</p>
                    </div>
                </div>
            </div>

            <div class="col-md-5 mt-5 mb-10">
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title">Apply by CV</h5>
                        <p class="card-text">0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <!-- <?php include 'footer.php'; ?> -->

</body>

</html>