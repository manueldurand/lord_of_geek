<?php
/**
 * Table des clients
 *
 * @author 
 */
class M_Categorie {

    /**
     * Retourne tous les clients sous forme d'un tableau associatif
     *
     * @return le tableau associatif des clients
     */
    public static function trouveLesClients() {
        $req = "SELECT * FROM client";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

}
