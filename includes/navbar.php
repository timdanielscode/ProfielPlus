<nav>
    <img src="" alt="logo of our team">
    <ul>
      <li>
        <a href="/login">login</a>
      </li>
      <li>
        <a href="/register">register</a>
      </li>
      <?php if(isset($_SESSION['login'])) { ?>
        <li>
            <a href="#">Profile</a>
      </li>
      <?php } ?>
    </ul>
</nav>    