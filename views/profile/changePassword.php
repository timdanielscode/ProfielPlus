<?php $this->include("headerOpen"); ?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<h1>Change password</h1>

<form method="POST" action="">
    <div class="form-parts">
        <label for="currentPassword">Current password:</label>
        <input id="currentPassword" type="password" name="currentPassword"/>
        <?php if(!empty($errors['currentPassword'])) { echo $errors['currentPassword']; } ?>
    </div>
    <div class="form-parts">
        <label for="newPassword">New password:</label>
        <input id="newPassword" type="password" name="newPassword"/>
        <?php if(!empty($errors['newPassword'])) { echo $errors['newPassword']; } ?>
    </div>
    <div class="form-parts">
        <label for="newPasswordRetype">Retype new password:</label>
        <input id="newPasswordRetype" type="password" name="newPasswordRetype"/>
        <?php if(!empty($errors['newPasswordRetype'])) { echo $errors['newPasswordRetype']; } ?>
    </div>
    <button type="submit" name="submit">Update</button>
</form>

<?php $this->include("footer"); ?>