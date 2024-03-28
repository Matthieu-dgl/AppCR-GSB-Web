<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredCode = $_POST["code"];

    $task = $bdd->prepare("SELECT * FROM reset WHERE code = ? AND expiration_date > NOW()");
    $task->execute([$enteredCode]);

    if ($task->rowCount() > 0) {
        header("Location: Index.php?page=Change");
        exit();
    } else {
        echo "<script> alert('Le code est invalide.') </script>";
    }
}
?>