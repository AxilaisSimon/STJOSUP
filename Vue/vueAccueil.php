<?php $titre = "Site Marchand - Accueil"; ?>

<?php ob_start() ?>

<a href="?action=promotion" style="color:#343a40; text-decoration: none;">
    <div class="card">
        <div class="card-body text-center">
            <h2 style="text-transform: uppercase;"><b>Supers promos d'automne !</b></h2>
            <p>Prix de folie sur les tenues, les équipement et accessoires !</p>
            <h3 style="text-transform: uppercase;"><b>Jusqu'à <i style="color:#01ba76;">-80%</i> de récuction</b></h3>
        </div>
    </div>
</a>
<br>

<div class="row">
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <a href="?action=produit&categorie=1"><img src="Contenu/Images/moto-univers.jpg" width="100"></a>
                <b>PIÈCES</b><br>
                MOTO
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <a href="?action=produit&categorie=2"><img src="Contenu/Images/mecaboite-univers.jpg" width="100"></a>
                <b>PIÈCES</b><br>
                MOTO 50CC
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <a href="?action=produit&categorie=3"><img src="Contenu/Images/maxiscooter-univers.jpg" width="100"></a>
                <b>PIÈCES</b><br>
                SCOOTER
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <a href="?action=produit&categorie=4"><img src="Contenu/Images/scooter-univers.jpg" width="100"></a>
                <b>PIÈCES</b><br>
                SCOOTER 50CC
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <a href="?action=produit&categorie=5"><img src="Contenu/Images/mobylette-univers.jpg" width="100"></a>
                <b>PIÈCES</b><br>
                MOBYLETTE
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="card">
            <div class="card-body text-center">
                <a href="?action=produit&categorie=6"><img src="Contenu/Images/offroad-univers.jpg" width="100"></a>
                <b>PIÈCES</b><br>
                TOUT-TERRAIN
            </div>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>