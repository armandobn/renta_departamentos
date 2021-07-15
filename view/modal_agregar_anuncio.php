<!-- Modal -->
<div class="modal fade" id="agregaranunciostaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Agregar Anuncio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_agregar_anuncio">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="regis_titulo" id="regis_titulo"
              placeholder="name@example.com">
            <label for="regis_titulo">Ingresar Titulo</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="regis_precio" id="regis_precio"
              placeholder="name@example.com">
            <label for="regis_precio">Ingresar Precio</label>
          </div>
          <div class="form-floating mb-3">
            <select class="form-select" id="regis_tipo" name="regis_tipo" aria-label="Floating label select example">
              <option value="1">Casa</option>
              <option value="2">Cuarto</option>
            </select>
            <label for="regis_tipo">Ingresar Tipo(Casa/Cuarto)</label>
          </div>
          <div class="form-floating mb-3">
            <textarea class="form-control" name="regis_descripcion" id="regis_descripcion" rows="3"
              placeholder="Leave a comment here" style="height: 100px"></textarea>
            <label for="regis_descripcion">Descripcion</label>
          </div>
          <div class="mb-3">
            <label for="regis_servicios">Marca los Servicios</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="regis_ser_cochera" id="regis_ser_cochera" value="0">
            <label class="form-check-label" for="regis_ser_cochera">Cochera</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="regis_ser_mascota" id="regis_ser_mascota" value="1">
            <label class="form-check-label" for="regis_ser_mascota">Mascotas</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="regis_ser_internet" id="regis_ser_internet" value="2">
            <label class="form-check-label" for="regis_ser_internet">Internet</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="regis_ser_cable" id="regis_ser_cable" value="3">
            <label class="form-check-label" for="regis_ser_cable">Television de paga</label>
          </div>
          <div class="mb-3">
            <label for="regis_imagen" class="form-label">Ingresa una Imagen</label>
            <input class="form-control" type="file" REQUIRED name="regis_imagen" id="regis_imagen" placeholder="Ingresar Imagen">
          </div>
          <div class="mb-3">
            <label for=""><strong>Ubicacion del Departamento/Casa</strong></label>
            <p>La Latitud y Longitud lo obtienes desde Google Maps, das click derecho sobre la Ubicacion
              exacta de la vivienda.
            </p>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="regis_latitud" id="regis_latitud" placeholder="name@example.com">
            <label for="regis_latitud">Ingresar Latitud</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="regis_longitud" id="regis_longitud" placeholder="name@example.com">
            <label for="regis_longitud">Ingresar Longitud</label>
          </div>  
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btn_agregar_anuncio">Agregar</button>
      </div>
    </div>
  </div>
</div>

