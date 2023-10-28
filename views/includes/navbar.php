<nav>
  
    <ul>
      <li>
        <a href="/"><img src="/assets/images/Coat_logo_strak_MConverter.eu_1.png"alt="logo of our team"></a> 
      </li>
        <a href="/register">register</a>
      </li>
      <li>
        <a href="/login">login</a>
      </li>
      <?php if(isset($_SESSION['loggedIn']) === true && isset($_SESSION['user']) === true && isset($_SESSION["userId"]) === true) { ?>
        <li>
            <a href="/profile/<?php echo $_SESSION["userId"]; ?>"><?php echo substr($_SESSION['user'], 0, 1); ?></a>
      </li>
      <?php } ?>
    </ul>
</nav>    