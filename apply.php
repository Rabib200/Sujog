<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}
// connect the datbase
include('connectDB/config.php');

?>






<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sujog</title>
    <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>


<body>


    <div class="wrapper">
        <header>
            <div class="logo">
                <a href="#"><img src="icons/opportunity.png" alt=""></a>
            </div>
            <nav class="nav-margin">
                <ul>
                    <li>
                        <div class="container">
                            <form action="" method="post">
                                <input class="search-style" type="text" placeholder="Search... " id="search" name="search">
                                <!-- <input type="text" placeholder="Search..." id="search" name="search">s -->
                                <button class="btn-style" type="submit" name="submitt"> <img class="search" src="icons/search.png" alt=""> </button>
                            </form>
                        </div>
                    </li>
                    <li><a href="main.php">Browse Opportunities</a>
                        <ul>
                            <li><a href="browse/nearDeadline.php">Near Deadline</a></li>
                            <li><a href="browse/competitions.php">Compettions</a></li>
                            <li><a href="browse/scholarships.php">Scholarships</a></li>
                            <li><a href="browse/fellowships.php">Fellowships</a></li>
                            <li><a href="browse/internships.php">Internships</a></li>
                            <li><a href="browse/workshops.php">Workshops</a></li>
                            <li><a href="browse/job.php">Jobs</a></li>
                            <li><a href="browse/miscellaneos.php">Miscellaneos</a></li>
                        </ul>
                    </li>
                    <li><a href="post.php">Post an Opportunity</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a class="logout.php" href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>

        <div class="content">
            <div class="text">
                <p>Do you have CV?</p>
                <a href="applyThroughCV.php" class=" btn">Apply!</a>
            </div>

            <div class="text">
                <p>Don't have CV?</p>
                <a href="CV-G/index.php" class=" btn">Generate!</a>
            </div>
        </div>
    </div>













    <div class="wave">
        <img src="images/wave.svg" alt="">
    </div>

    </div>
    <!-- footer -->
    <?php include 'footer.php'; ?>

</body>

</html>