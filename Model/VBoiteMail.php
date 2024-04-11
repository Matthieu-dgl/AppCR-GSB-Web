<?php

session_start();

$id_visiteur = $_SESSION['Id_user'];
$requete = $bdd->prepare("SELECT u.Nom as 'nom_visiteur', u.Prenom as 'prenom_visiteur', m.id_delegue, m.id_mail, m.date, m.objet,m.message 
FROM Mail m 
INNER JOIN user u On m.id_visiteur = u.id_user
where m.id_visiteur= ?
order by m.date desc
");
$requete->execute([$id_visiteur]);
$mails = $requete->fetchAll(PDO::FETCH_ASSOC);

?>