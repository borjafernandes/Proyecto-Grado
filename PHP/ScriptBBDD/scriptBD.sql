-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS compracoche;

-- Crear la base de datos
CREATE DATABASE compracoche;

-- Seleccionar la base de datos
USE compracoche;

-- Crear la tabla de marca
CREATE TABLE IF NOT EXISTS marca (
    id INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Crear la tabla tipocombustible
CREATE TABLE IF NOT EXISTS tipocombustible (
    id INT PRIMARY KEY,
    descripcion VARCHAR(50) NOT NULL
);

-- Crear la tabla tipousuario
CREATE TABLE IF NOT EXISTS tipousuario (
    id INT PRIMARY KEY,
    descripcion VARCHAR(50) NOT NULL
);

-- Crear la tabla de distintivo
CREATE TABLE IF NOT EXISTS distintivo (
    id INT PRIMARY KEY,
    descripcion VARCHAR(10) NOT NULL UNIQUE
);

-- Crear la tabla de coche
CREATE TABLE IF NOT EXISTS coche (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    marca INT NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    fecha_fabricacion DATE NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    potencia INT NOT NULL,
    id_combustible INT NOT NULL,
    matricula VARCHAR(10) NOT NULL UNIQUE,
    observaciones VARCHAR(2000),
    id_distintivo INT NOT NULL,
    FOREIGN KEY (id_combustible) REFERENCES tipocombustible(id),
    FOREIGN KEY (marca) REFERENCES marca(id),
    FOREIGN KEY (id_distintivo) REFERENCES distintivo(id)
);

-- Crear la tabla de usuarios
CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    contrasenya VARCHAR(200) NOT NULL,
    id_tipousuario INT NOT NULL,
    FOREIGN KEY (id_tipousuario) REFERENCES tipousuario(id)
);

-- Insertar distintivos en la tabla de distintivo
INSERT INTO distintivo (id, descripcion) VALUES
(1, '0'),
(2, 'ECO'),
(3, 'C'),
(4, 'B');

-- Insertar tipos de usuario
INSERT INTO tipousuario (id, descripcion) VALUES
(1, 'administrador'),
(2, 'usuario');

-- Insertar usuario administrador en la tabla usuario
INSERT INTO usuario (usuario, contrasenya, id_tipousuario) VALUES
('borja', '$2y$10$M4O2q5pnNqk7K18Zt6V56Oh3s34SLxR99/XH.h37QNZutfhhEYNyO', 1),
('usuario', '$2y$10$7Bm9yTYiOqO7MEL3j1QYFeaYwIF6JtiM.o.nD5vKhmZdGGtDJ37mK', 2);

-- Insertar tipos de combustible
INSERT INTO tipocombustible (id, descripcion) VALUES
(1, 'Diesel'),
(2, 'Gasolina'),
(3, 'Hibrido'),
(4, 'Electrico'),
(5, 'GLP');

-- Insertar marcas en la tabla marca
INSERT INTO marca (id, nombre) VALUES
(1, 'Toyota'),
(2, 'Ford'),
(3, 'Honda'),
(4, 'Chevrolet'),
(5, 'Volkswagen'),
(6, 'BMW'),
(7, 'Mercedes-Benz'),
(8, 'Audi'),
(9, 'Hyundai'),
(10, 'Kia');

-- Insertar coches en la tabla coche
INSERT INTO coche (nombre, marca, modelo, fecha_fabricacion, precio, potencia, id_combustible, matricula, observaciones, id_distintivo) VALUES
('Corolla', 1, 'Modelo A', '2022-01-01', 15000.00, 100, 1, 'ABC1234', 'Un coche uy basico para el dia a dia.', 1),
('Fiesta', 1, 'Modelo B', '2023-02-11', 18000.00, 120, 2, 'BCD2345', NULL, 2),
('Civic', 2, 'Modelo C', '2021-10-01', 17000.00, 110, 1, 'CDE3456', NULL, 1),
('Spark', 2, 'Modelo D', '2022-10-01', 16000.00, 105, 3, 'DEF4567', 'Un coche electrico bastante bueno.', 3),
('Sonata', 3, 'Modelo E', '2023-01-01', 19000.00, 130, 2, 'EFG5678', NULL, 2),
('Sportage', 3, 'Modelo F', '2021-04-21', 15500.00, 100, 4, 'FGH6789', NULL, 1),
('Focus', 4, 'Modelo G', '2022-01-11', 16500.00, 108, 1, 'GHI7890', 'Es perfecto para cargar cosas.', 3),
('Yaris', 4, 'Modelo H', '2023-03-22', 18500.00, 125, 2, 'HIJ8901', NULL, 3),
('Accord', 5, 'Modelo I', '2021-02-11', 17500.00, 115, 3, 'IJK9012', NULL, 1),
('Cruze', 5, 'Modelo J', '2022-09-17', 16200.00, 102, 4, 'JKL0123', 'Es muy versatil', 3),
('Elantra', 6, 'Modelo K', '2023-09-15', 19500.00, 135, 1, 'KLM1234', NULL, 2),
('Jetta', 6, 'Modelo L', '2021-12-26', 15800.00, 98, 2, 'LMN2345', NULL, 1),
('Rio', 7, 'Modelo M', '2022-07-26', 16800.00, 106, 3, 'MNO3456', 'Puede ir por el agua', 4),
('Tucson', 7, 'Modelo N', '2023-08-09', 18000.00, 122, 4, 'NOP4567', NULL, 4),
('Camaro', 8, 'Modelo O', '2021-05-06', 17000.00, 110, 1, 'OPQ5678', NULL, 2),
('Mustang', 8, 'Modelo P', '2022-10-10', 16300.00, 103, 2, 'PQR6789', 'Un buen coche para irse de ruta con tus amigos.', 4),
('Paladra', 9, 'Modelo Q', '2023-08-10', 19200.00, 132, 3, 'QRS7890', NULL, 2),
('Sunmon', 9, 'Modelo R', '2021-08-08', 16000.00, 100, 4, 'RST8901', NULL, 3),
('Dragonitte', 10, 'Modelo S', '2022-11-08', 16700.00, 107, 1, 'STU9012', NULL, 4),
('Kyogre', 10, 'Modelo T', '2023-11-29', 18800.00, 127, 2, 'TUV0123', 'El mejor coche que se ha creado en la historia.', 4);
