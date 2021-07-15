<!-- Modal -->
<div class="modal fade" id="loginstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Iniciar Sesion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form_login">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="usuario" placeholder="name@example.com">
            <label for="usuario">Usuario</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="pass" placeholder="Password">
            <label for="pass">Contraseña</label>
          </div>
        </form>

        <div class="text-center mt-2">
          <!-- Button trigger modal -->
          <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrostaticBackdrop" data-bs-dismiss="modal">
            Registrarse
          </span>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="login">Ingresar</button>
      </div>
    </div>
  </div>
</div>