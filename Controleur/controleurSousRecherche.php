<?php
require "Modele/SousRecherche.php";
// Fonction Produit()
function SousRecherche($id, $categorie)
{
    $souscategories = getSousProduit($id, $categorie);
    $titrecategories = getTitreCategorie2($categorie);
    $titresouscategories = getTitreSousCategorie($id);
    require "Vue/vueSousRecherche.php";
}