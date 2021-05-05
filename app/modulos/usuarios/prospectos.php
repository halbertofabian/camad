
<?php
cargarComponente('breadcrumb', '', 'Lista de prospectos');
?>
<div class="containeir">
    <div class="row">
        <div class="col">
            <table class="table tablas table-striped table-hover">
                <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo electrónico</th>
                        <th>Usuario registro</th>
                        <th>Fecha registro</th>
                        <th>Plantel</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $usuarios = UsuariosModelo::mdlMostrarUsuarios("", "Alumno");
                    foreach ($usuarios as $key => $usr) {
                        $datosFicha = PagosControlador::ctrMostrarDatosFichaPagoByFicha($usr['fpg_id']);

                        $adeudo = 0;
                        $adeudo += $datosFicha['PPG_INSCRIPCION']['adeudo'];
                        $adeudo += $datosFicha['PPG_EXAMEN']['adeudo'];
                        $adeudo += $datosFicha['PPG_GUIA']['adeudo'];
                        $adeudo += $datosFicha['PPG_INCORPORACION']['adeudo'];
                        $adeudo += $datosFicha['PPG_CERTIFICADO']['adeudo'];
                        $adeudo += $datosFicha['PPG_SEMANAL']['adeudo'];

                        $total = 0;
                        $total += $datosFicha['PPG_INSCRIPCION']['total'];
                        $total += $datosFicha['PPG_EXAMEN']['total'];
                        $total += $datosFicha['PPG_GUIA']['total'];
                        $total += $datosFicha['PPG_INCORPORACION']['total'];
                        $total += $datosFicha['PPG_CERTIFICADO']['total'];
                        $total += $datosFicha['PPG_SEMANAL']['total'];

                        $total = $total - $adeudo;


                        if ($total == 0) {
                            ?>
                            <tr>
                                <td>
                                    <a href="<?php echo HTTP_HOST . 'alumnos/view/' . $usr['usr_id'] ?>" class="btn btn-dark btn-sm"><i class="fa fa-eye"></i>
                                        <?php echo $usr['usr_matricula'] ?>
                                    </a>

                                </td>

                                <td><?php echo $usr['usr_nombre'] . ' ' . $usr['usr_app'] . ' ' . $usr['usr_apm'] ?></td>
                                <td class="text-center">
                                    <?= $usr['usr_telefono'] ?><br>
                                    <a class="btn btn-primary btn-sm rounded-pill" target="_blank" href="tel:<?= $usr['usr_telefono'] ?>"><i class="fa fa-phone fa-lg"></i></a>
                                    <a class="btn btn-success btn-sm rounded-pill" target="_blank" href="https://wa.me/52<?= $usr['usr_telefono'] ?>"><i class="fa fa-whatsapp fa-lg"></i></a>
                                </td>
                                <td><?php echo $usr['usr_correo'] ?></td>
                                <td><?php echo $usr['usr_usuario_registro'] ?></td>
                                <td><?php echo $usr['usr_fecha_registro'] ?></td>
                                <td> <strong> <?php echo $usr['scl_nombre'] ?> </strong> </td>
                                <td>
                                    <button data-toggle="tooltip" data-placement="top" title="Eliminar inscripción" type="button" class="btn btn-danger btnEliminarInscripcion" fpg_id="<?= $usr['fpg_id'] ?>" ><i class="fa fa-trash fa-lg"></i></button>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>