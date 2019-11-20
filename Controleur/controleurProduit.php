<?php
require "Modele/Produit.php";
// Fonction Produit()
function Produit($categorie)
{
    $titrecategories = getTitreCategorie($categorie);
    $produits = getProduit($categorie);
    $souscategories = getSousCategorie();
    require "Vue/vueProduit.php";
}