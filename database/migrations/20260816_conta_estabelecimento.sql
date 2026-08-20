-- Vincula cada conta financeira a um estabelecimento, mantendo id_empresa
-- como limite de segurança e compatibilidade com os cadastros existentes.

ALTER TABLE `estabelecimento`
  ADD UNIQUE KEY `uq_estabelecimento_empresa` (`id_estabelecimento`, `id_empresa`);

ALTER TABLE `conta`
  ADD COLUMN `id_estabelecimento` int(11) DEFAULT NULL AFTER `id_empresa`;

-- Para empresas legadas sem estabelecimento, cria uma matriz a partir dos
-- dados já existentes no cadastro da empresa. Assim elas já podem criar contas.
INSERT INTO `estabelecimento` (
  `id_empresa`, `tipo_estabelecimento`, `razao_social`, `nome_estabelecimento`,
  `tipo_pessoa`, `cnpj_cpf`, `tel_fixo`, `tel_cel`, `email_contato`, `cep`,
  `endereco`, `numero`, `complemento`, `bairro`, `cod_cidade`, `insc_estadual`,
  `isenta_ie`, `caminho_logo`
)
SELECT
  e.`id_empresa`, 1, e.`razao_social`, e.`nome_empresa`, e.`tipo_empresa`,
  e.`cnpj_cpf`, e.`tel_fixo`, e.`tel_cel`, e.`email_contato`, e.`cep`,
  e.`endereco`, e.`numero`, e.`complemento`, e.`bairro`, e.`cod_cidade`,
  e.`insc_estadual`, e.`isenta_ie`, e.`caminho_logo`
FROM `empresa` e
WHERE NOT EXISTS (
  SELECT 1 FROM `estabelecimento` es WHERE es.`id_empresa` = e.`id_empresa`
);

-- Prioriza a matriz; na ausência dela, usa o primeiro estabelecimento.
UPDATE `conta` c
JOIN (
  SELECT `id_empresa`, MIN(`id_estabelecimento`) AS `id_estabelecimento`
  FROM `estabelecimento`
  WHERE `tipo_estabelecimento` = 1
  GROUP BY `id_empresa`
) es ON es.`id_empresa` = c.`id_empresa`
SET c.`id_estabelecimento` = es.`id_estabelecimento`
WHERE c.`id_estabelecimento` IS NULL;

UPDATE `conta` c
JOIN (
  SELECT `id_empresa`, MIN(`id_estabelecimento`) AS `id_estabelecimento`
  FROM `estabelecimento`
  GROUP BY `id_empresa`
) es ON es.`id_empresa` = c.`id_empresa`
SET c.`id_estabelecimento` = es.`id_estabelecimento`
WHERE c.`id_estabelecimento` IS NULL;

ALTER TABLE `conta`
  MODIFY COLUMN `id_estabelecimento` int(11) NOT NULL AFTER `id_empresa`,
  ADD KEY `idx_conta_estabelecimento` (`id_estabelecimento`, `id_empresa`),
  ADD CONSTRAINT `fk_conta_estabelecimento_empresa`
    FOREIGN KEY (`id_estabelecimento`, `id_empresa`)
    REFERENCES `estabelecimento` (`id_estabelecimento`, `id_empresa`);
