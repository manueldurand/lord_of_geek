<?php

include 'App/modele/M_client.php';
include ('App/modele/M_Pseudos.php');
include ('App/modele/M_email_verif.php');

/**
 * Controleur pour l'inscription
 * @author Loic LOG
 */
switch ($action) {
    case 'confirmerInscription' :
        $nomPrenom_client = filter_input(INPUT_POST, 'nomPrenom');
        $pseudo_client = filter_input(INPUT_POST, 'pseudo');
        $mdp_client = filter_input(INPUT_POST, 'mdp');
        $email_client = filter_input(INPUT_POST, 'email_client');
        $adresse_client = filter_input(INPUT_POST, 'adresse_client');
        $cp_client = filter_input(INPUT_POST, 'cp_client');
        $ville_client = filter_input(INPUT_POST, 'ville_client');
        $errors = M_Client::estValide($nomPrenom_client, $pseudo_client, $mdp_client, $email_client, $adresse_client, $cp_client, $ville_client);
        if (count($errors) > 0) {
            // Si une erreur, on recommence
            afficheErreurs($errors);
        } else if(M_Pseudos::existePseudo($pseudo_client)){
            afficheMessage("ce pseudo existe déjà, si c'est bien vous allez à la  page de connexion. Sinon veuillez choisir un autre pseudo.");
            $uc = 'inscription';
        } else if(M_Emails::existeEmail($email_client)){
            afficheMessage("cet email existe déjà, si c'est bien vous allez à la  page de connexion. Sinon veuillez choisir une autre adresse mail.");
            $uc = 'inscription';
        }
        else {
            try {
                M_Client::creerClient($nomPrenom_client, $pseudo_client, $mdp_client, $email_client, $adresse_client, $cp_client, $ville_client);
                afficheMessage("Félicitations, votre compte a bien été créé") ;
                $uc = '';
            } catch (\PDOException $e) {
                // echo $e;
                afficheMessage("erreur, veuillez recommencer la saisie");
                die;        
            }            
        }
        break;
    case 'confirmerConnexion':
        $pseudo_client = trim(filter_input(INPUT_POST, 'pseudo_client'));
        $mdp_client = filter_input(INPUT_POST, 'mdp_client');
        if(M_Client::clientExiste($pseudo_client)){
            afficheMessage('existe');
        } else afficheMessage('nexiste pas ');
            
        }







