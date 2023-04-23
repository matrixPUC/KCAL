CREATE DATABASE kcal_db;
USE kcal_db;

/*Criação da tabela de tipos de usuários*/
CREATE TABLE tipo_usuario(
  ID int(3) NOT NULL AUTO_INCREMENT,
  tipo varchar(20) NOT NULL,
  administrador BOOLEAN NOT NULL,

  PRIMARY KEY(ID)
);

/*Criação da tabela de usuários*/
CREATE TABLE usuario (
  ID int(3) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  dataNasc varchar(50) DEFAULT NULL,
  peso float DEFAULT NULL,
  altura int(3) DEFAULT NULL,
  email varchar(100) NOT NULL,
  senha varchar(255) NOT NULL,
  tipo_usuario int(3) NOT NULL,

  PRIMARY KEY(ID),
  FOREIGN KEY(tipo_usuario) REFERENCES tipo_usuario(ID)
); 

/*Criação da tabela de nutricionista*/
CREATE TABLE nutricionista(
  ID int(3) NOT NULL,
  crn int(7) NOT NULL UNIQUE,

  PRIMARY KEY(ID),
  FOREIGN KEY(ID) REFERENCES USUARIO(ID)
);

INSERT INTO tipo_usuario(tipo, administrador) VALUES ('kcaller', false);
INSERT INTO tipo_usuario(tipo, administrador) VALUES ('nutricionista', false);
INSERT INTO tipo_usuario(tipo, administrador) VALUES ('administrador', true);

INSERT INTO usuario(nome, dataNasc, peso, altura, email, senha, tipo_usuario) VALUES('joao', '2023-04-23', 100.0, 190.0, 'joao@gmail.com', 'Abc123!', 1);