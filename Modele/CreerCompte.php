<?php
// Inscription au site internet
function SeCreerCompte($ndc, $mdp, $mdp_c, $nom, $prenom, $civilite, $parrainage)
{
    $bdd = getBdd();
    $membre = $bdd->query("SELECT * FROM client WHERE email = '" . $ndc . "'");
    $membre->execute();
    
    if ($membre->rowCount() == 0)
    {
        if($mdp == $mdp_c)
        {
            $inscrire = $bdd->prepare("INSERT INTO client(civilite, email, prenom, nom, mdp, parrainage) VALUES (:civilite, :ndc, :prenom, :nom, :mdp, :parrainage)");
            $inscrire->execute(array(
                'civilite' => $civilite,
                'ndc' => $ndc,
                'prenom' => $prenom,
                'nom' => $nom,
                'mdp' => md5($mdp),
                'parrainage' => "CODE_" . $civilite . $prenom[0] . $nom[0] . $prenom[1] . $nom[1]
                ));  
                
                if($parrainage != "")
                {
                    $code = $bdd->prepare("UPDATE cagnotte
                                        SET nb_code = nb_code+1
                                        WHERE id_client = (SELECT id 
                                                            FROM client                 
                                                            WHERE parrainage = '" . $parrainage . "')");
                    $code->execute();                        
                }
            
            if($membre->rowCount() == 2)
            {
                $delete = $bdd->prepare("DELETE t1 
                                        FROM client AS t1, client AS t2
                                        WHERE t1.id > t2.id
                                        AND t1.email = t2.email
                                        AND t1.nom = t2.nom
                                        AND t1.prenom = t2.prenom");
                $delete->execute(); 
                header('Location: index.php?action=connexion');               
            }          
        }
    }
    else
    {
        header('Location: index.php');
    }
}


