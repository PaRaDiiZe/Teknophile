<?php

function connexion()
{
  $pdo = new PDO('mysql:host=localhost;dbname=huot_SAE203;charset=utf8', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

  if ($pdo) {
    return $pdo;
  } else {
    echo '<p>Erreur de connexion</p>';
    exit;
  }
}
