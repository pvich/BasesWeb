<?php

//print_r($_SERVER);

/* initialisation */

session_start();

require("includes/db_connect.php");
require("includes/functions.php");

$page = (isset($_GET['page']) ? $_GET['page'] : "article_list");

/* analyse de la page demandée et création des variables */

$montrerHtml = true;

switch ($page) {
    case "register":
        $titre = "Formulaire d'enregistrement";
        $pageInclue = "pages/register.php";
        break;
    case "register_traitement":
        $pageInclue = "pages/register_traitement.php";
        $montrerHtml = false;
        break;
    case "article_read":
        $titre = "Lecture d'un article";
        $pageInclue = "pages/article_read.php";
        break;
    case "article_list":
        $titre = "Liste des articles";
        $pageInclue = "pages/article_list.php";
        break;
    case "article_add":
    case "article_edit":
        $titre = "Ajout/édition d'un article";
        $pageInclue = "pages/article_edit.php";
        break;
    case "article_delete":
        $titre = "Suppression d'un article";
        $pageInclue = "pages/article_delete.php";
        break;
    case "home":
    default:
        $titre = "Page d'accueil";
        $pageInclue = "pages/home.php";
        break;
}

// si cette page a un affichage graphique, tout inclure, sinon juste un script
if ($montrerHtml) {
    // le header contient le début de la page jusqu'à la balise <body>
    include("blocs/header.php");

    // le menu est composé de la balise <nav> et de ses items
    include("blocs/menu.php");

    /* début corps de page */

    // on affiche les messages éventuels
    showMessages();

    // on affiche le contenu principal de la page
    include($pageInclue);

    /* fin corps de page */

    // on affiche le footer et on ferme la page html
    include("blocs/footer.php");
} else {
    // on inclut le script demandé
    include($pageInclue);
}
