<?php $titre = "Site Marchand - Produits"; ?>

<?php ob_start() ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: #FAFAFA; border: 1px solid rgba(0, 0, 0, 0.125);">
        <li class="breadcrumb-item active" aria-current="page"><a href="index.php">ACCUEIL</a></li>
        <?php foreach ($titrecategories as $titrecategorie): ?>
            <li class="breadcrumb-item active" aria-current="page"><a href="?action=produit&categorie=<?= $titrecategorie['id'] ?>"><?= $titrecategorie['libelle'] ?></a></li>
        <?php endforeach; ?> 
        <?php foreach ($titresouscategories as $titresouscategorie): ?>
            <li class="breadcrumb-item active" style="text-transform: uppercase;" aria-current="page"><?= $titresouscategorie['libelle'] ?></li>
        <?php endforeach; ?> 
    </ol>
</nav>

<div class="row">
    <?php foreach ($souscategories as $souscategorie): ?>   
    <div class="col-lg-3" style="margin-bottom:20px;">
        <div class="card text-center">
            <a href="?action=unproduit&produit=<?= $souscategorie['id_produit'] ?>">
                <img src="Contenu/Images/<?= $souscategorie['nom_image'] ?>" alt="Pièce de moto" width="100%">
            </a>                   
            <div class="card-header" style="text-transform: uppercase;">
                <?= $souscategorie['nom'] ?>
            </div>
            <div class="card-body">                       
            <?php
                if($souscategorie['Prix_Avec_Promotion'] == $souscategorie['prix'])
                {
                ?>
                <b><?= $souscategorie['prix'] ?> €</b> <br><br>
                <?php
                }
                else
                {
                ?>
                <b style="text-decoration:line-through;"><?= $souscategorie['prix'] ?> €</b><b style="color:#01ba76;"> <?= $souscategorie['Prix_Avec_Promotion'] ?> € </b><br><b class="h5">-<?= $souscategorie['pourcentage'] ?>%</b>
                <?php
                }
                if($souscategorie['stock'] != 0)
                {
                    echo '<button type="button" class="btn btn-info btn-block" style="margin-top:5px;">Ajouter</button>';                               
                }
                else
                {
                    echo '<button type="button" class="btn btn-info btn-block" style="margin-top:5px;" disabled>Ajouter</button>';
                }
            ?>
            </div>
            <div class="card-footer">
                <?php
                    if($souscategorie['stock'] != 0)
                    {
                        echo '<i class="far fa-check-circle"></i> En stock';                               
                    }
                    else
                    {
                        echo '<i class="far fa-times-circle"></i> Indisponible';
                    }
                ?>
            </div>
        </div>              
    </div>
    <?php endforeach; ?>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>