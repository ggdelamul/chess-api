<?php
function connexion()
{
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=chess_api", "root", "");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connexion ok";
    } catch (Exception $e) {
        die($erreur_sql = 'Erreur connect bd: ' . $e->getMessage());
    }
    if (isset($erreur_sql)) {
        echo $erreur_sql;
    }
    return $bdd;
}
function logs($bdd)
{
    try {
        $sql = "SELECT * FROM administration";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
function addGm($connect)
{
    try {
        $insertSql = "INSERT INTO grand_maitre (nom, prenom, biographie) VALUES(:nom,:prenom,:biographie)";
        $insert = $connect->prepare($insertSql);
        $insert->execute(array(
            "nom" => $_POST["name"],
            "prenom" => $_POST["firstname"],
            "biographie" => $_POST["bio"],
        ));
    } catch (Exception $e) {
        echo "probleme dans l'envoi de donnée";
        var_dump($e);
    }
}

function addColor()
{
    $color ="";
    if($_POST['']){

    }



}