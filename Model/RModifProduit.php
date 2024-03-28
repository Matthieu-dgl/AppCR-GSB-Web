<?php
session_start();


if (isset($_GET['id_echantillon'])) {
    $id_echantillon = $_GET['id_echantillon'];

    $queryProduitDetail = "SELECT id_echantillon, nom, dateDistribution, quantite, description, sortie FROM Echantillon WHERE id_echantillon = :id";
    $ProduitDetail = $bdd->prepare($queryProduitDetail);
    $ProduitDetail->bindParam(':id', $id_echantillon);
    $ProduitDetail->execute();
}

if (isset($_POST['button_produit'])) {
    $nouveau_nom = $_POST['nouveau_nom'];
    $nouvelle_date = $_POST['nouvelle_date'];
    $nouvelle_Quantité = $_POST['nouvelle_Quantité'];
    $nouvelle_sortie = ($_POST['nouvelle_sortie'] !== 'zero') ? $_POST['nouvelle_sortie'] : 0;
    $nouvelle_description = $_POST['nouvelle_description'];

    if ($nouveau_nom && $nouvelle_date && $nouvelle_Quantité && $nouvelle_description) {
        $queryUpdatePraticien = "UPDATE Echantillon SET nom = ?, dateDistribution = ?, quantite = ?, description = ?, sortie = ? WHERE id_echantillon = ?";
        $UpdatePraticien = $bdd->prepare($queryUpdatePraticien);
        $UpdatePraticien->execute(array($nouveau_nom, $nouvelle_date, $nouvelle_Quantité, $nouvelle_description, $nouvelle_sortie, $id_echantillon));

        header('Location: index.php?page=ModifProduit&id_echantillon=' . $id_echantillon);
        exit();
    }
}
?>