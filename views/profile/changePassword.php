<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    '/assets/default.css',
    '/assets/navbar.css',
    '/assets/footer.css',
    '/assets/style.css',
    '/assets/form.css'
]); 

?>
<!-- including the head and the navbar that are made in another file -->
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>


<main>
    <form method="POST" action="">
    <h1>Huidig Wachtwoord wijzigen</h1>
            <label for="currentPassword">Huidig wachtwoord:</label>
            <input id="currentPassword" type="password" name="currentPassword"/>
            <?php if (!empty($errors['currentPassword'])) {
                echo $errors['currentPassword']; 
            } ?>
            <label for="newPassword">Nieuw wachtwoord:</label>
            <input id="newPassword" type="password" name="newPassword"/>
            <?php if (!empty($errors['newPassword'])) {
                echo $errors['newPassword']; 
            } ?>
            <label for="newPasswordRetype">Nieuw wachtwoord opnieuw:</label>
            <input id="newPasswordRetype" type="password" name="newPasswordRetype"/>
            <?php if (!empty($errors['newPasswordRetype'])) {
                echo $errors['newPasswordRetype']; 
            } ?>
        <button type="submit" class="formBtn primaryFormBtn" name="submit">Wijzigen</button>
    </form>
</main>
<!-- including the footer thad is made in another file -->
<?php $this->include("footer"); ?>
