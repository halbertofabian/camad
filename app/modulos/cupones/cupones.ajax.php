
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 02/12/2020 17:09
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/cupones/cupones.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cupones/cupones.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';
class CuponesAjax
{
    public $cps_codigo;
    public function crearCuponAjax()
    {
        $respuesta = CuponesControlador::ctrAgregarCupones();
        echo json_encode($respuesta, true);
    }
    public function actualizarCuponAjax()
    {
        $respuesta = CuponesControlador::ctrActualizarCupones();
        echo json_encode($respuesta, true);
    }
    public function ajaxEliminarCupon()
    {
        $eliminarCupon = new CuponesControlador();
        $eliminar = $eliminarCupon->ctrEliminarCupones($this->cps_codigo);
        echo json_encode($eliminar);
    }
}
if (isset($_POST['btnCrearCupon'])) {
    $crearCupon = new CuponesAjax();
    $crearCupon->crearCuponAjax();
}

if (isset($_POST['btnActualizarCupon'])) {
    $crearCupon = new CuponesAjax();
    $crearCupon->actualizarCuponAjax();
}
if (isset($_POST['btnEliminarCupon'])) {
    $eliminarCupon = new CuponesAjax();
    $eliminarCupon->cps_codigo = $_POST['cps_codigo'];
    $eliminarCupon->ajaxEliminarCupon();
}
