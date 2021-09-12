<div class="container-fluid p-0">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fw-bold">
    <div class="container-fluid">
      <a class="navbar-brand titulo" href="<?=SERVIDOR?>">
        <i class="fas fa-laptop-house logo"></i>
        Rentas Casa/Cuarto Milpa Alta
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <?php 
            session_start();
            if(isset($_SESSION['user'])){
              
              if(isset($_GET['pagina'])){
                echo '
                <a class="nav-link active" aria-current="page" href="../inicio/0">Inicio</a>
                ';
              }else{
                echo '
                <a class="nav-link active" aria-current="page" href="inicio/0">Inicio</a>
                ';
              }
              
            }else{
              echo '
              <a class="nav-link active" aria-current="page" href="0">Inicio</a>
              ';
            }
            ?>

          </li>
          <li class="nav-item">
            <?php 
       
            if(isset($_SESSION['user'])){
              
              if(isset($_GET['pagina'])){
                echo '
                <a class="nav-link" href="../inicio/1">Buscar</a>
                ';
              }else{
                echo '
                <a class="nav-link" href="inicio/1">Buscar</a>
                ';
              }
              
            }else{
              echo '
              <a class="nav-link" href="1">Buscar</a>
              ';
            }
            ?>
          </li>
          <li class="nav-item">
            <?php 
   
            if(isset($_SESSION['user'])){
              
              if(isset($_GET['pagina'])){
                echo '
                <a class="nav-link" href="../usuario">Perfil</a>
                ';
              }else{
                echo '
                <a class="nav-link" href="usuario">Perfil</a>
                ';
              }
            }

            ?>
          </li>
        </ul>
        <form class="d-flex text-light fw-bold">
          
          <?php 

          if(isset($_SESSION['user'])){
            require_once 'view/activo.php';
          }else{
            require_once 'view/desactivo.php';
          }
          ?>

        </form>

      </div>
    </div>
  </nav>

</div>

<?php require_once 'view/modal_login.php';?>
<?php require_once 'view/modal_registro.php'; ?>
<script src="<?=SERVIDOR?>manager/login.js"></script>
<script src="<?=SERVIDOR?>manager/registro.js"></script>