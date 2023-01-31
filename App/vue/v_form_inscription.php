<html>
<section class="inscription">
    <form action="index.php?uc=inscription&action=confirmerInscription" method="POST">
        <fieldset>
            <legend>Inscription</legend>
            <p>
                <label for="nomPrenom">Nom Prénom</label>
                <input type="text" name="nomPrenom" id="nomPrenom" maxlength="45">
            </p>
            <p>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" required id="pseudo">
            </p>
            <p>
                <label for="mdp">Mot de passe</p></label>
                <input type="password" name="mdp" id="mdp" maxlength="45">
            </p>
            <p>
            <label for="email">adresse mail</label>
            <input type="email" name="email_client" id="email">
            </p>   
            <p>
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse_client" id="adresse">
            </p>
            <p>
            <label for="code_postal">Code postal</label>
            <input type="int" name="cp_client" id="code_postal">
            </p>
            <p>
            <label for="ville">ville</label>
            <input type="text" name="ville_client" id="ville">
            </p>
            <p>
                <input type="submit" value="Valider" name="valider">
                <input type="reset" value="Annuler" name="annuler"> 
            </p>




        </fieldset>
    </form>

</section>

</html>