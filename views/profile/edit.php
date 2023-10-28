<?php $this->include("headerOpen"); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<h1>Account gegevens</h1>

<form method="POST" action="/profile/<?php echo $_SESSION['userId']; ?>/update">
    <div class="form-parts">
        <label for="firstName">Voornaam:</label>
        <input id="firstName" type="text" name="firstName" value="<?php echo $details['firstName']; ?>"/>
        <?php if(!empty($errors['firstName'])) { echo $errors['firstName']; } ?>
    </div>
    <div class="form-parts">
        <label for="lastName">Achternaam:</label>
        <input id="lastName" type="text" name="lastName" value="<?php echo $details['lastName']; ?>"/>
        <?php if(!empty($errors['lastName'])) { echo $errors['lastName']; } ?>
    </div>
    <div class="form-parts">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="<?php echo $details['email']; ?>"/>
        <?php if(!empty($errors['email'])) { echo $errors['email']; } ?>
    </div>
    <button type="submit" name="submit">Aanpassen</button>
</form>

<?php $this->include("footer"); ?>