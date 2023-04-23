<?php
    require_once '../config/connect.php';

    $title = $_POST['title'];
    $theme = $_POST['theme'];
    $description = $_POST['description'];
    $text = $_POST['text'];

    $image = $_FILES['image'];
    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $fileNameNew = $fileName . uniqid('', true) . "." . $fileActualExt;
    $fileDestinationToDB = '/images/uploads/covers/' . $fileNameNew;
    $fileDestination = '../images/uploads/covers/' . $fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestination);

    mysqli_query($connect, "INSERT INTO `articles` 
                            (`title`, `theme`,`description`, `text`, `pathToCover`) 
                            VALUES ('$title', '$theme', '$description', '$text', '$fileDestinationToDB')");

    header("Location: /index.php");
?>