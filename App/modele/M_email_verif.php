<?php

class M_Emails
{
    // public static function trouveLePseudo($pseudo_client)
    // {
    //     $req = "SELECT pseudo_client FROM log_client WHERE pseudo_client = $pseudo_client";
    //     $res = AccesDonnees::query($req);
    //     $lesLignes = $res->fetchAll();
    //     return $lesLignes;
    // }
    public static function existeEmail($email_client){
        $conn = AccesDonnees::getpdo();
        $stmt = $conn->prepare("SELECT * FROM log_client WHERE email_client = :d" );
        $stmt->bindParam(":d", $email_client);
        $stmt->execute();
        $user = $stmt->fetch();
        if($user){
            return true;
        }else {
            return false;
        }       
    }


}