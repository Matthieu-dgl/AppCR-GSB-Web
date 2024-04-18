<?php

try {
    $password = "Fabzummogxe3";
    $bdd = new PDO('mysql:host=manonca421.mysql.db;dbname=manonca421;charset=utf8;', 'manonca421', $password, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    die($e->getMessage());
}

?>