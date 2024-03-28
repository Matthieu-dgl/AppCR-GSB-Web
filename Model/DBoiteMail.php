<?php

session_start();

$id_delegue = $_SESSION['Id_user'];
$requete = $bdd->prepare("SELECT u.nom as 'nom_visiteur', u.prenom as 'prenom_visiteur', m.date, m.objet,m.message 
FROM Mail m 
INNER JOIN user u On m.id_visiteur = $id_delegue 
WHERE id_delegue = ? AND u.Type = 'visiteur'");
$requete->execute([$id_delegue]);
$mails = $requete->fetchAll(PDO::FETCH_ASSOC);

?>