-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jul-2022 às 04:40
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `survbuild`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consentimentos`
--

CREATE TABLE `consentimentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesquisa` bigint(20) UNSIGNED NOT NULL,
  `txt_consentimento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filtros`
--

CREATE TABLE `filtros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesquisa` bigint(20) UNSIGNED NOT NULL,
  `txt_filtro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_05_16_140607_create_pesquisas_table', 1),
(7, '2022_05_16_140608_create_filtros_table', 1),
(8, '2022_05_16_140652_create_perguntas_table', 1),
(9, '2022_05_16_140653_create_opc_respostas_table', 1),
(10, '2022_05_16_140948_create_resultados_table', 1),
(11, '2022_05_16_141307_create_options_table', 1),
(12, '2022_05_17_153656_create_sessions_table', 1),
(13, '2022_05_30_153016_create_consentimentos_table', 1),
(14, '2022_07_10_183700_add_descricao_to_pesquisas_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `opc_respostas`
--

CREATE TABLE `opc_respostas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pergunta` bigint(20) UNSIGNED NOT NULL,
  `txt_opc_resposta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `opc_respostas`
--

INSERT INTO `opc_respostas` (`id`, `id_pergunta`, `txt_opc_resposta`, `created_at`, `updated_at`) VALUES
(1, 1, 'pergunta1 - opção 1', '2022-07-03 05:41:01', '2022-07-03 05:41:01'),
(2, 1, 'pergunta1 - opção 2', '2022-07-03 05:41:01', '2022-07-03 05:41:01'),
(3, 1, 'pergunta1 - opção 3', '2022-07-03 05:41:01', '2022-07-03 05:41:01'),
(4, 3, 'pergunta3 - opção 1', '2022-07-03 05:41:02', '2022-07-03 05:41:02'),
(5, 3, 'pergunta3 - opção 2', '2022-07-03 05:41:02', '2022-07-03 05:41:02'),
(6, 4, 'p2 pergunta1 - opção 1', '2022-07-08 05:25:12', '2022-07-08 05:25:12'),
(7, 4, 'p2 pergunta1 - opção 2', '2022-07-08 05:25:12', '2022-07-08 05:25:12'),
(8, 4, 'p2 pergunta1 - opção 3', '2022-07-08 05:25:12', '2022-07-08 05:25:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesquisa` bigint(20) UNSIGNED NOT NULL,
  `id_grupo` bigint(20) UNSIGNED DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `txt_pergunta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_opc_resposta` int(11) DEFAULT NULL,
  `midia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `id_pesquisa`, `id_grupo`, `tipo`, `txt_pergunta`, `id_opc_resposta`, `midia`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'checkbox', 'aaa', NULL, NULL, '2022-07-03 05:41:01', '2022-07-03 05:41:01'),
(2, 1, NULL, 'text', 'bbb', NULL, NULL, '2022-07-03 05:41:01', '2022-07-03 05:41:01'),
(3, 1, NULL, 'radio', 'ccc', NULL, NULL, '2022-07-03 05:41:01', '2022-07-03 05:41:01'),
(4, 2, NULL, 'checkbox', 'Pesquisa 2 AAAA', NULL, NULL, '2022-07-08 05:25:12', '2022-07-08 05:25:12'),
(5, 4, NULL, 'text', 'Pesquisa 2 AAAA', NULL, '6Nqvu167nILycmHJBtTY202207080234Aq5HlzhCtN202207030241teste.png', '2022-07-08 05:34:35', '2022-07-08 05:34:35'),
(6, 5, NULL, 'text', 'p3 AAAA', NULL, 'QvKCFnKzSXPhmRfeOYE9202207080247Aq5HlzhCtN202207030241teste.jpg', '2022-07-08 05:47:58', '2022-07-08 05:47:58'),
(7, 5, NULL, 'text', 'p3 bbb', NULL, 'RJ7sKqiFif4wDwSmdkOD202207080247UhJfoCb6YtOwz435FeyU202207072002arvore-01.jpg', '2022-07-08 05:47:58', '2022-07-08 05:47:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pesquisas`
--

CREATE TABLE `pesquisas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesquisa_inicio` timestamp NULL DEFAULT NULL,
  `pesquisa_final` timestamp NULL DEFAULT NULL,
  `perguntas_por_tela` int(11) NOT NULL,
  `pag_apresentacao` tinyint(1) DEFAULT NULL,
  `txt_pag_apresentacao` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `consentimento` tinyint(1) DEFAULT NULL,
  `txt_consentimento` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bgimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bgcor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txtcor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pesquisas`
--

INSERT INTO `pesquisas` (`id`, `user_id`, `titulo`, `url_slug`, `pesquisa_inicio`, `pesquisa_final`, `perguntas_por_tela`, `pag_apresentacao`, `txt_pag_apresentacao`, `consentimento`, `txt_consentimento`, `bgimage`, `bgcor`, `txtcor`, `created_at`, `updated_at`, `descricao`) VALUES
(1, 1, 'Teste 1', 'teste-1', '2022-07-03 02:38:00', '2022-07-08 02:38:00', 1, NULL, NULL, NULL, NULL, 'Aq5HlzhCtN202207030241teste.png', '#cddde4', '#4f4f4f', '2022-07-03 05:41:00', '2022-07-03 05:41:00', 'Apenas um teste para uma pesquisa'),
(2, 1, 'Pesquisa 2 - Novo teste', 'teste-2', '2022-07-08 02:21:00', '2022-07-17 02:21:00', 1, 1, '<h1>P&aacute;gina de apresenta&ccedil;&atilde;o</h1>\r\n<p>Aasdfasdf asdfasdf asdfas dfasdf asdf</p>', 1, '<h1>Termo de Consentimento</h1>\r\n<p>Aasdfasf asdf asdfasdfa asdfasdf</p>', 'iFGCGaMJwKYw2TlRxPiO202207080225Z8jzfDVkcBdCuRE9HRuL202207051559bg.png', '#d3eed4', '#425245', '2022-07-08 05:25:12', '2022-07-08 05:25:12', 'Pesquisa com página de apresentação e consentimento'),
(3, 1, 'Pesquisa 2 - Novo teste', 'teste-2a', '2022-07-08 02:21:00', '2022-07-17 02:21:00', 1, 1, '<h1>P&aacute;gina de apresenta&ccedil;&atilde;o</h1>\r\n<p>Aasdfasdf asdfasdf asdfas dfasdf asdf</p>', 0, '<h1>Termo de Consentimento</h1><p>Aasdfasf asdf asdfasdfa asdfasdf</p>', 'rgiQBDKdgsxNihYQnNh9202207080233Z8jzfDVkcBdCuRE9HRuL202207051559bg.png', '#d3eed4', '#425245', '2022-07-08 05:33:45', '2022-07-08 05:33:45', NULL),
(4, 1, 'Pesquisa 2 - Novo teste', 'teste-2b', '2022-07-08 02:21:00', '2022-07-17 02:21:00', 1, 0, '<h1>Página de apresentação</h1><p>Aasdfasdf asdfasdf asdfas dfasdf asdf</p>', 0, '<h1>Termo de Consentimento</h1><p>Aasdfasf asdf asdfasdfa asdfasdf</p>', 'uAlH5jpRUQTRVvxMkOWH202207080234Z8jzfDVkcBdCuRE9HRuL202207051559bg.png', '#d3eed4', '#425245', '2022-07-08 05:34:35', '2022-07-08 05:34:35', NULL),
(5, 1, 'Teste 3', 'teste-3', '2022-07-08 02:47:00', '2022-07-22 02:47:00', 1, NULL, NULL, NULL, NULL, NULL, '#000000', '#000000', '2022-07-08 05:47:58', '2022-07-08 05:47:58', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultados`
--

CREATE TABLE `resultados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesquisa` bigint(20) UNSIGNED NOT NULL,
  `aceite` tinyint(1) NOT NULL,
  `ip_usuario` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `navegador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_hora_inicio` timestamp NULL DEFAULT NULL,
  `data_hora_final` timestamp NULL DEFAULT NULL,
  `dados` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`dados`)),
  `completo` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `resultados`
--

INSERT INTO `resultados` (`id`, `id_pesquisa`, `aceite`, `ip_usuario`, `navegador`, `data_hora_inicio`, `data_hora_final`, `dados`, `completo`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '2022-07-10 17:35:00', '2022-07-10 17:38:00', '{\"aaa\":\"pergunta1 - opção 1\",\"bbb\":\"jhkjhk\",\"ccc\":\"pergunta3 - opção 1\"}', 1, '2022-07-10 17:38:08', '2022-07-10 17:38:08'),
(4, 1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '2022-07-10 17:38:00', '2022-07-10 17:39:00', '{\"aaa\":\"pergunta1 - opção 2\",\"bbb\":\"sdfgsdgsd\",\"ccc\":\"pergunta3 - opção 2\"}', 1, '2022-07-10 17:39:11', '2022-07-10 17:39:11'),
(5, 1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '2022-07-10 17:39:00', '2022-07-10 17:39:00', '{\"aaa\":\"pergunta1 - opção 3\",\"bbb\":\"fghfjghjfgh\",\"ccc\":\"pergunta3 - opção 2\"}', 1, '2022-07-10 17:39:31', '2022-07-10 17:39:31'),
(6, 1, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', '2022-07-10 17:39:00', '2022-07-10 17:40:00', '{\"aaa\":\"pergunta1 - opção 3\",\"bbb\":\"sdfgsdfg\",\"ccc\":\"pergunta3 - opção 2\"}', 1, '2022-07-10 17:40:08', '2022-07-10 17:40:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('E4kECQuULjTOGECsZ9vmJwulrSS7HDnEIZGAzv4f', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiaDFqMW5FRDA1V0pmOUdHazcyMW1QUjRoUXZzd2VZcGc4Y0pzbktydCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvc3Vydi90ZXN0ZS0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRDQk50LjIyQUU1akNWWWVaYXpSa1FPMHJUUVJxdmlLWXFjZ1lHYnljRzFXaFIuLmtmOFlSTyI7fQ==', 1657492586),
('z8LQbZkH3K0fGjpYJcA2nmDQMnEVsuZEonTFCOlf', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoibE5HOHlxTGVlcmZWNlNVQXpJZ2FCbXM5WU02ZVRTMWx6SE5BT0F1aiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRDQk50LjIyQUU1akNWWWVaYXpSa1FPMHJUUVJxdmlLWXFjZ1lHYnljRzFXaFIuLmtmOFlSTyI7fQ==', 1657478998);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tipo`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Marco Carneiro', 'marco.carneiro7@gmail.com', 'administrador', NULL, '$2y$10$CBNt.22AE5jCVYeZazRkQO0rTQRqviKYqcgYGbycG1WhR..kf8YRO', NULL, NULL, NULL, NULL, NULL, NULL, '2022-07-03 05:15:06', '2022-07-03 05:15:06');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consentimentos`
--
ALTER TABLE `consentimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consentimentos_id_pesquisa_foreign` (`id_pesquisa`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `filtros`
--
ALTER TABLE `filtros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filtros_id_pesquisa_foreign` (`id_pesquisa`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `opc_respostas`
--
ALTER TABLE `opc_respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opc_respostas_id_pergunta_foreign` (`id_pergunta`);

--
-- Índices para tabela `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perguntas_id_pesquisa_foreign` (`id_pesquisa`),
  ADD KEY `perguntas_id_grupo_foreign` (`id_grupo`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesquisas_user_id_foreign` (`user_id`);

--
-- Índices para tabela `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultados_id_pesquisa_foreign` (`id_pesquisa`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consentimentos`
--
ALTER TABLE `consentimentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `filtros`
--
ALTER TABLE `filtros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `opc_respostas`
--
ALTER TABLE `opc_respostas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `consentimentos`
--
ALTER TABLE `consentimentos`
  ADD CONSTRAINT `consentimentos_id_pesquisa_foreign` FOREIGN KEY (`id_pesquisa`) REFERENCES `pesquisas` (`id`);

--
-- Limitadores para a tabela `filtros`
--
ALTER TABLE `filtros`
  ADD CONSTRAINT `filtros_id_pesquisa_foreign` FOREIGN KEY (`id_pesquisa`) REFERENCES `pesquisas` (`id`);

--
-- Limitadores para a tabela `opc_respostas`
--
ALTER TABLE `opc_respostas`
  ADD CONSTRAINT `opc_respostas_id_pergunta_foreign` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id`);

--
-- Limitadores para a tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_id_grupo_foreign` FOREIGN KEY (`id_grupo`) REFERENCES `filtros` (`id`),
  ADD CONSTRAINT `perguntas_id_pesquisa_foreign` FOREIGN KEY (`id_pesquisa`) REFERENCES `pesquisas` (`id`);

--
-- Limitadores para a tabela `pesquisas`
--
ALTER TABLE `pesquisas`
  ADD CONSTRAINT `pesquisas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `resultados_id_pesquisa_foreign` FOREIGN KEY (`id_pesquisa`) REFERENCES `pesquisas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
