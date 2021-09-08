<div class="containeir">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tgts_fecha_registro_inicio">Fecha inicio</label>
                        <input type="date" name="tgts_fecha_registro_inicio" id="tgts_fecha_registro_inicio" class="form-control theDate">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tgts_fecha_registro_fin">Fecha fin</label>
                        <input type="date" name="tgts_fecha_registro_fin" id="tgts_fecha_registro_fin" class="form-control theDate">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="tgts_id_sucursal">Plantel</label>
                        <select class="form-control" name="tgts_id_sucursal" id="tgts_id_sucursal">
                            <option value="<?= $_SESSION['session_suc']['scl_id'] ?>"><?= $_SESSION['session_suc']['scl_nombre'] ?></option>
                            <?php foreach (SucursalesModelo::mdlMostrarSucursales() as $scl) : ?>
                                <option value="<?= $scl['scl_id'] ?>"><?= $scl['scl_nombre'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <br>
                        <button type="button" class="btn btn-primary btnFiltrarGastos">Filtrar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="card" style="overflow-y: scroll; height:400px;">
        <div class="card-body">
            <div class="row">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th># ID</th>
                                <th>Categoria</th>
                                <th>Concepto</th>
                                <th>Fecha gasto</th>
                                <th>Cantidad</th>
                                <th>Metodo de pago</th>
                                <th>Nota</th>
                                <th>Usuario registro</th>
                                <th>Sucursal</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyInforme_4">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-dark" role="alert">
                        TOTAL: $ <strong id="ifs_4_total"></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>