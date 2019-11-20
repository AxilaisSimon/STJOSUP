<?php $titre = "Site Marchand - Espace Membre"; ?>
<?php ob_start() ?>

<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h4><?= ucwords($_SESSION['prenom']) ?>,</h4>
            </div>                
                <div class="card-header">Produits</div>
                <ul class="list-group list-group-flush">
                    <a href="index.php?action=connexion&list=mon_panier"><li class="list-group-item">Mon panier</li></a>
                    <a href="index.php?action=connexion&list=mes_commandes"><li class="list-group-item">Mes commandes</li></a>
                </ul>                       
                <div class="card-header">Réduction</div>
                <ul class="list-group list-group-flush">
                    <a href="index.php?action=connexion&list=ma_cagnotte"><li class="list-group-item">Ma cagnotte</li></a>
                    <a href="index.php?action=connexion&list=mon_parrainage"><li class="list-group-item">Parrainage</li></a>
                </ul>
                <div class="card-header">Mes informations</div>
                <ul class="list-group list-group-flush">
                    <a href="index.php?action=connexion&list=modifier_informations"><li class="list-group-item">Modifier mes informations</li></a>
                    <a href="index.php?action=connexion&list=mes_adresse"><li class="list-group-item">Mes adresses</li></a>
                </ul>           
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-body">
            <?php
            if(empty($_GET['list']))
            {
                echo "Content de vous revoir parmis nous !";
            }
            elseif($_GET['list'] == "mon_panier")
            {
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom produit</th>
                        <th scope="col">Prix</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($paniers as $panier): ?>
                    <tr>
                        <td><?= $panier['nom_produit']; ?></td>
                        <td><?= $panier['prix_produit']; ?>€</td>
                        <td><i class="fas fa-trash"></i></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <table class="table table-dark" style="margin-bottom:0px;">
                <tbody>
                <?php foreach($totals as $total): ?>
                    <tr>
                        <td>Montant total de votre panier : <?= $total['total']; ?>€</td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php

            }
            elseif($_GET['list'] == "mes_commandes")
            {
                echo "Mes commandes";
            }
            elseif($_GET['list'] == "ma_cagnotte")
            {
            ?>
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Votre cagnotte est de : <?php foreach($cagnottes as $cagnotte): echo $cagnotte['argent_disponible'] . " €"; endforeach;?></h3>
                        <p style="margin-bottom:0px; ">Elle vous permet de grosses réductions sur vos paniers !</p>
                    </div>
                </div>                
            <?php
            }
            elseif($_GET['list'] == "mon_parrainage")
            {
            ?>
                <div class="card">
                    <div class="card-body text-center">
                        <h3>Votre code parrainage est : <?= $_SESSION['parrainage'] ?></h3>
                        <p style="margin-bottom:0px; ">Il vous permet de gagner de l'argent sur votre cagnotte.</p>
                    </div>
                </div>                
            <?php
            }
            elseif($_GET['list'] == "modifier_informations")
            {
            ?>
                <form action="index.php?action=modifierinformation" method="post">
                    <label>Nom</label>
                    <input class="form-control text-center" name="nom" type="text" value="<?= $_SESSION['nom']; ?>" required>
                    <label>Prenom</label>
                    <input class="form-control text-center" name="prenom" type="text" value="<?= $_SESSION['prenom']; ?>" required>
                    <label>Adresse mail</label>
                    <input class="form-control text-center" name="email" type="mail" value="<?= $_SESSION['email']; ?>" required><br>
                    <button type="submit" class="btn btn-block btn-primary">Modifier les informations</button>
                </form>
                <br>
                <i style="margin-bottom: 0px;">Les informations seront mises à jour à votre prochaine connexion.</i>               
            <?php
            }
            elseif($_GET['list'] == "mes_adresse")
            {
            ?>
                <form action="index.php?action=ajouteradresse" method="post">
                    <label>Adresse</label>
                    <input class="form-control text-center" name="adresse" type="text" required>
                    <label>Ville</label>
                    <input class="form-control text-center" name="ville" type="text" required>
                    <label>Code postal</label>
                    <input class="form-control text-center" name="cp" type="text" required><br>
                    <button type="submit" class="btn btn-block btn-primary">Ajouter une adresse</button>
                </form>
                <br>                                             
                    <?php
                        foreach($adresses as $adresse):
                    ?>
                    <div class="card"> 
                        <div class="card-body">
                            Ville : <?= $adresse['ville']?><br>
                            Adresse : <?= $adresse['adresse']?><br>
                            Code postal : <?= $adresse['code_postal']?>
                        </div>
                    </div> 
                    <?php
                        endforeach;
                    ?>               
            <?php
            }
            ?>
            </div>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>