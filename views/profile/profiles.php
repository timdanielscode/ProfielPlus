<?php $this->include("headerOpen"); ?>
<?php Stylesheet::add([
    
    '/assets/default.css',
    '/assets/navbar.css',
    '/assets/footer.css',
    '/assets/style.css',
    '/assets/hobbyedit.css',
    '/assets/pofiles.css'
]); 
Script::add([
    '/assets/navbar.js'
]);
?>

<!-- including the head and the navbar because those are made in a different file -->
<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<main>
<table>
    <tr>
        <th></th>
        <th>Voornaam</th>
        <th>Achternaam</th>
    </tr>
    <?php foreach ($users as $user) { ?>
        <tr>
            <!-- the first column of this table will be the initials of the user and can be clicked on to view his portfolio -->
            <td><a href="/profile/<?php echo $_SESSION['userId']; ?>?view=<?php echo $user['id']; ?>"><?php echo substr($user['firstName'], 0, 1); ?><?php echo substr($user['lastName'], 0, 1); ?></a></td>
            <!-- the second and third columns are usedto display the users first and lastname -->
            <td><?php echo $user['firstName']; ?></td>
            <td><?php echo $user['lastName']; ?></td>
        </tr>
    <?php } ?>
</table>
</main>

<?php $this->include("footer"); ?>
