<?php
header("Content-Type:application/json");

try {
    $bdd = new PDO('mysql:host=db5015545528.hosting-data.io;dbname=dbs12698422;charset=utf8;', 'dbu351328', 'BleuBlancRouge3009!.', array(PDO::ATTR_PERSISTENT => true));
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e);
}

$userId = intval($_POST['id']);
$token = $_POST['Token'];


if (!$userId || !$token) {
    throw new Exception("User ID or token not provided", 400);
} else {

    try {

        $tokenQuery = $bdd->prepare("SELECT TimeStamp FROM user WHERE Id_user = :id AND Token = :token");
        $tokenQuery->execute(['id' => $userId, 'token' => $token]);
        $user = $tokenQuery->fetch();

        if ($user) {
            $timeElapsed = time() - strtotime($user['TimeStamp']);
            if ($timeElapsed > 6000) {
                throw new Exception("Token expired", 401);
            }

            function verify($param)
            {
                return isset($param) && trim($param) !== '';
            }

            $motif = $_POST['motif'];
            $date = $_POST['date'];
            $note = $_POST['note'];
            $praticien = intval($_POST['id_praticien']);
            $echantillon1 = $_POST['echantillon1'];
            $echantillon2 = $_POST['echantillon2'] ?? null;
            $commentaire = $_POST['commentaire'];
            $visiteur = intval($_POST['id_visiteur']);
            $cabinet = $_POST['cabinet'];
            $region = $_POST['region'];

            if (!verify($motif) && !verify($date) && !verify($note) && !verify($praticien) && !verify($echantillon1) && !verify($commentaire) && !verify($visiteur) && !verify($cabinet) && !verify($region)) {
                throw new Exception("Les champs obligatoires ne peuvent pas être vides ou null.", 400);
            }
            $createCR = $bdd->prepare("INSERT INTO CompteRendu (date, motif, bilan, id_visiteur, id_praticien, id_echantillon_1, note,id_cabinet, id_region, id_echantillon_2 ) VALUES (?, ?, ?, ?,?,?,?,?,?,?)");
            $createCR->execute([$date, $motif, $commentaire, $visiteur, $praticien, $echantillon1, $note, $cabinet, $region, $echantillon2]);
            $updateTimestamp = $bdd->prepare("UPDATE user SET TimeStamp = CURRENT_TIMESTAMP WHERE Id_user = :id");
            $updateTimestamp->execute(['id' => $userId]);
            $json = array("status" => 200, "message" => "Compte-rendu créé avec succès");
        }

    } catch (Exception $e) {
        $json = array("status" => $e->getCode(), "message" => $e->getMessage());
    }
}
echo json_encode($json);

?>