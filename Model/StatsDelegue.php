<?php
session_start();

$id_region = $_SESSION['Region'];

$requeteEchantillon = $bdd->prepare("SELECT * FROM Echantillon");
$requeteEchantillon->execute();
$echantillons = $requeteEchantillon->fetchAll(PDO::FETCH_ASSOC);

$requeteYear = $bdd->prepare("SELECT DISTINCT YEAR(date) AS annee FROM CompteRendu WHERE id_region = :id_region");
$requeteYear->bindParam(':id_region', $id_region, PDO::PARAM_INT);
$requeteYear->execute();
$years = $requeteYear->fetchAll(PDO::FETCH_ASSOC);

$labels = [];
$data = [];

if (isset($_POST['button'])) {
    $selectedYear = $_POST['annee'];
    $selectedEchantillon = $_POST['echantillons'];

    $requeteDate = $bdd->prepare("SELECT MONTH(date) as mois, COUNT(*) as nb_compteRendu FROM CompteRendu WHERE id_region = :id_region AND YEAR(date) = :selectedYear AND (id_echantillon_1 = :selectedEchantillon OR id_echantillon_2 = :selectedEchantillon) GROUP BY mois ORDER BY mois");
    $requeteDate->bindParam(':id_region', $id_region, PDO::PARAM_INT);
    $requeteDate->bindParam(':selectedYear', $selectedYear, PDO::PARAM_INT);
    $requeteDate->bindParam(':selectedEchantillon', $selectedEchantillon, PDO::PARAM_INT);
    $requeteDate->execute();
    $resultats = $requeteDate->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultats as $row) {
        $labels[] = $row['mois'] . '/' . $selectedYear;
        $data[] = $row['nb_compteRendu'];
    }
}