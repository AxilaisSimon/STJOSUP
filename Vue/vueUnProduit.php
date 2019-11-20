<?php $titre = "Site Marchand - Produit"; ?>

<?php ob_start() ?>
<?php foreach ($unproduit as $unproduit): ?>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 text-justify">
                <h4><?= $unproduit['nom'] ?></h4>
                <hr>
                <?= $unproduit['description'] ?>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="Contenu/Images/<?= $unproduit['nom_image'] ?>" alt="Pièce de moto" width="100%">
                </div>              
            </div>
            <div class="col-lg-4">
                <div class="card text-center" style="height:100%;">
                    <div class="card-body">
                    <hr>
                        <?php
                        if($unproduit['Prix_Avec_Promotion'] == $unproduit['prix'])
                        {
                        ?>
                            <h2><b><?= $unproduit['prix'] ?> €</b></h2><br>
                        <?php
                        }
                        else
                        {
                        ?>                                             
                            <h2><b style="text-decoration:line-through;"><?= $unproduit['prix'] ?> €</b><b style="color:#01ba76;"> <?= $unproduit['Prix_Avec_Promotion'] ?> € </b><br><b class="h5">-<?= $unproduit['pourcentage'] ?>%</b></h2>
                        <hr>
                        <?php
                        }
                        if($unproduit['stock'] != 0)
                        {                            
                            echo '
                            <form method="post" action="index.php?action=ajouterpanier">
                                <input type="hidden" name="idProduit" value="' . $unproduit['id_produit'] . '">
                                <input type="hidden" name="idClient" value="' . $_SESSION['id'] . '">
                                <input type="hidden" name="nomProduit" value="' . $unproduit['nom'] . '">
                                <input type="hidden" name="prixProduit" value="' . $unproduit['Prix_Avec_Promotion'] . '">
                                <button type="submit" class="btn btn-info btn-block" style="margin-top:5px;">Ajouter</button>
                            <form>
                            <hr>
                            <i class="far fa-check-circle"></i> En stock
                            <hr>
                            ';                               
                        }
                        else
                        {
                            echo '<button type="button" class="btn btn-info btn-block" style="margin-top:5px;" disabled>Ajouter</button>
                            <hr>
                            <i class="far fa-times-circle"></i> Indisponible
                            <hr>';
                        }
                    ?> 
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br> 

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <b>Caractéristiques :</b> 
                <hr>
                <b>Genre :</b>  
                <?php
                    if($unproduit['genre'] == 1)
                    {
                        echo ' Homme';                               
                    }
                    else
                    {
                        echo ' Femme';
                    }
                ?>
                <br>
                <b>Couleur :</b> <?= $unproduit['couleur'] ?><br>
                <b>Taille :</b> <?= $unproduit['taille'] ?><br>
                <b>Homologué :</b> 
                <?php
                    if($unproduit['homologue'] == 1)
                    {
                        echo ' Oui';                               
                    }
                    else
                    {
                        echo ' Non';
                    }
                ?>
                <br>
                <b>Référence :</b> <?= $unproduit['reference'] ?><br>
                <b>Poids :</b> <?= $unproduit['poids'] ?> Kg
                <hr>
            </div>
            <div class="col-lg-6">
                <b>Les clients ont également aimé :</b> 
                <br><br>
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>       
            </div>
        </div>
    </div>
</div>

<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>