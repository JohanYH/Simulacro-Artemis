CREATE DATABASE alquilartemisA;

use alquilartemisA;

CREATE TABLE users(
    idUser INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR (80) NOT NULL,
    email VARCHAR (500) NOT NULL,
    password VARCHAR (100) NOT NULL
);

CREATE TABLE empleado(
    idEmpleado INT PRIMARY KEY AUTO_INCREMENT,
    nombreEmpleado VARCHAR (100) NOT NULL,
    telefonoEmpleado VARCHAR(100) NOT NULL
);

CREATE TABLE constructoras(
    idContructura INT PRIMARY KEY AUTO_INCREMENT,
    nombreConstructora VARCHAR (100) NOT NULL,
    telefonoConstructora VARCHAR(100) NOT NULL
);

CREATE TABLE cotizacion(
    idCotizacion INT PRIMARY KEY AUTO_INCREMENT,
    idEmpleado INT NOT NULL,
    idContructura INT NOT NULL,
    fecha VARCHAR (100) NOT NULL,
    total VARCHAR (100) NOT NULL,
    FOREIGN KEY (idEmpleado) REFERENCES empleado (idEmpleado),
    FOREIGN KEY (idContructura) REFERENCES constructoras (idContructura)
);

CREATE TABLE productos(
    idProductos INT PRIMARY KEY AUTO_INCREMENT,
    idCotizacion INT NOT NULL,
    nombreProductos VARCHAR (100) NOT NULL,
    cantidadProductos VARCHAR (100) NOT NULL,
    duracionDia VARCHAR (100) NOT NULL,
    precioDia VARCHAR (100) NOT NULL,
    FOREIGN KEY (idCotizacion) REFERENCES cotizacion(idCotizacion)
);