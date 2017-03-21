<?php

$dni = $_GET['eliminar'];

try {

    $conexion = new PDO("mysql:host=localhost; dbname=campus", "root", "");

    $sql = "DELETE FROM alumnos WHERE dni = :DNI";

    $consulta = $conexion->prepare($sql);
    $consulta->bindParam(":DNI", $dni);
    $consulta->execute();
    header("location:panel_adm.php?delete=1");
   
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}
?>