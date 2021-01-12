<?php cargarComponente('breadcrumb', '', 'Gestión de caja'); ?>
<div class="container">

    <div class="row">
        <div class="col-md-4 col-12">
            <form method="post">
                <div class="row">
                    <div class="form-group col-12">
                        <label for="cja_nombre">Nombre de la caja </label>
                        <input type="text" name="cja_nombre" id="cja_nombre" class="form-control" placeholder="">
                    </div>

                    <div class="form-group col-12">
                        <label for="cja_id_sucursal">Sucursal a la que se le asignará está caja</label>
                        <select class="form-control" name="cja_id_sucursal" id="cja_id_sucursal">
                            <option value="<?php echo $_SESSION['session_suc']['scl_id'] ?>"><?php echo $_SESSION['session_suc']['scl_nombre'] ?></option>
                            <?php
                            $sucursal = SucursalesModelo::mdlMostrarSucursales();
                            foreach ($sucursal as $key => $scl) :
                            ?>
                                <option value="<?php echo $scl['scl_id']  ?>"><?php echo $scl['scl_nombre']  ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary float-right" name="btnRegistrarCaja"> Registrar caja </button>
                    </div>
                </div>
                <?php
                $caja = new CajasControlador();
                $caja->ctrAgregarCajas();
                ?>
            </form>
        </div>

        <div class="col-md-8 col-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lista de cajas</h4>

                            <hr>
                            <div class="row ">
                                <div class="col-md-4">
                                    <P> <strong class="text-primary"> CAJA #1 </strong> </P>
                                    <span>Usuario registro</span> <br>
                                    <span>Fecha registro</span>
                                </div>
                                <div class="col-8">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Estado</th>
                                                <th>Usuario</th>
                                                <th>Fecha abrio</th>
                                                <th>Fecha cerro</th>
                                                <th>Acceso</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>