
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
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class InformesModelo
{

    public static function mdlInforme_1($ifs)
    {
        //SELECT * FROM tbl_paquetes_pagos_ppg
        try {
            //code...
            $sql = " SELECT * FROM tbl_paquetes_pagos_ppg WHERE ppg_id_sucursal = ? AND ppg_concepto LIKE '%$ifs[ifs_concepto]%' AND ppg_fecha_registro BETWEEN '$ifs[ifs_fecha_inicio] 00:00:00' AND '$ifs[ifs_fecha_fin] 23:59:59' AND ppg_estado_pagado = 'PAGADO' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ifs['ifs_sucursal']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlInforme_2($ifs)
    {
        try {

            //            if ($ifs['fpg_usuario_registro'] != "") {
            $sql = "SELECT fpg.fpg_id, usr.usr_matricula, usr.usr_nombre, usr.usr_app, usr.usr_apm, pqt.pqt_nombre, fpg.fpg_fecha_registro, usr.usr_usuario_registro, ppg.ppg_usuario_registro, ppg.ppg_adeudo, ppg.ppg_total
                FROM tbl_paquetes_pagos_ppg as ppg JOIN tbl_ficha_pago_fpg as fpg ON ppg.ppg_ficha_pago = fpg.fpg_id
                JOIN tbl_usuarios_usr as usr ON usr.usr_id = fpg.fpg_alumno
                JOIN tbl_paquete_pqt as pqt ON fpg.fpg_paquete = pqt.pqt_sku
                WHERE ppg.ppg_concepto = 'PPG_INSCRIPCION' AND ppg.ppg_fecha_registro 
                BETWEEN ? AND ? AND ppg.ppg_estado_pagado = 'PAGADO' AND ppg_id_sucursal = ? ;";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ifs['fpg_fecha_registro_inicio']);
            $pps->bindValue(2, $ifs['fpg_fecha_registro_fin']);
            $pps->bindValue(3, $ifs['ppg_id_sucursal']);
            $pps->execute();
            return $pps->fetchAll();
            //            } else {
            //                $sql = "SELECT usr.usr_nombre,usr.usr_app,usr.usr_apm,pqt.pqt_nombre,fpg.fpg_usuario_registro,fpg.fpg_fecha_registro FROM tbl_ficha_pago_fpg fpg JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno JOIN tbl_paquete_pqt pqt ON pqt.pqt_sku = fpg.fpg_paquete WHERE fpg_fecha_registro BETWEEN ? AND ?  AND fpg_id_sucursal = ? ";
            //                $con = Conexion::conectar();
            //                $pps = $con->prepare($sql);
            //                $pps->bindValue(1, $ifs['fpg_fecha_registro_inicio']);
            //                $pps->bindValue(2, $ifs['fpg_fecha_registro_fin']);
            //                $pps->bindValue(3, $_SESSION['session_suc']['scl_id']);
            //                $pps->execute();
            //                return $pps->fetchAll();
            //            }
        } catch (PDOException $th) {
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
