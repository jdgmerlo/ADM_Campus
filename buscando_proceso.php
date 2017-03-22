<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['nombre'])) {
    header("location:index.php?Error=2");
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Campus Virtual</title>
        <link rel="stylesheet" href="estilos/estilos.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-30858985-1']);
            _gaq.push(['_trackPageview']);
            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' === document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </head>
    <body>
        <div id="contenedor-principal">
            <header>
                <div id="cabecera-principal">
                    <div class="row" >
                        <div class="col-lg-12">
                            <h3 id="titulo">Plataforma Interactiva Administrador</h3>
                        </div>
                    </div>
                </div>
            </header>
            <br />
            <hr />
            <?php
            echo "<h3><span class='bg-warning'>Bienvenido: " . $_SESSION['nombre'] . "</span></h3>";
            ?>
            <br />

            <?php
            include("barra-navegacion.php");
            ?>
            <br />
            <br />
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <?php
                    $rol = $_POST['rol'];
                    $dato = $_POST['dato'];
                    $buscar = $_POST['buscar'];


                    try {
                        $conexion = new PDO("mysql:host=localhost;dbname=campus", "root", "");
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                        echo $ex->getLine();
                    }

                    if ($rol == 'alumno') {
                        if ($dato == 'dni') {
                            $sql = "SELECT * FROM alumnos WHERE $dato LIKE '%$buscar%'";
                        } else {
                            $sql = "SELECT * FROM alumnos WHERE $dato LIKE '%$buscar%'";
                        }
                        $consulta = $conexion->prepare($sql);
                        $consulta->execute();
                    }
                    if ($rol == 'profesor') {
                        if ($dato == 'dni') {
                            $sql = "SELECT * FROM profesor WHERE $dato LIKE '%$buscar%'";
                        } else {
                            $sql = "SELECT * FROM profesor WHERE $dato LIKE '%$buscar%'";
                        }
                        $consulta = $conexion->prepare($sql);
                        $consulta->execute();
                    }


                    echo "<table class = 'table table-striped'>";
                    echo "<tr>";
                    echo "<td><strong>DNI</strong></td>";
                    echo "<td><strong>NOMBRE</strong></td>";
                    echo "<td><strong>APELLIDO</strong></td>";
                    echo "<td><strong>CORREO</strong></td>";
                    echo "</tr>";
                    while ($resultado = $consulta->fetch(PDO::FETCH_ASSOC)) {

                        echo "<tr>";
                        echo "<td>" . $resultado['dni'] . "</td>";
                        echo "<td>" . $resultado['nombre'] . "</td>";
                        echo "<td>" . $resultado['apellido'] . "</td>";
                        echo "<td>" . $resultado['correo'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    ?>
                </div>
                <div class="col-md-2">


                </div>

            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

    </body>
</html>