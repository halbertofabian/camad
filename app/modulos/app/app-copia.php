<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo TITULO_APP ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo ICON_APP ?>" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?php echo HTTP_HOST . 'app/'  ?>assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo HTTP_HOST . 'app/'  ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo HTTP_HOST . 'app/'  ?>assets/css/atlantis2.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo HTTP_HOST . 'app/'  ?>assets/css/demo.css">


    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/sweetalert.min.js"></script>

    <!-- Toastr -->
    <link href="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/toastr/build/toastr.min.css" rel="stylesheet" />






    <!--   Core JS Files   -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/core/popper.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Dropzone -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Bootstrap Wizard -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

    <!-- jQuery Validation -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Summernote -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>





    <!-- Toastr -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/toastr/build/toastr.min.js"></script>

    <!-- Number Jquery -->


    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/plugin/jquery-number/jquery.number.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>




</head>
<div class="url-app" urlApp="<?php echo HTTP_HOST ?>"></div>

<?php if (isset($_SESSION['session']) && $_SESSION['session']) : ?>

    <body>
        <div class="wrapper">

            <?php
            if (isset($_GET['ruta']) && $_GET['ruta'] == 'pos') {
                cargarPagina('pos');
                cargarComponente('footer');
                exit;
            }


            ?>

            <?php cargarComponente('header') ?>


            <!-- Sidebar -->
            <?php //cargarComponente('sidebar') 
            ?>

            <!-- End Sidebar -->

            <div class="main-panel">
                <div class="container">

                    <?php


                    if (isset($_GET['ruta'])) {
                        //Traer la lista blanca de paginas adminitas
                        $listaBlanca = AppControlador::obtenerListaBlanca();

                        //Guardad en la variable la ruta que venga de GET

                        //Crea un arreglo vacio
                        $rutas = array();

                        // Crea los elementos del arreglo a partir de caracter /
                        $rutas = explode("/", $_GET['ruta']);

                        // Asigna a la variable el primer item del arreglo que será la página
                        $ruta_get = $rutas[0];
                        //Inicializamos una bandera en true para ver si hay pagina admitida
                        $_404 = true;
                        //Recorremos la lista de paginas admitidas
                        foreach ($listaBlanca as $item) {
                            //Si hay una conincidencia con lo que venga por GET y un elemento de mi lista
                            if ($ruta_get == $item) {
                                //Marcar la bandera en false indicando que si existe la pagina
                                $_404 =  false;
                            }
                        }
                        //Guardar la pagina mostrar dependiendo la bandera
                        $page = $_404 ? '404' : $ruta_get;

                        //Cargar la pagina solicitada

                        cargarPagina($page, $rutas);
                    } else {
                        cargarPagina('bienvenido');
                    }

                    ?>

                </div>



            </div>
            <?php cargarComponente('footer'); ?>


            <!-- Custom template | don't include it in your project! -->

            <!-- End Custom template -->
        </div>


    </body>
<?php else :
    cargarPagina('login');
endif; ?>

</html>