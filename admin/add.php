<?php
$is_connect=true;
require('include/header.php');
require('controlleur/add_controlleur.php');

if (!isset($_SESSION['user'])) {
    header('location: admin.php');
}


?>
<main>

    <div class="container">
        <div class="text-center">
            <h2>Ajoutez une partie</h2>
        </div>
    
    <div class="form-container bd-solid bd-blue p-5">
        <form class="form-material" method="POST" action="controlleur/add_controlleur.php">
            <fieldset>
                <h3>Grand maitre</h3>
                <div class="form-field">
                    <input type="text" id="name" class="form-control" name='name' />
                    <label for="name">nom du maitre</label>
                </div>
                <div class="form-field">
                    <input type="text" id="firstname" class="form-control" name='firstname' />
                    <label for="firstname">prénom du maitre</label>
                </div>
                <div class="form-field">
                    <h4>Biographie</h4>
                    <textarea name="bio" id="" cols="30" rows="10"></textarea>
                </div>

            </fieldset>
            <fieldset>
                <h3>Partie</h3>
                <div class="form-field">
                    <input type="text" id="location" class="form-control" name='location' />
                    <label for="name">Localisation</label>
                </div>
                <div class="form-field">
                    <input type="text" id="year" class="form-control" name='year' />
                    <label for="name">Année</label>
                </div>
                <div class="form-field">
                    <input type="text" id="opName" class="form-control" name='opName' />
                    <label for="name">Nom opposant</label>
                </div>
                <div class="form-field">
                    <input type="text" id="opFirstname" class="form-control" name='opFirstname' />
                    <label for="name">Prénom opposant</label>
                </div>
                <div class="form-field">
                    <input type="text" id="fileName" class="form-control" name='fileName' />
                    <label for="name">nom fichier</label>
                    <p>exemple : Magnus Carlsen_vs_Brandon Jacobson_2023.01.03.pgn</p>
                </div>
                <div class="form-field">
                    <label for="select">Couleur joué par le grand maitre</label>
                    <select class="form-control rounded-1" id="select" name="color">
                        <option>blanc</option>
                        <option>noir</option>
                    </select>
                </div>
            </fieldset>
            <button type="submit" name="submit" class="btn rounded-1 blue btn-press my-2">Ajoutez une partie</button>
            <form>
        </div>
    </div>
</main>
<?php
require('include/footer.php');
?>