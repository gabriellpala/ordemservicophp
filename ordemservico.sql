-- Criando estrutura do banco de dados para ordemservico
CREATE DATABASE IF NOT EXISTS `ordemservico`;
USE `ordemservico`;

-- Criando estrutura para tabela ordemservico.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `numero` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `perfil` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Criando dados para a tabela ordemservico.cliente:
INSERT INTO `cliente` (`cod`, `nome`, `email`, `senha`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `telefone`, `status`, `perfil`, `data`) VALUES
	(8, 'cliente1', 'cliente1@gmail.com', 'd5a8d8c7ab0514e2b8a2f98769281585', '37750000', 'cliente1', '10', 'Centro', 'Machado', 'MG', '(98) 45984-4565', 1, 2, '2024-08-07');

-- Criando estrutura para tabela ordemservico.servico
CREATE TABLE IF NOT EXISTS `servico` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Criando dados para a tabela ordemservico.servico:
INSERT INTO `servico` (`cod`, `nome`, `valor`, `data`) VALUES
	(6, 'servico1', 50, '2024-08-07');

  -- Criando estrutura para tabela ordemservico.terceirizado
CREATE TABLE IF NOT EXISTS `terceirizado` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `numero` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `perfil` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Criando dados para a tabela ordemservico.terceirizado:
INSERT INTO `terceirizado` (`cod`, `nome`, `email`, `telefone`, `senha`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `status`, `perfil`, `data`) VALUES
	(11, 'terceiro1', 'terceiro1@gmail.com', '(35) 99898-9898', 'c0cddf54f075bd5c5ecf419c0805db60', '37750000', 'terceiro1', '1', 'terceiro1', 'Machado', 'MG', 1, 3, '2024-08-07');

-- Criando estrutura para tabela ordemservico.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `numero` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `bairro` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `perfil` int NOT NULL,
  `status` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Criando dados para a tabela ordemservico.usuario:
INSERT INTO `usuario` (`cod`, `nome`, `senha`, `email`, `cep`, `endereco`, `numero`, `bairro`, `cidade`, `uf`, `perfil`, `status`, `data`) VALUES
	(32, 'teste', '698dc19d489c4e4db73e28a713eab07b', 'teste@gmail.com', '37750000', 'teste', '2', 'Centro', 'Machado', 'MG', 1, 1, '2024-08-06');
  
-- Criando estrutura para tabela ordemservico.ordem
CREATE TABLE IF NOT EXISTS `ordem` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `cod_cliente` int NOT NULL,
  `cod_terceirizado` int NOT NULL,
  `cod_servico` int NOT NULL,
  `data_servico` date NOT NULL,
  `status` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `foreign_key_cod_cliente` (`cod_cliente`),
  KEY `foreign_key_cod_servico` (`cod_servico`),
  KEY `foreign_key_cod_terceirizado` (`cod_terceirizado`),
  CONSTRAINT `foreign_key_cod_cliente` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod`),
  CONSTRAINT `foreign_key_cod_servico` FOREIGN KEY (`cod_servico`) REFERENCES `servico` (`cod`),
  CONSTRAINT `foreign_key_cod_terceirizado` FOREIGN KEY (`cod_terceirizado`) REFERENCES `terceirizado` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;