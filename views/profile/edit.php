<?php $this->include("headerOpen"); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<h1>Profile</h1>

<form method="POST" action="">
    <div class="form-parts">
        <label for="firstName">Firstname:</label>
        <input id="firstName" type="text" name="firstName" value="<?php echo $details['firstName']; ?>"/>
        <?php if(!empty($errors['firstName'])) { echo $errors['firstName']; } ?>
    </div>
    <div class="form-parts">
        <label for="lastName">Lastname:</label>
        <input id="lastName" type="text" name="lastName" value="<?php echo $details['lastName']; ?>"/>
        <?php if(!empty($errors['lastName'])) { echo $errors['lastName']; } ?>
    </div>
    <div class="form-parts">
        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="<?php echo $details['email']; ?>"/>
        <?php if(!empty($errors['email'])) { echo $errors['email']; } ?>
    </div>
    <button type="submit" name="submit">Update</button>
</form>

<?php $this->include("footer"); ?>