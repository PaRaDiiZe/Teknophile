<?php
function select_evenement_index($pdo)
{
    // construction de la requête
    $sql = 'SELECT nom_event, ville_event, rue_event, genre, nom 
    FROM evenement 
    INNER JOIN participe 
    ON evenement.id_event = participe.id_evenement
    INNER JOIN artiste
    ON participe.id_artiste = artiste.id_artiste
    ORDER BY id_event
    ';

    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function select_vetement_index($pdo)
{
    // construction de la requête
    $sql = 'SELECT *
    FROM vetement 
    ORDER BY rand()
    LIMIT 3';

    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function select_vetement($pdo)
{
    // construction de la requête
    $sql = 'SELECT nom_vet, prix_vet, genre_vet, photo_vet, id_vetement 
    FROM vetement ';

    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function select_vet_detail($pdo, $id)
{

    $sql = 'SELECT *
    FROM vetement 
    INNER JOIN type
    ON vetement.id_type = type.id_type
    WHERE id_vetement = :id 
    ';


    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();


    if ($query->errorCode() == '00000') {

        $tableau = $query->fetch(PDO::FETCH_OBJ);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }


    return $tableau;
}

function select_vet_sim($pdo, $genre_vet)
{

    $sql = 'SELECT *
    FROM vetement
    WHERE genre_vet = :genre_vet 
    ORDER BY rand()
    LIMIT 3
    ';

    $query = $pdo->prepare($sql);
    $query->bindValue(':genre_vet', $genre_vet, PDO::PARAM_STR);
    $query->execute();

    if ($query->errorCode() == '00000') {

        $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function nombre_vetement($pdo)
{
    // construction de la requête
    $sql = "SELECT COUNT(id_vetement) AS nombre
    FROM vetement";

    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function nombre_vetement_genre($pdo, $genre_vet)
{
    // construction de la requête
    $sql = "SELECT COUNT(id_vetement) AS nombre
    FROM vetement
    WHERE genre_vet = :genre_vet";

    // exécution de la requête
    $query = $pdo->prepare($sql);
    $query->bindValue(':genre_vet', $genre_vet, PDO::PARAM_STR);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function select_evenement($pdo)
{
    // construction de la requête
    $sql = 'SELECT nom_event, ville_event, rue_event, desc_event, date_event 
    FROM evenement 
    INNER JOIN participe
    ON evenement.id_event = participe.id_evenement
    ORDER BY id_event
    ';

    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}


function commentaire($pdo, $id_vetement)
{
    $sql = 'SELECT *
    FROM commentaire
    WHERE id_vetement = :id_vetement';
    $query = $pdo->prepare($sql);
    $query->bindValue(':id_vetement', $id_vetement, PDO::PARAM_INT);
    $query->execute();


    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}



function secu_comment($str)
{
    if ((isset($str)) && ($str != null)) {
        $str = strip_tags($str);
        $str = htmlspecialchars($str);
        return $str;
    } else {
        return "";
    }
}


function insert_comment($pdo, $commentaire, $id_vetement)
{
    // construction et préparation de la requête
    $sql = 'INSERT INTO commentaire (nom_user, texte_commentaire, id_vetement, date_comment) values (:nom_user, :texte_comment, :id_vetement, NOW() )';
    echo '<p>Requête : ' . $sql . '</p>';

    $query = $pdo->prepare($sql);

    // assignation des valeurs à partir du tableau q$auteur
    $query->bindValue(':nom_user', $commentaire['nom_user'], PDO::PARAM_STR_CHAR);
    $query->bindValue(':texte_comment', $commentaire['texte_commentaire'], PDO::PARAM_STR_CHAR);
    $query->bindValue(':id_vetement', $id_vetement, PDO::PARAM_INT);

    // exécution de la requête
    $query->execute();
}


function genre_url($pdo, $genre_vet)
{

    $sql = 'SELECT *
    FROM vetement
    WHERE genre_vet = :genre_vet 
    ';

    $query = $pdo->prepare($sql);
    $query->bindValue(':genre_vet', $genre_vet, PDO::PARAM_STR);
    $query->execute();

    if ($query->errorCode() == '00000') {

        $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}

function insert_panier($pdo)
{
    // construction et préparation de la requête
    $sql = 'INSERT INTO commande (date_cmd) values (NOW())';
    echo '<p>Requête : ' . $sql . '</p>';

    $query = $pdo->prepare($sql);

    // exécution de la requête
    $query->execute();
}



function insert_fact($pdo, $id_vetement)
{
    $sql = 'SELECT id_commande 
    FROM commande
    ORDER BY id_commande
    DESC';
    $query = $pdo->prepare($sql);
    $query->execute();

    $id_commande = $query->fetch(PDO::FETCH_ASSOC);
    $id_commande = $id_commande['id_commande'];

    $sql = 'INSERT INTO ligne_commande (id_vetement, id_commande) values (:id_vetement, :id_commande)';
    echo '<p>Requête : ' . $sql . '</p>';

    $query = $pdo->prepare($sql);

    $query->bindValue(':id_vetement', $id_vetement, PDO::PARAM_INT);
    $query->bindValue(':id_commande', $id_commande, PDO::PARAM_INT);

    // exécution de la requête
    $query->execute();
}



function show_panier($pdo)
{
    // construction de la requête
    $sql = 'SELECT nom_vet, genre_vet, photo_vet, prix_vet
    FROM  commande
    INNER JOIN ligne_commande
    ON commande.id_commande = ligne_commande.id_commande
    INNER JOIN vetement
    ON ligne_commande.id_vetement = vetement.id_vetement
    ';

    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
}


function prix_panier($pdo)
{
    // construction de la requête
    $sql = "SELECT SUM(prix_vet) AS prix_total
    FROM commande
    INNER JOIN ligne_commande
    ON commande.id_commande = ligne_commande.id_commande
    INNER JOIN vetement
    ON ligne_commande.id_vetement = vetement.id_vetement";

    // exécution de la requête
    $query = $pdo->prepare($sql);

    $query->execute();

    if ($query->errorCode() == '00000') {
        // récupération des données dans un tableau
        $tableau = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        echo '<p>Erreur dans la requête : ' . $query->errorInfo()[2] . '</p>';
        $tableau = null;
    }

    return $tableau;
};
