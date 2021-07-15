<?php

  require_once '../app/conexion.php';
  $conexion=conexion();

  $id=$_POST['update_id'];
  $titulo=$_POST['update_titulo'];
  $precio=$_POST['update_precio'];
  $tipo=$_POST['update_tipo'];
  $descripcion=$_POST['update_descripcion'];
  $estatus=$_POST['update_estatus'];
  $latitud=$_POST['update_latitud'];
  $longitud=$_POST['update_longitud'];
  
  //$imgData=addslashes(file_get_contents($_FILES['update_imagen']['tmp_name']));
  $servicios="";
  if(isset($_POST['update_ser_cochera'])){
    $servicios=$servicios.'1'."_";
  }else{
    $servicios=$servicios.'0'."_";
  }
  if(isset($_POST['update_ser_mascota'])){
    $servicios=$servicios.'1'."_";
  }else{
    $servicios=$servicios.'0'."_";
  }
  if(isset($_POST['update_ser_internet'])){
    $servicios=$servicios.'1'."_";
  }else{
    $servicios=$servicios.'0'."_";
  }
  if(isset($_POST['update_ser_cable'])){
    $servicios=$servicios.'1';
  }else{
    $servicios=$servicios.'0';
  }

  // echo  $_FILES['update_imagen']['tmp_name'];
  if($_FILES['update_imagen']['tmp_name']!=""){
    $imgData=addslashes(file_get_contents($_FILES['update_imagen']['tmp_name']));
    $sql="UPDATE departamentos
    SET titulo='$titulo', precio='$precio', tipo='$tipo', servicios='$servicios',
      descripcion='$descripcion', imagenes='$imgData', latitud='$latitud', longitud='$longitud', estatus='$estatus'
    WHERE id='$id'";

  }else{
    $sql="UPDATE departamentos
    SET titulo='$titulo', precio='$precio', tipo='$tipo', servicios='$servicios',
      descripcion='$descripcion', latitud='$latitud', longitud='$longitud', estatus='$estatus'
    WHERE id='$id'";
    
  }

  echo $resultado=mysqli_query($conexion,$sql);


?>