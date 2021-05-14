<div class="containeir">
    <form id="formInforme_3" method="post">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ppg_fecha_registro_inicio">Fecha inicio</label>
                            <input type="date" name="ppg_fecha_registro_inicio" id="ppg_fecha_registro_inicio" class="form-control theDate">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ppg_fecha_registro_fin">Fecha fin</label>
                            <input type="date" name="ppg_fecha_registro_fin" id="ppg_fecha_registro_fin" class="form-control theDate">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="ppg_concepto">Concepto</label>

                            <select class="form-control" name="ppg_concepto" id="ppg_concepto">
                                <option value="">Todos los conceptos</option>
                                <option value="PPG_INSCRIPCION">Inscripción</option>
                                <option value="PPG_GUIA">Guía</option>
                                <option value="PPG_EXAMEN">Exámen</option>
                                <option value="PPG_INCORPORACION">Incorporación</option>
                                <option value="PPG_CERTIFICADO">Certificado</option>
                                <option value="PPG_SEMANAL">Semanal</option>
                            </select>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="usr_id_sucursal">Plantel</label>
                            <select class="form-control" name="usr_id_sucursal" id="usr_id_sucursal">
                                <option value="<?= $_SESSION['session_suc']['scl_id'] ?>"><?= $_SESSION['session_suc']['scl_nombre'] ?></option>
                                <?php foreach (SucursalesModelo::mdlMostrarSucursales() as $scl) : ?>
                                    <option value="<?= $scl['scl_id'] ?>"><?= $scl['scl_nombre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-load float-right">Filtrar</button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>
    <div class="card" style="overflow-y: scroll; height:400px;">
        <div class="card-body">
            <div class="row">
                <div class="col table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th># Movimiento</th>
                                <th># Ficha</th>
                                <th>Concepto</th>
                                <th>Total</th>
                                <th>Metodo de pago</th>
                                <th>Ref</th>
                                <th>Fecha registro</th>
                                <th>Usuario registro</th>
                            </tr>
                        </thead>
                        <tbody id="tbodyInforme_3">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-dark" role="alert">
                        SUMA TOTAL EFECTIVO: $ <strong id="ifs_3_efectivo"></strong>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="alert alert-dark" role="alert">
                        SUMA TOTAL BANCO: $ <strong id="ifs_3_banco"></strong>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="alert alert-dark" role="alert">
                        TOTAL: $ <strong id="ifs_3_total"></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>