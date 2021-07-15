
function rentar_departamento(id){
  info='id_departamento='+id;
  //alert(info);

  $.ajax({
    type:'POST',
    data: info,
    url:'../control/rentar_departamento.php',
    success: function(r){
      if(r==1){
        alerta('Perfecto!','Ya lo rentaste','success');
        window.location="../usuario";
        //console.log(r);
      }else if(r=="2"){
        alerta('Error!','Debes tener una cuenta o estar logeado','error');
        //console.log(r);
      }else{
        alerta('Error!','Algo sali mal','error');
        //console.log(r);
      }
    }
  });
}

