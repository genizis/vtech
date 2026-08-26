-- Registra se a conciliacao foi responsavel por liquidar um titulo pendente,
-- permitindo desfazer a operacao sem alterar movimentos ja confirmados antes.

ALTER TABLE `conciliacao_vinculo`
  ADD COLUMN `movimento_confirmado_conciliacao` tinyint(4) NOT NULL DEFAULT '0' AFTER `valor_conciliado`,
  ADD COLUMN `cod_conta_anterior` int(11) DEFAULT NULL AFTER `movimento_confirmado_conciliacao`;
