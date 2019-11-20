<?php
require "Modele/Promotion.php";
// Fonction Promotion()
function Promotion()
{
    $promotions = getPromotion();
    require "Vue/vuePromotion.php";
}