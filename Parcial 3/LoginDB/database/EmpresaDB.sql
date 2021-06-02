create database empresa;
use empresa;
/*esta base de datos funciona tanto para el login como para el abc,
estos dos se unieron para el proyecto final*/
create table usuarios
( IdUsuario smallint(6) not null auto_increment,
  Nombre varchar(30) NOT NULL,
  Username varchar(30) NOT NULL,
  Password varchar(32) NOT NULL,
  PRIMARY KEY(IdUsuario)
);

select * from usuarios;
/* Username : sergio */
insert into usuarios (Nombre,Username,Password)
values ('Sergio Osto','sergio','e806c7f52ef664525540830abb7a10e4');   /*osto*/
/* Username : OsvOsto */
insert into usuarios (Nombre,Username,Password)
values ('Osvaldo Osto','OsvOsto','813cf45904530d6771caa7a6b6f1644e');   /*U1Osvaldo*/
/* Username : LizValdez */
insert into usuarios (Nombre,Username,Password)
values ('Lizandro Valdez','LizValdez','5b40068dc6389f05ed759e13cfc66c3b');   /*U2Lizandro*/
/* Username : JesVille */
insert into usuarios (Nombre,Username,Password)
values ('Jesús Villegas','JesVille','ce8f2d9471a75ff56620b29077df7839');   /*U3Jesus*/

create table clientes
( 
    id int(11) not null auto_increment,
    nombre varchar(30),
    edad int(11) NOT NULL,
    colonia varchar(30) NOT NULL,
    cyn varchar(50) NOT NULL,
    telefono varchar(10) NOT NULL,
    PRIMARY KEY(id)
);

select * from clientes;

INSERT INTO clientes (nombre, edad, colonia, cyn, telefono) 
VALUES('Sergio Osvaldo', 20, 'M. Cavazos', 'Pamoranes 3700', '8672308615');

INSERT INTO clientes (nombre, edad, colonia, cyn, telefono) 
VALUES('Adela Rojas', 60, 'Francisco Villa', 'madera 1231', '0987654321');

INSERT INTO clientes (nombre, edad, colonia, cyn, telefono) 
VALUES('Jesus Villegas', 21, 'Kilometros', 'Santa Virginia 444', '0987654327');

INSERT INTO clientes (nombre, edad, colonia, cyn, telefono) 
VALUES('Carlos Eugenio', 23, 'Villas San Miguel', 'Santa Virginia 690', '1234567890');