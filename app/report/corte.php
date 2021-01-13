<?php
ob_start();
include_once '../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cortes/cortes.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.controlador.php';
require_once DOCUMENT_ROOT . 'app/modulos/app/app.controlador.php';


/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../lib/TCPDF/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('');
$pdf->SetSubject('');
$pdf->SetKeywords('');



// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
// $pdf->SetFont('dejavusans', '', 14, '', true);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(8, 4, 6, 0);
$pdf->SetFont('Courier', '', 20, '', true);

$impresion = 210;
$impresion2 = $impresion / 2;
$formato = 'A4';
// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage('P', $formato);

// set text shadow effect
// $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

// Declaración de variables

$ruta = HTTP_HOST;

// $impresion = $tipo_impresion == '58mm' ? 130  : 160;
// $formato = $tipo_impresion == '58mm' ? 'A4' : 'A7';



$corte = CajasModelo::mdlMostrarCajasById($_GET['copn_id']);

$sucursal = SucursalesModelo::mdlMostrarSucursales($_SESSION['session_suc']['scl_id']);

$crt_id = $_GET['copn_id'];

$montos = array(
    'monto_fichas_e' => CortesModelo::mdlConsultarMontoFichasPEByCorte($crt_id),
    'monto_fichas_b' => CortesModelo::mdlConsultarMontoFichasPBByCorte($crt_id),
    'monto_ingresos_e' => CortesModelo::mdlConsultarMontoIngresosPEByCorte($crt_id),
    'monto_ingresos_b' => CortesModelo::mdlConsultarMontoIngresosPBByCorte($crt_id),
    'monto_gastos_e' => CortesModelo::mdlConsultarMontoGastosPEByCorte($crt_id),
    'monto_gastos_b' => CortesModelo::mdlConsultarMontoGastosPBByCorte($crt_id),
);


$vfch_e = number_format($montos['monto_fichas_e']['monto_total']);
$vfch_b = number_format($montos['monto_fichas_b']['monto_total']);


$ing_e = number_format($montos['monto_ingresos_e']['monto_total']);
$ing_b = number_format($montos['monto_ingresos_b']['monto_total']);


$gts_e = number_format($montos['monto_gastos_e']['monto_total']);
$gts_b = number_format($montos['monto_gastos_b']['monto_total']);


$totalEfectivo = str_replace(",", "", $vfch_e) +  str_replace(",", "", $ing_e) + str_replace(",", "", $corte['copn_ingreso_inicio']) - str_replace(",", "", $gts_e);


$totalBanco = str_replace(",", "", $vfch_b) + str_replace(",", "", $ing_b)  - str_replace(",", "", $gts_b);

$totalBanco = number_format($totalBanco, 2);
$totalEfectivo = number_format($totalEfectivo, 2);

// preArray($vfch);
// preArray($alumno);
// preArray($abonos);

//
// Set some content to print
$header = <<<EOD

    <table style="font-size:10px">
        <thead>
            <tr>
                <td style="text-align: center; width:$impresion px;">
                    <img src="{$ruta}app/assets/images/img-app/logo_sead_1.png" width="180" />
                    <br><br>   
                    PLANTEL EDUCATIVO SEAD ABIERTO Y A DISTANCIA
                    
                    <BR> RFC:<strong>$sucursal[scl_rfc]</strong>
                    <BR> $sucursal[scl_direccion] 
                    <BR> TEL: $sucursal[scl_telefono] 
                    <BR> PLANTEL: $sucursal[scl_nombre]      
                </td>
                

            </tr>
            <tr>
                <td style="text-align: center; width:$impresion px;">
                    
                RESPONSABLE: <strong> $corte[usr_nombre] </strong>
                    
                </td>
                
            </tr>
            <tr style="">
                <td style="text-align: center; padding:5px; width:$impresion px;">
                ---------------------------------
                CORTE: <strong> $corte[copn_id] </strong>
                CAJA:<strong> $corte[cja_nombre] </strong> <br>
                FECHA:$corte[copn_fecha_abrio] <br>
                ---------------------------------

                </td>
            </tr>
            
            
            
        </thead>
    </table>
  
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);


$header = <<<EOD

    <table style="font-size:10px">
        <thead>
        <tr>
                <td>
                    INICIO DE CAJA: $corte[copn_ingreso_inicio]
                </td>
            </tr>
            <tr>
                <td>
                    TOTAL FICHAS EFECTIVO: $vfch_e
                </td>
            </tr>
            <tr>
                <td>
                    TOTAL FICHAS BANCO: $vfch_b
                </td>
            </tr>
            <tr>
                <td>
                    TOTAL INGRESOS EFECTIVO: $ing_e
                </td>
            </tr>
            <tr>
                <td>
                    TOTAL INGRESOS BANCO: $ing_b
                </td>
            </tr>
            <tr>
                <td>
                    TOTAL GATOS EFECTIVO: $gts_e
                </td>
            </tr>
            <tr>
                <td>
                    TOTAL GATOS BANCO: $gts_b
                </td>
            </tr>
            
            

        </thead>
    </table>


    <table style="font-size:10px; width:$impresion px;">
        <thead>
        <tr>
                <td style="text-align: center; padding:5px; width:$impresion px;">
                --------------------------------
                TOTAL REPORTADO
                --------------------------------
                </td>
            </tr>
            <tr>
                <td style="text-align: center; ">
                
                    TOTAL EFECTIVO / CAJA: <br>
                    <strong>$corte[copn_ingreso_efectivo]</strong>

                </td>
            </tr>
            <tr>
            <td style="text-align: center; ">
                TOTAL BANCO: <br>
                <strong>$corte[copn_ingreso_banco]</strong>
            </td>
            </tr>
        </thead>
    </table>

    <table style="font-size:10px; width:$impresion px;">
        <thead>
        <tr>
                <td style="text-align: center; padding:5px; width:$impresion px;">
                --------------------------------
                TOTAL REAL
                --------------------------------
                </td>
            </tr>
            <tr>
                <td style="text-align: center; ">
                
                    TOTAL EFECTIVO / CAJA: <br>
                    <strong>$totalEfectivo</strong>

                </td>
            </tr>
            <tr>
            <td style="text-align: center; ">
                TOTAL BANCO: <br>
                <strong>$totalBanco</strong>
            </td>
            </tr>
            <tr>
            FECHA CIERRE:$corte[copn_fecha_cierre] <br>
            </tr>
        </thead>
    </table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);




// Print text using writeHTMLCell()

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.

if (isset($_GET['copn_id'])) {
    ob_end_clean();
    $pdf->Output('corte_caja_' . $_GET['copn_id'] . '.pdf', 'I');
}


//============================================================+
// END OF FILE
//============================================================+
