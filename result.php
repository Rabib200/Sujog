<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location: login.php');
}
// connect the datbase
include('connectDB/config.php');

if (isset($_POST["apply"])) {
  header('location: pra.php');
}

$sql = "SELECT value FROM searchbar ORDER by search_id DESC LIMIT 0,1";

$result = mysqli_query($conn, $sql); // get the result set (set of rows)

$arr = mysqli_fetch_all($result, MYSQLI_ASSOC); // fetch the resulting rows as an array
// print_r($arr[0]['value']);

$sql2 = "SELECT * FROM post WHERE title LIKE '%" . $arr[0]['value'] . "%'" or "description LIKE '%" . $arr[0]['value'] . "%'";
// $sql2 = "SELECT * FROM post";

// if($arr)
$result2 = mysqli_query($conn, $sql2); // get the result set (set of rows)

$arr2 = mysqli_fetch_all($result2, MYSQLI_ASSOC); // fetch the resulting rows as an array


?>



<!DOCTYPE html>
<html lang="en">
<!-- for posted opportunity-->
<!DOCTYPE html>
<!-- Path: post.html -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sujog</title>
    <link rel="stylesheet" href="browse/brow.css">
    <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <!-- navbar-->
    <div class="wrapper">
        <header>
            <div class="logo">
                <a href="main.php"><img src="icons/opportunity.png" alt=""></a>
            </div>
            <nav>
                <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="main.php">Back</a></li>
                    <li><a href="logout.php">Log Out</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="container-fluid post-margin bg-header">
        <div class="row">
            <div class="col-md-12 mt-4 mb-0">
                <h1 class="text-left t-blue mb-4 ">Sujog</h1>
            </div>
        </div>
    </div>

    <!-- adding card all over the page -->
    <div class="m-3 mb-3">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider">
                        <div class="slide">
                            <div class="row">

                                <?php foreach ($arr2 as $arrData) { ?>
                                <div class="col-md-4">
                                    <div class="card card-color">
                                        <img class="card-img-top" width="240" height="200"
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
                                    $organizerMail = $arrData['organizerMail'];
                                    $_SESSION['organizerMail'] = $organizerMail;
                                    ?>
                                                                    <input type="submit" value="Apply Now" name="apply"
                                                                        class="btn solid button-color"
                                                                        data-bs-target="#myModal<?php echo $arrData['post_id'] ?>" />
                                                                    <!-- back button -->
                                                                    <button type="button" class="btn solid button-color"
                                                                        data-bs-dismiss="modal">Back</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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