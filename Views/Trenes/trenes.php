<?php require_once('../html/head2.php') ?>




<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Trenes</h5>

                <div class="table-responsive">
                    <button type="button" onclick="cargaTrenes()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_trenes">
                        Nuevo Tren
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Modelo</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Capacidad_pasajeros</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Fecha_fabricacion</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Estacion</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_trenes">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_trenes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="form_tren">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Trenes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="	ID_tren" id="ID_tren">                  
                    <div class="form-group">
                        <label for="Marca">Marca de Tren</label>
                        <input type="text" required class="form-control" id="Marca" name="Marca" placeholder="Ingrese la marca del tren">
                    </div>
                    <div class="form-group">
                        <label for="Capacidad_pasajeros">Capacidad de pasajeros</label>
                        <input type="text" required class="form-control" id="Capacidad_pasajeros" name="Capacidad_pasajeros" placeholder="Ingrese la capacidad de personas del tren">
                    </div>
                    <div class="form-group">
                        <label for="Fecha_fabricacion">Fecha_fabricacion</label>
                        <input type="date" required class="form-control" id="Fecha_fabricacion" name="Fecha_fabricacion" placeholder="Ingrese la fecha de fabricacion del tren">
                    </div>
                    <div class="form-group">
                        <label for="ID_estacion">Estacion</label>
                      <select name="ID_estacion" id="ID_estacion" class="form-control">
                        <option value="0">Seleccione la Estacion</option>
                      </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="trenes.js"></script>