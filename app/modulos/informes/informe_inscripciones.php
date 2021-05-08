<div class="row">

    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <form method="post" id="formInforme_2">

                    <div class="row">
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="fpg_fecha_registro_inicio">Fecha inicio</label>
                                <input type="date" name="fpg_fecha_registro_inicio" id="fpg_fecha_registro_inicio" required class="form-control theDate">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="fpg_fecha_registro_fin">Fecha fin</label>
                                <input type="date" name="fpg_fecha_registro_fin" id="fpg_fecha_registro_fin" required class="form-control theDate">
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label for="ppg_id_sucursal">Sucursal</label>
                                <select class="form-control" name="ppg_id_sucursal" id="ppg_id_sucursal">
                                    <option value="<?= $_SESSION['session_suc']['scl_id'] ?>"><?= $_SESSION['session_suc']['scl_nombre'] ?></option>
                                    <?php foreach (SucursalesModelo::mdlMostrarSucursales() as $scl) : ?>
                                        <option value="<?= $scl['scl_id'] ?>"><?= $scl['scl_nombre'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <button type="submit" class="btn btn-primary mt-2 btn-load">Filtrar</button>
                        </div>
                    </div>

                </form>
                <div class="row">
                    <div class="col-md-3">
                        <p id="text-cert"></p>
                    </div>
                    <div class="col-md-3">
                        <p id="text-total"></p>
                    </div>
                    <div class="col-md-3">
                        <a href="" id="" class="btn btn-success waves-effect waves-light d-nonebtn_export_result d-none" data-toggle="tooltip" data-placement="top" title="" data-original-title="Exportar resultados a Excel"> <i class="fa fa-file-excel-o"></i> </a>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body ">
                <div class="row">
                    <div class="col">
                        <table class="table table-responsive-lg table-striped tablaInforme2" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Mátricula</th>
                                    <th>Alumno</th>
                                    <th>Paquete</th>
                                    <th>Ficha</th>
                                    <th>Fecha de inscripción</th>
                                    <th>Usuario Registró</th>
                                    <th>Usuario Inscribió</th>
                                    <th>Total inscripción</th>
                                    <th>Adeudo inscripción</th>
                                    <th>Adeudo total</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyInforme_2">

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>