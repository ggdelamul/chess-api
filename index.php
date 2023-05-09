<?php
require("./fonction_api.php");
// ggetGameJson();
try {
    if (!empty($_GET['demande'])) {
        $url = explode("/", filter_var($_GET['demande'], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case "parties":
                if (empty($url[1])) {
                    getGameJson();
                } else {
                    getGameJsonGM($url[1]);
                }
                break;
            case "couleur":
                if (empty($url[1])) {
                    throw new Exception("vous n'avez pas renseigné la couleur ");
                } else {
                    getGameJsonCouleur($url[1]);
                }
                break;
            case "detail":
                if (empty($url[1])) {
                    throw new Exception("vous n'avez pas renseigné le grand maitre ");
                } else {   
                    getDetailJsonByGM($url[1]);
                }
                break;
            default: throw new Exception("la demande n'est pas valide ");
        }
    } else {
        throw new Exception("pb récup des données");
    }
} catch (Exception $e) {
    $erreur = [
        'message'=> $e->getMessage(),
        'code'=> $e->getCode()
    ];
    print_r($erreur);
}
