<?php

// Initialise Twig
include('include/twig.php');
$twig = init_twig();

// Récupère les données GET sur l'URL
if (isset($_GET['id'])) $id = $_GET['id'];
else $id = 0;

if (isset($_GET['genre_vet'])) $genre_vet = $_GET['genre_vet'];
else $genre_vet = 0;

// Convertit l'identifiant en entier
$id = intval($id);

// Connexion à la base de données
include('include/connexion.php');
$pdo = connexion();

include('include/requetes.php');

if ($genre_vet == null) {
    $vetements = select_vetement($pdo);
    $nombre = nombre_vetement($pdo);
} else {
    $vetements = genre_url($pdo, $genre_vet);
    $nombre = nombre_vetement_genre($pdo, $genre_vet);
}


echo $twig->render('vetements.twig', [
    'vetements' => $vetements,
    'nombre' => $nombre,
]);