CREATE TABLE IF NOT EXISTS `usuario` (
  `id_empresa` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nome_usuario` varchar(100) NOT NULL,
  `senha` char(40) NOT NULL,
  `tipo_acesso` tinyint(1) NOT NULL DEFAULT '0',
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `producao` tinyint(1) NOT NULL DEFAULT '0',
  `vendas` tinyint(1) NOT NULL DEFAULT '0',
  `compras` tinyint(1) NOT NULL DEFAULT '0',
  `estoque` tinyint(1) NOT NULL DEFAULT '0',
  `fiscal` tinyint(1) NOT NULL DEFAULT '0',
  `financeiro` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  KEY `idx_usuario_empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `usuario` (
  `id_empresa`, `email`, `nome_usuario`, `senha`, `tipo_acesso`, `ativo`,
  `producao`, `vendas`, `compras`, `estoque`, `fiscal`, `financeiro`
)
VALUES (
  1, 'admin@vtech.com.br', 'Administrador Vtech', SHA1('12345678'), 1, 1,
  1, 1, 1, 1, 1, 1
)
ON DUPLICATE KEY UPDATE
  `id_empresa` = VALUES(`id_empresa`),
  `nome_usuario` = VALUES(`nome_usuario`),
  `senha` = VALUES(`senha`),
  `tipo_acesso` = VALUES(`tipo_acesso`),
  `ativo` = VALUES(`ativo`),
  `producao` = VALUES(`producao`),
  `vendas` = VALUES(`vendas`),
  `compras` = VALUES(`compras`),
  `estoque` = VALUES(`estoque`),
  `fiscal` = VALUES(`fiscal`),
  `financeiro` = VALUES(`financeiro`);

INSERT INTO `usuario_empresa` (`email_usuario`, `id_empresa`, `ativo`, `empresa_padrao`)
VALUES ('admin@vtech.com.br', 1, 1, 1)
ON DUPLICATE KEY UPDATE
  `ativo` = VALUES(`ativo`),
  `empresa_padrao` = VALUES(`empresa_padrao`);
