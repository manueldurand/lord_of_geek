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
        $req = "SELECT * FROM exemplaires JOIN consoles ON consoles.id_console = exemplaires.id_console WHERE categorie_id = '$idCategorie'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
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
        $req = "SELECT * FROM exemplaires JOIN consoles ON consoles.id_console = exemplaires.id_console WHERE exemplaires.id_console = $idConsole";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
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
            foreach ($desIdJeux as $unIdProduit) {
                $req = "SELECT * FROM exemplaires WHERE id = '$unIdProduit'";
                $res = AccesDonnees::query($req);
                $unProduit = $res->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }
public static function trouveTousLesJeux(){
    $req = "SELECT description as jeu, prix, nom_categorie as categorie, nom_console as console FROM exemplaires JOIN categories ON categories.id = exemplaires.categorie_id 
    JOIN consoles ON consoles.id_console = exemplaires.id_console;";
    $res = AccesDonnees::query($req);
    $lesLignes = $res->fetchAll();
    return $lesLignes;
}
}


