<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    'assets/default.css',
    'assets/navbar.css',
    'assets/footer.css',
    'assets/style.css'
]); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>



<h1>Huidig Wachtwoord wijzigen</h1>

<form method="POST" action="">
    <div class="form-parts">
        <label for="currentPassword">Huidig wachtwoord:</label>
        <input id="currentPassword" type="password" name="currentPassword"/>
        <?php if(!empty($errors['currentPassword'])) { echo $errors['currentPassword']; } ?>
    </div>
    <div class="form-parts">
        <label for="newPassword">Nieuw wachtwoord:</label>
        <input id="newPassword" type="password" name="newPassword"/>
        <?php if(!empty($errors['newPassword'])) { echo $errors['newPassword']; } ?>
    </div>
    <div class="form-parts">
        <label for="newPasswordRetype">Nieuw wachtwoord opnieuw:</label>
        <input id="newPasswordRetype" type="password" name="newPasswordRetype"/>
        <?php if(!empty($errors['newPasswordRetype'])) { echo $errors['newPasswordRetype']; } ?>
    </div>
    <button type="submit" name="submit">Wijzigen</button>
</form>

<?php $this->include("footer"); ?>