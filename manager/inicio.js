function mas_informacion(id){
  //alert("id: "+id);
  window.location="../informacion";
  siguiente(id);
}

$(document).ready(function(){

  // function sigPagina(pagina){
  //   $.ajax({
  //   type: 'POST',
  //   data: 'pagina='+pagina,
  //   url: 'control/paginacion.php',
  //   success: resultado => $('#datos_de_tabla').html(resultado)
  //   });
  // }

  function mostrar_anuncio(){
    $.ajax({
      url:`../control/mostrar_anuncio.php`,
      success: function(r){
        //console.log(r);
        $('#datos_tabla_anuncio').html(r);
      }
    });
  }

  mostrar_anuncio();


});