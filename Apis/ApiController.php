<?php
include('ApiCreate.php');
include('Controller.php');
header("Content-Type: application/json");

$action = "getInfoCR";

$bdd = $_POST[''];
$userId = $_POST[''];
$timeStamp = $_POST[''];
$token = $_POST[''];

switch ($action) {
    case "getInfoCR":
        $praticiens = getAllPraticien();
        $echantillons = getAllEchantillions();
        echo json_encode($echantillons);
        echo json_encode($praticiens);
        break;
    case "createCR":
        createCR($bdd, $userId, $timeStamp, $token);
        break;
    default:
        echo "Action non reconnue";
}
?>