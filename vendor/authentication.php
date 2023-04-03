<?php 
    require_once 'C:\xampp\htdocs\News-BLog website\config\connect.php';
    require 'userStatus.php';
    session_start();
    $user;

    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    } 
    else {
        $user = new User();
    }

    if($user->IsUserLogined()){
        $user->SetLoginFlag(false);
        $_SESSION['user'];
        header("Location: /News-BLog%20website");
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $login = $_POST['login'];
        $password = $_POST['password'];

        $result = mysqli_query($connect, "SELECT * FROM users WHERE login='$login' AND password='$password'");
        $userData = mysqli_fetch_assoc($result);
    
        if($result->num_rows > 0){
            $user->SetLoginFlag(true);
            $user->SetUserData($userData);
            $_SESSION['user'] = $user;
            header("Location: /News-BLog%20website");
            exit;
        }
        else{
            header("Location: /wrong");
            exit;
        }
    }
?>