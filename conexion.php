<?php

$usuario = $_POST['nombre'];
$pass = $_POST['pass'];

try {
    $conexion = new PDO("mysql:host=localhost; dbname=campus", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}

$sql = "SELECT * FROM administrador WHERE nombre = :USUARIO and password = :PASS";
$consulta = $conexion->prepare($sql);
$consulta->bindParam(":USUARIO", $usuario);
$consulta->bindParam(":PASS", $pass);
$consulta->execute();

$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

if ($resultado['nombre'] == $usuario && $resultado['password'] == $pass) {
    session_start();
    $_SESSION['nombre'] = $resultado['nombre'];
    $_SESSION['rol'] = $resultado['rol'];
    header("location:panel_adm.php");
} else {
    header("location:index.php?error=1");
}
?>
