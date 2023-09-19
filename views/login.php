<?php 

require_once "includes/headerOpen.php";
Stylesheet::add(["assets/style.css"]);

?>

<header>
  <nav>
    <img src="" alt="logo of our team">
    <ul>
      <li>
        <a href="/login">login</a>
      </li>
      <li>
        <a href="/register">register</a>
      </li>
    </ul>
  </nav>    
</header>

<main>
    <form action="" method="POST">
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
</main>

<footer>
    <a href="https://github.com/timdanielscode/SL01-portfolioApp">github repo van dit project</a>
</footer>
