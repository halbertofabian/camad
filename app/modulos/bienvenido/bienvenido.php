<?php
if ($_SESSION['session_usr']['usr_rol'] != "Alumno") :
    cargarComponente('breadcrumb', '', 'Panel de control');

?>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4 col-sm-6">
                <div class="card text-center">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class=" fa fa-wrench text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700"> <a href="<?php echo HTTP_HOST . 'configuracion' ?>" class="text-dark">Configuración del sistema</a></h2>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
<?php else : ?>
    <div class="conainer">
        <h1>Hola <?php echo $_SESSION['session_usr']['usr_nombre'] ?> Bienvenido(a) al sistema</h1>
    </div>
<?php endif; ?>