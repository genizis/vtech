-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03/08/2026 às 11:34
-- Versão do servidor: 5.7.44-48
-- Versão do PHP: 8.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `shopfl06_shop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `calculo_necessidade`
--

CREATE TABLE `calculo_necessidade` (
  `id_empresa` int(11) NOT NULL,
  `cod_calculo_necessidade` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `tipo_calculo` int(11) NOT NULL DEFAULT '1',
  `observacoes` varchar(500) DEFAULT NULL,
  `status` varchar(45) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `calculo_necessidade_pedido`
--

CREATE TABLE `calculo_necessidade_pedido` (
  `cod_calculo_necessidade_pedido` int(11) NOT NULL,
  `num_pedido_venda` int(11) NOT NULL,
  `cod_calculo_necessidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `calculo_necessidade_produto`
--

CREATE TABLE `calculo_necessidade_produto` (
  `cod_calculo_necessidade_produto` int(11) NOT NULL,
  `cod_calculo_necessidade` int(11) NOT NULL,
  `data_necessidade` date NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `tipo_necessidade` int(11) NOT NULL,
  `quant_necessidade` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `centro_custo`
--

CREATE TABLE `centro_custo` (
  `id_empresa` int(11) NOT NULL,
  `cod_centro_custo` varchar(60) NOT NULL,
  `nome_centro_custo` varchar(100) NOT NULL,
  `ativo` tinyint(4) NOT NULL,
  `mov_entrada` tinyint(4) DEFAULT '1',
  `mov_saida` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cest`
--

CREATE TABLE `cest` (
  `cod_cest` varchar(15) NOT NULL,
  `desc_cest` varchar(200) DEFAULT NULL,
  `segmento` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(120) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_empresa` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(60) NOT NULL,
  `razao_social` varchar(60) NOT NULL,
  `tipo_pessoa` int(11) DEFAULT NULL,
  `cnpj_cpf` varchar(20) DEFAULT NULL COMMENT '	',
  `cod_segmento` int(11) DEFAULT '0',
  `tipo_contrib_icms` int(11) NOT NULL,
  `insc_estadual` varchar(45) NOT NULL,
  `insc_municipal` varchar(45) NOT NULL,
  `tel_fixo` varchar(20) DEFAULT NULL,
  `tel_cel` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cod_cidade` int(11) DEFAULT '0',
  `cod_pais` int(11) NOT NULL DEFAULT '1058',
  `cod_vendas_externas` int(11) DEFAULT NULL,
  `contato_comercial` varchar(100) DEFAULT NULL,
  `tel_comercial` varchar(20) DEFAULT NULL,
  `email_comercial` varchar(60) DEFAULT NULL,
  `contato_financeiro` varchar(100) DEFAULT NULL,
  `tel_financeiro` varchar(20) DEFAULT NULL,
  `email_financeiro` varchar(60) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `componente_ordem_producao`
--

CREATE TABLE `componente_ordem_producao` (
  `seq_componente_producao` int(11) NOT NULL,
  `num_ordem_producao` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `quant_consumo` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta`
--

CREATE TABLE `conta` (
  `id_empresa` int(11) NOT NULL,
  `cod_conta` int(11) NOT NULL,
  `nome_conta` varchar(100) NOT NULL,
  `saldo_conta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ativo` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta_contabil`
--

CREATE TABLE `conta_contabil` (
  `id_empresa` int(11) NOT NULL,
  `cod_conta_contabil` varchar(60) NOT NULL,
  `cod_conta_contabil_pai` varchar(60) DEFAULT NULL,
  `nome_conta_contabil` varchar(100) NOT NULL,
  `ativo` tinyint(4) DEFAULT '1',
  `demons_result` int(11) NOT NULL DEFAULT '0',
  `mov_entrada` tinyint(4) DEFAULT '1',
  `mov_saida` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `controle_caixa`
--

CREATE TABLE `controle_caixa` (
  `id_empresa` int(11) NOT NULL,
  `data_caixa` date NOT NULL,
  `saldo_inicial` decimal(10,2) NOT NULL DEFAULT '0.00',
  `data_hora_abertura` datetime NOT NULL,
  `data_hora_fechamento` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cotacao_ordem`
--

CREATE TABLE `cotacao_ordem` (
  `seq_cotacao_compra` int(11) NOT NULL,
  `num_ordem_compra` int(11) NOT NULL,
  `cod_fornecedor` int(11) NOT NULL,
  `dias_entrega` int(11) NOT NULL DEFAULT '0',
  `condicao_pagamento` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL,
  `razao_social` varchar(60) DEFAULT NULL,
  `nome_empresa` varchar(100) NOT NULL,
  `tipo_empresa` tinyint(4) NOT NULL,
  `cnpj_cpf` varchar(20) DEFAULT NULL,
  `tel_fixo` varchar(20) DEFAULT NULL,
  `tel_cel` varchar(20) NOT NULL,
  `email_contato` varchar(60) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cod_cidade` int(11) DEFAULT NULL,
  `caminho_logo` varchar(100) DEFAULT NULL,
  `data_validade` date NOT NULL,
  `token_conta_azul` varchar(200) DEFAULT NULL,
  `token_refresh_ca` varchar(200) DEFAULT NULL,
  `expira_token_ca` datetime DEFAULT NULL,
  `aviso_ca` tinyint(4) NOT NULL DEFAULT '0',
  `conta_padrao` int(11) DEFAULT '0',
  `metodo_pagamento_frente_caixa` int(11) DEFAULT NULL,
  `centro_custo_frente_caixa` varchar(60) DEFAULT NULL,
  `conta_contabil_frente_caixa` varchar(60) DEFAULT NULL,
  `centro_custo_vendas` varchar(60) DEFAULT NULL,
  `conta_contabil_vendas` varchar(60) DEFAULT NULL,
  `centro_custo_compras` varchar(60) DEFAULT NULL,
  `conta_contabil_compras` varchar(60) DEFAULT NULL,
  `natureza_caixa` int(11) DEFAULT NULL,
  `quant_usuarios` int(11) NOT NULL DEFAULT '5',
  `insc_estadual` varchar(45) DEFAULT NULL,
  `isenta_ie` tinyint(4) DEFAULT NULL,
  `versao_nfe` varchar(10) DEFAULT NULL,
  `ambiente_nfe` int(11) DEFAULT NULL,
  `schema_nfe` varchar(50) NOT NULL,
  `serie` varchar(15) DEFAULT NULL,
  `serie_nfce` varchar(15) DEFAULT NULL,
  `modelo` char(5) NOT NULL,
  `modelo_nfce` char(5) NOT NULL,
  `csc` varchar(100) DEFAULT NULL,
  `csc_id` varchar(45) DEFAULT NULL,
  `codigo_regime_tributario` char(1) NOT NULL,
  `num_ultima_nf` int(11) DEFAULT NULL,
  `num_ultima_nfce` int(11) DEFAULT NULL,
  `caminho_certificado` varchar(100) DEFAULT NULL,
  `senha_certificado` varchar(100) DEFAULT NULL,
  `integ_vendas_externas` tinyint(4) DEFAULT '0',
  `integ_usuario_vendas_externas` varchar(60) NOT NULL,
  `integ_senha_vendas_externas` varchar(60) NOT NULL,
  `cred_devol_vendas_externas` varchar(100) DEFAULT NULL,
  `token_acesso_vendas_externas` varchar(200) DEFAULT NULL,
  `token_renovacao_vendas_externas` varchar(200) DEFAULT NULL,
  `validade_token_vendas_externas` datetime DEFAULT NULL,
  `ip_aceite_termo` varchar(45) DEFAULT NULL,
  `data_hora_aceite_termo` datetime DEFAULT NULL,
  `custo_folha` decimal(10,2) NOT NULL DEFAULT '0.00',
  `horas_consideradas` decimal(10,1) NOT NULL DEFAULT '220.0',
  `percentual_credito_sn` decimal(5,2) NOT NULL,
  `token_ibpt` varchar(255) NOT NULL,
  `e_mail_confirmado` tinyint(1) NOT NULL DEFAULT '0',
  `hash_confirma_email` varchar(45) DEFAULT NULL,
  `clientes_ativos` int(11) NOT NULL DEFAULT '60',
  `clientes_inativos_recentes` int(11) NOT NULL DEFAULT '90'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) DEFAULT NULL,
  `uf` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estrutura_componente`
--

CREATE TABLE `estrutura_componente` (
  `id_empresa` int(11) NOT NULL,
  `seq_estrutura_componente` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `cod_produto_componente` varchar(15) NOT NULL,
  `quant_consumo` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estrutura_produto`
--

CREATE TABLE `estrutura_produto` (
  `id_empresa` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `quant_producao` decimal(10,3) NOT NULL,
  `tempo_producao` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `faturamento_pedido`
--

CREATE TABLE `faturamento_pedido` (
  `cod_faturamento_pedido` int(11) NOT NULL,
  `num_pedido_venda` int(11) NOT NULL,
  `data_faturamento` date NOT NULL,
  `serie` varchar(10) DEFAULT NULL,
  `nota_fiscal` varchar(15) DEFAULT NULL,
  `valor_bruto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_transportador` int(11) DEFAULT NULL,
  `tipo_frete` int(11) NOT NULL DEFAULT '1',
  `valor_frete` decimal(10,2) NOT NULL DEFAULT '0.00',
  `valor_seguro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `outras_despesas` decimal(10,2) NOT NULL DEFAULT '0.00',
  `valor_desconto` decimal(10,2) DEFAULT '0.00',
  `cod_vendedor` int(11) DEFAULT NULL,
  `perc_comissao` decimal(10,2) NOT NULL DEFAULT '0.00',
  `observacoes` varchar(200) DEFAULT NULL,
  `estornado` tinyint(4) NOT NULL DEFAULT '0',
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `faturamento_pedido_produto`
--

CREATE TABLE `faturamento_pedido_produto` (
  `id` int(11) NOT NULL,
  `faturamento_pedido` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `cod_lote` varchar(60) DEFAULT NULL,
  `quantidade` decimal(10,3) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL DEFAULT '0.00',
  `x_ped` varchar(100) DEFAULT NULL,
  `preco_venda` decimal(10,2) NOT NULL DEFAULT '0.00',
  `custo_medio` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `id_empresa` int(11) NOT NULL,
  `cod_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(60) NOT NULL,
  `razao_social` varchar(60) NOT NULL,
  `tipo_pessoa` int(11) DEFAULT NULL,
  `cnpj_cpf` varchar(20) DEFAULT NULL COMMENT '	',
  `cod_segmento` int(11) DEFAULT '0',
  `tipo_contrib_icms` int(11) NOT NULL,
  `insc_estadual` varchar(45) NOT NULL,
  `insc_municipal` varchar(45) NOT NULL,
  `tel_fixo` varchar(20) DEFAULT NULL,
  `tel_cel` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cod_cidade` int(11) DEFAULT '0',
  `cod_pais` int(11) NOT NULL DEFAULT '1058',
  `ativo` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico_custo_medio`
--

CREATE TABLE `historico_custo_medio` (
  `id_empresa` int(11) NOT NULL,
  `cod_produto` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `data_custo` date NOT NULL,
  `custo_medio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `inventario`
--

CREATE TABLE `inventario` (
  `id_empresa` int(11) NOT NULL,
  `num_inventario` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `data_execucao` date DEFAULT NULL,
  `observacoes` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `meta_vendedor`
--

CREATE TABLE `meta_vendedor` (
  `id_meta` int(11) NOT NULL,
  `cod_vendedor` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `janeiro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fevereiro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `marco` decimal(10,2) NOT NULL DEFAULT '0.00',
  `abril` decimal(10,2) NOT NULL DEFAULT '0.00',
  `maio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `junho` decimal(10,2) NOT NULL DEFAULT '0.00',
  `julho` decimal(10,2) NOT NULL DEFAULT '0.00',
  `agosto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `setembro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `outubro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `novembro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dezembro` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `metodo_pagamento`
--

CREATE TABLE `metodo_pagamento` (
  `id_empresa` int(11) NOT NULL,
  `cod_metodo_pagamento` int(11) NOT NULL,
  `nome_metodo_pagamento` varchar(60) NOT NULL,
  `cod_conta` int(11) DEFAULT NULL,
  `cod_vendas_externas` int(11) DEFAULT NULL,
  `taxa_operacao` decimal(10,2) DEFAULT NULL,
  `dias_recebimento` int(11) DEFAULT NULL,
  `ativo` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `metodo_pagamento_venda_caixa`
--

CREATE TABLE `metodo_pagamento_venda_caixa` (
  `num_venda_caixa` int(11) NOT NULL,
  `id_forma_pagamento_caixa` int(11) NOT NULL,
  `cod_metodo_pagamento` int(11) NOT NULL,
  `valor_pagamento` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentos_conta`
--

CREATE TABLE `movimentos_conta` (
  `cod_movimento_conta` int(11) NOT NULL,
  `cod_conta` int(11) NOT NULL,
  `cod_metodo_pagamento` int(11) DEFAULT NULL,
  `especie_movimento` int(11) NOT NULL DEFAULT '1',
  `tipo_movimento` int(11) DEFAULT NULL,
  `cod_conta_contabil` varchar(60) DEFAULT NULL,
  `cod_centro_custo` varchar(60) DEFAULT NULL,
  `data_competencia` date NOT NULL,
  `data_vencimento` date NOT NULL,
  `data_confirmacao` date DEFAULT NULL,
  `desc_movimento` varchar(100) NOT NULL,
  `tipo_emitente` int(11) DEFAULT NULL,
  `cod_emitente` int(11) DEFAULT NULL,
  `cod_vendedor` int(11) DEFAULT NULL,
  `parcela` varchar(10) NOT NULL,
  `valor_titulo` decimal(10,2) NOT NULL,
  `valor_desc_taxa` decimal(10,2) DEFAULT NULL,
  `valor_juros_multa` decimal(10,2) DEFAULT NULL,
  `valor_confirmado` decimal(10,2) DEFAULT NULL,
  `origem_movimento` int(11) DEFAULT NULL,
  `id_origem` int(11) DEFAULT NULL,
  `confirmado` tinyint(4) NOT NULL DEFAULT '0',
  `cod_vendas_externas` int(11) DEFAULT NULL,
  `cod_titulo_rel` int(11) DEFAULT NULL,
  `usuario_criacao` varchar(60) DEFAULT NULL,
  `usuario_liquidacao` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentos_estoque`
--

CREATE TABLE `movimentos_estoque` (
  `id_empresa` int(11) NOT NULL,
  `cod_movimento_estoque` int(11) NOT NULL,
  `data_movimento` date NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `cod_lote` varchar(60) DEFAULT NULL,
  `origem_movimento` int(11) DEFAULT NULL,
  `id_origem` int(11) DEFAULT NULL,
  `tipo_movimento` int(11) NOT NULL,
  `especie_movimento` int(11) NOT NULL,
  `quant_movimentada` decimal(10,3) NOT NULL,
  `valor_movimento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `custo_mat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `custo_mob` decimal(10,2) NOT NULL DEFAULT '0.00',
  `considera_calc_custo` tinyint(4) DEFAULT '0',
  `observacao` varchar(200) DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentos_frente_caixa`
--

CREATE TABLE `movimentos_frente_caixa` (
  `id_empresa` int(11) DEFAULT NULL,
  `data_caixa` date DEFAULT NULL,
  `data_hora_movimento` datetime DEFAULT NULL,
  `cod_movimento_frente_caixa` int(11) NOT NULL,
  `tipo_movimento` int(11) NOT NULL,
  `especie_movimento` int(11) NOT NULL,
  `valor_movimento` decimal(10,2) NOT NULL,
  `observacao` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentos_produto_venda`
--

CREATE TABLE `movimentos_produto_venda` (
  `cod_movimento_pv` int(11) NOT NULL,
  `seq_produto_venda` int(11) NOT NULL,
  `data_saida` date NOT NULL,
  `quant_saida` decimal(10,3) NOT NULL,
  `serie` varchar(10) DEFAULT NULL,
  `nota_fiscal` varchar(15) DEFAULT NULL,
  `observacoes` varchar(200) DEFAULT NULL,
  `valor_venda` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estornado` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `natureza_operacao`
--

CREATE TABLE `natureza_operacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `descricao` text CHARACTER SET utf8 NOT NULL,
  `serie` bigint(20) DEFAULT NULL,
  `tipo` int(11) NOT NULL COMMENT '    • saída     • entrada',
  `codigoRegimeTrib` int(11) DEFAULT NULL COMMENT '    • simples nacional,     • Simples nacional - Excesso de sublimite de #receita bruta,     • Regime normal',
  `indicadorPresenca` int(11) DEFAULT NULL COMMENT '    • 0 - Não se aplica,     • 1 - Operação presencial     • 2 - Operação não presencial, pela Internet     • 3 - Operação não presencial, Teleatendimento     • 4 - NFC-e em operação com entrega em domicílio     • 5 - Operação presencial, fora do estabelecimento     • 9 - Operação não presencial, Outros',
  `faturada` tinyint(1) DEFAULT NULL,
  `consumidorFinal` tinyint(1) DEFAULT NULL,
  `IncluirFreteBase` tinyint(1) DEFAULT NULL,
  `operacaoDevolucao` tinyint(1) DEFAULT NULL,
  `atualizarPrecoUltimaCompra` tinyint(1) DEFAULT NULL,
  `InformacoesComplementares` text CHARACTER SET utf8,
  `InformacoesAdicionais` text CHARACTER SET utf8,
  `empresaIDFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ncm`
--

CREATE TABLE `ncm` (
  `cod_ncm` varchar(15) NOT NULL,
  `categoria` varchar(45) DEFAULT NULL,
  `desc_ncm` varchar(200) DEFAULT NULL,
  `ipi` varchar(10) DEFAULT NULL,
  `un_trib` varchar(20) DEFAULT NULL,
  `percentual_ipi` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas_cliente`
--

CREATE TABLE `notas_cliente` (
  `cod_nota_cliente` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `tipo_contato` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `data_nota` date NOT NULL,
  `comentario` varchar(2000) NOT NULL,
  `usuario` varchar(60) DEFAULT NULL,
  `cod_vendedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota_fiscal`
--

CREATE TABLE `nota_fiscal` (
  `id_empresa` int(11) NOT NULL,
  `cod_nota_fiscal` int(11) NOT NULL,
  `id_natureza_operacao` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `x_ped` varchar(45) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `indicador_final` int(11) NOT NULL DEFAULT '0',
  `indicador_presenca` int(11) NOT NULL,
  `cod_transportador` int(11) DEFAULT NULL,
  `tipo_frete` int(11) NOT NULL,
  `valor_frete` decimal(10,2) DEFAULT NULL,
  `valor_seguro` decimal(10,2) DEFAULT '0.00',
  `outras_despesas` decimal(10,2) DEFAULT '0.00',
  `valor_desconto` decimal(10,2) DEFAULT NULL,
  `quant_volume` int(11) DEFAULT NULL,
  `especie_volume` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `cod_antt` varchar(45) DEFAULT NULL,
  `placa_veiculo` varchar(45) DEFAULT NULL,
  `uf_veiculo` varchar(2) DEFAULT NULL,
  `inf_complementar` varchar(500) DEFAULT NULL,
  `nf_referencia` varchar(44) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `orcamento`
--

CREATE TABLE `orcamento` (
  `seq_orcamento` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `cod_centro_custo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cod_conta_contabil` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ano` int(11) NOT NULL,
  `janeiro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fevereiro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `marco` decimal(10,2) NOT NULL DEFAULT '0.00',
  `abril` decimal(10,2) NOT NULL DEFAULT '0.00',
  `maio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `junho` decimal(10,2) NOT NULL DEFAULT '0.00',
  `julho` decimal(10,2) NOT NULL DEFAULT '0.00',
  `agosto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `setembro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `outubro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `novembro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `dezembro` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordem_compra`
--

CREATE TABLE `ordem_compra` (
  `id_empresa` int(11) NOT NULL,
  `num_ordem_compra` int(11) NOT NULL,
  `num_pedido_compra` int(11) DEFAULT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `data_necessidade` date NOT NULL,
  `quant_pedida` decimal(10,3) NOT NULL,
  `quant_atendida` decimal(10,3) DEFAULT '0.000',
  `valor_unitario` decimal(12,2) DEFAULT NULL,
  `observacoes` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cod_calculo_necessidade` int(11) DEFAULT NULL,
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordem_producao`
--

CREATE TABLE `ordem_producao` (
  `id_empresa` int(11) NOT NULL,
  `num_ordem_producao` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `num_pedido_venda` int(11) DEFAULT NULL,
  `data_emissao` date NOT NULL,
  `data_fim` date NOT NULL,
  `quant_planejada` decimal(10,3) NOT NULL,
  `quant_produzida` decimal(10,3) NOT NULL DEFAULT '0.000',
  `observacoes` varchar(2000) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `cod_calculo_necessidade` int(11) DEFAULT NULL,
  `usuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `outros_regras_tributacao`
--

CREATE TABLE `outros_regras_tributacao` (
  `id` int(11) NOT NULL,
  `FKIDNaturezaOperacao` int(10) UNSIGNED NOT NULL,
  `presumidoCalculoPisCofins` tinyint(1) DEFAULT NULL,
  `somarOutrasDespesas` tinyint(1) DEFAULT NULL,
  `aliquotaFunrural` float DEFAULT NULL,
  `compraProdutorRural` tinyint(1) DEFAULT NULL,
  `descontarFunRuralTotal` tinyint(1) DEFAULT NULL,
  `tipoAproxTrib` char(1) DEFAULT NULL,
  `tributos` float DEFAULT NULL,
  `tipoDesconto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_compra`
--

CREATE TABLE `pedido_compra` (
  `id_empresa` int(11) NOT NULL,
  `num_pedido_compra` int(11) NOT NULL,
  `cod_fornecedor` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `data_entrega` date NOT NULL,
  `observacoes` varchar(2000) DEFAULT NULL,
  `tipo_desconto` int(11) NOT NULL DEFAULT '1',
  `valor_desconto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tipo_frete` int(11) NOT NULL,
  `valor_frete` decimal(10,2) DEFAULT '0.00',
  `valor_seguro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `outras_despesas` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido_venda`
--

CREATE TABLE `pedido_venda` (
  `id_empresa` int(11) NOT NULL,
  `num_pedido_venda` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `data_entrega` date NOT NULL,
  `observacoes` varchar(2000) DEFAULT NULL,
  `tipo_desconto` int(11) NOT NULL DEFAULT '1',
  `valor_desconto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_transportador` int(11) DEFAULT NULL,
  `tipo_frete` int(11) NOT NULL DEFAULT '1',
  `valor_frete` decimal(10,2) NOT NULL DEFAULT '0.00',
  `valor_seguro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `outras_despesas` decimal(10,2) NOT NULL DEFAULT '0.00',
  `situacao` int(11) NOT NULL DEFAULT '1',
  `cod_vendas_externas` int(11) DEFAULT NULL,
  `cod_vendedor` int(11) DEFAULT NULL,
  `perc_comissao` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_erp` varchar(60) DEFAULT NULL,
  `usuario_app` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_empresa` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `nome_produto` varchar(100) NOT NULL,
  `desc_produto` varchar(300) DEFAULT NULL,
  `faturavel` tinyint(4) NOT NULL DEFAULT '0',
  `cod_tipo_produto` int(11) NOT NULL,
  `cod_origem` int(11) DEFAULT NULL,
  `cod_barras` varchar(100) DEFAULT NULL,
  `cod_gtin` varchar(14) DEFAULT NULL,
  `cod_ncm` varchar(45) DEFAULT NULL,
  `cod_cest` varchar(15) DEFAULT NULL,
  `cod_unidade_medida` varchar(2) NOT NULL,
  `tipo_controle` tinyint(4) NOT NULL DEFAULT '1',
  `quant_estoq` decimal(10,3) NOT NULL,
  `estoq_min` decimal(10,3) NOT NULL DEFAULT '0.000',
  `dias_vencimento` int(11) NOT NULL DEFAULT '0',
  `tempo_abastecimento` int(11) NOT NULL DEFAULT '0',
  `saldo_negativo` tinyint(4) NOT NULL DEFAULT '0',
  `custo_medio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `preco_venda` decimal(10,2) DEFAULT NULL,
  `cod_unidade_medida_fat` varchar(2) DEFAULT NULL,
  `quant_faturamento` decimal(10,3) DEFAULT NULL,
  `caminho_desenho` varchar(100) DEFAULT NULL,
  `caminho_foto` varchar(100) DEFAULT NULL,
  `id_conta_azul` varchar(200) DEFAULT NULL,
  `peso_liq` decimal(10,3) DEFAULT NULL,
  `peso_bruto` decimal(10,3) DEFAULT NULL,
  `cod_vendas_externas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_inventario`
--

CREATE TABLE `produto_inventario` (
  `id_empresa` int(11) NOT NULL,
  `seq_produto_inventario` int(11) NOT NULL,
  `num_inventario` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `custo_medio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_lote` varchar(60) DEFAULT NULL,
  `quant_contagem` decimal(10,3) NOT NULL,
  `quant_estoq_exec` decimal(10,3) NOT NULL DEFAULT '0.000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_lote`
--

CREATE TABLE `produto_lote` (
  `id_empresa` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `cod_lote` varchar(60) NOT NULL,
  `data_validade` date NOT NULL,
  `quant_estoq` decimal(10,3) NOT NULL DEFAULT '0.000',
  `dias_aviso_venc` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_nota_fiscal`
--

CREATE TABLE `produto_nota_fiscal` (
  `seq_produto_nf` int(11) NOT NULL,
  `cod_nota_fiscal` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `quantidade` decimal(10,3) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_requisicao_material`
--

CREATE TABLE `produto_requisicao_material` (
  `id_empresa` int(11) NOT NULL,
  `seq_produto_requisicao_material` int(11) NOT NULL,
  `cod_requisicao_material` int(11) NOT NULL,
  `cod_produto` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `cod_lote` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custo_medio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quant_requisicao` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_venda`
--

CREATE TABLE `produto_venda` (
  `seq_produto_venda` int(11) NOT NULL,
  `num_pedido_venda` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `quant_pedida` decimal(10,3) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quant_atendida` decimal(10,3) NOT NULL DEFAULT '0.000',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_venda_caixa`
--

CREATE TABLE `produto_venda_caixa` (
  `num_venda_caixa` int(11) NOT NULL,
  `seq_produto` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `cod_lote` varchar(60) DEFAULT NULL,
  `quant_venda` decimal(10,3) NOT NULL,
  `valor_unit` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `recebimento_material`
--

CREATE TABLE `recebimento_material` (
  `cod_recebimento_material` int(11) NOT NULL,
  `num_pedido_compra` int(11) NOT NULL,
  `data_recebimento` date NOT NULL,
  `serie` varchar(10) DEFAULT NULL,
  `nota_fiscal` varchar(15) DEFAULT NULL,
  `valor_bruto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tipo_frete` int(11) NOT NULL DEFAULT '1',
  `valor_frete` decimal(10,2) NOT NULL DEFAULT '0.00',
  `valor_desconto` decimal(10,2) DEFAULT NULL,
  `valor_seguro` decimal(10,2) NOT NULL DEFAULT '0.00',
  `outras_despesas` decimal(10,2) NOT NULL DEFAULT '0.00',
  `observacoes` varchar(200) DEFAULT NULL,
  `estornado` tinyint(4) DEFAULT '0',
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `recebimento_material_produto`
--

CREATE TABLE `recebimento_material_produto` (
  `seq_produto_recebimento` int(11) NOT NULL,
  `cod_recebimento_material` int(11) NOT NULL,
  `cod_produto` varchar(15) NOT NULL,
  `cod_lote` varchar(60) DEFAULT NULL,
  `quantidade` decimal(10,3) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reporte_producao`
--

CREATE TABLE `reporte_producao` (
  `cod_reporte_producao` int(11) NOT NULL,
  `num_ordem_producao` int(11) NOT NULL,
  `data_reporte` date NOT NULL,
  `quant_reportada` decimal(10,3) NOT NULL,
  `quant_perdida` decimal(10,3) NOT NULL DEFAULT '0.000',
  `quant_operadores` int(11) NOT NULL DEFAULT '1',
  `hora_inicio` varchar(45) DEFAULT NULL,
  `hora_fim` varchar(45) DEFAULT NULL,
  `horas_trabalhadas` decimal(10,2) NOT NULL DEFAULT '0.00',
  `observacoes` varchar(200) NOT NULL,
  `estornado` tinyint(4) NOT NULL,
  `custo_producao` decimal(10,2) NOT NULL DEFAULT '0.00',
  `custo_mob` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `requisicao_material`
--

CREATE TABLE `requisicao_material` (
  `id_empresa` int(11) NOT NULL,
  `cod_requisicao_material` int(11) NOT NULL,
  `data_emissao` date NOT NULL,
  `data_requisicao` date NOT NULL,
  `observacoes` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `retencoes_regras_tributacao`
--

CREATE TABLE `retencoes_regras_tributacao` (
  `id` int(11) NOT NULL,
  `FKIDNaturezaOperacao` int(10) UNSIGNED NOT NULL,
  `RetencaoImpostos` tinyint(1) DEFAULT NULL,
  `AliquotaCSLL` float DEFAULT NULL,
  `AliquotaIRRetido` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `segmento`
--

CREATE TABLE `segmento` (
  `cod_segmento` int(11) NOT NULL,
  `nome_segmento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_common_estados`
--

CREATE TABLE `tb_common_estados` (
  `id` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_common_municipios`
--

CREATE TABLE `tb_common_municipios` (
  `id` int(11) NOT NULL,
  `tb_estado_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `capital` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_common_pais`
--

CREATE TABLE `tb_common_pais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `nome_pt` varchar(255) NOT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  `bacen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fat_nota_fiscal`
--

CREATE TABLE `tb_fat_nota_fiscal` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `origem_nf` int(11) NOT NULL DEFAULT '0',
  `cod_faturamento_pedido` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL DEFAULT '0',
  `tb_fis_natureza_operacao_id` int(11) NOT NULL,
  `chave` varchar(44) DEFAULT NULL,
  `numero` varchar(9) DEFAULT NULL,
  `data_emissao` datetime DEFAULT NULL,
  `x_ped` varchar(45) DEFAULT NULL,
  `data_saida_entrada` datetime DEFAULT NULL,
  `tipo_nfe` varchar(1) DEFAULT NULL,
  `indentificador_destino` varchar(1) DEFAULT NULL,
  `ambiente` varchar(1) DEFAULT NULL,
  `data_recebimento` date DEFAULT NULL,
  `protocolo` varchar(50) DEFAULT NULL,
  `digest_value` varchar(50) DEFAULT NULL,
  `c_stat` varchar(3) DEFAULT NULL,
  `x_motivo` longtext,
  `informacoes_complementares` longtext,
  `finalidade` varchar(1) DEFAULT NULL,
  `tipo_emissao` varchar(1) DEFAULT NULL,
  `recibo` varchar(100) DEFAULT NULL,
  `indicador_final` varchar(1) DEFAULT NULL,
  `indicador_presencial` varchar(1) DEFAULT NULL,
  `processo_emissao` varchar(1) DEFAULT NULL,
  `modelo` varchar(2) NOT NULL,
  `serie` varchar(3) NOT NULL,
  `numero_lote` varchar(100) DEFAULT NULL,
  `ultimo_processamento_em` datetime DEFAULT NULL,
  `informacao_complementar` longtext,
  `quant_volume` int(11) DEFAULT NULL,
  `especie_volume` varchar(100) DEFAULT NULL,
  `marca` varchar(100) NOT NULL,
  `cod_antt` varchar(45) DEFAULT NULL,
  `placa_veiculo` varchar(45) DEFAULT NULL,
  `uf_veiculo` varchar(2) DEFAULT NULL,
  `local_embarque` varchar(100) DEFAULT NULL,
  `uf_embarque` varchar(2) DEFAULT NULL,
  `nf_referencia` varchar(44) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fat_nota_fiscal_evento`
--

CREATE TABLE `tb_fat_nota_fiscal_evento` (
  `id` int(11) NOT NULL,
  `tb_fat_nota_fiscal_id` int(11) NOT NULL,
  `dh_evento` datetime DEFAULT NULL,
  `tp_evento` varchar(6) DEFAULT NULL,
  `n_seq_evento` varchar(2) DEFAULT NULL,
  `ver_evento` decimal(2,2) DEFAULT NULL,
  `desc_evento` varchar(60) DEFAULT NULL,
  `x_just` varchar(255) DEFAULT NULL,
  `x_correcao` longtext,
  `c_stat` varchar(3) DEFAULT NULL,
  `x_motivo` varchar(255) DEFAULT NULL,
  `dh_reg_evento` datetime DEFAULT NULL,
  `n_prot_evento` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fat_nota_fiscal_item`
--

CREATE TABLE `tb_fat_nota_fiscal_item` (
  `id` int(11) NOT NULL,
  `cod_gtin` varchar(14) DEFAULT NULL,
  `quantidade` decimal(14,4) NOT NULL,
  `valor_unitario` decimal(14,4) NOT NULL,
  `valor_desconto` decimal(10,4) DEFAULT NULL,
  `valor_despesas` decimal(10,4) DEFAULT NULL,
  `valor_frete` decimal(10,4) DEFAULT NULL,
  `valor_seguro` decimal(10,4) DEFAULT NULL,
  `valor_comissao` decimal(10,4) DEFAULT NULL,
  `icms_mot_des_icms` varchar(2) DEFAULT NULL,
  `tb_fat_nota_fiscal_id` int(11) NOT NULL,
  `faturamento_pedido_id` int(11) NOT NULL,
  `faturamento_pedido_produto_id` int(11) NOT NULL,
  `tb_fis_cfop_id` int(11) NOT NULL,
  `tb_fis_icms_origem_id` int(11) NOT NULL,
  `tb_fis_icms_cst_id` int(11) DEFAULT NULL,
  `tb_fis_icms_csosn_id` int(11) DEFAULT NULL,
  `valor_unitario_bruto` decimal(14,4) DEFAULT NULL,
  `tb_fis_ipi_cst_id` int(11) DEFAULT NULL,
  `tb_fis_pis_cst_id` int(11) DEFAULT NULL,
  `tb_fis_cofins_cst_id` int(11) DEFAULT NULL,
  `icms_mod_bc` varchar(1) DEFAULT NULL,
  `icms_vbc` decimal(13,2) DEFAULT NULL,
  `icms_picms` decimal(5,2) DEFAULT NULL,
  `icms_vicms` decimal(13,2) DEFAULT NULL,
  `icms_pred_bc` decimal(5,2) DEFAULT NULL,
  `icms_vbcfcp` decimal(15,2) DEFAULT NULL,
  `icms_pfcp` decimal(5,2) DEFAULT NULL,
  `icms_vfcp` decimal(15,2) DEFAULT NULL,
  `icms_mod_bcst` varchar(1) DEFAULT NULL,
  `icms_pmvast` decimal(5,2) DEFAULT NULL,
  `icms_pred_bcst` decimal(5,2) DEFAULT NULL,
  `icms_pcred_sn` decimal(5,2) DEFAULT NULL,
  `icms_vcred_icms_sn` decimal(15,2) DEFAULT NULL,
  `icms_vbcst` decimal(15,2) DEFAULT NULL,
  `icms_picms_st` decimal(5,2) DEFAULT NULL,
  `icms_vicms_st` decimal(15,2) DEFAULT NULL,
  `icms_vbcfcpst` decimal(15,2) DEFAULT NULL,
  `icms_pfcpst` decimal(5,2) DEFAULT NULL,
  `icms_vfcpst` decimal(15,2) DEFAULT NULL,
  `icms_vicmsdeson` decimal(15,2) DEFAULT NULL,
  `icms_vicms_op` decimal(15,2) DEFAULT NULL,
  `icms_picms_dif` decimal(7,4) DEFAULT NULL,
  `icms_vicms_dif` decimal(15,2) DEFAULT NULL,
  `icms_vbcfcpst_ret` decimal(15,2) DEFAULT NULL,
  `icms_pfcpst_ret` decimal(5,2) DEFAULT NULL,
  `icms_vfcpst_ret` decimal(15,2) DEFAULT NULL,
  `ipi_cnpjprod` varchar(14) DEFAULT NULL,
  `ipi_cselo` varchar(60) DEFAULT NULL,
  `ipi_qselo` varchar(12) DEFAULT NULL,
  `ipi_cenq` varchar(3) DEFAULT NULL,
  `ipi_vbc` decimal(15,2) DEFAULT NULL,
  `ipi_pipi` decimal(5,2) DEFAULT NULL,
  `ipi_qunid` decimal(16,4) DEFAULT NULL,
  `ipi_vunid` decimal(15,4) DEFAULT NULL,
  `ipi_vipi` decimal(15,2) DEFAULT NULL,
  `pis_vbc` decimal(15,2) DEFAULT NULL,
  `pis_ppis` decimal(5,2) DEFAULT NULL,
  `pis_vpis` decimal(15,2) DEFAULT NULL,
  `pis_qbc_prod` decimal(16,4) DEFAULT NULL,
  `pis_valiq_prod` decimal(15,4) DEFAULT NULL,
  `cofins_vbc` decimal(15,2) DEFAULT NULL,
  `cofins_pcofins` decimal(5,2) DEFAULT NULL,
  `cofins_vcofins` decimal(15,2) DEFAULT NULL,
  `cofins_qbc_prod` decimal(16,4) DEFAULT NULL,
  `cofins_valiq_prod` decimal(15,4) DEFAULT NULL,
  `c_benef` varchar(10) DEFAULT NULL,
  `icms_vbcufdest` decimal(13,2) DEFAULT NULL,
  `icms_picmsufdest` decimal(5,2) DEFAULT NULL,
  `icms_picmsinter` decimal(5,2) DEFAULT NULL,
  `icms_picmsinter_part` decimal(5,2) DEFAULT NULL,
  `icms_vicmsufdest` decimal(13,2) DEFAULT NULL,
  `icms_vicmsufremet` decimal(13,2) DEFAULT NULL,
  `percentual_comissao` decimal(5,2) DEFAULT NULL,
  `percentual_desconto` decimal(5,2) DEFAULT NULL,
  `unidade_comercial` varchar(2) NOT NULL,
  `unidade_tributavel` varchar(2) DEFAULT NULL,
  `quantidade_tributavel` decimal(14,4) DEFAULT NULL,
  `valor_total_produtos` decimal(15,2) DEFAULT NULL,
  `tb_fis_natureza_operacao_id` int(11) DEFAULT NULL,
  `icms_vbcstret` decimal(15,2) DEFAULT NULL,
  `icms_pst` decimal(5,2) DEFAULT NULL,
  `icms_vicms_substituto` decimal(15,2) DEFAULT NULL,
  `icms_vicms_stret` decimal(15,2) DEFAULT NULL,
  `icms_pred_bcefet` decimal(5,2) DEFAULT NULL,
  `icms_vbcefet` decimal(15,2) DEFAULT NULL,
  `icms_picms_efet` decimal(5,2) DEFAULT NULL,
  `icms_vicms_efet` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_cest`
--

CREATE TABLE `tb_fis_cest` (
  `id` int(11) NOT NULL,
  `codigo` varchar(7) NOT NULL,
  `ncm` varchar(8) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_cfop`
--

CREATE TABLE `tb_fis_cfop` (
  `id` int(11) NOT NULL,
  `codigo` varchar(4) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_codigo_beneficio`
--

CREATE TABLE `tb_fis_codigo_beneficio` (
  `id` int(11) NOT NULL,
  `tb_fis_icms_cst_id` int(11) NOT NULL,
  `tb_common_estados_id` int(11) NOT NULL,
  `tb_fis_ncm_id` int(11) DEFAULT NULL,
  `tb_adm_item_id` int(11) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_ibptncm`
--

CREATE TABLE `tb_fis_ibptncm` (
  `id` int(11) NOT NULL,
  `tb_common_estado_id` int(11) NOT NULL,
  `tb_fis_ncm_id` int(11) NOT NULL,
  `imposto_nacional` decimal(5,2) DEFAULT NULL,
  `imposto_estadual` decimal(5,2) DEFAULT NULL,
  `imposto_importado` decimal(5,2) DEFAULT NULL,
  `imposto_municipal` decimal(5,2) DEFAULT NULL,
  `versao` varchar(50) DEFAULT NULL,
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_icms_aliquota`
--

CREATE TABLE `tb_fis_icms_aliquota` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `tb_fis_natureza_operacao_id` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `aliquota` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_icms_csosn`
--

CREATE TABLE `tb_fis_icms_csosn` (
  `id` int(10) NOT NULL,
  `codigo` char(5) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_icms_cst`
--

CREATE TABLE `tb_fis_icms_cst` (
  `id` int(11) NOT NULL,
  `codigo` varchar(2) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_icms_fcp`
--

CREATE TABLE `tb_fis_icms_fcp` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `tb_fis_natureza_operacao_id` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `ncm` varchar(10) NOT NULL,
  `aliquota` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_icms_origem`
--

CREATE TABLE `tb_fis_icms_origem` (
  `id` int(11) NOT NULL,
  `codigo` varchar(2) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_informacao_complementar`
--

CREATE TABLE `tb_fis_informacao_complementar` (
  `id` int(11) NOT NULL,
  `descricao` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_ipi_cst`
--

CREATE TABLE `tb_fis_ipi_cst` (
  `id` int(11) NOT NULL,
  `codigo` varchar(2) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_natureza_operacao`
--

CREATE TABLE `tb_fis_natureza_operacao` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `tb_fis_cfop_id_estad` int(11) NOT NULL,
  `tb_fis_cfop_id_inter` int(11) NOT NULL,
  `tb_fis_cfop_id_ext` int(11) NOT NULL,
  `tb_fis_icms_cst_id` int(11) DEFAULT NULL,
  `tb_fis_icms_csosn_id` int(11) DEFAULT NULL,
  `tb_fis_informacao_complementar_id` int(11) DEFAULT NULL,
  `tb_fis_ipi_cst_id` int(11) DEFAULT NULL,
  `tb_fis_pis_cst_id` int(11) DEFAULT NULL,
  `tb_fis_cofins_cst_id` int(11) DEFAULT NULL,
  `operacao_fiscal` varchar(1) DEFAULT NULL,
  `c_benef` varchar(45) DEFAULT NULL,
  `finalidade` varchar(1) DEFAULT NULL,
  `p_pis` decimal(5,2) DEFAULT NULL,
  `p_cofins` decimal(5,2) DEFAULT NULL,
  `p_dif` decimal(7,4) DEFAULT NULL,
  `mod_bc` varchar(1) DEFAULT NULL,
  `mod_bc_st` varchar(1) DEFAULT NULL,
  `p_red_bc` decimal(5,2) DEFAULT NULL,
  `p_red_bc_st` decimal(5,2) DEFAULT NULL,
  `p_mvast` decimal(5,2) DEFAULT NULL,
  `mot_des_icms` varchar(2) DEFAULT NULL,
  `c_enq` varchar(3) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `percentual_desconto` decimal(5,2) DEFAULT NULL,
  `converter_icms_em_desconto` tinyint(1) DEFAULT NULL,
  `icms_suspenso` tinyint(1) DEFAULT NULL,
  `ipi_suspenso` tinyint(1) DEFAULT NULL,
  `ipi_integra_vbcicms` tinyint(1) DEFAULT NULL,
  `ipi_integra_vbcpis_cofins` tinyint(1) DEFAULT NULL,
  `gerar_faturamento` tinyint(1) DEFAULT NULL,
  `pis_exclui_icms_vbc` tinyint(1) DEFAULT NULL,
  `cofins_exclui_icms_vbc` tinyint(1) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  `informacoes_complementares` varchar(600) DEFAULT NULL,
  `movimenta_estoque` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_ncm`
--

CREATE TABLE `tb_fis_ncm` (
  `id` int(11) NOT NULL,
  `codigo` varchar(8) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ipi` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_fis_pis_cofins_cst`
--

CREATE TABLE `tb_fis_pis_cofins_cst` (
  `id` int(11) NOT NULL,
  `codigo` varchar(2) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `time_dimension`
--

CREATE TABLE `time_dimension` (
  `id` int(11) NOT NULL,
  `db_date` date NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `quarter` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `day_name` varchar(9) NOT NULL,
  `month_name` varchar(9) NOT NULL,
  `holiday_flag` char(1) DEFAULT 'f',
  `weekend_flag` char(1) DEFAULT 'f',
  `event` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_produto`
--

CREATE TABLE `tipo_produto` (
  `id_empresa` int(11) NOT NULL,
  `cod_tipo_produto` int(11) NOT NULL,
  `nome_tipo_produto` varchar(45) NOT NULL,
  `origem_produto` int(11) NOT NULL,
  `id_conta_azul` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `transportador`
--

CREATE TABLE `transportador` (
  `id_empresa` int(11) NOT NULL,
  `cod_transportador` int(11) NOT NULL,
  `nome_transportador` varchar(60) NOT NULL,
  `razao_social` varchar(60) NOT NULL,
  `tipo_pessoa` int(11) DEFAULT NULL,
  `cnpj_cpf` varchar(20) DEFAULT NULL,
  `tipo_contrib_icms` int(11) DEFAULT '0',
  `insc_estadual` varchar(45) NOT NULL,
  `insc_municipal` varchar(45) DEFAULT NULL,
  `tel_fixo` varchar(20) DEFAULT NULL,
  `tel_cel` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `cep` varchar(15) NOT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `numero` varchar(15) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cod_cidade` int(11) DEFAULT '0',
  `cod_pais` int(11) NOT NULL DEFAULT '1058',
  `ativo` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade_medida`
--

CREATE TABLE `unidade_medida` (
  `id_empresa` int(11) NOT NULL,
  `cod_unidade_medida` varchar(2) NOT NULL,
  `nome_unidade_medida` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `email` varchar(60) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `tipo_acesso` int(11) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '1',
  `producao` tinyint(4) DEFAULT '1',
  `vendas` tinyint(4) DEFAULT '1',
  `compras` tinyint(4) DEFAULT '1',
  `estoque` tinyint(4) DEFAULT '1',
  `fiscal` tinyint(4) NOT NULL DEFAULT '1',
  `financeiro` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda_caixa`
--

CREATE TABLE `venda_caixa` (
  `num_venda_caixa` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `data_caixa` date DEFAULT NULL,
  `data_hora_venda` datetime NOT NULL,
  `indicador_presenca` int(11) DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_transportador` int(11) DEFAULT NULL,
  `tipo_pessoa` int(11) DEFAULT NULL,
  `cnpj_cpf` varchar(20) DEFAULT NULL,
  `valor_bruto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `valor_frete` decimal(10,2) DEFAULT '0.00',
  `tipo_desconto` int(11) DEFAULT '1',
  `valor_desconto` decimal(10,2) DEFAULT '0.00',
  `status` int(11) DEFAULT '1',
  `usuario` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_empresa` int(11) NOT NULL,
  `cod_vendedor` int(11) NOT NULL,
  `nome_vendedor` varchar(60) NOT NULL,
  `perc_comissao` decimal(10,2) DEFAULT '0.00',
  `tel_fixo` varchar(20) DEFAULT NULL,
  `tel_cel` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `complemento` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cod_cidade` int(11) DEFAULT NULL,
  `cons_produto` tinyint(4) DEFAULT '1',
  `cons_frete` tinyint(4) DEFAULT '1',
  `cons_seguro` tinyint(4) DEFAULT '1',
  `cons_outras_despesas` tinyint(4) DEFAULT '1',
  `cons_desconto` tinyint(4) DEFAULT '1',
  `cod_vendas_externas` int(11) DEFAULT NULL,
  `nome_usuario` varchar(60) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '1',
  `cod_fornecedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `calculo_necessidade`
--
ALTER TABLE `calculo_necessidade`
  ADD PRIMARY KEY (`cod_calculo_necessidade`,`id_empresa`);

--
-- Índices de tabela `calculo_necessidade_pedido`
--
ALTER TABLE `calculo_necessidade_pedido`
  ADD PRIMARY KEY (`cod_calculo_necessidade_pedido`);

--
-- Índices de tabela `calculo_necessidade_produto`
--
ALTER TABLE `calculo_necessidade_produto`
  ADD PRIMARY KEY (`cod_calculo_necessidade_produto`);

--
-- Índices de tabela `centro_custo`
--
ALTER TABLE `centro_custo`
  ADD PRIMARY KEY (`cod_centro_custo`,`id_empresa`),
  ADD KEY `empresa_idx` (`id_empresa`);

--
-- Índices de tabela `cest`
--
ALTER TABLE `cest`
  ADD PRIMARY KEY (`cod_cest`);

--
-- Índices de tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Cidade_estado` (`estado`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD KEY `idx_cliente` (`cod_cliente`),
  ADD KEY `segmento_idx` (`cod_segmento`),
  ADD KEY `idx_empresa` (`id_empresa`);

--
-- Índices de tabela `componente_ordem_producao`
--
ALTER TABLE `componente_ordem_producao`
  ADD PRIMARY KEY (`seq_componente_producao`),
  ADD KEY `componente_ordem_idx` (`num_ordem_producao`),
  ADD KEY `componente_produto_idx` (`cod_produto`);

--
-- Índices de tabela `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`cod_conta`,`id_empresa`),
  ADD KEY `empresa_idx` (`id_empresa`);

--
-- Índices de tabela `conta_contabil`
--
ALTER TABLE `conta_contabil`
  ADD PRIMARY KEY (`id_empresa`,`cod_conta_contabil`),
  ADD KEY `idx_conta_contabil` (`cod_conta_contabil`);

--
-- Índices de tabela `controle_caixa`
--
ALTER TABLE `controle_caixa`
  ADD PRIMARY KEY (`id_empresa`,`data_caixa`);

--
-- Índices de tabela `cotacao_ordem`
--
ALTER TABLE `cotacao_ordem`
  ADD PRIMARY KEY (`seq_cotacao_compra`);

--
-- Índices de tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `idx_empresa` (`id_empresa`);

--
-- Índices de tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `estrutura_componente`
--
ALTER TABLE `estrutura_componente`
  ADD PRIMARY KEY (`seq_estrutura_componente`,`id_empresa`),
  ADD KEY `consumo_estrutura_idx` (`cod_produto`,`id_empresa`),
  ADD KEY `consumo_produto_idx` (`cod_produto_componente`,`id_empresa`);

--
-- Índices de tabela `estrutura_produto`
--
ALTER TABLE `estrutura_produto`
  ADD PRIMARY KEY (`cod_produto`,`id_empresa`),
  ADD UNIQUE KEY `id_empresa_UNIQUE` (`id_empresa`,`cod_produto`),
  ADD KEY `estrutura_produto_idx` (`cod_produto`,`id_empresa`);

--
-- Índices de tabela `faturamento_pedido`
--
ALTER TABLE `faturamento_pedido`
  ADD PRIMARY KEY (`cod_faturamento_pedido`),
  ADD KEY `faturamento_pedido_idx` (`num_pedido_venda`),
  ADD KEY `idx_faturamento_pedido` (`cod_faturamento_pedido`);

--
-- Índices de tabela `faturamento_pedido_produto`
--
ALTER TABLE `faturamento_pedido_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faturamento_pedido_idx` (`faturamento_pedido`),
  ADD KEY `produto_produto_idx` (`cod_produto`);

--
-- Índices de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`cod_fornecedor`,`id_empresa`),
  ADD UNIQUE KEY `cod_fornecedor_UNIQUE` (`cod_fornecedor`,`id_empresa`),
  ADD KEY `fornecedor_segmento_idx` (`cod_segmento`),
  ADD KEY `fornecedor_empresa_idx` (`id_empresa`),
  ADD KEY `idx_fornecedor` (`cod_fornecedor`);

--
-- Índices de tabela `historico_custo_medio`
--
ALTER TABLE `historico_custo_medio`
  ADD PRIMARY KEY (`cod_produto`,`id_empresa`,`data_custo`);

--
-- Índices de tabela `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`num_inventario`,`id_empresa`);

--
-- Índices de tabela `meta_vendedor`
--
ALTER TABLE `meta_vendedor`
  ADD PRIMARY KEY (`id_meta`);

--
-- Índices de tabela `metodo_pagamento`
--
ALTER TABLE `metodo_pagamento`
  ADD PRIMARY KEY (`cod_metodo_pagamento`,`id_empresa`),
  ADD KEY `idx_cod_pagamento` (`cod_metodo_pagamento`),
  ADD KEY `empresa_idx` (`id_empresa`);

--
-- Índices de tabela `metodo_pagamento_venda_caixa`
--
ALTER TABLE `metodo_pagamento_venda_caixa`
  ADD PRIMARY KEY (`id_forma_pagamento_caixa`),
  ADD KEY `metodo_venda_idx` (`num_venda_caixa`) USING BTREE,
  ADD KEY `metodo_idx` (`num_venda_caixa`,`cod_metodo_pagamento`),
  ADD KEY `metodo_pag_idx` (`cod_metodo_pagamento`);

--
-- Índices de tabela `movimentos_conta`
--
ALTER TABLE `movimentos_conta`
  ADD PRIMARY KEY (`cod_movimento_conta`),
  ADD KEY `conta_movimento_idx` (`cod_conta`),
  ADD KEY `categoria_idx` (`cod_centro_custo`),
  ADD KEY `cod_centro_custo_idx` (`cod_conta_contabil`),
  ADD KEY `idx_titulo_faturamento` (`origem_movimento`,`id_origem`),
  ADD KEY `idx_origem` (`id_origem`),
  ADD KEY `idx_titulo_pendente` (`confirmado`,`tipo_movimento`,`data_vencimento`,`cod_emitente`,`cod_conta`,`cod_centro_custo`,`cod_conta_contabil`) USING BTREE,
  ADD KEY `idx_previsto` (`cod_conta`,`tipo_movimento`,`confirmado`,`data_confirmacao`,`data_vencimento`),
  ADD KEY `idx_metodo_pagamento` (`cod_metodo_pagamento`),
  ADD KEY `idx_emitente` (`cod_emitente`,`tipo_movimento`);

--
-- Índices de tabela `movimentos_estoque`
--
ALTER TABLE `movimentos_estoque`
  ADD PRIMARY KEY (`cod_movimento_estoque`,`id_empresa`),
  ADD KEY `movimento_produto_idx` (`cod_produto`,`id_empresa`),
  ADD KEY `idx_origem` (`origem_movimento`,`tipo_movimento`,`id_origem`) USING BTREE,
  ADD KEY `idx_produto` (`cod_produto`);

--
-- Índices de tabela `movimentos_frente_caixa`
--
ALTER TABLE `movimentos_frente_caixa`
  ADD PRIMARY KEY (`cod_movimento_frente_caixa`),
  ADD KEY `movimento_caixa_idx` (`id_empresa`,`data_caixa`);

--
-- Índices de tabela `movimentos_produto_venda`
--
ALTER TABLE `movimentos_produto_venda`
  ADD PRIMARY KEY (`cod_movimento_pv`),
  ADD KEY `movimento_produto_idx` (`seq_produto_venda`);

--
-- Índices de tabela `natureza_operacao`
--
ALTER TABLE `natureza_operacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresaIDFK` (`empresaIDFK`);

--
-- Índices de tabela `ncm`
--
ALTER TABLE `ncm`
  ADD PRIMARY KEY (`cod_ncm`),
  ADD KEY `NCM` (`cod_ncm`);

--
-- Índices de tabela `notas_cliente`
--
ALTER TABLE `notas_cliente`
  ADD PRIMARY KEY (`cod_nota_cliente`,`cod_cliente`);

--
-- Índices de tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  ADD PRIMARY KEY (`cod_nota_fiscal`,`id_empresa`);

--
-- Índices de tabela `orcamento`
--
ALTER TABLE `orcamento`
  ADD PRIMARY KEY (`seq_orcamento`),
  ADD UNIQUE KEY `UNIQUE` (`id_empresa`,`cod_centro_custo`,`cod_conta_contabil`,`ano`);

--
-- Índices de tabela `ordem_compra`
--
ALTER TABLE `ordem_compra`
  ADD PRIMARY KEY (`num_ordem_compra`,`id_empresa`),
  ADD KEY `compra_produto_idx` (`cod_produto`,`id_empresa`),
  ADD KEY `ordem_compra_idx` (`num_pedido_compra`,`status`),
  ADD KEY `pedido_compra_idx` (`num_pedido_compra`);

--
-- Índices de tabela `ordem_producao`
--
ALTER TABLE `ordem_producao`
  ADD PRIMARY KEY (`num_ordem_producao`,`id_empresa`),
  ADD KEY `ordem_produto_idx` (`cod_produto`,`id_empresa`);

--
-- Índices de tabela `outros_regras_tributacao`
--
ALTER TABLE `outros_regras_tributacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKIDNaturezaOperacao` (`FKIDNaturezaOperacao`);

--
-- Índices de tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  ADD PRIMARY KEY (`num_pedido_compra`,`id_empresa`),
  ADD KEY `fornecedor_idx` (`cod_fornecedor`);

--
-- Índices de tabela `pedido_venda`
--
ALTER TABLE `pedido_venda`
  ADD PRIMARY KEY (`num_pedido_venda`,`id_empresa`),
  ADD KEY `pedido_cliente_idx` (`cod_cliente`,`id_empresa`),
  ADD KEY `idx_pedido_venda` (`num_pedido_venda`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`cod_produto`,`id_empresa`),
  ADD UNIQUE KEY `cod_produto_UNIQUE` (`cod_produto`,`id_empresa`),
  ADD KEY `produto_tipo_produto_idx` (`cod_tipo_produto`),
  ADD KEY `produto_unidade_medida_idx` (`cod_unidade_medida`),
  ADD KEY `produto_empresa_idx` (`id_empresa`),
  ADD KEY `cod_barras` (`cod_barras`),
  ADD KEY `produto_venda_idx` (`id_empresa`,`cod_produto`,`cod_tipo_produto`,`faturavel`);

--
-- Índices de tabela `produto_inventario`
--
ALTER TABLE `produto_inventario`
  ADD PRIMARY KEY (`seq_produto_inventario`,`id_empresa`),
  ADD KEY `inventario_produto_idx` (`num_inventario`),
  ADD KEY `produto_inventario_idx` (`id_empresa`,`cod_produto`);

--
-- Índices de tabela `produto_lote`
--
ALTER TABLE `produto_lote`
  ADD PRIMARY KEY (`cod_produto`,`id_empresa`,`cod_lote`),
  ADD KEY `LOTE` (`cod_lote`),
  ADD KEY `PRODUTO` (`cod_produto`);

--
-- Índices de tabela `produto_nota_fiscal`
--
ALTER TABLE `produto_nota_fiscal`
  ADD PRIMARY KEY (`seq_produto_nf`),
  ADD KEY `fk_produto_idx` (`cod_produto`);

--
-- Índices de tabela `produto_requisicao_material`
--
ALTER TABLE `produto_requisicao_material`
  ADD PRIMARY KEY (`seq_produto_requisicao_material`,`id_empresa`);

--
-- Índices de tabela `produto_venda`
--
ALTER TABLE `produto_venda`
  ADD PRIMARY KEY (`seq_produto_venda`),
  ADD KEY `produto_venda_idx` (`num_pedido_venda`),
  ADD KEY `produto_produto_idx` (`cod_produto`);

--
-- Índices de tabela `produto_venda_caixa`
--
ALTER TABLE `produto_venda_caixa`
  ADD PRIMARY KEY (`seq_produto`),
  ADD KEY `produto_venda_idx` (`num_venda_caixa`),
  ADD KEY `produto_idx` (`num_venda_caixa`,`cod_produto`) USING BTREE;

--
-- Índices de tabela `recebimento_material`
--
ALTER TABLE `recebimento_material`
  ADD PRIMARY KEY (`cod_recebimento_material`),
  ADD KEY `pedido_idx` (`num_pedido_compra`),
  ADD KEY `recebimento_idx` (`num_pedido_compra`,`estornado`);

--
-- Índices de tabela `recebimento_material_produto`
--
ALTER TABLE `recebimento_material_produto`
  ADD PRIMARY KEY (`seq_produto_recebimento`),
  ADD KEY `pedido_idx` (`cod_recebimento_material`);

--
-- Índices de tabela `reporte_producao`
--
ALTER TABLE `reporte_producao`
  ADD PRIMARY KEY (`cod_reporte_producao`),
  ADD KEY `reporte_ordem_idx` (`num_ordem_producao`);

--
-- Índices de tabela `requisicao_material`
--
ALTER TABLE `requisicao_material`
  ADD PRIMARY KEY (`cod_requisicao_material`,`id_empresa`);

--
-- Índices de tabela `retencoes_regras_tributacao`
--
ALTER TABLE `retencoes_regras_tributacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKIDNaturezaOperacao` (`FKIDNaturezaOperacao`);

--
-- Índices de tabela `segmento`
--
ALTER TABLE `segmento`
  ADD PRIMARY KEY (`cod_segmento`),
  ADD UNIQUE KEY `cod_segmento_UNIQUE` (`cod_segmento`);

--
-- Índices de tabela `tb_common_estados`
--
ALTER TABLE `tb_common_estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_common_municipios`
--
ALTER TABLE `tb_common_municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BA8655F4656DDE7D` (`tb_estado_id`),
  ADD KEY `cidade_estado_idx` (`tb_estado_id`,`nome`);

--
-- Índices de tabela `tb_common_pais`
--
ALTER TABLE `tb_common_pais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fat_nota_fiscal`
--
ALTER TABLE `tb_fat_nota_fiscal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6AE753189147C3E_faturamento_pedido` (`cod_faturamento_pedido`),
  ADD KEY `IDX_6AE753189147C3E_tb_fis_natureza_operacao` (`tb_fis_natureza_operacao_id`),
  ADD KEY `IDX_6AE753189147C3E` (`id_empresa`),
  ADD KEY `COD_FATUR_PED_ORIGEM` (`cod_faturamento_pedido`,`origem_nf`);

--
-- Índices de tabela `tb_fat_nota_fiscal_evento`
--
ALTER TABLE `tb_fat_nota_fiscal_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_132A03920CE49CD` (`tb_fat_nota_fiscal_id`);

--
-- Índices de tabela `tb_fat_nota_fiscal_item`
--
ALTER TABLE `tb_fat_nota_fiscal_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CF0B0E12E8360D55_fnf` (`tb_fat_nota_fiscal_id`),
  ADD KEY `IDX_CF0B0E12E8360D55` (`faturamento_pedido_id`),
  ADD KEY `IDX_CF0B0E12E8360D55_fpp` (`faturamento_pedido_produto_id`),
  ADD KEY `IDX_CF0B0E125F2D6457` (`tb_fis_cfop_id`),
  ADD KEY `IDX_CF0B0E123B0A9C6F` (`tb_fis_icms_origem_id`),
  ADD KEY `IDX_CF0B0E12494762C9` (`tb_fis_icms_cst_id`),
  ADD KEY `IDX_CF0B0E12494762C9_csosn` (`tb_fis_icms_csosn_id`),
  ADD KEY `IDX_CF0B0E12756FFB26` (`tb_fis_ipi_cst_id`),
  ADD KEY `IDX_CF0B0E1243CC88CD` (`tb_fis_pis_cst_id`),
  ADD KEY `IDX_CF0B0E12F7063CE1` (`tb_fis_cofins_cst_id`),
  ADD KEY `IDX_CF0B0E12D50A6410` (`tb_fis_natureza_operacao_id`);

--
-- Índices de tabela `tb_fis_cest`
--
ALTER TABLE `tb_fis_cest`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_cfop`
--
ALTER TABLE `tb_fis_cfop`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_codigo_beneficio`
--
ALTER TABLE `tb_fis_codigo_beneficio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8DA34A7E494762C9` (`tb_fis_icms_cst_id`),
  ADD KEY `IDX_8DA34A7E7140DE9B` (`tb_common_estados_id`),
  ADD KEY `IDX_8DA34A7E3D4D974B` (`tb_fis_ncm_id`),
  ADD KEY `IDX_8DA34A7EE54708BA` (`tb_adm_item_id`);

--
-- Índices de tabela `tb_fis_ibptncm`
--
ALTER TABLE `tb_fis_ibptncm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AB84318238CB304A` (`tb_common_estado_id`),
  ADD KEY `IDX_AB8431823D4D974B` (`tb_fis_ncm_id`);

--
-- Índices de tabela `tb_fis_icms_aliquota`
--
ALTER TABLE `tb_fis_icms_aliquota`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_icms_csosn`
--
ALTER TABLE `tb_fis_icms_csosn`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_icms_cst`
--
ALTER TABLE `tb_fis_icms_cst`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_icms_fcp`
--
ALTER TABLE `tb_fis_icms_fcp`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_icms_origem`
--
ALTER TABLE `tb_fis_icms_origem`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_informacao_complementar`
--
ALTER TABLE `tb_fis_informacao_complementar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_ipi_cst`
--
ALTER TABLE `tb_fis_ipi_cst`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_natureza_operacao`
--
ALTER TABLE `tb_fis_natureza_operacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_372F23E95F2D6457` (`tb_fis_cfop_id_estad`),
  ADD KEY `IDX_372F23E9494762C9` (`tb_fis_icms_cst_id`),
  ADD KEY `IDX_372F23E9494762C9_csosn` (`tb_fis_icms_csosn_id`),
  ADD KEY `IDX_372F23E96BD40508` (`tb_fis_informacao_complementar_id`),
  ADD KEY `IDX_372F23E9756FFB26` (`tb_fis_ipi_cst_id`),
  ADD KEY `IDX_372F23E943CC88CD` (`tb_fis_pis_cst_id`),
  ADD KEY `IDX_372F23E9F7063CE1` (`tb_fis_cofins_cst_id`),
  ADD KEY `tb_fis_natureza_operacao_empresa_key` (`id_empresa`);

--
-- Índices de tabela `tb_fis_ncm`
--
ALTER TABLE `tb_fis_ncm`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_fis_pis_cofins_cst`
--
ALTER TABLE `tb_fis_pis_cofins_cst`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `time_dimension`
--
ALTER TABLE `time_dimension`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `td_ymd_idx` (`year`,`month`,`day`),
  ADD UNIQUE KEY `td_dbdate_idx` (`db_date`);

--
-- Índices de tabela `tipo_produto`
--
ALTER TABLE `tipo_produto`
  ADD PRIMARY KEY (`cod_tipo_produto`,`id_empresa`),
  ADD KEY `tipo_produto_empresa_idx` (`id_empresa`);

--
-- Índices de tabela `transportador`
--
ALTER TABLE `transportador`
  ADD PRIMARY KEY (`cod_transportador`,`id_empresa`),
  ADD KEY `transportador_empresa_idx` (`id_empresa`);

--
-- Índices de tabela `unidade_medida`
--
ALTER TABLE `unidade_medida`
  ADD PRIMARY KEY (`id_empresa`,`cod_unidade_medida`),
  ADD UNIQUE KEY `cod_unidade_medida_UNIQUE` (`cod_unidade_medida`,`id_empresa`),
  ADD KEY `unidade_medida_empresa_idx` (`id_empresa`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `usuario_empresa_idx` (`id_empresa`);

--
-- Índices de tabela `venda_caixa`
--
ALTER TABLE `venda_caixa`
  ADD PRIMARY KEY (`num_venda_caixa`),
  ADD KEY `controle_caixa_idx` (`id_empresa`,`data_caixa`),
  ADD KEY `venda_caixa_ix` (`data_caixa`,`id_empresa`,`status`) USING BTREE;

--
-- Índices de tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`cod_vendedor`,`id_empresa`),
  ADD KEY `idx_vendedor` (`cod_vendedor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calculo_necessidade`
--
ALTER TABLE `calculo_necessidade`
  MODIFY `cod_calculo_necessidade` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `calculo_necessidade_pedido`
--
ALTER TABLE `calculo_necessidade_pedido`
  MODIFY `cod_calculo_necessidade_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `calculo_necessidade_produto`
--
ALTER TABLE `calculo_necessidade_produto`
  MODIFY `cod_calculo_necessidade_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `componente_ordem_producao`
--
ALTER TABLE `componente_ordem_producao`
  MODIFY `seq_componente_producao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conta`
--
ALTER TABLE `conta`
  MODIFY `cod_conta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cotacao_ordem`
--
ALTER TABLE `cotacao_ordem`
  MODIFY `seq_cotacao_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estrutura_componente`
--
ALTER TABLE `estrutura_componente`
  MODIFY `seq_estrutura_componente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `faturamento_pedido`
--
ALTER TABLE `faturamento_pedido`
  MODIFY `cod_faturamento_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `faturamento_pedido_produto`
--
ALTER TABLE `faturamento_pedido_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `inventario`
--
ALTER TABLE `inventario`
  MODIFY `num_inventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `meta_vendedor`
--
ALTER TABLE `meta_vendedor`
  MODIFY `id_meta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `metodo_pagamento`
--
ALTER TABLE `metodo_pagamento`
  MODIFY `cod_metodo_pagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `metodo_pagamento_venda_caixa`
--
ALTER TABLE `metodo_pagamento_venda_caixa`
  MODIFY `id_forma_pagamento_caixa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentos_conta`
--
ALTER TABLE `movimentos_conta`
  MODIFY `cod_movimento_conta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentos_estoque`
--
ALTER TABLE `movimentos_estoque`
  MODIFY `cod_movimento_estoque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentos_frente_caixa`
--
ALTER TABLE `movimentos_frente_caixa`
  MODIFY `cod_movimento_frente_caixa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentos_produto_venda`
--
ALTER TABLE `movimentos_produto_venda`
  MODIFY `cod_movimento_pv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `natureza_operacao`
--
ALTER TABLE `natureza_operacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notas_cliente`
--
ALTER TABLE `notas_cliente`
  MODIFY `cod_nota_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  MODIFY `cod_nota_fiscal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `orcamento`
--
ALTER TABLE `orcamento`
  MODIFY `seq_orcamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ordem_compra`
--
ALTER TABLE `ordem_compra`
  MODIFY `num_ordem_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ordem_producao`
--
ALTER TABLE `ordem_producao`
  MODIFY `num_ordem_producao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `outros_regras_tributacao`
--
ALTER TABLE `outros_regras_tributacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_compra`
--
ALTER TABLE `pedido_compra`
  MODIFY `num_pedido_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido_venda`
--
ALTER TABLE `pedido_venda`
  MODIFY `num_pedido_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_inventario`
--
ALTER TABLE `produto_inventario`
  MODIFY `seq_produto_inventario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_nota_fiscal`
--
ALTER TABLE `produto_nota_fiscal`
  MODIFY `seq_produto_nf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_requisicao_material`
--
ALTER TABLE `produto_requisicao_material`
  MODIFY `seq_produto_requisicao_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_venda`
--
ALTER TABLE `produto_venda`
  MODIFY `seq_produto_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_venda_caixa`
--
ALTER TABLE `produto_venda_caixa`
  MODIFY `seq_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `recebimento_material`
--
ALTER TABLE `recebimento_material`
  MODIFY `cod_recebimento_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `recebimento_material_produto`
--
ALTER TABLE `recebimento_material_produto`
  MODIFY `seq_produto_recebimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reporte_producao`
--
ALTER TABLE `reporte_producao`
  MODIFY `cod_reporte_producao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `requisicao_material`
--
ALTER TABLE `requisicao_material`
  MODIFY `cod_requisicao_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `retencoes_regras_tributacao`
--
ALTER TABLE `retencoes_regras_tributacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_common_estados`
--
ALTER TABLE `tb_common_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_common_municipios`
--
ALTER TABLE `tb_common_municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_common_pais`
--
ALTER TABLE `tb_common_pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fat_nota_fiscal`
--
ALTER TABLE `tb_fat_nota_fiscal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fat_nota_fiscal_evento`
--
ALTER TABLE `tb_fat_nota_fiscal_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fat_nota_fiscal_item`
--
ALTER TABLE `tb_fat_nota_fiscal_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_cest`
--
ALTER TABLE `tb_fis_cest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_cfop`
--
ALTER TABLE `tb_fis_cfop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_codigo_beneficio`
--
ALTER TABLE `tb_fis_codigo_beneficio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_ibptncm`
--
ALTER TABLE `tb_fis_ibptncm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_icms_aliquota`
--
ALTER TABLE `tb_fis_icms_aliquota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_icms_csosn`
--
ALTER TABLE `tb_fis_icms_csosn`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_icms_cst`
--
ALTER TABLE `tb_fis_icms_cst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_icms_fcp`
--
ALTER TABLE `tb_fis_icms_fcp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_icms_origem`
--
ALTER TABLE `tb_fis_icms_origem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_informacao_complementar`
--
ALTER TABLE `tb_fis_informacao_complementar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_ipi_cst`
--
ALTER TABLE `tb_fis_ipi_cst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_natureza_operacao`
--
ALTER TABLE `tb_fis_natureza_operacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_ncm`
--
ALTER TABLE `tb_fis_ncm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_fis_pis_cofins_cst`
--
ALTER TABLE `tb_fis_pis_cofins_cst`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_produto`
--
ALTER TABLE `tipo_produto`
  MODIFY `cod_tipo_produto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transportador`
--
ALTER TABLE `transportador`
  MODIFY `cod_transportador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `venda_caixa`
--
ALTER TABLE `venda_caixa`
  MODIFY `num_venda_caixa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `cod_vendedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `componente_ordem_producao`
--
ALTER TABLE `componente_ordem_producao`
  ADD CONSTRAINT `componente_ordem` FOREIGN KEY (`num_ordem_producao`) REFERENCES `ordem_producao` (`num_ordem_producao`),
  ADD CONSTRAINT `componente_produto` FOREIGN KEY (`cod_produto`) REFERENCES `produto` (`cod_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
