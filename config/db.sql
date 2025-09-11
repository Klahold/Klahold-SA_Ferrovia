CREATE DATABASE hermes_enterprise;

USE hermes_enterprise;


CREATE TABLE menu(
	id int primary key not null
);

CREATE TABLE usuarios(
	id int primary key not null,
    codigo char(6) not null,
    CPF char(11) not null,
    nome varchar(45) not null,
    tipo varchar(45) not null,
    senha varchar(45) not null
);

    
CREATE TABLE trens(
	id int primary key not null,
    velocidade varchar(45) not null,
    localizacao varchar(45),
    direcao varchar(45),
    horarios int
    );
    
CREATE TABLE rotas(
	id int primary key not null,
    distancia int not null
    );
    
CREATE TABLE alerta(
	id int primary key not null,
    destinatario varchar(45) not null,
    tipos varchar(45)
	);
    
CREATE TABLE relatorio(
	id int primary key not null,
    tipo varchar(45) not null,
    destinatario varchar(45) not null
    );
    
CREATE TABLE manutencao(
	id int primary key not null,
    destinatario varchar(45) not null,
    local varchar(45) not null
    );