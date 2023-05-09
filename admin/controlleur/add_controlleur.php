<?php
session_start();
require 'fonction.php';
//deconnexion
if(isset($_POST['deconnecter']))
{
    echo "deconnexion";
    session_unset();
    header('location:../admin.php');
}
//connexion bdd
$connexion=connexion();
//ajout d'une partie//////////////////////////////////////////
//récup des infos du formulaire 
if(isset($_POST['submit'])){
     print_r ($_POST);
     addGM($connexion);
     
}
?>