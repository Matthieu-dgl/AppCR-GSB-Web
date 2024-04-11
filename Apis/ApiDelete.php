<?php

header("Content-Type: application/json");

try {
    $password = "Fabzummogxe3";
    $bdd = new PDO('mysql:host=manonca421.mysql.db;dbname=manonca421;charset=utf8;', 'manonca421', $password, array(PDO::ATTR_PERSISTENT => true));    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

$idCR = $_POST["idCR"];

try {
    $requeteSupprimeCR = $bdd->prepare("DELETE FROM CompteRendu WHERE id_compteRendu = :id");
    $requeteSupprimeCR->execute(['id' => $idCR]);

    $rowCount = $requeteSupprimeCR->rowCount();

    if ($rowCount > 0) {
        echo json_encode(array("status" => 200, 'message' => "Suppression réussie !"));
    } else {
        echo json_encode(array("status" => 400, 'message' => "Aucun compte rendu n'a été supprimé. Il se peut que l'ID n'existe pas."));
    }
} catch (PDOException $e) {
    echo json_encode(array("status" => 500, 'message' => "Erreur de suppression : " . $e->getMessage()));
}

$bdd = null;

?>