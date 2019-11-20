<?php
// Connexion à la base de données
require "Modele/bdd.php";

// Appel les controleurs
require "Controleur/controleurAccueil.php";
require "Controleur/controleurErreur.php";
require "Controleur/controleurProduit.php";
require "Controleur/controleurUnProduit.php";
require "Controleur/controleurSousRecherche.php";
require "Controleur/controleurPromotion.php";
require "Controleur/controleurAide.php";
require "Controleur/controleurConnexion.php";
require "Controleur/controleurEspaceMembre.php";
require "Controleur/controleurCreerCompte.php";

// Démarrer la session
session_start();

// Routeur en fonction du $_GET['action']
try
{
    if(isset($_GET['action']))
    {
        if($_GET['action'] == "produit")
        {
            $categorie = $_GET['categorie'];
            Produit($categorie);            
        }
        elseif($_GET['action'] == "unproduit")
        {
            $produit = $_GET['produit'];
            UnProduit($produit);
        }
        elseif($_GET['action'] == "sous_recherche")
        {
            $id = $_GET['id'];
            $categorie = $_GET['categorie'];
            SousRecherche($id, $categorie);
        }
        elseif($_GET['action'] == "promotion")
        {
            Promotion();
        }
        elseif($_GET['action'] == "aide")
        {
            Aide();
        }
        elseif($_GET['action'] == "connexion")
        {                    
            if(!isset($_SESSION['id']))
            {
                Connexion();
            }
            else
            {
                EspaceMembre();
            }            
        }
        elseif($_GET['action'] == "seconnecter")
        {
            $ndc = $_POST['ndc'];
            $mdp = $_POST['mdp'];
            SeConnecter($ndc, $mdp);
        }
        elseif($_GET['action'] == "deconnexion")
        {
            session_start();
            session_unset();
            session_destroy();
            header('Location: index.php');
            exit();          
        }
        elseif($_GET['action'] == "creercompte")
        {
            CreerCompte();
        }
        elseif($_GET['action'] == "secreercompte")
        {
            $ndc = $_POST['ndc'];
            $mdp = $_POST['mdp'];
            $mdp_c = $_POST['mdp_c'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $civilite = $_POST['civilite'];
            $parrainage = $_POST['parrainage'];
            SeCreerCompte($ndc, $mdp, $mdp_c, $nom, $prenom, $civilite, $parrainage);
            header('Location: index.php?action=connexion');
        }
        elseif($_GET['action'] == "modifierinformation")
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['email'];
            ModifierInformations($nom, $prenom, $mail);
            header('Location: index.php?action=connexion&list=modifier_informations');
        }
        elseif($_GET['action'] == "ajouteradresse")
        {
            $id = $_SESSION['id'];
            $ville = $_POST['ville'];
            $adresse = $_POST['adresse'];
            $cp = $_POST['cp'];
            AjouterAdresse($id, $ville, $adresse, $cp);
            header('Location: index.php?action=connexion&list=mes_adresse');
        }
        elseif($_GET['action'] == "ajouterpanier")
        {
            $id_client = $_POST['idClient'];
            $id_produit = $_POST['idProduit'];
            $nom_produit = $_POST['nomProduit'];
            $prix_produit = $_POST['prixProduit'];
            AjouterPanier($id_client, $id_produit, $nom_produit, $prix_produit);
            header('Location: ' . $_SERVER['HTTP_REFERER'] );
        }
    }
    else
    {
        Accueil();
    }
}
catch (Exception $e)
{
    erreur($e->getMessage());
}