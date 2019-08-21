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
    status integer default 2,
);

create table endereco (
    id serial unique not null primary key,
    nome varchar,
    tipo varchar(60),
    logradouro varchar, 
    nro varchar(10),
    complemento varchar(60),
    bairro varchar(60),
    municipio varchar (60),
    uf varchar(2),
    cep varchar(8),
    obs varchar
);

create table usuario(
    id serial unique not null primary key,
    nome varchar, 
    apelido varchar(60),
    email varchar(120) unique not null,
    senha varchar,
    
);