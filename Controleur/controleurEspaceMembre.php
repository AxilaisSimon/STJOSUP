<?php
require "Modele/EspaceMembre.php";
// Fonction EspaceMembre()
function EspaceMembre()
{
    $cagnottes = getCagnotte($_SESSION['id']);
    $adresses = getAdresse($_SESSION['id']);
    $paniers = getPanier($_SESSION['id']);
    $totals = getTotal($_SESSION['id']);
    require "Vue/vueEspaceMembre.php";
}