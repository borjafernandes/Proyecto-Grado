-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS CompraCoches;

-- Crear la base de datos
CREATE DATABASE CompraCoches;

-- Seleccionar la base de datos
USE CompraCoches;

-- Crear la tabla de marcas
CREATE TABLE IF NOT EXISTS Marcas (
    id_marca INT AUTO_INCREMENT PRIMARY KEY,
    nombre_marca VARCHAR(50) NOT NULL
);

-- Crear la tabla de coches
CREATE TABLE IF NOT EXISTS Coches (
    id_coche INT AUTO_INCREMENT PRIMARY KEY,
    nombre_coche VARCHAR(50) NOT NULL,
    marca INT NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    anio_fabricacion DATE NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    contrasenya VARCHAR(200) NOT NULL,
    tipo_usuario VARCHAR(50)
);

