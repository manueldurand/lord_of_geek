<?php

class M_Pseudos
{
    // public static function trouveLePseudo($pseudo_client)
    // {
    //     $req = "SELECT pseudo_client FROM client WHERE pseudo_client = $pseudo_client";
    //     $res = AccesDonnees::query($req);
    //     $lesLignes = $res->fetchAll();
    //     return $lesLignes;
    // }
    public static function existePseudo($pseudo_client){
        $conn = AccesDonnees::getpdo();
        $stmt = $conn->prepare("SELECT * FROM client WHERE pseudo_client = :d" );
        $stmt->bindParam(":d", $pseudo_client);
        $stmt->execute();
        $user = $stmt->fetch();
        if($user){
            return true;
        }else {
            return false;
        }       
    }


}

// $email = "contact@waytolearnx.com";
// $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
// $stmt->execute([$email]); 
// $user = $stmt->fetch();
// if ($user) { 
//     // email existe
// } else {
//     // email n'existe pas
// } 
