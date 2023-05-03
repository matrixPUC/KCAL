CREATE DATABASE kcal_db;
USE kcal_db;

/*Criação da tabela de tipos de usuários*/
CREATE TABLE tipo_usuario(
  ID int(3) NOT NULL AUTO_INCREMENT,
  tipo varchar(20) NOT NULL,

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
  celular varchar(20) NOT NULL,
  tipo_usuario int(3) NOT NULL,
  validado TINYINT(1) NOT NULL,

  PRIMARY KEY(ID),
  FOREIGN KEY(tipo_usuario) REFERENCES tipo_usuario(ID)
); 

/*Criação da tabela de nutricionista*/
CREATE TABLE nutricionista(
  ID_usuario int(3) NOT NULL,
  crn varchar(20) NOT NULL UNIQUE,

  PRIMARY KEY(ID_usuario),
  FOREIGN KEY(ID_usuario) REFERENCES usuario(ID)
);

CREATE TABLE ingrediente(
  ID int(3) NOT NULL AUTO_INCREMENT,
  nome varchar(100) NOT NULL,
  calorias INT NOT NULL,
  quantidadePadrao FLOAT NOT NULL,
  porcao varchar(50) NOT NULL,

  PRIMARY KEY(ID)
);

CREATE TABLE receita(
  ID int(3) NOT NULL AUTO_INCREMENT,
  ID_usuario int NOT NULL,
  nome varchar(100) NOT NULL,
  descricao varchar(200) NOT NULL,
  public TINYINT(1) NOT NULL,
  passo_a_passo TEXT NOT NULL,

  PRIMARY KEY(ID),
  FOREIGN KEY(ID_usuario) REFERENCES usuario(ID)
);

create table receita_ingrediente(
  ID_receita int NOT NULL,
  ID_ingrediente int NOT NULL,
    
  FOREIGN KEY(ID_receita) REFERENCES receita(ID),
  FOREIGN KEY(ID_ingrediente) REFERENCES ingrediente(ID)
);

INSERT INTO tipo_usuario(tipo) VALUES ('kcaller');
INSERT INTO tipo_usuario(tipo) VALUES ('nutricionista');
INSERT INTO tipo_usuario(tipo) VALUES ('administrador');

INSERT INTO usuario(nome, dataNasc, peso, altura, email, senha, tipo_usuario, validado) VALUES('joao', '2023-04-23', 100.0, 190.0, 'joao@gmail.com', 'Abc123!', 1, 1);
INSERT INTO usuario(nome, dataNasc, peso, altura, email, senha, tipo_usuario, validado) VALUES('adm😎', '2023-04-23', 100.0, 190.0, 'adm@gmail.com', 'Abc123!', 3, 1);

INSERT INTO ingrediente(nome, calorias, quantidadePadrao, porcao) VALUES ('Farinha', 364, 100, 'gramas');
INSERT INTO ingrediente(nome, calorias, quantidadePadrao, porcao) VALUES ('Ovo', 82, 1, 'unidade');

