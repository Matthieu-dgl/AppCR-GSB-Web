<?php
session_start();

$queryUser = "SELECT Id_user, user.Nom,Prenom, Email, Region.nom  'nomR', Type FROM user left join Region on user.Region=Region.id_region order by Id_user";
$User = $bdd->prepare($queryUser);
$User->execute();
?>