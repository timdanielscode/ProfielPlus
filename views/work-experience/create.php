<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    '/assets/default.css',
    '/assets/navbar.css',
    '/assets/footer.css',
    '/assets/form.css',
    '/assets/admin.css',
    '/assets/style.css',
    '/assets/hobbyedit.css'
    
]); 
Script::add([
    '/assets/navbar.js' => true
]);
?>
<!-- including the head and the navbar, because they were made in an other file  -->
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

    <main>
    <h1>Voeg werkervaring toe</h1>
    <form action="" method="POST">
        
            <label for="employer">Werkgever:</label>
            <input id="employer" name="employer" value="<?php if (!empty($data['employer'])) {
                //  if the user had put in invalid ifo, he gets redirected to this page and all his old info will be 
                // filled in already so he does not have to fill in everything again
                echo $data['employer']; 
                                                        } ?>"/>
            <?php if (!empty($errors['employer'])) {
                // here we echo the error out if there is an error made in the employer field
                echo $errors['employer'];
            } ?>
            <label for="jobTitle">Functie:</label>
            <input id="jobTitle" name="jobTitle" value="<?php if (!empty($data['jobTitle'])) {
                //  if the user had put in invalid ifo, he gets redirected to this page and all his old info will be 
                // filled in already so he does not have to fill in everything again
                echo $data['jobTitle']; 
                                                        } ?>"/>
            <?php if (!empty($errors['jobTitle'])) {
                // here we echo the error out if there is an error made in the job title field
                echo $errors['jobTitle']; 
            } ?>
            <label for="startDate">Startdatum:</label>
            <input id="startDate" type="date" name="startDate" value="<?php echo date("Y-m-d"); ?>">
            <?php if (!empty($errors['startDate'])) {
                // here we echo the error out if there is an error made in the startdate field
                echo $errors['startDate']; 
            } ?>
            <label for="endDate">Einddatum:</label>
            <input id="endDate" type="date" name="endDate" value="<?php echo date("Y-m-d"); ?>">
            <?php if (!empty($errors['endDate'])) {
                // here we echo the error out if there is an error made in the enddate field
                echo $errors['endDate']; 
            } ?>
            <label for="details">Omschrijving:</label>
            <textarea id="details" name="details"><?php if (!empty($data['details'])) {
                //  if the user had put in invalid ifo, he gets redirected to this page and all his old info will be 
                // filled in already so he does not have to fill in everything again
                echo $data['details']; 
                                                  } ?></textarea>
            <?php if (!empty($errors['details'])) {
                // here we echo the error out if there is an error made in the datails field
                echo $errors['details']; 
            } ?>
        <input type="submit" name="submit" class="formBtn primaryFormBtn" value="Voeg toe"/>
    </form>
    </main>

    <!-- here we include the footer because its made in an other file -->
<?php $this->include("footer"); ?>

