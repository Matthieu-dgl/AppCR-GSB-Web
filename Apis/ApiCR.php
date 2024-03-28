<?php

header("Content-Type:application/json");

try {
    $password = "quckijnocVas9fixhi";
    $bdd = new PDO('mysql:host=matthiuadmin.mysql.db;dbname=matthiuadmin;charset=utf8;', 'matthiuadmin', $password, array(PDO::ATTR_PERSISTENT => true));    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST["id"];

    $getCompteRendu = $bdd->prepare(" SELECT U.Id_user, CR.id_compteRendu, CR.date, CR.motif, E1.nom AS 'Echantillion 1', E2.nom AS 'Echantillion 2', CR.bilan, U.nom AS 'Nom Visiteur', U.Prenom AS 'Prenom Visiteur',P.nom AS 'Nom praticien', P.prenom AS 'Prenom Praticien', CR.note as 'Note', Cab.nom AS 'Nom Cabinet' 
            FROM CompteRendu CR
            JOIN Cabinet Cab ON CR.id_cabinet = Cab.id_cabinet 
            JOIN Praticien P ON CR.id_praticien = P.id_praticien 
            JOIN user U ON CR.id_visiteur = U.Id_user 
            LEFT JOIN Echantillon E1 ON CR.id_echantillon_1 = E1.id_echantillon 
            LEFT JOIN Echantillon E2 ON CR.id_echantillon_2 = E2.id_echantillon
            WHERE U.Id_user = :id");
    $getCompteRendu->execute(['id' => $id]);
    $cr = $getCompteRendu->fetchAll(PDO::FETCH_ASSOC);


    if (!$cr) {
        echo json_encode(array("status" => 400, 'message' => "Il n'existe pas de compte rendu"));
        die();
    } else {
        echo json_encode(['compteRendu' => $cr]);
        echo json_encode(array("status" => 200, 'message' => "Récupération des comptes rendus réussie !"));
    }
} catch (PDOException $e) {
    die($e);
}

$bdd = null;

?>
