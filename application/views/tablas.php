<div class="container">
    <!--Modal de confirmar elminacion-->
    <div class="modal fade" id="miniModalEliminar" tabindex="-1" aria-labelledby="miniModalEliminar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <?php echo form_open('Productos/eliminar') ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="miniModalEliminar">Confirmar eliminación</h5>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar este registro?</p>
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="imag" name="imag">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
    <!--Modal Restar-->
    <div class="modal fade" id="miniModalRestar" tabindex="-1" aria-labelledby="miniModalRestar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <?php echo form_open('Productos/restarProd') ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="miniModalRestar">Entregar equipos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="ident" name="ident">
                    <input type="hidden" id="can" name="can">
                    <input type="number" id="canti" min="1" name="canti" placeholder="Cantidad entregada" class="form-control input-bordes rounded">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>

    <!--Modal Sumar-->
    <div class="modal fade" id="miniModalSumar" tabindex="-1" aria-labelledby="miniModalSumar" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php echo form_open('Productos/agregarProd') ?>
                    <div class="modal-header">
                        <h5 class="modal-title" id="miniModalSumar">Agregar más equipos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="identificador" name="identificador">
                        <input type="hidden" id="suma" name="suma">
                        <div class="mb-3">
                            <input type="number" id="cant" name="cant" min="1" placeholder="Agregar cantidad" class="form-control input-bordes rounded" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

            <!-- Modal -->
            <?php echo form_open('Productos/agregar', ['enctype' => 'multipart/form-data']) ?>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar equipo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="serial" id="serial" class="form-control input-bordes rounded" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <label for="nombre"><h6>Nombre del dispositivo:</h6></label>
                        <input type="text" name="nombre" id="nombre" class="form-control input-bordes rounded" placeholder="Nombre" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <label for="marca"><h6>Marca:</h6></label>
                        <input type="text" name="marca" id="marca" class="form-control input-bordes rounded" placeholder="Marca" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <label for="descripcion"><h6>Descripción:</h6></label>
                        <input name="descripcion" id="descripcion" class="form-control" placeholder="Escribe la descripción aquí..." required></input>
                        <label for="cantidad"><h6>Cantidad:</h6></label>
                        <input type="number" name="cantidad" id="cantidad" min="0" class="form-control input-bordes rounded" placeholder="Cantidad de equipos" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <label for="tipo"><h6>Tipo:</h6></label>
                        <select name="tipo" id="tipo" class="form-control input-bordes rounded" required>
                            <option value="" disabled selected>Seleccione una opción</option>
                            <option value="Primera opción">Primera opción</option>
                            <option value="Segunda opción">Segunda opción</option>
                            <option value="Tercera opción">Tercera opción</option>
                        </select>
                        <label for="imagen"><h6>Imagen:</h6></label>
                        <!-- Campo oculto para la ruta de la imagen actual -->
                        <input type="hidden" name="imagen_actual" id="imagen_actual">
                        <!-- Campo para cargar una nueva imagen -->
                        <input type="file" name="imagen" id="imagen" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>
            <?php echo form_close() ?>
        <br>
        <br>
        <div class="table-responsive-custom">
            <table class="table table-bordered border-black table-hover table-sm" style="font-size: 0.850em; table-layout: fixed; width: 100%;">
                <thead>
                    <tr style="text-align:center">
                        <th style="width: 10%;">Nombre</th>
                        <th style="width: 10%;">Marca</th>
                        <th style="width: 30%;">Descripción</th>
                        <th style="width: 10%;">Cantidad</th>
                        <th style="width: 10%;">Tipo</th>
                        <th style="width: 15%;">Imagen</th>
                        <th style="width: 15%;">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-justify">
                    <?php foreach ($productos as $producto): ?>
                        <?php 
                            if ($producto->cantidad == 0) {
                                $rowClass = 'table-bordered border-danger table-danger';
                            } elseif ($producto->cantidad <= 3 && $producto->cantidad != 0) {
                                $rowClass = 'table-warning table-bordered border-warning';
                            } else {
                                $rowClass = '';
                            }
                        ?>
                        <tr class="<?php echo $rowClass; ?>">
                            <td><?php echo $producto->nombre; ?></td>
                            <td><?php echo $producto->marca; ?></td>
                            <td style="word-wrap: break-word; word-break: break-word; white-space: normal; max-width: 250px;"><?php echo $producto->descripcion; ?></td>
                            <td><?php echo $producto->cantidad; ?></td>
                            <td><?php echo $producto->tipo; ?></td>
                            <td style="overflow: hidden; max-width: 150px; max-height: 150px; text-align: center;">
                                <img src="<?php echo base_url($producto->imagen); ?>" alt="Producto" style="width: 175px; height: 175px; object-fit: cover; cursor: pointer;">
                            </td>
                            <td style="max-width: 100px">
                                <center>
                                    <img src="<?= base_url() ?>imagenes/img-edit.png" alt="Editar" style="width: 44px; height: 44px; cursor: pointer;" onclick="llenar_datos('<?php echo $producto->id; ?>', '<?php echo $producto->nombre; ?>', '<?php echo $producto->marca; ?>', '<?php echo $producto->descripcion; ?>', '<?php echo $producto->cantidad; ?>', '<?php echo $producto->tipo; ?>', '<?php echo $producto->imagen; ?>')" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="<?= base_url() ?>imagenes/img-delete.png" alt="Delete" style="width: 44px; height: 44px; cursor: pointer;" onclick="confirmarEliminacion('<?php echo $producto->id; ?>', '<?php echo $producto->imagen; ?>')" type="button" data-bs-toggle="modal" data-bs-target="#miniModalEliminar">
                                    <img src="<?= base_url() ?>imagenes/img-suma.png" alt="Suma" style="width: 30px; height: 30px; cursor: pointer;" onclick="atrapar_datos_sumar('<?php echo $producto->id; ?>', '<?php echo $producto->cantidad; ?>')" data-bs-toggle="modal" data-bs-target="#miniModalSumar">
                                    &nbsp;&nbsp;<img src="<?= base_url() ?>imagenes/img-restar.png" alt="Resta" style="width: 30px; height: 30px; cursor: pointer;" onclick="atrapar_datos_restar('<?php echo $producto->id; ?>', '<?php echo $producto->cantidad; ?>')" data-bs-toggle="modal" data-bs-target="#miniModalRestar">
                                </center>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        </div>
        <script>
            // Llenar el modal con datos existentes al hacer clic en editar
            window.llenar_datos = function(serial, nombre, marca, descripcion, cantidad, tipo, imagen) {
                    document.getElementById('serial').value = serial;
                    document.getElementById('nombre').value = nombre;
                    document.getElementById('marca').value = marca;
                    document.getElementById('descripcion').value = descripcion;
                    document.getElementById('cantidad').value = cantidad;
                    document.getElementById('tipo').value = tipo;
                    document.getElementById('imagen_actual').value = imagen;

                    document.getElementById('exampleModalLabel').innerText = 'Editar equipo';
                }

                // Limpiar el modal al cerrarlo
                document.getElementById('exampleModal').addEventListener('hidden.bs.modal', function () {
                    document.getElementById('serial').value = '';
                    document.getElementById('nombre').value = '';
                    document.getElementById('marca').value = '';
                    document.getElementById('descripcion').value = '';
                    document.getElementById('cantidad').value = '';
                    document.getElementById('tipo').value = '';
                    document.getElementById('imagen_actual').value = '';
                    document.getElementById('imagen').value = '';
                    
                    // Restablece el título del modal
                    document.getElementById('exampleModalLabel').innerText = 'Nuevo equipo';
                });

            // Llenar modal de sumar
            window.atrapar_datos_sumar = function(serial, suma){
                document.getElementById('identificador').value = serial;
                document.getElementById('suma').value = suma;
            }
            // Llenar modal de restar
            window.atrapar_datos_restar = function(serial, cantidad){
                document.getElementById('ident').value = serial;
                document.getElementById('can').value = cantidad;
            }
            // Llenar modal de eliminar
            window.confirmarEliminacion = function(serial, imagen){
                document.getElementById('id').value = serial;
                document.getElementById('imag').value = imagen;
            }
    </script>

    <script>
        const searchInput = document.getElementById('campo');
        const filterDropdown = document.querySelector('.dropdown-menu');
        const tableRows = document.querySelectorAll('table tbody tr');

        // Variable para mantener el filtro actual
        let currentFilter = null;

        // Función para filtrar y buscar en la tabla
        function filterTable() {
            const searchTerm = searchInput.value.toLowerCase().trim();
            tableRows.forEach(row => {
                let match = true;

                // Buscar en la columna según el filtro actual
                if (currentFilter) {
                    const columnValue = row.querySelector(`td:nth-child(${currentFilter})`).innerText.toLowerCase();
                    match = columnValue.startsWith(searchTerm);  // Modificado a startsWith
                } else {
                    // Si no hay filtro, buscar en toda la fila
                    match = Array.from(row.querySelectorAll('td')).some(td => 
                        td.innerText.toLowerCase().startsWith(searchTerm)  // Modificado a startsWith
                    );
                }

                // Mostrar u ocultar fila
                row.style.display = match ? '' : 'none';
            });
        }

        // Asignar eventos al campo de búsqueda
        searchInput.addEventListener('input', filterTable);

        // Asignar eventos a los ítems del menú desplegable
        filterDropdown.addEventListener('click', (event) => {
            const selectedItem = event.target;
            const filterValue = selectedItem.getAttribute('value');

            if (filterValue) {
                // Actualizar el filtro actual (columna base para buscar)
                currentFilter = {
                    nombre: 1,  // Nombre
                    marca: 2,  // Marca
                    tipo: 5,  // Tipo
                }[filterValue];

                searchInput.placeholder = `Buscar por ${selectedItem.innerText.toLowerCase()}...`;

                searchInput.value = '';
                filterTable();
            }
        });
    </script>
</div>
    
</body>
</html>