<?php

    // connect the datbase
    include ('connectDB/config.php');

    session_start();
    $organizerMail = $_SESSION['organizerMail'];

    // check if the apply button is clicked



    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["submit"]))
    {

        $cvName = $cvEmail = $cvSubject = $fileName = $cvMessage = $fileType = $fileSize = $fileTmpName = $fileError = $fileExt = $fileDestination = $allowed = "";
        
        $cvName = mysqli_real_escape_string($conn, $_POST['cvName']);
        $cvEmail = mysqli_real_escape_string($conn, $_POST['cvEmail']);
        $cvSubject = mysqli_real_escape_string($conn, $_POST['cvSubject']);

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
        // get the allowed file extension
        $allowed = array('pdf', 'docx', 'doc', 'jpg', 'jpeg', 'png', 'gif', 'txt');

        // check if the file extension is allowed
        if(in_array($fileActualExt, $allowed)){
            // check if there is no error
            if($fileError === 0){
                // check if the file size is less than 10MB
                if($fileSize < 10000000){ // 10MB
                    // create a unique file name
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    // set the file destination
                    $fileDestination = 'uploads/'.$fileNameNew;
                    // upload the file
                    move_uploaded_file($fileTempName, $fileDestination);

                    $sql = "INSERT INTO applycv (o_email, id, subject, name, file,admin_id) VALUES ('$cvEmail', '$user_id', '$cvSubject', '$cvName', '$fileDestination','1')";
                    $result = mysqli_query($conn, $sql);
                    if($result){
                        echo "<script type='text/javascript'>alert('Your message has been sent!');</script>";
                        header("Location: main.php");
                    }else{
                        echo "<script type='text/javascript'>alert('Your message has not been sent!');</script>";
                    }
                    // get the file name
                    $file = $fileNameNew;
                }else{
                    echo "Your file is too big!";
                }
            }else{
                echo "There was an error uploading your file!";
            }
        }

        $sql2 = "SELECT * FROM applycv ORDER BY aCVid DESC";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $aCVid = $row2['aCVid'];
        $file = $row2['file'];
        $name = $row2['name'];
        $subject = $row2['subject'];
        $o_email = $row2['o_email'];
        $id = $row2['id'];


        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com"; //gmail smtp server
        $mail->SMTPAuth = true; //enable smtp authentication
        $mail->Username = "yotunities@gmail.com"; //gmail username
        $mail->Password = "zcxeotuhuoikcgrs"; // your password
        $mail->SMTPSecure = "ssl";  //for encrypted connection
        $mail->Port = 465; //gmail port

        $mail->setFrom("yotunities@gmail.com", "Yotunities"); // your email and name
        $mail->addAddress($organizerMail); // the email you want to send to
        $mail->addCC($cvEmail); // the email you want to send to
        $mail->isHTML(true); // set email format to HTML

        $mail->Subject = "$subject"; // the subject of the email
        $mail->Body = "Hi, I am $name. I am interested in your event. Please find my CV attached.";
        $mail->Body .= "<br><br>";
        $mail->Body .= "Here is some information about me:";
        $mail->Body .= "<br><br>";
        $mail->Body .= "Name: $name";
        $mail->Body .= "<br><br>";
        $mail->Body .= "Email: $cvEmail";
        $mail->Body .= "<br><br>";
        $mail->addAttachment($file);
        $mail->Body .= "Do let me know if there is any other information you need from me. Thank you.";
        $mail->Body .= "<br><br>";
        $mail->Body .= "Yours sincerely,";
        $mail->Body .= "<br>";
        $mail->Body .= "$name";
        $mail->Body .= "<br>";

       

        if($mail->send()){
            // get popup message
            echo "<script type='text/javascript'>alert('Your message has been sent!');</script>";
            header("Location: main.php");
        }else{
            echo "Email sending failed";
        }




    }

?>