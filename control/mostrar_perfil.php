<?php

  require_once "../app/conexion.php";

  $conexion=conexion();
  session_start();
  $usuario=$_SESSION["user"];

  $query_perfil = "SELECT id, usuario, nombre, apellido, correo FROM usuario WHERE usuario='$usuario'";
  $resultado_query = $conexion->query($query_perfil);


  $query_perfil_anunciador = "SELECT id, usuario, telefono, terminos, premium, premium_restante FROM usuario_venta WHERE usuario='$usuario'";
  $resultado_query_anunciador = $conexion->query($query_perfil_anunciador);
  
  $preconstruccion_tabla_perfil="";
  while($datos_perfil=$resultado_query_anunciador->fetch_assoc()){
    
    if($datos_perfil['terminos']!="1"){
      echo 'aceptado';
    }

    $preconstruccion_tabla_perfil = $preconstruccion_tabla_perfil.'
          <tr>
            <th scope="row">Celular:</th>
            <td>'.$datos_perfil['telefono'].'</td>
          </tr>
          <tr>
            <th scope="row">Acepto Teminos:</th>
            <td> Si</td>
          </tr>
          
    ';
    
  } 

  $preconstruccion_tabla="";
  while($datos_tabla=$resultado_query->fetch_assoc()){

    $preconstruccion_tabla = $preconstruccion_tabla.'  
    <table class="table table-borderless ">
        <thead>
          <tr>
            <th scope="col" colspan="2">Datos del Usuario</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Id:</th>
            <td>'.$datos_tabla['id'].'</td>
          </tr>
          <tr>
            <th scope="row">Usuario:</th>
            <td>'.$datos_tabla['usuario'].'</td>
          </tr>
          <tr>
            <th scope="row">Nombre:</th>
            <td>'.$datos_tabla['nombre'].'</td>
          </tr>
          <tr>
            <th scope="row">Apellido:</th>
            <td>'.$datos_tabla['apellido'].'</td>
          </tr>
          <tr>
            <th scope="row">Correo:</th>
            <td>'.$datos_tabla['correo'].'</td>
          </tr>
          '.$preconstruccion_tabla_perfil.'
        </tbody>
      </table>
    ';
  }

$conexion->close();

echo $preconstruccion_tabla;



?>