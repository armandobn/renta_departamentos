
function precarga_anuncio(id) {

  $.ajax({
    type: 'POST',
    data: "id=" + id,
    url: 'control/precarga_anuncio.php',
    success: function (r) {
      //console.log(r);
      //convertimos r a un objeto json valido
      datos_precarga = jQuery.parseJSON(r);
      $('#update_id').val(datos_precarga['id']);
      $('#update_titulo').val(datos_precarga['titulo']);
      $('#update_precio').val(datos_precarga['precio']);
      $('#update_tipo').val(datos_precarga['tipo']);
      console.log(datos_precarga['tipo']);
      servicio = datos_precarga['servicios'];
      $('#update_descripcion').val(datos_precarga['descripcion']);
      $('#update_status').val(datos_precarga['status']);
      $('#update_latitud').val(datos_precarga['latitud']);
      $('#update_longitud').val(datos_precarga['longitud']);
      servicioDivido = servicio.split('_');
      // console.log(servicio);
      // console.log(servicioDivido);

      if (servicioDivido[0] == "1") {
        document.getElementById("update_ser_cochera").checked = true;
      } else {
        document.getElementById("update_ser_cochera").checked = false;
      }
      if (servicioDivido[1] == "1") {
        document.getElementById("update_ser_mascota").checked = true;
      } else {
        document.getElementById("update_ser_mascota").checked = false;
      }
      if (servicioDivido[2] == "1") {
        document.getElementById("update_ser_internet").checked = true;
      } else {
        document.getElementById("update_ser_internet").checked = false;
      }
      if (servicioDivido[3] == "1") {
        document.getElementById("update_ser_cable").checked = true;
      } else {
        document.getElementById("update_ser_cable").checked = false;
      }

    }
  });
}

function actualiza_anuncio() {
  if ($('#update_titulo').val() == "") {
    alerta('Error!', 'Ingresa Titulo', 'error');
    return false;
  } else if ($('#update_precio').val() == "") {
    alerta('Error!', 'Ingresa Precio', 'error');
    return false;
  } else if ($('#update_tipo').val() == "") {
    alerta('Error!', 'Ingresa Tipo(Casa/Cuarto)', 'error');
    return false;
  } else if ($('#update_descripcion').val() == "") {
    alerta('Error!', 'Ingresa Descripcion', 'error');
    return false;
  } else if($('#update_latitud').val()==""){
    alerta('Error!', 'Ingresa Latitud', 'error');
    return false;
  } else if($('#update_longitud').val()==""){
    alerta('Error!', 'Ingresa Longitud', 'error');
    return false;
  }

  //validacion
  capturado = validar_texto($('#update_titulo').val());
  if (capturado != null) {
    alerta('Error!', 'Solo Texto los siguientes caracteres no son validos:\n\n'
      + capturado, 'error');
    return false;
  }

  capturado = validar_numero($('#update_precio').val());
   if (capturado != null) {
    alerta('Error!', 'Solo Numeros los siguientes caracteres no son validos:\n\n'
     + capturado, 'error');
     return false;
   }

  capturado = validar_coordenada($('#update_latitud').val());
  if (capturado == null) {
    alerta('Error!', 'En Latitud no es una coordinada valida', 'error');
     return false;
  }

  capturado = validar_coordenada($('#update_longitud').val());
   if (capturado == null) {
     alerta('Error!', 'En Longitud no es una coordinada valida', 'error');
     return false;
   }
    


  let form_data = new FormData($('#form_update_anuncio')[0]);
  $.ajax({
    type: 'POST',
    data: form_data,
    url: 'control/update_anuncio.php',
    contentType: false,
    processData: false,
    success: function (r) {

      if (r == 1) {
        mostrar_anuncio_usuario();
        alerta('Perfecto!', 'Actualizado', 'success');
        return false;
      } else {
        console.log(r);
        alerta('Error!', 'Algo Salio mal', 'error');
        return false;
      }
    }

  });

}

function mostrar_anuncio_usuario() {
  $.ajax({
    url: 'control/mostrar_anuncio_usuario.php',
    success: function (r) {
      $('#datos_tabla_anuncio_usuario').html(r);
    }
  });
}

function mostrar_perfil() {
  $.ajax({
    url: 'control/mostrar_perfil.php',
    success: function (r) {
      $('#datos_tabla_perfil').html(r);
    }
  });
}

function eliminar_anuncio(id) {
  Swal.fire({
    title: '¿Estas Seguro?',
    text: "¡No podrás revertir esto!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, bórralo!'
  }).then((result) => {
    if (result.value) {

      $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: 'control/eliminar_anuncio.php',
        success: function (r) {
          //console.log(r);
          if (r == 1) {
            mostrar_anuncio_usuario();
            alerta('Perfecto!', 'Eliminado', 'success');
            return false;
          } else {
            alerta('Error!', 'Algo Salio mal', 'error');
            return false;
          }
        }
      });

    }
  });
  return false;
}

$(document).ready(function () {


  mostrar_perfil();
  mostrar_anuncio_usuario();

  $('#btn_anuncio').click(function () {

    if ($('#regis_telefono').val() == "") {
      alerta('Error!', 'Ingresa Telefono', 'error');
      return false;
    } else if (document.getElementById("terminos").checked == false) {
      alerta('Error!', 'Debes Aceptar los Terminos y Condiciones', 'error');
      return false;
    }
    // console.log(document.getElementById("terminos").checked);

    //validacion
    capturado = validar_mobil($('#regis_telefono').val());
    if (capturado == null) {
      alerta('Error!', 'Debes tener solamente 10 digitos\n' +
        'Recuerda que en la zona metropolitana los numeros inician con 55 o 56\n' +
        'Ejemplo: 5511509700\n', 'error');
      return false;
    }


    let info = "telefono=" + $('#regis_telefono').val() +
      "&terminos=" + document.getElementById("terminos").checked;

    $.ajax({
      type: 'POST',
      url: 'control/usuario_anunciante.php',
      data: info,
      success: function (r) {
        console.log(r);
        if (r == 1) {
          window.location = "usuario";
          alerta('Perfecto!', 'Volviste Anunciador', 'success');

          return false;
        } else {
          alerta('Error!', 'Algo Salio mal', 'error');
          return false;
        }
      }
    });

  });

  $('#btn_agregar_anuncio').click(function () {

    if ($('#regis_titulo').val() == "") {
      alerta('Error!', 'Ingresa Titulo', 'error');
      return false;
    } else if ($('#regis_precio').val() == "") {
      alerta('Error!', 'Ingresa Precio', 'error');
      return false;
    } else if ($('#regis_tipo').val() == "") {
      alerta('Error!', 'Ingresa Tipo(Casa/Cuarto)', 'error');
      return false;
    } else if ($('#regis_descripcion').val() == "") {
      alerta('Error!', 'Ingresa Descripcion', 'error');
      return false;
    } else if($('#regis_latitud').val()==""){
      alerta('Error!', 'Ingresa Latitud', 'error');
      return false;
    } else if($('#regis_longitud').val()==""){
      alerta('Error!', 'Ingresa Longitud', 'error');
      return false;
    }

    //validacion
    capturado = validar_texto($('#regis_titulo').val());
    if (capturado != null) {
      alerta('Error!', 'Solo Texto los siguientes caracteres no son validos:\n\n'
        + capturado, 'error');
      return false;
    }

    capturado = validar_numero($('#regis_precio').val());
    if (capturado != null) {
      alerta('Error!', 'Solo Numeros los siguientes caracteres no son validos:\n\n'
      + capturado, 'error');
      return false;
    }
 
    capturado = fileValidation();
    if (capturado == false) {
      alerta('Error!', 'Solo Imegenes con extencion .jpeg/.jpg/.png/.gif', 'error');
      return false;
    }

    capturado = validar_coordenada($('#regis_latitud').val());
    if (capturado == null) {
      alerta('Error!', 'En Latitud no es una coordinada valida', 'error');
      return false;
    }

    capturado = validar_coordenada($('#regis_longitud').val());
    if (capturado == null) {
      alerta('Error!', 'En Longitud no es una coordinada valida', 'error');
      return false;
    }
    


    // let info="regis_titulo="+$('#regis_titulo').val()+
    //           "&regis_precio="+$('#regis_precio').val()+
    //           "&regis_tipo="+$('#regis_tipo').val()+
    //           "&regis_descripcion="+$('#regis_descripcion').val()+
    //           "&regis_imagen"+document.getElementById('regis_imagen').files[0];

    let form_data = new FormData($('#form_agregar_anuncio')[0]);
    $.ajax({
      type: 'POST',
      url: 'control/agregar_anuncio.php',
      data: form_data,
      contentType: false,
      processData: false,
      success: function (r) {
        // console.log(r);
        if (r == 1) {
          console.log(r);
          $('#form_agregar_anuncio')[0].reset();
          mostrar_anuncio_usuario();
          alerta('Perfecto!', 'Registrado', 'success');
          //window.location="usuario";
          return false;
        } else {
          // console.log(r);
          alerta('Error!', 'Algo Salio mal', 'error');
          return false;
        }

      }
    });

  });




});
