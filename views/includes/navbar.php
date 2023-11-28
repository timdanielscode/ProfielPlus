<!-- Script that makes the navbar function -->
<script src="../../assets/navbar.js" defer></script>


<nav>
  <div class="imgContainer">
      <img src="/views/includes/coat_logo.png" alt="logo of our team">
  </div>    
    <ul>
      <!-- the profile button, this button is only shown when the user is signed in -->
      <?php if (isset($_SESSION['loggedIn']) === true && isset($_SESSION['user']) === true && isset($_SESSION["userId"]) === true) { ?>
        <li>
          <div id="profileBtn">
            <h1><?= strtoupper(substr($_SESSION['user'], 0, 1)); ?></h1>
          </div>
        </li>
      <?php } else { ?>
<!-- the 2 nav items when the user is not logged in -->
        <li>
        <a href="/register">register</a>
      </li>
      <li>
        <a href="/login">login</a>
      </li>
        
      <?php } ?>
      <!-- a menu that is only shown when the user pressed his profile button -->
    </ul>
    <ul class="inActive" id="profileMenu">
      <li><a id="editDropdownBtn">Edit</a></li>
      <li><a id="addDropdownBtn">Add</a></li>
      <li><a href="/profile/<?= $_SESSION['userId'] ?>/change-password">wachtwoord veranderen</a></li>
      <li><a href="/profile/<?= $_SESSION['userId'] ?>/profiles">Browse</a></li>
      <li><a href="/logout">Uit loggen</a></li>
    </ul>
<!-- when the user presses on the editDropdownBtn than this menu will be shown -->
    <ul class="inActive" id="editLinkMenu">
      <li><a href="/edit-schools">Edit Educaties</a></li>
      <li><a href="/profile/<?= $_SESSION['userId'] ?>/work-experience">Edit Werkervaring</a></li>
      <li><a href="/profile/<?=$_SESSION['userId']?>/hobby/edit">Edit hobby's</a></li>
    </ul>

    <!-- when the user presses the addDropdownBtn than this menu will be shown -->
    <ul class="inActive" id="addLinkMenu">
      <li><a href="/add-schools">Add Educaties</a></li>
      <li><a href="/profile/<?= $_SESSION['userId'] ?>/work-experience/create">Add Werkervaring</a></li>
      <li><a href="/profile/<?=$_SESSION['userId']?>/hobby/edit">Add hobby's</a></li>
    </ul>
</nav>
