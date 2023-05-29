<header>
    <img src="/images/Menu.svg" alt="" class="header__menu">
    <div class="header__logo">
        <a href="/" class="header__logo__inner">
            <img src="/images/Logo.svg" alt="">
            <h1 class="header__logo__title">Expo</h1>
        </a>
    </div>
    <?php if($_SERVER['REQUEST_URI'] === '/') :?>
        <div class="header__search">
            <input id="searchInput" type="search" placeholder="Search" onkeydown="search(event)">
        </div>
    <?php endif; ?>
    <div class="header__add">
        <?php if($user->isUserLogined) : ?>
            <button class="header__add__button" id="Add">
                <a class="header__add__button__inner" href="/views/pages/addArticle.php">
                    <img src="/images/AddIcon.svg" alt="">
                    Add new
                </a>
            </button>
        <?php endif; ?>
    </div>
    <?php if(!$user->isUserLogined) : ?>
        <div class="header__login">
            <div class="header__login__inner">
                <button class="header__login__inner__button" id="loginButton">Log in</button>
                <span></span>
                <button class="header__login__inner__button" id="registrationButton">Sign in</button>
            </div>
            <img src="/images/User.svg" alt="">
        </div>
    <?php else : ?>
        <div class="header__login">
            <div class="header__login__inner">
                <button class="header__login__inner__button">
                    <?= $user->GetNickname()?>
                </button>
                <span></span>
                <button class="header__login__inner__button" id="logoutButton"><a href="/vendor/authentication.php">Log out</a></button>
            </div>
            <img src="/images/User.svg" alt="">
        </div>
    <?php endif; ?>
</header>