<?php
session_start();


$requeteEchantillionT = $bdd->prepare("SELECT count(id_echantillon) 'count' FROM Echantillon");
$requeteEchantillionT->execute();
$echantillonT = $requeteEchantillionT->fetchAll();

$requeteEchantillionS = $bdd->prepare("SELECT count(id_echantillon) 'count' FROM Echantillon where sortie=1");
$requeteEchantillionS->execute();
$echantillonS = $requeteEchantillionS->fetchAll();

$requeteEchantillionTEST = $bdd->prepare("SELECT count(id_echantillon) 'count' FROM Echantillon where sortie=0");
$requeteEchantillionTEST->execute();
$echantillonTEST = $requeteEchantillionTEST->fetchAll();

$requetevisiteur = $bdd->prepare("SELECT count(id_user) 'count' FROM  user where Type='visiteur' ");
$requetevisiteur->execute();
$visiteurT = $requetevisiteur->fetchAll();

$requetepraticien = $bdd->prepare("SELECT count(id_praticien) 'count' FROM Praticien ");
$requetepraticien->execute();
$praticienT = $requetepraticien->fetchAll();

$requeteCRT = $bdd->prepare("SELECT count(id_compteRendu) 'count' FROM CompteRendu ");
$requeteCRT->execute();
$CRT = $requeteCRT->fetchAll();


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
        WHERE u.Type = 'visiteur'";

$stmt = $bdd->prepare($sql);
$stmt->execute();
$visiteur = $stmt->fetchAll(PDO::FETCH_ASSOC);


$nombreCRQuery = "SELECT COUNT(id_compteRendu) AS count FROM CompteRendu WHERE date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
$nombreCRStmt = $bdd->query($nombreCRQuery);
$data2 = $nombreCRStmt->fetchAll(PDO::FETCH_ASSOC);

$requeteEchantillon = $bdd->prepare("SELECT * FROM Echantillon");
$requeteEchantillon->execute();
$echantillons = $requeteEchantillon->fetchAll(PDO::FETCH_ASSOC);

$requeteYear = $bdd->prepare("SELECT DISTINCT YEAR(date) AS annee FROM CompteRendu");
$requeteYear->execute();
$years = $requeteYear->fetchAll(PDO::FETCH_ASSOC);

$labels = [];
$data = [];

if (isset($_POST['button'])) {
    $selectedYear = $_POST['annee'];
    $selectedEchantillon = $_POST['echantillons'];

    $requeteDate = $bdd->prepare("SELECT MONTH(date) as mois, COUNT(*) as nb_compteRendu FROM CompteRendu WHERE  YEAR(date) = :selectedYear AND (id_echantillon_1 = :selectedEchantillon OR id_echantillon_2 = :selectedEchantillon) GROUP BY mois ORDER BY mois");
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
