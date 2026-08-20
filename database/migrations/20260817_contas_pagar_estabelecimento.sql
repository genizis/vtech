-- Identifica diretamente o estabelecimento responsável por cada título.
-- A conta pode permanecer indefinida enquanto o título estiver pendente.

ALTER TABLE `movimentos_conta`
  ADD COLUMN `id_estabelecimento` int(11) DEFAULT NULL AFTER `cod_movimento_conta`,
  MODIFY COLUMN `cod_conta` int(11) DEFAULT NULL;

UPDATE `movimentos_conta` m
JOIN `conta` c ON c.`cod_conta` = m.`cod_conta`
SET m.`id_estabelecimento` = c.`id_estabelecimento`
WHERE m.`id_estabelecimento` IS NULL;

ALTER TABLE `movimentos_conta`
  ADD KEY `idx_movimento_estabelecimento` (`id_estabelecimento`),
  ADD CONSTRAINT `fk_movimento_estabelecimento`
    FOREIGN KEY (`id_estabelecimento`)
    REFERENCES `estabelecimento` (`id_estabelecimento`);
