<section id="visite">
    <aside id="categories">
        Catégories :
        <ul >
            <?php
            foreach ($lesCategories as $uneCategorie) {
                $idCategorie = $uneCategorie['id'];
                $libCategorie = $uneCategorie['nom_categorie'];
                ?>
                <li>
                    <a href=index.php?uc=visite&categorie=<?= $idCategorie ?>&action=voirJeuxParCategorie><?=  $libCategorie ?></a>
                </li>
                <?php
            }
            ?>
        </ul>
        Consoles :
        <ul>
        <?php
        foreach($lesConsoles as $uneConsole) {
            $idConsole = $uneConsole['id_console'];
            $libConsole = $uneConsole['nom_console'];
            ?>
            <li>
                <a href=index.php?uc=visite&console=<?=$idConsole ?>&action=voirJeuxParConsole><?= $libConsole ?></a>
            </li>
            <?php
        }
        ?>
        </ul>
    </aside>
    <section  id="jeux">

        <?php
        foreach ($lesJeux as $unJeu) {
            $id = $unJeu['id'];
            $description = $unJeu['description'];
            $nom_console = $unJeu['nom_console'];
            $etat = $unJeu['etat'];
            $prix = $unJeu['prix'];
            $image = $unJeu['image'];
            $annee_achat = $unJeu['annee_achat'];
            $prix_achat = $unJeu['prix_achat'];
            ?>
            <article>
                <!-- <p>Console : <?=$console?></p> -->
                <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>"/>
                <p><?= $description ." sur ".$nom_console ?></p>
                <p>Etat : <?= $etat?></p>
                <p>Acheté <?= $prix_achat." € en ". $annee_achat?></p>
                <p><?= "Prix de vente : " . $prix . " Euros" ?>
                    <a href="index.php?uc=visite&categorie=<?= $categorie ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                        <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add"/>
                    </a>
                </p>
            </article>
            <?php
        }
        ?>
    </section>
</section>
