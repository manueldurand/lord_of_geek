<?php

/**
 * Table des clients
 *
 * @author 
 */
class M_Client
{

    /**
     * Retourne les données du client par pseudo sous forme d'un tableau associatif
     *
     * @return le tableau associatif du client-pseudo
     */
    public static function trouveLeClient()
    {
        $req = "SELECT * FROM client WHERE pseudo = $pseudo_client";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }
    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : chaîne
     * @param $mail : chaîne
     * @return : array
     */
    public static function estValide($nomPrenom_client, $pseudo_client, $mdp_client, $email_client, $adresse_client, $cp_client, $ville_client)
    {
        $erreurs = [];
        if ($nomPrenom_client == "") {
            $erreurs[] = "Il faut saisir le champ Nom Prénom";
        }
        if ($pseudo_client == "") {
            $erreurs[] = "Veuillez choisir un pseudo";
        }
        if ($mdp_client == "") {
            $erreurs[] = "Veuillez choisir un mot de passe";
        }
        if ($email_client == "") {
            $erreurs[] = "Veuillez saisir un email valide";
        }else if (!estUnMail($email_client)) {
            $erreurs[] = "erreur de mail, veuillez saisir un email valide";
        }
        if ($adresse_client == "") {
            $erreurs[] = "Veuillez saisir une adresse";
        }
        if ($cp_client == "") {
            $erreurs[] = "Veuillez saisir un code postal";
        } else if (!estUnCp($cp_client)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($ville_client == "") {
            $erreurs[] = "Il faut saisir le champ ville aussi";
        } 
        return $erreurs;
    }

        /**
     * Crée un nouveau client
     *
     * Crée une client à partir des arguments validés passés en paramètre,
     * @param $nomPrenom_client
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $listJeux

     */
    public static function creerClient($nomPrenom_client, $pseudo_client, $mdp_client, $email_client, $adresse_client, $cp_client, $ville_client) {
        
            $req = "insert into client(nomPrenom_Client, pseudo_client,mdp_client, email_client, adresse_client, cp_client, ville_client) values ('$nomPrenom_client', '$pseudo_client', '$mdp_client', '$email_client', '$adresse_client', '$cp_client', '$ville_client')";
            $res = AccesDonnees::exec($req);
            var_dump($res);
        

       
    }
}
