<?php
    require_once '../config/connect.php';

    $articleID = $_GET['id'];

    $article = mysqli_query($connect, "SELECT * FROM `articles` WHERE `id`='$articleID'");
    $article = mysqli_fetch_assoc($article);

    $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `articleID`='$articleID'");
    $comments = mysqli_fetch_all($comments);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expo</title>
</head>
<body>
    <header>
        <img src="../images/Menu.svg" alt="">
        <div>
            <a href="../index.php" class="header__logo">
                <img src="../images/Logo.svg" alt="">
                <h1 class="header__logo__title">Expo</h1>
            </a>
        </div>
        <div class="header__search">
            <input type="text" placeholder="Search">
        </div>
        <div class="header__add">
            <button id="Add">
                <img src="../images/AddIcon.svg" alt="">
                Add new
            </button>
        </div>
        <div class="header__login">
            <div class="header__login__inner">
                <h3 id="Login">Log in</h3>
                <span></span>
                <h3 id="Registration">Sign in</h3>
            </div>
            <img src="../images/User.svg" alt="">
        </div>
    </header>
    <aside>
        <div class="aside__content">
            <h1 class="aside__title">Catalog</h1>
            <ul class="aside__list__inner">
                <li class="aside__list__elem">
                    <img src="../images/NewIcon.svg" alt="">
                    <h1>New</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="../images/NewIcon.svg" alt="">
                    <h1>Subscribes</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="../images/NewIcon.svg" alt="">
                    <h1>History</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="../images/NewIcon.svg" alt="">
                    <h1>Liked posts</h1>
                </li>
            </ul>
        </div>
        <div class="aside__content">
            <h1 class="aside__title">Themes</h1>
            <ul class="aside__list__inner">
                <li class="aside__list__elem">
                    <img src="../images/Gamepad.svg" alt="">
                    <h1>Sport</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="../images/Gamepad.svg" alt="">
                    <h1>Science</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="../images/Gamepad.svg" alt="">
                    <h1>Games</h1>
                </li>
                <li class="aside__list__elem">
                    <img src="../images/Gamepad.svg" alt="">
                    <h1>Movies</h1>
                </li>
            </ul>
        </div>
    </aside>
    <main>
        <article>
            <h1 class="article__title">
                <?= $article['title']?>
            </h1>
            <p class="article__text">
                <?=$article['text']?>
            </p>
            <div class="comments__form">
                <form action="vendor/article.php?id=<?= $article[0] ?>">
                    <label class="article__comments__title">Comments</label>
                    <div class="article__comments__form">
                        <textarea cols = "70" class="article__comments__input" 
                        placeholder="Write a comment" required></textarea>
                        <div class="article__comments__form__inner">
                            <div class="article__comments__form__inner__rating">
                                <img src="../images/like.png" alt="">
                                <h1><?=$article['likeCount']?></h1>
                            </div>
                            <div class="article__comments__form__inner__rating">
                                <img src="../images/dislike.png" alt="">
                                <h1>0</h1>
                            </div>
                            <input type="submit" value="Submit" class="article__comments__sumbit">
                        </div>
                    </div>
                </form>
            </div>  
            <div class="comments">
                <?php 
                    if($comments != null){
                        foreach($comments as $comment){
                            $user = mysqli_query($connect, "SELECT * FROM `users` WHERE `id`='$comment[2]'");
                            $user = mysqli_fetch_assoc($user);
                            ?>
                            <div class="comment">
                                <div class="comment__user">
                                    <img src="../images/User.svg" alt="">
                                    <h2>
                                        <?=$user['nickname']?>
                                    </h2>
                                </div>
                                <p class="comment__text">
                                    <?=$comment[1]?>
                                </p>
                            </div>
                        
                            <?php
                        }
                }
                else{?>
                    <h1>There are no comments</h1>
                <?php }?>
            </div>
        </article>
    </main>
    <div class="popup" id="loginPopup">
        <div class="popup__content">
            <span class="popup__content__close">&times;</span>
            <form action="vendor/login.php" method="post">
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