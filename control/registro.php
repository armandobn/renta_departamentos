<?php 

  require_once '../app/conexion.php';

  $conexion = conexion();

  $usuario = $_POST['regis_usuario'];
  $correo = $_POST['regis_correo'];
  $nombre = $_POST['regis_nombre'];
  $apellido = $_POST['regis_apellido'];
  $password = sha1($_POST['regis_pass']);


  $res= mysqli_query($conexion,"SELECT id FROM usuario WHERE usuario='$usuario'");
  $row=mysqli_fetch_array($res);
  $count= mysqli_num_rows($res);

  if($count==1){
    echo "2";
  }else{
    $query_insert = "INSERT INTO usuario(usuario,nombre, apellido, correo, pass) 
    values('$usuario','$nombre','$apellido','$correo', '$password')";
    $resultado_query = mysqli_query($conexion,$query_insert);
   
    if($resultado_query){
      session_start();
      $_SESSION['user']=$usuario;
      echo $resultado_query;
    }else{
      echo $resultado_query;
    }
  }
  
  
  
?>