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
                    
                    <h2><span class="label label-default">BUSCADOR</span></h2>
                    <br />
                    <br />
                    <div class="col-sm-4">
                        <form method="post" action="buscando_proceso.php">
                            <select class="form-control" name="rol">
                                <option value="alumno">Alumno</option>
                                <option value="profesor">Profesor</option>
                            </select>
                            <br />
                            <div class="radio">
                                <label>
                                    <input type="radio" name="dato" id="optionsRadios1" value="dni" checked>
                                    DNI
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="dato" id="optionsRadios1" value="nombre" checked>
                                    Nombre
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="dato" id="optionsRadios1" value="apellido" checked>
                                    Apellido
                                </label>
                            </div>
                            <br />
                            <div class="form-group">
                                <label for="exampleInputEmail1">Buscador</label>
                                <input type="text" class="form-control" name="buscar" id="exampleInputEmail1" required="required" placeholder="Dato...">
                            </div>
                            <button type="submit" class="btn btn-default">Buscar</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-2">




                </div>

            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

    </body>
</html>