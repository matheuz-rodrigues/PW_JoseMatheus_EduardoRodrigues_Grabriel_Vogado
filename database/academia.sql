-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/03/2025 às 00:47
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `academia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `modalidade` varchar(50) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `dias` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `appointments`
--

INSERT INTO `appointments` (`id`, `nome`, `email`, `modalidade`, `horario`, `dias`, `created_at`) VALUES
(1, 'João Silva', 'joao@example.com', 'CrossFit', '8h00min', 'Segunda, Quarta, Sexta', '2025-03-05 22:09:34'),
(2, 'Maria Souza', 'maria@example.com', 'Pilates', '10h00min', 'Terça, Quinta', '2025-03-05 22:09:34'),
(3, 'Pedro Oliveira', 'pedro@example.com', 'Dança', '11h30min', 'Segunda, Sexta, Domingo', '2025-03-05 22:09:34'),
(4, 'Ana Costa', 'ana@example.com', 'Yoga', '15h00min', 'Quarta, Quinta', '2025-03-05 22:09:34'),
(5, 'Carlos Lima', 'carlos@example.com', 'Musculação', '17h00min', 'Segunda, Terça, Quarta, Quinta, Sexta', '2025-03-05 22:09:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `opinioes`
--

CREATE TABLE `opinioes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `assunto` enum('Suporte','Dúvidas','Sugestão','Outro') NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `opiniao` text NOT NULL,
  `data_envio` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `opinioes`
--

INSERT INTO `opinioes` (`id`, `nome`, `email`, `assunto`, `telefone`, `opiniao`, `data_envio`) VALUES
(1, 'Carlos Silva', 'carlos@gmail.com', 'Dúvidas', '123456789', 'Gostaria de saber mais sobre os horários das aulas.', '2025-03-04 02:37:27'),
(2, 'Maria Oliveira', 'maria@hotmail.com', 'Sugestão', '987654321', 'Acho que deveriam incluir mais aulas de yoga na grade.', '2025-03-04 02:37:27'),
(3, 'Pedro Souza', 'pedro@outlook.com', 'Suporte', '456123789', 'Tive problemas para acessar minha conta. Preciso de ajuda.', '2025-03-04 02:37:27'),
(4, 'Ana Costa', 'ana@gmail.com', 'Outro', '321654987', 'Adorei o atendimento, mas acredito que poderia haver mais opções de pagamento.', '2025-03-04 02:37:27'),
(5, 'João Pereira', 'joao@yahoo.com', 'Sugestão', '654321987', 'Seria ótimo ter aulas de pilates também!', '2025-03-04 02:37:27'),
(6, 'Juliana Santos', 'juliana@live.com', 'Dúvidas', '147258369', 'Quais são os requisitos para ser personal trainer?', '2025-03-04 02:37:27'),
(7, 'Lucas Almeida', 'lucas@bol.com.br', 'Suporte', '258369147', 'O sistema de reservas não está funcionando corretamente.', '2025-03-04 02:37:27'),
(8, 'Roberta Lima', 'roberta@hotmail.com', 'Dúvidas', '369258147', 'Qual é a política de cancelamento de aulas?', '2025-03-04 02:37:27'),
(9, 'Marcos Ferreira', 'marcos@uol.com.br', 'Sugestão', '753951456', 'Uma área de descanso no centro de atividades seria muito interessante.', '2025-03-04 02:37:27'),
(10, 'Fernanda Alves', 'fernanda@gmail.com', 'Outro', '852963741', 'Amo a estrutura da academia, mas o estacionamento poderia ser maior.', '2025-03-04 02:37:27'),
(11, 's', 'c@gmail.com', 'Suporte', '9', '9', '2025-03-04 02:40:35'),
(12, 's', 's@maul.com', 'Suporte', '2', 'wsia', '2025-03-05 20:25:12');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `opinioes`
--
ALTER TABLE `opinioes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `opinioes`
--
ALTER TABLE `opinioes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

