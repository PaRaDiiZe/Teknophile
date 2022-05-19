<?php
include('include/connexion.php');
$pdo = connexion();

include('include/twig.php');
$twig = init_twig();

if (isset($_GET['id_vetement'])) $id_vetement = $_GET['id_vetement'];
else $id = 0;

include('include/requetes.php');

$commentaire = [
    'nom_user' => secu_comment($_POST['nom_user']),
    'texte_commentaire' => secu_comment($_POST['texte_comment']),
];


$commentaire = insert_comment($pdo, $commentaire, $id_vetement);

header('Location: vetements.php');
