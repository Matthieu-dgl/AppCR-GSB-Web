<?php
session_start();

$queryProduit = "SELECT id_echantillon, nom, DATE_FORMAT(dateDistribution, '%d/%m/%Y') as 'dateDistribution', quantite, description FROM Echantillon";
$Produit = $bdd->prepare($queryProduit);
$Produit->execute();
?>