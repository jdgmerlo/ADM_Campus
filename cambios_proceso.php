<?php

$usuario = $_POST['usuario'];
$pass_actual = $_POST['pass_actual'];
$pass_nueva = $_POST['pass_nueva'];

$pass_cifrada = password_hash($pass_nueva, PASSWORD_DEFAULT);


try {

    $conexion = new PDO("mysql:host=localhost;dbname=campus", "root", "");
} catch (Exception $ex) {
    echo $ex->getMessage();
    echo $ex->getLine();
}

$sql = "SELECT * FROM administrador";
$consulta = $conexion->prepare($sql);
$consulta->execute();


$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

$pass_descifrada = password_verify($pass_actual, $resultado['password']);

if ($pass_descifrada) {

    //if ($resultado['nombre'] == $usuario) {

        $sql2 = "UPDATE administrador SET nombre = :NOMBRE , password = :PASS";
        $consulta2 = $conexion->prepare($sql2);
        $consulta2->bindParam(":NOMBRE", $usuario);
        $consulta2->bindParam(":PASS", $pass_cifrada);
        $consulta2->execute();
        header("location:panel_adm.php?exito=7");
   // } else {
     //   header("location:panel_adm.php?err=3");
   // }
} else {
    header("location:panel_adm.php?err=3");
}
?>