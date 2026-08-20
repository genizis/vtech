-- Estrutura inicial da conciliacao bancaria. A importacao e o extrato ficam
-- separados dos movimentos financeiros para preservar o historico bancario.

CREATE TABLE `conciliacao_importacao` (
  `id_importacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `cod_conta` int(11) NOT NULL,
  `nome_arquivo` varchar(255) NOT NULL,
  `hash_arquivo` char(64) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `data_importacao` datetime NOT NULL,
  `usuario_importacao` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_importacao`),
  UNIQUE KEY `uq_conciliacao_arquivo` (`id_empresa`, `cod_conta`, `hash_arquivo`),
  KEY `idx_conciliacao_importacao_conta` (`cod_conta`),
  CONSTRAINT `fk_conciliacao_importacao_conta` FOREIGN KEY (`cod_conta`) REFERENCES `conta` (`cod_conta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `conciliacao_extrato` (
  `id_extrato` int(11) NOT NULL AUTO_INCREMENT,
  `id_importacao` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `cod_conta` int(11) NOT NULL,
  `data_movimento` date NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `documento` varchar(100) DEFAULT NULL,
  `identificador_banco` varchar(150) DEFAULT NULL,
  `valor` decimal(12,2) NOT NULL,
  `hash_transacao` char(64) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pendente',
  PRIMARY KEY (`id_extrato`),
  UNIQUE KEY `uq_conciliacao_transacao` (`id_empresa`, `cod_conta`, `hash_transacao`),
  KEY `idx_conciliacao_extrato_periodo` (`cod_conta`, `data_movimento`),
  CONSTRAINT `fk_conciliacao_extrato_importacao` FOREIGN KEY (`id_importacao`) REFERENCES `conciliacao_importacao` (`id_importacao`),
  CONSTRAINT `fk_conciliacao_extrato_conta` FOREIGN KEY (`cod_conta`) REFERENCES `conta` (`cod_conta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `conciliacao_vinculo` (
  `id_vinculo` int(11) NOT NULL AUTO_INCREMENT,
  `id_extrato` int(11) NOT NULL,
  `cod_movimento_conta` int(11) NOT NULL,
  `valor_conciliado` decimal(12,2) NOT NULL,
  `data_conciliacao` datetime NOT NULL,
  `usuario_conciliacao` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_vinculo`),
  UNIQUE KEY `uq_conciliacao_extrato` (`id_extrato`),
  UNIQUE KEY `uq_conciliacao_movimento` (`cod_movimento_conta`),
  CONSTRAINT `fk_conciliacao_vinculo_extrato` FOREIGN KEY (`id_extrato`) REFERENCES `conciliacao_extrato` (`id_extrato`),
  CONSTRAINT `fk_conciliacao_vinculo_movimento` FOREIGN KEY (`cod_movimento_conta`) REFERENCES `movimentos_conta` (`cod_movimento_conta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
