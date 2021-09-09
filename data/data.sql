CREATE DATABASE evaluacion_data;

USE evaluacion_data;

CREATE TABLE catalogos(
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_menu VARCHAR(100) NOT NULL UNIQUE,
    descripcion_menu TEXT NOT NULL,
    depencencia_id MEDIUMINT NULL
);

ALTER TABLE catalogos
ADD CONSTRAINT FK_menu_dependencia
FOREIGN KEY (depencencia_id)
REFERENCES catalogos(id);