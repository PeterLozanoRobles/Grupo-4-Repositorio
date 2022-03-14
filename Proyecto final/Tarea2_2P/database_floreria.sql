DROP DATABASE IF EXISTS `Floreria`;
CREATE DATABASE IF NOT EXISTS `Floreria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Floreria`;

create table Nosotros(
id int primary key auto_increment,
nombre varchar(50),
correo varchar(50),
sexo varchar(50),
formacionAcademica varchar(50)
);

create table Servicio(
id int primary key auto_increment,
nombre varchar(50),
correo varchar(50),
ciudad varchar(50),
tipoArreglo varchar(50)
);

CREATE TABLE `usuario` 
(IdUsuario INT NOT NULL AUTO_INCREMENT , 
`Nombre` VARCHAR(20) NOT NULL , 
`Email` VARCHAR(50) NOT NULL , 
`Sexo` VARCHAR(1) NOT NULL , 
`Password` VARCHAR(20) NOT NULL , 
`Confpassword` VARCHAR(20) NOT NULL , 
`Termino` VARCHAR(1) NOT NULL ,
 PRIMARY KEY (`IdUsuario`)) ENGINE = InnoDB;

 CREATE TABLE `Reservar` 
 ( `Id` INT NOT NULL AUTO_INCREMENT , 
 `Nombres` VARCHAR(20) NOT NULL , 
 `Apellidos` VARCHAR(20) NOT NULL , 
 `Email` VARCHAR(50) NOT NULL , 
 `Fecha` DATETIME NOT NULL ,
 PRIMARY KEY (`Id`)) ENGINE = InnoDB;
 
 CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `sucursal` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
 
select *from Nosotros;
select *from Servicio;
select *from usuario;
select *from sucursal;

-- alter table Noostros AUTO_INCREMENT=1;
-- drop table Noostros;