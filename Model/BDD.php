<?php

try {
    $password = "quckijnocVas9fixhi";
    $bdd = new PDO('mysql:host=matthiuadmin.mysql.db;dbname=matthiuadmin;charset=utf8;', 'matthiuadmin', $password, array(PDO::ATTR_PERSISTENT => true));
} catch (PDOException $e) {
    die($e->getMessage());
}

?>