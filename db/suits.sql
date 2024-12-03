

CREATE DATABASE IF NOT EXISTS Suits DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE suits;

CREATE TABLE t_usuario (
  id_usuario int(11) NOT NULL AUTO_INCREMENT, -- ID de usuario único
  nombre varchar(200) NOT NULL,
  apellido varchar(200) NOT NULL,
  usuario varchar(255) NOT NULL,
  password text NOT NULL,
  rol enum('administrador', 'usuario') NOT NULL, -- Rol del usuario
  PRIMARY KEY (id_usuario) -- Definir la clave primaria
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE t_producto (
  id_producto int(11) NOT NULL AUTO_INCREMENT, -- ID único del juego
  producto varchar(200) NOT NULL, -- Nombre del juego
  precio varchar(100) NOT NULL, -- Plataforma del juego (PC, Xbox, PlayStation, etc.)
  unidades int(11) NOT NULL, -- Año de publicación del juego
  comentario TEXT NOT NULL, -- Sinopsis del juego
  imagen varchar(255) NOT NULL, -- URL de la imagen del juego
  PRIMARY KEY (id_producto) -- Definir la clave primaria
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;