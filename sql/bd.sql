create database crud;
use crud;

create table telefonos(
  codigo int auto_increment primary key,
  nombre varchar(100),
  departamento varchar(100),
  numero int,
  anexo int,
  notas varchar(20)
);

create table departmaentos(
  nombre_depto varchar(100) primary key,
  codigo int
);

INSERT INTO telefonos(nombre, departamento, numero, anexo, notas) VALUES 
('Roger Gómez','Administrativo', 976534692, 2341, 'Nuevo Ingreso'),
('Antonio Martinez','Orden Publico', 943654321, 2311, 'Translado'),
('Mario Alvarez','Informatica', 998767561, 8672, 'CPR')

INSERT INTO departamentos(nombre_depto, codigo) VALUES 
('Administrativo', 1),
('Orden Publico', 2),
('Informatica', 3)