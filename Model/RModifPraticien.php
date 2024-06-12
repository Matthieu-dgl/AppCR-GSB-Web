<?php
session_start();


if (isset($_GET['id_praticien'])) {
    $id_praticien = $_GET['id_praticien'];

    $queryPraticienDetail = "SELECT id_praticien, Praticien.nom, Praticien.prenom, Praticien.specialité,description FROM Praticien join Cabinet on Praticien.id_cabinet=Cabinet.id_cabinet  join Region on Cabinet.id_region=Region.id_region WHERE id_praticien = :id";
    $PraticienDetail = $bdd->prepare($queryPraticienDetail);
    $PraticienDetail->bindParam(':id', $id_praticien);
    $PraticienDetail->execute();

    $queryCabinetDetail = "SELECT Cabinet.nom as 'nomCabinet', Cabinet.id_cabinet as 'idCabinet', Cabinet.ville as 'ville', Cabinet.codePostal as 'CP', Cabinet.rue as 'rue', Region.nom as 'region' FROM Praticien join Cabinet on Praticien.id_cabinet=Cabinet.id_cabinet  join Region on Cabinet.id_region=Region.id_region WHERE id_praticien = :id";
    $CabinetDetail = $bdd->prepare($queryCabinetDetail);
    $CabinetDetail->bindParam(':id', $id_praticien);
    $CabinetDetail->execute();


    $QueryRegion = "SELECT nom FROM Region";
    $nomRegion = $bdd->prepare($QueryRegion);
    $nomRegion->execute();

    $QueryRapport = "SELECT id_compteRendu,date,bilan,motif,user.nom as 'Unom', user.Prenom as 'UPrenom',(select max(nom) from Echantillon join CompteRendu on CompteRendu.id_echantillon_1=Echantillon.id_echantillon) as 'Enom1', (select max(nom) from Echantillon join CompteRendu on CompteRendu.id_echantillon_2=Echantillon.id_echantillon) as 'Enom2',note, Cabinet.nom as 'Cnom' FROM CompteRendu join user on CompteRendu.id_visiteur=user.Id_user join Cabinet on CompteRendu.id_cabinet=Cabinet.id_cabinet WHERE id_praticien = :id";
    $Rapport = $bdd->prepare($QueryRapport);
    $Rapport->bindParam(':id', $id_praticien);
    $Rapport->execute();

}


if (isset($_POST['button_praticien'])) {
    $nouveau_nom = $_POST['nouveau_nom'];
    $nouveau_prenom = $_POST['nouveau_prenom'];
    $nouvelle_specialite = $_POST['nouvelle_specialite'];
    $nouvelle_description = $_POST['nouvelle_description'];

    if ($nouveau_nom && $nouveau_prenom && $nouvelle_specialite && $nouvelle_description) {
        $queryUpdatePraticien = "UPDATE Praticien SET nom = ?, prenom = ?, specialité = ?, description = ? WHERE id_praticien = ?";
        $UpdatePraticien = $bdd->prepare($queryUpdatePraticien);
        $UpdatePraticien->execute(array($nouveau_nom, $nouveau_prenom, $nouvelle_specialite, $nouvelle_description, $id_praticien));

        header('Location: index.php?page=ModifPraticien&id_praticien=' . $id_praticien);
        exit();
    }
}if (isset($_POST['button_cabinet'])) {
    $nouveau_nomC = $_POST['nouveau_nomC'];
    $nouvelle_rueC = $_POST['nouvelle_rueC'];
    $nouvelle_villeC = $_POST['nouvelle_villeC'];
    $nouveau_CPC = $_POST['nouveau_CPC'];
    $nouvelle_regionC = $_POST['nouvelle_regionC'];

    if ($nouveau_nomC && $nouvelle_rueC && $nouvelle_villeC && $nouveau_CPC && $nouvelle_regionC) {
        $queryUpdateCabinet = "
    UPDATE Cabinet 
    JOIN Praticien ON Cabinet.id_cabinet = Praticien.id_cabinet 
    SET Cabinet.nom = ?, Cabinet.ville = ?, Cabinet.codePostal = ?, Cabinet.rue = ?, Cabinet.id_region = (SELECT id_region FROM Region WHERE nom = ?) 
    WHERE Praticien.id_praticien = ?";


        $updateCabinet = $bdd->prepare($queryUpdateCabinet);
        $updateCabinet->execute([$nouveau_nomC, $nouvelle_villeC, $nouveau_CPC, $nouvelle_rueC, $nouvelle_regionC, $id_praticien]);

        // Redirection ou autre logique après la mise à jour réussie
        header('Location: index.php?page=ModifPraticien&id_praticien=' . $id_praticien);
        exit();
    } else {
        echo "Veuillez fournir toutes les informations nécessaires pour mettre à jour le cabinet.";
    }
}


?>