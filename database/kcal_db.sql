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
  /*foto longblob NOT NULL,*/

  PRIMARY KEY(ID),
  FOREIGN KEY(tipo_usuario) REFERENCES tipo_usuario(ID)
); 

/*Criação da tabela de nutricionista*/
CREATE TABLE nutricionista(
  ID_usuario int(3) NOT NULL,
  crn varchar(8) NOT NULL UNIQUE,

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
  quantidade FLOAT NOT NULL,
    
  FOREIGN KEY(ID_receita) REFERENCES receita(ID),
  FOREIGN KEY(ID_ingrediente) REFERENCES ingrediente(ID)
);

/*Populando as tabelas*/

INSERT INTO tipo_usuario(tipo) VALUES 
('kcaller'), 
('nutricionista'),
('administrador');

INSERT INTO usuario(nome, dataNasc, peso, altura, email, senha, celular, tipo_usuario, validado) VALUES
('joao', '2023-04-23', 100.0, 190.0, 'joao@gmail.com', 'Abc123!', '41999990000', 1, 1),
('adm😎', '2023-04-23', 100.0, 190.0, 'adm@gmail.com', 'Abc123!', '30305050', 3, 1),
('lohine', '2000-04-23', 60.0, 160.0, 'lohine@gmail.com', 'Abc123!', '41999990000', 1, 1),
('bruno', '2003-04-23', 90.0, 175.0, 'bruno@gmail.com', 'Abc123!', '41999990000', 2, 1),
('beatriz', '1997-10-20', 65.0, 151.0, 'beatriz@gmail.com', 'Abc@123', '41999943781', 2, 1);

INSERT INTO nutricionista(ID_usuario, crn) VALUES
(3, 'PR12345'),
(4, 'PR66633');

INSERT INTO ingrediente(nome, calorias, quantidadePadrao, porcao) VALUES 
('Farinha', 364, 100, 'gramas'),
('Ovo', 82, 1, 'unidade'),
('Óleo', 1927, 1, 'xícara'),
('Cenoura', 41, 100, 'gramas'),
('Açúcar', 774, 100, 'gramas'),
('Fermento em pó', 12, 1, 'colher'),
('Manteiga', 100, 1, 'colher'),
('Chocolate em pó', 65, 1, 'colher'),
('Leite', 130, 1, 'xícara'),
('Café solúvel', 4, 1, 'colher'),
('Arroz japonês', 204, 1, 'xícara'),
('Vinagre de arroz', 16, 1, 'xícara'),
('Atum em óleo', 130, 1, 'lata'),
('Alga Nori', 35, 1, 'unidade'),
('Água', 0, 1, 'xícara'),
('Água', 0, 1, 'colher'),
('Água', 0, 100, 'ml'),
('Sal', 0, 1, 'colher');

INSERT INTO receita(ID_usuario, nome, descricao, public, passo_a_passo) VALUES
(5, 'Bolo de Cenoura com Cobertura de Chocolate', 'Bolo fofinho de cenoura com uma cobertura crocante de chocolate', 1, 'Massa: Em um liquidificador, adicione a cenoura, os ovos e o óleo, depois misture. Acrescente o açúcar e bata novamente por 5 minutos. Em uma tigela ou na batedeira, adicione a farinha de trigo e depois misture novamente. Acrescente o fermento e misture lentamente com uma colher. Asse em um forno preaquecido a 180° C por aproximadamente 40 minutos. Cobertura: Despeje em uma tigela a manteiga, o chocolate em pó, o açúcar e o leite, depois misture. Leve a mistura ao fogo e continue misturando até obter uma consistência cremosa, depois despeje a calda por cima do bolo.'),
(5, 'Creme de café', 'Cappuccino de Colher', 1, 'Colocar na batedeira todos os ingredientes e bater por 5 a 10 minutos até formar um creme pastoso. Para beber é só utilizar uma ou duas colheres do creme em uma xícara e acrescentar leite quente. Fica uma delícia e muito cremoso. Outra opção é acrescentar uma pitada de canela e uma colher de chocolate em pó. Fica muito parecido com um cappuccino. Se preferir, pode beber gelado!'),
(5, 'Oniguiri de Atum', 'Bolinho de arroz japonês recheado com atum', 1, 'Deixe o arroz de molho por 30 minutos, depois lave bem até a água ficar cristalina. Então coloque no fogo brando com tampa até secar e ficar bem inchado. Misture o vinagre o sal e açúcar, até dissolver bem. Coloque o arroz ainda quente em uma bacia plástica e vá despejando devagar a mistura de vinagre mexendo com movimentos rápidos com o ventilador ligado para esfriar, não deixar ficar melado. Depois de frio, pegue uma porção de arroz e abra na mão com se fosse uma panqueca. Recheie com atum e feche modelando um triângulo. Enrole na folha de nori e já está pronto!');

INSERT INTO receita_ingrediente(ID_receita, ID_ingrediente, quantidade) VALUES
/*'Bolo de Cenoura com Cobertura de Chocolate'*/
(4, 3, 0.5),
(4, 4, 3),
(4, 2, 4),
(4, 5, 1.5),
(4, 1, 3.6),
(4, 6, 1),
(4, 7, 1),
(4, 8, 1),
(4, 9, 1),
/*'Creme de café'*/
(5, 10, 6),
(5, 5, 1),
(5, 18, 2),
/*'Oniguiri de Atum'*/
(6, 11, 2),
(6, 15, 3),
(6, 12, 0.5),
(6, 5, 0.6),
(6, 17, 1),
(6, 13, 2),
(6, 14, 8);