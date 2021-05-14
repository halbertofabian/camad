
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 17/01/2021 22:11
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/informes/informes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/informes/informes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';

class InformesAjax {

    public function ajaxInform_1() {
        $res = InformesControlador::ctrInforme_1(array(
                    'ifs_sucursal' => $_SESSION['session_suc']['scl_id'],
                    'ifs_fecha_inicio' => $_POST['ifs_fecha_inicio'],
                    'ifs_fecha_fin' => $_POST['ifs_fecha_fin'],
                    'ifs_concepto' => $_POST['ifs_concepto'],
        ));

        echo json_encode($res, true);
    }

    public function ajaxInform_2() {
        $res = InformesModelo::mdlInforme_2($_POST);
        $adeudoData = array();
        
        foreach ($res as $ads) {
            
            $adeudos = PagosControlador::ctrMostrarDatosFichaPagoByFicha($ads['fpg_id']);
        
            $adeudo = 0;
            $adeudo += $adeudos['PPG_INSCRIPCION']['adeudo'];
            $adeudo += $adeudos['PPG_EXAMEN']['adeudo'];
            $adeudo += $adeudos['PPG_GUIA']['adeudo'];
            $adeudo += $adeudos['PPG_INCORPORACION']['adeudo'];
            $adeudo += $adeudos['PPG_CERTIFICADO']['adeudo'];
            $adeudo += $adeudos['PPG_SEMANAL']['adeudo'];
            array_push($adeudoData, number_format($adeudo, 2));
            
        }
        
        $array = array('data' => $res, 'adeudos' => $adeudoData);

        echo json_encode($array, true);
    }

    public function ajaxInform_3(){
        $res = InformesModelo::mdlInorme_3($_POST);
        echo json_encode($res, true);
    }

}

if (isset($_POST['btnFiltrarInforme_1'])) {
    $informe_1 = new InformesAjax();
    $informe_1->ajaxInform_1();
}

if (isset($_POST['btnFiltrarInforme_2'])) {
    $informe_1 = new InformesAjax();
    $informe_1->ajaxInform_2();
}

if (isset($_POST['btnFiltrarInforme_3'])) {
    $informe_3 = new InformesAjax();
    $informe_3->ajaxInform_3();
}
