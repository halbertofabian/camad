<?php
class LoginControlador
{
  public static function ctrIniciarSesion()
  {
    if (isset($_POST['btnIniciarSesion'])) {

      // Limpiar cadenas
      $_POST['usr_correo'] = trim($_POST['usr_correo']);
      $_POST['usr_correo'] = strtolower($_POST['usr_correo']);

      // Validar

      // Procesar

      $usr = LoginModelo::mdlIniciarSesion($_POST['usr_correo']);

      if (!$usr  || !password_verify($_POST['usr_clave'], $usr['usr_clave'])) {
        echo '
              <script>                                                                
                toastr.error("Usuario o contraseña incorrecto, intenta de nuevo", "Error")
              </script>';
        return;
      }

      $_SESSION['session'] = true;
      $_SESSION['session_usr'] = $usr;


      if ($_SESSION['session_usr']['usr_rol'] == "Alumno") {
        $sucursal = SucursalesModelo::mdlMostrarSucursales($_SESSION['session_usr']['usr_id_sucursal']);
        $_SESSION['session_suc'] = $sucursal;
        echo
          '<script>
            window.location.href = "./bienvenido";
        </script>';
      } else {
        echo
          '<script>
            window.location.href = "./plantel";
        </script>';
      }

      // $_SESSION['session_suc'] = array(
      //   'scl_id' => "ST-5eda37ea1f6680605459bc0a773e5d3d",
      //   "scl_sub_fijo" => "ST-",
      //   "scl_nombre" => "PLANTEL TAMAULIPAS"
      // );



      // Ejecutar


    }
  }
}
