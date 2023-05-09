<?php
$_connect=false;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/axentix.min.css">
</head>
<body>
    <header>
        <div class="container">
            <form action="controlleur/add_controlleur.php" method="POST">
        <?php 
            if($is_connect == true ){
                echo 
                '<button name="deconnecter" class="btn rounded-1 blue btn-press my-5">Se deconnecter</button>';
            }
        ?>
        </form>
        </div>
        
    </header>