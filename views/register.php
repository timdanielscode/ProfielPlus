<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    'assets/default.css',
    'assets/navbar.css',
    'assets/form.css',
    
]); 

Script::add([
  'assets/navbar.js'
]);
?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>


<main>
  <form action="" method="POST">
      <label for="firstName">Voornaam:</label>
      <input id="firstName" name="firstName" type="text" class="form-control">
      <?php if(!empty($errors['firstName'])) { echo $errors['firstName']; } ?>

      <label for="lastName">Achternaam:</label>
      <input id="lastName" name="lastName" type="text" class="form-control">
      <?php if(!empty($errors['lastName'])) { echo $errors['lastName']; } ?>

      <label for="email">Email:</label>
      <input id="email" name="email" type="email" class="form-control">
      <?php if(!empty($errors['email'])) { echo $errors['email']; } ?>

      <label for="password">Wachtwoord:</label>
      <input id="password" name="password" type="password" class="form-control">
      <?php if(!empty($errors['password'])) { echo $errors['password']; } ?>

      <label for="retypePassword">Wachtwoord herhalen:</label>
      <input id="retypePassword" name="retypePassword" type="password" class="form-control">
      <?php if(!empty($errors['retypePassword'])) { echo $errors['retypePassword']; } ?>
      
    <input type="submit" class="primaryFormBtn formBtn" name="submit" value="Submit"/>
  </form>

</main>
  