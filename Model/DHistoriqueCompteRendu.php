<?php

session_start();

try {

    // Requête pour récupérer les infos du CR
    $iddelegue = $_SESSION["Id_user"];
    $requeteCR = $bdd->query("SELECT c.*, p.nom as nom_praticien FROM CompteRendu c INNER JOIN Praticien p ON c.id_praticien = p.id_praticien WHERE c.id_visiteur = $iddelegue order by c.date desc");
    $resultatsCR = $requeteCR->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_POST['supprimer'])){

        $idCR = $_POST['idCR'];

        $requeteSupprimeCR = "DELETE FROM CompteRendu WHERE id_compterendu = $idCR";
        $supprimeCR = $bdd->prepare($requeteSupprimeCR);
        $supprimeCR->execute();

        header('Location: Index.php?page=HistoriqueCompteRenduDelegue');
    }
} catch (PDOException $e) {
    echo "Erreur de récupération dans la base de données : " . $e->getMessage();
}

?>