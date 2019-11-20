<?php
// Retourne toutes les promotions
function getPromotion()
{
    $bdd = getBdd();
    $promotions = $bdd->query("SELECT *,produit.id AS id_produit,ROUND(produit.prix-(produit.prix*promotion.pourcentage/100)) AS Prix_Avec_Promotion
                                FROM produit
                                    INNER JOIN promotion ON
                                    (produit.id_promotion = promotion.id)
                                WHERE promotion.id != 10");

    return $promotions;
}
