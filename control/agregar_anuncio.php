<?php 

  session_start();
  require_once '../app/conexion.php';
  $conexion=conexion();

  $titulo=$_POST['regis_titulo'];
  $precio=$_POST['regis_precio'];
  $tipo=$_POST['regis_tipo'];
  $descripcion=$_POST['regis_descripcion'];
  $imgData=addslashes(file_get_contents($_FILES['regis_imagen']['tmp_name']));
  $latitud=$_POST['regis_latitud'];
  $longitud=$_POST['regis_longitud'];
  $servicios="";
  if(isset($_POST['regis_ser_cochera'])){
    $servicios=$servicios.'1'."_";
  }else{
    $servicios=$servicios.'0'."_";
  }
  if(isset($_POST['regis_ser_mascota'])){
    $servicios=$servicios.'1'."_";
  }else{
    $servicios=$servicios.'0'."_";
  }
  if(isset($_POST['regis_ser_internet'])){
    $servicios=$servicios.'1'."_";
  }else{
    $servicios=$servicios.'0'."_";
  }
  if(isset($_POST['regis_ser_cable'])){
    $servicios=$servicios.'1';
  }else{
    $servicios=$servicios.'0';
  }
 
  //$_POST['regis_ser_mascota']?? null.$_POST['regis_ser_internet']?? null.$_POST['regis_ser_cable']?? null;

  $usuario=$_SESSION['user'];


  $sql="INSERT INTO departamentos(usuario,titulo,precio,tipo,servicios,descripcion,imagenes,latitud,longitud,estatus)
        values ('$usuario','$titulo','$precio','$tipo','$servicios','$descripcion','$imgData','$latitud','$longitud','sin rentar')";

  echo $resultado=mysqli_query($conexion,$sql);


?>