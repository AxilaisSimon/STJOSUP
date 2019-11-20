<?php
// Retourne tout les produits
function getProduit($categorie){
    $bdd = getBdd();
    $produits = $bdd->query("SELECT *,produit.id AS id_produit,ROUND(produit.prix-(produit.prix*promotion.pourcentage/100)) AS Prix_Avec_Promotion
                                FROM produit
                                    INNER JOIN promotion ON
                                    (produit.id_promotion = promotion.id)
                                WHERE produit.id_categorie = ". $categorie .";");
    return $produits;
}

// Retourne toutes les catégories
function getSousCategorie()
{
    $bdd = getBdd();
    $souscategories = $bdd->query("SELECT * FROM sous_categorie");

    return $souscategories;
}

// Retourne le titre de la sous catégorie
function getTitreCategorie($categorie)
{
    $bdd = getBdd();
    $titrecategories = $bdd->query("SELECT libelle FROM categorie WHERE id =". $categorie .";");

    return $titrecategories;
}

// Ajoute un produit au panier
function AjouterPanier($id_client, $id_produit, $nom_produit, $prix_produit)
{
    $bdd = getBdd();
    $ajouterpanier = $bdd->prepare("INSERT INTO panier(id_client, id_produit, nom_produit, prix_produit) VALUES (:id_client, :id_produit, :nom_produit, :prix_produit)");
    $ajouterpanier->execute(array(
        'id_client' => $id_client,
        'id_produit' => $id_produit,
        'nom_produit' => $nom_produit,
        'prix_produit' => $prix_produit
    ));
}