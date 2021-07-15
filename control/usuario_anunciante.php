<?php
  session_start();
  require_once '../app/conexion.php';
  $conexion=conexion(); 

  $telefono=$_POST['telefono'];
  $terminos=$_POST['terminos'];
  $usuario=$_SESSION['user'];

  $sql="INSERT INTO usuario_venta(usuario,telefono,terminos) 
          values('$usuario','$telefono', $terminos)";

  echo $resultado=mysqli_query($conexion,$sql);

?>