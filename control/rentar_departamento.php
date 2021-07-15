<?php 

  require_once '../app/conexion.php';
  $conexion=conexion();

  session_start();

  
  // echo $id_departamento;
  // echo json_encode($id_departamento);
  if(isset($_SESSION['user'])){
    $usuario=$_SESSION['user'];
    $id_departamento=$_POST['id_departamento'];  
    $sql_propietario = "SELECT usuario,precio FROM departamentos WHERE id='$id_departamento' ";
    $sentencia_propietario= mysqli_query($conexion,$sql_propietario);
    $resultadopropietario = mysqli_fetch_all($sentencia_propietario, MYSQLI_ASSOC);

    $propietario="";
    $precio="";
    foreach($resultadopropietario as $ob_propietario):
      $propietario=$ob_propietario['usuario'];
      $precio=$ob_propietario['precio'];
    endforeach;

    $sql_estatus="UPDATE departamentos SET estatus='rentado' WHERE id='$id_departamento'";
    $resultado_estatus=mysqli_query($conexion,$sql_estatus);

    $sql_renta_tiempo="INSERT INTO renta_tiempo(id,propietario,usuario,costo_mes)
    values ('$id_departamento','$propietario','$usuario','$precio')";


    echo $resultado=mysqli_query($conexion,$sql_renta_tiempo);
  }else{
    // Unset all of the session variables
    $_SESSION = array();
    // Destroy the session.
    session_destroy();

    echo '2';
  }

  

?>