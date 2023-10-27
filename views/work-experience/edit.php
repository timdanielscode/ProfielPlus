<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add(['assets/style.css']); ?>
<?php $this->include("headerClose"); ?>

<h1>Werkervaring aanpassen</h1>
<form action="/profile/<?php echo $_SESSION['userId']; ?>/work-experience/update" method="POST">
    <div class="form-parts">
        <label for="employer">Werkgever:</label>
        <input id="employer" name="employer" value="<?php echo $jobExperience['employer']; ?>"/>
    </div>
    <div class="form-parts">
        <label for="jobTitle">Functie:</label>
        <input id="jobTitle" name="jobTitle" value="<?php echo $jobExperience['job_title']; ?>"/>
    </div>
    <div class="form-parts">
        <label for="startDate">Startdatum:</label>
        <input id="startDate" type="date" name="startDate" value="<?php echo $jobExperience['start_date']; ?>">
    </div>
    <div class="form-parts">
        <label for="endDate">Einddatum:</label>
        <input id="endDate" type="date" name="endDate" value="<?php echo $jobExperience['end_date']; ?>">
    </div>
    <div class="form-parts">
        <label for="details">Details:</label>
        <textarea id="details" name="details"><?php echo $jobExperience['details']; ?></textarea>
    </div>
    <input type="hidden" name="id" value="<?php echo $jobExperience['id']; ?>"/>
    <input type="submit" name="submit" value="Aanpassen"/>
</form>



<?php $this->include("footer"); ?>
