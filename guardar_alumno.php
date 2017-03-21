<?php

session_start();
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$legajo = $_POST['legajo'];
$correo = $_POST['correo'];
$id_carrera = $_POST['id_carrera'];

$pass_provisoria = rand(0000, 9999);

try {
    $conexion = new PDO("mysql:host=localhost; dbname=campus", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET UTF8");


    $sql = "INSERT INTO alumnos (dni, password, nombre, apellido, legajo, correo, id_carrera,rol ) VALUES ('$dni', '$pass_provisoria', '$nombre', '$apellido', '$legajo', '$correo', '$id_carrera', 'alumno')";

    $consulta = $conexion->prepare($sql);
    $consulta->execute();
    header("location:panel_adm.php?var=7");
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}
?>