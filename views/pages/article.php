<?php
    require_once '../../config/connect.php';
    require_once '../../vendor/userStatus.php';
    session_start();
    $user;
    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    } 
    else {
        $user = new User();   
    }

    $articleID = $_GET['id'];

    $article = mysqli_query($connect, "SELECT * FROM `articles` WHERE `id`='$articleID'");
    $article = mysqli_fetch_assoc($article);

    $comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `articleID`='$articleID'");
    $comments = mysqli_fetch_all($comments);
?>

<!DOCTYPE html>
<html lang="en">
<?php include '../../views/templates/head.php'?>
<body>
    <?php include '../../views/templates/header.php' ?>
    <?php include '../../views/templates/sidebar.php' ?>
    <main>
        <article>
            <h1 class="article__title">
                <?= $article['title']?>
            </h1>
            <p class="article__text">
                <?=$article['text']?>
            </p>
            <div class="comments__form">
                <form action="../../vendor/addComment.php?articleID=<?= $article['id']?>&userID=<?= $user->GetUserID()?>" method="post">
                    <label class="article__comments__title">Comments</label>
                    <div class="article__comments__form">
                        <textarea cols = "70" class="article__comments__input" 
                        placeholder="Write a comment" required name="text" id="text"></textarea>
                        <div class="article__comments__form__inner">
                            <div class="article__comments__form__inner__rating">
                                <img src="../../images/like.png" alt="">
                                <h1><?=$article['likeCount']?></h1>
                            </div>
                            <div class="article__comments__form__inner__rating">
                                <img src="../../images/dislike.png" alt="">
                                <h1>0</h1>
                            </div>
                            <?php if($user->isUserLogined) : ?>
                                <input type="submit" value="Submit" class="article__comments__sumbit">
                            <?php else : ?>
                                <input type="submit" value="Submit" class="article__comments__sumbit" disabled>
                            <?php endif ?>
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
                                    <img src="../../images/User.svg" alt="">
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
                else{
                    ?>
                    <h1>There are no comments</h1>
                <?php 
                }
                ?>
            </div>
        </article>
    </main>
    <?php include '../../views/templates/loginPopup.php' ?>
    <?php include '../../views/templates/registrationPopup.php' ?>
    <script src="/js/app.js"></script>
</body>
</html>