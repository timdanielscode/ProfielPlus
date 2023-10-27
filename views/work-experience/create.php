<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add(['assets/style.css']); ?>
<?php $this->include("headerClose"); ?>

<h1>Voeg werkervaring toe</h1>
<form action="" method="POST">
    <div class="form-parts">
        <label for="employer">Werkgever:</label>
        <input id="employer" name="employer" value="<?php if(!empty($data['employer']) ) { echo $data['employer']; } ?>"/>
        <?php if(!empty($errors['employer'])) { echo $errors['employer']; } ?>
    </div>
    <div class="form-parts">
        <label for="jobTitle">Functie:</label>
        <input id="jobTitle" name="jobTitle" value="<?php if(!empty($data['jobTitle']) ) { echo $data['jobTitle']; } ?>"/>
        <?php if(!empty($errors['jobTitle'])) { echo $errors['jobTitle']; } ?>
    </div>
    <div class="form-parts">
        <label for="startDate">Startdatum:</label>
        <input id="startDate" type="date" name="startDate" value="<?php if(!empty($data['startDate']) ) { echo $data['startDate']; } ?>">
        <?php if(!empty($errors['startDate'])) { echo $errors['startDate']; } ?>
    </div>
    <div class="form-parts">
        <label for="endDate">Einddatum:</label>
        <input id="endDate" type="date" name="endDate" value="<?php if(!empty($data['endDate']) ) { echo $data['endDate']; } ?>">
        <?php if(!empty($errors['endDate'])) { echo $errors['endDate']; } ?>
    </div>
    <div class="form-parts">
        <label for="details">Details:</label>
        <textarea id="details" name="details"><?php if(!empty($data['details']) ) { echo $data['details']; } ?></textarea>
        <?php if(!empty($errors['details'])) { echo $errors['details']; } ?>
    </div>
    <input type="submit" name="submit" value="Voeg toe"/>
</form>



<?php $this->include("footer"); ?>
