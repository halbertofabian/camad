<?php




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
<?php else :
    cargarComponente('breadcrumb_nivel_1', '', $_GET['file'], array(['ruta' => 'documentos', 'label' => 'Documentos']));
    $files = obtener_files(DOCUMENT_ROOT . 'app/upload/archivos_alumnos/' . $_GET['file'] . '');

?>
    <div class="row">

        <div class="col-md-4">
            <div class="row">
                <?php foreach ($files as $file) : ?>
                    <div class="col-md-4">
                    
                        <a href="<?= HTTP_HOST . 'index.php?ruta=documentos&file=' . $_GET['file'] . '&v=true&archivo='.$file ?>">
                            <img src="https://www.roshfrans.com/img/iconosArchivos/pdf.png" width="100%" class="img-responsive text-center">
                            <pre><?= $file ?></pre>
                        </a>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-8">
            <div class="row">
                <div class="col-12">

                    <?php if ($_GET['v'] == "true") : 
                       
                    ?>

                        <iframe src="<?= HTTP_HOST . 'app/upload/archivos_alumnos/' . $_GET['file'] . '/'.$_GET['archivo'] ?>" frameborder="0" width="100%" height="500px" ></iframe>

                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

<?php endif; ?>