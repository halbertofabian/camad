
<?php

/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 16/10/2020 11:57
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class UsuariosControlador {

    public function ctrAgregarUsuarios($url_destino = "usuarios") {
        if (isset($_POST['btnGuardarUsuario'])) {

            $_POST['usr_clave'] = password_hash($_POST['usr_clave'], PASSWORD_DEFAULT);
            $_POST['usr_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['usr_fecha_registro'] = FECHA;
            $_POST['usr_id_sucursal'] = $_SESSION['session_suc']['scl_id'];

            $agregarUsuario = UsuariosModelo::mdlAgregarUsuarios($_POST);

            if ($agregarUsuario) {
                AppControlador::msj('success', 'Muy bien', 'Usuario registrado', HTTP_HOST . $url_destino);
            } else {
                AppControlador::msj('error', 'Error', 'Este usuario ya existe, asegurate de verificar el correo');
            }
        }
    }

    public function ctrAgregarUsuarios2($url_destino = "usuarios") {
        if (isset($_POST['btnGuardarUsuario'])) {


            $ruta = "";

            if (isset($_FILES["usr_firma"]["tmp_name"])) {

                list($ancho, $alto) = getimagesize($_FILES["usr_firma"]["tmp_name"]);

                $nuevoAncho = 200;
                $nuevoAlto = 200;

                /* =============================================
                  CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL Producto
                  ============================================= */
                $fileimg = md5($_POST["usr_matricula"]);

                $directorio = "app/upload/firmas_digitales";

                if (!file_exists($directorio))
                    mkdir($directorio, 0777);

                /* =============================================
                  DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                  ============================================= */

                if ($_FILES["usr_firma"]["type"] == "image/jpeg") {

                    /* =============================================
                      GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                      ============================================= */

                    //$aleatorio = mt_rand(100, 999);

                    $ruta = $directorio . '/' . $_POST['usr_matricula'] . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["usr_firma"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["usr_firma"]["type"] == "image/png") {






                    /* =============================================
                      GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                      ============================================= */

                    $ruta = $directorio . '/' . $_POST['usr_matricula'] . ".png";

                    $origen = imagecreatefrompng($_FILES["usr_firma"]["tmp_name"]);


                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    // Linea nueva
                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));
                    //

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }


            $_POST['usr_firma'] = $ruta;
            $_POST['usr_clave'] = password_hash($_POST['usr_clave'], PASSWORD_DEFAULT);
            $_POST['usr_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['usr_fecha_registro'] = FECHA;
            $_POST['usr_id_sucursal'] = $_SESSION['session_suc']['scl_id'];

            $agregarUsuario = UsuariosModelo::mdlAgregarUsuarios2($_POST);

            if ($agregarUsuario) {
                AppControlador::msj('success', 'Muy bien', 'Usuario registrado', HTTP_HOST . $url_destino);
            } else {
                AppControlador::msj('error', 'Error', 'Este usuario ya existe, asegurate de verificar el correo');
            }
        }
    }

    public static function ctrAgregarUsuariosAjax() {
        if (isset($_POST['btnGuardarUsuario'])) {


            $usr_id_sucursal = SucursalesModelo::mdlMostrarSucursales($_POST['usr_id_sucursal']);

            $_POST['usr_matricula'] = UsuariosControlador::ctrConsultarSiguienteUsuario($usr_id_sucursal['scl_sub_fijo']);




            $_POST['usr_clave'] = "";
            $_POST['usr_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['usr_fecha_registro'] = FECHA;

            $agregarUsuario = UsuariosModelo::mdlAgregarUsuarios($_POST);

            if ($agregarUsuario) {
                return array(
                    'status' => true,
                    'mensaje' => 'Alumno registrado con éxito'
                );
                // AppControlador::msj('success', 'Muy bien', 'Usuario registrado', HTTP_HOST . $url_destino);
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Se produjo un error, inetente de nuevo.'
                );
                // AppControlador::msj('error', 'Error', 'Este usuario ya existe, asegurate de verificar el correo');
            }
        }
    }

    public function ctrActualizarUsuarios($url_destino = "usuarios") {
        if (isset($_POST['btnActualizarUsuario'])) {

            if ($_POST['usr_clave'] == "") {
                $_POST['usr_clave'] = $_POST['usr_clave_hidden'];
            } else {
                $_POST['usr_clave'] = password_hash($_POST['usr_clave'], PASSWORD_DEFAULT);
            }

            $actualizarUsuario = UsuariosModelo::mdlActualizarUsuarios($_POST);



            if ($actualizarUsuario) {
                AppControlador::msj('success', 'Muy bien', 'Usuario actualizado', HTTP_HOST . $url_destino);
            } else {
                // AppControlador::msj('error', 'Error', 'Este usuario ya existe, asegurate de verificar el correo');
            }
        }
    }

    public function ctrActualizarUsuarios2($url_destino = "usuarios") {
        if (isset($_POST['btnActualizarUsuario'])) {



            $ruta = $_POST['usr_firma_hidden'];

            if (isset($_FILES["usr_firma"]["tmp_name"]) && $_FILES["usr_firma"]["tmp_name"] != "") {

                list($ancho, $alto) = getimagesize($_FILES["usr_firma"]["tmp_name"]);

                $nuevoAncho = 200;
                $nuevoAlto = 200;

                /* =============================================
                  CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL Producto
                  ============================================= */
                $fileimg = md5(uniqid());

                $directorio = "app/upload/firmas_digitales/" . $fileimg;

                if (!file_exists($directorio))
                    mkdir($directorio, 0777);

                /* =============================================
                  DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                  ============================================= */

                if ($_FILES["usr_firma"]["type"] == "image/jpeg") {

                    /* =============================================
                      GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                      ============================================= */

                    //$aleatorio = mt_rand(100, 999);

                    $ruta = $directorio . '/' . $_POST['usr_matricula'] . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["usr_firma"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["usr_firma"]["type"] == "image/png") {
                    /* =============================================
                      GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                      ============================================= */

                    $ruta = $directorio . '/' . $_POST['usr_matricula'] . ".png";


                    $origen = imagecreatefrompng($_FILES["usr_firma"]["tmp_name"]);


                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    // Linea nueva
                    imagefill($destino, 0, 0, imagecolorallocate($destino, 255, 255, 255));
                    //

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }

            var_dump($ruta);



            $_POST['usr_firma'] = $ruta;
            if ($_POST['usr_clave'] == "") {
                $_POST['usr_clave'] = $_POST['usr_clave_hidden'];
            } else {
                $_POST['usr_clave'] = password_hash($_POST['usr_clave'], PASSWORD_DEFAULT);
            }

            $actualizarUsuario = UsuariosModelo::mdlActualizarUsuarios2($_POST);



            if ($actualizarUsuario) {
                AppControlador::msj('success', 'Muy bien', 'Usuario actualizado', HTTP_HOST . $url_destino);
            } else {
                // AppControlador::msj('error', 'Error', 'Este usuario ya existe, asegurate de verificar el correo');
            }
        }
    }

    public function ctrMostrarUsuarios($usr_correo) {
        
    }

    public static function ctrEliminarUsuario($usr_id) {

        $eliminarUsuario = UsuariosModelo::mdlEliminarUsuarios($usr_id);



        // if ($eliminarUsuario) {
        //     AppControlador::msj('success', 'Muy bien', 'Venta eliminada con éxito', './listar-ventas');
        // } else {
        //     AppControlador::msj('error', 'Error', 'Venta no eliminada, vuelve a intentarlo', './listar-ventas');
        // }
        if ($eliminarUsuario) {
            return array(
                'status' => true,
                'mensaje' => 'Usuario eliminado con éxito',
                'pagina' => 'alumnos'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error, parece que este alumno esta relacionado con una inscripción, primero elimina su relación e intentalo de nuevo',
                'pagina' => 'alumnos'
            );
        }
    }

    public static function ctrImportarProductosExcel() {
        try {



            //$nombreArchivo = $_SERVER['DOCUMENT_ROOT'] . '/dupont/exportxlsx/tbl_productos_dupont.xls';

            $nombreArchivo = $_FILES['archivoExcel']['tmp_name'];




            //var_dump($nombreArchivo);
            // Cargar hoja de calculo
            $leerExcel = PHPExcel_IOFactory::createReaderForFile($nombreArchivo);

            $objPHPExcel = $leerExcel->load($nombreArchivo);

            //var_dump($objPHPExcel);

            $objPHPExcel->setActiveSheetIndex(0);

            $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
            $countInsert = 0;
            $countUpdate = 0;
            //echo "NumRows => ",$objPHPExcel->getActiveSheet()->getCell('B' . 2)->getCalculatedValue();

            for ($i = 2; $i <= $numRows; $i++) {


                $usr_id = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                $usr_matricula = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                $usr_nombre = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                $usr_app = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                $usr_apm = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                $usr_telefono = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                $usr_correo = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                $usr_calle = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                $usr_ne = $objPHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
                $usr_ni = $objPHPExcel->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
                $usr_cp = $objPHPExcel->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
                $usr_colonia = $objPHPExcel->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
                $usr_estado = $objPHPExcel->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();
                $usr_municipio = $objPHPExcel->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();


                $data = array(
                    "usr_id" => $usr_id,
                    "usr_matricula" => strtoupper($usr_matricula),
                    "usr_nombre" => $usr_nombre,
                    "usr_app" => $usr_app,
                    "usr_apm" => $usr_apm,
                    "usr_telefono" => $usr_telefono,
                    "usr_correo" => $usr_correo,
                    "usr_calle" => $usr_calle,
                    "usr_ne" => $usr_ne,
                    "usr_ni" => $usr_ni,
                    "usr_cp" => $usr_cp,
                    "usr_colonia" => $usr_colonia,
                    "usr_estado" => $usr_estado,
                    "usr_municipio" => $usr_municipio,
                    "usr_clave" => '',
                    "usr_rol" => 'Alumno',
                    "usr_usuario_registro" => $_SESSION['session_usr']['usr_nombre'],
                    "usr_fecha_registro" => FECHA,
                    "usr_id_sucursal" => SUCURSAL_ID,
                );

                //var_dump($data);

                if (UsuariosModelo::mdlAgregarUsuarios($data)) {
                    $countInsert += 1;
                } else {
                    if (UsuariosModelo::mdlActualizarUsuarios($data)) {
                        $countUpdate += 1;
                    }
                }
            }

            return array(
                'status' => true,
                'mensaje' => "Carga de alumnos con éxito",
                'insert' => $countInsert,
                'update' => $countUpdate
            );
        } catch (Exception $th) {
            $th->getMessage();
            return array(
                'status' => false,
                'mensaje' => "No se encuentra el archivo solicitado, por favor carga el archivo correcto",
                'insert' => "",
                'update' => ""
            );
        }
    }

    public static function ctrActivarUsuarioViaEmail() {
        if (isset($_POST['btnActivarUsuario'])) {
            // Solicitar Activacion y generar Token 

            if ($_POST['usr_correo'] == "") {
                return array(
                    'status' => false,
                    'mensaje' => 'Asegurate de que este usuario tenga un correo asignado'
                );
            }

            $_POST['usr_token'] = md5(uniqid());

            $solicitudActivacion = UsuariosModelo::mdlActivarUsuarioViaEmail($_POST);

            $datos = array(
                'usr_nombre' => $_POST['usr_nombre'],
                'usr_correo' => $_POST['usr_correo'],
                'url_verificacion' => HTTP_HOST . 'auth/verification/?token=' . $_POST['usr_token'],
                'soporte_correo' => 'soporte@camad.edu.mx',
            );

            // Enviar token por email 

            $senEmail = ConfiguracionControlador::ctrEnviarCorreoVerificacion($datos);

            if ($senEmail) {
                return array(
                    'status' => true,
                    'mensaje' => 'Revisa la bandeja de entrada de tu correo para verificar tu cuenta.'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Correo no enviando, ponte en contácto con soporte'
                );
            }
        }
    }

    public function ctrRecuprarClaveUsuarioViaEmail() {
        if (isset($_POST['btnRecuperarClave'])) {
            // Solicitar Activacion y generar Token 

            if ($_POST['usr_correo'] == "") {

                echo '<script>
                        toastr.error("Asegurate de que este usuario tenga un correo asignado", "Error")
                    </script>';
                return;
            }

            $consultarEmail = UsuariosModelo::mdlMostrarUsuariosEmail($_POST['usr_correo']);



            if (!$consultarEmail) {
                echo '<script>
                toastr.error("Este correo no se encuentra registrado en la base de datos, asegurate de introducir el correcto", "Error")
                    </script>';
                return;
            }

            $_POST['usr_token'] = md5(uniqid());

            $solicitudRecuperarClave = UsuariosModelo::mdlRecuprarClaveUsuarioViaEmail($_POST);

            $datos = array(
                'usr_nombre' => $consultarEmail['usr_nombre'],
                'usr_correo' => $_POST['usr_correo'],
                'url_verificacion' => HTTP_HOST . 'cambiar-contrasena/token/' . $_POST['usr_token'],
                'soporte_correo' => 'soporte@camad.edu.mx',
            );

            // Enviar token por email 

            $senEmail = ConfiguracionControlador::ctrEnviarCorreoCambiarClave($datos);

            if ($senEmail) {
                // return array(
                //     'status' => true,
                //     'mensaje' => ''
                // );
                AppControlador::msj('success', '¡Muy bien!', 'Se ha enviado un correo electrónico para restablecer la contraseña. Léelo para obtener más instrucciones.', HTTP_HOST);
            } else {
                echo '<script>
                toastr.error("Correo no enviando, ponte en contácto con soporte", "Error")
                    </script>';
                return;
            }
        }
    }

    public function ctrCambiarClaveAlumno() {

        if (isset($_POST['btnCambiarContrasena'])) {

            if ($_POST['usr_clave'] != $_POST['usr_clave_r']) {
                echo '<script>
                         toastr.error("Las contraseñas no coinciden, intenta de nuevo.", "Error")
                    </script>';
                return;
            }

            $_POST['usr_clave'] = password_hash($_POST['usr_clave'], PASSWORD_DEFAULT);

            $cambiarClave = UsuariosModelo::mdlCambiarClave($_POST);

            if ($cambiarClave) {
                AppControlador::msj('success', 'Muy bien', 'Contraseña cambiada, inicie sesión', HTTP_HOST);
            } else {
                echo '<script>
                         toastr.error("Intenta de nuevo", "Error")
                    </script>';
            }
        }
    }

    public static function ctrConsultarSiguienteUsuario($sub_fijo = SUB_FIJO) {
        $usr_id = UsuariosModelo::mdlConsultarUltimoUsuario();
        $usr_id['usr_id'] = $usr_id['usr_id'] + 1;
        $usr_id['usr_id'] = strlen($usr_id['usr_id']) == 0 ? "0001" : $usr_id['usr_id'];
        $usr_id['usr_id'] = strlen($usr_id['usr_id']) == 1 ? "000" . $usr_id['usr_id'] : $usr_id['usr_id'];
        $usr_id['usr_id'] = strlen($usr_id['usr_id']) == 2 ? "00" . $usr_id['usr_id'] : $usr_id['usr_id'];
        $usr_id['usr_id'] = strlen($usr_id['usr_id']) == 3 ? "0" . $usr_id['usr_id'] : $usr_id['usr_id'];
        return $sub_fijo . $usr_id['usr_id'];
    }

    public function ctrSubirArchivos() {
        if (isset($_POST['btnSubirArchivos'])) {
            $mensajes = "";
            $directorio = "app/upload/archivos_alumnos/" . $_SESSION['session_usr']['usr_matricula'];
            if (!file_exists($directorio)) {
                mkdir($directorio, 0777);
            }
            //CURP
            if (!file_exists($directorio . '/CURP.pdf')) {
                if (move_uploaded_file($_FILES['archivoCURP']['tmp_name'], $directorio . '/' . 'CURP.pdf')) {
                    echo '<script>toastr.success("La CURP se subió correctamente.", "Muy Bien!")</script>';
                } else {
                    echo '<script>toastr.warning("La CURP aún no se sube.", "Alerta!")</script>';
                }
            } else {
                if(!empty($_FILES['archivoCURP']['tmp_name'])){
                    $mensajes .= "La CURP ya exite en el directorio. <br>";
                }
//                echo '<script>toastr.info("La CURP ya exite en el directorio.", "Archivo Existente!")</script>';
            }
            //INE
            if (!file_exists($directorio . '/INE.pdf')) {
                if (move_uploaded_file($_FILES['archivoINE']['tmp_name'], $directorio . '/' . 'INE.pdf')) {
                    echo '<script>toastr.success("El INE se subió correctamente.", "Muy Bien!")</script>';
                } else {
                    echo '<script>toastr.warning("El INE aún no se sube.", "Alerta!")</script>';
                }
            } else {
                if(!empty($_FILES['archivoINE']['tmp_name'])){
                    $mensajes .= "El INE ya exite en el directorio.<br>";
                }
            }
            //ACTA DE NACIMIENTO
            if (!file_exists($directorio . '/ACTA_DE_NACIMIENTO.pdf')) {
                if (move_uploaded_file($_FILES['archivoACTA']['tmp_name'], $directorio . '/' . 'ACTA_DE_NACIMIENTO.pdf')) {
                    echo '<script>toastr.success("La ACTA DE NACIMIENTO se subió correctamente.", "Muy Bien!")</script>';
                } else {
                    echo '<script>toastr.warning("La ACTA DE NACIMIENTO aún no se sube.", "Alerta!")</script>';
                }
            } else {
                if(!empty($_FILES['archivoACTA']['tmp_name'])){
                   $mensajes .= "La ACTA DE NACIMIENTO ya exite en el directorio.<br>";
                }
            }
            //CETIFICADO DE SECUNDARIA
            if (!file_exists($directorio . '/CERTIFICADO_DE_SECUNDARIA.pdf')) {
                if (move_uploaded_file($_FILES['archivoCERTIFICADO']['tmp_name'], $directorio . '/' . 'CERTIFICADO_DE_SECUNDARIA.pdf')) {
                    echo '<script>toastr.success("El CERTIFICADO se subió correctamente.", "Muy Bien!")</script>';
                } else {
                    echo '<script>toastr.warning("El CERTIFICADO aún no se sube.", "Alerta!")</script>';
                }
            } else {
                if(!empty($_FILES['archivoCERTIFICADO']['tmp_name'])){
                    $mensajes .= "El CERTIFICADO ya exite en el directorio.<br>";
                }
            }
            if(!empty($mensajes)){
                echo '<script>toastr.info("'.$mensajes.'", "Archivo Existente!")</script>';
            }
        }
    }

}
