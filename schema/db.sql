create database renta;
use renta;

create table usuario(
  id int not null auto_increment primary key,
  usuario varchar(255),
  nombre varchar(255),
  apellido varchar(255),
  correo varchar(255),
  pass varchar(255)
);

create table usuario_venta(
  id int not null auto_increment primary key,
  usuario varchar(255),
  telefono varchar (255),
  terminos boolean
);


create table departamentos(
  id int not null auto_increment primary key,
  usuario varchar(255),
  titulo varchar(255),
  precio varchar(255),
  tipo varchar(255),
  servicios varchar(255),
  descripcion varchar(255),
  imagenes longblob,
  latitud varchar(255),
  longitud varchar(255),
  estatus varchar(255)
)
 

create table renta_tiempo(
  id int not null primary key,
  propietario varchar(255),
  usuario varchar(255),
  costo_mes varchar(255)
)