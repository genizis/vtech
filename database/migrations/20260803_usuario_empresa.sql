-- Permite que um usuário da instalação VTech acesse uma ou mais empresas.
-- usuario.id_empresa continua sendo aceito como empresa padrão durante a transição.
CREATE TABLE IF NOT EXISTS `usuario_empresa` (
  `email_usuario` varchar(60) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `empresa_padrao` tinyint(1) NOT NULL DEFAULT '0',
  `criado_em` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email_usuario`, `id_empresa`),
  KEY `idx_usuario_empresa_empresa` (`id_empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
