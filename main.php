<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
}
// connect the datbase
include('connectDB/config.php');

if (isset($_POST['submitt'])) {
    $searc = mysqli_real_escape_string($conn, $_POST['search']);
    echo '<script>alert("' . $search . '")</script>';
    $user_id = $_SESSION['user_id'];
    // $_SESSION['search'] = $search;
    $sql2 = "INSERT INTO searchbar (value,id,admin_id) VALUE ('$searc','$user_id','1')";
    $result2 = mysqli_query($conn, $sql2);
    header('location: result.php');
}


$sql = "SELECT * from post ORDER by post_id DESC LIMIT 0,6";

$result = mysqli_query($conn, $sql); // get the result set (set of rows)

$arr = mysqli_fetch_all($result, MYSQLI_ASSOC); // fetch the resulting rows as an array

$sqll = "SELECT * from post ORDER by eDate LIMIT 0,6";

$resultt = mysqli_query($conn, $sqll); // get the result set (set of rows)

$arrr = mysqli_fetch_all($resultt, MYSQLI_ASSOC); // fetch the resulting rows as an array

if(isset($_POST['apply'])){
    // go to apply.php
    header('location: apply.php');
}


?>






<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sujog</title>
    <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
    <link rel="stylesheet" href="main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
                                <input class="search-style" type="text" placeholder="Search... " id="search"
                                    name="search">
                                <!-- <input type="text" placeholder="Search..." id="search" name="search">s -->
                                <button class="btn-style" type="submit" name="submitt"> <img class="search"
                                        src="icons/search.png" alt=""> </button>
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
                <p><span>Sujog, </span>Where one can find there Dream and get chance to fulfill it..</p>
                <a href="search.php" class=" btn">Explore !</a>
            </div>
            <div class="img">
                <div class="social-icons">
                    <img src="images/social-icon1.png" alt="">
                    <img src="images/social-icon2.png" alt="">
                    <img src="images/social-icon3.png" alt="">
                    <img src="images/social-icon4.png" alt="">
                    <img src="images/social-icon5.png" alt="">
                </div>
                <img class="email-icon" src="images/star.png" alt="">
            </div>
        </div>

        <div class="wave">
            <img src="images/wave.svg" alt="">
        </div>

    </div>


    <!-- adding approching deadline with card-->
    <!-- start slider -->
    <div class="margin-slider">
        <!-- deadline approaching post with slider -->
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-5 ">
                    <div class="title_color">
                        <h3 class="t-name">LATEST</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card with background image -->
        <div>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slider">
                            <div class="slide">
                                <div class="row">

                                    <?php foreach ($arr as $arrData) { ?>
                                    <?php if ($arrData['approveByAdmin'] == 1) { ?>
                                    <div class="col-md-4">
                                        <div class="card card-color">
                                            <img class="card-img-top" width="240" height="180"
                                                src="<?php echo $arrData['featuredImage'] ?>" alt="Card image cap">
                                            <div class="card-body text-dark">
                                                <h5 class='card-title text-truncate'>
                                                    <b><?php echo htmlspecialchars($arrData['title']); ?></b></h6>
                                                    <p class="card-text text-truncate">
                                                        <?php echo htmlspecialchars($arrData['description']); ?></p>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn button-color"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#myModal<?php echo $arrData['post_id'] ?>">More
                                                        Info</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade modal-background"
                                                        id="myModal<?php echo $arrData['post_id'] ?>"
                                                        data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class='card-title'>
                                                                        <b><?php echo htmlspecialchars($arrData['title']); ?></b>
                                                                        </h6>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-dark">
                                                                    <div>
                                                                        <img class="card-img-top"
                                                                            src="<?php echo $arrData['featuredImage'] ?>"
                                                                            alt="">
                                                                    </div>
                                                                    <p><b>Description:
                                                                            <br></b><?php echo htmlspecialchars($arrData['description']); ?>
                                                                    </p>
                                                                    <p><b>Eligibilities:
                                                                            <br></b><?php echo htmlspecialchars($arrData['eligibilities']); ?>
                                                                    </p>
                                                                    <p><b>Benefits:<br>
                                                                        </b><?php echo htmlspecialchars($arrData['benefits']); ?>
                                                                    </p>
                                                                    <p><b>Funding Type:
                                                                        </b><?php echo htmlspecialchars($arrData['fundingType']); ?>
                                                                    </p>

                                                                    <p><b>Official Website: </b> <a
                                                                            href="<?php echo htmlspecialchars($arrData['appliedLink']); ?>"><?php echo htmlspecialchars($arrData['appliedLink']); ?></a>
                                                                    </p>
                                                                    <p><b>Location: </b>
                                                                        <?php echo htmlspecialchars($arrData['location']); ?>
                                                                    </p>
                                                                    <p><b></b>The program is a
                                                                        <?php echo htmlspecialchars($arrData['tags']); ?>
                                                                        program. </p>
                                                                    <!-- get the organizer mail and store it into session -->

                                                                </div>


                                                                <form action="" method="POST">
                                                                    <div class="modal-footer">

                                                                        <?php
                                                                                $organizerMail = $arrData['organizerMail'];
                                                                                $_SESSION['organizerMail'] = $organizerMail;
                                                                                ?>
                                                                        <input type="submit" value="Apply Now"
                                                                            name="apply" class="btn solid button-color"
                                                                            data-bs-target="#myModal<?php echo $arrData['post_id'] ?>" />
                                                                        <button type="button"
                                                                            class="btn solid button-color"
                                                                            data-bs-dismiss="modal">Close</button>

                                                                    </div>
                                                                </form>

                                                            </div>

                                                        </div>

                                                    </div>

                                            </div>

                                        </div>

                                    </div>
                                    <?php } ?>
                                    <?php } ?>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- latest post with slider -->
    <div>
        <div class="container-fluid page-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="title_color">
                        <!-- line style="border: 1px solid-->

                        <h3 class="t-name">DEADLINE APPROACHING</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider">
                        <div class="slide">
                            <div class="row">

                                <?php foreach ($arrr as $arrData) { ?>
                                <?php if ($arrData['approveByAdmin'] == 1) { ?>
                                <div class="col-md-4">
                                    <div class="card card-color">
                                        <img class="card-img-top" width="240" height="180"
                                            src="<?php echo $arrData['featuredImage'] ?>" alt="Card image cap">
                                        <div class="card-body text-dark">
                                            <h5 class='card-title text-truncate'>
                                                <b><?php echo htmlspecialchars($arrData['title']); ?></b></h6>
                                                <p class="card-text text-truncate">
                                                    <?php echo htmlspecialchars($arrData['description']); ?></p>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn button-color" data-bs-toggle="modal"
                                                    data-bs-target="#myModal<?php echo $arrData['post_id'] ?>">More
                                                    Info</button>
                                                <!-- Modal -->
                                                <div class="modal fade modal-background"
                                                    id="myModal<?php echo $arrData['post_id'] ?>"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class='card-title'>
                                                                    <b><?php echo htmlspecialchars($arrData['title']); ?></b>
                                                                    </h6>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-dark">
                                                                <div>
                                                                    <img class="card-img-top"
                                                                        src="<?php echo $arrData['featuredImage'] ?>"
                                                                        alt="">
                                                                </div>
                                                                <p><b>Description:
                                                                        <br></b><?php echo htmlspecialchars($arrData['description']); ?>
                                                                </p>
                                                                <p><b>Eligibilities:
                                                                        <br></b><?php echo htmlspecialchars($arrData['eligibilities']); ?>
                                                                </p>
                                                                <p><b>Benefits:<br>
                                                                    </b><?php echo htmlspecialchars($arrData['benefits']); ?>
                                                                </p>
                                                                <p><b>Funding Type:
                                                                    </b><?php echo htmlspecialchars($arrData['fundingType']); ?>
                                                                </p>

                                                                <p><b>Official Website: </b> <a
                                                                        href="<?php echo htmlspecialchars($arrData['appliedLink']); ?>"><?php echo htmlspecialchars($arrData['appliedLink']); ?></a>
                                                                </p>
                                                                <p><b>Location: </b>
                                                                    <?php echo htmlspecialchars($arrData['location']); ?>
                                                                </p>
                                                                <p><b></b>The program is a
                                                                    <?php echo htmlspecialchars($arrData['tags']); ?>
                                                                    program. </p>
                                                                <!-- get the organizer mail and store it into session -->

                                                            </div>


                                                            <form action="" method="POST">
                                                                <div class="modal-footer">

                                                                    <?php
                                                                            $organizerMail = $arrData['organizerMail'];
                                                                            $_SESSION['organizerMail'] = $organizerMail;
                                                                            ?>
                                                                    <input type="submit" value="Apply Now" name="apply"
                                                                        class="btn solid button-color"
                                                                        data-bs-target="#myModal<?php echo $arrData['post_id'] ?>" />
                                                                    <button type="button" class="btn solid button-color"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                </div>
                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                        </div>

                                    </div>

                                </div>
                                <?php } ?>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    </div>

    <!-- end of slideer -->
    <!-- footer -->
    <?php include 'footer.php'; ?>

</body>

</html>