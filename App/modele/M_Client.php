<?php

/**
 * Table des clients
 *
 * @author 
 */
class M_Client
{

    /**
     * Retourne les données du client par id sous forme d'un tableau associatif
     *
     * @return le tableau associatif du client-pseudo
     */
    public static function trouveLeClient($id)
    {
        $req = "SELECT * FROM log_client WHERE id_client = $id";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetch();
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
     * Crée un client à partir des arguments validés passés en paramètre,
     * @param $nomPrenom_client
     * @param $pseudo_client
     * @param $mdp_client
     * @param $email_client
     * @param $adresse_client
     * @param $cp_client
     * @param $ville_client

     */
    public static function creerClient($nomPrenom_client, $pseudo_client, $mdp_client, $email_client, $adresse_client, $cp_client, $ville_client) {
        
        $conn = AccesDonnees::getpdo();
        $mdp_client = password_hash($mdp_client, PASSWORD_BCRYPT);
            $req = "INSERT INTO log_client(nomPrenom_Client, pseudo_client, mdp_client, email_client, adresse_client, cp_client, ville_client) ";   
            $req .= "VALUES (:nomPrenom_Client, :pseudo_client, :mdp_client, :email_client, :adresse_client, :cp_client, :ville_client)";
            $statement = $conn->prepare($req);
            $statement->bindParam(":nomPrenom_Client", $nomPrenom_client);
            $statement->bindParam(":pseudo_client", $pseudo_client);
            $statement->bindParam(":mdp_client", $mdp_client);
            $statement->bindParam(":email_client", $email_client);
            $statement->bindParam(":adresse_client", $adresse_client);
            $statement->bindParam(":cp_client", $cp_client);
            $statement->bindParam(":ville_client", $ville_client);
            return $statement->execute();
                
    }
    public static function clientExiste($pseudo_client): bool
    {
        $conn = AccesDonnees::getPdo();
        $sql = 'SELECT id_client FROM log_client ';
        $sql .= 'WHERE pseudo_client = :login';
        // prepare and bind
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":login", $pseudo_client);
        // $stmt->bindParam(":mdp", $mdp_client);
        // Exécution
        $stmt->execute();

        // L'identification est bonne si la requête a retourné
        // une ligne (l'utilisateur existe et le mot de passe
        // est bon).
        // Si c'est le cas $existe contient 1, sinon elle est
        // vide. Il suffit de la retourner en tant que booléen.
        if ($stmt->rowCount() > 0) {
            // ok, il existe
            $existe = true;
        } else {
            $existe = false;
        }
        return $existe;
    }

    public static function checkMdp(String $pseudo_client, String $mdp_client)
{
    $conn = AccesDonnees::getPdo();
    $sql = "SELECT id_client, mdp_client FROM log_client WHERE pseudo_client = :pseudo";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':pseudo', $pseudo_client);
    $stmt->execute();

    $data = $stmt->fetch();
    
    $mdp_bdd = $data['mdp_client'];

    if(!password_verify($mdp_client, $mdp_bdd))
    {
        $data['id_client'] = false;
    }
    return $data['id_client'];

}

}
