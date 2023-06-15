use tcc;

CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(255) NOT NULL,
    cpf bigint (14),
    endereco VARCHAR (255) NOT NULL
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

drop table usuarios;
select * from usuarios;

CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(255),
    descricao VARCHAR(255),
    marca VARCHAR(200),
    categoria VARCHAR(255),
    preco DECIMAL(9, 2),
    quantidade_produto INT,
    imagem longblob,
    path varchar(255),
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

create table empresas (
id_empresa int primary key auto_increment,
nome varchar (255) not null,
endereco varchar (255) unique not null,
telefone varchar (25) unique not null,
cnpj varchar (20) unique not null,
email varchar (255) unique not null,
senha varchar (40) not null
);

drop table empresas;
select* from empresas;