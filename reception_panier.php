<?php
include('include/connexion.php');
$pdo = connexion();

include('include/twig.php');
$twig = init_twig();

if (isset($_GET['id_vetement'])) $id_vetement = $_GET['id_vetement'];
else $id = 0;


include('include/requetes.php');
$commande = insert_panier($pdo, $id_vetement);
$fact = insert_fact($pdo, $id_vetement, $id_commande);

