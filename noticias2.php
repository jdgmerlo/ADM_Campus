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

                    <hr />
                    <br />
                    <br />

                    <br />
                    <br />
                    <div class="panel panel-primary">
                        <div class="panel-heading">NOTICIAS</div>
                        <div class="panel-body">

                            <?php
                            $carrera = $_POST['seleccionCarrera'];

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

                            $query = "SELECT * FROM $carrera";
                            $con = $conexion->prepare($query);
                            $con->execute();



                            while ($fila = $con->fetch(PDO::FETCH_ASSOC)) {

                                if (!empty($fila['noticia'])) {
                                    echo $fila['noticia'];
                                }

                                
                                    $id = $fila['id_noticia'];
                                    echo "<a href='eliminar_noticia.php?id=$id&carrera=$carrera'> &nbsp;&nbsp;&nbsp;&nbsp; Eliminar</a>";
                             
                                echo "<br />";
                                echo "<hr />";
                            }
                            ?>
                        </div>

                    </div>
                    <a href="nueva_noticia.php?carrera=<?php echo $carrera ?>"><h2><span class="label label-info">Nueva Noticia</span></h2></a>


                </div>
                <div class="col-md-2">




                </div>

            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

    </body>
</html>