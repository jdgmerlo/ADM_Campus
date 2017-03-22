<?php
session_start();
$noticia = $_POST['mensaje'];
$carrera = $_GET['carrera'];
$carr = strtolower($carrera);
$rol = $_SESSION['rol'];


$db_name = "root";
$db_pass = "";

try {

    $conexion = new PDO("mysql:host=localhost;dbname=campus", $db_name, $db_pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}
echo $rol;
$query = "INSERT INTO $carr (noticia, id_profesor) VALUES ('$noticia', '$rol')";
$con = $conexion->prepare($query);

$con->execute();

header("location:panel_adm.php");
?>