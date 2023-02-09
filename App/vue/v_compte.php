<p style="text-align: center;">
    <!-- <img src="./public/images/a_venir.png" width="500px" hight="auto"> -->
</p>
<h2>Mes informations de compte :</h2>
<ul>
    <li>
        Nom et Prénom : <?= $infos['nomPrenom_client'];?>
    </li>
    <li>Pseudonyme : <?= $infos['pseudo_client']?></li>
    <li>E-mail : <?=$infos['email_client']?></li>
    <li>Adresse : <?=$infos['adresse_client']?></li>
    <li>Code postal : <?=$infos['cp_client']?></li>
    <li>Ville : <?=$infos['ville_client']?></li>
</ul>
<h2>Mes dernières commandes</h2>
<table border="">
    <tr>
        <th>nom</th>
        <th>console</th>
        <th>catégorie</th>
        <th>prix</th>
    </tr>
    <?php foreach($commandes as $commande): ?>
        <tr>
            <td><?= $commande['nom'];?></td>
            <td><?= $commande['console'];?></td>
            <td><?= $commande['categorie'];?></td>
            <td><?= $commande['prix'];?></td>
            <?php endforeach ?>

        </tr>
</table>

