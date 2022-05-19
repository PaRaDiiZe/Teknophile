<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id'];
else $id = 0;

// Convertit l'identifiant en entier
$id = intval($id);

// Connexion à la base de données
include('include/connexion.php');
$pdo = connexion();

include('include/requetes.php');
$commande = show_panier($pdo);
$prix_total = prix_panier($pdo);

echo $twig->render('panier.twig', [
    'commande' => $commande,
    'prix_total' => $prix_total,
]);
