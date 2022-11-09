
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

CREATE TABLE `setor` (
    id int auto_increment NOT NULL primary key,
   nome varchar(255) NOT NULL,
   email varchar(255) NOT NULL
) 

INSERT INTO `setor` (nome, `email`) VALUES
('Biblioteca', 'biblioteca.porto@ifto.edu.br'),
('CAE (Coord. Assist. ao Estudante)', 'cae.porto@ifto.edu.br'),
('CDD (Conselho Disciplinar Discente)', ''),
('CIEC (Coord. de Integ. da Inst. c/ Empresa e Comunidade)', 'ciec.porto@ifto.edu.br'),
('Comissão Livro Didático', ''),
('Coord. Bacharelado em Administração (Superior)', 'administracao.porto@ifto.edu.br'),
('Coord. Bacharelado em Sistemas de Informação (Superior)', 'si.porto@ifto.edu.br'),
('Coord. FIC/PROEJA Assist. Administrativo', 'proeja.porto@ifto.edu.br'),
('Coord. Lic. em Computação (Superior)', 'cclc.porto@ifto.edu.br'),
('Coord. Lic. em Pedagogia (Superior)', 'ccp.porto@ifto.edu.br'),
('Coord. Téc. em Info. p/ Internet (Integrado)', 'ccmiinternet.porto@ifto.edu.br'),
('Coord. Técnico em Administração (Integrado)', 'ccmiadministracao.porto@ifto.edu.br'),
('Coord. Técnico em Informática (Subsequente)', 'ccts.porto@ifto.edu.br'),
('Coord. Técnico em Meio Ambiente (Integrado)', 'ccmiambiente.porto@ifto.edu.br'),
('Coord. Técnico em Vendas (subsequente)', 'ccts.porto@ifto.edu.br'),
('Coord. Tecnólogo em Logística (Superior)', 'cctl.porto@ifto.edu.br'),
('CORES (Coord. de Registros Escolares)', 'cores.portonacional@ifto.edu.br'),
('COTEPE (Coord. Téc. Pedagógica)', 'cotepe.portonacional@ifto.edu.br'),
('CPIE (Coord. de Pesq., Inovação e Extensão)', 'cpie.porto@ifto.edu.br'),
('DG (Direção-Geral)', 'portonacional@ifto.edu.br'),
('Enfermagem', 'cae.porto@ifto.edu.br'),
('Escritório Modelo', 'cctl.porto@ifto.edu.br'),
('GA (Gerência de Administração)', 'gam.portonacional@ifto.edu.br'),
('GE (Gerência de Ensino)', 'geren.portonacional@ifto.edu.br'),
('GE/Laboratórios de Ciências', 'geren.portonacional@ifto.edu.br'),
('NAPNE (Núcleo de Atend. às Pessoas c/ Neces. Específicas)', 'cae.porto@ifto.edu.br'),
('Protocolo', 'protoloco.porto@ifto.edu.br'),
('Serviço Social', 'cae.porto@ifto.edu.br'),
('TI (Coordenação de Tecnologia da Informação)', 'ti.porto@ifto.edu.br');


CREATE TABLE tipo_ocorrencia (
    id int nauto_increment not null primary key,
  tipo_ocorrencia varchar(255) NOT NULL,
  obs varchar(255) DEFAULT NULL
);
INSERT INTO tipo_ocorrencia (tipo_ocorrencia, `obs`) VALUES
('Assistência Estudantil', NULL),
('Comportamental', ''),
('Devolução Livro Didático', NULL),
('Entrega Livro Didático', NULL),
('Material Impresso', NULL),
('Pedagógica', ''),
('Pesquisa, Extensão e Inovação', NULL),
('Psicologia', ''),
('Registro Escolar', ''),
('Saúde', NULL),
('Serviço Social', '');

create table ocorrencia(
    id int auto_increment not null primary key,
    aluno int,
    tipo_ocorrencia int,
    descricao text,
    servidor varchar(255),
    setor_registro INT,
    setor_destino INT,
    data_ocorrencia timestamp,
    nome_aluno varchar(255),
    foreign key (aluno) references aluno (id),
    foreign key (tipo_ocorrencia) references tipo_ocorrencia (id),
    Foreign Key (setor_registro) REFERENCES setor (id), 
    Foreign Key (setor_destino) REFERENCES setor(id)
);