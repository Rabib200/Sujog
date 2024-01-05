<?php


include('connectDB/config.php');

session_start();

error_reporting(0);
$title = $description = $process = $eligibility = $benefits = $type = $funding = $start_date = $end_date = $link = $location = $organizer = $organizerMail = $organizerPhone = $tags = $user_id = $fileName = $fileType = $fileSize = $fileTempName = $fileError = $fileExt = $fileActualExt = $allowed = $fileNameNew = $fileDestination = $sql = $result = $check_email = $row = '';

if (!isset($_SESSION['user_id'])) {
  header('location: login.php');
}

if (isset($_POST['submit'])) {

  if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['process']) || empty($_POST['eligibility']) || empty($_POST['benefits']) || empty($_POST['type']) || empty($_POST['funding'])  || empty($_POST['start_date']) || empty($_POST['end_date']) || empty($_POST['link']) || empty($_POST['location']) || empty($_POST['organizer']) || empty($_POST['organizerMail']) || empty($_POST['organizerPhone']) || empty($_POST['tags']) || empty($_FILES['file']['name'])) {
    echo '<script>alert("Please fill all the fields!")</script>';
  } else {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $process = mysqli_real_escape_string($conn, $_POST['process']);
    $eligibility = mysqli_real_escape_string($conn, $_POST['eligibility']);
    $benefits = mysqli_real_escape_string($conn, $_POST['benefits']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $funding = mysqli_real_escape_string($conn, $_POST['funding']);
    $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $organizer = mysqli_real_escape_string($conn, $_POST['organizer']);
    $organizerMail = mysqli_real_escape_string($conn, $_POST['organizerMail']);

    // if(!filter_var($organizerMail, FILTER_VALIDATE_EMAIL)){
    //   echo '<script>alert("Please enter a valid email!")</script>';
    // }
    $organizerPhone = mysqli_real_escape_string($conn, $_POST['organizerPhone']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);
    $user_id = $_SESSION['user_id'];


    // get the file name
    $fileName = $_FILES['file']['name'];
    // get the file type
    $fileType = $_FILES['file']['type'];
    // get the file size
    $fileSize = $_FILES['file']['size'];
    // get the file temp name
    $fileTempName = $_FILES['file']['tmp_name'];
    // get the file error
    $fileError = $_FILES['file']['error'];
    // get the file extension
    $fileExt = explode('.', $fileName);
    // get the file extension in lower case
    $fileActualExt = strtolower(end($fileExt));
    // get the allowed file extensions
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    // check if the file extension is allowed
    if (in_array($fileActualExt, $allowed)) {

      // check if there is no error
      if ($fileError === 0) {
        // check if the file size is less than 500000 bytes
        if ($fileSize < 5000000) {
          // create a unique id for the file
          $fileNameNew = uniqid('', true) . "." . $fileActualExt;
          // set the file destination
          $fileDestination = 'web/' . $fileNameNew;
          // move the file to the destination
          move_uploaded_file($fileTempName, $fileDestination);
          // insert the file name into the database
          // $sql = "INSERT INTO post (featuredImage) VALUES ($file)
          $sql = "INSERT INTO post (approveByAdmin, title, description, appProcess, eligibilities, benefits, type, fundingType,sDate, eDate, featuredImage,appliedLink, location, organizers, organizerPhone, organizerMail ,tags,id)
                      VALUES (0,'$title', '$description', '$process', '$eligibility', '$benefits', '$type', '$funding', '$start_date', '$end_date', '$fileDestination ', '$link', '$location', '$organizer', '$organizerPhone', '$organizerMail', '$tags', '$user_id')";
        } else {
          echo "your file is too big!";
        }
      } else {
        echo "There was an error uploading your file!";
      }
    } else {
      echo "You cannot upload files of this type!";
    }

    $result = mysqli_query($conn, $sql);

    // $_SESSION['organizerMail'] = $organizerMail;

    // echo $result;
    if ($result) {
      $_POST['title'] = "";
      $_POST['description'] = "";
      $_POST['process'] = "";
      $_POST['eligibility'] = "";
      $_POST['benefits'] = "";
      $_POST['type'] = "";
      $_POST['funding'] = "";
      $_POST['deadline'] = "";
      $_POST['start_date'] = "";
      $_POST['end_date'] = "";
      $_POST['link'] = "";
      $_POST['location'] = "";
      $_POST['organizer'] = "";
      $_POST['organizerMail'] = "";
      $_POST['organizerPhone'] = "";
      $_POST['tags'] = "";
      // $_POST['image'] = "";
      echo "<script>alert('Post added successfully!')</script>";
      echo "<script>window.location.href='post.php'</script>";
    } else {
      echo '<script>alert("Post failed!")</script>';
    }
  }
}

$sql = "SELECT * from post ORDER by post_id DESC LIMIT 0,10";

$result = mysqli_query($conn, $sql); // get the result set (set of rows)

$arr = mysqli_fetch_all($result, MYSQLI_ASSOC); // fetch the resulting rows as an array

?>



<!-- for posted opportunity-->
<!DOCTYPE html>
<!-- Path: post.html -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sujog | Post Opportunities</title>
    <link rel="stylesheet" href="post.css">
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

    <!-- main body-->

    <!-- post an opportunity title -->
    <div class="container-fluid post-margin bg-header">
        <div class="row">
            <div class="col-md-12 mt-4 mb-0">
                <h1 class="text-left t-blue mb-4 ">Post an Opportunity</h1>
            </div>
        </div>
    </div>

    <div class="d-inline-flex t-white post-margin">

        <div class="p-5 w-75">
            <!-- Post Guidline -->
            <div class="container-fluid display-flex">
                <h4>Have any opportunity that you would like to share with Youth Opportunities community? Please use
                    this form to inform us about it.
                    By submitting opportunity to us, you are agreeing to these terms. Please read them carefully.
                </h4>
                <p>
                <ul>
                    <li>Information provided here is true and do not contain confidential information which would in
                        anyway harm the concerned or other organization. Authenticity, validity and reliability of
                        information shared are also ensured and the submitter takes full responsibilities of these,</li>
                    <li>Information provided here would be shared with potential beneficiary/viewers through Website,
                        Social Media and other means of communication, and</li>
                    <li>Permission to use the Image uploaded for this opportunity is provided to Youth Opportunities, if
                        no image is shared, YO has the right to design, manipulate and use appropriate images pertaining
                        to this opportunity.</li>
                </ul>
                </p>
            </div>



            <!-- middle container -->
            <div class="">
                <div class="container-fluid form p-2">
                    <form class="form-horizontal m-4 p-3" action="post.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group p-1">
                            <label for="title">Title <sup class="text-danger"></sup></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"
                                required>
                        </div>
                        <div class="form-group p-1">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group p-1">
                            <label for="process">Application Process<sup class="text-danger"></sup></label>
                            <textarea class="form-control" id="process" name="process" rows="3" required></textarea>
                        </div>
                        <div class="form-group p-1">
                            <label for="Eligibilitis">Eligibilities<sup class="text-danger"></sup> </label>
                            <textarea class="form-control" id="Eligibilitis" name="eligibility" rows="3"
                                required></textarea>
                        </div>
                        <div class="form-group p-1">
                            <label for="benefits">Benefits<sup class="text-danger"></sup> </label>
                            <textarea class="form-control" id="benefits" name="benefits" rows="3" required></textarea>
                        </div>
                        <div class="form-group p-1">
                            <label for="type">Type<sup class="text-danger">*</sup></label>
                            <select class="form-control" id="type" name="type" placeholder="Enter Types" required>
                                <option>Competition</option>
                                <option>Scholarship</option>
                                <option>Fellowship</option>
                                <option>Internship</option>
                                <option>Workshop</option>
                                <option>Job</option>
                                <option>Miscellaneos</option>
                            </select>
                        </div>
                        <div class="form-group p-1">
                            <label for="funding">Funding Type</label>
                            <select class="form-control" id="funding" name="funding">
                                <option>General</option>
                                <option>Fully-Fundded</option>
                                <option>Partially-Funded</option>
                            </select>
                        </div>
                        <!-- start dates -->
                        <div class="form-group p-1">
                            <label for="start_date">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                placeholder="Enter Start Date">
                        </div>
                        <div class="form-group p-1">
                            <label for="end_date">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date"
                                placeholder="Enter End Date">
                        </div>
                        <div class="form-group p-1">
                            <label for="image">Featured Image<sup class="text-danger">*</sup></label>
                            <input type="file" class="form-control-file" id="image" name="file" required>
                        </div>

                        <div class="form-group p-1">
                            <label for="link">Applied Link</label>
                            <input type="text" class="form-control" id="link" name="link" placeholder="Enter link">
                        </div>

                        <div class="form-group p-1">
                            <label for="lacation">Location<sup class="text-danger">*</sup></label>
                            <select class="form-control" id="location" name="location" required>
                                <option>Dhaka</option>
                                <option>Mymensingh</option>
                                <option>Sylhet</option>
                                <option>Khulna</option>
                                <option>Barishal</option>
                                <option>Rangpur</option>
                                <option>Chattogram</option>
                            </select>
                        </div>
                        <div class="form-group p-1">
                            <label for="organizer">Organizers <sup class="text-danger"></sup></label>
                            <input type="text" class="form-control" id="organizer" name="organizer"
                                placeholder="organizer" required>
                        </div>
                        <div class="form-group p-1">
                            <label for="organizer">Organizer's email<sup class="text-danger"></sup></label>
                            <input type="text" class="form-control" id="organizerMail" name="organizerMail"
                                placeholder="Organizer's  email" required>
                        </div>
                        <div class="form-group p-1">
                            <label for="organizer">Organizer's number<sup class="text-danger"></sup></label>
                            <input type="text" class="form-control" id="organizerPhone" name="organizerPhone"
                                placeholder="Organizer's  number" required>
                        </div>
                        <div class="form-group p-1">
                            <label for="tags">Tags<sup class="text-danger"></sup></label>
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags">
                        </div>
                        <button class="btn button-color m-1 p-1" type="submit" name="submit">Submit</button>
                    </form>
                </div>

            </div>

        </div>


        <!-- adding trending posts vartically scrolling-->


        <div class="sidebar sidebar-main col-sm-3 sidebar-right">
            <div class="inner-content widgets-container">

                <h4 class="widget-title">Trending</h4>
                <div class="widget-content">
                    <ul class="trending-posts">
                        <?php foreach ($arr as $arrData) { ?>
                        <li>
                            <div class="post-info">
                                <h5 class="entry-title"><a
                                        href="<?php echo htmlspecialchars($arrData['appliedLink']); ?>"><?php echo $arrData['title']; ?></a>
                                </h5>
                                <div class="post-meta">
                                    <span class="post-date"><b>Deadline: <?php echo $arrData['eDate']; ?>
                                        </b></b></span>
                                </div>
                            </div>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'footer.php'; ?>

</body>

</html>