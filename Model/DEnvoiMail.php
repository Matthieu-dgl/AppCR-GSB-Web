<?php
session_start();

if(isset($_POST['button'])) {

    $objet = htmlspecialchars($_POST['objet']);
    $visiteur = $_POST['visiteur'];
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $delegue = $_SESSION['Id_user'];
    $date = date("Y-m-d H:i:s");

    $requete = $bdd->prepare("INSERT INTO Mail (objet, date, message, id_visiteur, id_delegue, lu) VALUES (?, ?, ?, ?, ?, ?)");
    $requete->execute([$objet, $date, $commentaire, $visiteur, $delegue, 0]);

}

$requete = $bdd->query("SELECT * FROM user WHERE type = 'visiteur'");
$VisiteurAll = $requete->fetchAll();

?>