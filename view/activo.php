<h4>Bienvenido, <?php echo htmlspecialchars($_SESSION["user"]); ?></h4>
<br>
<?php 

// echo 'Formado URL: '.$_GET['vista'].'/'.$_GET['pagina'].'<br>';
// echo 'Vista: '.$_GET['vista'].'<br>';
// echo 'Pagina: '.$_GET['pagina'].'<br>';

  if(isset($_GET['pagina'])){
    echo '
    <a href="../control/logout.php" class="btn btn-success ms-3"><i class="far fa-user"></i> Cerrar Sesion</a>
    ';
  }else{
    echo '
    <a href="control/logout.php" class="btn btn-success ms-3"><i class="far fa-user"></i> Cerrar Sesion</a>
    ';
  }
?>ddd
  

