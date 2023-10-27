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
    </tr>
    <?php foreach($jobExperiences as $key => $value) { ?>
    <tr>
        <td><?php echo $value['employer']; ?></td>
        <td><?php echo $value['job_title']; ?></td>
        <td><?php echo $value['start_date']; ?></td>
        <td><?php echo $value['end_date']; ?></td>
        <td><?php echo $value['details']; ?></td>
    </tr>
    <?php } ?>
</table> 

<?php $this->include("footer"); ?>