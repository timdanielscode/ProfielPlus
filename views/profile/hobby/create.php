<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    '/assets/default.css',
    '/assets/navbar.css'
]);?>
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<style>
  .form {
    width: 450px;
    position: relative;
    top: 20%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    background-color: #ddd;
  }

  .form input, .form label {
    font-size: 24px;
    font-weight: 700;
  }

  .form .image {
    width: 200px;
    height:200px;
    background-color: rgba(0,0,0,0.2);
  }

  .form .image input {
    width: 100%;
    height: 100%;
    opacity: 0;
  }
</style>

<center>
  <form class="form" action="" method="POST" enctype="multipart/form-data">
    <label for="hname">hobby naam:</label>
    <input id="hname" name="hname" type="text" class="hobby"><br>
    <div class="image">
      <p>Klik om iets up te loaden</p>
      <input type="file" class="image" name="fileToUpload" id="fileToUpload"><br>
    </div>
    <input type="submit" value="submit" name="submit">
  </form>
</center>

<?php $this->include("footer"); ?>