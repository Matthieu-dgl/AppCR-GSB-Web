<?php
session_start();

$id_region = $_SESSION['Region'];


$nombreMedicamentQuery = "SELECT E.nom, COUNT(C.id_compteRendu) as count
                          FROM Echantillon E
                          LEFT JOIN CompteRendu C ON E.id_echantillon = C.id_echantillon_1 OR E.id_echantillon = C.id_echantillon_2
                          GROUP BY E.nom";

$nombreMedicamentStmt = $bdd->prepare($nombreMedicamentQuery);
$nombreMedicamentStmt->execute();
$data1 = $nombreMedicamentStmt->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT u.nom, u.prenom
        FROM user u
        JOIN Region r ON u.Region = r.id_region
        WHERE r.id_region = :region AND u.Type = 'visiteur'";

$stmt = $bdd->prepare($sql);
$stmt->bindParam(':region', $id_region, PDO::PARAM_INT);
$stmt->execute();
$visiteur = $stmt->fetchAll(PDO::FETCH_ASSOC);


$nombreCRQuery = "SELECT COUNT(id_compteRendu) AS count FROM CompteRendu WHERE date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$nombreCRStmt = $bdd->query($nombreCRQuery);
$data2 = $nombreCRStmt->fetchAll(PDO::FETCH_ASSOC);

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
?>
