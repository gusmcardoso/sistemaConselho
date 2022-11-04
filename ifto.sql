
CREATE TABLE usuario(
    id int NOT NULL auto_increment primary key,
    nome varchar(220),
    email varchar(220) not null unique
);

create table vaga(
    id int auto_increment primary key,
    titulo varchar(100),
    descricao text,
    quantidade int,
    remuneracao decimal(7,2),
    data_abertura date,
    data_fechamento date,
    data timestamp
);

create table setor(
    id int auto_increment primary key,
    nome varchar(100)
);

insert into setor (nome) values ('CTI');
insert into setor (nome) values ('CAE');
insert into setor (nome) values ('COTEPE');

create table ocorrencia(
    id int auto_increment primary key,
    aluno int,
    descricao text,
    servidor varchar(255),
    setor_registro INT,
    setor_destino INT,
    data_ocorrencia timestamp,
    foreign key (aluno) references aluno (id),
    Foreign Key (setor_registro) REFERENCES setor (id), 
    Foreign Key (setor_destino) REFERENCES setor(id)
);