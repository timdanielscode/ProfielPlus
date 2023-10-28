<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([

    'assets/style.css'
    
]); ?>

<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>


<form action="" method="POST" enctype="multipart/form-data">
  Upload Image:
  <label for="hname">hobby naam:</label>
  <input id="hname" name="hname" type="text" class="hobby">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="submit" name="submit">
</form>




<?php $this->include("footer"); ?>