<?php

if (!isset($_SESSION["loggedInUser"])) {
    header("location login.php");
    die();
}