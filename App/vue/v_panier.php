<section>
    <img src="public/images/panier.gif"	alt="Panier" title="panier"/>
    <?php
    $prix_tot = 0;
    foreach ($lesJeuxDuPanier as $unJeu) {
        $id = $unJeu['id'];
        $description = $unJeu['description'];
        $image = $unJeu['image'];
        $prix = $unJeu['prix'];
        $prix_tot += $prix; 
        ?>
        <p>
            <img src="public/images/jeux/<?php echo $image ?>" alt=image width=100 height=100 />
            <?php
            echo $description . "($prix Euros)";
            ?>	
            <a href="index.php?uc=panier&jeu=<?php echo $id ?>&action=supprimerUnJeu" onclick="return confirm('Voulez-vous vraiment retirer ce jeu ?');">
                <img src="public/images/retirerpanier.png" TITLE="Retirer du panier" >
            </a>
        </p>
        <?php
    }
    ?>
    <br>
    Total : <?= $prix_tot. " Euros"?>
    <br>
    <a href=index.php?uc=demander&action=proposeCompte>
        <img src="public/images/commander.jpg" title="Passer commande" >
    </a>
</section>
