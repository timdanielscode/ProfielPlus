
<?php 
 
 $this->include("headerOpen");
 Stylesheet::add([
    
    'assets/default.css',
    "assets/navbar.css",
    'assets/form.css',
    'assets/style.css'
  ]);
  
$this->include("headerClose"); 
$this->include("navbar");

?>

<?php echo Message::success('create'); ?>
<?php echo Message::success('update'); ?>
<?php echo Message::success('delete'); ?>

<h1>Werkervaring overzicht</h1>
<table>
    <tr>
        <th>Werkgever</th>
        <th>Functie</th>
        <th>Startdatum</th>
        <th>Einddatum</th>
        <th>Omschrijving</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach($jobExperiences as $key => $value) { ?>
    <tr>
        <td><?php echo $value['employer']; ?></td>
        <td><?php echo $value['job_title']; ?></td>
        <td><?php $dateTime = new DateTime($value['start_date']); echo $dateTime->format('d-m-Y'); ?></td>
        <td><?php $dateTime = new DateTime($value['end_date']); echo $dateTime->format('d-m-Y'); ?></td>
        <td><?php echo $value['details']; ?></td>
        <td><form action="/profile/<?php echo $_SESSION['userId']; ?>/work-experience/edit" method="GET"><input type="hidden" name="id" value="<?php echo $value['id']; ?>"/><input type="submit" name="edit" value="Gegevens aanpassen"/></form></td>
        <td><form action="/profile/<?php echo $_SESSION['userId']; ?>/work-experience/delete" method="POST"><input type="hidden" name="id" value="<?php echo $value['id']; ?>"/><input type="submit" name="delete" value="Verwijderen" onclick="return confirm('Zeker weten verwijderen?')"/></form></td>
    </tr>
    <?php } ?>
</table> 


<?php $this->include("footer"); ?>