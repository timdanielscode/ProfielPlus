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
    <form method="POST" action="/profile/<?php echo $_SESSION['userId']; ?>/update">
        <h1>Account gegevens</h1>
        <!-- the form is populated by data that is already filled in but can be altered if you for example made a typo -->
            <label for="firstName">Voornaam:</label>
            <input id="firstName" type="text" name="firstName" value="<?php echo $details['firstName']; ?>"/>
            <?php if (!empty($errors['firstName'])) {
                echo $errors['firstName']; 
            } ?>
            <label for="lastName">Achternaam:</label>
            <input id="lastName" type="text" name="lastName" value="<?php echo $details['lastName']; ?>"/>
            <?php if (!empty($errors['lastName'])) {
                echo $errors['lastName']; 
            } ?>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" value="<?php echo $details['email']; ?>"/>
            <?php if (!empty($errors['email'])) {
                echo $errors['email']; 
            } ?>
        <button type="submit" name="submit">Aanpassen</button>
    </form>
</main>

<!-- including the footer that is made in an other file -->
<?php $this->include("footer"); ?>
