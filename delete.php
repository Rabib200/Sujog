<?php

    session_start();
    // connect the datbase
    include('./connectDB/config.php');

    $post_id = $_SESSION['post_id'];

    echo $post_id;
    // $sql = "DELETE FROM post WHERE post_id = '$post_id'";
    // $result = mysqli_query($conn, $sql);

    // if($result){
    //     echo "<script type='text/javascript'>alert('Post deleted!');</script>";
    //     header("Location: admin.php");
    // }else{
    //     echo "<script type='text/javascript'>alert('Post not deleted!');</script>";
    // }

?>