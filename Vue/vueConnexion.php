<?php $titre = "Site Marchand - Connexion"; ?>
<?php ob_start() ?>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header text-center">
                <h4 style="margin-bottom: 0px;">CONNEXION</h4>
            </div>
            <div class="card-body">
                <form action="index.php?action=seconnecter" method="post">
                    <input class="form-control text-center" name="ndc" type="mail" placeholder="Entrer votre adresse mail" required>
                    <br>
                    <input class="form-control text-center" name="mdp" type="password" placeholder="Entrer votre mot de passe" required>
                    <hr>
                    <button type="submit" name="btn-connexion" class="btn btn-primary btn-block">Se connecter</button>
                </form>        
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header text-center">
                <h4 style="margin-bottom: 0px;">PAS ENCORE DE COMTPE ?</h4>
            </div>
            <div class="card-body text-center">
                <i class="fas fa-users" style="font-size: 4em;"></i>
                <p>Nous savions que vous alliez faire le bon choix. Rejoignez-nous, c'est par ici.</p>
                <a href="index.php?action=creercompte"><button type="button" name="btn-connexion" class="btn btn-dark btn-block" style="margin-top: 26px;">Créer un compte</button></a>
            </div>
        </div>
    </div>
</div>


<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>