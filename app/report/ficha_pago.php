<?php
ob_start();
include_once '../../config.php';

require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.modelo.php';
require_once DOCUMENT_ROOT . 'app/modulos/pagos/pagos.controlador.php';
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



$vfch = PagosModelo::mdlConsultarFichas($_GET['fpg_id']);
$alumno = UsuariosModelo::mdlMostrarUsuarios('', '', true, $vfch['vfch_alumno']);
$abonos = PagosModelo::mdlMostrarCarritoAlumno($vfch['vfch_ficha_pago'], $vfch['vfch_id']);

$sucursal = SucursalesModelo::mdlMostrarSucursales($_SESSION['session_suc']['scl_id']);


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
                    GRUPO EDUCATIVO SEAD
                    
                    <BR> RFC:<strong>$sucursal[scl_rfc]</strong>
                    <BR> $sucursal[scl_direccion] 
                    <BR> TEL: $sucursal[scl_telefono] 
                    <BR> PLANTEL: $sucursal[scl_nombre]      
                </td>
                

            </tr>
            <tr>
                <td style="text-align: center; width:$impresion px;">
                    FECHA:$vfch[vfch_fecha_registro] <br>
                    <span>No es un comprobante fiscal</span>
                </td>
                
            </tr>
            <tr style="">
                <td style="text-align: center; padding:5px; width:$impresion px;">
                ---------------------------------
                    DONATIVO DE RECUPERACIÓN #$vfch[vfch_id]
                ---------------------------------

                </td>
            </tr>
            <tr style="">
                <td style="text-align: left; padding:5px; width:$impresion px;">
                
                NOMBRE: $alumno[usr_nombre] $alumno[usr_app] $alumno[usr_apm]
                <br>MATRICULA: $alumno[usr_matricula]
                <br>MT: $vfch[vfch_mp]
                <br>REFERENCIA: $vfch[vfch_referencia]
                <br>CUPON: $vfch[vfch_descuento]
                <br>ATENDIO: $vfch[vfch_usuario_registro]
                
                </td>
            </tr>
            <tr style="">
                <td style="text-align: center; padding:5px; width:$impresion px;">
                ---------------------------------
                    CONCEPTO            IMPORTES
                ---------------------------------

                </td>
            </tr>
            
        </thead>
    </table>
  
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);

foreach ($abonos as $key => $abs) :
    $body = <<<EOD

    <table style="font-size:10px">
        <thead>
            <tr>
                <td style="text-align: left; width:$impresion px;">
                    $abs[ppg_concepto]    
                </td>
                 
            </tr>
            <tr>
                
                <td style="text-align: right; width:$impresion px;">
                    $ $abs[ppg_monto] - $abs[ppg_descuento]  % 
                    <br>
                    ABONO: $ $abs[ppg_total] <br>
                    ADEUDO: $abs[ppg_adeudo]
                </td>  
            </tr>
            
        </thead>
    </table>
  
EOD;
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $body, 0, 1, 0, true, '', true);
endforeach;
$descuento = $vfch['vfch_sub_monto'] - $vfch['vfch_monto'];

$header = <<<EOD

    <table style="font-size:10px">
        <thead>
        
            <tr>
                <td style="text-align: left; width:$impresion px;">
                <br> 
                ---------------------------------   
                </td>
            </tr>
            <tr>
                <td style="text-align: left; width:$impresion2 px;">
                    
                    SUB TOTAL      
                </td>
                <td style="text-align: right; width:$impresion2 px;">
                    $ $vfch[vfch_sub_monto]
                </td>  
            </tr>
            <tr>
                <td style="text-align: left; width:$impresion2 px;">
                    
                    DESCUENTO     
                </td>
                <td style="text-align: right; width:$impresion2 px;">
                    $ $descuento
                </td>  
            </tr>
            <tr>
                <td style="text-align: left; width:$impresion2 px;">
                    
                     TOTAL      
                </td>
                <td style="text-align: right; width:$impresion2 px;">
                    $ $vfch[vfch_monto]
                </td>  
            </tr>

            <tr>
                <td style="text-align: center; width:$impresion px;">
                <br><br> PARA CUALQUIER ACLARACIÓN ES <br>OBLIGATORIO PRSENTAR TICKET  
                </td>
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

if (isset($_GET['fpg_id'])) {
    ob_end_clean();
    $pdf->Output('ficha_inscripcion_' . $_GET['fpg_id'] . '.pdf', 'I');
}


//============================================================+
// END OF FILE
//============================================================+
