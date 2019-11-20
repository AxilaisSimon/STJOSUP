<?php $titre = "Site Marchand - Créer un compte"; ?>
<?php ob_start() ?>

<div class="card">
    <div class="card-header text-center">
        <h4 style="margin-bottom: 0px;">SE CREER UN COMPTE</h4>
    </div>
    <div class="card-body">
        <form action="index.php?action=secreercompte" method="post">
            <input class="form-control text-center" name="nom" type="text" placeholder="Entrer votre adresse nom" required>
            <br>
            <input class="form-control text-center" name="prenom" type="text" placeholder="Entrer votre adresse prenom" required>
            <br>
            <div class="form-group">
                <select class="form-control" name="civilite">
                    <option value="0">Monsieur</option>
                    <option value="1">Madame</option>
                </select>
            </div>
            <input class="form-control text-center" name="ndc" type="mail" placeholder="Entrer votre adresse mail" required>
            <br>
            <input class="form-control text-center" name="mdp" type="password" placeholder="Entrer votre mot de passe" required>
            <br>
            <input class="form-control text-center" name="mdp_c" type="password" placeholder="Confirmer votre mot de passe" required>
            <br>
            <input class="form-control text-center" name="parrainage" type="text" placeholder="Code de parrainage">
            <hr>
            <button type="submit" name="btn-connexion" class="btn btn-dark btn-block">S'incrire</button>
        </form>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>