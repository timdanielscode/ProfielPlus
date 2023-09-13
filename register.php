<?php require_once "classes/autoload.php"; ?>
<?php require_once "includes/headerOpen.php"; ?>
<?php Stylesheet::add(['assets/style.css']); ?>

<form action="" method="POST">
  <div class="form-group">
    <label for="exampleFormControlInput1">Voornaam:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Achternaam:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Wachtwoord:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Wachtwoord herhalen:</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
</form>

<?php require_once "includes/headerClose.php"; ?>