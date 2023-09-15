<?php 

require_once "includes/database.php";
session_start();


$query = "SELECT * FROM users WHERE email=? AND password=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$_POST['email'], $_POST['password']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user) {
    $_SESSION['logedInUser'] = $user[$ID];
    header("location home.php");
} else {
    header("location login.php");
    die();
}

?>