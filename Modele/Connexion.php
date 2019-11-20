<?php
// Connexion à l'espace membre du site internet
function SeConnecter($ndc, $mdp)
{
    $bdd = getBdd();
    $membre = $bdd->query("SELECT * FROM client WHERE email = '" . $ndc . "' AND mdp = '" . md5($mdp) . "'");
    $membre->execute();
    
    if ($membre->rowCount() == 1)
    {
        session_start();
        $membre_exist = $membre->fetch();
        $_SESSION['id'] = $membre_exist['id'];
        $_SESSION['id_adresse'] = $membre_exist['id_adresse'];
        $_SESSION['civilite'] = $membre_exist['civilite'];
        $_SESSION['email'] = $membre_exist['email'];
        $_SESSION['prenom'] = $membre_exist['prenom'];
        $_SESSION['nom'] = $membre_exist['nom'];
        $_SESSION['ddn'] = $membre_exist['ddn'];
        $_SESSION['parrainage'] = $membre_exist['parrainage'];

        $cagnotte = $bdd->query("SELECT * FROM cagnotte WHERE id_client = '" . $_SESSION['id'] . "'");
        $cagnotte->execute();

        if($cagnotte->rowCount() == 0)
        {
            $cagnotte = $bdd->prepare("INSERT INTO cagnotte(id_client, nb_code, argent_code) VALUES (:id_client, :nb_code, :argent_code)");
            $cagnotte->execute(array(
                    'id_client' => $_SESSION['id'],
                    'nb_code' => 0,
                    'argent_code' => 2
                    ));
        }

        header('Location: index.php?action=connexion');
        exit();
    }
    else
    {
        header('Location: index.php');
    }
}

function ModifierInformations($nom, $prenom, $mail)
{
    $bdd = getBdd();
    $modifier = $bdd->prepare("UPDATE client SET email= :email ,prenom= :prenom ,nom= :nom WHERE id = :id");
    $modifier->execute(array(
        'id' => $_SESSION['id'],
        'email' => $mail,
        'nom' => $nom,
        'prenom' => $prenom
        ));
}