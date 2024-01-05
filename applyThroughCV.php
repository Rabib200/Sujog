<?php

include('connectDB/config.php');

session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Apply Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="applyThroughCV.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>

<body>
    <form class="" action="send.php" method="post" enctype="multipart/form-data">
        <div class="cont">
            <div class="form sign-in">
                <h2>Apply Form</h2>

                <label>
                    <span>Your Name</span>
                    <input type="text" name="cvName" value="">
                </label>

                <label>
                    <span>Your Email</span>
                    <input type="text" name="cvEmail" value="">
                </label>

                <label>
                    <span>Subject</span>
                    <input type="text" name="cvSubject" value="">
                </label>

                <label>
                    <span>CV</span>
                    <input type="file" class="form-control-file" id="image" name="file" accept=".pdf, .doc, docx">
                </label>
                <button class="submit" type="submit" name="submit">Send</button>
            </div>

            <div class="sub-cont">
                <div class="img">
                    <div class="img-text m-up center">
                        <h2>Sujog</h2>
                        <p>Submit your CV and get the opportunity!</p>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>

</html>