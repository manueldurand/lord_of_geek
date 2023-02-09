<?php

include_once 'App/modele/M_client.php';
include_once('App/modele/M_Pseudos.php');
include_once('App/modele/M_email_verif.php');
include_once('App/modele/M_Commande.php');
/**
 * Controleur pour l'inscription
 * @author Loic LOG
 */
switch ($action) {
    case 'confirmerInscription':
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
        } else if (M_Pseudos::existePseudo($pseudo_client)) {
            afficheMessage("ce pseudo existe déjà, si c'est bien vous allez à la  page de connexion. Sinon veuillez choisir un autre pseudo.");
            $uc = 'inscription';
        } else if (M_Emails::existeEmail($email_client)) {
            afficheMessage("cet email existe déjà, si c'est bien vous allez à la  page de connexion. Sinon veuillez choisir une autre adresse mail.");
            $uc = 'inscription';
        } else {
            try {
                M_Client::creerClient($nomPrenom_client, $pseudo_client, $mdp_client, $email_client, $adresse_client, $cp_client, $ville_client);
                afficheMessage("Félicitations, votre compte a bien été créé");
                $uc = '';
            } catch (\PDOException $e) {
                echo $e;
                afficheMessage("erreur, veuillez recommencer la saisie");
                die;
            }
        }
        break;

    case 'confirmerConnexion':

        $pseudo_client = trim(filter_input(INPUT_POST, 'pseudo_client'));
        $mdp_client = filter_input(INPUT_POST, 'mdp_client');

        if (M_Client::clientExiste($pseudo_client) && (M_Client::checkMdp($pseudo_client, $mdp_client))) {
            $_SESSION['id'] = M_Client::checkMdp($pseudo_client, $mdp_client);
            $_SESSION['pseudo'] = $pseudo_client;
            afficheMessage('bienvenue ' . $pseudo_client);
            $uc = '';
            break;
        } else afficheMessage('Votre pseudo n\'est pas reconnu, veuillez esssayer à nouveau');
        break;

    case 'confirmDeco':
        $confirmation = filter_input(INPUT_POST, 'ok');
        $annul = filter_input(INPUT_POST, 'annuler');
        if (isset($confirmation)) {
            afficheMessage("au revoir, ". $_SESSION['pseudo'] ."...");
            $_SESSION = [];

            session_destroy();

            $uc = '';
            // header('location: index.php');
            break;
        }

        if (isset($annul)) {
            afficheMessage('welcome back, ' . $_SESSION['pseudo'] . ' !');
            $uc = '';
            break;
        }

        case 'consulter':
            $id = $_SESSION['id'];
            $infos = M_Client::trouveLeClient($id);
            $commandes = M_Commande::trouveLesCommandes($id);
}
