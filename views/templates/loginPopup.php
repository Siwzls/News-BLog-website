<div class="popup" id="loginPopup">
    <div class="popup__content">
        <span class="popup__content__close">&times;</span>
        <form action="vendor/authentication.php" method="post">
            <label for="">Login</label>
            <input type="text" name="login" required>
            <label for="">Password</label>
            <input type="password" name="password" required>
            <input type="hidden" name="isRegistrationRequest" value="false">
            <input type="submit" value="Login">
        </form>
    </div>
</div>