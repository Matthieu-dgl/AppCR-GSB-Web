<?php

session_start();

try {

    $idvisiteur = $_SESSION["Id_user"];
    $requeteMail = $bdd->query("SELECT * FROM Mail m JOIN user u ON m.id_visiteur = u.Id_user WHERE u.Type = 'visiteur' AND u.Id_user = $idvisiteur");
    $resultatsMail = $requeteMail->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur de récupération dans la base de données : " . $e->getMessage();
}

?>

