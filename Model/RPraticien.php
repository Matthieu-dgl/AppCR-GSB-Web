<?php

    session_start();

    $queryPraticien = "SELECT id_praticien, Praticien.nom, Praticien.prenom, Praticien.specialité, Cabinet.nom as 'nomCabinet', description, Region.nom as 'nomR', user.Prenom 'prenomU', user.nom 'nomU' FROM Praticien join Cabinet on Praticien.id_cabinet=Cabinet.id_cabinet join Region on Cabinet.id_region=Region.id_region join user on Region.id_delegue=user.id_user";
    $Praticien = $bdd->prepare($queryPraticien);
    $Praticien->execute();

?>