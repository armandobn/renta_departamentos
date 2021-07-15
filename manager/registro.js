$(document).ready(function(){

  $('#registro').click(()=>{

    if($('#regis_usuario').val()==""){
      alerta('Error!','Ingresa Usuario','error');
      return false;
    }else if($('#regis_correo').val()==""){
      alerta('Error!','Ingresa Correo','error');
      return false;
    }else if($('#regis_nombre').val()==""){
      alerta('Error!','Ingresa Nombre','error');
      return false;
    }else if($('#regis_apellido').val()==""){
      alerta('Error!','Ingresa Apellido','error');
      return false;
    }else if($('#regis_pass').val()==""){
      alerta('Error!','Ingresa Contraseña','error');
      return false;
    }else if($('#confir_pass').val()==""){
      alerta('Error!','Confirmar Tu Contraseña','error');
      return false;
    }else if($('#regis_pass').val()!=$('#confir_pass').val()){
      alerta('Error!','Deben Coincidir tus contraseñas','error');
      return false;
    }
    
    //validacion
    capturado=validar_correo($('#regis_correo').val());
    if(capturado == null){
      alerta('Error!','Correo Invalido','error');
      return false;
    }
    capturado=validar_texto($('#regis_nombre').val());
    if(capturado != null){
      alerta('Error!','Los siguientes caracteres no son validos:\n\n'
      +capturado,'error');
      return false;
    }
    capturado=validar_texto($('#regis_apellido').val());
    if(capturado != null){
      alerta('Error!','Los siguientes caracteres no son validos:\n\n'
      +capturado,'error');
      return false;
    }
    

    let info="regis_usuario="+$('#regis_usuario').val()+
    "&regis_correo=" + $('#regis_correo').val()+
    "&regis_nombre="+$('#regis_nombre').val()+
    "&regis_apellido="+$('#regis_apellido').val()+
    "&regis_pass="+$('#regis_pass').val();

    $.ajax({
      type: 'POST',
      url: '../control/registro.php',
      data: info,
      success: function(r){
        
        if(r==true){
          $('#form_registro')[0].reset();
          alerta('success','Se registro tu usuario con exit','Se registro tu usuario con exito');
          window.location="../usuario";
          return false;
        }else if(r=="2"){
          alerta('Error!','Este Usuario ya Esta Registrado','Por favor escoja otro usuario');
          return false;
        }else{
          //console.log(r);
          alerta('Error!','Algo Salio mal','error');
        }

      }

    });
      
  });


});