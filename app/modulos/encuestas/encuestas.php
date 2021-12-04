<?php

if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "lista") :
    cargarComponente('breadcrumb', '', 'Lista de encuestas');
?>

    <div class="containeir">
        <div class="row">
            <div class="col-md-12 col-12">
                <table class="table tablas">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>NOMBRES</th>
                            <th>A. PATERNO</th>
                            <th>A. MATERNO</th>
                            <th>SEXO</th>
                            <th>FECHA NACIMIENTO</th>
                            <th>ESTADO</th>
                            <th>MUNICIPIO</th>
                            <th>COLONIA</th>
                            <th>TEL. FIJO</th>
                            <th>TEL. CELULAR</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $encuestas = EncuestasModelo::mdlMostrarEncuestas();
                        foreach ($encuestas as $encuesta) : ?>
                            <tr>
                                <td>
                                    <div class="btn-group" role="group" aria-label="">
                                        <a type="button" href="<?= HTTP_HOST . 'encuestas/mostrar/' . $encuesta['est_id'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i> Ver</a>
                                    </div>
                                </td>
                                <td><?= $encuesta['est_nombre'] ?></td>
                                <td><?= $encuesta['est_app'] ?></td>
                                <td><?= $encuesta['est_apm'] ?></td>
                                <td><?= $encuesta['est_sexo'] ?></td>
                                <td><?= $encuesta['est_fecha_nac'] ?></td>
                                <td><?= $encuesta['est_estado'] ?></td>
                                <td><?= $encuesta['est_municipio'] ?></td>
                                <td><?= $encuesta['est_colonia'] ?></td>
                                <td><?= $encuesta['est_lada_tel_fijo'] ?><?= $encuesta['est_tel_fijo'] ?></td>
                                <td><?= $encuesta['est_lada_tel_movil'] ?><?= $encuesta['est_tel_movil'] ?></td>
                                <td><?= $encuesta['est_status'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php elseif (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "mostrar") :
    $encuesta = EncuestasModelo::mdlMostrarEncuestasPorID($rutas[2]);
    cargarComponente('breadcrumb', '', 'Mostrar encuesta # '. $rutas[2]);

?>
    <div class="containeir">
        <div id="accordion">
            <div class="row">
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    DATOS PERSONALES
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <p><strong>Estado tramite:</strong> <?= $encuesta['est_estado_tramite'] ?></p>
                                <p><strong>Curp:</strong> <?= $encuesta['est_curp'] ?></p>
                                <p><strong>Correo:</strong> <?= $encuesta['est_correo'] ?></p>
                                <p><strong>Nombre(s):</strong> <?= $encuesta['est_nombre'] ?></p>
                                <p><strong>Apellido Paterno:</strong> <?= $encuesta['est_app'] ?></p>
                                <p><strong>Apellido Materno:</strong> <?= $encuesta['est_apm'] ?></p>
                                <p><strong>Sexo:</strong> <?= $encuesta['est_sexo'] ?></p>
                                <p><strong>Fecha de nacimiento:</strong> <?= $encuesta['est_fecha_nac'] ?></p>
                                <p><strong>Estado de nacimiento:</strong> <?= $encuesta['est_lugar_nac'] ?></p>
                                <p><strong>Nombre completo de autorización:</strong> <?= $encuesta['est_nom_comp'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    DIRECCIÓN DEL SOLICITANTE
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <p><strong>Estado:</strong> <?= $encuesta['est_estado'] ?></p>
                                <p><strong>Municipio o alcaldia:</strong> <?= $encuesta['est_municipio'] ?></p>
                                <p><strong>Colonia:</strong> <?= $encuesta['est_colonia'] ?></p>
                                <p><strong>Calle:</strong> <?= $encuesta['est_calle'] ?></p>
                                <p><strong>Numero exterior:</strong> <?= $encuesta['est_num_ext'] ?></p>
                                <p><strong>Numero interior:</strong> <?= $encuesta['est_num_int'] ?></p>
                                <p><strong>Codigo postal:</strong> <?= $encuesta['est_codigo_postal'] ?></p>
                                <p><strong>Telefono fijo:</strong> (<?= $encuesta['est_lada_tel_fijo'] ?>)<?= $encuesta['est_tel_fijo'] ?></p>
                                <p><strong>Telefono móvil:</strong> (<?= $encuesta['est_lada_tel_movil'] ?>)<?= $encuesta['est_tel_movil'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    INSTITUCIÓN DONDE SE CURSARON LOS ESTUDIOS PREVIOS
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <p><strong>Nombre de la institución donde cursaste los estudios:</strong> <?= $encuesta['est_inst_nom'] ?></p>
                                <p><strong>Tipo de institución:</strong> <?= $encuesta['est_inst_tipo'] ?></p>
                                <p><strong>Pais:</strong> <?= $encuesta['est_inst_pais'] ?></p>
                                <p><strong>Estado:</strong> <?= $encuesta['est_inst_estado'] ?></p>
                                <p><strong>Municipio:</strong> <?= $encuesta['est_inst_municipio'] ?></p>
                                <p><strong>Colonia:</strong> <?= $encuesta['est_inst_colonia'] ?></p>
                                <p><strong>Calle:</strong> <?= $encuesta['est_inst_calle'] ?></p>
                                <p><strong>Numero exterior:</strong> <?= $encuesta['est_inst_num_ext'] ?></p>
                                <p><strong>Código postal:</strong> <?= $encuesta['est_inst_cod_pos'] ?></p>
                                <p><strong>Telefono:</strong> <?= $encuesta['est_inst_tel'] ?></p>
                                <p><strong>Correo electrónico:</strong> <?= $encuesta['est_inst_correo'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    EXPERIENCIA LABORAL
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                <p><span class="badge badge-primary">TRABAJO 1</span></p>
                                <p><strong>Nombre de la empresa:</strong> <?= $encuesta['est_exp_nom_emp1'] ?></p>
                                <p><strong>Cargo o puesto desempeñado:</strong> <?= $encuesta['est_exp_cargo1'] ?></p>
                                <p><strong>Tiempo que presto sus servicios:</strong> <?= $encuesta['est_exp_tiempo1'] ?></p>
                                <p><strong>Telefono de la empresa:</strong> <?= $encuesta['est_exp_tel1'] ?></p>
                                <p><strong>Comprobante de su servicio en la empresa:</strong> <?= $encuesta['est_exp_comprobante1'] ?></p>
                                <p><span class="badge badge-primary">TRABAJO 2</span></p>
                                <p><strong>Nombre de la empresa:</strong> <?= $encuesta['est_exp_nom_emp2'] ?></p>
                                <p><strong>Cargo o puesto desempeñado:</strong> <?= $encuesta['est_exp_cargo2'] ?></p>
                                <p><strong>Tiempo que presto sus servicios:</strong> <?= $encuesta['est_exp_tiempo2'] ?></p>
                                <p><strong>Telefono de la empresa:</strong> <?= $encuesta['est_exp_tel2'] ?></p>
                                <p><strong>Comprobante de su servicio en la empresa:</strong> <?= $encuesta['est_exp_comprobante2'] ?></p>
                                <p><span class="badge badge-primary">TRABAJO 3</span></p>
                                <p><strong>Nombre de la empresa:</strong> <?= $encuesta['est_exp_nom_emp3'] ?></p>
                                <p><strong>Cargo o puesto desempeñado:</strong> <?= $encuesta['est_exp_cargo3'] ?></p>
                                <p><strong>Tiempo que presto sus servicios:</strong> <?= $encuesta['est_exp_tiempo3'] ?></p>
                                <p><strong>Telefono de la empresa:</strong> <?= $encuesta['est_exp_tel3'] ?></p>
                                <p><strong>Comprobante de su servicio en la empresa:</strong> <?= $encuesta['est_exp_comprobante3'] ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    FORMACIÓN EXTRACURRICULAR
                                </button>
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body">
                                <p><span class="badge badge-primary">CURSO 1</span></p>
                                <p><strong>Curso:</strong> <?= $encuesta['est_ext_curso1'] ?></p>
                                <p><strong>Institución o escuela que impartio:</strong> <?= $encuesta['est_ext_inst1'] ?></p>
                                <p><strong>Fecha:</strong> <?= $encuesta['est_ext_fecha1'] ?></p>
                                <p><strong>Anotaciones:</strong> <?= $encuesta['est_ext_anot1'] ?></p>
                                <p><span class="badge badge-primary">CURSO 2</span></p>
                                <p><strong>Curso:</strong> <?= $encuesta['est_ext_curso2'] ?></p>
                                <p><strong>Institución o escuela que impartio:</strong> <?= $encuesta['est_ext_inst2'] ?></p>
                                <p><strong>Fecha:</strong> <?= $encuesta['est_ext_fecha2'] ?></p>
                                <p><strong>Anotaciones:</strong> <?= $encuesta['est_ext_anot2'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    DOCUMENTOS PRESENTADOS
                                </button>
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                            <div class="card-body">
                                <p><strong>ACTA DE NACIMIENTO O DOCUMENTO EQUIVALENTE:</strong> <?= $encuesta['est_doc_acta'] ?></p>
                                <p><strong>OBSERVACIONES:</strong> <?= $encuesta['est_observaciones_acta'] ?></p>
                                <p><strong>INDENTIFICACIÓN OFICIAL(INE):</strong> <?= $encuesta['est_doc_ine'] ?></p>
                                <p><strong>OBSERVACIONES:</strong> <?= $encuesta['est_observaciones_ine'] ?></p>
                                <p><strong>CLAVE ÚNICA DE REGISTRO DE POBLACIÓN(CURP):</strong> <?= $encuesta['est_doc_curp'] ?></p>
                                <p><strong>OBSERVACIONES:</strong> <?= $encuesta['est_observaciones_curp'] ?></p>
                                <p><strong>ANTECEDENTE ACADÉMICO QUE ACREDITE LA SECUNDARIA:</strong> <?= $encuesta['est_doc_ant_acd'] ?></p>
                                <p><strong>OBSERVACIONES:</strong> <?= $encuesta['est_observaciones_ant_acd'] ?></p>
                                <p><strong>CERTIFICADO PARCIAL DE BACHILLERATO:</strong> <?= $encuesta['est_doc_crt_bach'] ?></p>
                                <p><strong>OBSERVACIONES:</strong> <?= $encuesta['est_observaciones_crt_bach'] ?></p>
                                <p><strong>BOLETAS O CONSTANCIA DE GRADOS DE BACHILLERATO:</strong> <?= $encuesta['est_doc_cntc_bach'] ?></p>
                                <p><strong>OBSERVACIONES:</strong> <?= $encuesta['est_observaciones_cntc_bach'] ?></p>
                                <p><strong>PAGO DE DERECHOS:</strong> <?= $encuesta['est_doc_derechos'] ?></p>
                                <p><strong>OBSERVACIONES:</strong> <?= $encuesta['est_observaciones_derechos'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>