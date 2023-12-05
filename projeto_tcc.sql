-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/12/2023 às 02:48
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_avaliacao`
--

CREATE TABLE `tb_avaliacao` (
  `ID` int(11) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `avaliacao_chm_id` int(11) NOT NULL,
  `avaliacao_responsavel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_avaliacao`
--

INSERT INTO `tb_avaliacao` (`ID`, `avaliacao`, `comentario`, `avaliacao_chm_id`, `avaliacao_responsavel`) VALUES
(2, 5, 'Muito bom.', 1, 6),
(3, 5, 'Otimo Atendimento', 2, 4),
(4, 5, 'Otimo Atendimento!', 5, 5),
(5, 5, 'Foi Otimo atendimento, tecnico era bastante simpático', 6, 22),
(7, 3, 'Pessimo atendimento, mas solucionou o problema', 9, 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_chamados`
--

CREATE TABLE `tb_chamados` (
  `ID` int(5) NOT NULL,
  `titulo` mediumtext NOT NULL,
  `descricao` text NOT NULL,
  `id_status` int(5) NOT NULL,
  `id_localizacao` int(5) NOT NULL,
  `id_setor_atribuido` int(5) DEFAULT NULL,
  `id_tec_atribuido` int(5) DEFAULT NULL,
  `id_requerente` int(5) NOT NULL,
  `data_incial` datetime NOT NULL,
  `data_final` datetime DEFAULT NULL,
  `id_prioridade` int(5) NOT NULL,
  `fechamento` tinyint(1) DEFAULT NULL,
  `status_avaliacao` tinyint(1) DEFAULT NULL,
  `id_usuario_criou` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_chamados`
--

INSERT INTO `tb_chamados` (`ID`, `titulo`, `descricao`, `id_status`, `id_localizacao`, `id_setor_atribuido`, `id_tec_atribuido`, `id_requerente`, `data_incial`, `data_final`, `id_prioridade`, `fechamento`, `status_avaliacao`, `id_usuario_criou`) VALUES
(1, 'Titulo 1', '  Descrição Titulo 1  ', 4, 3, 3, 12, 6, '2023-09-27 13:58:00', '2023-10-18 10:09:00', 1, 0, 1, 2),
(2, 'Titulo 2', '  Descricao do Titulo 2  ', 4, 3, 3, 4, 4, '2023-09-27 13:59:00', '2023-10-18 10:25:00', 3, 1, 1, 2),
(5, 'Titulo 3', ' Descrição do titulo 3 ', 4, 2, 2, 10, 5, '2023-09-27 11:17:00', '2023-10-18 10:09:00', 1, 1, 1, 2),
(6, 'Fazer Café', 'Ninguem quer fazer café. Apenas tomar.', 4, 2, 3, 18, 22, '2023-09-27 11:48:00', '2023-10-18 10:09:00', 1, 1, 1, 2),
(9, 'Titulo 5', ' Descrição titulo 5 ', 4, 1, 1, 12, 4, '2023-09-28 15:28:00', '2023-10-23 14:19:00', 1, 1, 1, 2),
(11, 'ads', 'ds', 4, 2, 2, 12, 6, '0000-00-00 00:00:00', '2023-10-23 14:46:00', 4, 0, 0, 2),
(15, 'Titulo 15', '  Descricão do Titulo 15  ', 2, 2, 2, 12, 6, '0000-00-00 00:00:00', '1969-12-31 21:00:00', 4, NULL, 0, 2),
(17, 'ads', 'ds', 3, 2, 2, 12, 6, '0000-00-00 00:00:00', NULL, 4, NULL, 0, 2),
(18, 'ads', 'ds', 3, 2, 2, 12, 6, '0000-00-00 00:00:00', NULL, 4, NULL, 0, 2),
(66, 'impressora', 'adicionar atalho da impressora para servidora', 3, 3, 1, 10, 14, '0000-00-00 00:00:00', NULL, 4, NULL, 0, 2),
(67, 'impressora', 'adicionar atalho da impressora para servidora', 3, 3, 1, 10, 14, '0000-00-00 00:00:00', NULL, 4, NULL, 0, 2),
(68, 'impressora', 'adicionar atalho da impressora para servidora', 3, 3, 1, 10, 14, '0000-00-00 00:00:00', NULL, 4, NULL, 0, 2),
(69, 'Titulo 69', 'adicionar atalho da impressora para servidora', 3, 3, 1, 10, 14, '0000-00-00 00:00:00', NULL, 4, NULL, 0, 2),
(95, 'Titulo 13234', 'Descrição do titulo 1234', 1, 2, 2, 5, 5, '2023-09-29 10:56:00', NULL, 1, NULL, 0, 2),
(96, 'Cadastro', 'Cadastrar o que esta descrito no manual do servidor.', 1, 2, 2, 5, 6, '2023-09-29 10:56:00', NULL, 1, NULL, 0, 2),
(194, 'Titulo 7879', 'Quero cadastra alguma coisa aqui..', 1, 1, 1, 4, 4, '2023-09-29 11:29:00', NULL, 3, NULL, 0, 2),
(195, 'A', 'k.gjkfkgvk.jhgt', 2, 1, 3, 5, 17, '2023-10-03 09:04:00', NULL, 2, NULL, 0, 2),
(196, 'titulo 654', 'Descrição do titulo 654', 1, 2, 1, 4, 21, '2023-10-06 11:21:00', NULL, 1, NULL, 0, 2),
(197, 'Titulo 197', 'Descrição do Titulo 197', 1, 2, 2, 5, 6, '2023-10-15 19:12:00', '1969-12-31 21:00:00', 2, NULL, 0, 2),
(198, 'aa bb cc dd ee ff gg hh ff', 'aaaaaaaaaaaaaaaaaaaaaaa bbbbbbbbbbbbbbbbbbb cccccccccccccccccccccc dddddddddddd\r\neeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeee ffffffffffffffffffffffffffffffffffffffffff gggggggggggggg\r\nhhhhhhhhhhhhhhhhhhhhh iiiiiiiiiiiiiiiiiiiiiiiiiii', 2, 1, 1, 4, 4, '2023-10-16 14:45:00', NULL, 4, NULL, 0, 2),
(199, 'Estou aqui.', 'Estou aqui mais um sobre o olhar sangrinario do vigia, vc não sabe o que caminhar sobre a mira de um AK', 2, 3, 3, 18, 17, '2023-10-18 09:03:00', NULL, 2, NULL, 0, 2),
(206, 'teste', 'teste', 1, 1, 1, NULL, 24, '2023-10-19 15:27:00', NULL, 1, NULL, 0, 24),
(207, 'Impressora', 'Liberar acesso a impressora para o usuário', 4, 1, 2, 5, 23, '2023-10-19 15:34:00', '2023-10-19 15:35:00', 1, NULL, 0, 24),
(208, 'Titulo 208', 'Descricao 208', 2, 1, 1, 4, 4, '2023-11-03 15:14:00', NULL, 1, NULL, 0, 2),
(209, 'Titulo 230', 'Descricao do Titulo 230', 2, 3, 3, 4, 10, '2023-11-03 15:15:00', NULL, 4, NULL, 0, 2),
(210, 'teste33', 'teste33', 2, 3, 2, 4, 4, '2023-11-03 18:28:00', NULL, 6, NULL, 0, 4),
(211, 'teste 44', 'teste 344', 2, 2, 2, 10, 6, '2023-11-03 18:29:00', NULL, 2, NULL, 0, 4),
(212, 'teste 55', 'teste 55', 2, 2, 3, 12, 5, '2023-11-03 18:31:00', NULL, 6, NULL, 0, 4),
(213, 'TTIILLOO 1234', 'Descricao, descricao TTIILLOO 1234', 2, 2, 3, 10, 5, '2023-11-05 16:04:00', NULL, 2, 0, 0, 2),
(216, 'testesttetsts', 'teststsetststests', 1, 2, 1, NULL, 6, '2023-12-03 14:53:00', NULL, 1, NULL, 0, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_permissao`
--

CREATE TABLE `tb_permissao` (
  `id` int(11) NOT NULL,
  `permissao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_permissao`
--

INSERT INTO `tb_permissao` (`id`, `permissao`) VALUES
(1, 'padrao'),
(2, 'técnico'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_prioridades_chamados`
--

CREATE TABLE `tb_prioridades_chamados` (
  `id` int(5) NOT NULL,
  `prioridade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_prioridades_chamados`
--

INSERT INTO `tb_prioridades_chamados` (`id`, `prioridade`) VALUES
(1, 'Critica'),
(2, 'Muito Alta'),
(3, 'Alta'),
(4, 'Media'),
(5, 'Baixa'),
(6, 'Muito Baixa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_setor`
--

CREATE TABLE `tb_setor` (
  `id` int(5) NOT NULL,
  `nome_setor` varchar(255) NOT NULL,
  `localizacao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_setor`
--

INSERT INTO `tb_setor` (`id`, `nome_setor`, `localizacao`) VALUES
(1, 'Suporte ao Usuário', 'Sala 101A, Bloco A'),
(2, 'Infraestrutura', 'Sala 102A, Bloco A'),
(3, 'Desenvolvimento', 'Sala 103A (1 andar)'),
(4, 'Telecom', 'Sala 101, Subsolo 1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_solucao`
--

CREATE TABLE `tb_solucao` (
  `id` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `tecnico_id` int(11) NOT NULL,
  `solution_chamado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_solucao`
--

INSERT INTO `tb_solucao` (`id`, `descricao`, `tecnico_id`, `solution_chamado_id`) VALUES
(2, 'Solução do Chamado de Titulo 3 feito pelo user admin 2.', 2, 5),
(3, 'Solução do Chamado de Titulo 1, finalizado com sucesso !!!', 2, 1),
(4, 'sdfkdskfsdk', 2, 6),
(9, 'Solução do chamado de Titulo 2 foi criado com sucesso !!!!', 2, 2),
(10, 'Chamado feito a liberação do Acesso a impressora.', 24, 207),
(12, ' Chamado foi finalizado, por admin meu parabens!!', 2, 9),
(14, 'Esotu finalizado o chamado!!', 2, 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_status_chamados`
--

CREATE TABLE `tb_status_chamados` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_status_chamados`
--

INSERT INTO `tb_status_chamados` (`id`, `status`) VALUES
(1, 'Novo'),
(2, 'Atribuido'),
(3, 'Pendente'),
(4, 'Solucionado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tarefa_pendentes`
--

CREATE TABLE `tb_tarefa_pendentes` (
  `ID` int(11) NOT NULL,
  `Descricao` text NOT NULL,
  `data_tarefa` datetime NOT NULL,
  `tecnico_tarefa` int(11) NOT NULL,
  `setor_tarefa` int(11) NOT NULL,
  `tarefa_chamado_id` int(11) NOT NULL,
  `usuario_que_criou_tarefa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_tarefa_pendentes`
--

INSERT INTO `tb_tarefa_pendentes` (`ID`, `Descricao`, `data_tarefa`, `tecnico_tarefa`, `setor_tarefa`, `tarefa_chamado_id`, `usuario_que_criou_tarefa`) VALUES
(5, 'Tarefa do titulo 5 precisa ser feito no setor de telecom 2', '2023-10-23 14:15:00', 18, 2, 9, 2),
(6, 'Sera encaminhada para o Desenvolvimento pois eu falha na rede interna', '2023-10-23 14:18:00', 5, 3, 9, 2),
(7, ' 111111 ', '2023-10-23 14:33:00', 4, 1, 11, 2),
(8, '222222222', '2023-10-23 14:46:00', 10, 3, 11, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(10) NOT NULL,
  `Primeiro_nome` varchar(100) NOT NULL,
  `Sobrenome` varchar(100) NOT NULL,
  `Contato` varchar(20) DEFAULT NULL,
  `id_setor` int(5) DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_nivel_perm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `Primeiro_nome`, `Sobrenome`, `Contato`, `id_setor`, `usuario`, `senha`, `email`, `id_nivel_perm`) VALUES
(2, 'Hiagho', 'Oliveira', '(62)99267-2545', 2, 'admin                                           ', 'YWRtaW4xMjM=', 'admin@solvelink.online', 3),
(4, 'Joao', 'Pereira', '(62)91346-7488', 3, 'joao.pereira  ', 'MTIzNDU2Nzg5', 'joao@gmail.com', 3),
(5, 'joao', 'banzai', '62941637496', 3, 'joao.banzai', 'MTIzNDU2Nzg4', 'joao@gmail.com', 2),
(6, 'aaaaaaa', 'bbbbbbb', '62992672545', 2, 'aaa.bbb', 'MTIzNDU2Nzg3', 'jhiagho@gmail.com', 2),
(10, 'gustavo', 'directa', '(11)11111-1111', 1, 'gustavo.directa', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'directa@gmail.com', 2),
(11, 'Eliel', 'Lucas', '(62)99268-1469', 1, 'eliel.silva', '03b2a1eb6100845951f4cf87f949495937c355a5', 'eliel.lucas3000@gmail.com', 1),
(12, 'arthur', 'magalhaes', '62911112222', 1, 'arthur.magalhaes', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'arthur@gmail.com', 2),
(14, 'vinicios', 'lima', '(11)11111-1111', 3, 'vini.delas', '7c222fb2927d828af22f592134e8932480637c0d', 'vini@gmail.com', 1),
(15, 'Junim', 'Blei', '(55)55555-5555', 1, 'junim.blei', 'e4d7ed1e22820135f92b3ed7190a935659a1de15', 'junim@gmail.com', 1),
(16, 'Lucas', 'Queiroz', '(62)99635-9144', 1, 'ademir', '7c222fb2927d828af22f592134e8932480637c0d', 'firemanarg@gmail.com', 1),
(17, 'Dayana', 'Pamplona', '(62)99913-5802', 1, 'dscpamplona', '7c222fb2927d828af22f592134e8932480637c0d', 'day@gmail.com', 1),
(18, 'Marquinho', 'Duplay', '62992471122', 1, 'marquinho.duplay', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'marquinho.duplay@gmail.com', 2),
(21, 'Jose', 'Freitas', '(62)98121-4402', 2, 'Jose.Freitas', '7c222fb2927d828af22f592134e8932480637c0d', 'jluiz.freitas@gmail.com', 1),
(22, 'Euler ', 'carvalho', '(62)98406-9585', 1, 'Euler.carvalho', '40bdf0d5260a19ff25474603ce016bc5e74854fd', 'eulergagagagag@gmail.com', 1),
(23, 'Euler', 'Carvalho', '(99)99999-9999', 1, 'Euler.cintra', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'teste@gagsdfads.com', 1),
(24, 'vinicios', 'lima', '(31)27361-2836', 1, 'vini.lima', '7c222fb2927d828af22f592134e8932480637c0d', 'vini@gmail.com', 1),
(25, 'Gomes', 'oliveira', '(62)99999-9999', 4, 'Gomes.oliveira', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'gomes@gmail.com', 1),
(26, 'Higor', 'Ferreira', '(62)98250-6984', 3, 'higor.ferreira', 'ad74302eb54a3c0bc9153bb939ce4e4a089a13cf', 'hfashigor@hotmail.com', 1),
(27, 'vitor', 'monteiro', '(62)98156-5613', 1, 'vitor.monteiro23', 'MTIzNzg5NDU2', 'vitor.monteiro@hotmail.com', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fhk_avaliacao_usuario` (`avaliacao_responsavel`),
  ADD KEY `fhk_chamados_avalicao` (`avaliacao_chm_id`);

--
-- Índices de tabela `tb_chamados`
--
ALTER TABLE `tb_chamados`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fhk_status` (`id_status`),
  ADD KEY `fhk_localizacao` (`id_localizacao`),
  ADD KEY `fhk_setorAtribuido` (`id_setor_atribuido`),
  ADD KEY `fhk_requerente` (`id_requerente`),
  ADD KEY `fhk_tec_atribuido` (`id_tec_atribuido`),
  ADD KEY `fhk_prioridade` (`id_prioridade`),
  ADD KEY `fhk_usuario_criou` (`id_usuario_criou`);

--
-- Índices de tabela `tb_permissao`
--
ALTER TABLE `tb_permissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_prioridades_chamados`
--
ALTER TABLE `tb_prioridades_chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_setor`
--
ALTER TABLE `tb_setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_solucao`
--
ALTER TABLE `tb_solucao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fhk_tecnico_solution` (`tecnico_id`),
  ADD KEY `fhk_chamado_solution` (`solution_chamado_id`);

--
-- Índices de tabela `tb_status_chamados`
--
ALTER TABLE `tb_status_chamados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_tarefa_pendentes`
--
ALTER TABLE `tb_tarefa_pendentes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fhk_tarefa_pendente` (`tarefa_chamado_id`),
  ADD KEY `fhk_tecnico_tarefa` (`tecnico_tarefa`),
  ADD KEY `fhk_setor_tarefa` (`setor_tarefa`),
  ADD KEY `fkh_criou_tarefa` (`usuario_que_criou_tarefa`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `id_setor_fk` (`id_setor`),
  ADD KEY `id_nivel_perm_fk` (`id_nivel_perm`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_chamados`
--
ALTER TABLE `tb_chamados`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT de tabela `tb_permissao`
--
ALTER TABLE `tb_permissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_prioridades_chamados`
--
ALTER TABLE `tb_prioridades_chamados`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_setor`
--
ALTER TABLE `tb_setor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_solucao`
--
ALTER TABLE `tb_solucao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tb_status_chamados`
--
ALTER TABLE `tb_status_chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_tarefa_pendentes`
--
ALTER TABLE `tb_tarefa_pendentes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_avaliacao`
--
ALTER TABLE `tb_avaliacao`
  ADD CONSTRAINT `fhk_avaliacao_usuario` FOREIGN KEY (`avaliacao_responsavel`) REFERENCES `tb_usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fhk_chamados_avalicao` FOREIGN KEY (`avaliacao_chm_id`) REFERENCES `tb_chamados` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_chamados`
--
ALTER TABLE `tb_chamados`
  ADD CONSTRAINT `fhk_localizacao` FOREIGN KEY (`id_localizacao`) REFERENCES `tb_setor` (`id`),
  ADD CONSTRAINT `fhk_prioridade` FOREIGN KEY (`id_prioridade`) REFERENCES `tb_prioridades_chamados` (`id`),
  ADD CONSTRAINT `fhk_requerente` FOREIGN KEY (`id_requerente`) REFERENCES `tb_usuarios` (`id`),
  ADD CONSTRAINT `fhk_setorAtribuido` FOREIGN KEY (`id_setor_atribuido`) REFERENCES `tb_setor` (`id`),
  ADD CONSTRAINT `fhk_status` FOREIGN KEY (`id_status`) REFERENCES `tb_status_chamados` (`id`),
  ADD CONSTRAINT `fhk_tec_atribuido` FOREIGN KEY (`id_tec_atribuido`) REFERENCES `tb_usuarios` (`id`),
  ADD CONSTRAINT `fhk_usuario_criou` FOREIGN KEY (`id_usuario_criou`) REFERENCES `tb_usuarios` (`id`);

--
-- Restrições para tabelas `tb_solucao`
--
ALTER TABLE `tb_solucao`
  ADD CONSTRAINT `fhk_chamado_solution` FOREIGN KEY (`solution_chamado_id`) REFERENCES `tb_chamados` (`ID`),
  ADD CONSTRAINT `fhk_tecnico_solution` FOREIGN KEY (`tecnico_id`) REFERENCES `tb_usuarios` (`id`);

--
-- Restrições para tabelas `tb_tarefa_pendentes`
--
ALTER TABLE `tb_tarefa_pendentes`
  ADD CONSTRAINT `fhk_setor_tarefa` FOREIGN KEY (`setor_tarefa`) REFERENCES `tb_setor` (`id`),
  ADD CONSTRAINT `fhk_tarefa_pendente` FOREIGN KEY (`tarefa_chamado_id`) REFERENCES `tb_chamados` (`ID`),
  ADD CONSTRAINT `fhk_tecnico_tarefa` FOREIGN KEY (`tecnico_tarefa`) REFERENCES `tb_usuarios` (`id`),
  ADD CONSTRAINT `fkh_criou_tarefa` FOREIGN KEY (`usuario_que_criou_tarefa`) REFERENCES `tb_usuarios` (`id`);

--
-- Restrições para tabelas `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_setor`) REFERENCES `tb_setor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_usuarios_ibfk_2` FOREIGN KEY (`id_nivel_perm`) REFERENCES `tb_permissao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
