<?php

include 'App/modele/M_commande.php';

/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
switch ($action) {
 
    case 'confirmerCommande' :
        $n = nbJeuxDuPanier();
        if ($n = 0) {
            afficheMessage("Panier vide !!");
            $uc = '';}
         else {
            $lesIdJeu = getLesIdJeuxDuPanier();
            $id_client = $_SESSION['id'];
            M_Commande::creerCommande($id_client, $lesIdJeu);
            supprimerPanier();
            afficheMessage("Commande enregistrée");
            $uc = '';
        }
    }



