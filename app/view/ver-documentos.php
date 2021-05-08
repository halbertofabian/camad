<?php
$files = obtener_files(DOCUMENT_ROOT . 'app/upload/archivos_alumnos/' . $_SESSION['session_usr']['usr_matricula'] . '');
?>
<div class="container-fluid">
    <?php if (empty($files)): ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-dark p-5 text-center">
                    <h1 class="text-primary mb-3">Aún no tienes documentos cargados</h1>
                    <a href="<?= HTTP_HOST . 'alumno/' . $_SESSION['session_usr']['usr_id'] . '/subir-documentos' ?>" class="btn btn-primary"><i class="fa fa-upload"></i> Subir archivos</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <?php foreach ($files as $file) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="<?= HTTP_HOST . 'index.php?ruta=alumno&file=' . $_SESSION['session_usr']['usr_matricula'] . '&v=true&archivo=' . $file ?>">
                                    <img src="https://www.roshfrans.com/img/iconosArchivos/pdf.png" width="100%" class="img-responsive text-center">
                                </a>
                                <div class="card-body">
                                    <p class="card-title text-center" style="width: 100%;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?= $file ?></p>
                                    <p class="card-text text-center"><button type="button" class="btn btn-danger btnEliminarArchivo" name="btnEliminarArchivo" file="<?= $file ?>" data-toggle="tooltip" data-placement="top" title="Eliminar archivo"><i class="fa fa-trash"></i></button></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">
                        <?php if ($_GET['v'] == "true") :
                            ?>
                            <iframe src="<?= HTTP_HOST . 'app/upload/archivos_alumnos/' . $_SESSION['session_usr']['usr_matricula'] . '/' . $_GET['archivo'] ?>" frameborder="0" width="100%" height="500px" ></iframe>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

