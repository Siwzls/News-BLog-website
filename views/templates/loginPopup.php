<div class="popup" id="loginPopup">
    <div class="popup__content">
        <span class="popup__content__close">&times;</span>
        <form action="/vendor/authentication.php" method="post">
            <label>Login</label>
            <input class="popup__content__input" type="text" name="login" required>
            <label>Password</label>
            <input class="popup__content__input" type="password" name="password" required>
            <input type="hidden" name="isRegistrationRequest" value="false">
            <input class="popup__content__submit" type="submit" value="Login">
        </form>
    </div>
</div>