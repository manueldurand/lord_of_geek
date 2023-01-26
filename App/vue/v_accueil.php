<section>
    <h1>
        Lord Of Geek
    </h1>
    <h2>
        le prince des jeux sur internet
    </h2>
    <h2>Tous les jeux : </h2>

    <table border>
        <tr>
            <td>jeu</td>
            <td>prix</td>
            <td>catégorie</td>
            <td>console</td>
        </tr>
        <?php
        foreach($lesJeux as $unJeu):?>
            <tr>
                <td><?=$unJeu['jeu']?></td>
                <td><?=$unJeu['prix']?></td>
                <td><?=$unJeu['categorie']?></td>
                <td><?=$unJeu['console']?></td>
            </tr>
        

            <?php endforeach; ?>
    </table>

</section>

