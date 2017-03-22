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


$query = "SELECT * FROM administrador";
$con = $conexion->prepare($query);
$con->execute();

$r = $con->fetch(PDO::FETCH_ASSOC);


//$sql = "SELECT * FROM administrador WHERE nombre = :USUARIO and password = :PASS";
//$consulta = $conexion->prepare($sql);
//$consulta->bindParam(":USUARIO", $usuario);
//$consulta->bindParam(":PASS", $pass);
//$consulta->execute();
//$resultado = $consulta->fetch(PDO::FETCH_ASSOC);

$pass_descifrada = password_verify($pass, $r['password']);


if ($pass_descifrada) {

    if ($r['nombre'] == $usuario) {
        session_start();
        $_SESSION['nombre'] = $r['nombre'];
        $_SESSION['rol'] = $r['rol'];
        header("location:panel_adm.php");
    } else {
        header("location:index.php?error=1");
    }
} else {
    header("location:index.php?error=1");
}
?>
