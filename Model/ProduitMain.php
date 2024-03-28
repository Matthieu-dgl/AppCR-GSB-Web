<?php

    session_start();

    $queryProduit = "SELECT * FROM Echantillon WHERE sortie = 1";
    $Produit = $bdd->prepare($queryProduit);
    $Produit->execute();

?>