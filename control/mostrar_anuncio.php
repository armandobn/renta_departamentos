<?php

  require_once "../app/conexion.php";

  $conexion=conexion();

  $query_select = "SELECT * FROM departamentos";

  $resultado_query = $conexion->query($query_select);

  $preconstruccion_tabla="";
  
  // while($datos_tabla=$resultado_query->fetch_assoc()){
  //   $porciones = explode("_", $pizza);
  // }
  while($datos_tabla=$resultado_query->fetch_assoc()){

    $preconstruccion_tabla = $preconstruccion_tabla.'
    <tr>
    <td>'.$datos_tabla['id'].'</td>
    <td>'.$datos_tabla['titulo'].'</td>
    <td>'.$datos_tabla['precio'].'</td>
    <td>'.$datos_tabla['tipo'].'</td>
    <td>'.$datos_tabla['descripcion'].'</td>
    <td>'.implode(" ", explode("_",$datos_tabla['servicios'])).'</td>
    <td> <img class="d-block w-100" 
      src="data:image/jpg;base64,'.base64_encode($datos_tabla['imagenes']).'">
    </td>
  <tr>';
}

$conexion->close();

echo '
  <table class="table table-hover">
    <thead class="bg-primary text-light">
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Precio</th>
      <th scope="col">Tipo</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Servicios</th>
      <th scope="col">Ubicacion</th>
    </thead>
    <tbody>
      '.$preconstruccion_tabla.'
    </tbody>
  </table>

    ';

?>