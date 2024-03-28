<?php
header("Content-Type:application/json");

try {
    $password = "quckijnocVas9fixhi";
    $bdd = new PDO('mysql:host=matthiuadmin.mysql.db;dbname=matthiuadmin;charset=utf8;', 'matthiuadmin', $password, array(PDO::ATTR_PERSISTENT => true));    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

    echo json_encode(['user' => $user, "status" => 200, 'message' => "Connexion réussie", 'token' => $token]);
} else {
    echo json_encode(array("status" => 400, 'message' => "Mot de passe incorrect"));
}

$bdd = null;
?>
