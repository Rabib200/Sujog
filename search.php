<?php


include('connectDB/config.php');

session_start();

error_reporting(0);

if (isset($_POST['explore'])) {

    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO search(type,location,user_id,admin_id) VALUES ('$type', '$location', '$user_id', '1')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_POST['type'] = "";
        $_POST['location'] = "";
        echo "<script>window.location.href='filterSerchResult.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" media="screen" href="particles/demo/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Search Opportunity</title>
</head>

<body>
    <!-- create a background blur search form with dropdown  -->

    <div class="wrapper">
        <div class="">
            <form action="" class="d-flex" method="POST">
                <div class="input-field">
                    <i class="fas fa-filter"></i>
                    <select name="type" id="filter">
                        <option value="Any Opportunity">Any Opportunity</option>
                        <option value="Internships">Internships</option>
                        <option value="Scholarships">Scholarships</option>
                        <option value="Competitions">Competitions</option>
                        <option value="Jobs">Jobs</option>
                        <option value="Workshops">Workshops</option>
                        <option value="Fellowships">Fellowships</option>
                        <option value="Miscellaneos">Miscellaneos</option>
                    </select>
                </div>
                <div class="input-field">
                    <h3></h3>
                </div>
                <div class="">
                    <i class="fas fa-filter"></i>
                    <select name="location" id="filter">
                        <option value="Dhaka">Dhaka</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Chattogram">Chattogram</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Rajshahi">Rajshahi</option>
                    </select>
                </div>
                <input type="submit" value="Explore" class="btn solid button-color" name="explore" />
            </form>
        </div>
    </div>

    <!-- create a back button for-->

    <div class="back">
        <a href="main.php" class="btn solid button-color2">Back</a>
    </div>
</body>

</html>