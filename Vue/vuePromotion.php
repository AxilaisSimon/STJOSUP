<?php $titre = "Site Marchand - Promotions"; ?>

<?php ob_start() ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: #FAFAFA; border: 1px solid rgba(0, 0, 0, 0.125);">
        <li class="breadcrumb-item active" aria-current="page"><a href="index.php">ACCUEIL</a></li>
        <li class="breadcrumb-item active" aria-current="page" style="text-transform: uppercase;"><?= $_GET['action'] ?></li>
    </ol>
</nav>

<div class="row">
    <?php foreach ($promotions as $promotion): ?>
    <div class="col-lg-3" style="margin-bottom:20px;">
        <div class="card text-center">
            <a href="?action=unproduit&produit=<?= $promotion['id_produit'] ?>">
                <img src="Contenu/Images/<?= $promotion['nom_image'] ?>" alt="Pièce de moto" width="100%">
            </a>                   
            <div class="card-header" style="text-transform: uppercase;">
                <?= $promotion['nom'] ?>
            </div>
            <div class="card-body">                       
            <?php
                if($promotion['Prix_Avec_Promotion'] == $promotion['prix'])
                {
                ?>
                <b><?= $promotion['prix'] ?> €</b> <br><br>
                <?php
                }
                else
                {
                ?>
                <b style="text-decoration:line-through;"><?= $promotion['prix'] ?> €</b><b style="color:#01ba76;"> <?= $promotion['Prix_Avec_Promotion'] ?> € </b><br><b class="h5">-<?= $promotion['pourcentage'] ?>%</b>
                <?php
                }
                if($promotion['stock'] != 0)
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
                    if($promotion['stock'] != 0)
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