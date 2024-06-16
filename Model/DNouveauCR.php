<?php
session_start();


$requetePraticienAll = $bdd->query("SELECT id_praticien, nom, id_cabinet FROM Praticien");
$PraticienAll = $requetePraticienAll->fetchAll();

$requeteEchantillonAll = $bdd->query("SELECT id_echantillon, nom, quantite FROM Echantillon WHERE sortie = 0");
$EchantillonAll = $requeteEchantillonAll->fetchAll();

if(isset($_POST['button'])){

    $motif = htmlspecialchars($_POST['motif']);
    $note = $_POST['note'];
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $date = $_POST['date'];
    $idvisiteur = $_SESSION['Id_user'];
    $idpraticien = $_POST['praticien']; // Utilisation de 'praticien' pour récupérer la valeur
    $idechantillon1 = $_POST['idechantillon1'];
    $idechantillon2 = ($_POST['idechantillon2'] !== 'NULL') ? $_POST['idechantillon2'] : NULL;
    $idregion = $_SESSION['Region'];



    try {
        $insertUsers = $bdd->prepare("INSERT INTO CompteRendu (date, motif, bilan, id_visiteur, id_praticien, id_echantillon_1, note,id_cabinet, id_region, id_echantillon_2 ) VALUES (?, ?, ?, ?, ?, ?, ?,(SELECT id_cabinet FROM Praticien WHERE id_praticien =?),?, ?)");

        if ($insertUsers->execute(array($date, $motif, $commentaire, $idvisiteur, $idpraticien, $idechantillon1, $note,$idpraticien,$idregion,$idechantillon2 ))) {
        }




        echo "<script> alert('Demande envoyé !') </script>";
        header('Location: Index.php?page=HistoriqueCompteRenduDelegue');
    } catch (PDOException $e) {
        echo "Erreur d'insertion dans la base de données : " . $e->getMessage();
    }

}




?>