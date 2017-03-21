<?php
session_start();
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$id_profesor = $_POST['id_profesor'];
$correo = $_POST['correo'];

$pass_provisoria = rand(0000, 9999);

try {
    $conexion = new PDO("mysql:host=localhost; dbname=campus", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");


    $sql = "INSERT INTO profesor (dni, nombre, apellido, password, correo, rol, id_profesor ) VALUES ('$dni', '$nombre', '$apellido', '$pass_provisoria' , '$correo', 'profesor', '$id_profesor')";

    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    header("location:panel_adm.php?Var=8");
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}
?>