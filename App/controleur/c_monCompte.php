<?php

include 'App/modele/M_client.php';

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
        } else {
            M_Client::creerClient($nomPrenom_client, $pseudo_client, $mdp_client, $email_client, $adresse_client, $cp_client, $ville_client);
            afficheMessage("Félicitations, votre compte a bien été créé");
            $uc = '';
        }
        break;
}







