<div class="container-fluid">
    <div class="row">
        <div class="col">
            <?php
            $directorio = opendir("app/upload/archivos_alumnos/" . $_SESSION['session_usr']['usr_matricula']);
            while ($archivo = readdir($directorio)) { //obtenemos un archivo y luego otro sucesivamente
                echo $archivo . "<br />";
            }
            ?>

        </div>
    </div>
</div>

