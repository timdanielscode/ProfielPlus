<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add(['assets/style.css']); ?>
<?php $this->include("headerClose"); ?>


<h1>Werkervaring overzicht</h1>
<table>
    <tr>
        <th>Werkgever</th>
        <th>Functie</th>
        <th>Startdatum</th>
        <th>Einddatum</th>
        <th>Details</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach($jobExperiences as $key => $value) { ?>
    <tr>
        <td><?php echo $value['employer']; ?></td>
        <td><?php echo $value['job_title']; ?></td>
        <td><?php echo $value['start_date']; ?></td>
        <td><?php echo $value['end_date']; ?></td>
        <td><?php echo $value['details']; ?></td>
        <td><form action="/profile/<?php echo $_SESSION['userId']; ?>/work-experience/edit" method="GET"><input type="hidden" name="id" value="<?php echo $value['id']; ?>"/><input type="submit" name="edit" value="Gegevens aanpassen"/></form></td>
        <td><form action="/profile/<?php echo $_SESSION['userId']; ?>/work-experience/delete" method="POST"><input type="hidden" name="id" value="<?php echo $value['id']; ?>"/><input type="submit" name="delete" value="Verwijderen"/></form></td>
    </tr>
    <?php } ?>
</table> 


<?php $this->include("footer"); ?>