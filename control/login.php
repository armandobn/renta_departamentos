<?php 
  session_start();
  require_once '../app/conexion.php';
  $conexion = conexion();

  $usuario=$_POST['usuario'];
  $pass= sha1($_POST['pass']);

  $sql="SELECT * FROM usuario where usuario='$usuario' and pass='$pass' ";

  $resultado=mysqli_query($conexion,$sql);

  if(mysqli_num_rows($resultado)>0){
    $_SESSION['user'] = $usuario;
    echo 1;
  }else{
    
    
  }

?>