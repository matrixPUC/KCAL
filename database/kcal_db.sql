CREATE DATABASE kcal_db;
USE kcal_db;

/*Criação da tabela de tipos de usuários*/
CREATE TABLE tipo_usuario(
  ID int(3) NOT NULL AUTO_INCREMENT,
  tipo varchar(20) NOT NULL,
  administrador BOOLEAN NOT NULL
) 

/*Criação da tabela de usuários*/
CREATE TABLE usuario (
  ID int(3) NOT NULL,
  nome varchar(100) NOT NULL,
  dataNasc date DEFAULT NULL,
  peso float(3,2) DEFAULT NULL,
  altura int(3) DEFAULT NULL,
  email varchar(100) NOT NULL,
  senha varchar(255) NOT NULL,
  tipo_usuario int(3) NOT NULL,

  PRIMARY KEY(ID),
  FOREIGN KEY(tipo_usuario) REFERENCES tipo_usuario(ID)
) 

/*Criação da tabela de nutricionista*/
CREATE TABLE nutricionista(
  ID int(3) NOT NULL AUTO_INCREMENT,
  crn int(7) NOT NULL UNIQUE,

  PRIMARY KEY(ID),
  FOREIGN KEY(ID) REFERENCES USUARIO(ID)
);