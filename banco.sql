create table notificacao(
    id int auto_increment not null primary key,
    descricao text,
    servidor varchar(255),
    aluno int,
    foreign key (aluno) references aluno (id)
);