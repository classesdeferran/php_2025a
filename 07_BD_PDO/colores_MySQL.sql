CREATE DATABASE colores;

USE colores;

CREATE TABLE colores (
id_color int NOT NULL AUTO_INCREMENT PRIMARY KEY,
usuario varchar(15) NOT NULL,
color varchar(15) NOT NULL
);

INSERT INTO colores (usuario, color) VALUES ("Son Goku", "green");
INSERT INTO colores (usuario, color) VALUES ("Bulma", "blue");
INSERT INTO colores (usuario, color) VALUES ("Vegeta", "red");