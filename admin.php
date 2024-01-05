<?php
session_start();
// connect the datbase
include('connectDB/config.php');

if (isset($_POST["delete"])) {
    header('location: delete.php');
}

if (isset($_POST["approved"])) {
    header('location: approve.php');
}

// For Pedding Post

$sqll = "SELECT * from post WHERE approveByAdmin = 0 ORDER by post_id ASC ";

$resultt = mysqli_query($conn, $sqll);

$arr = mysqli_fetch_all($resultt, MYSQLI_ASSOC);

$sql = "SELECT COUNT(post_id) from post WHERE approveByAdmin = 0";

$result = mysqli_query($conn, $sql);

$count = mysqli_fetch_array($result)[0];

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sujog</title>
    <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" media="screen" href="particles/demo/css/style.css">
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
                        <h5 class="t-white">Admin Panel</h5>
                    </li>
                    <li><a href="">Activities</a>
                        <ul>
                            <li><a href="searchHistory.php">Search History</a></li>
                            <li><a href="candidates.php">Candidates</a></li>
                            <li><a href="statistics.php">Statistics</a></li>
                            <li><a href="adminUser.php">User</a></li>
                        </ul>
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </nav>
        </header>


        <div class="content">
            <div class="text">
                <p><span>Sujog, </span>Where one can find there Dream and get chance to fulfill it..</p>
                <a href="admin.php" class=" btn">Explore !</a>
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
    </div>

    <div class="wave">
        <img src="images/wave.svg" alt="">
    </div>
    </div>





    <!-- adding approching deadline with card-->
    <!-- start slider -->
    <div class="margin-slider">
        <!-- deadline approaching post with slider -->
        <div class="container-fluid post-margin bg-header">
            <div class="row">
                <div class="col-md-12 mt-4 mb-0">
                    <h1 class="text-left t-blue mb-4 ">Pending<?php echo " (" . $count . ")"; ?></h1>
                    <p class="text-left t-blue mb-5 "></p>
                </div>
            </div>
        </div>

        <div>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slider">
                            <div class="slide">
                                <div class="row">
                                    <?php
                                    if ($arr == null) {
                                        echo "No data found";
                                    } else {
                                        foreach ($arr as $arrData) { ?>
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
                                                                <div class="modal-body">
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

                                                                </div>

                                                                <form action="" method="POST">
                                                                    <div class="modal-footer">
                                                                        <?php
                                                                                $post_id = $arrData['post_id'];
                                                                                $_SESSION['post_id'] = $post_id;
                                                                                ?>

                                                                        <?php if ($arrData['approveByAdmin'] == 0) { ?>

                                                                            <input type="submit" value="Approve"
                                                                                name="approved"
                                                                                class="btn solid button-color"
                                                                                data-bs-target="#myModal<?php echo $arrData['post_id'] ?>" />
                                                                        
                                                                                <?php } ?>

                                                                        <input type="submit" value="Delete"
                                                                            name="delete" class="btn solid button-color"
                                                                            data-bs-target="#myModal<?php echo $arrData['post_id'] ?>" />
                                                                        <!-- back button -->
                                                                        <button type="button"
                                                                            class="btn solid button-color"
                                                                            data-bs-dismiss="modal">Back</button>

                                                                    </div>
                                                                </form>



                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
                                    }
                                    ?>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php include 'footer.php'; ?>

</body>

</html>