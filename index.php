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

    $sqlQuery = "SELECT * FROM `articles`";
    
    if(isset($_GET['filter'])){
        $theme = $_GET['filter'];
        $sqlQuery = "SELECT * FROM `articles` WHERE `theme` = '$theme'";
    }
    $articles = mysqli_query($connect, $sqlQuery);
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
                                    <h1 class="article__block__title__inner">
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
                                <img src="<?= $article[6]?>" alt="">
                            </div>
                        </a>
                    <?php
                }
            ?>
        </div>
    </main>
    <?php include 'views/templates/loginPopup.php' ?>
    <?php include 'views/templates/registrationPopup.php' ?>
    <script src="/js/app.js"></script>
</body>
</html>