<?php
if (isset($rutas[1]) && $rutas[1] != "" && $rutas[1] == "subir-documentos") :
    cargarComponente('breadcrumb_nivel_1', '', 'Subir documentos #' . $rutas[2], array(['ruta' => 'documentos', 'label' => 'Listar documentos']));
    ?>
    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Archivos necesarios</h5>
                        <ul>
                            <li>CURP</li>
                            <li>INE</li>
                            <li>ACTA DE NACIMIENTO</li>
                            <li>CERTIFICADO DE SECUNDARIA</li>
                        </ul>
                        <div class="row">
                            <div class="col mb-3">
                                <form id="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="archivoCURP">CURP</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-cloud-upload"></i></span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="hidden" name="matricula" id="matricula" value="<?= $rutas[2] ?>">
                                                        <input type="file" class="custom-file-input" accept=".pdf" id="archivoCURP" name="archivoCURP">
                                                        <label class="custom-file-label" for="archivoCURP">Seleccionar curp</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="archivoINE">INE</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-cloud-upload"></i></span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" accept=".pdf" id="archivoINE" name="archivoINE">
                                                        <label class="custom-file-label" for="archivoINE">Seleccionar INE</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="archivoACTA">ACTA DE NACIMIENTO</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-cloud-upload"></i></span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" accept=".pdf" id="archivoACTA" name="archivoACTA">
                                                        <label class="custom-file-label" for="archivoACTA">Seleccionar acta de nacimiento</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="archivoCERTIFICADO">CERTIFICADO DE SECUNDARIA</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-cloud-upload"></i></span>
                                                    </div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" accept=".pdf" id="archivoCERTIFICADO" name="archivoCERTIFICADO">
                                                        <label class="custom-file-label" for="archivoCERTIFICADO">Seleccionar certificado</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-primary" id="btnSubirArchivos" name="btnSubirArchivos">Subir Archivos</button>
                                        </div>
                                    </div>
                                    <?php
                                    $subirArchivos = new UsuariosControlador();
                                    $subirArchivos->ctrSubirArchivos();
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
else :
    $directorios = obtener_directorios(DOCUMENT_ROOT . 'app/upload/archivos_alumnos/');

    if (!isset($_GET['file'])) :
        ?>
        <div class="row contenedor-carpetas">
            <?php foreach ($directorios as $folder) : ?>
                <div class="col-md-2">
                    <a href="<?= HTTP_HOST . 'index.php?ruta=documentos&file=' . $folder . '&v=false' ?>">
                        <img src="https://www.goodfreephotos.com/albums/vector-images/blue-folder-vector-clipart.png" width="100%" class="img-responsive">
                        <p class="text-center"><?= $folder ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    else :
        cargarComponente('breadcrumb_nivel_1', '', $_GET['file'], array(['ruta' => 'documentos', 'label' => 'Documentos']));
        $files = obtener_files(DOCUMENT_ROOT . 'app/upload/archivos_alumnos/' . $_GET['file'] . '');
        ?>
        <div class="row">

            <div class="col-md-4">
                <div class="row">
                    <?php foreach ($files as $file) : ?>
                        <div class="col-md-4 mb-3">

                            <a href="<?= HTTP_HOST . 'index.php?ruta=documentos&file=' . $_GET['file'] . '&v=true&archivo=' . $file ?>">
                                <img src="https://www.roshfrans.com/img/iconosArchivos/pdf.png" width="100%" class="img-responsive text-center">
                                <pre><?= $file ?></pre>
                            </a>

                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="<?= HTTP_HOST . 'documentos/subir-documentos/' . $_GET['file'] ?>" class="btn btn-primary"><i class="fa fa-upload"></i> Subir archivos</a>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">

                        <?php if ($_GET['v'] == "true") :
                            ?>

                            <iframe src="<?= HTTP_HOST . 'app/upload/archivos_alumnos/' . $_GET['file'] . '/' . $_GET['archivo'] ?>" frameborder="0" width="100%" height="500px" ></iframe>

                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

    <?php
    endif;
endif;
?>