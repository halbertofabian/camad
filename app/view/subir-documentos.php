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
                                                    <input type="hidden" name="matricula" id="matricula" value="<?= $_SESSION['session_usr']['usr_matricula'] ?>">
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

