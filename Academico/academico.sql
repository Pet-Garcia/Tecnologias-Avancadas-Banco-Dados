-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/04/2026 às 21:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `academico`
--
CREATE DATABASE IF NOT EXISTS `academico` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `academico`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `ra` int(16) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` char(16) NOT NULL,
  `telefone` char(16) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`ra`, `nome`, `cpf`, `telefone`, `email`) VALUES
(1001, 'João Pedro', '123.456.789-00', '', ''),
(1002, 'Maria Clara', '234.567.890-11', '', ''),
(1003, 'Lucas Santos', '345.678.901-22', '', ''),
(1004, 'Beatriz Oliveira', '456.789.012-33', '', ''),
(1005, 'Gabriel Rocha', '567.890.123-44', '', ''),
(1006, 'Ana Souza', '123.456.789-01', '11987654321', 'ana.souza@email.com'),
(1007, 'Bruno Lima', '234.567.890-12', '11976543210', 'bruno.lima@email.com'),
(1008, 'Carla Mendes', '345.678.901-23', '11965432109', 'carla.mendes@email.com'),
(1009, 'Daniel Rocha', '456.789.012-34', '11954321098', 'daniel.rocha@email.com'),
(1010, 'Eduarda Alves', '567.890.123-45', '11943210987', 'eduarda.alves@email.com'),
(1011, 'Felipe Santos', '678.901.234-56', '11932109876', 'felipe.santos@email.com'),
(1012, 'Gabriela Costa', '789.012.345-67', '11921098765', 'gabriela.costa@email.com'),
(1013, 'Henrique Martins', '890.123.456-78', '11910987654', 'henrique.martins@email.com'),
(1014, 'Isabela Ferreira', '901.234.567-89', '11899887766', 'isabela.ferreira@email.com'),
(1015, 'João Carvalho', '012.345.678-90', '11888776655', 'joao.carvalho@email.com'),
(1016, 'Karina Ribeiro', '135.246.357-91', '11877665544', 'karina.ribeiro@email.com'),
(1017, 'Lucas Pereira', '246.357.468-92', '11866554433', 'lucas.pereira@email.com'),
(1018, 'Mariana Gomes', '357.468.579-93', '11855443322', 'mariana.gomes@email.com'),
(1019, 'Nicolas Teixeira', '468.579.680-94', '11844332211', 'nicolas.teixeira@email.com'),
(1020, 'Olivia Barros', '579.680.791-95', '11833221100', 'olivia.barros@email.com'),
(1021, 'Rafael Moreira', '111.222.333-01', '11990000001', 'rafael.moreira@email.com'),
(1022, 'Juliana Castro', '111.222.333-02', '11990000002', 'juliana.castro@email.com'),
(1023, 'Pedro Henrique', '111.222.333-03', '11990000003', 'pedro.henrique@email.com'),
(1024, 'Amanda Lopes', '111.222.333-04', '11990000004', 'amanda.lopes@email.com'),
(1025, 'Thiago Ribeiro', '111.222.333-05', '11990000005', 'thiago.ribeiro@email.com'),
(1026, 'Larissa Gomes', '111.222.333-06', '11990000006', 'larissa.gomes@email.com'),
(1027, 'Diego Alves', '111.222.333-07', '11990000007', 'diego.alves@email.com'),
(1028, 'Patricia Nunes', '111.222.333-08', '11990000008', 'patricia.nunes@email.com'),
(1029, 'Fernando Souza', '111.222.333-09', '11990000009', 'fernando.souza@email.com'),
(1030, 'Camila Rocha', '111.222.333-10', '11990000010', 'camila.rocha@email.com'),
(1031, 'Gustavo Lima', '111.222.333-11', '11990000011', 'gustavo.lima@email.com'),
(1032, 'Aline Martins', '111.222.333-12', '11990000012', 'aline.martins@email.com'),
(1033, 'Bruno Freitas', '111.222.333-13', '11990000013', 'bruno.freitas@email.com'),
(1034, 'Renata Carvalho', '111.222.333-14', '11990000014', 'renata.carvalho@email.com'),
(1035, 'Eduardo Teixeira', '111.222.333-15', '11990000015', 'eduardo.teixeira@email.com'),
(1036, 'Vanessa Barros', '111.222.333-16', '11990000016', 'vanessa.barros@email.com'),
(1037, 'Marcelo Dias', '111.222.333-17', '11990000017', 'marcelo.dias@email.com'),
(1038, 'Paula Fernandes', '111.222.333-18', '11990000018', 'paula.fernandes@email.com'),
(1039, 'Rodrigo Pinto', '111.222.333-19', '11990000019', 'rodrigo.pinto@email.com'),
(1040, 'Simone Batista', '111.222.333-20', '11990000020', 'simone.batista@email.com'),
(1041, 'Leonardo Campos', '111.222.333-21', '11990000021', 'leonardo.campos@email.com'),
(1042, 'Tatiane Moraes', '111.222.333-22', '11990000022', 'tatiane.moraes@email.com'),
(1043, 'Alexandre Cunha', '111.222.333-23', '11990000023', 'alexandre.cunha@email.com'),
(1044, 'Bianca Rezende', '111.222.333-24', '11990000024', 'bianca.rezende@email.com'),
(1045, 'Carlos Henrique', '111.222.333-25', '11990000025', 'carlos.henrique@email.com'),
(1046, 'Daniela Pires', '111.222.333-26', '11990000026', 'daniela.pires@email.com'),
(1047, 'Fábio Araujo', '111.222.333-27', '11990000027', 'fabio.araujo@email.com'),
(1048, 'Gabriela Duarte', '111.222.333-28', '11990000028', 'gabriela.duarte@email.com'),
(1049, 'Hugo Tavares', '111.222.333-29', '11990000029', 'hugo.tavares@email.com'),
(1050, 'Isadora Monteiro', '111.222.333-30', '11990000030', 'isadora.monteiro@email.com'),
(1051, 'Joana Farias', '111.222.333-31', '11990000031', 'joana.farias@email.com'),
(1052, 'Kleber Moura', '111.222.333-32', '11990000032', 'kleber.moura@email.com'),
(1053, 'Livia Peixoto', '111.222.333-33', '11990000033', 'livia.peixoto@email.com'),
(1054, 'Mateus Neves', '111.222.333-34', '11990000034', 'mateus.neves@email.com'),
(1055, 'Natália Queiroz', '111.222.333-35', '11990000035', 'natalia.queiroz@email.com'),
(1056, 'Otávio Borges', '111.222.333-36', '11990000036', 'otavio.borges@email.com'),
(1057, 'Priscila Cardoso', '111.222.333-37', '11990000037', 'priscila.cardoso@email.com'),
(1058, 'Rogério Lopes', '111.222.333-38', '11990000038', 'rogerio.lopes@email.com'),
(1059, 'Sabrina Melo', '111.222.333-39', '11990000039', 'sabrina.melo@email.com'),
(1060, 'Tiago Duarte', '111.222.333-40', '11990000040', 'tiago.duarte@email.com'),
(1061, 'Ursula Nogueira', '111.222.333-41', '11990000041', 'ursula.nogueira@email.com'),
(1062, 'Vitor Sales', '111.222.333-42', '11990000042', 'vitor.sales@email.com'),
(1063, 'Wesley Ramos', '111.222.333-43', '11990000043', 'wesley.ramos@email.com'),
(1064, 'Xavier Freire', '111.222.333-44', '11990000044', 'xavier.freire@email.com'),
(1065, 'Yasmin Coelho', '111.222.333-45', '11990000045', 'yasmin.coelho@email.com'),
(1066, 'Zeca Andrade', '111.222.333-46', '11990000046', 'zeca.andrade@email.com'),
(1067, 'Adriana Luz', '111.222.333-47', '11990000047', 'adriana.luz@email.com'),
(1068, 'Bernardo Cruz', '111.222.333-48', '11990000048', 'bernardo.cruz@email.com'),
(1069, 'Claudia Paiva', '111.222.333-49', '11990000049', 'claudia.paiva@email.com'),
(1070, 'Douglas Vieira', '111.222.333-50', '11990000050', 'douglas.vieira@email.com'),
(1071, 'Elaine Antunes', '111.222.333-51', '11990000051', 'elaine.antunes@email.com'),
(1072, 'Felix Braga', '111.222.333-52', '11990000052', 'felix.braga@email.com'),
(1073, 'Giovana Leal', '111.222.333-53', '11990000053', 'giovana.leal@email.com'),
(1074, 'Heitor Guedes', '111.222.333-54', '11990000054', 'heitor.guedes@email.com'),
(1075, 'Ingrid Torres', '111.222.333-55', '11990000055', 'ingrid.torres@email.com'),
(1076, 'Jonas Pacheco', '111.222.333-56', '11990000056', 'jonas.pacheco@email.com'),
(1077, 'Karen Diniz', '111.222.333-57', '11990000057', 'karen.diniz@email.com'),
(1078, 'Leandro Rocha', '111.222.333-58', '11990000058', 'leandro.rocha@email.com'),
(1079, 'Michele Lemos', '111.222.333-59', '11990000059', 'michele.lemos@email.com'),
(1080, 'Natan Freire', '111.222.333-60', '11990000060', 'natan.freire@email.com'),
(1081, 'Olga Matos', '111.222.333-61', '11990000061', 'olga.matos@email.com'),
(1082, 'Pablo Guerra', '111.222.333-62', '11990000062', 'pablo.guerra@email.com'),
(1083, 'Quésia Furtado', '111.222.333-63', '11990000063', 'quesia.furtado@email.com'),
(1084, 'Ramon Peçanha', '111.222.333-64', '11990000064', 'ramon.pecanha@email.com'),
(1085, 'Sara Valente', '111.222.333-65', '11990000065', 'sara.valente@email.com'),
(1086, 'Tadeu Mourão', '111.222.333-66', '11990000066', 'tadeu.mourao@email.com'),
(1087, 'Ulisses Prado', '111.222.333-67', '11990000067', 'ulisses.prado@email.com'),
(1088, 'Valéria Pinho', '111.222.333-68', '11990000068', 'valeria.pinho@email.com'),
(1089, 'William Nogueira', '111.222.333-69', '11990000069', 'william.nogueira@email.com'),
(1090, 'Zilda Ramos', '111.222.333-70', '11990000070', 'zilda.ramos@email.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `idcurso` int(5) NOT NULL,
  `nomecurso` varchar(50) NOT NULL,
  `Instituicao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`idcurso`, `nomecurso`, `Instituicao`) VALUES
(1, 'Sistemas de Informação', ''),
(2, 'Engenharia de Software', ''),
(3, 'Ciência da Computação', ''),
(4, 'Análise e Desenvolvimento de Sistemas', ''),
(5, 'Banco de Dados', ''),
(6, 'Análise e Desenvolvimento de Sistemas', 'Senac'),
(7, 'Engenharia Civil', 'USP'),
(8, 'Administração', 'FGV'),
(9, 'Ciência da Computação', 'Unicamp'),
(10, 'Direito', 'PUC'),
(11, 'Medicina', 'USP'),
(12, 'Arquitetura e Urbanismo', 'Mackenzie'),
(13, 'Psicologia', 'PUC'),
(14, 'Publicidade e Propaganda', 'ESPM'),
(15, 'Engenharia Mecânica', 'Unesp'),
(16, 'Sistemas de Informação', 'FIAP'),
(17, 'Enfermagem', 'USP'),
(18, 'Economia', 'Insper'),
(19, 'Design Gráfico', 'Belas Artes'),
(20, 'Educação Física', 'Unip');

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `iddisciplina` int(5) NOT NULL,
  `nomedisciplina` varchar(50) NOT NULL,
  `idcurso` int(5) NOT NULL,
  `idprofessor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`iddisciplina`, `nomedisciplina`, `idcurso`, `idprofessor`) VALUES
(1, 'Banco de Dados I', 5, 1),
(2, 'Programação I', 1, 2),
(3, 'Estruturas de Dados', 3, 3),
(4, 'Engenharia de Software I', 2, 4),
(5, 'Análise de Sistemas', 4, 5),
(6, 'Lógica de Programação', 6, 1),
(7, 'Estruturas de Dados', 6, 2),
(8, 'Cálculo I', 7, 3),
(9, 'Resistência dos Materiais', 7, 4),
(10, 'Teoria Geral da Administração', 8, 5),
(11, 'Algoritmos', 9, 2),
(12, 'Direito Constitucional', 10, 6),
(13, 'Anatomia Humana', 11, 7),
(14, 'Projeto Arquitetônico', 12, 8),
(15, 'Psicologia Social', 13, 9),
(16, 'Marketing Digital', 14, 5),
(17, 'Termodinâmica', 15, 4),
(18, 'Banco de Dados', 16, 1),
(19, 'Saúde Coletiva', 17, 7),
(20, 'Macroeconomia', 18, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itemturma`
--

CREATE TABLE `itemturma` (
  `iditem` int(11) NOT NULL,
  `ra` int(16) NOT NULL,
  `idturma` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itemturma`
--

INSERT INTO `itemturma` (`iditem`, `ra`, `idturma`) VALUES
(1, 1001, 1),
(2, 1002, 2),
(3, 1003, 3),
(4, 1004, 4),
(5, 1005, 5),
(6, 1006, 1),
(7, 1007, 2),
(8, 1008, 3),
(9, 1009, 4),
(10, 1010, 5),
(11, 1011, 14),
(12, 1012, 7),
(13, 1013, 8),
(14, 1014, 2),
(15, 1015, 10),
(16, 1016, 11),
(17, 1017, 11),
(18, 1018, 13),
(19, 1019, 14),
(20, 1020, 15),
(21, 1026, 2),
(22, 1027, 2),
(23, 1028, 2),
(24, 1029, 3),
(25, 1030, 3),
(26, 1031, 3),
(27, 1032, 3),
(28, 1033, 4),
(29, 1034, 4),
(30, 1035, 4),
(31, 1036, 4),
(32, 1037, 5),
(33, 1038, 5),
(34, 1039, 5),
(35, 1040, 5),
(36, 1041, 6),
(37, 1042, 6),
(38, 1043, 6),
(39, 1044, 6),
(40, 1045, 7),
(41, 1046, 7),
(42, 1047, 7),
(43, 1048, 7),
(44, 1049, 8),
(45, 1050, 8),
(46, 1051, 8),
(47, 1052, 8),
(48, 1053, 9),
(49, 1054, 9),
(50, 1055, 9),
(51, 1056, 9),
(52, 1057, 10),
(53, 1058, 10),
(54, 1059, 10),
(55, 1060, 10),
(56, 1061, 11),
(57, 1062, 11),
(58, 1063, 11),
(59, 1064, 11),
(60, 1065, 12),
(61, 1066, 12),
(62, 1067, 12),
(63, 1068, 12),
(64, 1069, 13),
(65, 1070, 13),
(66, 1071, 13),
(67, 1072, 13),
(68, 1073, 14),
(69, 1074, 14),
(70, 1075, 14),
(71, 1076, 14),
(72, 1077, 15),
(73, 1078, 15),
(74, 1079, 15),
(75, 1080, 15),
(76, 1081, 1),
(77, 1082, 2),
(78, 1083, 3),
(79, 1084, 4),
(80, 1085, 5),
(81, 1086, 6),
(82, 1087, 7),
(83, 1088, 8),
(84, 1089, 9),
(85, 1090, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `idprofessor` int(5) NOT NULL,
  `nomeprofessor` varchar(50) NOT NULL,
  `cpf` char(16) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`idprofessor`, `nomeprofessor`, `cpf`, `email`, `telefone`) VALUES
(1, 'Carlos Silva', '111.111.111-11', '', ''),
(2, 'Ana Souza', '222.222.222-22', '', ''),
(3, 'Marcos Lima', '333.333.333-33', '', ''),
(4, 'Fernanda Costa', '444.444.444-44', '', ''),
(5, 'Juliana Alves', '555.555.555-55', '', ''),
(6, 'Fabio Costa', '666666666', '', ''),
(7, 'Carlos Eduardo', '123.987.456-00', 'carlos.eduardo@email.com', '11987650001'),
(8, 'Fernanda Silva', '234.876.545-11', 'fernanda.silva@email.com', '11987650002'),
(9, 'Ricardo Gomes', '345.765.434-22', 'ricardo.gomes@email.com', '11987650003'),
(10, 'Patrícia Almeida', '456.654.323-33', 'patricia.almeida@email.com', '11987650004'),
(11, 'Marcos Vinicius', '567.543.212-44', 'marcos.vinicius@email.com', '11987650005'),
(12, 'Juliana Rocha', '678.432.101-55', 'juliana.rocha@email.com', '11987650006'),
(13, 'Roberto Dias', '789.321.012-66', 'roberto.dias@email.com', '11987650007'),
(14, 'Camila Freitas', '890.210.123-77', 'camila.freitas@email.com', '11987650008'),
(15, 'Eduardo Martins', '901.109.234-88', 'eduardo.martins@email.com', '11987650009'),
(16, 'Aline Barbosa', '012.998.345-99', 'aline.barbosa@email.com', '11987650010'),
(17, 'Bruno Castro', '135.887.456-10', 'bruno.castro@email.com', '11987650011'),
(18, 'Daniela Nunes', '246.776.567-21', 'daniela.nunes@email.com', '11987650012'),
(19, 'Gustavo Ribeiro', '357.665.678-32', 'gustavo.ribeiro@email.com', '11987650013'),
(20, 'Larissa Teixeira', '468.554.789-43', 'larissa.teixeira@email.com', '11987650014'),
(21, 'Thiago Fernandes', '579.443.890-54', 'thiago.fernandes@email.com', '11987650015');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `idturma` int(5) NOT NULL,
  `nometurma` varchar(50) NOT NULL,
  `iddisciplina` int(5) NOT NULL,
  `semestre` int(3) NOT NULL,
  `ano` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`idturma`, `nometurma`, `iddisciplina`, `semestre`, `ano`) VALUES
(1, 'Turma A - BD', 1, 1, 2026),
(2, 'Turma B - Prog', 2, 2, 2026),
(3, 'Turma C - ED', 3, 1, 2025),
(4, 'Turma D - ES', 4, 2, 2025),
(5, 'Turma E - AS', 5, 1, 2026),
(6, 'Turma F - LP', 6, 2, 2026),
(7, 'Turma G - ED2', 7, 1, 2025),
(8, 'Turma H - Cálculo', 8, 2, 2025),
(9, 'Turma I - RM', 9, 1, 2026),
(10, 'Turma J - TGA', 10, 2, 2026),
(11, 'Turma K - Algoritmos', 11, 1, 2025),
(12, 'Turma L - Direito', 12, 2, 2025),
(13, 'Turma M - Anatomia', 13, 1, 2026),
(14, 'Turma N - Projeto', 14, 2, 2026),
(15, 'Turma O - Psicologia', 15, 1, 2025);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`ra`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcurso`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`iddisciplina`),
  ADD KEY `idcurso` (`idcurso`),
  ADD KEY `idprofessor` (`idprofessor`);

--
-- Índices de tabela `itemturma`
--
ALTER TABLE `itemturma`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `ra` (`ra`),
  ADD KEY `idturma` (`idturma`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idprofessor`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`idturma`),
  ADD KEY `iddisciplina` (`iddisciplina`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `iddisciplina` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `itemturma`
--
ALTER TABLE `itemturma`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idprofessor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `disciplina`
--
ALTER TABLE `disciplina`
  ADD CONSTRAINT `disciplina_ibfk_1` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`idcurso`),
  ADD CONSTRAINT `disciplina_ibfk_2` FOREIGN KEY (`idprofessor`) REFERENCES `professor` (`idprofessor`);

--
-- Restrições para tabelas `itemturma`
--
ALTER TABLE `itemturma`
  ADD CONSTRAINT `itemturma_ibfk_1` FOREIGN KEY (`ra`) REFERENCES `alunos` (`ra`),
  ADD CONSTRAINT `itemturma_ibfk_2` FOREIGN KEY (`idturma`) REFERENCES `turma` (`idturma`);

--
-- Restrições para tabelas `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`iddisciplina`) REFERENCES `disciplina` (`iddisciplina`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
