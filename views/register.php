<?php require_once "includes/headerOpen.php"; ?>
<?php Stylesheet::add(['assets/style.css']); ?>

<form action="" method="POST">
  <div class="form-group">
    <label for="firstName">Voornaam:</label>
    <input id="firstName" name="firstName" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label for="lastName">Achternaam:</label>
    <input id="lastName" name="lastName" type="text" class="form-control">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input id="email" name="email" type="email" class="form-control">
  </div>
  <div class="form-group">
    <label for="password">Wachtwoord:</label>
    <input id="password" name="password" type="password" class="form-control">
  </div>
  <div class="form-group">
    <label for="retypePassword">Wachtwoord herhalen:</label>
    <input id="retypePassword" name="retypePassword" type="password" class="form-control">
  </div>
  <input type="submit" name="submit" value="Submit"/>
</form>

<?php require_once "includes/headerClose.php"; ?>