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
?>
<!DOCTYPE html>
<html lang="en">
<?php include '../../views/templates/head.php'?>
<body>
    <?php include '../../views/templates/header.php'?>   
    <aside>
    <div class="aside__content">
        <button class="aside__title">Your Drafts</button>
        <button class="aside__title">Your Articles</button>
    </div>
    </aside>
    <main id="articlePage">
        <form class="add__article" action="../../vendor/createArticle.php" method="post" enctype="multipart/form-data">
            <div class="add__article__blocks">
                <div class="add__article__block">
                    <label class="add__article__input__title">Title</label>
                    <input class="add__article__input" name="title" type="text" required>
                </div>
                <div class="add__article__block">
                    <label class="add__article__input__title">Theme</label>
                    <select name="theme">
                        <option value="sport">Sport</option>
                        <option value="science">Science</option>
                        <option value="movie">Movies</option>
                        <option value="cooking">Cooking</option>
                    </select>
                </div>
            </div>
            <div class="add__article__blocks">
                <div class="add__article__block">
                    <label class="add__article__input__title">Description</label>
                    <textarea class="add__article__input" type="textarea" name="description" cols="30" rows="5" required></textarea>
                </div>
                <div class="add__article__block--upload">
                    <label class="add__article__upload__btn" for="inputImage">Upload Image</label>
                    <input id="inputImage" type="file" name="image" accept="image/*">
                    <img id="previewImage" src="" alt="">
                </div>
            </div>
            <div class="add__article__block--text">
                <label class="add__article__input__title">Text</label>
                <textarea class="add__article__input" name="text" cols="50" rows="20"></textarea>
            </div>
            <div class="add__article__bottom">
                <a class="add__article__submit__btn add__article__submit__btn--delete" href="/index.php">
                    Cancel
                </a>
                <input class="add__article__submit__btn add__article__submit__btn--save" type="submit" value="Save to Drafts">
                <input class="add__article__submit__btn add__article__submit__btn--publish" type="submit" value="Publish">
            </div>
        </form>
    </main>
    <script src="/js/app.js"></script>
</body>
</html>