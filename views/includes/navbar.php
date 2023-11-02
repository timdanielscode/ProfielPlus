<script src="../../assets/navbar.js" defer></script>


<nav>
  <div class="imgContainer">
      <img src="./views/includes/coat_logo.png" alt="logo of our team">
  </div>    
    <ul>
      
      <?php if(isset($_SESSION['loggedIn']) === true && isset($_SESSION['user']) === true && isset($_SESSION["userId"]) === true) { ?>
        <li>
          <div id="profileBtn">
            <h1><?= strtoupper(substr($_SESSION['user'], 0, 1)); ?></h1>
          </div>
        </li>
      <?php } else { ?>

        <li>
        <a href="/register">register</a>
      </li>
      <li>
        <a href="/login">login</a>
      </li>
        
      <?php } ?>
    </ul>
    <ul class="inActive" id="profileMenu">
      <li><a id="editDropdownBtn">Edit</a></li>
      <li class="movingDownForEdit"><a href="/profile/<?= $_SESSION['userId'] ?>/change-password">wachtwoord veranderen</a></li>
      <li class="movingDownForEdit"><a href="/logout">Uit loggen</a></li>
    </ul>

    <ul class="inActive" id="editLinkMenu">
      <li><a href="/edit-schools">Edit Educaties</a></li>
      <li><a href="/profile/<?= $_SESSION['userId'] ?>/work-experience">Edit Werkervaring</a></li>
      <li><a href="/profile/<?=$_SESSION['userId']?>/hobby/edit">Edit hobby's</a></li>
    </ul>
</nav>    


