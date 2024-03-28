<?php

    session_start();

    $queryProduit = "SELECT * FROM Echantillon";
    $Produit = $bdd->prepare($queryProduit);
    $Produit->execute();

?>