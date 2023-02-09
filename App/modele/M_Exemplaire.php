<?php

/**
 * Requetes sur les exemplaires  de jeux videos
 *
 * @author Loic LOG
 */
class M_Exemplaire {

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeCategorie($idCategorie) {
        $conn = AccesDonnees::getpdo();
        $stmt = $conn->prepare("SELECT * FROM log_exemplaires JOIN log_consoles ON log_consoles.id_console = log_exemplaires.id_console WHERE categorie_id = :idCategorie");
        $stmt->bindParam(':idCategorie', $idCategorie);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne sous forme de tableau associatif les jeux de la console passée en argument
     *
     * @param [int] $idConsole
     * @return tableau des jeux par console
     */
    public static function trouveLesJeuxDeConsole($idConsole):array
    {
        $conn = AccesDonnees::getPdo();
        $stmt = $conn->prepare("SELECT * FROM log_exemplaires 
        JOIN log_consoles 
        ON log_consoles.id_console = log_exemplaires.id_console 
        WHERE log_exemplaires.id_console = :idConsole");
        $stmt->bindParam(':idConsole', $idConsole);
        $stmt->execute();
        $lesLignes = $stmt->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDuTableau($desIdJeux) {
        $nbProduits = count($desIdJeux);
        $lesProduits = array();
        if ($nbProduits != 0) {
            $conn = AccesDonnees::getPdo();
            foreach ($desIdJeux as $unIdProduit) {
                $stmt = $conn->prepare("SELECT * FROM log_exemplaires WHERE id = :unIdProduit");
                $stmt->bindParam(':unIdProduit', $unIdProduit);
                $stmt->execute();
                $unProduit = $stmt->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }
public static function trouveTousLesJeux(){
    $req = "SELECT description as jeu, prix, nom_categorie as categorie, nom_console as console FROM log_exemplaires JOIN log_categories ON log_categories.id = log_exemplaires.categorie_id 
    JOIN log_consoles ON log_consoles.id_console = log_exemplaires.id_console;";
    $res = AccesDonnees::query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
}
}


