<?php

session_start();

if (isset($_GET['id_compteRendu'])) {
    $id_CR = $_GET['id_compteRendu'];

    $queryCR = "SELECT c.*, p.nom as 'pNom', e.nom as 'eNom', e.id_echantillon as 'eID' FROM CompteRendu as c JOIN Praticien as p ON c.id_praticien = p.id_praticien JOIN Echantillon as e ON c.id_echantillon_1 = e.id_echantillon WHERE id_compteRendu = :id";
    $CR = $bdd->prepare($queryCR);
    $CR->bindParam(':id', $id_CR);
    $CR->execute();

    $requetePraticienAll = $bdd->query("SELECT id_praticien, nom, id_cabinet FROM Praticien");
    $PraticienAll = $requetePraticienAll->fetchAll();

    $requeteEchantillonAll = $bdd->query("SELECT id_echantillon, nom, quantite FROM Echantillon");
    $EchantillonAll = $requeteEchantillonAll->fetchAll();
}


if (isset($_POST['button_CR'])) {
    $nouvelle_date = $_POST['nouvelle_date'];
    $nouveau_motif = $_POST['nouveau_motif'];
    $nouveau_bilan = $_POST['nouveau_bilan'];
    $nouvelle_note = $_POST['nouvelle_note'];

    if ($nouvelle_date && $nouveau_motif && $nouveau_bilan && $nouvelle_note) {
        $queryUpdateCR = "UPDATE CompteRendu SET date = ?, motif = ?, bilan = ?, note = ? WHERE id_compteRendu = ?";
        $UpdateCR = $bdd->prepare($queryUpdateCR);
        $UpdateCR->execute(array($nouvelle_date, $nouveau_motif, $nouveau_bilan, $nouvelle_note, $id_CR));

        header('Location: index.php?page=HistoriqueCompteRendu');
        exit();
    }
}
?>