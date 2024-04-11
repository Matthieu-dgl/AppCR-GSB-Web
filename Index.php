<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include("Controller/route.php");

$header="HeaderIndex";
$model="";
$controleur = "ControllerMain";
$vue = "IndexMain";
$js = "JsMain";
if(isset($_GET['page'])) {
    $page = $_GET['page'];
    if(isset($routes[$page]) && $routes[$page]['active'] == true) {
        $header = $routes[$page]['header'];
        $model = $routes[$page]['model'];
        $controleur = $routes[$page]['controleur'];
        $vue = $routes[$page]['vue'];
        $js = $routes[$page]['js'];

    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <?php include("Controller/Head.php"); ?>
    <?php include("Model/BDD.php"); ?>
    <?php if($controleur != null) include("Controller/" . $controleur . ".php"); ?>
    <?php if($model != null) include("Model/" . $model . ".php"); ?>
    <?php if($header != null) include("View/Header/" . $header . ".php"); ?>
</head>
<body>
<?php if($vue != null) include("View/Navigation/" . $vue . ".php"); ?>
<?php if($js != null) include("Js/" . $js . ".php"); ?>
</body>
</html>