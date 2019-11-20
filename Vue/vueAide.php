<?php $titre = "Site Marchand - Aide"; ?>
<?php ob_start() ?>

<div class="card">
    <div class="card-header text-center">
        <h4 style="margin-bottom: 0px;">ENVOYER UN EMAIL AU SERVICE CLIENT</h4>
        <i>Nous sommes disponibles du lundi au vendredi de 8h à 19h.</i>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Informations personnelles</label>
            <input type="text" class="form-control" placeholder="Prénom"><br>
            <input type="text" class="form-control" placeholder="Nom"><br>
            <input type="email" class="form-control" placeholder="Adresse mail"><br>
            <label>Indiquez-nous la raison pour laquelle vous nous contacter. Cela nous permettra de vous répondre au plus vite.</label>
            <div class="form-group">
                <select class="form-control">
                    <option>Choissisez une raison</option>
                    <option>Question sur un produit</option>
                    <option>Commande</option>
                    <option>Livraison</option>
                    <option>Retours</option>
                    <option>Bugs</option>
                </select>
            </div>
            <label>Votre message</label>
            <input type="text" class="form-control" placeholder="Objet"><br>
            <div class="form-group">
                <textarea class="form-control" rows="4" placeholder="Message"></textarea>
            </div>
            <button type="button" class="btn btn-primary btn-block">Envoyer</button>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>