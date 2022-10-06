CREATE DATABASE rubrica;

USE rubrica;

CREATE TABLE contatto (
    ID              INT AUTO_INCREMENT,
    Nome            VARCHAR(50),
    Cognome         VARCHAR(50),
    DataNascita     DATE,
    telefono        VARCHAR(15),
    Mail            VARCHAR(55),

    PRIMARY KEY (ID)
);  