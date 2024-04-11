<?php

header("Content-Type:application/json");

try {
    $password = "Fabzummogxe3";
    $bdd = new PDO('mysql:host=manonca421.mysql.db;dbname=manonca421;charset=utf8;', 'manonca421', $password, array(PDO::ATTR_PERSISTENT => true));    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e);
}

try {

    $id_CR = $_POST['id_compteRendu'];
    $nouvelle_date = $_POST['nouvelle_date'];
    $nouveau_motif = $_POST['nouveau_motif'];
    $nouveau_bilan = $_POST['nouveau_bilan'];
    $nouvelle_note = $_POST['nouvelle_note'];

    if ($nouvelle_date && $nouveau_motif && $nouveau_bilan && $nouvelle_note) {
        $queryUpdateCR = "UPDATE CompteRendu SET date = ?, motif = ?, bilan = ?, note = ? WHERE id_compteRendu = ?";
        $UpdateCR = $bdd->prepare($queryUpdateCR);
        $UpdateCR->execute(array($nouvelle_date, $nouveau_motif, $nouveau_bilan, $nouvelle_note, $id_CR));

        echo "success";
    } else {
        echo "error";
    }

} catch (Exception $e) {
    $json = array("status" => $e->getCode(), "message" => $e->getMessage());
}

?>