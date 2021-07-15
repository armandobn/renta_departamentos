<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Rentas de Departamentos/Casa</title>
  <?php 
    require_once 'app/config.php';
    require_once 'app/dependencias.php'; 
  ?>

</head>

<body>

  <?php
    
    if(isset($_GET['vista'])==true && isset($_GET['pagina'])==false){
      // Si sabemos que no necesitamos cambiar nada de la sesión,
      // podemos simplemente leerla y cerrarla inmediatamente para evitar
      // bloquear el fichero de sesión y otras páginas
      session_start([
        'cookie_lifetime' => 86400,
        'read_and_close'  => true,
      ]);
      if(isset($_SESSION['user'])){
        
        switch($_GET['vista']){

          case 'usuario':
            require_once 'view/navbar.php';
            require_once 'view/usuario.php';
            break;
  
          default:
            //header("Location:inicio/1");
            // require_once 'view/navbar.php';
            // require_once 'view/inicio.php';
            //echo 'default index';
  
            // echo ' dentro swtich <br>';
            // echo 'Vista: '.$_GET['vista'];
            // echo '<br> Pagina: '.$_GET['pagina'].'<br>';
            // echo 'formado: '.$_GET['vista'].'/'.$_GET['pagina'];
  
            header("Location:inicio/1");
          break;
        }
      }else{
        // Unset all of the session variables
        $_SESSION = array();
        // Destroy the session.
        session_destroy();
        header("Location:inicio/1");
      }

      

    }else if(isset($_GET['vista'])==true && isset($_GET['pagina'])==true){

      // echo 'Dentro ambas parametros <br>';
      // echo 'Vista: '.$_GET['vista'];
      // echo '<br> Pagina: '.$_GET['pagina'].'<br>';
      // echo 'formado: '.$_GET['vista'].'/'.$_GET['pagina'].'<br>';
      
      switch($_GET['vista'].'/'.$_GET['pagina']){

        case 'inicio/'.$_GET['pagina']:
          //echo 'Dentro ambas parametros CASE <br>';
          if(is_numeric($_GET['pagina'])){
            require_once 'view/navbar.php';
            require_once 'view/inicio.php';
          }else{
            header("Location:1");
          }
          
        break;

        case 'inicio/0':
          if(is_numeric($_GET['pagina'])){
            require_once 'view/navbar.php';
            require_once 'view/inicio.php';
          }else{
            header("Location:1");
          }
        break;

        case 'informacion/'.$_GET['pagina']:
          if(is_numeric($_GET['pagina'])){
            require_once 'view/navbar.php';
            require_once 'view/informacion_anuncio.php';
          }else{
            header("Location:1");
          }
        break;
        
        case 'informacionanunciousuario/'.$_GET['pagina']:
          
          session_start([
            'cookie_lifetime' => 86400,
            'read_and_close'  => true,
          ]);

          if(isset($_SESSION['user'])){
            
            if(is_numeric($_GET['pagina'])){
              require_once 'view/navbar.php';
              require_once 'view/informacion_anuncio_usuario.php';
            }else{
              header("Location:../inicio/1");
            }

          }else{
            // Unset all of the session variables
            $_SESSION = array();
            // Destroy the session.
            session_destroy();
            header("Location:../inicio/1");
          }
          
        break;
    
        default:
          //echo 'Dentro ambas parametros Default Switch <br>';
          header("Location:../inicio/1");
        break;
      }



    }else{
      header("Location:inicio/1");
      //echo 'index';
      // require_once 'view/navbar.php';
      // require_once 'view/inicio.php';

      // echo ' dentro if <br>';
      // echo 'Vista: '.$_GET['vista'];
      // echo '<br> Pagina: '.$_GET['pagina'].'<br>';
      // echo 'formado: '.$_GET['vista'].'/'.$_GET['pagina'];
      
    }

  ?>


</body>

</html>