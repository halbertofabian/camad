
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/01/2021 19:49
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class CajasControlador
{
    public function ctrAgregarCajas()
    {
        if (isset($_POST['btnRegistrarCaja'])) {
            $_POST['cja_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['cja_fecha_registro'] = FECHA;
            $_POST['cja_uso'] = 0;

            $agregarCaja = CajasModelo::mdlAgregarCajas($_POST);



            if ($agregarCaja) {
                AppControlador::msj('success', '¡Muy bien!', 'Caja registrada', HTTP_HOST . 'cajas');
            } else {
                AppControlador::msj('error', '¡Error!', 'No se pudo registrar la caja, intenta de nuevo');
            }
        }
    }
    public function ctrActualizarCajas()
    {
    }
    public function ctrMostrarCajas()
    {
    }
    public function ctrEliminarCajas()
    {
    }

    public  function ctrAbrirCaja()
    {
        if (isset($_POST['btnAbrirCaja'])) {

            $_POST['copn_usuario_abrio'] = $_SESSION['session_usr']['usr_id'];
            $_POST['copn_fecha_abrio'] = FECHA;
            $_POST['copn_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            $_POST['copn_ingreso_inicio'] = str_replace(",", "", $_POST['copn_ingreso_inicio']);

            $abrirCaja = CajasModelo::mdlAbrirCaja($_POST);

            if ($abrirCaja) {

                $ultimaCajaAbierta = CajasModelo::mdlConsultarUltimaCajaAbierta(
                    array(
                        'copn_usuario_abrio' => $_SESSION['session_usr']['usr_id'],
                        'copn_id_caja' => $_POST['copn_id_caja'],
                        'copn_id_sucursal' => $_SESSION['session_suc']['scl_id']
                    )
                );

                $asignarCajaUsuario = UsuariosModelo::mdlActualizarCajaUsuario($_SESSION['session_usr']['usr_id'], $ultimaCajaAbierta['copn_id']);

                if ($asignarCajaUsuario) {
                    CajasModelo::mdlActualizarDisponibilidadCaja(1, $_POST['copn_id_caja'], $ultimaCajaAbierta['copn_id']);
                    $_SESSION['session_usr']['usr_caja'] =  $ultimaCajaAbierta['copn_id'];
                } else {
                }

                preArray($ultimaCajaAbierta);
            }
        }
    }

    public static function ctrCerrarCaja()
    {

        if (isset($_POST['btnCerrarCaja'])) {

            $crt_id = $_SESSION['session_usr']['usr_caja'];
            $montos = array(
                'monto_fichas_e' => CortesModelo::mdlConsultarMontoFichasPEByCorte($crt_id),
                'monto_fichas_b' => CortesModelo::mdlConsultarMontoFichasPBByCorte($crt_id),
                'monto_ingresos_e' => CortesModelo::mdlConsultarMontoIngresosPEByCorte($crt_id),
                'monto_ingresos_b' => CortesModelo::mdlConsultarMontoIngresosPBByCorte($crt_id),
                'monto_gastos_e' => CortesModelo::mdlConsultarMontoGastosPEByCorte($crt_id),
                'monto_gastos_b' => CortesModelo::mdlConsultarMontoGastosPBByCorte($crt_id),
            );



            $monto_e = $montos['monto_fichas_e']['monto_total'] + $montos['monto_ingresos_e']['monto_total'];

            $monto_g_e = $montos['monto_gastos_e']['monto_total'];

            $monto_b = $montos['monto_fichas_b']['monto_total'] + $montos['monto_ingresos_b']['monto_total'];

            $monto_g_b = $montos['monto_gastos_b']['monto_total'];

            $totalEfectivo = $monto_e - $monto_g_e;
            $totalBanco = $monto_b - $monto_g_b;

            $_POST['copn_ingreso_efectivo'] = str_replace(",", "", $_POST['copn_ingreso_efectivo']);
            $_POST['copn_ingreso_banco'] = str_replace(",", "", $_POST['copn_ingreso_banco']);


            preArray($_POST);

            // var_dump($totalEfectivo);
            // echo "<br>";
            // var_dump($totalBanco);
        }
    }
}
