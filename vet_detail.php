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
$vetements = select_vet_detail($pdo, $id);
$genre = select_vet_sim($pdo, $vetements->genre_vet);
$commentaire = commentaire($pdo, $vetements->id_vetement);



echo $twig->render('vet_detail.twig', [
    'vetement' => $vetements,
    'genre' => $genre,
    'commentaire' => $commentaire,

]);
