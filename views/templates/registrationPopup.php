<div class="popup" id="registrationPopup">
    <div class="popup__content">
        <span class="popup__content__close">&times;</span>
        <form action="/vendor/authentication.php" method="post">
            <label for="">Email</label>
            <input type="email" pattern="^[a-zA-Z0-9._%+-]+@globex\.com$" name="email" required>
            <label for="">Nickname</label>
            <input type="text" name="nickname" required>
            <label for="">Login</label>
            <input type="text" name="login" required>
            <label for="">Password</label>
            <input type="password" name="password" required>
            <input type="hidden" name="isRegistrationRequest" value="true">
            <input type="submit" value="Registration">
        </form>
    </div>
</div>