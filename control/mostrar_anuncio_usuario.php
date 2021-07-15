<?php

  require_once "../app/conexion.php";

  $conexion=conexion();
  // Initialize the session
  session_start();

  $usuario=$_SESSION["user"];

  $query_select = "SELECT * FROM departamentos WHERE usuario='$usuario' ";

  $resultado_query = $conexion->query($query_select);

  $preconstruccion_tabla="";
  
  // while($datos_tabla=$resultado_query->fetch_assoc()){
  //   $porciones = explode("_", $pizza);
  // }
  $icon='<i class="fas fa-paw"></i>_<i class="fas fa-wifi"></i>';
    $bb='tt_aa_ss';
  while($datos_tabla=$resultado_query->fetch_assoc()){
    $servi=explode("_",$datos_tabla['servicios']);
    $servicio="";
    if($servi[0]=="1"){
      $servicio=$servicio.'<i class="fas fa-car"></i> ';
    }
    if($servi[1]=="1"){
      $servicio=$servicio.'<i class="fas fa-paw"></i> ';
    }
    if($servi[2]=="1"){
      $servicio=$servicio.'<i class="fas fa-wifi"></i> ';
    }
    if($servi[3]=="1"){
      $servicio=$servicio.'<i class="fas fa-satellite-dish"></i>';
    }

    $preconstruccion_tabla = $preconstruccion_tabla.'
    <tr>
    <td>'.$datos_tabla['id'].'</td>
    <td>'.$datos_tabla['usuario'].'</td>
    <td>'.$datos_tabla['titulo'].'</td>
    <td>'.$datos_tabla['precio'].'</td>
    <td>'.$datos_tabla['tipo'].'</td>
    <td>'.$datos_tabla['descripcion'].'</td>
    <td>'.$servicio.'</td>
    <td>'.$datos_tabla['latitud'].'</td>
    <td>'.$datos_tabla['longitud'].'</td>
    <td> <img class="d-block w-100" 
      src="data:image/jpg;base64,'.base64_encode($datos_tabla['imagenes']).'">
    </td>
    <td>'.$datos_tabla['estatus'].'</td>
    <td>
      <!-- Button trigger modal -->
      <span 
        class="btn btn-warning" 
        data-bs-toggle="modal" 
        data-bs-target="#update_anuncio_staticBackdrop"
        onclick="precarga_anuncio('.$datos_tabla['id'].')">
        <i class="fas fa-edit"></i>
      </span>

    </td>
    <td>
      <span 
        class="btn btn-danger" 
        onclick="eliminar_anuncio('.$datos_tabla['id'].')"
      >
        <i class="fas fa-trash-alt"></i>
      </span>
    </td>
  <tr>';
}

$conexion->close();

echo '
  <div class="table-responsive-xl">
  <table class="table table-sm table-hover table-borderless">
    <thead class="bg-primary text-light">
      <tr> 
        <th colspan="11" scope="col"></th>
        <th colspan="2" scope="col" class="text-center">
          <!-- Button trigger modal -->
          <span class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregaranunciostaticBackdrop">
            <i class="fas fa-plus"></i> Agregar
          </span>
        </th>
      </tr>
      <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">Titulo</th>
      <th scope="col">Precio</th>
      <th scope="col">Tipo</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Servicios</th>
      <th scope="col">Latitud</th>
      <th scope="col">Longitud</th>
      <th scope="col">Imagen</th>
      <th scope="col">Estatus</th>
     
      <th>Editar</th>
      <th>Eliminar</th>
      
      </tr>
    </thead>
    <tbody>
      '.$preconstruccion_tabla.'
    </tbody>
  </table>
  </div>
    ';



?>