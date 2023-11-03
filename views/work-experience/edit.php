 <?php $this->include("headerOpen"); ?>
 <?php Stylesheet::add([
     
     '/assets/default.css',
     '/assets/navbar.css',
     '/assets/footer.css',
     '/assets/form.css',


     '/assets/admin.css',
     '/assets/style.css',
     '/assets/workexperience.css'
     
 ]); 
 Script::add([
    '/assets/navbar.js' =>true
]);
 ?>
 <?php $this->include("headerClose"); ?>
 <?php $this->include("navbar"); ?>

<center>
    <h1>Werkervaring aanpassen</h1>
    <form action="/profile/<?php echo $_SESSION['userId']; ?>/work-experience/update" method="POST">
        <div class="form-parts">
            <label for="employer">Werkgever:</label>
            <input id="employer" name="employer" value="<?php echo $jobExperience['employer']; ?>"/>
            <?php if(!empty($errors['employer'])) { echo $errors['employer']; } ?>
        </div>
        <div class="form-parts">
            <label for="jobTitle">Functie:</label>
            <input id="jobTitle" name="jobTitle" value="<?php echo $jobExperience['job_title']; ?>"/>
            <?php if(!empty($errors['jobTitle'])) { echo $errors['jobTitle']; } ?>
        </div>
        <div class="form-parts">
            <label for="startDate">Startdatum:</label>
            <input id="startDate" type="date" name="startDate" value="<?php $dateTime = new DateTime($jobExperience['start_date']); echo $dateTime->format('Y-m-d'); ?>">
            <?php if(!empty($errors['startDate'])) { echo $errors['startDate']; } ?>
        </div>
        <div class="form-parts">
            <label for="endDate">Einddatum:</label>
            <input id="endDate" type="date" name="endDate" value="<?php $dateTime = new DateTime($jobExperience['end_date']); echo $dateTime->format('Y-m-d'); ?>">
            <?php if(!empty($errors['endDate'])) { echo $errors['endDate']; } ?>
        </div>
        <div class="form-parts">
            <label for="details">Omschrijving:</label>
            <textarea id="details" name="details"><?php echo $jobExperience['details']; ?></textarea>
            <?php if(!empty($errors['details'])) { echo $errors['details']; } ?>
        </div>
        <input type="hidden" name="id" value="<?php echo $jobExperience['id']; ?>"/>
        <input type="submit" name="submit" class="formBtn primaryFormBtn" value="Aanpassen"/>
    </form>
</center>


<?php $this->include("footer"); ?>
