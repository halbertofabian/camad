
<?php
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
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class PagosModelo
{
    public static function mdlAgregarPagos($ppg)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_paquetes_pagos_ppg (ppg_ficha_pago,ppg_monto,ppg_fecha_registro,ppg_concepto,ppg_referencia,ppg_usuario_registro,ppg_adeudo,ppg_estado_pagado,ppg_fecha_pagado,ppg_mp,ppg_id_sucursal) VALUES (?,?,?,?,?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg['ppg_ficha_pago']);
            $pps->bindValue(2, $ppg['ppg_monto']);
            $pps->bindValue(3, $ppg['ppg_fecha_registro']);
            $pps->bindValue(4, $ppg['ppg_concepto']);
            $pps->bindValue(5, $ppg['ppg_referencia']);
            $pps->bindValue(6, $ppg['ppg_usuario_registro']);
            $pps->bindValue(7, $ppg['ppg_adeudo']);
            $pps->bindValue(8, $ppg['ppg_estado_pagado']);
            $pps->bindValue(9, $ppg['ppg_fecha_pagado']);
            $pps->bindValue(10, $ppg['ppg_mp']);
            $pps->bindValue(11, $ppg['ppg_id_sucursal']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlAgregarCarrito($ppg)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_paquetes_pagos_ppg (ppg_ficha_pago,ppg_ficha_venta,ppg_monto,ppg_descuento,ppg_total,ppg_fecha_registro,ppg_concepto,ppg_usuario_registro,ppg_adeudo,ppg_id_sucursal) VALUES (?,?,?,?,?,?,?,?,?,?) ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg['ppg_ficha_pago']);
            $pps->bindValue(2, $ppg['ppg_ficha_venta']);
            $pps->bindValue(3, $ppg['ppg_monto']);
            $pps->bindValue(4, $ppg['ppg_descuento']);
            $pps->bindValue(5, $ppg['ppg_total']);
            $pps->bindValue(6, $ppg['ppg_fecha_registro']);
            $pps->bindValue(7, $ppg['ppg_concepto']);
            $pps->bindValue(8, $ppg['ppg_usuario_registro']);
            $pps->bindValue(9, $ppg['ppg_adeudo']);
            $pps->bindValue(10, $ppg['ppg_id_sucursal']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActalizarCarrito($ppg)
    {
        try {
            //code...
            $sql = "UPDATE tbl_paquetes_pagos_ppg SET ppg_monto = ?,ppg_fecha_registro = ?,ppg_concepto = ?,ppg_usuario_registro = ?,ppg_adeudo = ?,ppg_id_sucursal = ? WHERE ppg_ficha_venta = ? AND ppg_concepto = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg['ppg_monto']);
            $pps->bindValue(2, $ppg['ppg_fecha_registro']);
            $pps->bindValue(3, $ppg['ppg_concepto']);
            $pps->bindValue(4, $ppg['ppg_usuario_registro']);
            $pps->bindValue(5, $ppg['ppg_adeudo']);
            $pps->bindValue(6, $ppg['ppg_id_sucursal']);
            $pps->bindValue(7, $ppg['ppg_ficha_venta']);
            $pps->bindValue(8, $ppg['ppg_concepto']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlActualizarPagos()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlMostrarPagosAlumnos($fpg_alumno)
    {
        try {
            //code...
            $sql = "SELECT fpg.*,pqt.*,usr.* FROM tbl_ficha_pago_fpg fpg JOIN tbl_paquete_pqt pqt ON pqt.pqt_sku = fpg_paquete JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno WHERE fpg.fpg_alumno = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $fpg_alumno);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarCarritoAlumno($ppg_ficha_pago, $ppg_ficha_venta)
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_paquetes_pagos_ppg WHERE ppg_ficha_pago = ? AND ppg_ficha_venta =? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg_ficha_pago);
            $pps->bindValue(2, $ppg_ficha_venta);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarCarritoduplicado($ppg_ficha_pago, $ppg_ficha_venta, $ppg_concepto)
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_paquetes_pagos_ppg WHERE ppg_ficha_pago = ? AND ppg_ficha_venta =? AND ppg_concepto = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg_ficha_pago);
            $pps->bindValue(2, $ppg_ficha_venta);
            $pps->bindValue(3, $ppg_concepto);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAbonosAlumno($ppg_id)
    {
        try {
            //code...
            $sql = " SELECT fpg.* FROM tbl_ficha_pago_fpg fpg WHERE fpg.fpg_id = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlMostrarAbonosAlumnoConcepto($ppg_ficha_pago, $ppg_concepto)
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_paquetes_pagos_ppg  WHERE ppg_ficha_pago = ? AND ppg_concepto = ? ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg_ficha_pago);
            $pps->bindValue(2, $ppg_concepto);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlIssetReferencia($vfch_referencia)
    {
        try {
            //code...
            $sql = " SELECT * FROM tbl_ficha_venta_vfch  WHERE vfch_referencia = ?  LIMIT 1 ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vfch_referencia);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlMostrarDatosFichaPago($ppg)
    {
        try {
            //code...
            $sql = "SELECT ppg.ppg_adeudo,fpg.*  FROM tbl_paquetes_pagos_ppg ppg JOIN tbl_ficha_pago_fpg fpg ON fpg.fpg_id = ppg.ppg_ficha_pago WHERE ppg.ppg_ficha_pago = ? AND ppg.ppg_concepto = ? AND ppg.ppg_estado_pagado = 'PAGADO' AND ppg_id_sucursal = ? ORDER BY ppg.ppg_id DESC LIMIT 1 ";

            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg['ppg_ficha_pago']);
            $pps->bindValue(2, $ppg['ppg_concepto']);
            $pps->bindValue(3, $ppg['ppg_id_sucursal']);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarPagos()
    {
        try {
            //code...
            $sql = "SELECT ppg.*,pqt.pqt_nombre,usr.usr_nombre,usr.usr_matricula FROM tbl_paquetes_pagos_ppg ppg JOIN tbl_ficha_pago_fpg fpg ON fpg.fpg_id = ppg.ppg_ficha_pago JOIN tbl_paquete_pqt pqt ON pqt.pqt_sku = fpg.fpg_paquete JOIN tbl_usuarios_usr usr ON usr.usr_id = fpg.fpg_alumno WHERE ppg_estado_pagado = 'PAGADO' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarPagos()
    {
        try {
            //code...
            $sql = "";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlConsultarVentaSiguienteFicha()
    {
        try {
            //code...
            $sql = "SELECT (vfch_id+1) AS vfch_id FROM tbl_ficha_venta_vfch  ORDER BY vfch_id DESC limit 1";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEmpezarVenta($vfch)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_ficha_venta_vfch (vfch_id,vfch_fecha_registro,vfch_usuario_registro, vfch_id_sucursal) VALUES(?,?,?,?)";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vfch['vfch_id']);
            $pps->bindValue(2, $vfch['vfch_fecha_registro']);
            $pps->bindValue(3, $vfch['vfch_usuario_registro']);
            $pps->bindValue(4, $vfch['vfch_id_sucursal']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return  false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlTerminarVenta($vfch)
    {
        try {
            //...
            $sql = "UPDATE tbl_ficha_venta_vfch SET vfch_referencia = ?, vfch_monto = ?, vfch_mp = ?, vfch_sub_monto = ?, vfch_descuento = ?, vfch_fecha_pagada = ?, vfch_alumno = ?, vfch_ficha_pago = ?, vfch_estado = ? WHERE vfch_id = ?   ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $vfch['vfch_referencia']);
            $pps->bindValue(2, $vfch['vfch_monto']);
            $pps->bindValue(3, $vfch['vfch_mp']);
            $pps->bindValue(4, $vfch['vfch_sub_monto']);
            $pps->bindValue(5, $vfch['vfch_descuento']);
            $pps->bindValue(6, $vfch['vfch_fecha_pagada']);
            $pps->bindValue(7, $vfch['vfch_alumno']);
            $pps->bindValue(8, $vfch['vfch_ficha_pago']);
            $pps->bindValue(9, $vfch['vfch_estado']);
            $pps->bindValue(10, $vfch['vfch_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;

            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }

    public static function mdlCambiarEstadoAbono($ppg_estado, $ppg_ficha_venta)
    {
        try {
            //...
            $sql = "UPDATE tbl_paquetes_pagos_ppg SET ppg_estado_pagado = ? WHERE ppg_ficha_venta = ?   ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg_estado);
            $pps->bindValue(2, $ppg_ficha_venta);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;

            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }


    public static function mdlEliminarRegistroCarrito($ppg_id)
    {
        try {
            //code...
            $sql = "DELETE FROM tbl_paquetes_pagos_ppg WHERE ppg_id = ?";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ppg_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlConsultarFichas($vfch_id = "", $vfch_ficha_pago="")
    {
        try {
            //code...
            if ($vfch_ficha_pago != "" && $vfch_id == "") {
                $sql = "SELECT * FROM tbl_ficha_venta_vfch WHERE vfch_ficha_pago = ?";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $vfch_ficha_pago);
                $pps->execute();
                return $pps->fetchAll();
            }
            elseif ($vfch_id != "" && $vfch_ficha_pago== "" ) {
                $sql = "SELECT * FROM tbl_ficha_venta_vfch WHERE vfch_id = ?";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->bindValue(1, $vfch_id);
                $pps->execute();
                return $pps->fetch();
            } else {
                $sql = "SELECT * FROM tbl_ficha_venta_vfch WHERE vfch_estado = 'PAGADO'";
                $con = Conexion::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
