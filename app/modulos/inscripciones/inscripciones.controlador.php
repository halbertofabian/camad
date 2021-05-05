
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 10:46
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class InscripcionesControlador {

    public static function ctrAgregarInscripciones() {
        if (isset($_POST['btnInscribirAlumnos'])) {

            $alumno = UsuariosModelo::mdlMostrarUsuarios($_POST['ins_alumno']);
            $_POST['fpg_id_sucursal'] = $alumno['usr_id_sucursal'];


            $dtl_pagos = json_decode($_POST['ins_costos'], true);

            $_POST['fpg_inscripcion'] = $dtl_pagos['costo_inscripcion'];
            $_POST['fpg_examen'] = $dtl_pagos['costo_examen'];
            $_POST['fpg_guia'] = $dtl_pagos['costo_guia'];
            $_POST['fpg_incorporacion'] = $dtl_pagos['costo_incorporacion'];
            $_POST['fpg_certificado'] = $dtl_pagos['costo_certificado'];
            $_POST['fpg_semana'] = $dtl_pagos['costo_semana'];
            $_POST['fpg_numero_semana'] = $dtl_pagos['duracion_semana'];

            $_POST['fpg_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];

            $_POST['fpg_liga'] = "";


            $crearInscripcion = InscripcionesModelo::mdlAgregarInscripciones($_POST);

            if ($crearInscripcion) {
                $ruta = InscripcionesModelo::mdlMostrarUltimaInscripcionAlumno($alumno['usr_id']);
                return array(
                    'status' => true,
                    'mensaje' => 'Inscripción creada, a continuación completa tu pago',
                    'pagina' => HTTP_HOST . 'inscripciones/fichas/' . $ruta['fpg_id']
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Se produjo un error, intenta de nuevo',
                    'pagina' => ''
                );
            }
        }
    }

    public static function ctrAgregarInscripcionesOnline() {
        if (isset($_POST['btnInscribirAlumnos'])) {


            $dtl_pagos = json_decode($_POST['ins_costos'], true);

            $_POST['ins_pagos'] = json_decode($_POST['ins_pagos'], true);
            $ins_numero_pago = $_POST['ins_numero_pago'];
            $_POST['fpg_pago_online'] = $_POST['ins_pagos'][$ins_numero_pago - 1];
            $desc = $_POST['fpg_pago_online']['DESCUENTO'];

            $_POST['fpg_inscripcion'] = $dtl_pagos['costo_inscripcion'] - ($dtl_pagos['costo_inscripcion'] * $desc / 100);
            $_POST['fpg_examen'] = $dtl_pagos['costo_examen'] - ($dtl_pagos['costo_examen'] * $desc / 100);
            $_POST['fpg_guia'] = $dtl_pagos['costo_guia'] - ($dtl_pagos['costo_guia'] * $desc / 100);
            $_POST['fpg_incorporacion'] = $dtl_pagos['costo_incorporacion'] - ($dtl_pagos['costo_incorporacion'] * $desc / 100);
            $_POST['fpg_certificado'] = $dtl_pagos['costo_certificado'] - ($dtl_pagos['costo_certificado'] * $desc / 100);
            $_POST['fpg_semana'] = $dtl_pagos['costo_semana'] - ($dtl_pagos['costo_semana'] * $desc / 100);
            $_POST['fpg_numero_semana'] = $dtl_pagos['duracion_semana'];

            $_POST['fpg_usuario_registro'] = 'REGISTRO ONLINE';
            $_POST['fpg_pago_online'] = json_encode($_POST['fpg_pago_online'], true);
            $_POST['fpg_liga'] = "";
            $_POST['fpg_alumno'] = $_SESSION['session_usr']['usr_id'];




            $crearInscripcion = InscripcionesModelo::mdlAgregarInscripcionesOnline($_POST);

            if ($crearInscripcion) {
                AppControlador::msj('success', '¡Muy bien!', 'Ya estás inscrito, continua con tus pagos', HTTP_HOST);
            } else {
                
            }
        }
    }

    public function ctrActualizarInscripciones() {
        
    }

    public function ctrMostrarInscripciones() {
        
    }

    public function ctrEliminarInscripciones($fpg_id) {
        $eliminar = InscripcionesModelo::mdlEliminarInscripciones($fpg_id);
        if ($eliminar) {

            return array(
                'status' => true,
                'mensaje' => 'La inscripción se elimino correctamente.',
                'pagina' => HTTP_HOST . 'inscripciones'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'La inscripción no se elimino. Intentelo nuevamente.',
                'pagina' => HTTP_HOST . 'inscripciones'
            );
        }
    }

    public static function ctrCambioEstadoSolicitud() {
        if (isset($_POST['btnCambioEstadoInscripcion'])) {

            if ($_POST['fpg_solicitud_cancelacion'] == 2) {

                $cancelacion = InscripcionesModelo::mdlSolicitudCancelacion($_POST);

                if ($cancelacion) {

                    return array(
                        'mensaje' => "Cancelación aprobada",
                        'status' => true,
                        'pagina' => HTTP_HOST . 'inscripciones/canceladas'
                    );
                } else {
                    return array(
                        'mensaje' => 'No se pudo eliminar debido a que exiten abonos sobre esta inscripción.',
                        'status' => false,
                        'pagina' => HTTP_HOST . 'inscripciones/canceladas'
                    );
                }
            } else {

                $cancelacion = InscripcionesModelo::mdlSolicitudCancelacion2($_POST);

                if ($cancelacion) {

                    return array(
                        'mensaje' => "Cancelación rechazada",
                        'status' => true,
                        'pagina' => HTTP_HOST . 'inscripciones/canceladas'
                    );
                } else {
                    return array(
                        'mensaje' => 'Ocurrio un error, recarga la página e intenta de nuevo',
                        'status' => false,
                        'pagina' => HTTP_HOST . 'inscripciones/canceladas'
                    );
                }
            }
        }
    }
    
    public static function ctrCambioEstadoCertificado() {
        if (isset($_POST['btnCambioEstadoCertificado'])) {

            if ($_POST['fpg_solicitud_certificado'] == 'EN PROCESO') {

                $cancelacion = InscripcionesModelo::mdlCambiarEstadoCertificado1($_POST);

                if ($cancelacion) {

                    return array(
                        'mensaje' => "Certificado en proceso",
                        'status' => true,
                        'pagina' => HTTP_HOST . 'inscripciones/canceladas'
                    );
                } else {
                    return array(
                        'mensaje' => 'No se pudo procesar el certificado.',
                        'status' => false,
                        'pagina' => HTTP_HOST . 'inscripciones/porCertificar'
                    );
                }
            } else {

                $cancelacion = InscripcionesModelo::mdlCambiarEstadoCertificado2($_POST);

                if ($cancelacion) {

                    return array(
                        'mensaje' => "Certificación con exito",
                        'status' => true,
                        'pagina' => HTTP_HOST . 'inscripciones/porCertificar'
                    );
                } else {
                    return array(
                        'mensaje' => 'Ocurrio un error, al certificar',
                        'status' => false,
                        'pagina' => HTTP_HOST . 'inscripciones/canceladas'
                    );
                }
            }
        }
    }

}
