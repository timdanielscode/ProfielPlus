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
    '/assets/navbar.js' => true
 ]);
    ?>
<!-- including the head and the navbar, because they were made in an other file  -->
 <?php $this->include("headerClose"); ?>
 <?php $this->include("navbar"); ?>

 <main>
    <h1>Werkervaring aanpassen</h1>
    <!-- the default values in the form are the values of the prefously choosen wergever, functie, startdatum, einddatum and omschrijving -->
    <form action="/profile/<?php echo $_SESSION['userId']; ?>/work-experience/update" method="POST">
            <label for="employer">Werkgever:</label>
            <input id="employer" name="employer" value="<?php echo $jobExperience['employer']; ?>"/>
            <?php if (!empty($errors['employer'])) {
                // here we echo the error out if there is an error made in the employer field
                echo $errors['employer']; 
            } ?>

            <label for="jobTitle">Functie:</label>
            <input id="jobTitle" name="jobTitle" value="<?php echo $jobExperience['job_title']; ?>"/>
            <?php if (!empty($errors['jobTitle'])) {
                // here we echo the error out if there is an error made in the jobtitle field
                echo $errors['jobTitle']; 
            } ?>

            <label for="startDate">Startdatum:</label>
            <input id="startDate" type="date" name="startDate" value="<?php $dateTime = new DateTime($jobExperience['start_date']);
            echo $dateTime->format('Y-m-d'); ?>">
            <?php if (!empty($errors['startDate'])) {
                // here we echo the error out if there is an error made in the startdate field
                echo $errors['startDate']; 
            } ?>

            <label for="endDate">Einddatum:</label>
            <input id="endDate" type="date" name="endDate" value="<?php $dateTime = new DateTime($jobExperience['end_date']);
            echo $dateTime->format('Y-m-d'); ?>">
            <?php if (!empty($errors['endDate'])) {
                // here we echo the error out if there is an error made in the enddate field
                echo $errors['endDate']; 
            } ?>

            <label for="details">Omschrijving:</label>
            <textarea id="details" name="details"><?php echo $jobExperience['details']; ?></textarea>
            <?php if (!empty($errors['details'])) {
                // here we echo the error out if there is an error made in the details field
                echo $errors['details']; 
            } ?>
        <input type="hidden" name="id" value="<?php echo $jobExperience['id']; ?>"/>
        <input type="submit" name="submit" class="formBtn primaryFormBtn" value="Aanpassen"/>
    </form>
</main>

    <!-- here we include the footer because its made in an other file -->
<?php $this->include("footer"); ?>
