<?php

session_start();

$idUser = $_SESSION['Id_user'];
$region = $_SESSION['Region'];

$queryRegion = $bdd->query("SELECT u.Region, r.nom as 'RNom' FROM user as u JOIN Region as r ON u.Region = r.id_region WHERE u.Id_user = $idUser");
$nomRegion = $queryRegion->fetchAll();

?>
