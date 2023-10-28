<?php 

require_once "includes/headerOpen.php";
//Stylesheet::add(["assets/purpleloginstyle.css"]);

?>

<header>
 <?php
 $this->include("navbar");
 ?>
</header>

<main>
    <form method="POST">
            <label class="form-label" for="email">Email: </label>
            <input type="text" class="form-control" id="email" name="email">
            <label class="form-label" for="password">Wachtwoord: </label>
            <input type="password" class="form-control" id="password" name="password">
            <div class="row">
              <input type="submit" name="submit" id="submitLogin" value="Login">
              <input type="submit" name="submit" id="submitResgister" value="Register">
            </div>
            
    </form>
</main>

<footer>
    <a href="https://github.com/timdanielscode/SL01-portfolioApp">github repo van dit project</a>
</footer>
