CREATE DATABASE hermes_enterprise;

USE hermes_enterprise;


CREATE TABLE menu(
	id int auto_increment primary key
);

CREATE TABLE usuarios(
	id int auto_increment primary key,
    codigo char(6) not null unique,
    CPF char(11) not null unique,
    nome varchar(45) not null,
    tipo varchar(45) not null,
    senha varchar(45) not null,
    email varchar(45) not null unique
);

    
CREATE TABLE trens(
	id int auto_increment primary key,
    velocidade varchar(45) not null,
    localizacao varchar(45),
    direcao varchar(45),
    horarios int
    );
    
CREATE TABLE rotas(
	id int auto_increment primary key,
    distancia int not null
    );
    
CREATE TABLE alerta(
	id int auto_increment primary key,
    destinatario varchar(45) not null,
    tipos varchar(45)
	);
    
CREATE TABLE relatorio(
	id int auto_increment primary key,
    tipo varchar(45) not null,
    destinatario varchar(45) not null
    );
    
CREATE TABLE manutencao(
	id int auto_increment primary key,
    destinatario varchar(45) not null,
    local varchar(45) not null
    );