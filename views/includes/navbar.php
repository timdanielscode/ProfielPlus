<script src="../../assets/navbar.js" defer></script>


<nav>
  <div class="imgContainer">
      <img src="./views/includes/coat_logo.png" alt="logo of our team">
  </div>    
    <ul>
      
      <?php if(isset($_SESSION['loggedIn']) === true && isset($_SESSION['user']) === true && isset($_SESSION["userId"]) === true) { ?>
        <li>
            <a href="/profile/<?php echo $_SESSION["userId"]; ?>"><?php echo substr($_SESSION['user'], 0, 1); ?></a>
        </li>
        <li>
            <a href="/profile/<?php echo $_SESSION["userId"]; ?>/change-password">Change password</a>
        </li>
        <li>
            <a href="/edit-schools">Edit school</a>
        </li>
        <li>
          <div id="profileBtn">
            <h1><?= strtoupper(substr($_SESSION['user'], 0, 1)); ?></h1>
          </div>
        </li>
      <?php } else { ?>

        <li>
        <a href="/login">login</a>
      </li>
      <li>
        <a href="/register">register</a>
      </li>
        
      <?php } ?>
    </ul>
    <ul class="inActive" id="profileMenu">
      <li><a href="">edit hobby</a></li>
      <li><a href="">edit educatie</a></li>
      <li><a href="">edit profile</a></li>
      <li><a href="">edit werkervaring</a></li>
    </ul>
</nav>    


