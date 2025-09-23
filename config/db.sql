CREATE DATABASE hermes_enterprise;

USE hermes_enterprise;


CREATE TABLE menu(
	id int auto_increment primary key
);

CREATE TABLE usuarios(
	id int auto_increment primary key,
    nome varchar(45) not null,
    data_nascimento varchar(45) not null,
    naturalidade varchar(45) not null,
    nacionalidade varchar(45) not null,
    estado_civil varchar(45) not null,
    tipo ENUM('Administrador','Usuario') not null,
    CPF int not null unique,
    email varchar(45) not null unique,
    data_admissao varchar(45) not null,
    genero varchar(45) not null,
    codigo char(6) not null unique,
    senha varchar(45) not null
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
    remetente varchar(45) not null
	);
    
CREATE TABLE relatorios(
	id int auto_increment primary key,
    tipo varchar(45) not null,
    remetente int not null,
    mensagem varchar (220) not null,
    FOREIGN KEY (remetente) REFERENCES usuarios(id)
    );
    
CREATE TABLE manutencao(
	id int auto_increment primary key,
    destinatario varchar(45) not null,
    local varchar(45) not null
    );

CREATE TABLE carga(
    id int auto_increment primary key,
    conteúdo varchar(45)
);
    
insert into usuarios (name,data_nascimento,naturalidade,nacionalidade,estado_civil,tipo,CPF,email,data_admissao,genero,codigo,senha) values
('Mago', '01-11-2001', 'joiville-SC', 'Solteiro', 'Administrador', '12345678901','mago@email.com','23-09-2025','Masculino','MAGO','1234'),
('GUS', '01-11-2001', 'joiville-SC', 'Solteiro', 'Administrador', '12345678902','gustavo@email.com','23-09-2025','Masculino','GUS','1234'),
('KAU', '01-11-2001', 'joiville-SC', 'Casado', 'Administrador', '12345678903','kaus@email.com','23-09-2025','Masculino','KAU','1234'),
('USER', '01-11-2001', 'joiville-SC', 'Solteiro', 'Usuario', '12345678904','user@email.com','23-09-2025','Masculino','USER','1234');