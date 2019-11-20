<?php 

function getCagnotte($id)
{
    $bdd = getBdd();
    $cagnottes = $bdd->query("SELECT (nb_code*argent_code) AS argent_disponible FROM cagnotte WHERE id_client = " . $id);

    return $cagnottes;
}

function getAdresse($id)
{
    $bdd = getBdd();
    $adresses = $bdd->query("SELECT * FROM adresse WHERE id_client = " . $id);

    return $adresses;
}

function getPanier($id)
{
    $bdd = getBdd();
    $paniers = $bdd->query("SELECT * FROM panier WHERE id_client = " . $id);

    return $paniers;
}

function getTotal($id)
{
    $bdd = getBdd();
    $totals = $bdd->query("SELECT SUM(prix_produit) AS total FROM panier WHERE id_client = " . $id);

    return $totals;
}

function AjouterAdresse($id, $ville, $adresse, $cp)
{
    $bdd = getBdd();
    $adresse = $bdd->prepare("INSERT INTO adresse(id_client, adresse, code_postal, ville) VALUES ('" . $id . "', '" . $adresse . "', '" . $cp . "', '" . $ville . "')");
    $adresse->execute();
}
?>