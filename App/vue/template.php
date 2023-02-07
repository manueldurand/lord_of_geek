<!DOCTYPE html>
<!--
Prototype de Lord Of Geek (LOG)
-->
<html>
    <head>
        <title>Lord Of Geek 2022</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/cssGeneral.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
    </head>
    <body>
        <header>
            <!-- Images En-tête -->
            <img src="public/images/logo.png" alt="Logo Lord Of Geek" />
            <!--  Menu haut-->
            <nav  id="menu">
                <ul>
                    <li><a href="index.php?uc=accueil&action=tousLesJeux"> Accueil </a></li>
                    <li><a href="index.php?uc=visite&action=voirCategories"> Tri par console ou par catégorie</a></li>
                    <li><a href="index.php?uc=panier&action=voirPanier"> Voir son panier </a></li>
                    <!-- <li><a href="index.php?uc=inscription"> Inscription </a></li> -->
                    <?php if(!isset($_SESSION['id'])):?>
                    <li><a href="index.php?uc=connexion">Connexion</a></li>
                    <?php endif ?>
                    <?php if(isset($_SESSION['id'])):?>
                        <li><a href="index.php?uc=compte&action=consulter"> Mon compte </a></li>
                        <li><a href="index.php?uc=deco">Déconnexion</a></li>
                   <?php endif ?>
                </ul>
            </nav>

        </header>
        <main>
            <?php
            // Controleur de vues
            // Selon le cas d'utilisation, j'inclus un controleur ou simplement une vue
            switch ($uc) {
                case 'accueil':
                    include 'App/vue/v_accueil.php';
                    break;
                case 'visite' :
                    include("App/vue/v_jeux.php");
                    break;
                case 'panier' :
                    include("App/vue/v_panier.php");
                    break;
                case 'commander':
                    include ("App/vue/v_commande.php");
                    break;
                case 'compte' :
                    include ("App/vue/v_compte.php");
                    break;
                case 'inscription':
                    include('App/vue/v_form_inscription.php');
                    break;
                case 'connexion':
                    include('App/vue/v_form_connexion.php');
                    break;
                case 'deco':
                    include('App/vue/v_deconnexion.php');
                case 'demander' :
                    include ('App/vue/v_propose_compte.php');
                default:
                    break;
            }
            ?>
        </main>
    </body>
</html>
