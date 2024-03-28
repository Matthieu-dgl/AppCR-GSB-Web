<?php
header("Content-Type:application/json");
function checkUserIdOrToken($userId, $token){
    if (!$userId || !$token) {
        throw new Exception("User ID or token not provided", 400);
        return false;
    } else {
        return true;
    }
}

function checkTimeStamp($bdd, $userId, $token){
    try {
        $tokenQuery = $bdd->prepare("SELECT TimeStamp FROM user WHERE Id_user = :id AND Token = :token");
        $tokenQuery->execute(['id' => $userId, 'token' => $token]);
        return $tokenQuery->fetch();

    } catch (Exception $e) {
        $json = array("status" => $e->getCode(), "message" => $e->getMessage());
        echo json_encode($json);
        exit;
    }
}

function queryUser($bdd, $userId){
    $userQuery = $bdd->prepare("SELECT * FROM user WHERE Id_user = :id");
    $userQuery->execute(['id' => $userId]);
    return $userQuery->fetch();
}

function createCR($bdd, $userId, $timeStamp, $token, $motif, $date, $note, $praticien, $visiteur, $cabinet, $region, $echantillon1, $echantillon2, $commentaire){
    try {
        $user = queryUser($bdd, $userId);
        if (checkUserIdOrToken($userId, $token) && checkTimeStamp($bdd, $userId, $token)) {
            $timeElapsed = time() - strtotime($user['TimeStamp']);
            if ($timeElapsed > $timeStamp) {
                throw new Exception("Token expired", 401);
            }
            function verify($param)
            {
                return isset($param) && trim($param) !== '';
            }

            if (!verify($motif) && !verify($date) && !verify($note) && !verify($praticien) && !verify($echantillon1) && !verify($commentaire) && !verify($visiteur) && !verify($cabinet) && !verify($region)) {
                throw new Exception("Les champs obligatoires ne peuvent pas être vides ou null.", 400);
            }
            $createCR = $bdd->prepare("INSERT INTO CompteRendu (date, motif, bilan, id_visiteur, id_praticien, id_echantillon_1, note,id_cabinet, id_region, id_echantillon_2 ) VALUES (?, ?, ?, ?,?,?,?,?,?,?)");
            $createCR->execute([$date, $motif, $commentaire, $visiteur, $praticien, $echantillon1, $note, $cabinet, $region, $echantillon2]);
            $updateTimestamp = $bdd->prepare("UPDATE user SET TimeStamp = CURRENT_TIMESTAMP WHERE Id_user = :id");
            $updateTimestamp->execute(['id' => $userId]);
            $json = array("status" => 200, "message" => "Compte-rendu créé avec succès");

            return json_encode($json);
        }
    } catch (Exception $e) {
        $json = array("status" => $e->getCode(), "message" => $e->getMessage());
        return json_encode($json);
    }
}

function getAllPraticien($bdd) {
    $requetePraticienAll = $bdd->query("SELECT id_praticien, nom, id_cabinet FROM Praticien");
    return $requetePraticienAll->fetchAll();
}
function getAllEchantillions($bdd) {
    $requeteEchantillonAll = $bdd->query("SELECT id_echantillon, nom, quantite FROM Echantillon WHERE sortie = 0");
    return $requeteEchantillonAll->fetchAll();
}

?>