$(document).ready(function(){

  $('#login').click(function(){
    
    if($('#usuario').val()==""){
      alerta('Error!','Ingresa Usuario','error');
      return false
    }else if($('#pass').val()==""){
      alerta('Error!','Ingresa Contraseña','error');
      return false;
    }

    let info="usuario="+$('#usuario').val()+
            "&pass="+ $('#pass').val();

    $.ajax({
      type:'POST',
      url:'../control/login.php',
      data: info,
      success:function(r){
        
        if(r==1){
          $('#form_login')[0].reset();
          alerta('"Perfecto !!!','Has Iniciado Sesion','success');
          window.location="usuario";
          return false;
        }else{
          alerta('Error!','Algo salio mal','error');
          return false;
        }

      }
    });

  });

});