<?php
if ($_SESSION['session_usr']['usr_rol'] != "Alumno") :
    cargarComponente('breadcrumb', '', 'Panel de control');

?>
    <div class="container">
        <h4>Hola <strong class="text-primary"><?php echo $_SESSION['session_usr']['usr_nombre'] ?></strong> bienvenido(a) al sistema</h4>


    </div>

<?php else : ?>
    <div class="container">
        <h4>Hola <strong class="text-primary"><?php echo $_SESSION['session_usr']['usr_nombre'] . ' ' . $_SESSION['session_usr']['usr_app']  ?></strong> bienvenido(a) al sistema</h4>


    </div>
<?php endif; ?>