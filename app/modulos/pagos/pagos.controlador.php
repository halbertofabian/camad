
<?php
//require_once DOCUMENT_ROOT . "app/lib/openpay-php/Openpay.php";
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 12:00
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class PagosControlador
{

    // public static function ctrAgregarPagos()
    // {
    //     if (isset($_POST['btnRegistrarAbono'])) {
    //         $_POST['ppg_monto'] = str_replace(",", "", $_POST['ppg_monto']);
    //         $_POST['ppg_adeudo'] =  str_replace(",", "", $_POST['ppg_adeudo'])  -  $_POST['ppg_monto'];
    //         $_POST['ppg_fecha_registro']  = FECHA;
    //         $_POST['ppg_usuario_registro']  = $_SESSION['session_usr']['usr_nombre'];
    //         $_POST['ppg_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
    //         $_POST['ppg_ficha_pago'] = $_POST['fpg_id'];

    //         if ($_POST['ppg_monto'] <= 0) {
    //             return array(
    //                 'status' => false,
    //                 'mensaje' => 'El monto no puede ser menor a 0 debe estar comprendido entre 1 a ' + $_POST['ppg_adeudo']
    //             );
    //         }

    //         // if ($_POST['ppg_monto'] > $_POST['ppg_adeudo']) {
    //         //     return array(
    //         //         'status' => false,
    //         //         'mensaje' => 'El monto no puede ser superior al adeudo'
    //         //     );
    //         // }


    //         if ($_POST['ppg_adeudo'] == 0) {
    //             // $_POST['ppg_estado_pagado'] = 'PAGADO';
    //             // $_POST['ppg_fecha_pagado'] = FECHA;
    //         } else {
    //             // $_POST['ppg_estado_pagado'] = 'PENDIENTE';
    //             // $_POST['ppg_fecha_pagado'] = '';
    //         }
    //         $crearPago = PagosModelo::mdlAgregarPagos($_POST);
    //         if ($crearPago) {
    //             return array(
    //                 'status' => true,
    //                 'mensaje' => 'Pago registrado con éxito'
    //             );
    //             // AppControlador::msj('success', '¡Muy bien!', 'Pago registrado con éxito', HTTP_HOST . 'pagos/new');
    //         } else {
    //             return array(
    //                 'status' => false,
    //                 'mensaje' => 'El pago no se efectuo, intente de nuevo'
    //             );
    //             //AppControlador::msj('error', 'Error!', 'El pago no se efectuo, intente de nuevo');
    //         }
    //     }
    // }
    public static function ctrAgregarPagos()
    {
        if (isset($_POST['btnRegistrarAbono'])) {
            // Preguntar si hay referencia repetida
            // preArray($_POST);

            $_POST['vfch_detalle_carrito'] = json_decode($_POST['vfch_detalle_carrito'], true);

            if ($_POST['vfch_mp'] != 'EFECTIVO' && $_POST['vfch_referencia'] == "") {
                return array(
                    'status' => false,
                    'mensaje' => 'El método de pago que eligió requiere la referencia, favor de llenar ese campo',
                );
            }

            if ($_POST['vfch_detalle_carrito'] == null) {
                return array(
                    'status' => false,
                    'mensaje' => 'Item vacio',
                );
            }

            if ($_POST['vfch_referencia'] != "") {

                $issetRef = PagosModelo::mdlIssetReferencia($_POST['vfch_referencia']);


                if ($issetRef != null) {

                    return array(
                        'status' => false,
                        'mensaje' => 'Referencia repetida, por favor evita la duplicidad de referencias, está referencia esta repetida en la ficha #' . $issetRef['vfch_id'],
                    );
                }
            }

            $_POST['vfch_ficha_pago'] = $_POST['fpg_id'];
            $_POST['vfch_fecha_pagada'] = FECHA;
            $_POST['vfch_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['vfch_estado'] = 'PAGADO';
            $_POST['vfch_descuento'] = $_POST['vfch_cupon'];
            $_POST['vfch_id_corte'] = CortesControlador::crtConsultarUltimoCorte();


            $terminarVenta = PagosModelo::mdlTerminarVenta($_POST);
            if ($terminarVenta) {
                CuponesModelo::mdlAcualizarContadorCupon($_POST['vfch_cupon']);
                if (PagosModelo::mdlCambiarEstadoAbono('PAGADO', $_POST['vfch_id'])) {
                    return array(
                        'status' => true,
                        'mensaje' => 'Abono registrado con éxito',
                        'pagina' => HTTP_HOST . 'pagos/fichas/' . $_POST['vfch_id']
                    );
                } else {
                    return array(
                        'status' => true,
                        'mensaje' => 'Ocurrio un error no esperado, vuelve a intentarlo'
                    );
                }
            }
            // preArray($terminarVenta);
        }
    }


    public static function ctrAgregarCarrito()
    {
        if (isset($_POST['btnAgregarPPG'])) {
            $_POST['ppg_monto'] = str_replace(",", "", $_POST['ppg_monto']);
            $_POST['ppg_adeudo'] =  str_replace(",", "", $_POST['ppg_adeudo'])  -  $_POST['ppg_monto'];
            $_POST['ppg_total'] = str_replace(",", "", $_POST['ppg_monto']);

            $_POST['ppg_fecha_registro']  = FECHA;
            $_POST['ppg_usuario_registro']  = $_SESSION['session_usr']['usr_nombre'];
            $_POST['ppg_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            $_POST['ppg_ficha_pago'] = $_POST['ppg_ficha_pago'];
            $_POST['ppg_ficha_venta'] = $_POST['ppg_ficha_venta'];

            if ($_POST['ppg_monto'] <= 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'El monto no puede ser menor a 0 debe estar comprendido entre 1 a ' + $_POST['ppg_adeudo']
                );
            }

            if ($_POST['ppg_descuento'] != "") {

                $desc = json_decode($_POST['ppg_descuento'], true);

                if ($_POST['ppg_concepto'] == 'PPG_INSCRIPCION') {
                    $_POST['ppg_descuento'] = $desc['cps_r_inscripcion'];
                    $monto = $_POST['ppg_monto'];
                    $_POST['ppg_total'] = ($monto) -  ($monto * $_POST['ppg_descuento'] / 100);
                }
                if ($_POST['ppg_concepto'] == 'PPG_EXAMEN') {
                    $_POST['ppg_descuento'] = $desc['cps_r_examen'];
                    $monto = $_POST['ppg_monto'];
                    $_POST['ppg_total'] = ($monto) -  ($monto * $_POST['ppg_descuento'] / 100);
                }
                if ($_POST['ppg_concepto'] == 'PPG_GUIA') {
                    $_POST['ppg_descuento'] = $desc['cps_r_guia'];
                    $monto = $_POST['ppg_monto'];
                    $_POST['ppg_total'] = ($monto) -  ($monto * $_POST['ppg_descuento'] / 100);
                }
                if ($_POST['ppg_concepto'] == 'PPG_INCORPORACION') {
                    $_POST['ppg_descuento'] = $desc['cps_r_incorporacion'];
                    $monto = $_POST['ppg_monto'];
                    $_POST['ppg_total'] = ($monto) -  ($monto * $_POST['ppg_descuento'] / 100);
                }
                if ($_POST['ppg_concepto'] == 'PPG_CERTIFICADO') {
                    $_POST['ppg_descuento'] = $desc['cps_r_certificado'];
                    $monto = $_POST['ppg_monto'];
                    $_POST['ppg_total'] = ($monto) -  ($monto * $_POST['ppg_descuento'] / 100);
                }
                if ($_POST['ppg_concepto'] == 'PPG_SEMANAL') {
                    $_POST['ppg_descuento'] = $desc['cps_r_semanas'];
                    $monto = $_POST['ppg_monto'];
                    $_POST['ppg_total'] = ($monto) -  ($monto * $_POST['ppg_descuento'] / 100);
                }
            }
            // if ($_POST['ppg_monto'] > $_POST['ppg_adeudo']) {
            //     return array(
            //         'status' => false,
            //         'mensaje' => 'El monto no puede ser superior al adeudo'
            //     );
            // }


            if ($_POST['ppg_adeudo'] == 0) {
                // $_POST['ppg_estado_pagado'] = 'PAGADO';
                // $_POST['ppg_fecha_pagado'] = FECHA;
            } else {
                // $_POST['ppg_estado_pagado'] = 'PENDIENTE';
                // $_POST['ppg_fecha_pagado'] = '';
            }

            if (!PagosModelo::mdlMostrarCarritoduplicado($_POST['ppg_ficha_pago'], $_POST['ppg_ficha_venta'], $_POST['ppg_concepto'])) {
                $crearPago = PagosModelo::mdlAgregarCarrito($_POST);

                if ($crearPago) {
                    return array(
                        'status' => true,
                        'mensaje' => 'Agregado',
                        'data' => '', //PagosModelo::mdlMostrarCarritoAlumno($_POST['ppg_ficha_pago'], $_POST['ppg_ficha_venta'])
                    );
                    // AppControlador::msj('success', '¡Muy bien!', 'Pago registrado con éxito', HTTP_HOST . 'pagos/new');
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'Ocurrio un error, intente de nuevo'
                    );
                    //AppControlador::msj('error', 'Error!', 'El pago no se efectuo, intente de nuevo');
                }
            } else {
                $crearPago = PagosModelo::mdlActalizarCarrito($_POST);

                if ($crearPago) {
                    return array(
                        'status' => true,
                        'mensaje' => 'Modificado',
                        'data' => '' //PagosModelo::mdlMostrarCarritoAlumno($_POST['ppg_ficha_pago'], $_POST['ppg_ficha_venta'])
                    );
                    // AppControlador::msj('success', '¡Muy bien!', 'Pago registrado con éxito', HTTP_HOST . 'pagos/new');
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'Ocurrio un error, intente de nuevo'
                    );
                    //AppControlador::msj('error', 'Error!', 'El pago no se efectuo, intente de nuevo');
                }
            }
        }
    }

    public function ctrActualizarPagos()
    {
    }
    public function ctrMostrarPagos()
    {
    }
    public function ctrEliminarPagos()
    {
    }

    public static function ctrMostrarPagosAlumnos()
    {
        if (isset($_POST['btnRevisarPagos'])) {

            $_POST['usr_matricula'] =  $_POST['usr_matricula'];
            // Consultar si existe el alumno
            $alumno_pgo = UsuariosModelo::mdlMostrarUsuarios('', '', true, $_POST['usr_matricula']);
            if ($alumno_pgo == null) {
                return array(
                    'status' => false,
                    'mensaje' => 'El alumno con matricula ' . $_POST['usr_matricula'] . ' no se encuentra en la base de datos, verifique la información'
                );
            }

            $datos = PagosModelo::mdlMostrarPagosAlumnos($alumno_pgo['usr_id']);
            return array(
                'status' => true,
                'data' => $datos,
                'alumno' => $alumno_pgo['usr_nombre']
            );
        }
    }

    public static function ctrMostrarDatosFichaPagoOnline($fpg_id)
    {
        $dt_ficha = PagosModelo::mdlMostrarAbonosAlumno($fpg_id);

        $dt_online = PagosModelo::mdlMostrarDatosFichaPagoOnline(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_ONLINE',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));

        $dt_pago_online = json_decode($dt_ficha['fpg_pago_online'], true);
        $dt_pago_online = str_replace(",", "", $dt_pago_online['TOTAL-PAGO']);

        $dt_online_adeudo = $dt_online['ppg_adeudo_s'] == 0 ? $dt_pago_online : $dt_pago_online - $dt_online['ppg_adeudo_s'];
        return array(
            'PPG_ONLINE' => array(
                'total' => $dt_pago_online,
                'adeudo' => $dt_online_adeudo
            )
        );
    }
    public static function ctrMostrarDatosFichaPago()
    {
        $dt_ficha = PagosModelo::mdlMostrarAbonosAlumno($_POST['fpg_id']);

        $dt_incripcion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_INSCRIPCION',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_incripcion_adeudo = $dt_incripcion['ppg_adeudo_s'] == 0 ? $dt_ficha['fpg_inscripcion'] : $dt_ficha['fpg_inscripcion'] - $dt_incripcion['ppg_adeudo_s'];

        $dt_examen = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_EXAMEN',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_examen_adeudo = $dt_examen['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_examen'] : $dt_ficha['fpg_examen'] - $dt_examen['ppg_adeudo_s'];

        $dt_guia = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_GUIA',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_guia_adeudo = $dt_guia['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_guia'] : $dt_ficha['fpg_guia'] - $dt_guia['ppg_adeudo_s'];

        $dt_incorporacion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_INCORPORACION',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_incorporacion_adeudo = $dt_incorporacion['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_incorporacion'] : $dt_ficha['fpg_incorporacion'] - $dt_incorporacion['ppg_adeudo_s'];

        $dt_certificado = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_CERTIFICADO',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_certificado_adeudo = $dt_certificado['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_certificado'] : $dt_ficha['fpg_certificado'] - $dt_certificado['ppg_adeudo_s'];

        $dt_semanal = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_SEMANAL',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_semanal_adeudo = $dt_semanal['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'] : $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'] - $dt_semanal['ppg_adeudo_s'];



        return array(
            'PPG_INSCRIPCION' => array(
                'total' => $dt_ficha['fpg_inscripcion'],
                'adeudo' => $dt_incripcion_adeudo
            ),
            'PPG_EXAMEN' => array(
                'total' => $dt_ficha['fpg_examen'],
                'adeudo' => $dt_examen_adeudo
            ),
            'PPG_GUIA' => array(
                'total' => $dt_ficha['fpg_guia'],
                'adeudo' => $dt_guia_adeudo
            ),
            'PPG_INCORPORACION' => array(
                'total' => $dt_ficha['fpg_incorporacion'],
                'adeudo' => $dt_incorporacion_adeudo
            ),

            'PPG_CERTIFICADO' => array(
                'total' => $dt_ficha['fpg_certificado'],
                'adeudo' => $dt_certificado_adeudo
            ),
            'PPG_SEMANAL' => array(
                'total' => $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'],
                'adeudo' => $dt_semanal_adeudo,
                'pago_semanal' => $dt_ficha['fpg_semana']
            ),
        );
    }

    public static function ctrMostrarDatosFichaPagoByFicha($fpg_id)
    {
        $dt_ficha = PagosModelo::mdlMostrarAbonosAlumno($fpg_id);

        $dt_incripcion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_INSCRIPCION',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_incripcion_adeudo = $dt_incripcion['ppg_adeudo_s'] == 0 ? $dt_ficha['fpg_inscripcion'] : $dt_ficha['fpg_inscripcion'] - $dt_incripcion['ppg_adeudo_s'];

        $dt_examen = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_EXAMEN',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_examen_adeudo = $dt_examen['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_examen'] : $dt_ficha['fpg_examen'] - $dt_examen['ppg_adeudo_s'];

        $dt_guia = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_GUIA',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_guia_adeudo = $dt_guia['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_guia'] : $dt_ficha['fpg_guia'] - $dt_guia['ppg_adeudo_s'];

        $dt_incorporacion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_INCORPORACION',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_incorporacion_adeudo = $dt_incorporacion['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_incorporacion'] : $dt_ficha['fpg_incorporacion'] - $dt_incorporacion['ppg_adeudo_s'];

        $dt_certificado = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_CERTIFICADO',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_certificado_adeudo = $dt_certificado['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_certificado'] : $dt_ficha['fpg_certificado'] - $dt_certificado['ppg_adeudo_s'];

        $dt_semanal = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_SEMANAL',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_semanal_adeudo = $dt_semanal['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'] : $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'] - $dt_semanal['ppg_adeudo_s'];


        return array(
            'PPG_INSCRIPCION' => array(
                'total' => $dt_ficha['fpg_inscripcion'],
                'adeudo' => $dt_incripcion_adeudo
            ),
            'PPG_EXAMEN' => array(
                'total' => $dt_ficha['fpg_examen'],
                'adeudo' => $dt_examen_adeudo
            ),
            'PPG_GUIA' => array(
                'total' => $dt_ficha['fpg_guia'],
                'adeudo' => $dt_guia_adeudo
            ),
            'PPG_INCORPORACION' => array(
                'total' => $dt_ficha['fpg_incorporacion'],
                'adeudo' => $dt_incorporacion_adeudo
            ),

            'PPG_CERTIFICADO' => array(
                'total' => $dt_ficha['fpg_certificado'],
                'adeudo' => $dt_certificado_adeudo
            ),
            'PPG_SEMANAL' => array(
                'total' => $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'],
                'adeudo' => $dt_semanal_adeudo,
                'pago_semanal' => $dt_ficha['fpg_semana']
            ),
        );
    }

    public static function ctrMostrarDatosFichaPago3($fpg_id)
    {
        $dt_ficha = PagosModelo::mdlMostrarAbonosAlumno($fpg_id);

        $dt_incripcion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_INSCRIPCION',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_incripcion_adeudo = $dt_incripcion['ppg_adeudo_s'] == 0 ? $dt_ficha['fpg_inscripcion'] : $dt_ficha['fpg_inscripcion'] - $dt_incripcion['ppg_adeudo_s'];

        $dt_examen = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_EXAMEN',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_examen_adeudo = $dt_examen['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_examen'] : $dt_ficha['fpg_examen'] - $dt_examen['ppg_adeudo_s'];

        $dt_guia = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_GUIA',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_guia_adeudo = $dt_guia['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_guia'] : $dt_ficha['fpg_guia'] - $dt_guia['ppg_adeudo_s'];

        $dt_incorporacion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_INCORPORACION',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_incorporacion_adeudo = $dt_incorporacion['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_incorporacion'] : $dt_ficha['fpg_incorporacion'] - $dt_incorporacion['ppg_adeudo_s'];

        $dt_certificado = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_CERTIFICADO',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_certificado_adeudo = $dt_certificado['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_certificado'] : $dt_ficha['fpg_certificado'] - $dt_certificado['ppg_adeudo_s'];

        $dt_semanal = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_SEMANAL',
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        $dt_semanal_adeudo = $dt_semanal['ppg_adeudo_s'] == "" ? $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'] : $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'] - $dt_semanal['ppg_adeudo_s'];



        return array(
            'PPG_INSCRIPCION' => array(
                'total' => $dt_ficha['fpg_inscripcion'],
                'adeudo' => $dt_incripcion_adeudo
            ),
            'PPG_EXAMEN' => array(
                'total' => $dt_ficha['fpg_examen'],
                'adeudo' => $dt_examen_adeudo
            ),
            'PPG_GUIA' => array(
                'total' => $dt_ficha['fpg_guia'],
                'adeudo' => $dt_guia_adeudo
            ),
            'PPG_INCORPORACION' => array(
                'total' => $dt_ficha['fpg_incorporacion'],
                'adeudo' => $dt_incorporacion_adeudo
            ),

            'PPG_CERTIFICADO' => array(
                'total' => $dt_ficha['fpg_certificado'],
                'adeudo' => $dt_certificado_adeudo
            ),
            'PPG_SEMANAL' => array(
                'total' => $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'],
                'adeudo' => $dt_semanal_adeudo,
                'pago_semanal' => $dt_ficha['fpg_semana']
            ),
        );
    }
    public static function ctrMostrarDatosFichaPago2()
    {
        $dt_ficha = PagosModelo::mdlMostrarAbonosAlumno($_POST['fpg_id']);

        $dt_incripcion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => $_POST['ppg_concepto'],
            'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        ));
        if ($_POST['ppg_concepto'] == '') {
            $dt_incripcion_adeudo = $dt_incripcion['ppg_adeudo'] == "" ? $dt_ficha['fpg_inscripcion'] : $dt_incripcion['ppg_adeudo'];
        }
    }

    public static function ctrMostrarAbonosAlumnoConcepto()
    {
        return PagosModelo::mdlMostrarAbonosAlumnoConcepto($_POST['fpg_id'], $_POST['ppg_concepto']);
    }
    public static function ctrEmpezarVentaFicha()
    {
        if (isset($_POST['btnEmpezarFichaVenta'])) {
            $vfch_id = PagosModelo::mdlConsultarVentaSiguienteFicha();

            $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 0 ? "0001"  : $vfch_id['vfch_id'];
            $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 1 ? "000" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];
            $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 2 ? "00" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];
            $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 3 ? "0" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];

            $_POST['vfch_fecha_registro'] = FECHA;
            $_POST['vfch_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['vfch_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            $_POST['vfch_id'] = $vfch_id['vfch_id'];
            $_POST['vfch_id_corte'] = CortesControlador::crtConsultarUltimoCorte();


            $empezarVentaFicha = PagosModelo::mdlEmpezarVenta($_POST);
            // preArray($empezarVentaFicha);
            // return;
            if ($empezarVentaFicha) {

                return array(
                    'mensaje' => 'Ficha creada, llena la demas información',
                    'status' => true,
                    'vfch_id' => $_POST['vfch_id']
                );
            } else {
                return array(
                    'mensaje' => 'Ocurrio un error, intenta de nuevo',
                    'status' => false,
                    'vfch_id' => $_POST['vfch_id']
                );
            }
        }
    }

    public static function ctrEmpezarVentaFichaOnline()
    {
        if (isset($_POST['btnEmpezarFichaVenta'])) {
            $vfch_id = PagosModelo::mdlConsultarVentaSiguienteFicha();

            $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 0 ? "0001"  : $vfch_id['vfch_id'];
            $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 1 ? "000" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];
            $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 2 ? "00" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];
            $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 3 ? "0" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];

            $_POST['vfch_fecha_registro'] = FECHA;
            $_POST['vfch_usuario_registro'] = 'REGISTRO ONLINE';
            $_POST['vfch_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            $_POST['vfch_id'] = $vfch_id['vfch_id'];
            $_POST['vfch_id_corte'] = CortesControlador::crtConsultarUltimoCorteOnline();


            $empezarVentaFicha = PagosModelo::mdlEmpezarVenta($_POST);
            // preArray($empezarVentaFicha);
            // return;
            if ($empezarVentaFicha) {

                return array(
                    'mensaje' => 'Ficha creada, llena la demas información',
                    'status' => true,
                    'vfch_id' => $_POST['vfch_id']
                );
            } else {
                return array(
                    'mensaje' => 'Ocurrio un error, intenta de nuevo',
                    'status' => false,
                    'vfch_id' => $_POST['vfch_id']
                );
            }
        }
    }

    public static function ctrAplicarCupon()
    {
        if (isset($_POST['btnAplicarCupon'])) {



            $cps = CuponesModelo::mdlMostrarCupones($_POST['vfch_cupon']);


            // Consultar si existe
            if ($cps == false) {
                return array(
                    'status' => false,
                    'mensaje' => 'Este cupón no existe, intenta con otro'
                );
            }
            // Consultar si esta disponible
            if ($cps['cps_estado'] == 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'Cupón no disponible'
                );
            }

            // Consultar si hay tope
            if ($cps['cps_tope'] != "-") {
                if ($cps['cps_tope'] == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Cupón agotado'
                    );
                }
            }

            // Consultar el tipo de cupon
            $restrinciones = json_decode($cps['cps_restricciones'], true);


            // Restricciones de usuo por matricula
            if ($restrinciones['aply']['tipo'] == 'by_matricula') {
                $data = array();
                $data = explode(",", $restrinciones['aply']['data']);
                $bandera = false;
                foreach ($data as $key => $usr_matricula) {
                    if ($usr_matricula == $_POST['vfch_alumno']) {
                        $bandera = true;
                    }
                }
                if (!$bandera) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Este cupón no es valido para este alumno'
                    );
                }
            }

            // Restrición de fecha
            if (FECHA <= $cps['cps_fecha_inicio']) {
                return array(
                    'status' => false,
                    'mensaje' => 'Este cupón aún no esta disponible'
                );
            }

            if ($cps['cps_fecha_fin'] != "0000-00-00 00:00:00") {
                if ($cps['cps_fecha_fin'] <= FECHA) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Este cupón ya caduco'
                    );
                }
            }

            return array(
                'status' => true,
                'mensaje' => 'Cupón aplicado',
                'data' => $restrinciones['cupon']
            );
        }
    }

    public  static function ctrSolicitudCancelacion()
    {
        if (isset($_POST['btnCanelarFichaPago'])) {

            $_POST['vfch_usuario_solicito'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['vfch_fecha_solicitud'] = FECHA;

            $cancelacion = PagosModelo::mdlSolicitudCancelacion($_POST);

            if ($cancelacion) {

                return array(
                    'mensaje' => "Tu solicitud fue enviada con éxito a los administradores. Como recomendación espera a que aprueben tu solicitud antes de seguir abonando sobre esta inscripción",
                    'status' => true,
                    'pagina' => HTTP_HOST . 'pagos/fichas'
                );
            } else {
                return array(
                    'mensaje' => 'Ocurrio un error, recarga la página e intenta de nuevo',
                    'status' => false,
                    'pagina' => HTTP_HOST . 'pagos/fichas'

                );
            }
        }
    }

    public  static function ctrCambioEstadoSolicitud()
    {
        if (isset($_POST['btnCambioEstadoSolicitud'])) {

            if ($_POST['vfch_solicitud_cancelacion'] ==  2) {

                $_POST['vfch_usuario_aprobo'] = $_SESSION['session_usr']['usr_nombre'];
                $_POST['vfch_fecha_aprobacion'] = FECHA;
                $cancelacion = PagosModelo::mdlSolicitudCancelacion2($_POST);

                if ($cancelacion) {

                    return array(
                        'mensaje' => "Cancelación aprobada",
                        'status' => true,
                        'pagina' => HTTP_HOST . 'pagos/fichas-canceladas'
                    );
                } else {
                    return array(
                        'mensaje' => 'Ocurrio un error, recarga la página e intenta de nuevo',
                        'status' => false,
                        'pagina' => HTTP_HOST . 'pagos/fichas-canceladas'

                    );
                }
            } else {

                $_POST['vfch_usuario_aprobo'] = $_SESSION['session_usr']['usr_nombre'];
                $_POST['vfch_fecha_aprobacion'] = FECHA;
                $cancelacion = PagosModelo::mdlSolicitudCancelacion3($_POST);

                if ($cancelacion) {

                    return array(
                        'mensaje' => "Cancelación rechazada",
                        'status' => true,
                        'pagina' => HTTP_HOST . 'pagos/fichas-canceladas'
                    );
                } else {
                    return array(
                        'mensaje' => 'Ocurrio un error, recarga la página e intenta de nuevo',
                        'status' => false,
                        'pagina' => HTTP_HOST . 'pagos/fichas-canceladas'

                    );
                }
            }
        }
    }

    public static function ctrPagarOpenPay()
    {
        if (isset($_POST['btnPagoOpenPay'])) {

            $incripcion = InscripcionesModelo::mdlMostrarInscripciones($_SESSION['session_usr']['usr_id']);
            $incripcion = $incripcion[0];
            $dt_pago_online_ins = json_decode($incripcion['fpg_pago_online'], true);

            $vfch_monto = str_replace(",", "", $dt_pago_online_ins['TOTAL-DESCUENTO']);
            $vfch_sub_monto = str_replace(",", "", $dt_pago_online_ins['TOTAL']);
            $vfch_sub_monto = $vfch_sub_monto / $dt_pago_online_ins['PAGOS'];
            $vfch_descuento = $dt_pago_online_ins['DESCUENTO'];


            $dt_pago_online = PagosControlador::ctrMostrarDatosFichaPagoOnline($incripcion['fpg_id']);

            $ppg_adeudo = $dt_pago_online['PPG_ONLINE']['adeudo'];

            /**
             * 
             * {"PAGOS":3,"TOTAL":"14,700.00","DESCUENTO":"30","TOTAL-DESCUENTO":"3,430.00","TOTAL-PAGO":"10,290.00"}
             */

            $openpay = Openpay::getInstance(
                'mzumskvckxazgxy6l9xu',
                'sk_0080b17fd88748fb95fe844f6dee0900'
            );

            $customer = array(
                'name' => $_SESSION['session_usr']['usr_nombre'],
                'last_name' => $_SESSION['session_usr']['usr_app'],
                'phone_number' => $_SESSION['session_usr']['usr_telefono'],
                'email' => $_SESSION['session_usr']['usr_correo'],
            );

            try {
                $chargeData = array(
                    'method' => 'card',
                    'source_id' => $_POST["token_id"],
                    'amount' => $vfch_monto, // formato númerico con hasta dos dígitos decimales. 
                    'description' => $incripcion['pqt_nombre'],
                    'device_session_id' => $_POST["deviceSessionId"],
                    'customer' => $customer
                );

                $charge = $openpay->charges->create($chargeData);



                if ($charge != NULL) {

                    $datos = array();

                    $vfch_id = PagosModelo::mdlConsultarVentaSiguienteFicha();

                    $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 0 ? "0001"  : $vfch_id['vfch_id'];
                    $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 1 ? "000" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];
                    $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 2 ? "00" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];
                    $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 3 ? "0" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];

                    $datos = array(
                        'vfch_fecha_registro' => FECHA,
                        'vfch_usuario_registro' => 'REGISTRO ONLINE',
                        'vfch_id_sucursal' => $_SESSION['session_suc']['scl_id'],
                        'vfch_id' => $vfch_id['vfch_id'],
                        'vfch_id_corte' => CortesControlador::crtConsultarUltimoCorteOnline(),
                        'vfch_referencia' => $_POST["token_id"],
                        'vfch_monto' => $vfch_monto,
                        'vfch_mp' => 'Tarjeta',
                        'vfch_sub_monto' => $vfch_sub_monto,
                        'vfch_descuento' => $vfch_descuento,
                        'vfch_alumno' => $_SESSION['session_usr']['usr_matricula'],
                        'vfch_ficha_pago' => $incripcion['fpg_id'],
                        'vfch_estado' => 'PAGADO',
                        'vfch_fecha_pagada' => FECHA

                    );
                    $empezarVentaFicha = PagosModelo::mdlEmpezarVentaOnline($datos);
                    if ($empezarVentaFicha) {

                        $crearPago = PagosModelo::mdlAgregarCarritoOnline(
                            array(
                                'ppg_ficha_pago' => $incripcion['fpg_id'],
                                'ppg_ficha_venta' => $vfch_id['vfch_id'],
                                'ppg_monto' => $vfch_sub_monto,
                                'ppg_descuento' => $vfch_descuento,
                                'ppg_total' => $vfch_monto,
                                'ppg_fecha_registro' => FECHA,
                                'ppg_concepto' => 'PPG_ONLINE',
                                'ppg_usuario_registro' => 'REGISTRO ONLINE',
                                'ppg_adeudo' => $ppg_adeudo - $vfch_monto,
                                'ppg_estado_pagado' => 'PAGADO',
                                'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']

                            )
                        );
                        if ($crearPago) {
                            return array(
                                'status' => true,
                                'mensaje' => 'Pago realizado con éxito',
                                'pagina' => HTTP_HOST . 'alumno/' . $_SESSION['session_usr']['usr_id'] . '/kerdex-pagos'
                            );
                        }
                    }
                }
            } catch (Exception $th) {
                return array(
                    'status' => false,
                    'mensaje' => $th->getMessage() . '. Intente con otra tarjeta',
                );
            }


            // 


            return;
        }
    }
    public static function ctrPagarStripe()
    {
        if (isset($_POST['btnChargePayStripe'])) {

            startLoadButton();

            try {
                $incripcion = InscripcionesModelo::mdlMostrarInscripciones($_SESSION['session_usr']['usr_id']);
                $incripcion = $incripcion[0];
                $dt_pago_online_ins = json_decode($incripcion['fpg_pago_online'], true);

                $vfch_monto = str_replace(",", "", $dt_pago_online_ins['TOTAL-DESCUENTO']);
                $vfch_sub_monto = str_replace(",", "", $dt_pago_online_ins['TOTAL']);
                $vfch_sub_monto = $vfch_sub_monto / $dt_pago_online_ins['PAGOS'];
                $vfch_descuento = $dt_pago_online_ins['DESCUENTO'];


                $dt_pago_online = PagosControlador::ctrMostrarDatosFichaPagoOnline($incripcion['fpg_id']);

                $ppg_adeudo = $dt_pago_online['PPG_ONLINE']['adeudo'];

                // require_once('/path/to/stripe-php/init.php');
                require_once DOCUMENT_ROOT . 'app/lib/stripe-php/autoload.php';

                \Stripe\Stripe::setApiKey(SECRET_KEY_STRIPE);

                $token = $_POST['stripeToken'];



                $customer = \Stripe\Customer::create([
                    'email' => $_SESSION['session_usr']['usr_correo'],
                    'source' => $token
                ]);


                $charge = \Stripe\Charge::create([
                    'customer' => $customer->id,
                    'amount' => str_replace('.', '', $vfch_monto),
                    'currency' => 'mxn',
                    'description' => 'GRUPO SEAD - ' . $incripcion['pqt_nombre'],
                    'receipt_email' => $_SESSION['session_usr']['usr_correo'],
                ]);





                if ($charge['status'] == "succeeded") {

                    $datos = array();

                    $vfch_id = PagosModelo::mdlConsultarVentaSiguienteFicha();

                    $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 0 ? "0001"  : $vfch_id['vfch_id'];
                    $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 1 ? "000" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];
                    $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 2 ? "00" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];
                    $vfch_id['vfch_id'] =  strlen($vfch_id['vfch_id']) == 3 ? "0" . $vfch_id['vfch_id'] : $vfch_id['vfch_id'];

                    $datos = array(
                        'vfch_fecha_registro' => FECHA,
                        'vfch_usuario_registro' => 'REGISTRO ONLINE',
                        'vfch_id_sucursal' => $_SESSION['session_suc']['scl_id'],
                        'vfch_id' => $vfch_id['vfch_id'],
                        'vfch_id_corte' => CortesControlador::crtConsultarUltimoCorteOnline(),
                        'vfch_referencia' => $charge['id'],
                        'vfch_monto' => $vfch_monto,
                        'vfch_mp' => 'Tarjeta',
                        'vfch_sub_monto' => $vfch_sub_monto,
                        'vfch_descuento' => $vfch_descuento,
                        'vfch_alumno' => $_SESSION['session_usr']['usr_matricula'],
                        'vfch_ficha_pago' => $incripcion['fpg_id'],
                        'vfch_estado' => 'PAGADO',
                        'vfch_fecha_pagada' => FECHA

                    );
                    $empezarVentaFicha = PagosModelo::mdlEmpezarVentaOnline($datos);
                    if ($empezarVentaFicha) {

                        $crearPago = PagosModelo::mdlAgregarCarritoOnline(
                            array(
                                'ppg_ficha_pago' => $incripcion['fpg_id'],
                                'ppg_ficha_venta' => $vfch_id['vfch_id'],
                                'ppg_monto' => $vfch_sub_monto,
                                'ppg_descuento' => $vfch_descuento,
                                'ppg_total' => $vfch_monto,
                                'ppg_fecha_registro' => FECHA,
                                'ppg_concepto' => 'PPG_ONLINE',
                                'ppg_usuario_registro' => 'REGISTRO ONLINE',
                                'ppg_adeudo' => $ppg_adeudo - $vfch_monto,
                                'ppg_estado_pagado' => 'PAGADO',
                                'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']

                            )
                        );
                        if ($crearPago) {
                            echo '<script>window.open("' . HTTP_HOST . 'app/report/ficha_pago.php?fpg_id=' . $vfch_id['vfch_id'] . '","_blank")</script>';
                            AppControlador::msj('success', '¡Muy bien!', 'Pago realizado con éxito', HTTP_HOST . 'alumno/' . $_SESSION['session_usr']['usr_id'] . '/kerdex-pagos');

                            // return array(
                            //     'status' => true,
                            //     'mensaje' => 'Pago realizado con éxito',
                            //     'pagina' => ''
                            // );
                        }
                    }
                } else {
                    AppControlador::msj('error', '¡Error!', 'Tarjeta declinada, intente con otra', HTTP_HOST);
                }
            } catch (Exception $th) {
                //throw $th;
                AppControlador::msj('error', '¡Error!', 'Tarjeta declinada, intente con otra', HTTP_HOST);
            }
        }
    }
}
