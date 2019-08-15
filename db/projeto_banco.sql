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
    nome 
);