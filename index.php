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
$evenements = select_evenement_index($pdo);
$vetements = select_vetement_index($pdo);


echo $twig->render('index.twig', [
    'vetements' => $vetements,
    'evenements' => $evenements,
]);
