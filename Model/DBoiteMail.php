<?php

session_start();

$id_delegue = $_SESSION['Id_user'];
$requete = $bdd->prepare("SELECT u.Nom as 'nom_visiteur', u.Prenom as 'prenom_visiteur', m.date, m.objet,m.message 
FROM Mail m 
INNER JOIN user u On m.id_delegue = u.id_user
where m.id_delegue= ?
order by m.date desc
");
$requete->execute([$id_delegue]);
$mails = $requete->fetchAll(PDO::FETCH_ASSOC);

?>





