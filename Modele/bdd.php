<?php
// Connexion à la base de données
function getBdd() 
{
    $bdd = new PDO('mysql:host=localhost;dbname=site_s.marchand;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}