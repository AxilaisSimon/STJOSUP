<?php $titre = "Site Marchand - Produits"; ?>

<?php ob_start() ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb" style="background-color: #FAFAFA; border: 1px solid rgba(0, 0, 0, 0.125);">
        <li class="breadcrumb-item active" aria-current="page"><a href="index.php">ACCUEIL</a></li>
        <?php foreach ($titrecategories as $titrecategorie): ?>
            <li class="breadcrumb-item active" aria-current="page"><?= $titrecategorie['libelle'] ?></li>
        <?php endforeach; ?> 
    </ol>
</nav>

<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
            <b style="text-transform: uppercase;">catégories :</b>
            <hr>
                <ul style="margin-bottom:0px;">
                    <?php foreach ($souscategories as $souscategorie): ?>
                       <li style="text-transform: uppercase;"><a href="?action=sous_recherche&id=<?= $souscategorie['id'] ?>&categorie=<?= $_GET['categorie'] ?>"><?= $souscategorie['libelle'] ?></a></li> 
                    <?php endforeach; ?>            
                </ul>               
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <?php foreach ($produits as $produit): ?>
            <div class="col-lg-4" style="margin-bottom:20px;">
                <div class="card text-center">
                    <a href="?action=unproduit&produit=<?= $produit['id_produit'] ?>">
                        <img src="Contenu/Images/<?= $produit['nom_image'] ?>" alt="Pièce de moto" width="100%">
                    </a>                   
                    <div class="card-header" style="text-transform: uppercase;">
                        <?= $produit['nom'] ?>
                    </div>
                    <div class="card-body"> 
                    <?php
                        if($produit['Prix_Avec_Promotion'] == $produit['prix'])
                        {
                        ?>
                        <b><?= $produit['prix'] ?> €</b> <br><br>
                        <?php
                        }
                        else
                        {
                        ?>
                        <b style="text-decoration:line-through;"><?= $produit['prix'] ?> €</b><b style="color:#01ba76;"> <?= $produit['Prix_Avec_Promotion'] ?> € </b><br><b>-<?= $produit['pourcentage'] ?>%</b>
                        <?php
                        }
                        if($produit['stock'] != 0)
                        {
                            echo '
                            <form method="post" action="index.php?action=ajouterpanier">
                                <input type="hidden" name="idProduit" value="' . $produit['id_produit'] . '">
                                <input type="hidden" name="idClient" value="' . $_SESSION['id'] . '">
                                <input type="hidden" name="nomProduit" value="' . $produit['nom'] . '">
                                <input type="hidden" name="prixProduit" value="' . $produit['Prix_Avec_Promotion'] . '">
                                <button type="submit" class="btn btn-info btn-block" style="margin-top:5px;">Ajouter</button>
                            <form>
                            ';                               
                        }
                        else
                        {
                            echo '<button type="button" class="btn btn-info btn-block" style="margin-top:5px;" disabled>Ajouter</button>';
                        }
                    ?>                                          
                    </div>
                    <div class="card-footer">
                        <?php
                            if($produit['stock'] != 0)
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
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>