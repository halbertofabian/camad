<?php  ?>

<div class="container">

    <?php

    if (isset($rutas[1]) && $rutas[1] == 'view-r' && isset($rutas[2])) :
        cargarComponente('breadcrumb', '', 'Corte #' . $rutas[2]);

        $corte = CajasModelo::mdlMostrarCajasById($rutas[2]);

        // preArray($corte);

    ?>

        <table class="table  table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Usuario responsable</th>
                    <th>Fecha de apertura</th>
                    <th>Fecha de cierre</th>
                    <th>Caja</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $corte['usr_nombre'] ?></td>
                    <td><?php echo $corte['copn_fecha_abrio'] ?></td>
                    <td><?php echo $corte['copn_fecha_cierre'] ?></td>
                    <td><?php echo $corte['cja_nombre'] ?></td>
                </tr>
            </tbody>
        </table>

        <?php

        $vfch_efectivo = CortesModelo::mdlConsultarTodoFichasPEByCorte($corte['copn_id']);
        // preArray($vfch_efectivo);

        ?>
        <div class="alert alert-dark" role="alert">
            <strong>FICHAS DE PAGO EFECTIVO</strong>
        </div>
        <table class="table table-striped  ">
            <thead class="">
                <tr>
                    <th># Ficha</th>
                    <th>Referenica</th>
                    <th>Sub monto</th>
                    <th>Monto total</th>
                    <th>Cupón</th>
                    <th>Fecha registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vfch_efectivo as $key => $vfe) : ?>
                    <tr>

                        <td><?php echo $vfe['vfch_id'] ?></td>
                        <td><?php echo $vfe['vfch_referencia'] ?></td>
                        <td><?php echo $vfe['vfch_sub_monto'] ?></td>
                        <td><?php echo $vfe['vfch_monto'] ?></td>
                        <td><?php echo $vfe['vfch_descuento'] ?></td>
                        <td><?php echo $vfe['vfch_fecha_registro'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                        Cantidad reportada:
                    </td>
                    <td>
                        <strong><?php echo number_format($corte['copn_ingreso_efectivo'],2) ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Cantidad real:
                    </td>
                    <td>
                        <strong><?php echo number_format($corte['copn_efectivo_real'],2) ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        Resultado:
                    </td>
                    <td>
                        <?php

                            $efectivo_r = $corte['copn_ingreso_efectivo'] - $corte['copn_efectivo_real'];
                            echo "<strong>$efectivo_r</strong>";    
                        ?>
                        
                    </td>
                </tr>

            </tbody>
        </table>





    <?php elseif (isset($rutas[1]) && $rutas[1] == 'view-t') : ?>



        <? 
    else:
        cargarComponente('breadcrumb', '', 'Gestión de cortes');
    $cortes = CajasModelo::mdlMostrarCajasById();

    // preArray($cortes);
    ?>
        <div class="row">
            <div class="col-12">
                <table class="table tablas table-striped table-hover">
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
                                <td>
                                    <a href="" class="btn btn-secondary mb-1"><i class="fa fa-file-text" aria-hidden="true"></i>
                                    </a>

                                    <a href="<?php echo HTTP_HOST . 'cortes/view-r/' . $cts['copn_id'] ?>" class="btn btn-secondary mt-1"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        </i>
                                    </a>
                                </td>


                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php endif; ?>
</div>