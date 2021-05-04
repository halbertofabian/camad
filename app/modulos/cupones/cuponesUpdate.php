<?php
cargarComponente('breadcrumb_nivel_1', '', 'Editar cupon #' . $rutas[2], array(['ruta' => 'cupones/activos', 'label' => 'Listar cupones']));
$usr = CuponesModelo::mdlMostrarCupones($rutas[2]);
$descuentos = json_decode($usr['cps_restricciones']);
$array = $usr['cps_descuento_pagos'];
$descuento = json_decode($array, true);
?>
<div class="container">
    <form method="post" id="formActualizarCupones">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="cps_nombre">Nombre del cupón</label>
                    <input type="text" name="cps_nombre" id="cps_nombre" value="<?= $usr['cps_nombre'] ?> " class="form-control" placeholder="Nombre del cupón" required>

                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="cps_codigo">Código</label>
                    <input type="text" name="cps_codigo" id="cps_codigo" value="<?= $usr['cps_codigo'] ?>" class="form-control" placeholder="Introduce aquí el código" readonly="" required>
                </div>
                <div class="form-group">
                    <label for="cps_asociado">Asociar a vendedor:</label>
                    <select name="cps_asociado" class="form-control" id="cps_asociado">
                        <option value="sin_vendedor">Sin asociar</option>
                        <?php
                        $vendedores = UsuariosModelo::mdlMostrarUsuarios();
                        foreach ($vendedores as $key => $vdr) :  # code...
                            if ($usr['cps_asociado'] == $vdr['usr_matricula'] . ' - ' . $vdr['usr_nombre']) {
                                $select = "selected";
                            } else {
                                $select = "";
                            }
                            ?>
                            <option <?= $select ?> value="<?php echo $vdr['usr_matricula'] . ' - ' . $vdr['usr_nombre'] ?>"><?php echo $vdr['usr_matricula'] . ' - ' . $vdr['usr_nombre'] ?></option>

                        <?php endforeach; ?>
                        <!-- <option value="all_productos">Todos los productos</option> -->
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <h3 for="">Esté cupón se aplicará a:</h3>
                    <!-- <input type="radio" required value="new_student" name="cps_aply" class="cps_aply" id="cps_aply_1"> <label for="cps_aply_1" class="text-dark">Alumnos nuevos</label> <br> -->
                    <?php if ($descuentos->aply->tipo == "all_student"): ?>
                        <input type="radio" required value="all_student" name="cps_aply" class="cps_aply" id="cps_aply_2" checked> <label for="cps_aply_2" class="text-dark">Todos los alumnos</label> <br>
                        <input type="radio" required value="by_matricula" name="cps_aply" class="cps_aply_ok" id="cps_aply_3"> <label for="cps_aply_3" class="text-dark">Por matricula</label><br>
                        <input type="text" name="cps_aply_matricula" id="cps_aply_matricula" class="form-control d-none" placeholder="Introduce aquí la(s) matricula(s) Ejamplo: ST-0001,ST0002">

                    <?php else: ?>
                        <input type="radio" required value="all_student" name="cps_aply" class="cps_aply" id="cps_aply_2" > <label for="cps_aply_2" class="text-dark">Todos los alumnos</label> <br>
                        <input type="radio" required value="by_matricula" name="cps_aply" class="cps_aply_ok" id="cps_aply_3" checked=""> <label for="cps_aply_3" class="text-dark">Por matricula</label><br>
                        <input type="text" name="cps_aply_matricula" id="cps_aply_matricula" value="<?= $descuentos->aply->data ?>" class="form-control" placeholder="Introduce aquí la(s) matricula(s) Ejamplo: ST-0001,ST0002">
                    <?php endif; ?>

                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="form-group">
                    <label for="cps_tope">Tope de cupones</label>
                    <input type="number" name="cps_tope" id="cps_tope" value="<?= $usr['cps_tope'] ?>" class="form-control" placeholder="Dejar en blanco si serán ilimitados">

                </div>

                <div class="alert alert-dark" role="alert">
                    <strong>Programar actividad</strong>
                </div>
                <div class="form-group">
                    <label for="cps_fecha_inicio">Inicio</label>
                    <input type="datetime-local" name="cps_fecha_inicio" id="cps_fecha_inicio" value="<?= $fechaInicio ?>" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="cps_fecha_fin">Fin</label>
                    <input type="datetime-local" name="cps_fecha_fin" id="cps_fecha_fin" value="<?= $usr['cps_fecha_fin'] ?>" class="form-control" placeholder="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-dark" role="alert">
                    <strong>Restricciones sobre el paquete</strong>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Concepto</th>
                            <th>Descuento % </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Inscripción
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" name="cps_r_inscripcion" id="cps_r_inscripcion" value="<?= $descuentos->cupon->cps_r_inscripcion ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Exámen
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" name="cps_r_examen" id="cps_r_examen" value="<?= $descuentos->cupon->cps_r_examen ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Guía
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" name="cps_r_guia" id="cps_r_guia" value="<?= $descuentos->cupon->cps_r_guia ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Incorporación
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" name="cps_r_incorporacion" id="cps_r_incorporacion" value="<?= $descuentos->cupon->cps_r_incorporacion ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Certificado
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" name="cps_r_certificado" id="cps_r_certificado" value="<?= $descuentos->cupon->cps_r_certificado ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Semanas
                            </td>
                            <td>
                                <input type="number" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" name="cps_r_semanas" id="cps_r_semanas" value="<?= $descuentos->cupon->cps_r_semanas ?>">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 col-12">
                <div class="form-group">
                    <!-- <label for="cps_sku_producto">Aplicar al paquete:</label> -->
                    <input type="hidden" name="cps_sku_producto" value="all_paquetes">
                    <!-- <select name="cps_sku_producto" class="form-control" id="cps_sku_producto">
                        <option value="all_paquetes">Todos los paquetes</option>
                        <option value="all_productos">Todos los productos</option>
                    </select> -->
                </div>
                <H5>PARCIALIDADES / DESCUENTOS</H5>
                <div class="form-group">
                    <label for="">1 PAGO</label>
                    <input type="text" name="cps_descuento_pagos[]" id="" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" value="<?= $descuento[0] ?>">

                </div>
                <div class="form-group">
                    <label for="">2 PAGOS</label>
                    <input type="text" name="cps_descuento_pagos[]" id="" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" value="<?= $descuento[1] ?>">

                </div>
                <div class="form-group">
                    <label for="">3 PAGOS</label>
                    <input type="text" name="cps_descuento_pagos[]" id="" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" value="<?= $descuento[2] ?>">
                </div>
                <div class="form-group">
                    <label for="">4 PAGOS</label>
                    <input type="text" name="cps_descuento_pagos[]" id="" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" value="<?= $descuento[3] ?>">
                </div>
                <div class="form-group">
                    <label for="">5 PAGOS</label>
                    <input type="text" name="cps_descuento_pagos[]" id="" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" value="<?= $descuento[4] ?>">
                </div>
                <div class="form-group">
                    <label for="">6 PAGOS</label>
                    <input type="text" name="cps_descuento_pagos[]" id="" class="form-control" placeholder="Dejar en blanco en caso de no aplicar" value="<?= $descuento[5] ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-12 text-right mb-4">
                <button type="submit" class="btn btn-primary btnActualizarCupon" name="btnActualizarCupon" id="btnActualizarCupon">Actualizar cupón</button>
            </div>
        </div>
        <?php
        $crearCupon = new CuponesControlador();
        $crearCupon->ctrActualizarCupones();
        ?>
    </form>
</div>