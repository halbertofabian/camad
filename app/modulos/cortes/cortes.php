<?php cargarComponente('breadcrumb', '', 'Gestión de cortes'); ?>
<div class="container">

    <?php
    $cortes = CajasModelo::mdlMostrarCajasById();

    // preArray($cortes);
    ?>
    <div class="row">
        <div class="col-12">
            <table class="table tablas">
                <thead>
                    <tr>
                        <th># CORTE</th>
                        <th>Ingreso inicial</th>
                        <th>Usuario abrio</th>
                        <th>Fecha de ingreso</th>
                        <th>Ingreso en caja</th>
                        <th>Ingreso en banco</th>
                        <th>Ingreso en caja real</th>
                        <th>Ingreso en banco real</th>
                        <th>Fecha de cierre</th>
                        <th>Usuario cerro</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cortes as $key => $cts) : ?>
                        <tr>

                            <td><?php echo $cts['copn_id'] ?></td>
                            <td><?php echo $cts['copn_ingreso_inicio'] ?></td>
                            <td><?php echo $cts['usr_nombre'] ?></td>
                            <td><?php echo $cts['copn_fecha_abrio'] ?></td>
                            <td><?php echo $cts['copn_ingreso_efectivo'] ?></td>
                            <td><?php echo $cts['copn_ingreso_banco'] ?></td>
                            <td><?php echo $cts['copn_efectivo_real'] ?></td>
                            <td><?php echo $cts['copn_banco_real'] ?></td>
                            <td><?php echo $cts['copn_fecha_cierre'] ?></td>
                            <td><?php echo $cts['copn_usuario_cerro'] ?></td>
                            <td></td>
                            

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>