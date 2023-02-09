<?php

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande {

    /**
     * Crée une commande
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $nom
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $listJeux

     */
    public static function creerCommande($id_client, $listJeux) {
        $conn = AccesDonnees::getpdo();
        foreach ($listJeux as $jeu) {
            
            $stmt = $conn->prepare("insert into lignes_commande(client_id, exemplaire_id) values (:id_client, :jeu)");
            $stmt->bindParam(":id_client", $id_client);
            $stmt->bindParam(":jeu", $jeu);
            $stmt->execute();
        }
        
    }

    public static function trouveLesCommandes($id){
        $conn = AccesDonnees::getpdo();
        $stmt = $conn->prepare("SELECT description as nom, prix, nom_console as console, nom_categorie as categorie FROM exemplaires
        JOIN lignes_commande ON lignes_commande.exemplaire_id = exemplaires.id
        JOIN categories ON categories.id = exemplaires.categorie_id
        JOIN consoles ON consoles.id_console = exemplaires.id_console
        JOIN client ON client.id_client = lignes_commande.client_id
        WHERE id_client = :id_client;");
        $stmt->bindParam("id_client", $id);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll();
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
    public static function estValide($nom, $rue, $ville, $cp, $mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($rue == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }

}
