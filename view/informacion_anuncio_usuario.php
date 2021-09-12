<?php
   require_once 'app/conexion.php';
   $conexion=conexion();
   $id=$_GET['pagina'];

   $sql_departamentos = "SELECT * FROM departamentos WHERE id='$id' ";
   $sentencia_departamentos= mysqli_query($conexion,$sql_departamentos);
   $resultado_dertamentos = mysqli_fetch_all($sentencia_departamentos, MYSQLI_ASSOC);

   
  //  echo 'Formado URL: '.$_GET['vista'].'/'.$_GET['pagina'].'<br>';
  //  echo 'Vista: '.$_GET['vista'].'<br>';
  //  echo 'Pagina: '.$_GET['pagina'].'<br>';
  
?>


<div class="container">
  <h1>Informacion</h1>
  <hr>

  <?php foreach($resultado_dertamentos as $departamento):?>
  <div class="row p-3 bg-primary text-light rounded">
    <div class="col">
      <img class="d-block img-fluid img-thumbnail w-100 rounded-pill"
        src="data:image/jpg;base64,<?php echo base64_encode($departamento['imagenes'])?>">
    </div>
    <div class="col">
      <h3>Descripcion</h3>
      <p>
        <?php echo $departamento['descripcion']; ?>
      </p>

      Servicios:
      <?php 
            
        //echo implode(" ", explode("_",$articulo['servicios']));
        $servi=explode("_",$departamento['servicios']);
        //echo json_encode($servi);
             
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
      ?>
      Precio: $<?php echo $departamento['precio'] ?>

      <div class="row mt-4 text-center">
        <div class="col">
        </div>
        <div class="col">

          <span class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-mobile-alt"></i> Contactar
          </span>
          <div class="collapse" id="collapseExample">
            <div class="card card-body bg-success">
              <?php 
              $usuario=$departamento['usuario'];
              $sql_usuario = "SELECT telefono FROM usuario_venta WHERE usuario='$usuario' ";
              $sentencia_usuario= mysqli_query($conexion,$sql_usuario);
              $resultadousuario = mysqli_fetch_all($sentencia_usuario, MYSQLI_ASSOC);
              foreach($resultadousuario as $usuario):
                echo $usuario['telefono'];
              endforeach
              ?>
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>


  <?php 
  
    echo '
    <script>
    function iniciarMap() {
  
      var coord = {
        lat: '.$departamento['latitud'] .',
        lng: '.$departamento['longitud'] .'
      };
      var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 10,
        center: coord
      });
      var marker = new google.maps.Marker({
        position: coord,
        map: map
      });
    }
  </script>
    
    ';
  ?>
  <div id="map"></div>

  <?php endforeach?>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACuvMnSGdost6zd-Soc3FSWrpYF1VIuKQ&callback=iniciarMap">
  </script>

</div>

<?php require_once 'modal_rentar.php'; ?>
<script src="<?=SERVIDOR?>manager/informacion_departamento.js"></script>