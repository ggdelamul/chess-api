<?php
session_start();
require 'fonction.php';
$connexion = connexion();
$logs = logs($connexion);
if (isset($_POST['submit'])) {
    if ($_POST['user'] == $logs['user'] && $_POST['mdp'] == $logs['password']) {
        $_SESSION = $logs;
        header('location:../add.php');
    } else {
        echo "c'est pas bon ";
        header('location:../admin.php');
    }
}
