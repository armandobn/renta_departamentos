<div class="container-fluid mt-4">

  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-perfil-tab" data-bs-toggle="tab" data-bs-target="#nav-perfil"
        type="button" role="tab" aria-controls="nav-perfil" aria-selected="true">Perfil</button>
      <button class="nav-link" id="nav-misrentas-tab" data-bs-toggle="tab" data-bs-target="#nav-misrentas" type="button"
        role="tab" aria-controls="nav-misrentas" aria-selected="false">Mis rentas</button>
      <button class="nav-link" id="nav-anuncio-tab" data-bs-toggle="tab" data-bs-target="#nav-anuncio" type="button"
        role="tab" aria-controls="nav-anuncio" aria-selected="false">Anuncio</button>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-perfil" role="tabpanel" aria-labelledby="nav-perfil-tab">
      <?php require_once 'view/perfil.php';?>
    </div>
    <div class="tab-pane fade" id="nav-misrentas" role="tabpanel" aria-labelledby="nav-misrentas-tab">
      <h2>Mis rentas</h2>
      <?php 

      require_once 'app/conexion.php';
      $conexion=conexion();

      //session_start(); Ya esta por eso no lo pongo denuvo
      $usuario=$_SESSION['user'];

      $sql_usuario = "SELECT id,propietario,usuario,costo_mes FROM renta_tiempo 
                        WHERE usuario='$usuario' ";
      $sentencia_usuario= mysqli_query($conexion,$sql_usuario);
      $resultadousuario = mysqli_fetch_all($sentencia_usuario, MYSQLI_ASSOC);

      
      foreach($resultadousuario as $usuario):
        $id=$usuario['id'];
        // echo '<br>';
        // echo 'Id:'.$id.'<br>';
        // echo 'Propietario: '.$usuario['propietario'].'<br>';
        // echo 'Usuario: '.$usuario['usuario'].'<br>';
        // echo 'Costo: '.$usuario['costo_mes'].'<br>';
        
        $sql_departamento = "SELECT * FROM departamentos WHERE id='$id' ";
        $sentencia_departamento= mysqli_query($conexion,$sql_departamento);
        $resultadodepartamento = mysqli_fetch_all($sentencia_departamento, MYSQLI_ASSOC);
        
        foreach($resultadodepartamento as $departamento):
          // echo 'Id_departemento: '.$departamento['id'].'<br>';

        echo '<div class="card border-primary mb-3" style="max-width: 18rem;">';
        echo '<div class="card-header">'.$departamento['titulo'].'</div>';
        echo '<div class="card-body text-primary">';
        echo ' <p class="card-text">';
                echo 'Propietario: '.$departamento['usuario'].'<br>';
                echo 'Titulo: '.$departamento['titulo'].'<br>';
                echo 'Precio: '.$departamento['precio'].'<br>';
                echo 'Tipo: '.$departamento['tipo'].'<br>';
                echo 'Servicios: ';
                $servi=explode("_",$departamento['servicios']);
                  if($servi[0]=="1"){
                    echo '<i class="fas fa-car"></i> ';
                  }
                  if($servi[1]=="1"){
                    echo '<i class="fas fa-paw"></i> ';
                  }
                  if($servi[2]=="1"){
                    echo '<i class="fas fa-wifi"></i> ';
                  }
                  if($servi[3]=="1"){
                    echo '<i class="fas fa-satellite-dish"></i>';
                  }

                  
                echo '<br>Descripcion: '.$departamento['descripcion'].'<br>';
                echo '</p>';
                echo '<a href="informacionanunciousuario/'.$departamento['id'].'" class="btn btn-primary">Mas Informacion</a>';      
        echo '</div>';
        echo '</div>';
        
         
        endforeach;

        
      endforeach;

      ?>
    </div>
    <div class="tab-pane fade" id="nav-anuncio" role="tabpanel" aria-labelledby="nav-anuncio-tab">
      <?php 
        require_once 'app/conexion.php';
        $conexion=conexion();
        $sql="SELECT * FROM usuario_venta where usuario='$_SESSION[user]' and terminos=true";
        $resultado=mysqli_query($conexion, $sql);
        
        if(mysqli_num_rows($resultado)==1){
          require_once 'view/usuario_anuncio.php';
        }else{
          echo '
          <!-- Button trigger modal -->
          <span class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#registroanunciantestaticBackdrop">
            Volverse Anunciante
          </span>
          ';
        }

      ?>
    </div>
  </div>

</div>

<?php 
  require_once 'view/modal_registro_anunciante.php'; 
  require_once 'view/modal_agregar_anuncio.php';
  require_once 'view/modal_update_anuncio.php';      
?>


<script src="<?=SERVIDOR?>manager/usuario.js"></script>