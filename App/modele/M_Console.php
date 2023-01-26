<?php

/**
 * Les jeux sont rangés par console
 *
 * @author Loic LOG edit by Manuel Durand
 */
class M_Console {

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesConsoles() {
        $req = "SELECT * FROM consoles";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

}
