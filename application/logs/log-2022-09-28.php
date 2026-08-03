<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2022-09-28 18:34:10 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:34:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:34:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 18:34:10 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:34:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:34:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 18:34:10 --> Total execution time: 0.0982
DEBUG - 2022-09-28 18:34:18 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:34:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:34:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 18:34:18 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:34:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:34:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 18:34:19 --> Total execution time: 1.1038
DEBUG - 2022-09-28 18:34:20 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:34:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:34:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 18:34:20 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:34:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:34:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:34:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 15 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda *
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:37:55 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:37:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:37:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 18:37:55 --> Total execution time: 0.1194
DEBUG - 2022-09-28 18:38:11 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:38:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:38:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:38:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 15 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda *
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:38:32 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:38:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:38:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:38:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 15 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:44:10 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:44:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:44:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:44:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:45:27 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:45:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:45:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:45:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:45:51 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:45:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:45:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:45:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*
FROM `produto_venda_caixa`
JOIN `produto` ON `produt...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:45:53 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:45:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:45:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:45:53 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*
FROM `produto_venda_caixa`
JOIN `produto` ON `produt...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:46:09 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:46:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:46:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:46:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:47:13 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:47:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:47:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:47:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:48:16 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:48:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:48:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 18:48:16 --> Total execution time: 0.5938
DEBUG - 2022-09-28 18:49:06 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:49:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:49:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:49:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT *
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:49:22 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:49:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:49:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:49:22 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC)
 LIMIT 10
DEBUG - 2022-09-28 18:49:34 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:49:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:49:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:49:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT *
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC)
 LIMIT 10
DEBUG - 2022-09-28 18:49:41 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:49:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:49:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:49:41 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
 LIMIT 10
DEBUG - 2022-09-28 18:49:52 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:49:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:49:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 18:49:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido,...' at line 14 - Invalid query: SELECT `produtos`.*
FROM (SELECT `produto`.*, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `faturamento_pedido_produto`.`cod_produto`
ORDER BY `valor_total` DESC UNION SELECT `produto`.*, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `produto_venda_caixa`.`cod_produto`
ORDER BY `valor_total` DESC) produtos
DEBUG - 2022-09-28 18:52:28 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 18:52:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 18:52:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 18:52:29 --> Total execution time: 0.5597
DEBUG - 2022-09-28 19:07:24 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:07:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:07:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 19:07:25 --> Query error: Unknown column 'movimentos_estoque.valor_movimento' in 'field list' - Invalid query: SELECT `clientes`.*
FROM (SELECT `cliente`.`nome_cliente`, sum(faturamento_pedido.valor_bruto) total_vendas, sum(faturamento_pedido.valor_desconto) total_desconto, sum(faturamento_pedido.valor_frete) total_frete
FROM `faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `cliente`.`cod_cliente` UNION SELECT IFNULL(cliente.nome_cliente, 'Consumidor Final') nome_cliente, sum(venda_caixa.valor_bruto) total_vendas, sum(if(venda_caixa.tipo_desconto = 1, `venda_caixa`.`valor_desconto`, movimentos_estoque.valor_movimento * (venda_caixa.valor_desconto / 100))) total_desconto, sum(venda_caixa.valor_frete) total_frete
FROM `venda_caixa`
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `venda_caixa`.`cod_cliente`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `cliente`.`cod_cliente`) clientes
GROUP BY `clientes`.`cod_cliente`
ORDER BY `clientes`.`total_vendas` DESC
 LIMIT 10
DEBUG - 2022-09-28 19:09:08 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:09:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:09:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 19:09:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'sum(venda_caixa.valor_frete) total_frete
FROM `venda_caixa`
LEFT JOIN `client...' at line 11 - Invalid query: SELECT `clientes`.*
FROM (SELECT `cliente`.`nome_cliente`, sum(faturamento_pedido.valor_bruto) total_vendas, sum(faturamento_pedido.valor_desconto) total_desconto, sum(faturamento_pedido.valor_frete) total_frete
FROM `faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `cliente`.`cod_cliente` UNION SELECT IFNULL(cliente.nome_cliente, 'Consumidor Final') nome_cliente, sum(venda_caixa.valor_bruto) total_vendas, sum(IF(venda_caixa.tipo_desconto = 1, `venda_caixa`.`valor_desconto`, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100)))) total_desconto, sum(venda_caixa.valor_frete) total_frete
FROM `venda_caixa`
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `venda_caixa`.`cod_cliente`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `cliente`.`cod_cliente`) clientes
GROUP BY `clientes`.`cod_cliente`
ORDER BY `clientes`.`total_vendas` DESC
 LIMIT 10
DEBUG - 2022-09-28 19:09:21 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:09:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:09:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 19:09:22 --> Query error: Unknown column 'clientes.cod_cliente' in 'group statement' - Invalid query: SELECT `clientes`.*
FROM (SELECT `cliente`.`nome_cliente`, sum(faturamento_pedido.valor_bruto) total_vendas, sum(faturamento_pedido.valor_desconto) total_desconto, sum(faturamento_pedido.valor_frete) total_frete
FROM `faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-30'
GROUP BY `cliente`.`cod_cliente` UNION SELECT IFNULL(cliente.nome_cliente, 'Consumidor Final') nome_cliente, sum(venda_caixa.valor_bruto) total_vendas, sum(IF(venda_caixa.tipo_desconto = 1, `venda_caixa`.`valor_desconto`, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) total_desconto, sum(venda_caixa.valor_frete) total_frete
FROM `venda_caixa`
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `venda_caixa`.`cod_cliente`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-30'
GROUP BY `cliente`.`cod_cliente`) clientes
GROUP BY `clientes`.`cod_cliente`
ORDER BY `clientes`.`total_vendas` DESC
 LIMIT 10
DEBUG - 2022-09-28 19:10:06 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:10:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:10:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 19:10:06 --> Total execution time: 0.5591
DEBUG - 2022-09-28 19:11:18 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:11:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:11:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 19:11:19 --> Total execution time: 0.5761
DEBUG - 2022-09-28 19:36:37 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:36:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:36:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 19:36:37 --> Total execution time: 0.1494
DEBUG - 2022-09-28 19:40:13 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:40:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:40:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 19:40:13 --> Total execution time: 0.1074
DEBUG - 2022-09-28 19:44:15 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:44:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:44:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 19:44:15 --> Total execution time: 0.3236
DEBUG - 2022-09-28 19:44:51 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:44:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:44:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 19:44:51 --> Query error: Unknown column 'vendas.cod_produto' in 'group statement' - Invalid query: SELECT sum(vendas.valor_total) valor_total
FROM (SELECT sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28'
GROUP BY `produto_venda_caixa`.`cod_produto`) vendas
GROUP BY `vendas`.`cod_produto`
DEBUG - 2022-09-28 19:45:36 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:45:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:45:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 19:45:36 --> Total execution time: 0.2816
DEBUG - 2022-09-28 19:50:47 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:50:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:50:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 19:50:47 --> Query error: Unknown column 'vendas.total_vendido' in 'field list' - Invalid query: SELECT `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, sum(vendas.quant_vendido) quant_vendido, sum(vendas.total_vendido) total_vendido
FROM (SELECT `produto`.*, `tipo_produto`.`nome_tipo_produto`, sum(faturamento_pedido_produto.quantidade) quant_vendido, sum(faturamento_pedido_produto.valor_unitario *
                               faturamento_pedido_produto.quantidade) valor_total
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `produto`.`id_empresa` = '63'
AND `pedido_venda`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28'
GROUP BY `faturamento_pedido_produto`.`cod_produto` UNION SELECT `produto`.*, `tipo_produto`.`nome_tipo_produto`, sum(produto_venda_caixa.quant_venda) quant_vendido, sum(produto_venda_caixa.quant_venda * 
                               produto_venda_caixa.valor_unit) valor_total
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `produto`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28'
GROUP BY `produto_venda_caixa`.`cod_produto`) vendas
GROUP BY `cod_produto`
ORDER BY `total_vendido` DESC
DEBUG - 2022-09-28 19:51:21 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 19:51:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 19:51:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 19:51:21 --> Total execution time: 0.2641
DEBUG - 2022-09-28 20:43:23 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:43:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:43:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:43:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'as `quant_venda`, (venda_caixa.quant_venda * venda_caixa.valor_unit) as valor...' at line 13 - Invalid query: SELECT `vendas`.`tipo_venda`, `vendas`.`data_venda`, `vendas`.`pedido`, `vendas`.`venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_venda`, `vendas`.`valor_venda`
FROM (SELECT "Pedido Venda" as `tipo_venda`, `faturamento_pedido`.`data_faturamento` as `data_venda`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `faturamento_pedido_produto`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido_produto`.`quantidade` as `quant_venda`, (faturamento_pedido_produto.valor_unitario *faturamento_pedido_produto.quantidade) valor_venda
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT "Frente de Caixa" as `tipo_venda`, `venda_caixa`.`data_caixa` as `data_venda`, DATE_FORMAT(controle_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `venda_caixa`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `venda_caixa`. as `quant_venda`, (venda_caixa.quant_venda * venda_caixa.valor_unit) as valor_venda
FROM `venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `venda_caixa`.`num_venda_caixa`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`origem_movimento` = '6'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28') vendas
ORDER BY `vendas`.`data_venda` DESC
DEBUG - 2022-09-28 20:43:47 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:43:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:43:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:43:47 --> Query error: Not unique table/alias: 'venda_caixa' - Invalid query: SELECT `vendas`.`tipo_venda`, `vendas`.`data_venda`, `vendas`.`pedido`, `vendas`.`venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_venda`, `vendas`.`valor_venda`
FROM (SELECT "Pedido Venda" as `tipo_venda`, `faturamento_pedido`.`data_faturamento` as `data_venda`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `faturamento_pedido_produto`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido_produto`.`quantidade` as `quant_venda`, (faturamento_pedido_produto.valor_unitario *faturamento_pedido_produto.quantidade) valor_venda
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT "Frente de Caixa" as `tipo_venda`, `venda_caixa`.`data_caixa` as `data_venda`, DATE_FORMAT(controle_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `venda_caixa`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `venda_caixa`.`quant_venda` as `quant_venda`, (venda_caixa.quant_venda * venda_caixa.valor_unit) as valor_venda
FROM `venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `venda_caixa`.`num_venda_caixa`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`origem_movimento` = '6'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28') vendas
ORDER BY `vendas`.`data_venda` DESC
DEBUG - 2022-09-28 20:44:18 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:44:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:44:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:44:18 --> Query error: Not unique table/alias: 'venda_caixa' - Invalid query: SELECT `vendas`.`tipo_venda`, `vendas`.`data_venda`, `vendas`.`pedido`, `vendas`.`venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_venda`, `vendas`.`valor_venda`
FROM (SELECT "Pedido Venda" as `tipo_venda`, `faturamento_pedido`.`data_faturamento` as `data_venda`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `faturamento_pedido_produto`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido_produto`.`quantidade` as `quant_venda`, (faturamento_pedido_produto.valor_unitario *faturamento_pedido_produto.quantidade) valor_venda
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT "Frente de Caixa" as `tipo_venda`, `venda_caixa`.`data_caixa` as `data_venda`, DATE_FORMAT(controle_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `venda_caixa`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `venda_caixa`.`quant_venda`, (venda_caixa.quant_venda * venda_caixa.valor_unit) as valor_venda
FROM `venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `venda_caixa`.`num_venda_caixa`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`origem_movimento` = '6'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28') vendas
ORDER BY `vendas`.`data_venda` DESC
DEBUG - 2022-09-28 20:45:57 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:45:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:45:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:45:58 --> Query error: Not unique table/alias: 'venda_caixa' - Invalid query: SELECT `vendas`.`tipo_venda`, `vendas`.`data_venda`, `vendas`.`pedido`, `vendas`.`venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_venda`, `vendas`.`valor_venda`
FROM (SELECT "Pedido Venda" as `tipo_venda`, `faturamento_pedido`.`data_faturamento` as `data_venda`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `faturamento_pedido_produto`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido_produto`.`quantidade` as `quant_venda`, (faturamento_pedido_produto.valor_unitario *faturamento_pedido_produto.quantidade) valor_venda
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT "Frente de Caixa" as `tipo_venda`, `venda_caixa`.`data_caixa` as `data_venda`, DATE_FORMAT(controle_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `venda_caixa`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `venda_caixa`.`quant_venda`, (venda_caixa.quant_venda * venda_caixa.valor_unit) as valor_venda
FROM `venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `venda_caixa`.`num_venda_caixa`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28') vendas
ORDER BY `vendas`.`data_venda` DESC
DEBUG - 2022-09-28 20:47:07 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:47:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:47:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:47:07 --> Query error: Not unique table/alias: 'venda_caixa' - Invalid query: SELECT `vendas`.`tipo_venda`, `vendas`.`data_venda`, `vendas`.`pedido`, `vendas`.`venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_venda`, `vendas`.`valor_venda`
FROM (SELECT "Pedido Venda" as `tipo_venda`, `faturamento_pedido`.`data_faturamento` as `data_venda`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `faturamento_pedido_produto`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido_produto`.`quantidade` as `quant_venda`, (faturamento_pedido_produto.valor_unitario *faturamento_pedido_produto.quantidade) valor_venda
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT "Frente de Caixa" as `tipo_venda`, `venda_caixa`.`data_caixa` as `data_venda`, DATE_FORMAT(venda_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `venda_caixa`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `venda_caixa`.`quant_venda`, (venda_caixa.quant_venda * venda_caixa.valor_unit) as valor_venda
FROM `venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `venda_caixa`.`num_venda_caixa`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28') vendas
ORDER BY `vendas`.`data_venda` DESC
DEBUG - 2022-09-28 20:49:10 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:49:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:49:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:49:10 --> Query error: Not unique table/alias: 'venda_caixa' - Invalid query: SELECT `vendas`.`tipo_venda`, `vendas`.`data_venda`, `vendas`.`pedido`, `vendas`.`venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_venda`, `vendas`.`valor_venda`
FROM (SELECT "Pedido Venda" as `tipo_venda`, `faturamento_pedido`.`data_faturamento` as `data_venda`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `faturamento_pedido_produto`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido_produto`.`quantidade` as `quant_venda`, (faturamento_pedido_produto.valor_unitario *faturamento_pedido_produto.quantidade) valor_venda
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT "Frente de Caixa" as `tipo_venda`, `venda_caixa`.`data_caixa` as `data_venda`, DATE_FORMAT(venda_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `venda_caixa`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `venda_caixa`.`quant_venda`, (venda_caixa.quant_venda * venda_caixa.valor_unit) as valor_venda
FROM `venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `venda_caixa`.`num_venda_caixa`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28') vendas
ORDER BY `vendas`.`data_venda` DESC
DEBUG - 2022-09-28 20:49:41 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:49:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:49:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:49:41 --> Query error: Unknown column 'venda_caixa.cod_produto' in 'field list' - Invalid query: SELECT `vendas`.`tipo_venda`, `vendas`.`data_venda`, `vendas`.`pedido`, `vendas`.`venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_venda`, `vendas`.`valor_venda`
FROM (SELECT "Pedido Venda" as `tipo_venda`, `faturamento_pedido`.`data_faturamento` as `data_venda`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `faturamento_pedido_produto`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido_produto`.`quantidade` as `quant_venda`, (faturamento_pedido_produto.valor_unitario *faturamento_pedido_produto.quantidade) valor_venda
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT "Frente de Caixa" as `tipo_venda`, `venda_caixa`.`data_caixa` as `data_venda`, DATE_FORMAT(venda_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `venda_caixa`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `venda_caixa`.`quant_venda`, (venda_caixa.quant_venda * venda_caixa.valor_unit) as valor_venda
FROM `venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28') vendas
ORDER BY `vendas`.`data_venda` DESC
DEBUG - 2022-09-28 20:50:49 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:50:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:50:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:50:49 --> Query error: Unknown column 'venda_caixa.cod_produto' in 'field list' - Invalid query: SELECT `vendas`.`tipo_venda`, `vendas`.`data_venda`, `vendas`.`pedido`, `vendas`.`venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_venda`, `vendas`.`valor_venda`
FROM (SELECT "Pedido Venda" as `tipo_venda`, `faturamento_pedido`.`data_faturamento` as `data_venda`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `faturamento_pedido_produto`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido_produto`.`quantidade` as `quant_venda`, (faturamento_pedido_produto.valor_unitario *faturamento_pedido_produto.quantidade) valor_venda
FROM `faturamento_pedido_produto`
JOIN `produto` ON `produto`.`cod_produto` = `faturamento_pedido_produto`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `faturamento_pedido_produto`.`faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28' UNION SELECT "Frente de Caixa" as `tipo_venda`, `venda_caixa`.`data_caixa` as `data_venda`, DATE_FORMAT(venda_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `venda_caixa`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `produto_venda_caixa`.`quant_venda`, (produto_venda_caixa.quant_venda * produto_venda_caixa.valor_unit) as valor_venda
FROM `produto_venda_caixa`
JOIN `produto` ON `produto`.`cod_produto` = `produto_venda_caixa`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `produto_venda_caixa`.`num_venda_caixa`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28') vendas
ORDER BY `vendas`.`data_venda` DESC
DEBUG - 2022-09-28 20:51:00 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:51:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:51:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$data_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 123
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$quant_movimentada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 135
ERROR - 2022-09-28 20:51:01 --> Severity: Notice --> Undefined property: stdClass::$valor_movimento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-produto.php 138
DEBUG - 2022-09-28 20:51:01 --> Total execution time: 0.6562
DEBUG - 2022-09-28 20:52:03 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 20:52:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 20:52:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 20:52:03 --> Total execution time: 0.3525
DEBUG - 2022-09-28 21:07:20 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:07:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:07:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:07:20 --> Total execution time: 0.2295
DEBUG - 2022-09-28 21:16:05 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:16:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:16:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 21:16:05 --> Query error: Unknown column 'segmento.nome_segmento' in 'field list' - Invalid query: SELECT `vendas`.`cod_cliente`, `vendas`.`nome_cliente`, `vendas`.`cnpj_cpf`, `vendas`.`nome_segmento`, sum(vendas.total_desconto) total_desconto, sum(vendas.total_venda) total_venda
FROM (SELECT `pedido_venda`.`cod_cliente`, `cliente`.`nome_cliente`, `cliente`.`cnpj_cpf`, `segmento`.`nome_segmento`, sum(faturamento_pedido.valor_bruto) total_venda, sum(faturamento_pedido.valor_desconto) total_desconto, sum(faturamento_pedido.valor_frete) total_frete
FROM `faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28'
GROUP BY `pedido_venda`.`cod_cliente` UNION SELECT `venda_caixa`.`cod_cliente`, `cliente`.`nome_cliente`, `cliente`.`cnpj_cpf`, `segmento`.`nome_segmento`, `venda_caixa`.`cod_cliente`, IFNULL(cliente.nome_cliente, 'Consumidor Final') nome_cliente, sum(venda_caixa.valor_bruto) total_venda, sum(IF(venda_caixa.tipo_desconto = 1, `venda_caixa`.`valor_desconto`, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) total_desconto, sum(venda_caixa.valor_frete) total_frete
FROM `venda_caixa`
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `venda_caixa`.`cod_cliente`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `controle_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28'
GROUP BY `venda_caixa`.`cod_cliente`) vendas
GROUP BY `vendas`.`cod_cliente`
ORDER BY `vendas`.`total_venda` DESC
DEBUG - 2022-09-28 21:17:02 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:17:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:17:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 21:17:02 --> Query error: Unknown column 'controle_caixa.id_empresa' in 'where clause' - Invalid query: SELECT `vendas`.`cod_cliente`, `vendas`.`nome_cliente`, `vendas`.`cnpj_cpf`, `vendas`.`nome_segmento`, sum(vendas.total_desconto) total_desconto, sum(vendas.total_venda) total_venda
FROM (SELECT `pedido_venda`.`cod_cliente`, `cliente`.`nome_cliente`, `cliente`.`cnpj_cpf`, `segmento`.`nome_segmento`, sum(faturamento_pedido.valor_bruto) total_venda, sum(faturamento_pedido.valor_desconto) total_desconto, sum(faturamento_pedido.valor_frete) total_frete
FROM `faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
LEFT JOIN `segmento` ON `segmento`.`cod_segmento` = `cliente`.`cod_segmento`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28'
GROUP BY `pedido_venda`.`cod_cliente` UNION SELECT `venda_caixa`.`cod_cliente`, `cliente`.`nome_cliente`, `cliente`.`cnpj_cpf`, `segmento`.`nome_segmento`, `venda_caixa`.`cod_cliente`, IFNULL(cliente.nome_cliente, 'Consumidor Final') nome_cliente, sum(venda_caixa.valor_bruto) total_venda, sum(IF(venda_caixa.tipo_desconto = 1, `venda_caixa`.`valor_desconto`, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) total_desconto, sum(venda_caixa.valor_frete) total_frete
FROM `venda_caixa`
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `venda_caixa`.`cod_cliente`
LEFT JOIN `segmento` ON `segmento`.`cod_segmento` = `cliente`.`cod_segmento`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `controle_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28'
GROUP BY `venda_caixa`.`cod_cliente`) vendas
GROUP BY `vendas`.`cod_cliente`
ORDER BY `vendas`.`total_venda` DESC
DEBUG - 2022-09-28 21:17:13 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:17:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:17:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 21:17:13 --> Query error: The used SELECT statements have a different number of columns - Invalid query: SELECT `vendas`.`cod_cliente`, `vendas`.`nome_cliente`, `vendas`.`cnpj_cpf`, `vendas`.`nome_segmento`, sum(vendas.total_desconto) total_desconto, sum(vendas.total_venda) total_venda
FROM (SELECT `pedido_venda`.`cod_cliente`, `cliente`.`nome_cliente`, `cliente`.`cnpj_cpf`, `segmento`.`nome_segmento`, sum(faturamento_pedido.valor_bruto) total_venda, sum(faturamento_pedido.valor_desconto) total_desconto, sum(faturamento_pedido.valor_frete) total_frete
FROM `faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
LEFT JOIN `segmento` ON `segmento`.`cod_segmento` = `cliente`.`cod_segmento`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-09-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-09-28'
GROUP BY `pedido_venda`.`cod_cliente` UNION SELECT `venda_caixa`.`cod_cliente`, `cliente`.`nome_cliente`, `cliente`.`cnpj_cpf`, `segmento`.`nome_segmento`, `venda_caixa`.`cod_cliente`, IFNULL(cliente.nome_cliente, 'Consumidor Final') nome_cliente, sum(venda_caixa.valor_bruto) total_venda, sum(IF(venda_caixa.tipo_desconto = 1, `venda_caixa`.`valor_desconto`, venda_caixa.valor_bruto * (venda_caixa.valor_desconto / 100))) total_desconto, sum(venda_caixa.valor_frete) total_frete
FROM `venda_caixa`
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `venda_caixa`.`cod_cliente`
LEFT JOIN `segmento` ON `segmento`.`cod_segmento` = `cliente`.`cod_segmento`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` >= '2022-09-01'
AND `venda_caixa`.`data_caixa` <= '2022-09-28'
GROUP BY `venda_caixa`.`cod_cliente`) vendas
GROUP BY `vendas`.`cod_cliente`
ORDER BY `vendas`.`total_venda` DESC
DEBUG - 2022-09-28 21:17:50 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:17:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:17:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:17:50 --> Total execution time: 0.0991
DEBUG - 2022-09-28 21:18:20 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:18:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:18:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:18:20 --> Total execution time: 0.0920
DEBUG - 2022-09-28 21:18:30 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:18:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:18:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:18:31 --> Total execution time: 0.0745
DEBUG - 2022-09-28 21:20:03 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:20:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:20:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:20:03 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:20:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:20:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:20:04 --> Total execution time: 0.7120
DEBUG - 2022-09-28 21:20:08 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:20:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:20:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:20:08 --> Total execution time: 0.0788
DEBUG - 2022-09-28 21:20:33 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:20:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:20:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:20:33 --> Total execution time: 0.0742
DEBUG - 2022-09-28 21:20:37 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:20:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:20:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:20:37 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:20:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:20:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:20:37 --> Total execution time: 0.5637
DEBUG - 2022-09-28 21:21:17 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:21:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:21:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-09-28 21:21:17 --> Severity: Notice --> Undefined property: stdClass::$total_frete C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-cliente.php 91
ERROR - 2022-09-28 21:21:17 --> Severity: Notice --> Undefined property: stdClass::$total_frete C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-cliente.php 92
ERROR - 2022-09-28 21:21:17 --> Severity: Notice --> Undefined property: stdClass::$total_frete C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-cliente.php 91
ERROR - 2022-09-28 21:21:17 --> Severity: Notice --> Undefined property: stdClass::$total_frete C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-cliente.php 92
ERROR - 2022-09-28 21:21:17 --> Severity: Notice --> Undefined property: stdClass::$total_frete C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-cliente.php 91
ERROR - 2022-09-28 21:21:17 --> Severity: Notice --> Undefined property: stdClass::$total_frete C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-cliente.php 92
ERROR - 2022-09-28 21:21:17 --> Severity: Notice --> Undefined property: stdClass::$total_frete C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-cliente.php 91
ERROR - 2022-09-28 21:21:17 --> Severity: Notice --> Undefined property: stdClass::$total_frete C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\venda-cliente.php 92
DEBUG - 2022-09-28 21:21:17 --> Total execution time: 0.1128
DEBUG - 2022-09-28 21:22:23 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:22:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:22:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:22:23 --> Total execution time: 0.0917
DEBUG - 2022-09-28 21:23:52 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:23:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:23:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:23:52 --> Total execution time: 0.0925
DEBUG - 2022-09-28 21:24:22 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:24:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:24:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:24:23 --> Total execution time: 0.0858
DEBUG - 2022-09-28 21:24:44 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:24:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:24:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:24:44 --> Total execution time: 0.0712
DEBUG - 2022-09-28 21:25:24 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:25:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:25:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:25:24 --> Total execution time: 0.2683
DEBUG - 2022-09-28 21:25:41 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:25:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:25:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:25:41 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:25:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:25:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:25:42 --> Total execution time: 0.5089
DEBUG - 2022-09-28 21:25:58 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:25:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:25:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:25:58 --> Total execution time: 0.0858
DEBUG - 2022-09-28 21:53:08 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:53:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:53:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:53:09 --> UTF-8 Support Enabled
DEBUG - 2022-09-28 21:53:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-09-28 21:53:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-09-28 21:53:09 --> Total execution time: 0.5485
