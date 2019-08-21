/**
* Banco de Dados do sistema PartnerManager v1.0
* Author:  Neto
* Created: 15/08/2019
*/


/**
* Cadastro da Associação
*/

create table entidade (
    id serial unique not null primary key,
    razao varchar,
    fantasia varchar,
    cnpj bigint,
    obs text,
    status integer default 2
);

create table endereco_entidade (
    id serial unique not null primary key,
    entidade integer references entidade(id),
    nome varchar,
    tipo varchar(60),
    logradouro varchar, 
    nro varchar(10),
    complemento varchar(60),
    bairro varchar(60),
    municipio varchar (60),
    uf varchar(2),
    cep varchar(8),
    obs text,
    status integer default 2
);

create table usuario(
    id serial unique not null primary key,
    nome varchar, 
    apelido varchar(60),
    email varchar(120) unique not null,
    cpf bigint unique,
    celular varchar(15),
    senha varchar,
    status integer default 2,
    obs text
);

insert into usuario(nome, apelido, email, cpf, celular, senha) values ('Claudio Neto', 'Neto', 'claudiorcneto@gmail.com', 00468168958, '47 8425-2559', '562cb08c67d35b1445ba1f7ef0ac8ef91fe0705f0e16480fdc697b618c19c83e');