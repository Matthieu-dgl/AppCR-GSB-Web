<?php
session_start();

$region = $_SESSION['Region'];

$nombreMedicament = "SELECT E.nom, COUNT(C.id_compteRendu) as count
FROM Echantillon E
LEFT JOIN CompteRendu C ON E.id_echantillon = C.id_echantillon_1 OR E.id_echantillon = C.id_echantillon_2
GROUP BY E.nom";

$sql = "SELECT u.nom, u.prenom
FROM user u
JOIN Region r ON u.Region = r.id_region
WHERE r.id_region = $region AND u.Type = 'visiteur'";

$nombreCR = "SELECT COUNT(CR.id_compteRendu) AS count FROM CompteRendu CR WHERE CR.date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH);";

$stmt = $bdd->query($sql);
$result = $bdd->query($nombreMedicament);
$resultat = $bdd->query($nombreCR);
$data1 = $resultat->fetchAll(PDO::FETCH_ASSOC);
$data = $result->fetchAll(PDO::FETCH_ASSOC);
$visiteur = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>