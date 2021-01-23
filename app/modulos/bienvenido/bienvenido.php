<?php
if ($_SESSION['session_usr']['usr_rol'] == "Administrador" || $_SESSION['session_usr']['usr_rol'] == "Auditor externo") :
    cargarComponente('breadcrumb', '', 'Panel de control');

    cargarPagina('adminpanel', $rutas);
?>



<?php
elseif ($_SESSION['session_usr']['usr_rol'] != "Administrador"  &&  $_SESSION['session_usr']['usr_rol'] != "Alumno") :
    cargarComponente('breadcrumb', '', 'Panel de control');


?>
    <div class="container">
        <h4>Hola <strong class="text-primary"><?php echo $_SESSION['session_usr']['usr_nombre'] ?></strong> bienvenido(a) al sistema</h4>

        <?php if ($_SESSION['session_usr']['usr_caja'] == 0) : ?>
            <a href="<?php echo HTTP_HOST . 'abrir-caja' ?>" class="btn btn-primary"> Abrir caja</a>
        <?php else : ?>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title text-success">Caja abierta</h4>
                            <?php $copn = CajasModelo::mdlMostrarCajasById($_SESSION['session_usr']['usr_caja']); ?>
                            <p class="card-text">Responsable <strong><?php echo $copn['usr_nombre']; ?> </strong> </p>
                            <p class="card-text">Caja <strong><?php echo $copn['cja_nombre']; ?> </strong> </p>
                            <p class="card-text">Sucursal <strong><?php echo $copn['scl_nombre']; ?> </strong> </p>
                            <p class="card-text">Fecha de apertura <strong><?php echo $copn['copn_fecha_abrio']; ?> </strong> </p>

                            <a href="<?php echo HTTP_HOST . 'cerrar-caja' ?>" class="btn btn-danger float-right">Cerrar caja</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </div>

<?php else : ?>
    <div class="container">
        <h4>Hola <strong class="text-primary"><?php echo $_SESSION['session_usr']['usr_nombre'] . ' ' . $_SESSION['session_usr']['usr_app']  ?></strong> bienvenido(a) al sistema</h4>


    </div>
<?php endif; ?>