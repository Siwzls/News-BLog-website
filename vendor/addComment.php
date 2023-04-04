<?php
    require_once '../config/connect.php';

    $userID = $_GET['userID'];
    $articleID = $_GET['articleID'];

    $text = $_POST['text'];

    mysqli_query($connect, "INSERT INTO `comments` 
                            (`id`, `text`, `userID`, `articleID`) 
                            VALUES (NULL, '$text', '$userID', '$articleID')");

    header("Location: /News-BLog%20website/vendor/article.php?id=$articleID");
?>