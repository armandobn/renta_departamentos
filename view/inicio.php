<?php 
  
  require_once 'app/conexion.php';
  $conexion=conexion();
  //Llamar a todos los articulos
  $sql='SELECT * FROM departamentos WHERE estatus="sin rentar"';
  $sentencia=mysqli_query($conexion,$sql);
  
  $resultado = mysqli_fetch_all($sentencia, MYSQLI_ASSOC);
  //var_dump ($resultado);

  $articulos_x_pagina = 3;

  //contar articulos de nuestra base de datos
  $total_articulos_db = $sentencia->num_rows;
  ///echo $total_articulos_db;
  $paginas = $total_articulos_db/3;
  $paginas = ceil($paginas);
  
  // echo 'Formado URL: '.$_GET['vista'].'/'.$_GET['pagina'].'<br>';
  // echo 'Vista: '.$_GET['vista'].'<br>';
  // echo 'Pagina: '.$_GET['pagina'].'<br>';
  // echo "Total de Paginas:".$paginas;

?>
<div class="container">


  <!-- <div id="datos_tabla_anuncio"></div> -->

  <?php 
    // if(!$_GET){
      
    //   echo '
    //     <script>
    //       window.location="1"; 
    //     </script>
    //   ';
    // }
    // if($_GET['pagina']>$paginas || $_GET['pagina']<=0){
      
    //   echo '
    //     <script>
    //       window.location="1"; 
    //     </script>
    //   ';
    // }
   
    if($_GET['pagina']==0){
      //echo 'pagina cero';
      require_once 'principal.php';
    }else if($total_articulos_db==0){
      echo 'No hay datos en Registrados';
    }else if($_GET['pagina']>$paginas || $_GET['pagina']<0){
      //echo 'Numero mayor de las paginas maximas';
      echo '
        <script>
          window.location="1"; 
        </script>
      ';
    }else{
      //echo 'todo bien';
      
    $iniciar = ($_GET['pagina']-1)*$articulos_x_pagina;
    $iniciar=intval($iniciar);
    //echo  $iniciar;
    $sql_articulos = 'SELECT * FROM departamentos WHERE estatus="sin rentar" LIMIT '.$iniciar.','.$articulos_x_pagina.'';
    //echo $sql_articulos;
    $sentencia_articulos= mysqli_query($conexion,$sql_articulos);
    $resultado_articulos = mysqli_fetch_all($sentencia_articulos, MYSQLI_ASSOC);

      ?>
  <?php foreach($resultado_articulos as $articulo):?>
  <div class="card border border-3 border-primary mt-3"> <!-- style="max-width: 540px;"-->
    <div class="row g-0">
      <div class="col-md-4">
        <img src="data:image/jpg;base64,<?php echo base64_encode($articulo['imagenes'])?>"
          class="img-fluid rounded-start fondo" alt="imagen" placeholder="imagen">
      </div>
      <div class="col-md-8 border border-primary text-primary">
        <div class="card-header border-primary">
          <h5> <strong> <?php echo $articulo['titulo']?> </strong></h5>
        </div>
        <div class="card-body border-primary">
          <h5 class="card-title">Aprox: $<?php echo $articulo['precio']?></h5>
          <p class="card-text"><?php echo $articulo['descripcion']?></p>
          <div class="col text-end">
            <a href="../informacion/<?php echo $articulo['id']?>" class="btn btn-primary">Mas Informacion</a>
          </div>
        </div>
        <div class="card-footer border-primary text-muted">
        Ofrece:
          <?php 
            

          //echo implode(" ", explode("_",$articulo['servicios']));

           $servi=explode("_",$articulo['servicios']);
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

          <!-- <i class="fas fa-car"></i>
          <i class="fas fa-paw"></i>
          <i class="fas fa-wifi"></i>
          <i class="fas fa-satellite-dish"></i> -->
        </div>
      </div>
    </div>
  </div>



  <?php endforeach?>

  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item <?php echo $_GET['pagina']<=1? 'disabled': ''?>">
        <a class="page-link" href="<?php echo $_GET['pagina']-1?>">Previous</a>
      </li>

      <?php for($i=0; $i<$paginas; $i++):?>
      <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : ''?>">
        <a class="page-link" href="<?php echo $i+1;?>">
          <?php echo $i+1;?>
        </a>
      </li>
      <?php endfor ?>

      <li class="page-item <?php echo $_GET['pagina']>=$paginas? 'disabled': ''?>">
        <a class="page-link" href="<?php echo $_GET['pagina']+1?>">Next</a>
      </li>
    </ul>
  </nav>
</div>

<script src="<?=SERVIDOR?>manager/inicio.js"></script>


<?php
    }

  ?>