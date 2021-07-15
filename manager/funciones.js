function alerta(titulo,text,icon){
  Swal.fire({
    title: titulo,
    text: text,
    icon: icon
  });
}

function validar_texto(cadena){
  expresion=/[^A-Za-z\s]/g;
  valor=cadena.match(expresion);
  //console.log(valor);
  return valor;
}

function validar_numero(cadena){
  expresion=/[^0-9]/g;
  valor=cadena.match(expresion);
  //console.log(valor);
  return valor;
}

function validar_correo(correo){
  expresion=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  valor=correo.match(expresion);
  console.log(valor);
  return valor;
}

function validar_fecha(fecha_nacimiento){
  const fecha = new Date();
  fecha_actual= fecha.getFullYear();
  fecha_arreglo=fecha_nacimiento.split("-");
  valor=fecha_actual-fecha_arreglo[0];
  // console.log(fecha_nacimiento);
  // console.log(fecha_actual);
  // console.log(fecha_arreglo[0]);
  // console.log(valor);
  return valor;
}

function validar_mobil(telefono){
  //telefono = parseInt(telefono);
  expresion=/^[5][5|6]{1}[\d]{8}$/;
  valor=telefono.match(expresion);
  //console.log(valor);
  return valor;
}

function validar_coordenada(coordenada){
  //console.log(coordenada);
  expresion=/^[-|\d]{1}[\d]*[.]{1}[\d]+$/;
  valor=coordenada.match(expresion);
  //console.log(valor);
  return valor;
}