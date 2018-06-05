 
/*CREATE TABLE Administradores(
ID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(50) NOT NULL,
Apellidos VARCHAR(50) NOT NULL,
Email VARCHAR(100) NOT NULL,
Password VARCHAR(100) NOT NULL
);

CREATE TABLE Publicadores(

ID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(50) NOT NULL,
Apellidos VARCHAR(50) NOT NULL,
Territorio_asignado VARCHAR(50)
);

CREATE TABLE Territorios_Huetor_Vega(
ID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
Observaciones TEXT,
imagen BLOB,
asignado BOOLEAN
);

CREATE TABLE Territorios_Negocios(
ID INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
Observaciones TEXT,
imagen BLOB,
asignado BOOLEAN
);

CREATE TABLE Territorios_Zaidin(
ID INT(10)NOT NULL AUTO_INCREMENT PRIMARY KEY,
Observaciones TEXT,
imagen BLOB,
asignado BOOLEAN
);*/

/*ALTER TABLE publicadores
	ADD entrega VARCHAR(10) NOT NULL;
	ADD devuelta VARCHAR(10) NOT NULL;

ALTER TABLE Territorios
	ADD ultima_fecha VARCHAR(10);
	ALTER TABLE territorios DROP COLUMN observaciones*/

	
	ALTER TABLE publicadores 
	ADD devuelta2 VARCHAR(10);