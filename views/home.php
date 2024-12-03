<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Juegos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item me-4">
                </li>
                <li class="nav-item d-flex align-items-center me-3">
                    <span class="navbar-text text-white">
                        <?= isset($_SESSION['usuario']) ? $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido'] : 'Usuario'; ?>
                    </span>
                </li>
                <li class="nav-item ms-2">
                    <button type="button" class="btn btn-danger" id="btn_cerrar">Cerrar sesión</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php
if (!isset($_SESSION['usuario'])) {
    header("location:login");
    exit();
}
?>

<script>
    const esAdministrador = <?= json_encode($_SESSION['usuario']['rol'] === 'administrador'); ?>;
</script>
<script src="ruta/al/archivo/main.js"></script>

<div class="container mt-5">
    <div class="row justify-content-center bg-card">
        <div class="col-12 text-end mt-3">
        </div>
        <div class="col-10 text-center mt-3">
            <h2>Juegos</h2>
        </div>
        <div class="col-10 text-end mt-3">
            <?php if ($_SESSION['usuario']['rol'] == 'administrador') { ?>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarModal">Añadir juego</button>
            <?php } ?>
            <table id="myTable" class="display table text-white">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre del juego</th>
                        <th scope="col">Plataforma del juego</th>
                        <th scope="col">Año de publicación del juego</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Sinopsis del juego</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="contenido_producto">
                </tbody>
            </table>
        </div>
        <div class="col-10 text-end">
            <hr class="text-primary">
        </div>
    </div>
</div>

<div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Juego</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" hidden id="id_prodcuto_act">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_producto" name="edit_producto" type="text" placeholder="Producto">
                            <label class="text-primary" for="usuario">Nombre del juego</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_precio" name="edit_precio" type="text" placeholder="Precio">
                            <label class="text-primary" for="usuario">Plataforma del juego</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_unidades" name="edit_unidades" type="text" placeholder="Unidades">
                            <label class="text-primary" for="usuario">Año de publicación del juego</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="edit_comentario" name="edit_comentario" placeholder="Comentario"></textarea>
                            <label class="text-primary" for="comentario">Sinopsis del juego</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="edit_imagen" name="edit_imagen" type="text" placeholder="URL de la imagen">
                            <label class="text-primary" for="imagen">Imagen (URL)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_actualizar">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Juego</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="producto" name="producto" type="text" placeholder="Producto">
                            <label class="text-primary" for="usuario">Nombre del juego</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="precio" name="precio" type="text" placeholder="Precio">
                            <label class="text-primary" for="usuario">Plataforma del juego</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="unidades" name="unidades" type="text" placeholder="Unidades">
                            <label class="text-primary" for="usuario">Año de publicación del juego</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="comentario" name="comentario" placeholder="Comentario"></textarea>
                            <label class="text-primary" for="comentario">Sinopsis del juego</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="imagen" name="imagen" type="text" placeholder="URL de la imagen">
                            <label class="text-primary" for="imagen">Imagen (URL)</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_agregar">Añadir</button>
            </div>
        </div>
    </div>
</div>
