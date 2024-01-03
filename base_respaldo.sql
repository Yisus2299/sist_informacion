/*es la misma base de datos pero por si acaso*/

CREATE TABLE clientes (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    Nombre VARCHAR(200) NOT NULL, 
    Apellido VARCHAR(200) NOT NULL, 
    Cedula INT(8) UNSIGNED ZEROFILL NOT NULL UNIQUE, 
    Departamento VARCHAR(100) NOT NULL, 
    Fecha DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
);

INSERT INTO clientes (Nombre, Apellido, Cedula, Departamento) 
VALUES ('Doris Maria', 'Perez Lopez', 30434525, 'Recursos Humanos'), 
       ('Jessie Jose', 'Perez Lopez', 30434526, 'Administracion'), 
       ('Jose Andres', 'Perez Lopez', 30434527, 'Personal');