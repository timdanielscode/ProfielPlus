<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add(['assets/style.css']); ?>
<?php $this->include("headerClose"); ?>

<h1>Voeg werkervaring toe</h1>
<form action="" method="POST">
    <div class="form-parts">
        <label for="employer">Werkgever:</label>
        <input id="employer" name="employer"/>
    </div>
    <div class="form-parts">
        <label for="startDate">Startdatum:</label>
        <input id="startDate" type="date" name="startDate">
    </div>
    <div class="form-parts">
        <label for="endDate">Einddatum:</label>
        <input id="endDate" type="date" name="endDate">
    </div>
    <input type="submit" name="submit" value="Voeg toe"/>
</form>

