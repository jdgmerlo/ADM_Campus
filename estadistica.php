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
                    try {

                        $conexion = new PDO("mysql:host=localhost; dbname=campus", "root", "");
                        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $conexion->exec("SET CHARACTER SET UTF8");

                        $sql = "SELECT * FROM alumnos";
                        $consulta = $conexion->prepare($sql);
                        $consulta->execute();
                        $fila_alumno = $consulta->fetch(PDO::FETCH_ASSOC);

                        $sql2 = "SELECT * FROM profesor";
                        $consulta2 = $conexion->prepare($sql2);
                        $consulta2->execute();
                        $fila_profesor = $consulta2->fetch(PDO::FETCH_ASSOC);

                        $row_alumno = $consulta->rowCount();
                        $row_profesor = $consulta2->rowCount();

                        echo "<h2><span class='label label-default'>Alumnos</span></h2>";
                        echo "<br />";
                        echo "<br />";
                        echo "<div class = 'progress'>";
                        echo "<div class = 'progress-bar progress-bar-success progress-bar-striped' role = 'progressbar' aria-valuenow = '$row_alumno' aria-valuemin = '0' aria-valuemax = '700' style = 'width: $row_alumno%'>";
                        echo "$row_alumno</h3>";
                        echo "</div>";
                        echo "</div>";
                        echo "<br />";
                        echo "<h2><span class='label label-default'>Profesores</span></h2>";
                        echo "<br />";
                        echo "<br />";
                        echo "<div class = 'progress'>";
                        echo " <div class = 'progress-bar progress-bar-info progress-bar-striped' role = 'progressbar' aria-valuenow = '$row_profesor' aria-valuemin = '0' aria-valuemax = '700' style = 'width: $row_profesor%'>";
                        echo "$row_profesor</h3>";
                        echo "</div>";
                        echo "</div>";
                    } catch (Exception $ex) {
                        echo $ex->getMessage();
                        echo $ex->getLine();
                    }
                    ?>
                </div>
                <div class="col-md-2">


                </div>

            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

    </body>
</html>