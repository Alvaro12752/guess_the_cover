DROP DATABASE IF EXISTS guess_the_cover;

CREATE DATABASE guess_the_cover;

USE guess_the_cover;

/* TABLA DE USUARIO */
CREATE TABLE usuario (
	idUsuario INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(100) NOT NULL,
	usuario VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
    contraseña VARCHAR(100) NOT NULL, /* Prepared to store encrypted passwords using password_hash() with PASSWORD_BCRYPT flag */
	rol int DEFAULT NULL,
	imagen_url VARCHAR(255),
	PRIMARY KEY (idUsuario)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* Creates first admin user */
INSERT INTO usuario (nombre, usuario, email, contraseña, rol) VALUES
    ("Alvaro","Dhraktar","alvaro12752@gmail.com","123123", 2);
INSERT INTO usuario (nombre, usuario, email, contraseña, rol) VALUES
    ("Hector","Dolnivat","hector@gmail.com","123123", 1);
	INSERT INTO usuario (nombre, usuario, email, contraseña, rol) VALUES
    ("Jona","Fantmoc","jona@gmail.com","123123", 1);
	INSERT INTO usuario (nombre, usuario, email, contraseña, rol) VALUES
    ("Jesus","Orochimaru","Jesus@gmail.com","123123", 1);
	INSERT INTO usuario (nombre, usuario, email, contraseña, rol) VALUES
    ("Santiago","Griffith","Santiago@gmail.com","123123", 1);
	INSERT INTO usuario (nombre, usuario, email, contraseña, rol) VALUES
    ("Naruto","Naruto","Naruto@gmail.com","123123", 1);
	INSERT INTO usuario (nombre, usuario, email, contraseña, rol) VALUES
    ("Casca","Casca","Guts@gmail.com","123123", 1);

CREATE TABLE Juegos(
	IdJuego INT NOT NULL AUTO_INCREMENT,
	NombreJuego VARCHAR(100) NOT NULL,
  	PRIMARY KEY (IdJuego)
);
INSERT INTO Juegos (NombreJuego) VALUES ("VideoJuegos");
INSERT INTO Juegos (NombreJuego) VALUES ("Peliculas");

 /* TABLA DE PUNTUACIONES */
CREATE TABLE puntuacion (
	idRelacion INT NOT NULL,
	partida INT NOT NULL AUTO_INCREMENT,
    puntuacion INT NOT NULL,
	idJuego INT NOT NULL,
	PRIMARY KEY (partida),
	FOREIGN KEY (idRelacion) REFERENCES usuario(idUsuario),
	FOREIGN KEY (idJuego) REFERENCES Juegos(IdJuego)
);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (1, 100, 1);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (2, 23, 1);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (3, 4, 1);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (4, 33, 1);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (5, 22, 1);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (6, 35, 1);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (7, 5, 1);

INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (1, 100, 2);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (2, 54, 2);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (3, 23, 2);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (4, 22, 2);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (5, 11, 2);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (6, 4, 2);
INSERT INTO puntuacion (idRelacion, puntuacion, idJuego) VALUES (7, 18, 2);


CREATE TABLE roles (
    idRol INT NOT NULL AUTO_INCREMENT,
    rol VARCHAR(100) NOT NULL,
    PRIMARY KEY (idRol)
);
INSERT INTO roles (rol) VALUES ("Usuario");
INSERT INTO roles (rol) VALUES ("Admin");

