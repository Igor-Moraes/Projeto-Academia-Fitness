-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2026 at 03:57 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_academia`
--

-- --------------------------------------------------------

--
-- Table structure for table `acesso`
--

CREATE TABLE `acesso` (
  `id_acesso` int NOT NULL,
  `id_cliente` int NOT NULL,
  `data_hora` date NOT NULL,
  `tipo_movimento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id_avaliacao` int NOT NULL,
  `id_cliente` int NOT NULL,
  `data_avaliacao` date NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `altura` decimal(4,2) NOT NULL,
  `percentual_gordura` decimal(5,2) NOT NULL,
  `observacoes` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modalidade` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_endereco` int NOT NULL,
  `foto` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `data_nascimento`, `telefone`, `email`, `genero`, `modalidade`, `id_endereco`, `foto`) VALUES
(1, 'Márcio Magalhães', '51075186641', '1970-10-12', '5521976118034', 'prof.marcio.silva@doctum.edu.br', 'Masculino', 'fazer yoga', 1, NULL),
(2, 'Tiago Bittencourt', '23467389653', '1945-10-12', '3284823533', 'prof.tiago@gmail.com', 'Masculino', 'musculação', 3, NULL),
(5, 'Pai do Marllon', '10867389653', '2000-11-07', '3282824533', 'AbacaxiSalgado@gmail.com', 'Masculino', 'Pilates', 4, NULL),
(6, 'Ronaldo Nazário', '123.321.321-32', '2002-02-02', '55+ (32) 99973-8012', 'ronaldofenomeno@gmail.com', 'masculino', 'musculacao', 19, NULL),
(7, 'Vergil ', '399.422.780-10', '1981-12-02', '55+ (32) 99942-3214', 'vergilyamato@gmail.com', 'masculino', 'crossfit', 20, NULL),
(9, 'Leon S. Kennedy', '313.402.780-10', '1999-03-04', '55+ (32) 99923-8057', 'leonardopolicial@gmail.com', 'masculino', 'yoga', 22, NULL),
(10, 'Harry Kane da Silva', '999.402.780-10', '1989-09-06', '55+ (32) 99973-9129', 'kanefuracao@gmail.com', 'masculino', 'nutricionista', 23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credenciais`
--

CREATE TABLE `credenciais` (
  `id_credencial` int NOT NULL,
  `id_cliente` int DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_funcionario` int DEFAULT NULL,
  `template_biometrico` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credenciais`
--

INSERT INTO `credenciais` (`id_credencial`, `id_cliente`, `email`, `senha`, `id_funcionario`, `template_biometrico`) VALUES
(1, 1, 'prof.marcio.silva@doctum.edu.br', 'php123', NULL, NULL),
(2, NULL, 'rodrigopsilva@gmail.com', 'admin1234', 1, NULL),
(3, 2, 'prof.tiago@gmail.com', 'redes123', NULL, NULL),
(4, 5, 'AbacaxiSalgado@gmail.com', 'abacaxi123', NULL, NULL),
(5, NULL, 'Igordaerika@gmail.com', 'admin1234', 4, NULL),
(6, NULL, 'Marllonabacaxifilho@gmail.com', 'admin1234', 5, NULL),
(7, NULL, 'ProtestoEvangelista@gmail.com\r\n', 'admin1234', 6, NULL),
(8, NULL, 'CasadaDoLol@gmail.com', 'admin1234', 7, NULL),
(9, 6, 'ronaldofenomeno@gmail.com', '$2y$10$ysnoXSgpPlQeNT5ZGlB6E./wQrwMfoT4cVSw8EvQPRDQe60dDcIHi', NULL, NULL),
(10, 7, 'vergilyamato@gmail.com', '$2y$10$fjxB2E1qzyeTtwHLebX4ieG6jPtQTzNXPUJCHkbXh7JA4NVJid972', NULL, NULL),
(12, 9, 'leonardopolicial@gmail.com', '$2y$10$jL4II2RifDhWywd5z6QhyulGzN2J1oDSYbb7BmtrVxqTGf9.Mebqa', NULL, NULL),
(13, 10, 'kanefuracao@gmail.com', '$2y$10$mDfhE/UWeKk5HxmDGPVZf.9gPhFJRirVlx9wE4vXHiPeFv882FEGW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int NOT NULL,
  `rua` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `bairro` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cep` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `numero_casa` int NOT NULL,
  `complemento` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `rua`, `bairro`, `cep`, `cidade`, `estado`, `numero_casa`, `complemento`) VALUES
(1, 'Rua Paulo Mendes de Rezende', 'Jardim Estrela II', '37037042', 'Varginha', 'MG', 127, NULL),
(2, 'Rua Ostende Ribeiro ', 'Bela Vista', '36770170', 'Cataguases', 'MG', 155, NULL),
(3, 'Rua Marcio bittencourt ', 'Bela Vista', '36770170', 'Cataguases', 'MG', 67, NULL),
(4, 'Rua Marllon Abacaxi barato', 'Jardim Estrela II', '37037042', 'Varginha', 'MG', 1001, NULL),
(5, 'Rua Funcionário do Mês', 'barao da pisadinha', '37037057', 'Cataguases', 'MG', 6767, NULL),
(6, 'Rua Indigenas Modernos', 'Pedro Alvares Cabral', '37043057', 'Cataguases', 'MG', 10, NULL),
(7, 'Rua Pardaleiros', 'Misto quente', '37043067', 'Cataguases', 'MG', 7, NULL),
(19, 'Parque Gonçalves Lêdo', 'Farol', '57051-340', 'Maceió', 'AL', 3123, 'casa'),
(20, 'Quadra EQ 416/516 Bloco B', 'Santa Maria', '72546-332', 'Brasília', 'DF', 2, 'Apartamento'),
(22, 'Rua J', 'Conjunto Habitacional Cidade de Deus', '78734-264', 'Rondonópolis', 'MT', 3132, 'casa'),
(23, 'Rua Betânia', 'Nova Esperança', '69915-240', 'Rio Branco', 'AC', 9, 'casa'),
(24, 'Rua Alvaro Franca', 'Sol Nascente', '36774406', 'Cataguases', 'MG', 351, 'casa'),
(25, 'Rua Alvaro Franca', 'Sol Nascente', '36774406', 'Cataguases', 'MG', 690, 'casa'),
(26, 'Parque Gonçalves ', 'Farol', '57051-340', 'Maceió', 'AL', 1020, 'apartamento');

-- --------------------------------------------------------

--
-- Table structure for table `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id_equipamento` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_aquisicao` date NOT NULL,
  `id_fornecedor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `especialidade`
--

CREATE TABLE `especialidade` (
  `id_especialidade` int NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `especialidade`
--

INSERT INTO `especialidade` (`id_especialidade`, `tipo`) VALUES
(1, 'Musculação'),
(2, 'Yoga'),
(3, 'Crossfit'),
(4, 'Nutrição'),
(5, 'Desenvolvimento Web');

-- --------------------------------------------------------

--
-- Table structure for table `estoque`
--

CREATE TABLE `estoque` (
  `id_estoque` int NOT NULL,
  `id_produto` int NOT NULL,
  `quantidade_atual` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercícios`
--

CREATE TABLE `exercícios` (
  `id_exercicio` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `grupo_muscular` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercícios`
--

INSERT INTO `exercícios` (`id_exercicio`, `nome`, `grupo_muscular`) VALUES
(1, 'Supino Reto', 'Peito'),
(2, 'Cachorro Olhando para Baixo (Adho Mukha Svanasana)', 'Costas e Pernas'),
(5, 'Agachamento Livre', 'Pernas');

-- --------------------------------------------------------

--
-- Table structure for table `faturamento_mensal`
--

CREATE TABLE `faturamento_mensal` (
  `id_faturamento` int NOT NULL,
  `mes_referencia` varchar(7) COLLATE utf8mb4_general_ci NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `data_registro` date NOT NULL,
  `id_cliente` int NOT NULL,
  `id_pagamento` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id_formaP` int NOT NULL,
  `tipo` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_fornecedor` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cnpj` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` int NOT NULL,
  `produtos_fornecidos` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario_servicos`
--

CREATE TABLE `funcionario_servicos` (
  `id_servicos` int NOT NULL,
  `id_funcionario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funcionário`
--

CREATE TABLE `funcionário` (
  `id_funcionario` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cpf` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `genero` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_endereco` int NOT NULL,
  `id_especialidade` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funcionário`
--

INSERT INTO `funcionário` (`id_funcionario`, `nome`, `cpf`, `telefone`, `data_nascimento`, `genero`, `email`, `id_endereco`, `id_especialidade`) VALUES
(1, 'Rodrigo Pereira Silva', '94919631049', '553298848108', '2007-04-18', 'Masculino', 'rodrigopsilva@gmail.com', 2, 5),
(4, 'Igor Moraes', '94947631049', '553299702829', '2007-02-27', 'Masculino', 'Igordaerika@gmail.com', 5, 5),
(5, 'Marllon Marques', '10947631049', '5528999336984', '2005-01-01', 'Masculino', 'Marllonabacaxifilho@gmail.com', 4, 5),
(6, 'Leandro Evangelista', '10941231049', '553299575377', '2007-02-18', 'Masculino', 'ProtestoEvangelista@gmail.com', 6, 5),
(7, 'Ana Julia de Paiva', '10941231067', '553284685019', '2007-09-10', 'Masculino', 'CasadaDoLol@gmail.com', 7, 5),
(8, '\nWilliam Bonner', '313.312.431-32', '55+ (32)99912-4312', '1999-02-20', 'Masculino', 'willianpersonal@gmail.com', 25, 1),
(9, 'Yuri Zen', '313.794.431-32', '55+ (32)99943-4112', '1980-02-20', 'Masculino', 'yuricalmozen@gmail.com', 5, 2),
(10, 'Julio Borges', '313.794.898-32', '55+ (32)99943-9730', '1990-02-20', 'Masculino', 'juliomonstro@gmail.com', 26, 3),
(11, 'Clarice Fontes', '631.794.898-32', '55+ (32)99913-9730', '2002-02-20', 'Feminino', 'claricedasfontes@gmail.com', 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `itens_venda`
--

CREATE TABLE `itens_venda` (
  `id_item` int NOT NULL,
  `id_venda` int NOT NULL,
  `id_produto` int NOT NULL,
  `quantidade` int NOT NULL,
  `preco_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `matrícula`
--

CREATE TABLE `matrícula` (
  `id_matricula` int NOT NULL,
  `id_cliente` int NOT NULL,
  `id_plano` int NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movimentacao_estoque`
--

CREATE TABLE `movimentacao_estoque` (
  `id_movimentacao` int NOT NULL,
  `id_produto` int NOT NULL,
  `quantidade` int NOT NULL,
  `data_hora` date NOT NULL,
  `tipo_movimento` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pagamento`
--

CREATE TABLE `pagamento` (
  `id_pagamento` int NOT NULL,
  `id_venda` int DEFAULT NULL,
  `id_matricula` int DEFAULT NULL,
  `id_forma` int NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data_pagamento` date NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plano`
--

CREATE TABLE `plano` (
  `id_plano` int NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `valor` int NOT NULL,
  `duracao` date NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plano_serviços`
--

CREATE TABLE `plano_serviços` (
  `id_servicos` int NOT NULL,
  `id_plano` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

CREATE TABLE `produto` (
  `id_produto` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `preco` int NOT NULL,
  `descricao` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cor` int DEFAULT NULL,
  `gramatura` int DEFAULT NULL,
  `id_estoque` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

CREATE TABLE `servicos` (
  `id_servicos` int NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `treinos`
--

CREATE TABLE `treinos` (
  `id_treino` int NOT NULL,
  `id_cliente` int NOT NULL,
  `id_funcionario` int NOT NULL,
  `data_inicio` date NOT NULL,
  `nome_treino` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treinos`
--

INSERT INTO `treinos` (`id_treino`, `id_cliente`, `id_funcionario`, `data_inicio`, `nome_treino`, `horario`) VALUES
(1, 6, 8, '2026-06-10', 'Treino A - Peito e Tríceps', '18:30:00'),
(2, 1, 9, '2026-06-10', 'Yoga Flexibilidade', '17:30:00'),
(5, 7, 10, '2026-06-10', 'CrossFit Iniciante', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `treinos_exercícios`
--

CREATE TABLE `treinos_exercícios` (
  `id_treino_exercicio` int NOT NULL,
  `id_treino` int NOT NULL,
  `id_exercicio` int NOT NULL,
  `series` int NOT NULL,
  `repeticoes` int NOT NULL,
  `carga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treinos_exercícios`
--

INSERT INTO `treinos_exercícios` (`id_treino_exercicio`, `id_treino`, `id_exercicio`, `series`, `repeticoes`, `carga`) VALUES
(1, 1, 1, 4, 12, 29),
(2, 2, 2, 4, 1, 0),
(4, 5, 5, 4, 15, 30);

-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE `venda` (
  `id_venda` int NOT NULL,
  `id_cliente` int NOT NULL,
  `data` date NOT NULL,
  `valor_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id_acesso`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_avaliacao_cliente` (`id_cliente`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_endereço` (`id_endereco`) USING BTREE;

--
-- Indexes for table `credenciais`
--
ALTER TABLE `credenciais`
  ADD PRIMARY KEY (`id_credencial`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `fk_credenciais_funcionario` (`id_funcionario`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Indexes for table `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id_equipamento`),
  ADD KEY `fk_equipamento_fornecedor` (`id_fornecedor`);

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`id_especialidade`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id_estoque`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `exercícios`
--
ALTER TABLE `exercícios`
  ADD PRIMARY KEY (`id_exercicio`);

--
-- Indexes for table `faturamento_mensal`
--
ALTER TABLE `faturamento_mensal`
  ADD PRIMARY KEY (`id_faturamento`),
  ADD KEY `fk_faturamento_cliente` (`id_cliente`),
  ADD KEY `fk_faturamento_pagamento` (`id_pagamento`);

--
-- Indexes for table `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id_formaP`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `funcionario_servicos`
--
ALTER TABLE `funcionario_servicos`
  ADD KEY `id_servicos` (`id_servicos`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `funcionário`
--
ALTER TABLE `funcionário`
  ADD PRIMARY KEY (`id_funcionario`),
  ADD KEY `id_endereço` (`id_endereco`),
  ADD KEY `id_especialidade` (`id_especialidade`);

--
-- Indexes for table `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_venda` (`id_venda`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `matrícula`
--
ALTER TABLE `matrícula`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_plano` (`id_plano`);

--
-- Indexes for table `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  ADD PRIMARY KEY (`id_movimentacao`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id_pagamento`),
  ADD KEY `id_venda` (`id_venda`),
  ADD KEY `id_matricula` (`id_matricula`),
  ADD KEY `id_forma` (`id_forma`);

--
-- Indexes for table `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`id_plano`);

--
-- Indexes for table `plano_serviços`
--
ALTER TABLE `plano_serviços`
  ADD KEY `id_servicos` (`id_servicos`),
  ADD KEY `id_plano` (`id_plano`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_estoque` (`id_estoque`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servicos`);

--
-- Indexes for table `treinos`
--
ALTER TABLE `treinos`
  ADD PRIMARY KEY (`id_treino`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_funcionario` (`id_funcionario`);

--
-- Indexes for table `treinos_exercícios`
--
ALTER TABLE `treinos_exercícios`
  ADD PRIMARY KEY (`id_treino_exercicio`),
  ADD KEY `id_treino` (`id_treino`),
  ADD KEY `id_exercicio` (`id_exercicio`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id_acesso` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id_avaliacao` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `credenciais`
--
ALTER TABLE `credenciais`
  MODIFY `id_credencial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id_equipamento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `id_especialidade` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id_estoque` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercícios`
--
ALTER TABLE `exercícios`
  MODIFY `id_exercicio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faturamento_mensal`
--
ALTER TABLE `faturamento_mensal`
  MODIFY `id_faturamento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `id_formaP` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `id_fornecedor` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionário`
--
ALTER TABLE `funcionário`
  MODIFY `id_funcionario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `itens_venda`
--
ALTER TABLE `itens_venda`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matrícula`
--
ALTER TABLE `matrícula`
  MODIFY `id_matricula` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  MODIFY `id_movimentacao` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id_pagamento` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plano`
--
ALTER TABLE `plano`
  MODIFY `id_plano` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servicos` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treinos`
--
ALTER TABLE `treinos`
  MODIFY `id_treino` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `treinos_exercícios`
--
ALTER TABLE `treinos_exercícios`
  MODIFY `id_treino_exercicio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acesso`
--
ALTER TABLE `acesso`
  ADD CONSTRAINT `fk_acesso_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_endereço` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `credenciais`
--
ALTER TABLE `credenciais`
  ADD CONSTRAINT `fk_credenciais_funcionario` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionário` (`id_funcionario`),
  ADD CONSTRAINT `fk_credencial_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD CONSTRAINT `fk_equipamento_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedor` (`id_fornecedor`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `estoque`
--
ALTER TABLE `estoque`
  ADD CONSTRAINT `fk_produto_id` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `faturamento_mensal`
--
ALTER TABLE `faturamento_mensal`
  ADD CONSTRAINT `fk_faturamento_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_faturamento_pagamento` FOREIGN KEY (`id_pagamento`) REFERENCES `pagamento` (`id_pagamento`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `funcionario_servicos`
--
ALTER TABLE `funcionario_servicos`
  ADD CONSTRAINT `fk_funcionario_id` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionário` (`id_funcionario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_servicos_id` FOREIGN KEY (`id_servicos`) REFERENCES `servicos` (`id_servicos`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `funcionário`
--
ALTER TABLE `funcionário`
  ADD CONSTRAINT `fk_endereco_id` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_funcionario_especialidade` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidade` (`id_especialidade`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `itens_venda`
--
ALTER TABLE `itens_venda`
  ADD CONSTRAINT `fk_itemv_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_itemv_venda` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `matrícula`
--
ALTER TABLE `matrícula`
  ADD CONSTRAINT `fk_matricula_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_matricula_plano` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id_plano`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `movimentacao_estoque`
--
ALTER TABLE `movimentacao_estoque`
  ADD CONSTRAINT `fk_produto_id_ME` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `fk_pagamento_forma` FOREIGN KEY (`id_forma`) REFERENCES `forma_pagamento` (`id_formaP`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_pagamento_matricula` FOREIGN KEY (`id_matricula`) REFERENCES `matrícula` (`id_matricula`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_pagamento_venda` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `plano_serviços`
--
ALTER TABLE `plano_serviços`
  ADD CONSTRAINT `fk_plano_servicos_P` FOREIGN KEY (`id_plano`) REFERENCES `plano` (`id_plano`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_plano_servicos_S` FOREIGN KEY (`id_servicos`) REFERENCES `servicos` (`id_servicos`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_estoque_id` FOREIGN KEY (`id_estoque`) REFERENCES `estoque` (`id_estoque`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `treinos`
--
ALTER TABLE `treinos`
  ADD CONSTRAINT `fk_treinos_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_treinos_funcionarios` FOREIGN KEY (`id_funcionario`) REFERENCES `funcionário` (`id_funcionario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `treinos_exercícios`
--
ALTER TABLE `treinos_exercícios`
  ADD CONSTRAINT `fk_exercicio` FOREIGN KEY (`id_exercicio`) REFERENCES `exercícios` (`id_exercicio`),
  ADD CONSTRAINT `fk_treino` FOREIGN KEY (`id_treino`) REFERENCES `treinos` (`id_treino`),
  ADD CONSTRAINT `fk_treinos_exercicios_E` FOREIGN KEY (`id_exercicio`) REFERENCES `exercícios` (`id_exercicio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_treinos_exercicios_T` FOREIGN KEY (`id_treino`) REFERENCES `treinos` (`id_treino`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
