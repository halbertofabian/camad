
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 20/10/2020 21:52
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class ProductosControlador
{
    public function ctrAgregarProductos()
    {
        if (isset($_POST['btnAgregarProductos'])) {
            $_POST['pds_etiquetas'] = "GYM";
            $_POST['pds_precio_especial'] = 0.00;
            $_POST['pds_fecha_creacion'] = FECHA;
            $_POST['pds_fecha_modificacion'] = "0000-00-00 00:00:00";
            $_POST['pds_usaurio_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['pds_usuario_modifico'] = "";
            $_POST['pds_imagenes'] = "";
            $_POST['pds_estado'] = 'Activo';
            $_POST['pds_stok_max'] = 0;
            $_POST['pds_sucursal_id'] = SUCURSAL_ID;
            $_POST['pds_suscriptor_id'] = CLIENTE_ID;

            // Validaciones 

            $ctg_text = "";
            if (isset($_POST['pds_categoria'])) {
                for ($i = 0; $i < sizeof($_POST['pds_categoria']); $i++) {
                    $ctg_text .=  $_POST['pds_categoria'][$i] . ',';
                }
                $ctg_text = substr($ctg_text, 0, -1);
            }
            $_POST['pds_categoria'] = $ctg_text;

            if (empty($_POST['pds_stok_min'])) {
                $_POST['pds_stok_min'] = 0.00;
            }
            if (empty($_POST['pds_precio_mayoreo'])) {
                $_POST['pds_precio_mayoreo'] = 0.00;
            }
            if (empty($_POST['pds_precio_mayoreo'])) {
                $_POST['pds_precio_mayoreo'] = 0.00;
            }
            if (empty($_POST['pds_precio_promocion'])) {
                $_POST['pds_precio_promocion'] = 0.00;
            }

            if (empty($_POST['pds_fecha_inicio_promocion'])) {
                $_POST['pds_fecha_inicio_promocion'] = "0000-00-00 00:00:00";
            }
            if (empty($_POST['pds_fecha_fin_promocion'])) {
                $_POST['pds_fecha_fin_promocion'] = "0000-00-00 00:00:00";
            }

            $agregarProductos = ProductosModelo::mdlAgregarProductos($_POST);

            // preArray($agregarProductos);
            // return;
            if ($agregarProductos) {
                AppControlador::msj('success', 'Muy bien', 'Producto registrado con éxito', HTTP_HOST . 'productos/new');
            } else {
                AppControlador::msj('error', 'Error', 'Ocurrio un error, inetnte de nuevo, es probable que este producto ya exista, verifique e intente de nuevo');
            }
        }
    }
    public function ctrActualizarProductos()
    {
    }
    public function ctrMostrarProductos()
    {
    }
    public function ctrEliminarProductos()
    {
    }
}
