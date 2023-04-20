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
<?php include 'views/templates/head.php'?>
<body>
    <?php include 'views/templates/header.php' ?>
    <?php include 'views/templates/sidebar.php' ?>
    <main>
        <div class="article__blocks">
            <?php
                foreach($articles as $article){
                    ?>
                        <a class="article__block" href="views/pages/article.php?id=<?= $article[0] ?>">
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
    <?php include 'views/templates/loginPopup.php' ?>
    <?php include 'views/templates/registrationPopup.php' ?>
    <script src="js/app.js"></script>
</body>
</html>