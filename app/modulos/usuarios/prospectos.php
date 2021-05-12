<?php
cargarComponente('breadcrumb', '', 'Lista de prospectos');
?>
<div class="containeir">
    <div class="row">
        <div class="col-12">
            <?php
            $alumnos = UsuariosModelo::mdlListarAlumnosProspectos();

            $arrayProspectos = array();

            foreach ($alumnos as $key => $usr) {

                $isProspecto = UsuariosModelo::mdlListarAlumnosPaquete($usr['usr_id']);

                if (sizeof($isProspecto) <= 0) {
                    array_push($arrayProspectos, $usr);
                }
            }

            ?>
        </div>
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
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php

                    foreach ($arrayProspectos as $key => $usr) :

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
                            <td>
                                <a href="<?= HTTP_HOST . 'inscripciones/new' ?>" class="btn btn-primary btn-blok">Inscribir</a>
                            </td>

                        </tr>
                    <?php

                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>