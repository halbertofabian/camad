<div class="container">
    <div class="row">
        <div class="col-12 table-responsive ">
            <table class="table table-cps tablas table-bordered tablaPagosAlumno table-striped table-hover">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Vendedor Asociado</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha Fin</th>
                        <th>Tope</th>
                        <th>Uso</th>
                        <th>Usuario registro</th>
                        <th>Fecha registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $cupones = CuponesModelo::mdlMostrarCuponesActivos();
                    foreach ($cupones as $key => $cps) :
                        ?>
                        <tr style="text-align: center;">
                            <td><?php echo $cps['cps_codigo'] ?></td>
                            <td><?php echo $cps['cps_nombre'] ?></td>
                            <td><?php echo $cps['cps_asociado'] ?></td>
                            <td><?php echo $cps['cps_fecha_inicio'] ?></td>
                            <td><?php echo $cps['cps_fecha_fin'] ?></td>
                            <td>
                                <?php
                                if ($cps['cps_tope'] < 0)
                                    echo '-';
                                else
                                    echo $cps['cps_tope'];
                                ?>

                            </td>
                            <td><?php echo $cps['cps_uso']; ?></td>
                            <td><?php echo $cps['cps_usuario_registro'] ?></td>
                            <td><?php echo $cps['cps_fecha_registro'] ?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-success" href="<?= HTTP_HOST . 'cupones/update/'. $cps['cps_codigo'] ?>" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-edit"></i> Editar</a>
                                    <button type="button" class="btn btn-danger btnElimimarCupon" cps_codigo="<?= $cps['cps_codigo'] ?>"><i class="fa fa-trash"></i> Eliminar</button>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


