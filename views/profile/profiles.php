<?php $this->include("headerOpen"); ?>

<?php Stylesheet::add([

    '/assets/style.css'
]); ?>

<?php $this->include("headerClose"); ?>
<?php $this->include("navbar"); ?>

<table>
    <tr>
        <th></th>
        <th>Voornaam</th>
        <th>Achternaam</th>
    </tr>
    <?php foreach($users as $user) { ?>
        <tr>
            <td><a href="/profile/<?php echo $_SESSION['userId']; ?>?view=<?php echo $user['id']; ?>"><?php echo substr($user['firstName'], 0, 1); ?><?php echo substr($user['lastName'], 0, 1); ?></a></td>
            <td><?php echo $user['firstName']; ?></td>
            <td><?php echo $user['lastName']; ?></td>
        </tr>
    <?php } ?>
</table>

<?php $this->include("footer"); ?>