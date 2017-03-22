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
                    $carrera = $_GET['carrera'];
                    ?>
                    <br />
                    <hr />
                    <br />
                    <br />
                    <form class="form-horizontal" method="post" action="agregar_noticia.php?carrera=<?php echo $carrera ?>">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Noticia</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="mensaje" id="inputPassword3" required="required" placeholder="Escriba la Noticia Aquí..."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="submit" class="btn btn-default">Enviar Noticia</button>
                            </div>
                        </div>
                    </form>



                </div>
                <div class="col-md-2">




                </div>

            </div>
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

    </body>
</html>