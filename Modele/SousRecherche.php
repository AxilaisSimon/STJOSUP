<?php
// Retourne tout les produits de la sous recherche
function getSousProduit($id, $categorie){
    $bdd = getBdd();
    $sous_produits = $bdd->query("SELECT produit.id as id_produit, id_categorie,pourcentage, id_souscategorie,ROUND(produit.prix-(produit.prix*promotion.pourcentage/100)) AS Prix_Avec_Promotion
                                , nom, description, nom_image,
                                 prix, stock, reference, homologue, taille, couleur, poids, matiere, genre FROM produit
	                                INNER JOIN sous_categorie ON
                                    (produit.id_souscategorie = sous_categorie.id)
                                    INNER JOIN promotion ON
                                    (produit.id_promotion = promotion.id)
                                  WHERE sous_categorie.id = ". $id ." AND produit.id_categorie = ". $categorie .";");

    return $sous_produits;
}

// Retourne le titre de la catégorie
function getTitreCategorie2($categorie)
{
    $bdd = getBdd();
    $titrecategories = $bdd->query("SELECT id, libelle FROM categorie WHERE id =". $categorie .";");

    return $titrecategories;
}

// Retourne le titre de la sous catégorie
function getTitreSousCategorie($id)
{
    $bdd = getBdd();
    $titrecategories = $bdd->query("SELECT libelle FROM sous_categorie WHERE id =". $id .";");

    return $titrecategories;
}

