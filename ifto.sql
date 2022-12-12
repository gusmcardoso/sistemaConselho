-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Dez-2022 às 15:48
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ifto`
--
CREATE DATABASE IF NOT EXISTS `ifto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ifto`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `telefone_responsavel` varchar(50) DEFAULT NULL,
  `email_institucional` varchar(50) DEFAULT NULL,
  `email_pessoal` varchar(50) DEFAULT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `periodo` varchar(10) DEFAULT NULL,
  `dtn` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `aluno`:
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

CREATE TABLE `notificacao` (
  `id` int(11) NOT NULL,
  `descricao` text DEFAULT NULL,
  `servidor` varchar(255) DEFAULT NULL,
  `aluno` int(11) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `notificacao`:
--   `aluno`
--       `aluno` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocorrencia`
--

CREATE TABLE `ocorrencia` (
  `id` int(11) NOT NULL,
  `aluno` int(11) DEFAULT NULL,
  `tipo_ocorrencia` int(11) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `servidor` varchar(255) DEFAULT NULL,
  `setor_registro` int(11) DEFAULT NULL,
  `setor_destino` int(11) DEFAULT NULL,
  `data_ocorrencia` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nome_aluno` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `ocorrencia`:
--   `aluno`
--       `aluno` -> `id`
--   `tipo_ocorrencia`
--       `tipo_ocorrencia` -> `id`
--   `setor_registro`
--       `setor` -> `id`
--   `setor_destino`
--       `setor` -> `id`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `setor`:
--

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`, `email`) VALUES
(1, 'Biblioteca', 'biblioteca.porto@ifto.edu.br'),
(2, 'CAE (Coord. Assist. ao Estudante)', 'cae.porto@ifto.edu.br'),
(3, 'CDD (Conselho Disciplinar Discente)', ''),
(4, 'CIEC (Coord. de Integ. da Inst. c/ Empresa e Comunidade)', 'ciec.porto@ifto.edu.br'),
(5, 'Comissão Livro Didático', ''),
(6, 'Coord. Bacharelado em Administração (Superior)', 'administracao.porto@ifto.edu.br'),
(7, 'Coord. Bacharelado em Sistemas de Informação (Superior)', 'si.porto@ifto.edu.br'),
(8, 'Coord. FIC/PROEJA Assist. Administrativo', 'proeja.porto@ifto.edu.br'),
(9, 'Coord. Lic. em Computação (Superior)', 'cclc.porto@ifto.edu.br'),
(10, 'Coord. Lic. em Pedagogia (Superior)', 'ccp.porto@ifto.edu.br'),
(11, 'Coord. Téc. em Info. p/ Internet (Integrado)', 'ccmiinternet.porto@ifto.edu.br'),
(12, 'Coord. Técnico em Administração (Integrado)', 'ccmiadministracao.porto@ifto.edu.br'),
(13, 'Coord. Técnico em Informática (Subsequente)', 'ccts.porto@ifto.edu.br'),
(14, 'Coord. Técnico em Meio Ambiente (Integrado)', 'ccmiambiente.porto@ifto.edu.br'),
(15, 'Coord. Técnico em Vendas (subsequente)', 'ccts.porto@ifto.edu.br'),
(16, 'Coord. Tecnólogo em Logística (Superior)', 'cctl.porto@ifto.edu.br'),
(17, 'CORES (Coord. de Registros Escolares)', 'cores.portonacional@ifto.edu.br'),
(18, 'COTEPE (Coord. Téc. Pedagógica)', 'cotepe.portonacional@ifto.edu.br'),
(19, 'CPIE (Coord. de Pesq., Inovação e Extensão)', 'cpie.porto@ifto.edu.br'),
(20, 'DG (Direção-Geral)', 'portonacional@ifto.edu.br'),
(21, 'Enfermagem', 'cae.porto@ifto.edu.br'),
(22, 'Escritório Modelo', 'cctl.porto@ifto.edu.br'),
(23, 'GA (Gerência de Administração)', 'gam.portonacional@ifto.edu.br'),
(24, 'GE (Gerência de Ensino)', 'geren.portonacional@ifto.edu.br'),
(25, 'GE/Laboratórios de Ciências', 'geren.portonacional@ifto.edu.br'),
(26, 'NAPNE (Núcleo de Atend. às Pessoas c/ Neces. Específicas)', 'cae.porto@ifto.edu.br'),
(27, 'Protocolo', 'protoloco.porto@ifto.edu.br'),
(28, 'Serviço Social', 'cae.porto@ifto.edu.br'),
(29, 'TI (Coordenação de Tecnologia da Informação)', 'ti.porto@ifto.edu.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_ocorrencia`
--

CREATE TABLE `tipo_ocorrencia` (
  `id` int(11) NOT NULL,
  `tipo_ocorrencia` varchar(255) NOT NULL,
  `obs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `tipo_ocorrencia`:
--

--
-- Extraindo dados da tabela `tipo_ocorrencia`
--

INSERT INTO `tipo_ocorrencia` (`id`, `tipo_ocorrencia`, `obs`) VALUES
(1, 'Assistência Estudantil', NULL),
(2, 'Comportamental', ''),
(3, 'Devolução Livro Didático', NULL),
(4, 'Entrega Livro Didático', NULL),
(5, 'Material Impresso', NULL),
(6, 'Pedagógica', ''),
(7, 'Pesquisa, Extensão e Inovação', NULL),
(8, 'Psicologia', ''),
(9, 'Registro Escolar', ''),
(10, 'Saúde', NULL),
(11, 'Serviço Social', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `usuarios`:
--

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'Gustavo Martins Cardoso', 'gmcardoso', '$2y$10$tTtF9ueCMKl0bPNbcpCXRO6HuAZGloYLJM9b0tqPnpyzK6HJqykhq'),
(3, 'Gustavo Martins Cardoso', 'gmcardoso_', '$2y$10$i1TjvSq9Q5M1KXPwDPX40eh75A9q/zazljToZzVGXyakh05K25LRK'),
(7, 'João Pedro', 'admin', '$2y$10$Y9dvYonuiqe1cJu5FNJmE.i8GXWyqdxBMciMMKfLXidW.vKNGJ6sa'),
(8, 'Gustavo Martins Cardoso', 'gusmcardoso', '$2y$10$LD60.IrqxseVnNVTGghWreqtY63mvnMnqLSLGmWHYA/MeIYTHEcam');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vaga`
--

CREATE TABLE `vaga` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `remuneracao` decimal(7,2) DEFAULT NULL,
  `data_abertura` date DEFAULT NULL,
  `data_fechamento` date DEFAULT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELACIONAMENTOS PARA TABELAS `vaga`:
--

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`);

--
-- Índices para tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno` (`aluno`);

--
-- Índices para tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno` (`aluno`),
  ADD KEY `tipo_ocorrencia` (`tipo_ocorrencia`),
  ADD KEY `setor_registro` (`setor_registro`),
  ADD KEY `setor_destino` (`setor_destino`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipo_ocorrencia`
--
ALTER TABLE `tipo_ocorrencia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices para tabela `vaga`
--
ALTER TABLE `vaga`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacao`
--
ALTER TABLE `notificacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tipo_ocorrencia`
--
ALTER TABLE `tipo_ocorrencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `vaga`
--
ALTER TABLE `vaga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `notificacao_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`id`);

--
-- Limitadores para a tabela `ocorrencia`
--
ALTER TABLE `ocorrencia`
  ADD CONSTRAINT `ocorrencia_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `ocorrencia_ibfk_2` FOREIGN KEY (`tipo_ocorrencia`) REFERENCES `tipo_ocorrencia` (`id`),
  ADD CONSTRAINT `ocorrencia_ibfk_3` FOREIGN KEY (`setor_registro`) REFERENCES `setor` (`id`),
  ADD CONSTRAINT `ocorrencia_ibfk_4` FOREIGN KEY (`setor_destino`) REFERENCES `setor` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
