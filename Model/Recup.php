<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];

    $bdd = new PDO('mysql:host=localhost;dbname=AppCR;charset=utf8;', 'root', '', array(PDO::ATTR_PERSISTENT => true));
    $code = $bdd->prepare("SELECT * FROM user WHERE Email = ?");
    $code->execute([$email]);

    if ($code->rowCount() > 0) {
        $code = rand(100000, 999999);

        $insertCode = $bdd->prepare("INSERT INTO reset (email, code, expiration_date) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
        $insertCode->execute([$email, $code]);

        $to = $email;
        $subject = "Code de Récupération de Mot de Passe";
        $message = "Votre code de récupération de mot de passe est : $code";
        $headers = "From: support@gsb.fr";

        mail($to, $subject, $message, $headers);

        header("Location: Index.php?page=Reset");
        exit();
    } else {
        echo "<script> alert('L adresse e-mail n existe pas dans notre système. Veuillez réessayer.') </script>";
    }
}
?>
