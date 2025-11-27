CREATE DATABASE hermes_enterprise;

USE hermes_enterprise;

CREATE TABLE usuarios(
	id int auto_increment primary key,
    nome varchar(120) not null,
    data_nascimento varchar(45) not null,
    naturalidade varchar(45) not null,
    nacionalidade varchar(45) not null,
    estado_civil varchar(45) not null,
    tipo ENUM('Administrador','Usuario') not null,
    CPF char(11) not null unique,
    email varchar(120) not null unique,
    data_admissao varchar(45) not null,
    genero varchar(45) not null,
    codigo char(6) not null unique,
    senha varchar(255) not null
);

    
CREATE TABLE trens(
	id int auto_increment primary key,
    velocidade varchar(45) not null,
    localizacao varchar(45),
    direcao varchar(45),
    horarios int,
    codigo varchar(4)
    );
    
CREATE TABLE rotas(
	id int auto_increment primary key,
    distancia int not null
    );
    
CREATE TABLE alerta(
	id int auto_increment primary key,
    mensagem varchar(45) not null
	);
    
CREATE TABLE relatorios(
    id int auto_increment primary key,
    titulo varchar(45) not null,
    remetente int not null,
    mensagem varchar(400) not null,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (remetente) REFERENCES usuarios(id)
);
    
CREATE TABLE manutencao(
	id int auto_increment primary key,
    tipo enum('sem adversidades','RODAS','MOTOR','VAGÕES','FREIOS','SUSPENSÃO','ESTABILIDADE','OUTROS') not null,
    descricao text not null,
    id_trem int not null,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_trem) REFERENCES trens(id)
    );

CREATE TABLE carga(
    id int auto_increment primary key,
    conteúdo varchar(45)
);

CREATE TABLE aviso(
    id int auto_increment primary key,
    mensagem varchar(45) not null
);
CREATE TABLE ambiente(
    id int auto_increment primary key,
    temperatura int not null,
    umidade int not null
);

CREATE TABLE sensores(
    id int auto_increment primary key,
    presenca DATETIME DEFAULT CURRENT_TIMESTAMP,
    local enum("estação","rotatoria_começo","rotatoria_final","curva_final")
);
    
insert into usuarios (nome,data_nascimento,naturalidade,nacionalidade,estado_civil,tipo,CPF,email,data_admissao,genero,codigo,senha) values
('Mago', '01-11-2001', 'joiville-SC','Brasileiro', 'Solteiro', 'Administrador', '12345678901','mago@email.com','23-09-2025','Masculino','MAGO','$2y$10$gvfQKL9eD3Xi5K8VyWw0..LnWPtyfaAdaes9rs/mmB/6/FH680nHy'),
('Gustavo', '01-11-2001', 'joiville-SC','Brasileiro', 'Solteiro', 'Administrador', '12345678902','gustavo@email.com','23-09-2025','Masculino','GUS','$2y$10$aRM38Rq9IQ34mmO5gfobMea9PBQt.LlTh52h9jmy223.Yu7HGlXIa'),
('Kaua', '01-11-2001', 'joiville-SC','Brasileiro', 'Casado', 'Administrador', '12345678903','kaus@email.com','23-09-2025','Masculino','KAU','$2y$10$sRCCttFJsLYRQbhldcAOiORLPhA4QvdD6f7kXrHOaRuPa8Jkb20ru'),
('USER', '01-11-2001', 'joiville-SC','Brasileiro', 'Solteiro', 'Usuario', '12345678904','user@email.com','23-09-2025','Masculino','USER','$2y$10$lQ.0CrsqNDR93Z6ZPQP8reJA9t39Nd6IkyD9FkvS8UhRkkEzjvQhq');

insert into sensores (local) values
('estação'),
('rotatoria_começo'),
('rotatoria_final'),
('curva_final');
