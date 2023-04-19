<?php
    require_once 'config/connect.php';
    require 'vendor/userStatus.php';
    session_start();
    $user;
    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    } 
    else {
        $user = new User();   
    }
    $articles = mysqli_query($connect, "SELECT * FROM `articles`");
    $articles = mysqli_fetch_all($articles);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expo</title>
</head>
<body>
    <header>
        <img src="./images/Menu.svg" alt="" class="header__menu">
        <div class="header__logo">
            <a href="index.php" class="header__logo__inner">
                <img src="./images/Logo.svg" alt="">
                <h1 class="header__logo__title">Expo</h1>
            </a>
        </div>
        <div class="header__search">
            <input type="search" placeholder="Search">
        </div>
        <div class="header__add">
            <button id="Add">
                <img src="./images/AddIcon.svg" alt="">
                Add new
            </button>
        </div>
        <?php 
            if(!$user->isUserLogined){
            ?>
                <div class="header__login">
                    <div class="header__login__inner">
                        <h3 id="loginButton">Log in</h3>
                        <span></span>
                        <h3 id="registrationButton">Sign in</h3>
                    </div>
                    <img src="./images/User.svg" alt="">
                </div>
            <?php
            }
            else{
            ?>
                <div class="header__login">
                    <div class="header__login__inner">
                        <h3>
                            <?= $user->GetNickname()?>
                        </h3>
                        <span></span>
                        <h3 id="logoutButton"><a href="vendor/authentication.php">Log out</a></h3>
                    </div>
                    <img src="./images/User.svg" alt="">
                </div>
            <?php 
            }
            ?>
    </header>
    <aside>
        <div class="aside__content">
            <h1 class="aside__title">Catalog</h1>
            <ul class="aside__list__inner">
                <li class="aside__list__elem">
                    <img src="./images/NewIcon.svg" alt="">
                    <h1>New</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="./images/NewIcon.svg" alt="">
                    <h1>Subscribes</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="./images/NewIcon.svg" alt="">
                    <h1>History</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="./images/NewIcon.svg" alt="">
                    <h1>Liked posts</h1>
                </li>
            </ul>
        </div>
        <div class="aside__content">
            <h1 class="aside__title">Themes</h1>
            <ul class="aside__list__inner">
                <li class="aside__list__elem">
                    <img src="./images/Gamepad.svg" alt="">
                    <h1>Sport</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="./images/Gamepad.svg" alt="">
                    <h1>Science</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="./images/Gamepad.svg" alt="">
                    <h1>Games</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="./images/Gamepad.svg" alt="">
                    <h1>Movies</h1>
                </li>
            </ul>
        </div>
    </aside>
    <main>
        <div class="article__blocks">
            <?php
                foreach($articles as $article){
                    ?>
                        <a class="article__block" href="pages/article.php?id=<?= $article[0] ?>">
                            <div>
                                <div class="article__block__title">
                                    <h1>
                                        <?= $article[1] ?>
                                    </h1>
                                    <div class="article__block__theme">
                                        <img src="./images/Gamepad.svg" alt="">
                                        <h2>
                                            <?= $article[2] ?>
                                        </h2>
                                    </div>
                                </div>
                                <div class="article__block__description">
                                    <p>
                                        <?= $article[3] ?>
                                    </p>
                                </div>
                                <img src="" alt="">
                            </div>
                        </a>
                    <?php
                }
            ?>
        </div>
    </main>
    <div class="popup" id="loginPopup">
        <div class="popup__content">
            <span class="popup__content__close">&times;</span>
            <form action="vendor/authentication.php" method="post">
                <label for="">Login</label>
                <input type="text" name="login" id="login" required>
                <label for="">Password</label>
                <input type="password" name="password" id="password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <div class="popup" id="registrationPopup">
        <div class="popup__content">
            <span class="popup__content__close">&times;</span>
            <form action="vendor/authentication.php" method="post">
                <label for="">Login</label>
                <input type="text" name="login" id="login" required>
                <label for="">Password</label>
                <input type="password" name="password" id="password" required>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>