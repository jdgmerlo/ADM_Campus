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
            <?php
            if (isset($_GET['delete']) == 1) {
                echo "<h4><span class='bg-success'>Eliminado Con Éxito...</span></h4>";
            }
            ?>
            <br />
            <br />
            <div class="row">
                <div class="col-md-2">

                </div>
                <div class="col-md-5">
                    <?php
                    if (isset($_GET['var']) == 7) {
                        echo "<h4><span class='bg-success'>Guardado Con Éxito...</span></h4>";
                    }
                    ?>
                    <!--INGRESO ALUMNO-->
                    <h3><span class="label label-info">Ingreso Alumno</span></h3>
                    <div class="col-sm-4">
                        <form action="guardar_alumno.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">DNI</label>
                                <input type="text" class="form-control" name="dni" id="exampleInputEmail1" required="required" placeholder="D.N.I">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="exampleInputPassword1" required="required" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="exampleInputEmail1" required="required" placeholder="Apellido">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Legajo</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="legajo" required="required" placeholder="Legajo">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="correo" id="exampleInputEmail1" required="required" placeholder="Email">
                            </div>

                            <div class="radio">
                                <label>
                                    <input type="radio" name="id_carrera" id="optionsRadios1" value="1" checked="cheked">
                                    Sistemas
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="id_carrera" id="optionsRadios2" value="2">
                                    Clinicos
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="id_carrera" id="optionsRadios3" value="3">
                                    Contables
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="id_carrera" id="optionsRadios3" value="4">
                                    Ambientales
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Guardar</button>
                        </form>
                    </div>
                    <!--FIN INGRESO ALUMNO-->
                </div>
                <div class="col-md-5">
                    <?php
                    if (isset($_GET['Var']) == 8) {
                        echo "<h4><span class='bg-success'>Guardado Con Éxito...</span></h4>";
                    }
                    ?>
                    <!--INGRESO PROFESOR-->
                    <h3><span class="label label-info">Ingreso Alumno</span></h3>
                    <div class="col-sm-4">
                        <form action="guardar_profesor.php" method="post">


                            <div class="form-group">
                                <label for="exampleInputEmail1">DNI</label>
                                <input type="text" class="form-control" name="dni" id="exampleInputEmail1" required="required" placeholder="D.N.I">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nombre</label>
                                <input type="text" class="form-control" name="nombre" id="exampleInputPassword1" required="required" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Apellido</label>
                                <input type="text" class="form-control" name="apellido" id="exampleInputEmail1" required="required" placeholder="Apellido">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ID_Profesor</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="id_profesor" required="required" placeholder="ID_Profesor">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="correo" id="exampleInputEmail1" required="required" placeholder="Email">
                            </div>
                            <button type="submit" class="btn btn-default">Guardar</button>
                        </form>
                    </div>
                    <!--FIN INGRESO PROFESOR-->

                </div>

            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

    </body>
</html>