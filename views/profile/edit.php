<?php $this->include("headerOpen"); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<h1>Profile</h1>

<form method="POST" action="">
    <div class="form-parts">
        <label for="firstName"></label>
        <input id="firstName" type="text" name="firstName" value="<?php echo $details['firstName']; ?>"/>
    </div>
    <div class="form-parts">
        <label for="lastName"></label>
        <input id="lastName" type="text" name="lastName" value="<?php echo $details['lastName']; ?>"/>
    </div>
    <div class="form-parts">
        <label for="email"></label>
        <input id="email" type="email" name="email" value="<?php echo $details['email']; ?>"/>
    </div>
    <div class="form-parts">
        <label for="email"></label>
        <input type="text" name="email" value="<?php echo $details['email']; ?>"/>
    </div>
    <button type="submit" name="submit">Update</button>
</form>

<?php $this->include("footer"); ?>