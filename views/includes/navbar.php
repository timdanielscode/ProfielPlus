<nav>
    <img src="" alt="logo of our team">
    <ul>
      <li>
        <a href="/login">login</a>
      </li>
      <li>
        <a href="/register">register</a>
      </li>
      <?php if(isset($_SESSION['loggedIn']) === true && isset($_SESSION['user']) === true && isset($_SESSION["userId"]) === true) { ?>
        <li>
            <a href="/users/<?php echo $_SESSION["userId"]; ?>"><?php echo substr($_SESSION['user'], 0, 1); ?></a>
      </li>
      <?php } ?>
    </ul>
</nav>    