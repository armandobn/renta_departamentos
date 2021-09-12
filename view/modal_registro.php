<!-- Modal -->
<div class="modal fade" id="registrostaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registrarse</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_registro">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="regis_usuario" placeholder="name@example.com">
            <label for="regis_usuario">Ingresar Usuario</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="regis_correo" placeholder="name@example.com">
            <label for="regis_correo">Ingresar Correo</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="regis_nombre" placeholder="name@example.com">
            <label for="regis_nombre">Ingresar Nombre</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="regis_apellido" placeholder="name@example.com">
            <label for="regis_apellido">Ingresar Apellido</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="regis_pass" placeholder="name@example.com">
            <label for="regis_pass">Ingresar Contraseña</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="confir_pass" placeholder="name@example.com">
            <label for="confir_pass">Confirmar Contraseña</label>
          </div>
        </form>
        <div class="text-center mt-2">
          <!-- Button trigger modal -->
          <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginstaticBackdrop" data-bs-dismiss="modal">
            Regresar
          </span>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="registro">Registrarse</button>
      </div>
    </div>
  </div>
</div>
