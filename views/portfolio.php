<?php $this->include("headerOpen"); ?>

<?php Stylesheet::add([
    'assets/style.css'
    
]); ?>

<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<?php

    if($_SESSION['loggedIn'] === true && isset($_SESSION['user'])) {

        echo $_SESSION['user'];
    } 

?>

<?php $this->include("footer"); ?>