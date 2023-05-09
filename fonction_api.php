<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));
function sendJson($infos)
{
    header("Access-Control-Allow-Origin:*");
    header("Content-type: application/json");
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}
function connexion()
{
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=chess_api", "root", "");
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connexion ok";
    } catch (Exception $e) {
        die($erreur_sql = 'Erreur connect bd: ' . $e->getMessage());
    }
    if (isset($erreur_sql)) {
        echo $erreur_sql;
    }
    return $bdd;
}
//affichage toutes les parties
function getGameJson()
{
    $connexion = connexion();
    $req = " SELECT 
    partie.id,
    lieu,
    nom,
    prenom,
    annee,
    nom_adversaire,
    prenom_adversaire,
    nom_couleur,
    lien_download
     FROM partie 
     INNER JOIN grand_maitre ON grand_maitre.id= partie.id_nom_maitre 
     INNER JOIN couleur_joue ON couleur_joue.id= partie.id_nom_couleur";
    $stmt = $connexion->prepare($req);
    $stmt->execute();
    $parties = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($parties);
    sendJson($parties);
}
//affiche les parties par grand_maitre
function getGameJsonGM($nom_GM)
{
    $connexion = connexion();
    $req = "SELECT 
    partie.id,
    lieu,
    nom,
    prenom,
    annee,
    nom_adversaire,
    prenom_adversaire,
    nom_couleur,
    lien_download
     FROM partie 
     INNER JOIN grand_maitre ON grand_maitre.id= partie.id_nom_maitre 
     INNER JOIN couleur_joue ON couleur_joue.id= partie.id_nom_couleur
    WHERE nom = :nom
    ";
    $stmt = $connexion->prepare($req);
    $stmt->bindValue(":nom", $nom_GM, PDO::PARAM_STR);
    $stmt->execute();
    $parties = $stmt->fetchAll(PDO::FETCH_ASSOC);
    sendJson($parties);
}
//affiche les parties par couleur 
function getGameJsonCouleur($nom_couleur)
{
    $connexion = connexion();
    $req = "SELECT 
    partie.id,
    lieu,
    nom,
    prenom,
    annee,
    nom_adversaire,
    prenom_adversaire,
    nom_couleur,
    lien_download
     FROM partie 
     INNER JOIN grand_maitre ON grand_maitre.id= partie.id_nom_maitre 
     INNER JOIN couleur_joue ON couleur_joue.id= partie.id_nom_couleur
    WHERE nom_couleur = :nom_couleur
    ";
    $stmt = $connexion->prepare($req);
    $stmt->bindValue(":nom_couleur", $nom_couleur, PDO::PARAM_STR);
    $stmt->execute();
    $parties = $stmt->fetchAll(PDO::FETCH_ASSOC);
    sendJson($parties);
}
//affiche le détails de chaque GM
function getDetailJsonByGM($nom_GM)
{
    $connexion = connexion();
    $req = "SELECT 
    nom,
    prenom,
    lien_wiki
    FROM grand_maitre
    WHERE nom = :nom
    ";
    $stmt = $connexion->prepare($req);
    $stmt->bindValue(":nom", $nom_GM, PDO::PARAM_STR);
    $stmt->execute();
    $detail = $stmt->fetchAll(PDO::FETCH_ASSOC);
    sendJson($detail);
}
