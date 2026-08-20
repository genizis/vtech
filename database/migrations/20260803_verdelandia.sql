-- Empresa principal da instalação. Dados fiscais e cadastrais devem ser
-- completados na tela "Dados da Minha Empresa" antes do uso em produção.
INSERT INTO `empresa` (
  `id_empresa`, `nome_empresa`, `tipo_empresa`, `tel_cel`, `data_validade`,
  `schema_nfe`, `modelo`, `modelo_nfce`, `codigo_regime_tributario`,
  `integ_usuario_vendas_externas`, `integ_senha_vendas_externas`,
  `percentual_credito_sn`, `token_ibpt`, `e_mail_confirmado`
)
SELECT
  1, 'Verdelandia', 1, '', '2099-12-31',
  '', '55', '65', '1', '', '', 0, '', 1
FROM DUAL
WHERE NOT EXISTS (
  SELECT 1 FROM `empresa` WHERE `id_empresa` = 1
);
