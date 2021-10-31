CREATE DATABASE pw_bd_arquivos;

USE pw_bd_arquivos;  

CREATE TABLE tb_produto(
  id_produto INT auto_increment NOT NULL PRIMARY KEY,
  descricao VARCHAR (30),
  imagem VARCHAR(100)
);