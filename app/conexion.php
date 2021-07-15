<?php 

  function conexion(){
    $conexion = new mysqli('localhost','root','','renta');
    if($conexion->connect_errno){
      echo 'Error en la conexion'.$conexion->connect_error;
    }else{
      // echo 'exito';
    }
    $conexion->set_charset("utf8");
    return $conexion;
  }

?>