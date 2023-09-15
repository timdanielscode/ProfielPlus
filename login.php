<?php 

require_once "classes/autoload.php";
require_once "includes/headerOpen.php";
Stylesheet::add(["assets/style.css"]);

?>

<form action="validate.php" method="POST">
    <div class="form-group">
        <label class="form-label" for="email">Email: </label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label class="form-label" for="password">Wachtwoord: </label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <input type="submit" name="submit" id="submit" value="login">
    </div>
    
</form>

