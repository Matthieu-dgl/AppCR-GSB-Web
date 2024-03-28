<?php
include('ApiCreate.php');
session_start();

try {
    $password = "quckijnocVas9fixhi";
    $bdd = new PDO('mysql:host=matthiuadmin.mysql.db;dbname=matthiuadmin;charset=utf8;', 'matthiuadmin', $password, array(PDO::ATTR_PERSISTENT => true));    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $json = array("status" => 500, "message" => "Erreur de connexion à la base de données: " . $e->getMessage());
    echo json_encode($json);
    exit;
}

$userId = $_SESSION['Id_user'];
$token = $_SESSION['Token'];
$timeStamp = 6;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $motif = $_POST['motif'];
    $date = $_POST['date'];
    $note = $_POST['note'];
    $praticien = $_POST['id_praticien'];
    $visiteur = $_POST['id_visiteur'];
    $cabinet = $_POST['cabinet'];
    $region = $_POST['region'];
    $echantillon1 = $_POST['echantillon1'];
    $echantillon2 = $_POST['echantillon2'] ?? null;
    $commentaire = $_POST['commentaire'];
    $url = 'http://localhost:8080/AppCR-GSB/Apis/ApiCreate.php';

    $data = array(
        'Id_user' => $userId,
        'Token' => $token,
        'motif' => $motif,
        'date' =>$date,
        'note' =>$note,
        'praticien' =>$praticien,
        'visiteur' =>$visiteur,
        'cabinet' =>$cabinet,
        'region' =>$region,
        'echantillon1' =>$echantillon1,
        'echantillon2' =>$echantillon2,
        'commentaire' =>$commentaire,
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);
    curl_close($ch);
    if ($response === false) {
        echo "Erreur lors de l'appel à l'API: " . curl_error($ch);
    } else {

        $responseData = json_decode($response, true);
        $cle = array_keys($responseData);
        foreach ($responseData as $cle => $valeur) {
            echo $cle .
                ': ' . $valeur .
                '<br>';
        }
        echo 'Status: ' . $responseData['status'] . ', Message: ' . $responseData['message'];
    }
} else {
    echo "Méthode de requête non autorisée";
}
/*
    echo createCR($userId, $token, $motif, $date, $note, $praticien, $visiteur, $cabinet, $region, $echantillon1, $echantillon2, $commentaire);
    try {
        echo createCR($bdd, $userId, $timeStamp, $token);
    } catch (Exception $e) {
        die($e);
    }
} else {
    echo json_encode(["status" => 405, "message" => "Méthode de requête non autorisée"]);
}
*/
?>