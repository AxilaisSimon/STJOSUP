<?php
// Retourne tout les produits
function getUnProduit($produit){
    $bdd = getBdd();
    $unproduits = $bdd->query("SELECT *,produit.id as id_produit,ROUND(produit.prix-(produit.prix*promotion.pourcentage/100)) AS Prix_Avec_Promotion FROM produit
                                INNER JOIN promotion ON
                                (produit.id_promotion = promotion.id)
                                WHERE produit.id = ". $produit .";");

    return $unproduits;
}