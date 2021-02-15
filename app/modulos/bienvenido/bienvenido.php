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
        <div class="row">
            <?php

            $ins = InscripcionesModelo::mdlMostrarInscripciones($_SESSION['session_usr']['usr_id']);

            if ($ins == NULL) :
                if ($_SESSION['session_usr']['usr_pqt_interes_sku'] != "") :

                    $pqt = PaquetesModelo::mdlMostrarPaquetes($_SESSION['session_usr']['usr_pqt_interes_sku']);

                    if ($pqt != NULL);
            ?>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">ESTAS INTERESADO EN <strong class="text-primary"> <?php echo strtoupper($pqt['pqt_nombre']); ?> </strong></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text"><?php echo $pqt['pqt_descripcion'] ?></p>

                                        <strong>Duración: <?php echo $pqt['pqt_duracion'] ?></strong>
                                        <br>
                                        <!-- <a href="<?php echo HTTP_HOST . 'inscripciones/' . $pqt['pqt_sku'] ?>" class="btn btn-primary float-right">Inscribir</a> -->
                                        <div class="badge  badge-danger">
                                            <span><?php echo $pqt['pqt_sku'] ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <form method="post">
                                            <div class="card">

                                                <div class="card-body">
                                                    <h4 class="card-title">Datos del paquete</h4>
                                                    <div class="form-group">
                                                        <label for="" class="text-success">¡FELICIDADES! TU CUPÓN AÚN ES VALIDO</label>
                                                        <input type="text" name="" id="" readonly class="form-control" placeholder="Aplicalo aquí" value="<?php echo $pqt['pqt_cupon_default'] ?>">
                                                        <?php if ($pqt['pqt_cupon_default'] != "") :
                                                            $_SESSION['pqt_cupon_default'] = $pqt['pqt_cupon_default'];
                                                        ?>
                                                            <!-- <small class=" btn btn-danger btn-sm mt-1 float-right"> <i class="fa fa-trash"></i> </small> -->
                                                        <?php else :
                                                            $_SESSION['pqt_cupon_default'] = '';
                                                        ?>
                                                            <button class=" btn btn-primary btn-block mt-1">APLICAR CUPÓN</button>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php
                                                    $incripcion = json_decode($pqt['pqt_costo'], true);




                                                    $totaPagoSemana = $incripcion['costo_semana'] * $incripcion['duracion_semana'];



                                                    $totalCurso = 0;
                                                    $totalCurso += $incripcion['costo_inscripcion'];
                                                    $totalCurso += $incripcion['costo_examen'];
                                                    $totalCurso += $incripcion['costo_guia'];
                                                    $totalCurso += $incripcion['costo_incorporacion'];
                                                    $totalCurso += $incripcion['costo_certificado'];
                                                    $totalCurso += $totaPagoSemana;

                                                    $totalCurso = number_format($totalCurso, 2);

                                                    $cupon = CuponesModelo::mdlMostrarCupones($_SESSION['pqt_cupon_default']);

                                                    $totalCurso_ = str_replace(",", "", $totalCurso);



                                                    $_SESSION['cupon_pagos'] = array();

                                                    $cupon = json_decode($cupon['cps_descuento_pagos'], true);
                                                    // var_dump($cupon);
                                                    for ($i = 0; $i < sizeof($cupon); $i++) {

                                                        if ($cupon[$i] != "") {
                                                            $descuento = $totalCurso_ - ($totalCurso_ * $cupon[$i] / 100);
                                                            $descuento = ceil($descuento / ($i + 1));
                                                            $_SESSION['cupon_pagos'][$i] = array(
                                                                'PAGOS' => ($i + 1),
                                                                'TOTAL' => $totalCurso,
                                                                'DESCUENTO' => $cupon[$i],
                                                                'TOTAL-DESCUENTO' =>  number_format($descuento, 2),
                                                                'TOTAL-PAGO' => number_format(($i + 1) * $descuento, 2)
                                                            );
                                                        }
                                                    }


                                                    ?>
                                                    <input type="hidden" name="fpg_paquete" value='<?php echo $pqt['pqt_sku']; ?>'>
                                                    <input type="hidden" name="ins_costos" value='<?php echo $pqt['pqt_costo']; ?>'>
                                                    <input type="hidden" name="ins_pagos" value='<?php echo json_encode($_SESSION['cupon_pagos'], 2); ?>'>
                                                    <div class="form-group">
                                                        <label for="">TOTAL DEL PAQUTE</label>
                                                        <input type="text" name="" readonly value="<?php echo $totalCurso ?>" class="form-control" placeholder="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">TOTAL A PAGAR</label>
                                                        <select name="ins_numero_pago" class="form-control" id="">
                                                            <option value="">SELECCIONE LA OPCIÓN DE PAGO QUE MÁS LE CONVEGA</option>
                                                            <?php foreach ($_SESSION['cupon_pagos'] as $key => $cps_costo) : ?>
                                                                <option value="<?php echo $cps_costo['PAGOS'] ?>"><?php echo $cps_costo['DESCUENTO'] . '% DESCUENTO ' . $cps_costo['PAGOS'] . ' PAGOS DE ' . $cps_costo['TOTAL-DESCUENTO'] . ' = ' . $cps_costo['TOTAL-PAGO'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group float-right">

                                                        <input type="submit" class="btn btn-primary" name="btnInscribirAlumnos" value="Inscribirme">

                                                    </div>

                                                </div>
                                            </div>
                                            <?php
                                            $incripcion = new InscripcionesControlador();
                                            $incripcion->ctrAgregarInscripcionesOnline();
                                            ?>
                                        </form>
                                    </div>

                                    <!-- <div class="col-12">
                                        <div class="bkng-tb-cntnt">
                                            <div class="pymnts">
                                                <form action="#" method="POST" id="payment-form">
                                                    <input type="hidden" name="token_id" id="token_id">
                                                    <div class="pymnt-itm card active">
                                                        <h2>Tarjeta de crédito o débito</h2>
                                                        <div class="pymnt-cntnt">
                                                            <div class="card">
                                                                <div class="credit">
                                                                    <h4>Tarjetas de crédito</h4>
                                                                </div>
                                                                <div class="debit">
                                                                    <h4>Tarjetas de débito</h4>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-12">
                                                                    <label>Nombre del titular</label><input class="form-control" type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
                                                                </div>
                                                                <div class="col-md-6 col-12">
                                                                    <label>Número de tarjeta</label><input class="form-control" type="text" autocomplete="off" data-openpay-card="card_number">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-12 ">
                                                                    <label>Fecha de expiración</label>
                                                                    <div class="col-md-6 col-12 "><input class="form-control" type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
                                                                    <div class="col-md-6 col-12 "><input class="form-control" type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
                                                                </div>
                                                                <div class="col-md-6 col-12 cvv"><label>Código de seguridad</label>
                                                                    <div class="col-md-6 col-12 "><input class="form-control" type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2"></div>
                                                                </div>
                                                            </div>
                                                            <div class="openpay">
                                                                <div class="logo">Transacciones realizadas vía:</div>
                                                                <div class="shield">Tus pagos se realizan de forma segura con encriptación de 256 bits</div>
                                                            </div>
                                                            <div class="row">
                                                                <a class="button rght" id="pay-button">Pagar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>




            <?php
                endif;

            endif; ?>
        </div>
    </div>
<?php endif; ?>


<?php

$incripcion = InscripcionesModelo::mdlMostrarInscripciones($_SESSION['session_usr']['usr_id']);
if ($incripcion != NULL) :
    $incripcion = $incripcion[0];
    // preArray($incripcion);
    $dt_pago_online = PagosControlador::ctrMostrarDatosFichaPagoOnline($incripcion['fpg_id']);
    $dt_pago_online_ins = json_decode($incripcion['fpg_pago_online'], true);
    // preArray($dt_pago_online_ins);
?>
    <link href="<?php echo HTTP_HOST . 'app/assets/css/openpay.css'  ?>" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
    <script type='text/javascript' src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>
    <script type="text/javascript" src="<?php echo HTTP_HOST . 'app/assets/js/openpay.js' ?>"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-primary">
                    <?php echo $incripcion['pqt_nombre']; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p>
                                <?php echo $incripcion['pqt_descripcion']; ?>
                            </p>
                            <?php
                            $pago = $dt_pago_online['PPG_ONLINE']['total'] - $dt_pago_online['PPG_ONLINE']['adeudo'];
                            ?>
                            <p>Número de pagos: <?php echo $dt_pago_online_ins['PAGOS']; ?></p>

                            <p>Sus pagos son de: <?php echo $dt_pago_online_ins['TOTAL-DESCUENTO']; ?></p>

                            <p>Usted ha pagado en total: <?php echo number_format($pago, 2); ?></p>

                            <p>Usted debe en total: <?php echo number_format($dt_pago_online['PPG_ONLINE']['adeudo'], 2); ?></p>
                        </div>
                        <div class="col-md-8 col-12">
                            <?php if ($dt_pago_online['PPG_ONLINE']['adeudo'] > 0) : ?>
                                <form method="post" action="<?php HTTP_HOST . 'app/modulos/pagos/pagos.controlador.php' ?>" id="customer-form">
                                    <input type="hidden" name="token_id" id="token_id">
                                    <input type="hidden" name="use_card_points" id="use_card_points" value="false">
                                    <div class="card">

                                        <div class="card-header" style="padding: 40px; background-color: #E8E8E8; ">
                                            <h4 class="card-title">Tarjeta de crédito o débito</h4>
                                        </div>
                                        <div class="card-body">

                                            <div class="row" style="background-color:#F7F7F7; padding: 20px;">
                                                <div class="col-md-4" style="border-right: 1px solid #ccc;">
                                                    <h5>Tarjetas de crédito</h5>
                                                    <img src="<?php echo HTTP_HOST . 'app/assets/images/openpay/cards1.png' ?>" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <h5>Tarjetas de débito</h5>
                                                    <img src="<?php echo HTTP_HOST . 'app/assets/images/openpay/cards2.png' ?>" alt="">

                                                </div>
                                                <div style="height: 90px;"></div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">NOMBRE DEL TITULAR</label>
                                                        <input type="text" name="" id="" class="form-control" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">NÚMERO DE LA TARJETA</label>
                                                        <input type="text" name="" id="" class="form-control" placeholder="" autocomplete="off" data-openpay-card="card_number">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <div class="form-group">
                                                        <label for="">FECHA DE EXPIRACIÓN</label>
                                                        <input type="text" name="" id="" class="form-control" placeholder="MES" data-openpay-card="expiration_month">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <div class="form-group">
                                                        <label for=""></label>
                                                        <input type="text" name="" id="" class="form-control" placeholder="AÑO" data-openpay-card="expiration_year">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6 ">
                                                    <div class="form-group">
                                                        <label for="">CODIGO DE SEGURIDAD</label>
                                                        <input type="text" name="" id="" class="form-control" placeholder="3 DÍGITOS" autocomplete="off" data-openpay-card="cvv2">
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-6">
                                                    <br>
                                                    <img src="<?php echo HTTP_HOST . 'app/assets/images/openpay/cvv.png' ?>" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-4">

                                                </div>
                                                <div class="col-md-4" style="border-right: 1px solid #ccc;">
                                                    <p style="font-size: 12px;" class="float-right">Transacciones realizadas vía: <br> <img src="<?php echo HTTP_HOST . 'app/assets/images/openpay/openpay.png' ?>" alt=""></p>



                                                </div>
                                                <div class="col-md-4"">
                                                        <p style=" font-size: 12px;"><img src="<?php echo HTTP_HOST . 'app/assets/images/openpay/security.png' ?>" alt="">Tus pagos se realizaran de forma segura con encriptación de 254 bits:</p>


                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-danger float-right btn-load" name="btnPagoOpenPay" type="submit" id="save-button">
                                                        PAGAR <BR></BR><strong> <?php echo $dt_pago_online_ins['TOTAL-DESCUENTO'] ?> MXN</strong>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <?php


                                    ?>
                                </form>
                            <?php else : ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong>Estamos preparando tu certificado</strong>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-muted">

                </div>
            </div>
        </div>

    </div>

<?php endif; ?>