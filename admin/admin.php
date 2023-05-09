<?php
$is_connect=false;
require('include/header.php');
?>
<main>
    <div class="container">
        <div class="text-center">
            <h2>Log in</h2>
        </div>
        <?php
        require('controlleur/index_controlleur.php');
        ?>
        <div class="form-container bd-solid bd-blue p-5">
            <form class="form-material" method="POST" action="controlleur/index_controlleur.php">
                <div class="form-field">
                    <input type="text" id="name" class="form-control" name='user' />
                    <label for="name">nom utilisateur</label>
                </div>
                <div class="form-field">
                    <input type="text" id="name" class="form-control" name='mdp' />
                    <label for="name">mot de passe</label>
                </div>
                <button type="submit" name="submit" class="btn rounded-1 blue btn-press">Se connecter</button>
                <form>
        </div>
    </div>
</main>
<?php
require('include/footer.php');
?>