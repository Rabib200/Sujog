<?php 

    session_start();

    include 'connectDB/config.php';


    if (!isset($_SESSION['admin_id'])) {
        header('location: login.php'); 
    }

    $sql = "SELECT * FROM  users";

    $result = mysqli_query($conn, $sql); 

    // get the result in an array

    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC); 
    
    $sql3 = "SELECT * FROM post INNER JOIN users ON users.id = post.id";

    $result3 = mysqli_query($conn, $sql3);

    $arr3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

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
        <title>Yotunities</title>
        <link rel="stylesheet" href="searchHistory.css">
        <link rel="shortcut icon" href="icons/opportunity.png" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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
                    <li> <h4 class="t-white"> <a href="admin.php"> Admin Panel </a></h4></li>
                    <li> <h6 class="t-white"> <a href="admin.php"> Back </a></h6></li>
                    <li> <h6 class="t-red"> <a href="logout.php">Log out</a></h6></li>
                </ul>
            </nav>
        </header>
        </div>

        <div class="container-fluid post-margin bg-header">
            <div class="row">
                <div class="col-md-12 mt-4 mb-0">
                    <h1 class="text-left t-blue mb-4 ">Search History</h1>
                </div>
        </div>
        </div>

        <div>

            <div class="container-fluid ">
                <div class="row ">
                    <div class="col-md-5 ">
                        <div class="title_color">
                            <h4 class="t-orange"><br>Users</h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="t-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arr as $row) { ?>
                                <tr class="t-white">
                                    <th scope="row" class="t-white"><?php echo $row['id']; ?></th>
                                    <td class="t-white"><?php echo $row['name']; ?></td>
                                    <td class="t-white"><?php echo $row['email']; ?></td>
                                    <td class="t-white"><?php echo md5($row['pass']) ?></td>
                                    <td class="t-white"><?php echo $row['points']; ?></td>

                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid ">
                <div class="row ">
                    <div class="col-md-5 ">
                        <div class="title_color">
                            <h4 class="t-orange"><br>User's post</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="t-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Official Link</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($arr3 as $row) { ?>
                                <tr class="t-white">
                                    <th scope="row" class="t-white"><?php echo $row['id']; ?></th>
                                    <td class="t-white"><?php echo $row['name']; ?></td>
                                    <td class="t-white"><?php echo $row['email']; ?></td>
                                    <td class="t-white"><?php echo $row['title']; ?></td>
                                    <td class="t-white"><?php echo $row['type']; ?></td>
                                    <td class="t-white"><?php echo $row['location']; ?></td>
                                    <td class="t-white"><a href="<?php echo $row['appliedLink']; ?>" class="btn btn-primary">Official Link</a></td>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>

    <!-- footer -->
    <?php include 'footer.php'; ?>



    </body>
</html>