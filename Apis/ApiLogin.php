<?php
header("Content-Type:application/json");

try {
    $password = "Fabzummogxe3";
    $bdd = new PDO('mysql:host=manonca421.mysql.db;dbname=manonca421;charset=utf8;', 'manonca421', $password, array(PDO::ATTR_PERSISTENT => true));    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e);
}


function generateToken($lengh = 32)
{
    return bin2hex(openssl_random_pseudo_bytes($lengh));
}

$email = $_POST["email"];
$password = $_POST["password"];

$getUser = $bdd->prepare("SELECT * FROM user WHERE Email = :email");
$getUser->execute(['email' => $email]);
$user = $getUser->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo json_encode(array("status" => 400, 'message' => "L'utilisateur n'existe pas"));
    die();
}
if (password_verify($password, $user['Password'])) {


    $token = generateToken();
    try {
        $updateToken = $bdd->prepare("UPDATE user SET Token = :token, TimeStamp = CURRENT_TIMESTAMP WHERE Id_user = :id");
        $updateToken->execute(['token' => $token, 'id' => $user['Id_user']]);
    } catch (PDOException $e) {
        die($e);
    }

    unset($user['Password'],$user['Token']);
    $json = array_merge($user,["status" => 200, 'message' => "Connexion réussie", 'token' => $token]);
    echo json_encode($json);
} else {
    echo json_encode(array("status" => 400, 'message' => "Mot de passe incorrect"));
}

$bdd = null;
?>
