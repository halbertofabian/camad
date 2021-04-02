<?php

?>

<?php if (isset($rutas[1]) && $rutas[1] == 'inscripciones') :
    cargarComponente('breadcrumb_nivel_1', '', 'Informe de inscripciones', array(['ruta' => 'informes', 'label' => 'Gestión de informes']));
    cargarview2('informes/informe_inscripciones', $rutas);

?>


<?php elseif (isset($rutas[1]) && $rutas[1] == 'ventas') :
    cargarComponente('breadcrumb_nivel_1', '', 'Informe de ventas', array(['ruta' => 'informes', 'label' => 'Gestión de informes']));
    cargarview2('informes/informe_ventas', $rutas);
?>
<?php else :
    cargarComponente('breadcrumb', '', 'Gestión de informes');
?>
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Informe de inscripciones</h4>
                        <a class="btn btn-link float-right" href="<?php echo HTTP_HOST ?>informes/inscripciones">Ver</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Informe de ventas</h4>
                        <a class="btn btn-link float-right" href="<?php echo HTTP_HOST ?>informes/ventas">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>