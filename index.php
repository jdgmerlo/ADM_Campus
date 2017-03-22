<!DOCTYPE html>
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
            <br />

            <div id="cartel_bienvenida">

                <br />
                <span class="glyphicon glyphicon-menu-down"></span>
            </div>
            <br />
            <br />
            <div class="row">
                <div class="col-md-2">

                </div>

                <div class="col-md-8">

                    <?php
                    if (isset($_GET['Error']) == 2) {
                        echo "Ingrese los Datos";
                    }
                    ?>

                    <div id="ingreso-administrador">
                        <form class="form-horizontal" method="post" action=conexion.php>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="inputEmail3" placeholder="Usuario" name="nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label"></label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Contraseña" name="pass">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_GET['error']) == 1) {
                            echo "Contraseña Incorrecta";
                        }
                        ?>

                    </div>

                </div>

                <div class="col-md-2">
                    <strong>Enlaces:</strong>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="http://www.isft177.edu.ar/">ISFT 177</a></li>
                        <li class="list-group-item"><a href="http://www.progresar.anses.gob.ar/">PROG.R.ES.AR.</a></li>
                        <li class="list-group-item"><a href="http://www.abc.gov.ar/">Buenos Aires Provincia</a></li>
                        <li class="list-group-item"><a href="http://www.google.com.ar/">Google</a></li>
                    </ul>
                </div>
            </div>




        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>