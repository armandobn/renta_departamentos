<!-- Modal -->
<div class="modal fade" id="rentarstaticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Rentar Departamento/Cuarto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Esto solo es para poder apartar el Departamento/Cuarto, no te aseguramos que lo obtengas
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" 
          onclick="rentar_departamento('<?php echo $_GET['pagina']; ?>')">Rentar</button>
      </div>
    </div>
  </div>
</div>

