<?php 

$this->include("headerOpen");

Stylesheet::add([
    
  'assets/default.css',
  "assets/navbar.css",
  "assets/form.css"
  
]);
Script::add([
  'assets/navbar.js'
]);

$this->include("headerClose");
$this->include("navbar");

?>


<main>
    <form method="POST">
      <h1>Login</h1>
            <label class="form-label" for="email">Email: </label>
            <input type="text" class="form-control" id="email" name="email">

            <label class="form-label" for="password">Wachtwoord: </label>
            <input type="password" class="form-control" id="password" name="password">
            
            <div class="buttonRow">
              <input type="submit" name="submit" id="submitLogin" value="Login" class="primaryFormBtn formBtn">
              <input type="submit" name="submit" id="submitResgister" value="Register" class="secondaryFormBtn formBtn">
            </div>
            
    </form>
</main>

<footer>
    <a href="https://github.com/timdanielscode/SL01-portfolioApp">github repo van dit project</a>
</footer>
