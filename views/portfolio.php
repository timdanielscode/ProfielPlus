<?php require_once "includes/headerOpen.php"; ?>
<?php require_once "includes/headerClose.php"; ?>
<?php require_once "includes/navbar.php"; ?>

<?php

    if($_SESSION['loggedIn'] === true && isset($_SESSION['user'])) {

        echo $_SESSION['user'];
    } 

?>