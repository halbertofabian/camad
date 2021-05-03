<?php
ob_start();
include_once '../../config.php';
if (isset($_GET['fpg_id'])) {


    require_once DOCUMENT_ROOT . 'app/modulos/inscripciones/inscripciones.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/inscripciones/inscripciones.controlador.php';
    require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.controlador.php';
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
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage();

    // set text shadow effect
    // $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    // Declaración de variables

    $ruta = HTTP_HOST;
    $rutaQR = $ruta . 'app/upload/firmas_digitales/qr_img_validacion_de_documento.png';

    $incripcion = InscripcionesModelo::mdlMostrarInscripcionesById($_GET['fpg_id']);

    $usuario = UsuariosModelo::mdlConsultarUsuarioByNombre($incripcion['fpg_usuario_registro']);
    $firma = HTTP_HOST . '' . $usuario['usr_firma'];


    //
    // Set some content to print
    $header = <<<EOF
    <table>
        <thead>
            <tr>
                <td style="text-align: left;">
                    <img src="{$ruta}app/assets/images/img-app/logo_sep.png" width="180" />
                    
                </td>
                <td style="text-align: center;">
                
                </td>
                <td style="text-align: right;">
                <img src="{$ruta}app/assets/images/img-app/logo_sead_1.png" width="200" />
                </td>
            </tr>
            <tr>
                <td style="background-color:#9F2148; width:100%; color:#fff;text-align: center;vertical-align:text-top; font-size:18px ">
                    
                        FICHA DE INSCRIPCIÓN
                  
                </td>
            </tr>

            <tr>
            <td></td>
            </tr>

            <tr>
                <td style="background-color:#004CA0; width:100%; color:#fff;text-align: center;vertical-align:text-top; font-size:18px ">
                    
                $incripcion[pqt_nombre]
                  
                </td>
            </tr>
        </thead>
    </table>
  
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);


    $body = <<<EOD
    <table style ="font-size:16px; border: 1px solid #000">
        <thead>
            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                   <strong> Número de inscripción </strong>
                </td>
                <td style="text-align: center;border: 1px solid #000">
                <strong> Inscribio </strong>
                </td>
                <td style="text-align: center;border: 1px solid #000">
                <strong> Fecha de inscripción </strong>
                </td>
            </tr>
            <tr style ="border: 1px solid #000;background-color:#A7D3F3; ">
                <td style="text-align: center;border: 1px solid #000">
                $incripcion[fpg_id]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                $incripcion[fpg_usuario_registro]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                $incripcion[fpg_fecha_registro]
 
                </td>
            </tr>

            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                   <strong> Duración </strong>
                </td>
                <td style="text-align: center;border: 1px solid #000">
                <strong> Modalidad </strong>
                </td>
                <td style="text-align: center;border: 1px solid #000">
                <strong> Matricula </strong>
                </td>
            </tr>
            <tr style ="border: 1px solid #000;background-color:#A7D3F3; ">
                <td style="text-align: center;border: 1px solid #000">
                $incripcion[pqt_duracion]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                 $incripcion[pqt_modalidad]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                $incripcion[usr_matricula]

                </td>
            </tr>

            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                   <strong> Nombre del alumno </strong>
                </td>
                <td style="text-align: center;border: 1px solid #000">
                <strong> Apellido paterno </strong>
                </td>
                <td style="text-align: center;border: 1px solid #000">
                <strong> Apellido materno </strong>
                </td>
            </tr>
            <tr style ="border: 1px solid #000;background-color:#A7D3F3; ">
                <td style="text-align: center;border: 1px solid #000">
                $incripcion[usr_nombre]
               

                </td>
                <td style="text-align: center;border: 1px solid #000">
                $incripcion[usr_app]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                $incripcion[usr_apm]

                </td>
            </tr>

            
            <tr style ="border: 1px solid #000;background-color:#A7D3F3; ">
                <td style="text-align: center;border: 1px solid #000; width:100%">
                $incripcion[usr_calle], #$incripcion[usr_ne], NI $incripcion[usr_ni], $incripcion[usr_colonia], $incripcion[usr_cp], $incripcion[usr_municipio], $incripcion[usr_estado]
                </td>
            </tr>
            
        </thead>
    </table>
    <br>
  
EOD;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $body, 0, 1, 0, true, '', true);
    $totaPagoSemana = $incripcion['fpg_semana'] * $incripcion['fpg_numero_semana'];



    $totalCurso = 0;
    $totalCurso += $incripcion['fpg_inscripcion'];
    $totalCurso += $incripcion['fpg_examen'];
    $totalCurso += $incripcion['fpg_guia'];
    $totalCurso += $incripcion['fpg_incorporacion'];
    $totalCurso += $incripcion['fpg_certificado'];
    $totalCurso += $totaPagoSemana;

    $totalCurso = number_format($totalCurso, 2);

    $totaPagoSemana = number_format($totaPagoSemana, 2);

    $incripcion['fpg_inscripcion'] = number_format($incripcion['fpg_inscripcion'], 2);
    $incripcion['fpg_examen'] = number_format($incripcion['fpg_examen'], 2);
    $incripcion['fpg_guia'] = number_format($incripcion['fpg_guia'], 2);
    $incripcion['fpg_incorporacion'] = number_format($incripcion['fpg_incorporacion'], 2);
    $incripcion['fpg_certificado'] = number_format($incripcion['fpg_certificado'], 2);
    $incripcion['fpg_semana'] = number_format($incripcion['fpg_semana'], 2);



    $conceptos = <<<EOF
<table  style ="font-size:16px; border: 1px solid #000">
        <thead>
            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                    <strong>CONCEPTO</strong>
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    <strong>COSTO</strong>
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    <strong>OBSERVACIONES</strong>
                
                </td>
            </tr>
            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                    INSCRIPCIÒN
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    $ $incripcion[fpg_inscripcion]
                </td>
                <td style="text-align: center;border: 1px solid #000">
                
                </td>
            </tr>
           
            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                    EXAMEN
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    $  $incripcion[fpg_examen]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                
                </td>
            </tr>

            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                    GUIA
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    $ $incripcion[fpg_guia]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                
                </td>
            </tr>

            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                    INCORPORACION
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
               $ $incripcion[fpg_incorporacion]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                
                </td>
            </tr>

            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                    CERTIFICADO
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    $ $incripcion[fpg_certificado]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                
                </td>
            </tr>


            <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                    PAGO SEMANAL
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    $ $incripcion[fpg_semana]

                </td>
                <td style="text-align: center;border: 1px solid #000">
                    POR $incripcion[fpg_numero_semana] SEMANAS
                </td>
            </tr>

        <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                    TOTAL DE PAGO SEMANAL
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    $ $totaPagoSemana

                </td>
                <td style="text-align: center;border: 1px solid #000">
                
                </td>
        </tr>

        <tr style ="border: 1px solid #000; ">
                <td style="text-align: center;border: 1px solid #000">
                    
                <strong> TOTAL DEL CURSO </strong>
                    
                </td>
                <td style="text-align: center;border: 1px solid #000">
                    $ <strong> $totalCurso </strong>

                </td>
                <td style="text-align: center;border: 1px solid #000">
                
                </td>
        </tr>
    </thead>
</table>
    <br>
    <br>
    <br>
    <br>
    
    <table>
        <tr>
            <td  style="text-align:center">
            <img src="{$firma}" width="200" height="200">
            <br>
            $incripcion[fpg_usuario_registro]
            </td>
            <td style="text-align:center">
            <img src="{$ruta}app/upload/firmas_digitales/qr_img_validacion_de_documento.png" width="200">
            </td>
        </tr>
    </table>
    
    <br>
    <br>
    <br>
    <br>

    
    <p style="text-align:center"> 
        <strong>Nota:</strong> Este documento es de caracter informativo, no contiene valor como recibo de pago
    </p>

EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $conceptos, 0, 1, 0, true, '', true);

    // ---------------------------------------------------------

    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.

    ob_end_clean();


    $pdf->Output('ficha_inscripcion_' . $_GET['fpg_id'] . '.pdf', 'I');
}
