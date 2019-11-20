<?php
require "Modele/UnProduit.php";
// Fonction Produit()
function UnProduit($produit)
{
    $unproduit = getUnProduit($produit);
    require "Vue/vueUnProduit.php";
}