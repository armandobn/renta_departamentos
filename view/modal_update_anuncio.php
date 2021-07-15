<!-- Modal -->
<div class="modal fade" id="update_anuncio_staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Actualizar Anuncio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_update_anuncio">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="update_id" id="update_id" hidden="true"
              placeholder="name@example.com">
            <label for="update_id">ID</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="update_titulo" id="update_titulo"
              placeholder="name@example.com">
            <label for="update_titulo">Ingresar Titulo</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="update_precio" id="update_precio"
              placeholder="name@example.com">
            <label for="updates_precio">Ingresar Precio</label>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" id="update_tipo" name="update_tipo" aria-label="Floating label select example">
              <option>Casa</option>
              <option>Cuarto</option>
            </select>
            <label for="update_tipo">Ingresar Tipo(Casa/Cuarto)</label>
          </div>
         
          <div class="form-floating mb-3">
            <textarea class="form-control" name="update_descripcion" id="update_descripcion" rows="3"
              placeholder="Leave a comment here" style="height: 100px"></textarea>
            <label for="update_descripcion">Descripcion</label>
          </div>
          <div class="mb-3">
            <label for="regis_servicios">Marca los Servicios</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="update_ser_cochera" id="update_ser_cochera" value="0">
            <label class="form-check-label" for="update_ser_cochera">Cochera</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="update_ser_mascota" id="update_ser_mascota" value="1">
            <label class="form-check-label" for="update_ser_mascota">Mascotas</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="update_ser_internet" id="update_ser_internet"
              value="2">
            <label class="form-check-label" for="update_ser_internet">Internet</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="update_ser_cable" id="update_ser_cable" value="3">
            <label class="form-check-label" for="update_ser_cable">Television de paga</label>
          </div>
          <div class="mb-3">
            <label for="update_imagen" class="form-label">Ingresa una Imagen</label>
            <input class="form-control" type="file" REQUIRED name="update_imagen" id="update_imagen">
          </div>
          <div class="mb-3">
            <label for=""><strong>Ubicacion del Departamento/Casa</strong></label>
            <p>La Latitud y Longitud lo obtienes desde Google Maps, das click derecho sobre la Ubicacion
              exacta de la vivienda.
            </p>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="update_latitud" id="update_latitud"
              placeholder="name@example.com">
            <label for="update_latitud">Ingresar Latitud</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="update_longitud" id="update_longitud"
              placeholder="name@example.com">
            <label for="update_longitud">Ingresar Longitud</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
          onclick="actualiza_anuncio()">Actualizar</button>
      </div>
    </div>
  </div>
</div>

