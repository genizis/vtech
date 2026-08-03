<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2022-10-18 00:00:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 00:00:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 00:00:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 00:00:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') valor_total_pedido, if(pedido_venda.tipo_desconto = 1, `pedido_venda`.`valo...' at line 3 - Invalid query: SELECT `pedido_venda`.*, `cliente`.`nome_cliente`, if(pedido_venda.tipo_frete = 1, `pedido_venda`.`valor_frete`, 0) valor_frete, `pedido_venda`.`valor_seguro`, `pedido_venda`.`outras_despesas`, (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda)) valor_total_pedido, if(pedido_venda.tipo_desconto = 1, `pedido_venda`.`valor_desconto`, (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100)) valor_desconto, (select count(*)
                            from faturamento_pedido
                           where faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda) count_faturamento
FROM `pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
WHERE `pedido_venda`.`id_empresa` = '48'
AND `pedido_venda`.`data_entrega` >= '2022-10-01'
AND `pedido_venda`.`data_entrega` <= '2022-10-31'
ORDER BY `pedido_venda`.`data_entrega` DESC
DEBUG - 2022-10-18 00:00:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 00:00:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 00:00:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 00:00:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') valor_total_pedido, sum(if(pedido_venda.tipo_desconto = 1, `pedido_venda`.`...' at line 3 - Invalid query: SELECT `pedido_venda`.*, `cliente`.`nome_cliente`, if(pedido_venda.tipo_frete = 1, `pedido_venda`.`valor_frete`, 0) valor_frete, `pedido_venda`.`valor_seguro`, `pedido_venda`.`outras_despesas`, (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                             from produto_venda
                            where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda)) valor_total_pedido, sum(if(pedido_venda.tipo_desconto = 1, `pedido_venda`.`valor_desconto`, (select sum(produto_venda.quant_pedida * produto_venda.valor_unitario) 
                                    from produto_venda
                                   where produto_venda.num_pedido_venda = pedido_venda.num_pedido_venda) * (pedido_venda.valor_desconto / 100))) valor_desconto, (select count(*)
                            from faturamento_pedido
                           where faturamento_pedido.num_pedido_venda = pedido_venda.num_pedido_venda) count_faturamento
FROM `pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
WHERE `pedido_venda`.`id_empresa` = '48'
AND `pedido_venda`.`data_entrega` >= '2022-10-01'
AND `pedido_venda`.`data_entrega` <= '2022-10-31'
ORDER BY `pedido_venda`.`data_entrega` DESC
DEBUG - 2022-10-18 00:01:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 00:01:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 00:01:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 00:01:16 --> Total execution time: 0.0687
DEBUG - 2022-10-18 00:01:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 00:01:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 00:01:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 00:01:27 --> Total execution time: 0.0867
DEBUG - 2022-10-18 00:01:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 00:01:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 00:01:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 00:01:30 --> Total execution time: 0.0604
DEBUG - 2022-10-18 00:02:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 00:02:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 00:02:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 00:02:29 --> Total execution time: 0.0801
DEBUG - 2022-10-18 00:03:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 00:03:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 00:03:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 00:03:33 --> Total execution time: 0.0848
DEBUG - 2022-10-18 00:04:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 00:04:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 00:04:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 00:04:47 --> Total execution time: 0.0983
DEBUG - 2022-10-18 01:19:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:19:35 --> No URI present. Default controller set.
DEBUG - 2022-10-18 01:19:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:19:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:19:35 --> Total execution time: 0.4395
DEBUG - 2022-10-18 01:19:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:19:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:19:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:19:38 --> Total execution time: 0.1472
DEBUG - 2022-10-18 01:19:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:19:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:19:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:19:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:19:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:19:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:19:46 --> Total execution time: 0.7622
DEBUG - 2022-10-18 01:20:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:20:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:20:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:20:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:20:21 --> Total execution time: 0.1943
DEBUG - 2022-10-18 01:21:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:21:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:21:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:21:01 --> Total execution time: 0.2514
DEBUG - 2022-10-18 01:23:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:23:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:23:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:23:49 --> Total execution time: 0.1925
DEBUG - 2022-10-18 01:24:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:24:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:24:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:24:17 --> Total execution time: 0.1589
DEBUG - 2022-10-18 01:24:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:24:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:24:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:24:25 --> Total execution time: 0.1975
DEBUG - 2022-10-18 01:27:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:27:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:27:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:27:44 --> Total execution time: 0.2024
DEBUG - 2022-10-18 01:27:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:27:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:27:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:27:56 --> Total execution time: 0.1849
DEBUG - 2022-10-18 01:29:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:29:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:29:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:29:06 --> Total execution time: 0.1962
DEBUG - 2022-10-18 01:29:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:29:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:29:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:29:26 --> Total execution time: 0.1857
DEBUG - 2022-10-18 01:31:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:31:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:31:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:31:15 --> Total execution time: 0.1693
DEBUG - 2022-10-18 01:31:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:31:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:31:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:31:49 --> Total execution time: 0.1599
DEBUG - 2022-10-18 01:32:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:32:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:32:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:32:21 --> Total execution time: 0.2072
DEBUG - 2022-10-18 01:32:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:32:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:32:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:32:33 --> Total execution time: 0.1685
DEBUG - 2022-10-18 01:33:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:33:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:33:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:33:25 --> Total execution time: 0.1718
DEBUG - 2022-10-18 01:35:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:35:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:35:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:35:35 --> Total execution time: 0.1763
DEBUG - 2022-10-18 01:35:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:35:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:35:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:35:58 --> Total execution time: 0.1780
DEBUG - 2022-10-18 01:37:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:37:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:37:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 01:37:08 --> Severity: Notice --> Undefined property: stdClass::$valorDesconto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-pedido-venda.php 455
DEBUG - 2022-10-18 01:37:08 --> Total execution time: 0.2097
DEBUG - 2022-10-18 01:37:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:37:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:37:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:37:16 --> Total execution time: 0.1822
DEBUG - 2022-10-18 01:38:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:38:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:38:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:38:49 --> Total execution time: 0.1712
DEBUG - 2022-10-18 01:38:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:38:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:38:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:38:56 --> Total execution time: 0.2246
DEBUG - 2022-10-18 01:42:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:42:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:42:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:42:45 --> Total execution time: 0.1697
DEBUG - 2022-10-18 01:43:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:43:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:43:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:43:18 --> Total execution time: 0.1969
DEBUG - 2022-10-18 01:44:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:44:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:44:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:44:39 --> Total execution time: 0.1733
DEBUG - 2022-10-18 01:44:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:44:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:44:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:44:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:44:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:44:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:44:52 --> Total execution time: 0.1997
DEBUG - 2022-10-18 01:45:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:45:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:45:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:45:03 --> Total execution time: 0.1673
DEBUG - 2022-10-18 01:45:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:45:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:45:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:45:42 --> Total execution time: 0.1836
DEBUG - 2022-10-18 01:46:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:46:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:46:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:46:20 --> Total execution time: 0.1668
DEBUG - 2022-10-18 01:46:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:46:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:46:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:46:49 --> Total execution time: 0.2061
DEBUG - 2022-10-18 01:47:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:47:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:47:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:47:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:47:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:47:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:47:03 --> Total execution time: 0.2115
DEBUG - 2022-10-18 01:47:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:47:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:47:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:47:14 --> Total execution time: 0.1900
DEBUG - 2022-10-18 01:47:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:47:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:47:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:47:30 --> Total execution time: 0.1938
DEBUG - 2022-10-18 01:48:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:48:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:48:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:48:17 --> Total execution time: 0.1749
DEBUG - 2022-10-18 01:48:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:48:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:48:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:48:51 --> Total execution time: 0.1867
DEBUG - 2022-10-18 01:49:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:49:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:49:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:49:01 --> Total execution time: 0.2110
DEBUG - 2022-10-18 01:49:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:49:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:49:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:49:52 --> Total execution time: 0.1906
DEBUG - 2022-10-18 01:50:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:50:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:50:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:50:14 --> Total execution time: 0.2268
DEBUG - 2022-10-18 01:50:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:50:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:50:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:50:21 --> Total execution time: 0.1807
DEBUG - 2022-10-18 01:50:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:50:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:50:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:50:25 --> Total execution time: 0.1218
DEBUG - 2022-10-18 01:50:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:50:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:50:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:50:45 --> Total execution time: 0.1882
DEBUG - 2022-10-18 01:51:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:51:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:51:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:51:28 --> Total execution time: 0.1989
DEBUG - 2022-10-18 01:52:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:52:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:52:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:52:24 --> Total execution time: 0.1897
DEBUG - 2022-10-18 01:52:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:52:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:52:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:52:32 --> Total execution time: 0.1898
DEBUG - 2022-10-18 01:53:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:53:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:53:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:53:23 --> Total execution time: 0.1910
DEBUG - 2022-10-18 01:53:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:53:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:53:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:53:36 --> Total execution time: 0.1798
DEBUG - 2022-10-18 01:53:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:53:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:53:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:53:57 --> Total execution time: 0.1612
DEBUG - 2022-10-18 01:54:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:54:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:54:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:54:25 --> Total execution time: 0.1770
DEBUG - 2022-10-18 01:54:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:54:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:54:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:54:27 --> Total execution time: 0.1729
DEBUG - 2022-10-18 01:55:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:55:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:55:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:55:25 --> Total execution time: 0.1904
DEBUG - 2022-10-18 01:55:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:55:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:55:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:55:47 --> Total execution time: 0.2042
DEBUG - 2022-10-18 01:55:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:55:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:55:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:55:50 --> Total execution time: 0.1800
DEBUG - 2022-10-18 01:56:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:56:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:56:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:56:40 --> Total execution time: 0.1586
DEBUG - 2022-10-18 01:56:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:56:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:56:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:56:45 --> Total execution time: 0.1735
DEBUG - 2022-10-18 01:56:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:56:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:56:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:56:49 --> Total execution time: 0.1624
DEBUG - 2022-10-18 01:57:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:57:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:57:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:57:19 --> Total execution time: 0.1764
DEBUG - 2022-10-18 01:57:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:57:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:57:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:57:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:57:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:57:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:57:28 --> Total execution time: 0.1664
DEBUG - 2022-10-18 01:57:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:57:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:57:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:57:30 --> Total execution time: 0.1388
DEBUG - 2022-10-18 01:58:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 01:58:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 01:58:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 01:58:29 --> Total execution time: 0.1250
DEBUG - 2022-10-18 02:00:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:00:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:00:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:00:22 --> Total execution time: 0.1744
DEBUG - 2022-10-18 02:00:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:00:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:00:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:00:29 --> Total execution time: 0.2147
DEBUG - 2022-10-18 02:01:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:01:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:01:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:01:02 --> Total execution time: 0.2253
DEBUG - 2022-10-18 02:01:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:01:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:01:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:01:14 --> Total execution time: 0.1948
DEBUG - 2022-10-18 02:02:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:02:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:02:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:02:04 --> Total execution time: 0.1647
DEBUG - 2022-10-18 02:02:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:02:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:02:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:02:47 --> Total execution time: 0.1626
DEBUG - 2022-10-18 02:03:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:03:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:03:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:03:04 --> Total execution time: 0.1783
DEBUG - 2022-10-18 02:04:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:04:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:04:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:04:16 --> Total execution time: 0.1935
DEBUG - 2022-10-18 02:04:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:04:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:04:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:04:27 --> Total execution time: 0.1797
DEBUG - 2022-10-18 02:04:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:04:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:04:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:04:45 --> Total execution time: 0.1755
DEBUG - 2022-10-18 02:05:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:05:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:05:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:05:15 --> Total execution time: 0.1889
DEBUG - 2022-10-18 02:05:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:05:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:05:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:05:32 --> Total execution time: 0.1561
DEBUG - 2022-10-18 02:05:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:05:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:05:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:05:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:05:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:05:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:05:39 --> Total execution time: 0.1418
DEBUG - 2022-10-18 02:05:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:05:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:05:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 02:05:40 --> Severity: error --> Exception: Too few arguments to function Vendas::getPedidoVenda(), 0 passed in C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php on line 194 and at least 2 expected C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Vendas.php 427
DEBUG - 2022-10-18 02:05:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:05:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:05:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:05:45 --> Total execution time: 0.1335
DEBUG - 2022-10-18 02:05:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:05:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:05:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:06:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:06:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:06:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:06:00 --> Total execution time: 0.1623
DEBUG - 2022-10-18 02:06:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:06:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:06:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:06:02 --> Total execution time: 0.2287
DEBUG - 2022-10-18 02:06:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:06:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:06:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:06:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:06:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:06:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:06:06 --> Total execution time: 0.1275
DEBUG - 2022-10-18 02:06:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:06:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:06:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:06:08 --> Total execution time: 0.1625
DEBUG - 2022-10-18 02:06:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:06:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:06:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:06:34 --> Total execution time: 0.1896
DEBUG - 2022-10-18 02:06:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:06:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:06:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:06:38 --> Total execution time: 0.1674
DEBUG - 2022-10-18 02:07:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:07:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:07:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:07:08 --> Total execution time: 0.1884
DEBUG - 2022-10-18 02:07:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:07:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:07:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:07:21 --> Total execution time: 0.1791
DEBUG - 2022-10-18 02:07:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:07:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:07:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:07:42 --> Total execution time: 0.1706
DEBUG - 2022-10-18 02:08:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:08:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:08:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:08:22 --> Total execution time: 0.1638
DEBUG - 2022-10-18 02:08:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:08:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:08:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:08:36 --> Total execution time: 0.1908
DEBUG - 2022-10-18 02:08:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:08:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:08:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:08:37 --> Total execution time: 0.1787
DEBUG - 2022-10-18 02:09:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:09:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:09:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:09:00 --> Total execution time: 0.1986
DEBUG - 2022-10-18 02:10:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:10:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:10:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:10:04 --> Total execution time: 0.1776
DEBUG - 2022-10-18 02:10:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:10:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:10:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:10:20 --> Total execution time: 0.1709
DEBUG - 2022-10-18 02:10:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:10:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:10:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:10:36 --> Total execution time: 0.1900
DEBUG - 2022-10-18 02:10:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:10:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:10:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:10:40 --> Total execution time: 0.1661
DEBUG - 2022-10-18 02:10:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:10:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:10:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:10:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:10:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:10:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:10:55 --> Total execution time: 3.9535
DEBUG - 2022-10-18 02:11:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:11:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:11:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:11:21 --> Total execution time: 0.1373
DEBUG - 2022-10-18 02:11:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:11:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:11:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:11:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:11:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:11:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:11:24 --> Total execution time: 0.2276
DEBUG - 2022-10-18 02:13:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:13:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:13:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:13:25 --> Total execution time: 0.1702
DEBUG - 2022-10-18 02:14:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:14:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:14:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:14:26 --> Total execution time: 0.2285
DEBUG - 2022-10-18 02:14:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:14:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:14:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:14:39 --> Total execution time: 0.1709
DEBUG - 2022-10-18 02:14:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:14:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:14:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:14:47 --> Total execution time: 0.1837
DEBUG - 2022-10-18 02:15:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:08 --> Total execution time: 0.1700
DEBUG - 2022-10-18 02:15:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:17 --> Total execution time: 0.1730
DEBUG - 2022-10-18 02:15:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:19 --> Total execution time: 0.1532
DEBUG - 2022-10-18 02:15:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:21 --> Total execution time: 0.1751
DEBUG - 2022-10-18 02:15:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:23 --> Total execution time: 0.1449
DEBUG - 2022-10-18 02:15:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:25 --> Total execution time: 0.1303
DEBUG - 2022-10-18 02:15:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:28 --> Total execution time: 0.1432
DEBUG - 2022-10-18 02:15:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:30 --> Total execution time: 0.1851
DEBUG - 2022-10-18 02:15:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:15:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:15:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:15:53 --> Total execution time: 0.3982
DEBUG - 2022-10-18 02:16:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:16:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:16:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:16:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:16:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:16:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:16:40 --> Total execution time: 0.2109
DEBUG - 2022-10-18 02:16:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:16:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:16:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:16:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:16:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:16:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:16:47 --> Total execution time: 0.1888
DEBUG - 2022-10-18 02:19:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:19:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:19:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:19:29 --> Total execution time: 0.1703
DEBUG - 2022-10-18 02:19:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:19:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:19:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:19:33 --> Total execution time: 0.1203
DEBUG - 2022-10-18 02:20:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:20:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:20:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:20:28 --> Total execution time: 0.1754
DEBUG - 2022-10-18 02:20:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:20:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:20:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:20:59 --> Total execution time: 0.1578
DEBUG - 2022-10-18 02:21:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:21:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:21:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:21:19 --> Total execution time: 0.1511
DEBUG - 2022-10-18 02:21:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:21:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:21:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:21:33 --> Total execution time: 0.1668
DEBUG - 2022-10-18 02:21:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:21:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:21:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:21:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:21:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:21:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:21:38 --> Total execution time: 0.2137
DEBUG - 2022-10-18 02:21:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:21:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:21:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:21:43 --> Total execution time: 0.1078
DEBUG - 2022-10-18 02:21:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:21:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:21:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:21:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:21:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:21:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:21:47 --> Total execution time: 0.1935
DEBUG - 2022-10-18 02:22:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:22:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:22:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:22:02 --> Total execution time: 0.1652
DEBUG - 2022-10-18 02:23:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:23:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:23:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:23:19 --> Total execution time: 0.1814
DEBUG - 2022-10-18 02:23:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:23:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:23:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:23:21 --> Total execution time: 0.1742
DEBUG - 2022-10-18 02:23:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:23:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:23:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:23:57 --> Total execution time: 0.1635
DEBUG - 2022-10-18 02:24:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:14 --> Total execution time: 0.1769
DEBUG - 2022-10-18 02:24:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:17 --> Total execution time: 0.1731
DEBUG - 2022-10-18 02:24:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:21 --> Total execution time: 0.1784
DEBUG - 2022-10-18 02:24:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:22 --> Total execution time: 0.2197
DEBUG - 2022-10-18 02:24:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:24 --> Total execution time: 0.1741
DEBUG - 2022-10-18 02:24:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:27 --> Total execution time: 0.1451
DEBUG - 2022-10-18 02:24:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:24:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:24:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:24:33 --> Total execution time: 0.1639
DEBUG - 2022-10-18 02:33:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:33:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:33:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:33:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:33:00 --> Total execution time: 0.2027
DEBUG - 2022-10-18 02:33:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:33:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:33:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:33:01 --> Total execution time: 0.2467
DEBUG - 2022-10-18 02:35:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:35:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:35:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:35:38 --> Total execution time: 0.1843
DEBUG - 2022-10-18 02:35:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:35:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:35:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:35:51 --> Total execution time: 0.1658
DEBUG - 2022-10-18 02:36:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:36:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:36:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:36:31 --> Total execution time: 0.1776
DEBUG - 2022-10-18 02:37:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:37:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:37:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:37:12 --> Total execution time: 0.1698
DEBUG - 2022-10-18 02:37:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:37:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:37:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:37:52 --> Total execution time: 0.1818
DEBUG - 2022-10-18 02:38:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:38:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:38:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:38:35 --> Total execution time: 0.1636
DEBUG - 2022-10-18 02:38:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:38:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:38:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:38:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:38:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:38:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:38:41 --> Total execution time: 0.2254
DEBUG - 2022-10-18 02:39:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:39:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:39:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:39:57 --> Total execution time: 0.2964
DEBUG - 2022-10-18 02:40:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:40:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:40:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:40:11 --> Total execution time: 0.3017
DEBUG - 2022-10-18 02:40:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:40:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:40:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:40:28 --> Total execution time: 0.2440
DEBUG - 2022-10-18 02:40:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:40:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:40:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:40:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:40:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:40:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:40:44 --> Total execution time: 0.3799
DEBUG - 2022-10-18 02:41:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:41:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:41:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:41:02 --> Total execution time: 0.1587
DEBUG - 2022-10-18 02:42:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:42:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:42:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:42:29 --> Total execution time: 0.0557
DEBUG - 2022-10-18 02:43:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:09 --> Total execution time: 0.0748
DEBUG - 2022-10-18 02:43:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:12 --> Total execution time: 0.1158
DEBUG - 2022-10-18 02:43:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:19 --> Total execution time: 0.1121
DEBUG - 2022-10-18 02:43:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:26 --> Total execution time: 0.1090
DEBUG - 2022-10-18 02:43:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:35 --> Total execution time: 0.0974
DEBUG - 2022-10-18 02:43:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:51 --> Total execution time: 0.0668
DEBUG - 2022-10-18 02:43:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:43:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:43:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:43:52 --> Total execution time: 0.1049
DEBUG - 2022-10-18 02:46:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:46:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:46:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:46:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:46:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:46:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:46:57 --> Total execution time: 0.0761
DEBUG - 2022-10-18 02:47:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:47:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:47:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:47:49 --> Total execution time: 0.0855
DEBUG - 2022-10-18 02:48:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:08 --> Total execution time: 0.0678
DEBUG - 2022-10-18 02:48:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:09 --> Total execution time: 0.0648
DEBUG - 2022-10-18 02:48:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:11 --> Total execution time: 0.0681
DEBUG - 2022-10-18 02:48:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:15 --> Total execution time: 0.0830
DEBUG - 2022-10-18 02:48:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:16 --> Total execution time: 0.0721
DEBUG - 2022-10-18 02:48:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:35 --> Total execution time: 0.0733
DEBUG - 2022-10-18 02:48:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:45 --> Total execution time: 0.0737
DEBUG - 2022-10-18 02:48:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:53 --> Total execution time: 0.1052
DEBUG - 2022-10-18 02:48:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:48:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:48:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:48:54 --> Total execution time: 0.0711
DEBUG - 2022-10-18 02:49:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:49:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:49:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:49:01 --> Total execution time: 0.0608
DEBUG - 2022-10-18 02:49:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:49:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:49:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:49:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:49:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:49:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:49:08 --> Total execution time: 0.0983
DEBUG - 2022-10-18 02:49:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:49:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:49:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:49:09 --> Total execution time: 0.0791
DEBUG - 2022-10-18 02:49:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:49:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:49:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:49:27 --> Total execution time: 0.1183
DEBUG - 2022-10-18 02:50:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:50:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:50:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:50:36 --> Total execution time: 0.0840
DEBUG - 2022-10-18 02:50:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:50:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:50:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:50:42 --> Total execution time: 0.0931
DEBUG - 2022-10-18 02:51:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:51:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:51:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:51:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:51:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:51:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:51:18 --> Total execution time: 0.0768
DEBUG - 2022-10-18 02:51:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:51:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:51:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:51:22 --> Total execution time: 0.0901
DEBUG - 2022-10-18 02:51:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:51:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:51:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:51:50 --> Total execution time: 0.0824
DEBUG - 2022-10-18 02:52:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:52:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:52:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:52:36 --> Total execution time: 0.1114
DEBUG - 2022-10-18 02:52:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:52:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:52:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:52:39 --> Total execution time: 0.0854
DEBUG - 2022-10-18 02:52:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:52:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:52:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:52:49 --> Total execution time: 0.0694
DEBUG - 2022-10-18 02:52:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:52:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:52:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:52:53 --> Total execution time: 0.0717
DEBUG - 2022-10-18 02:52:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:52:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:52:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:52:56 --> Total execution time: 0.1042
DEBUG - 2022-10-18 02:53:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 02:53:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 02:53:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 02:53:08 --> Total execution time: 0.0792
DEBUG - 2022-10-18 03:05:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:05:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:05:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:05:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:05:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:05:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:05:48 --> Total execution time: 0.1035
DEBUG - 2022-10-18 03:19:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:19:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:19:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:19:08 --> Total execution time: 0.1082
DEBUG - 2022-10-18 03:19:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:19:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:19:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:19:14 --> Total execution time: 0.0494
DEBUG - 2022-10-18 03:19:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:19:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:19:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:19:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:19:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:19:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:19:19 --> Total execution time: 0.0688
DEBUG - 2022-10-18 03:23:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:23:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:23:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:23:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:23:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:23:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:23:47 --> Total execution time: 0.0626
DEBUG - 2022-10-18 03:23:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:23:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:23:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:23:49 --> Total execution time: 0.0907
DEBUG - 2022-10-18 03:23:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:23:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:23:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:23:51 --> Total execution time: 0.0701
DEBUG - 2022-10-18 03:23:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:23:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:23:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:23:52 --> Total execution time: 0.0800
DEBUG - 2022-10-18 03:23:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:23:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:23:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:23:54 --> Total execution time: 0.1027
DEBUG - 2022-10-18 03:25:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:14 --> Total execution time: 0.0902
DEBUG - 2022-10-18 03:25:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:15 --> Total execution time: 0.0953
DEBUG - 2022-10-18 03:25:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:23 --> Total execution time: 0.0763
DEBUG - 2022-10-18 03:25:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:24 --> Total execution time: 0.1015
DEBUG - 2022-10-18 03:25:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:28 --> Total execution time: 0.0939
DEBUG - 2022-10-18 03:25:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 03:25:30 --> Query error: Unknown column 'pedido_venda.estado' in 'where clause' - Invalid query: SELECT `pedido_venda`.*, `cliente`.`nome_cliente`
FROM `pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
WHERE `pedido_venda`.`id_empresa` = '48'
AND `pedido_venda`.`estado` = 3
ORDER BY `pedido_venda`.`data_entrega` DESC
DEBUG - 2022-10-18 03:25:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:25:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:25:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:25:49 --> Total execution time: 0.0835
DEBUG - 2022-10-18 03:40:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:40:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:40:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:40:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:40:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:40:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:40:15 --> Total execution time: 0.0856
DEBUG - 2022-10-18 03:40:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:40:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:40:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:40:18 --> Total execution time: 0.1100
DEBUG - 2022-10-18 03:40:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:40:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:40:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:40:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:40:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:40:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:40:43 --> Total execution time: 0.0882
DEBUG - 2022-10-18 03:40:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:40:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:40:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:40:45 --> Total execution time: 0.0866
DEBUG - 2022-10-18 03:42:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:42:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:42:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:42:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:42:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:42:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:42:30 --> Total execution time: 0.0818
DEBUG - 2022-10-18 03:42:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:42:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:42:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:42:32 --> Total execution time: 0.0904
DEBUG - 2022-10-18 03:42:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:42:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:42:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:42:34 --> Total execution time: 0.1024
DEBUG - 2022-10-18 03:42:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:42:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:42:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:42:36 --> Total execution time: 0.0798
DEBUG - 2022-10-18 03:42:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:42:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:42:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:42:42 --> Total execution time: 0.0969
DEBUG - 2022-10-18 03:43:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:43:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:43:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:43:05 --> Total execution time: 0.1130
DEBUG - 2022-10-18 03:47:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:47:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:47:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:47:17 --> Total execution time: 0.0919
DEBUG - 2022-10-18 03:47:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 03:47:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 03:47:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 03:47:33 --> Total execution time: 0.0657
DEBUG - 2022-10-18 04:11:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:11:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:11:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:11:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:11:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:11:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:11:35 --> Total execution time: 0.0806
DEBUG - 2022-10-18 04:14:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:14:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:14:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:14:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:14:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:14:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:14:38 --> Severity: Notice --> Undefined variable: pagination C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 186
DEBUG - 2022-10-18 04:14:38 --> Total execution time: 0.1060
DEBUG - 2022-10-18 04:14:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:14:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:14:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:14:54 --> Total execution time: 0.0915
DEBUG - 2022-10-18 04:14:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:14:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:14:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:14:58 --> Total execution time: 0.0854
DEBUG - 2022-10-18 04:15:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:15:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:15:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:15:07 --> Total execution time: 0.0819
DEBUG - 2022-10-18 04:15:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:15:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:15:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:15:31 --> Total execution time: 0.0780
DEBUG - 2022-10-18 04:15:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:15:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:15:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:15:33 --> Total execution time: 0.0942
DEBUG - 2022-10-18 04:15:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:15:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:15:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:15:37 --> Total execution time: 0.2296
DEBUG - 2022-10-18 04:15:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:15:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:15:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:15:40 --> Total execution time: 0.0925
DEBUG - 2022-10-18 04:15:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:15:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:15:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:15:44 --> Total execution time: 0.0615
DEBUG - 2022-10-18 04:15:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:15:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:15:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:15:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:15:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:15:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:15:57 --> Total execution time: 0.0772
DEBUG - 2022-10-18 04:16:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:16:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:16:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:16:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:16:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:16:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:16:00 --> Total execution time: 0.0802
DEBUG - 2022-10-18 04:16:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:16:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:16:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:16:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:16:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:16:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:16:13 --> Total execution time: 0.0763
DEBUG - 2022-10-18 04:16:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:16:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:16:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:16:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:16:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:16:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:16:15 --> Total execution time: 0.0811
DEBUG - 2022-10-18 04:17:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:17:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:17:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:17:47 --> Total execution time: 0.0818
DEBUG - 2022-10-18 04:18:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:18:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:18:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:18:42 --> Total execution time: 0.0923
DEBUG - 2022-10-18 04:19:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:19:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:19:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:19:16 --> Total execution time: 0.0790
DEBUG - 2022-10-18 04:19:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:19:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:19:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:19:29 --> Total execution time: 0.0808
DEBUG - 2022-10-18 04:19:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:19:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:19:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:19:42 --> Total execution time: 2.3085
DEBUG - 2022-10-18 04:19:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:19:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:19:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:19:49 --> Total execution time: 0.0766
DEBUG - 2022-10-18 04:21:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:21:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:21:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:21:19 --> Total execution time: 0.0679
DEBUG - 2022-10-18 04:21:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:21:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:21:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:21:34 --> Total execution time: 0.0825
DEBUG - 2022-10-18 04:21:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:21:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:21:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:21:59 --> Total execution time: 0.0603
DEBUG - 2022-10-18 04:22:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:22:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:22:42 --> Total execution time: 0.0767
DEBUG - 2022-10-18 04:22:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:22:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:22:44 --> Total execution time: 0.0802
DEBUG - 2022-10-18 04:22:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:22:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:22:51 --> Total execution time: 0.0883
DEBUG - 2022-10-18 04:22:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:22:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:22:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:22:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:22:55 --> Total execution time: 0.0845
DEBUG - 2022-10-18 04:22:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:22:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:22:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:22:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:22:58 --> Total execution time: 0.0804
DEBUG - 2022-10-18 04:22:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:22:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:22:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:22:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:23:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:23:00 --> Total execution time: 0.0677
DEBUG - 2022-10-18 04:23:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:23:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:23:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:23:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:23:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:23:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:23:02 --> Total execution time: 0.0542
DEBUG - 2022-10-18 04:23:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:23:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:23:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:23:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:23:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:23:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:23:04 --> Total execution time: 0.0747
DEBUG - 2022-10-18 04:23:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:23:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:23:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:23:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:23:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:23:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:23:06 --> Total execution time: 0.0991
DEBUG - 2022-10-18 04:24:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:20 --> Total execution time: 0.0693
DEBUG - 2022-10-18 04:24:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:26 --> Total execution time: 0.0915
DEBUG - 2022-10-18 04:24:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:28 --> Total execution time: 0.0866
DEBUG - 2022-10-18 04:24:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:30 --> Total execution time: 0.0954
DEBUG - 2022-10-18 04:24:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:32 --> Total execution time: 0.1005
DEBUG - 2022-10-18 04:24:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:34 --> Total execution time: 0.0808
DEBUG - 2022-10-18 04:24:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:38 --> Total execution time: 0.0822
DEBUG - 2022-10-18 04:24:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:47 --> Total execution time: 0.0777
DEBUG - 2022-10-18 04:24:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:50 --> Total execution time: 0.0853
DEBUG - 2022-10-18 04:24:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:24:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:24:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:24:55 --> Total execution time: 0.1011
DEBUG - 2022-10-18 04:25:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:25:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:25:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:25:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:25:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:25:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:25:31 --> Total execution time: 0.0616
DEBUG - 2022-10-18 04:25:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:25:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:25:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:25:33 --> Total execution time: 0.1177
DEBUG - 2022-10-18 04:25:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:25:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:25:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:25:36 --> Total execution time: 0.0820
DEBUG - 2022-10-18 04:25:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:25:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:25:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:25:37 --> Total execution time: 0.1098
DEBUG - 2022-10-18 04:25:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:25:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:25:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:25:42 --> Total execution time: 0.0796
DEBUG - 2022-10-18 04:25:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:25:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:25:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:25:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:25:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:25:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:25:55 --> Total execution time: 0.0732
DEBUG - 2022-10-18 04:26:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:26:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:26:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:26:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:26:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:26:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:26:03 --> Total execution time: 0.0931
DEBUG - 2022-10-18 04:26:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:26:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:26:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:26:46 --> Total execution time: 0.0819
DEBUG - 2022-10-18 04:26:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:26:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:26:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:26:58 --> Total execution time: 0.0899
DEBUG - 2022-10-18 04:27:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:27:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:27:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:27:00 --> Total execution time: 0.0816
DEBUG - 2022-10-18 04:27:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:27:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:27:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:27:01 --> Total execution time: 0.1061
DEBUG - 2022-10-18 04:27:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:27:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:27:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:27:02 --> Total execution time: 0.1065
DEBUG - 2022-10-18 04:27:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:27:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:27:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:27:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:27:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:27:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:27:17 --> Total execution time: 0.0920
DEBUG - 2022-10-18 04:27:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:27:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:27:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:27:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:27:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:27:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:27:44 --> Total execution time: 0.0931
DEBUG - 2022-10-18 04:27:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:27:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:27:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:27:45 --> Total execution time: 0.1038
DEBUG - 2022-10-18 04:31:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:31:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:31:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:31:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:31:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:31:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:31:39 --> Total execution time: 0.0895
DEBUG - 2022-10-18 04:31:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:31:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:31:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:31:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:31:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:31:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:31:48 --> Total execution time: 0.0860
DEBUG - 2022-10-18 04:31:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:31:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:31:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:31:49 --> Total execution time: 0.0839
DEBUG - 2022-10-18 04:32:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:32:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:32:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:32:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:32:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:32:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:32:07 --> Total execution time: 0.0753
DEBUG - 2022-10-18 04:32:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:32:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:32:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:32:08 --> Total execution time: 0.0573
DEBUG - 2022-10-18 04:32:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:32:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:32:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:32:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:32:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:32:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:32:18 --> Total execution time: 0.0733
DEBUG - 2022-10-18 04:32:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:32:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:32:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:32:19 --> Total execution time: 0.0736
DEBUG - 2022-10-18 04:33:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:33:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:33:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:33:04 --> Total execution time: 0.0694
DEBUG - 2022-10-18 04:33:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:33:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:33:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:33:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:33:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:33:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:33:24 --> Total execution time: 0.0963
DEBUG - 2022-10-18 04:33:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:33:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:33:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:33:25 --> Total execution time: 0.0827
DEBUG - 2022-10-18 04:33:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:33:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:33:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:33:27 --> Total execution time: 0.1801
DEBUG - 2022-10-18 04:34:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:34:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:34:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:34:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:34:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:34:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:34:03 --> Total execution time: 0.0950
DEBUG - 2022-10-18 04:34:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:34:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:34:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:34:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:34:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:34:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:34:42 --> Total execution time: 0.0900
DEBUG - 2022-10-18 04:34:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:34:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:34:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:34:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:34:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:34:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:34:50 --> Total execution time: 0.0768
DEBUG - 2022-10-18 04:36:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:04 --> Total execution time: 2.4628
DEBUG - 2022-10-18 04:36:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:07 --> Total execution time: 0.1401
DEBUG - 2022-10-18 04:36:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:10 --> Total execution time: 0.0883
DEBUG - 2022-10-18 04:36:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:14 --> Total execution time: 2.2498
DEBUG - 2022-10-18 04:36:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:17 --> Total execution time: 0.1044
DEBUG - 2022-10-18 04:36:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:31 --> Total execution time: 0.0582
DEBUG - 2022-10-18 04:36:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:38 --> Total execution time: 0.0776
DEBUG - 2022-10-18 04:36:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:40 --> Total execution time: 0.0642
DEBUG - 2022-10-18 04:36:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:43 --> Total execution time: 0.0529
DEBUG - 2022-10-18 04:36:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:52 --> Total execution time: 0.0927
DEBUG - 2022-10-18 04:36:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:36:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:36:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:36:54 --> Total execution time: 0.0782
DEBUG - 2022-10-18 04:37:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:07 --> Total execution time: 0.1002
DEBUG - 2022-10-18 04:37:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:13 --> Total execution time: 0.0970
DEBUG - 2022-10-18 04:37:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:16 --> Total execution time: 0.0751
DEBUG - 2022-10-18 04:37:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:19 --> Total execution time: 0.1021
DEBUG - 2022-10-18 04:37:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:21 --> Total execution time: 0.1069
DEBUG - 2022-10-18 04:37:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:21 --> Total execution time: 0.0786
DEBUG - 2022-10-18 04:37:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:23 --> Total execution time: 0.0974
DEBUG - 2022-10-18 04:37:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:23 --> Total execution time: 0.0709
DEBUG - 2022-10-18 04:37:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:25 --> Total execution time: 0.0903
DEBUG - 2022-10-18 04:37:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:29 --> Total execution time: 0.0688
DEBUG - 2022-10-18 04:37:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:33 --> Total execution time: 0.1389
DEBUG - 2022-10-18 04:37:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:39 --> Total execution time: 0.0794
DEBUG - 2022-10-18 04:37:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:43 --> Total execution time: 0.0732
DEBUG - 2022-10-18 04:37:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:44 --> Total execution time: 0.0829
DEBUG - 2022-10-18 04:37:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:37:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:37:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:37:59 --> Total execution time: 0.0856
DEBUG - 2022-10-18 04:38:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:03 --> Total execution time: 0.0834
DEBUG - 2022-10-18 04:38:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:05 --> Total execution time: 0.0931
DEBUG - 2022-10-18 04:38:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:09 --> Total execution time: 0.1049
DEBUG - 2022-10-18 04:38:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:11 --> Total execution time: 0.0638
DEBUG - 2022-10-18 04:38:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:14 --> Total execution time: 0.0759
DEBUG - 2022-10-18 04:38:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:37 --> Total execution time: 0.0819
DEBUG - 2022-10-18 04:38:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:43 --> Total execution time: 0.0912
DEBUG - 2022-10-18 04:38:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:44 --> Total execution time: 0.0776
DEBUG - 2022-10-18 04:38:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:45 --> Total execution time: 0.0903
DEBUG - 2022-10-18 04:38:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:38:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:38:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:38:54 --> Total execution time: 0.0871
DEBUG - 2022-10-18 04:41:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:06 --> Total execution time: 0.0731
DEBUG - 2022-10-18 04:41:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:18 --> Total execution time: 0.0797
DEBUG - 2022-10-18 04:41:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:46 --> Total execution time: 0.0911
DEBUG - 2022-10-18 04:41:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:48 --> Total execution time: 0.0936
DEBUG - 2022-10-18 04:41:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:51 --> Total execution time: 0.0939
DEBUG - 2022-10-18 04:41:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:41:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:41:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:41:52 --> Total execution time: 0.0703
DEBUG - 2022-10-18 04:43:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:43:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:43:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:43:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:43:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:43:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:43:54 --> Total execution time: 0.1084
DEBUG - 2022-10-18 04:43:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:43:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:43:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:43:56 --> Total execution time: 0.0902
DEBUG - 2022-10-18 04:43:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:43:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:43:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:43:57 --> Total execution time: 0.0915
DEBUG - 2022-10-18 04:43:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:43:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:43:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:43:59 --> Total execution time: 0.1199
DEBUG - 2022-10-18 04:44:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:44:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:44:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:44:03 --> Total execution time: 0.0687
DEBUG - 2022-10-18 04:45:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:45:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:45:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:45:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:45:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:45:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:45:10 --> Total execution time: 0.0851
DEBUG - 2022-10-18 04:45:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:45:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:45:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:45:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:45:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:45:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:45:11 --> Total execution time: 0.0655
DEBUG - 2022-10-18 04:45:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:45:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:45:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:45:13 --> Total execution time: 0.0754
DEBUG - 2022-10-18 04:45:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:45:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:45:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:45:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:45:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:45:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:45:21 --> Total execution time: 0.0840
DEBUG - 2022-10-18 04:51:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:51:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:51:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:51:14 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:51:14 --> Total execution time: 0.1078
DEBUG - 2022-10-18 04:51:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:51:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:51:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:51:25 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:51:25 --> Total execution time: 0.1032
DEBUG - 2022-10-18 04:51:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:51:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:51:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:51:26 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:51:26 --> Total execution time: 0.0984
DEBUG - 2022-10-18 04:52:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:52:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:52:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:52:15 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:52:15 --> Total execution time: 0.0835
DEBUG - 2022-10-18 04:52:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:52:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:52:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:52:19 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:52:19 --> Total execution time: 0.1016
DEBUG - 2022-10-18 04:52:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:52:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:52:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:52:21 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:52:21 --> Total execution time: 0.0803
DEBUG - 2022-10-18 04:53:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:53:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:53:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:53:44 --> Total execution time: 0.0800
DEBUG - 2022-10-18 04:53:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:53:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:53:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:53:51 --> Total execution time: 0.0997
DEBUG - 2022-10-18 04:54:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:54:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:54:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:54:04 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:54:04 --> Total execution time: 0.0891
DEBUG - 2022-10-18 04:54:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:54:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:54:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:54:30 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:54:30 --> Total execution time: 0.1060
DEBUG - 2022-10-18 04:54:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:54:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:54:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:54:31 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:54:31 --> Total execution time: 0.0940
DEBUG - 2022-10-18 04:54:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:54:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:54:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:54:33 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:54:33 --> Total execution time: 0.0816
DEBUG - 2022-10-18 04:54:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:54:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:54:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:54:35 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:54:35 --> Total execution time: 0.0921
DEBUG - 2022-10-18 04:54:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:54:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:54:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 04:54:45 --> Severity: Notice --> Trying to get property 'valor_total_faturado' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\faturamento-pedido.php 66
DEBUG - 2022-10-18 04:54:45 --> Total execution time: 0.0962
DEBUG - 2022-10-18 04:55:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:55:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:55:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:55:02 --> Total execution time: 0.1004
DEBUG - 2022-10-18 04:55:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:55:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:55:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:55:03 --> Total execution time: 0.0996
DEBUG - 2022-10-18 04:55:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:55:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:55:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:55:06 --> Total execution time: 0.0910
DEBUG - 2022-10-18 04:55:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:55:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:55:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:55:07 --> Total execution time: 0.0890
DEBUG - 2022-10-18 04:55:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:55:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:55:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:55:16 --> Total execution time: 0.0764
DEBUG - 2022-10-18 04:55:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:55:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:55:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:55:17 --> Total execution time: 0.1096
DEBUG - 2022-10-18 04:55:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:55:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:55:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:55:56 --> Total execution time: 0.1003
DEBUG - 2022-10-18 04:55:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:55:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:55:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:55:58 --> Total execution time: 0.0731
DEBUG - 2022-10-18 04:56:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:56:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:56:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:56:03 --> Total execution time: 0.1016
DEBUG - 2022-10-18 04:56:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 04:56:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 04:56:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 04:56:04 --> Total execution time: 0.0824
DEBUG - 2022-10-18 05:00:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:38 --> Total execution time: 0.0788
DEBUG - 2022-10-18 05:00:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:41 --> Total execution time: 0.1235
DEBUG - 2022-10-18 05:00:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:47 --> Total execution time: 0.0856
DEBUG - 2022-10-18 05:00:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:49 --> Total execution time: 0.0656
DEBUG - 2022-10-18 05:00:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:53 --> Total execution time: 0.0697
DEBUG - 2022-10-18 05:00:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:55 --> Total execution time: 0.0828
DEBUG - 2022-10-18 05:00:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:00:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:00:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:00:59 --> Total execution time: 0.0732
DEBUG - 2022-10-18 05:01:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:01:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:01:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:01:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:01:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:01:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:01:10 --> Total execution time: 0.0799
DEBUG - 2022-10-18 05:01:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:01:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:01:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:01:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:01:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:01:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:01:12 --> Total execution time: 0.0767
DEBUG - 2022-10-18 05:01:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 05:01:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 05:01:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 05:01:14 --> Total execution time: 0.0974
DEBUG - 2022-10-18 13:01:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:01:42 --> No URI present. Default controller set.
DEBUG - 2022-10-18 13:01:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:01:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:01:42 --> Total execution time: 0.2412
DEBUG - 2022-10-18 13:01:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:01:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:01:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:01:45 --> Total execution time: 0.0495
DEBUG - 2022-10-18 13:01:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:01:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:01:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:01:55 --> Total execution time: 0.0936
DEBUG - 2022-10-18 13:02:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:03 --> Total execution time: 0.2998
DEBUG - 2022-10-18 13:02:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:19 --> Total execution time: 0.1605
DEBUG - 2022-10-18 13:02:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:21 --> Total execution time: 0.0776
DEBUG - 2022-10-18 13:02:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:32 --> Total execution time: 0.0748
DEBUG - 2022-10-18 13:02:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:36 --> Total execution time: 0.1060
DEBUG - 2022-10-18 13:02:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:02:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:02:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:02:40 --> Total execution time: 0.0856
DEBUG - 2022-10-18 13:30:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:30:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:30:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:30:37 --> Total execution time: 2.4371
DEBUG - 2022-10-18 13:30:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:30:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:30:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:30:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:30:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:30:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:30:40 --> Total execution time: 0.1024
DEBUG - 2022-10-18 13:30:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:30:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:30:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:30:43 --> Total execution time: 0.0763
DEBUG - 2022-10-18 13:31:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:31:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:31:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:31:48 --> Total execution time: 0.0983
DEBUG - 2022-10-18 13:31:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:31:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:31:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:31:59 --> Total execution time: 0.0941
DEBUG - 2022-10-18 13:32:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:32:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:32:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:32:07 --> Total execution time: 0.0801
DEBUG - 2022-10-18 13:32:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:32:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:32:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:32:14 --> Total execution time: 0.1029
DEBUG - 2022-10-18 13:32:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:32:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:32:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:32:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:32:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:32:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:32:21 --> Total execution time: 0.0840
DEBUG - 2022-10-18 13:32:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:32:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:32:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:32:28 --> Total execution time: 0.0951
DEBUG - 2022-10-18 13:32:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:32:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:32:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:32:44 --> Total execution time: 0.1040
DEBUG - 2022-10-18 13:33:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:33:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:33:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:33:02 --> Total execution time: 2.3344
DEBUG - 2022-10-18 13:33:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:33:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:33:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:33:21 --> Total execution time: 0.1377
DEBUG - 2022-10-18 13:33:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:33:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:33:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:33:34 --> Total execution time: 0.0920
DEBUG - 2022-10-18 13:33:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:33:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:33:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:33:46 --> Total execution time: 0.1161
DEBUG - 2022-10-18 13:33:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:33:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:33:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:33:56 --> Total execution time: 0.0813
DEBUG - 2022-10-18 13:34:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:34:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:34:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:34:19 --> Total execution time: 0.0845
DEBUG - 2022-10-18 13:34:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:34:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:34:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:34:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:34:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:34:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:34:27 --> Total execution time: 0.0908
DEBUG - 2022-10-18 13:35:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:01 --> Total execution time: 0.1038
DEBUG - 2022-10-18 13:35:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:19 --> Total execution time: 0.0804
DEBUG - 2022-10-18 13:35:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:23 --> Total execution time: 0.1348
DEBUG - 2022-10-18 13:35:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:24 --> Total execution time: 0.1088
DEBUG - 2022-10-18 13:35:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:26 --> Total execution time: 0.0724
DEBUG - 2022-10-18 13:35:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:28 --> Total execution time: 0.1217
DEBUG - 2022-10-18 13:35:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:31 --> Total execution time: 0.0841
DEBUG - 2022-10-18 13:35:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:32 --> Total execution time: 0.1209
DEBUG - 2022-10-18 13:35:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:35 --> Total execution time: 0.0996
DEBUG - 2022-10-18 13:35:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:35:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:35:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:35:46 --> Total execution time: 0.1332
DEBUG - 2022-10-18 13:36:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:19 --> Total execution time: 0.0972
DEBUG - 2022-10-18 13:36:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:22 --> Total execution time: 0.0926
DEBUG - 2022-10-18 13:36:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:23 --> Total execution time: 0.1056
DEBUG - 2022-10-18 13:36:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:27 --> Total execution time: 0.0920
DEBUG - 2022-10-18 13:36:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:28 --> Total execution time: 0.1060
DEBUG - 2022-10-18 13:36:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:34 --> Total execution time: 0.1123
DEBUG - 2022-10-18 13:36:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:36 --> Total execution time: 0.0884
DEBUG - 2022-10-18 13:36:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:52 --> Total execution time: 2.3424
DEBUG - 2022-10-18 13:36:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:54 --> Total execution time: 0.1073
DEBUG - 2022-10-18 13:36:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 13:36:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 13:36:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 13:36:56 --> Total execution time: 0.1082
DEBUG - 2022-10-18 14:04:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:00 --> Total execution time: 0.0896
DEBUG - 2022-10-18 14:04:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:13 --> Total execution time: 2.4997
DEBUG - 2022-10-18 14:04:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:21 --> Total execution time: 0.1156
DEBUG - 2022-10-18 14:04:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:26 --> Total execution time: 0.1315
DEBUG - 2022-10-18 14:04:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:04:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:04:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:04:37 --> Total execution time: 0.1234
DEBUG - 2022-10-18 14:06:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:06:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:06:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:06:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:06:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:06:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:06:43 --> Total execution time: 0.0830
DEBUG - 2022-10-18 14:06:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:06:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:06:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:06:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:06:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:06:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:06:48 --> Total execution time: 0.0913
DEBUG - 2022-10-18 14:07:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:07:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:07:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:07:35 --> Total execution time: 0.0701
DEBUG - 2022-10-18 14:07:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:07:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:07:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:07:50 --> Total execution time: 0.0588
DEBUG - 2022-10-18 14:08:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:01 --> Total execution time: 0.0759
DEBUG - 2022-10-18 14:08:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:02 --> Total execution time: 0.0843
DEBUG - 2022-10-18 14:08:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:05 --> Total execution time: 0.0692
DEBUG - 2022-10-18 14:08:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:06 --> Total execution time: 0.0792
DEBUG - 2022-10-18 14:08:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:19 --> Total execution time: 0.1377
DEBUG - 2022-10-18 14:08:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:37 --> Total execution time: 0.0661
DEBUG - 2022-10-18 14:08:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:43 --> Total execution time: 0.1020
DEBUG - 2022-10-18 14:08:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:50 --> Total execution time: 0.1052
DEBUG - 2022-10-18 14:08:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:58 --> Total execution time: 0.0798
DEBUG - 2022-10-18 14:08:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:08:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:08:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:08:59 --> Total execution time: 0.0938
DEBUG - 2022-10-18 14:09:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:09:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:09:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:09:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:09:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:09:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:09:10 --> Total execution time: 0.0818
DEBUG - 2022-10-18 14:09:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:09:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:09:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:09:11 --> Total execution time: 0.1283
DEBUG - 2022-10-18 14:09:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:09:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:09:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:09:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:09:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:09:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:09:37 --> Total execution time: 0.0877
DEBUG - 2022-10-18 14:09:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:09:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:09:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:09:41 --> Total execution time: 0.0795
DEBUG - 2022-10-18 14:13:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:13:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:13:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:13:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:13:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:13:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:13:02 --> Total execution time: 0.0917
DEBUG - 2022-10-18 14:13:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:13:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:13:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:13:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:13:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:13:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:13:07 --> Total execution time: 0.0839
DEBUG - 2022-10-18 14:13:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:13:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:13:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:13:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:13:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:13:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:13:09 --> Total execution time: 0.0924
DEBUG - 2022-10-18 14:14:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:14:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:14:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:14:05 --> Total execution time: 0.1021
DEBUG - 2022-10-18 14:14:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:14:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:14:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:14:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:14:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:14:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:14:09 --> Total execution time: 0.0716
DEBUG - 2022-10-18 14:14:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:14:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:14:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:14:11 --> Total execution time: 0.1393
DEBUG - 2022-10-18 14:14:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:14:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:14:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:14:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:14:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:14:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:14:16 --> Total execution time: 0.0876
DEBUG - 2022-10-18 14:14:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:14:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:14:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:14:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:14:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:14:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:14:19 --> Total execution time: 0.1036
DEBUG - 2022-10-18 14:18:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:18:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:18:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:18:33 --> Total execution time: 2.6404
DEBUG - 2022-10-18 14:22:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:22:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:22:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:22:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:22:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:22:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:22:56 --> Total execution time: 0.0719
DEBUG - 2022-10-18 14:22:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:22:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:22:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:22:58 --> Total execution time: 0.0911
DEBUG - 2022-10-18 14:26:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:26:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:26:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:26:32 --> Total execution time: 0.0607
DEBUG - 2022-10-18 14:44:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:44:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:44:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:44:13 --> Severity: Notice --> Undefined variable: pedido C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\novo-reporte-producao.php 45
ERROR - 2022-10-18 14:44:13 --> Severity: Notice --> Trying to get property 'data_emissao' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\novo-reporte-producao.php 45
ERROR - 2022-10-18 14:44:13 --> Severity: Notice --> Undefined variable: pedido C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\novo-reporte-producao.php 54
ERROR - 2022-10-18 14:44:13 --> Severity: Notice --> Trying to get property 'data_entrega' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\novo-reporte-producao.php 54
ERROR - 2022-10-18 14:44:13 --> Severity: Notice --> Undefined variable: pedido C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\novo-reporte-producao.php 59
ERROR - 2022-10-18 14:44:13 --> Severity: Notice --> Trying to get property 'cod_vendedor' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\novo-reporte-producao.php 59
DEBUG - 2022-10-18 14:44:13 --> Total execution time: 0.1244
DEBUG - 2022-10-18 14:44:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:44:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:44:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:44:27 --> Total execution time: 0.0888
DEBUG - 2022-10-18 14:46:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:46:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:46:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:46:16 --> Severity: Notice --> Undefined variable: lista_componente C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\novo-faturamento-pedido.php 76
ERROR - 2022-10-18 14:46:16 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\novo-faturamento-pedido.php 76
ERROR - 2022-10-18 14:46:16 --> Severity: Notice --> Undefined variable: lista_componente C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\novo-faturamento-pedido.php 91
DEBUG - 2022-10-18 14:46:16 --> Total execution time: 2.6980
DEBUG - 2022-10-18 14:49:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:49:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:49:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:49:07 --> Severity: Notice --> Undefined property: stdClass::$quant_consumo C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\novo-faturamento-pedido.php 83
DEBUG - 2022-10-18 14:49:07 --> Total execution time: 2.6866
DEBUG - 2022-10-18 14:49:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:49:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:49:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:49:19 --> Total execution time: 2.6507
DEBUG - 2022-10-18 14:50:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:50:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:21 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:21 --> Total execution time: 0.2326
DEBUG - 2022-10-18 14:50:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:24 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:24 --> Total execution time: 0.2149
DEBUG - 2022-10-18 14:50:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:25 --> Total execution time: 0.2120
DEBUG - 2022-10-18 14:50:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:25 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:26 --> Total execution time: 0.2414
DEBUG - 2022-10-18 14:50:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:26 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:26 --> Total execution time: 0.2045
DEBUG - 2022-10-18 14:50:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:27 --> Total execution time: 0.2476
DEBUG - 2022-10-18 14:50:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:27 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:27 --> Total execution time: 0.2259
DEBUG - 2022-10-18 14:50:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:28 --> Total execution time: 0.2373
DEBUG - 2022-10-18 14:50:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:28 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:29 --> Total execution time: 0.2019
DEBUG - 2022-10-18 14:50:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:29 --> Total execution time: 0.2234
DEBUG - 2022-10-18 14:50:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:30 --> Total execution time: 0.2020
DEBUG - 2022-10-18 14:50:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:30 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:30 --> Total execution time: 0.2319
DEBUG - 2022-10-18 14:50:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:31 --> Total execution time: 0.2317
DEBUG - 2022-10-18 14:50:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:31 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:32 --> Total execution time: 0.2637
DEBUG - 2022-10-18 14:50:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:32 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:32 --> Total execution time: 0.2490
DEBUG - 2022-10-18 14:50:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:34 --> Total execution time: 0.2170
DEBUG - 2022-10-18 14:50:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:34 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:35 --> Total execution time: 0.2983
DEBUG - 2022-10-18 14:50:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:35 --> Total execution time: 0.2804
DEBUG - 2022-10-18 14:50:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:36 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:36 --> Total execution time: 0.2504
DEBUG - 2022-10-18 14:50:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:37 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:37 --> Total execution time: 0.2833
DEBUG - 2022-10-18 14:50:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:50:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:40 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:40 --> Total execution time: 0.2527
DEBUG - 2022-10-18 14:50:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:50:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 670
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 672
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 674
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 676
ERROR - 2022-10-18 14:50:44 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 679
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 680
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 683
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 685
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 715
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 720
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
ERROR - 2022-10-18 14:50:45 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 726
DEBUG - 2022-10-18 14:50:45 --> Total execution time: 0.3032
DEBUG - 2022-10-18 14:50:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:50:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:50:52 --> Total execution time: 0.0952
DEBUG - 2022-10-18 14:50:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:50:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:50:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:50:56 --> Total execution time: 2.4933
DEBUG - 2022-10-18 14:53:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:53:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:53:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:53:31 --> Total execution time: 2.4809
DEBUG - 2022-10-18 14:53:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:53:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:53:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:53:50 --> Total execution time: 2.5372
DEBUG - 2022-10-18 14:54:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:54:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:54:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:54:04 --> Total execution time: 2.7698
DEBUG - 2022-10-18 14:54:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:54:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:54:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:54:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:54:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:54:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:54:14 --> Total execution time: 0.0970
DEBUG - 2022-10-18 14:54:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:54:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:54:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:54:18 --> Total execution time: 2.3055
DEBUG - 2022-10-18 14:55:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:55:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:55:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:55:37 --> Total execution time: 2.6855
DEBUG - 2022-10-18 14:55:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:55:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:55:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:55:53 --> Total execution time: 2.6012
DEBUG - 2022-10-18 14:56:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:56:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:56:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:56:14 --> Total execution time: 2.6467
DEBUG - 2022-10-18 14:56:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:56:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:56:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:56:35 --> Total execution time: 2.3323
DEBUG - 2022-10-18 14:56:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:56:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:56:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:56:45 --> Total execution time: 2.5349
DEBUG - 2022-10-18 14:56:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:56:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:56:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:57:00 --> Total execution time: 2.5075
DEBUG - 2022-10-18 14:57:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:57:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:57:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:57:17 --> Total execution time: 2.3785
DEBUG - 2022-10-18 14:59:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 14:59:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 14:59:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 14:59:54 --> Total execution time: 2.9524
DEBUG - 2022-10-18 15:00:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:00:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:00:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:00:54 --> Total execution time: 2.8283
DEBUG - 2022-10-18 15:01:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:01:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:01:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:01:10 --> Total execution time: 2.4633
DEBUG - 2022-10-18 15:22:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:22:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:22:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:22:13 --> Total execution time: 2.1748
DEBUG - 2022-10-18 15:22:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:22:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:22:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:22:33 --> Total execution time: 2.2502
DEBUG - 2022-10-18 15:26:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:26:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:26:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:26:05 --> Total execution time: 2.6398
DEBUG - 2022-10-18 15:27:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:27:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:27:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:27:34 --> Total execution time: 2.3357
DEBUG - 2022-10-18 15:27:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:27:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:27:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:27:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:27:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:27:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:27:44 --> Total execution time: 0.0924
DEBUG - 2022-10-18 15:27:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:27:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:27:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:27:48 --> Total execution time: 0.0983
DEBUG - 2022-10-18 15:27:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:27:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:27:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:27:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:27:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:27:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:27:55 --> Total execution time: 0.1218
DEBUG - 2022-10-18 15:27:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:27:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:27:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:27:59 --> Total execution time: 2.7083
DEBUG - 2022-10-18 15:28:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:28:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:28:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:28:13 --> Total execution time: 2.3146
DEBUG - 2022-10-18 15:29:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:29:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:29:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:29:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:29:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:29:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:29:30 --> Total execution time: 0.1027
DEBUG - 2022-10-18 15:29:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:29:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:29:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:29:34 --> Total execution time: 2.5800
DEBUG - 2022-10-18 15:37:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:37:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:37:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:37:45 --> Total execution time: 2.5889
DEBUG - 2022-10-18 15:37:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:37:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:37:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:37:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:37:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:37:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:37:50 --> Total execution time: 0.0832
DEBUG - 2022-10-18 15:37:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:37:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:37:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:37:52 --> Total execution time: 0.1326
DEBUG - 2022-10-18 15:38:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:38:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:38:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:38:02 --> Total execution time: 2.1549
DEBUG - 2022-10-18 15:38:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:38:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:38:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:38:06 --> Total execution time: 2.5211
DEBUG - 2022-10-18 15:38:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:38:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:38:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:38:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:38:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:38:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:38:13 --> Total execution time: 0.1038
DEBUG - 2022-10-18 15:38:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:38:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:38:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:38:15 --> Total execution time: 0.0897
DEBUG - 2022-10-18 15:38:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:38:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:38:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:38:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:38:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:38:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:38:28 --> Total execution time: 0.1049
DEBUG - 2022-10-18 15:38:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:38:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:38:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:38:32 --> Total execution time: 2.3776
DEBUG - 2022-10-18 15:39:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:39:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:39:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:39:12 --> Total execution time: 2.9353
DEBUG - 2022-10-18 15:39:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:39:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:39:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:39:19 --> Total execution time: 2.3991
DEBUG - 2022-10-18 15:39:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:39:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:39:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:39:28 --> Total execution time: 2.7865
DEBUG - 2022-10-18 15:39:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:39:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:39:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:39:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:39:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:39:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:39:52 --> Total execution time: 0.1199
DEBUG - 2022-10-18 15:39:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:39:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:39:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:39:56 --> Total execution time: 2.7886
DEBUG - 2022-10-18 15:44:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:44:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:44:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:44:20 --> Total execution time: 2.5929
DEBUG - 2022-10-18 15:45:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:45:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:45:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:45:20 --> Total execution time: 2.4945
DEBUG - 2022-10-18 15:45:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:45:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:45:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:45:33 --> Total execution time: 2.4965
DEBUG - 2022-10-18 15:59:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 15:59:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 15:59:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 15:59:41 --> Total execution time: 2.7322
DEBUG - 2022-10-18 16:01:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:01:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:01:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:01:24 --> Total execution time: 2.4797
DEBUG - 2022-10-18 16:02:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:02:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:02:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:02:44 --> Total execution time: 2.7612
DEBUG - 2022-10-18 16:02:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:02:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:02:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:02:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:02:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:02:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:02:48 --> Total execution time: 0.1007
DEBUG - 2022-10-18 16:02:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:02:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:02:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:02:50 --> Total execution time: 0.1444
DEBUG - 2022-10-18 16:13:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:13:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:13:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 16:13:46 --> Severity: Notice --> Undefined variable: lista_reporte C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\novo-faturamento-pedido.php 380
DEBUG - 2022-10-18 16:13:46 --> Total execution time: 2.7418
DEBUG - 2022-10-18 16:14:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:14:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:14:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:14:05 --> Total execution time: 2.5400
DEBUG - 2022-10-18 16:14:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:14:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:14:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:14:28 --> Total execution time: 2.6880
DEBUG - 2022-10-18 16:14:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:14:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:14:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:14:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:14:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:14:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:14:33 --> Total execution time: 0.1009
DEBUG - 2022-10-18 16:14:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:14:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:14:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:14:36 --> Total execution time: 0.0592
DEBUG - 2022-10-18 16:22:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:22:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:22:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:22:56 --> Total execution time: 2.5021
DEBUG - 2022-10-18 16:59:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:59:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:59:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:59:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:59:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:59:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:59:00 --> Total execution time: 0.1359
DEBUG - 2022-10-18 16:59:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:59:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:59:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:59:05 --> Total execution time: 2.6605
DEBUG - 2022-10-18 16:59:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:59:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:59:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:59:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:59:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:59:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:59:23 --> Total execution time: 0.2296
DEBUG - 2022-10-18 16:59:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:59:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:59:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:59:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:59:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:59:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:59:27 --> Total execution time: 0.1365
DEBUG - 2022-10-18 16:59:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 16:59:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 16:59:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 16:59:31 --> Total execution time: 2.5088
DEBUG - 2022-10-18 17:34:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:34:20 --> No URI present. Default controller set.
DEBUG - 2022-10-18 17:34:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:34:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:34:20 --> Total execution time: 0.1067
DEBUG - 2022-10-18 17:34:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:34:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:34:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:34:22 --> Total execution time: 0.0569
DEBUG - 2022-10-18 17:34:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:34:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:34:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:34:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:34:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:34:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:34:32 --> Total execution time: 0.5004
DEBUG - 2022-10-18 17:34:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:34:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:34:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:34:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:34:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:34:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:34:33 --> Total execution time: 0.0793
DEBUG - 2022-10-18 17:34:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:34:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:34:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:34:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:34:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:34:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:34:39 --> Total execution time: 0.1113
DEBUG - 2022-10-18 17:36:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:36:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:36:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:36:14 --> Total execution time: 2.3764
DEBUG - 2022-10-18 17:52:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:04 --> Total execution time: 2.7723
DEBUG - 2022-10-18 17:52:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:13 --> Total execution time: 0.1045
DEBUG - 2022-10-18 17:52:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:18 --> Total execution time: 0.1323
DEBUG - 2022-10-18 17:52:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:22 --> Total execution time: 2.4957
DEBUG - 2022-10-18 17:52:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:25 --> Total execution time: 0.0739
DEBUG - 2022-10-18 17:52:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:27 --> Total execution time: 0.0965
DEBUG - 2022-10-18 17:52:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:31 --> Total execution time: 0.1278
DEBUG - 2022-10-18 17:52:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:52:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:52:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:52:51 --> Total execution time: 2.3502
DEBUG - 2022-10-18 17:53:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:53:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:53:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:53:46 --> Total execution time: 2.7963
DEBUG - 2022-10-18 17:59:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:59:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:59:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:59:31 --> Total execution time: 2.2688
DEBUG - 2022-10-18 17:59:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 17:59:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 17:59:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 17:59:49 --> Total execution time: 2.4876
DEBUG - 2022-10-18 18:00:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:00:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:00:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:00:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:00:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:00:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:00:31 --> Total execution time: 2.8929
DEBUG - 2022-10-18 18:01:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:01:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:01:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:01:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:01:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:01:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:01:12 --> Total execution time: 0.1005
DEBUG - 2022-10-18 18:01:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:01:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:01:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:01:13 --> Total execution time: 0.1569
DEBUG - 2022-10-18 18:02:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:02:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:02:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:02:51 --> Total execution time: 2.9649
DEBUG - 2022-10-18 18:03:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:03:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:03:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:03:48 --> Total execution time: 2.9178
DEBUG - 2022-10-18 18:05:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:05:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:05:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:05:52 --> Total execution time: 2.6498
DEBUG - 2022-10-18 18:06:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:06:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:06:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:06:49 --> Total execution time: 0.1121
DEBUG - 2022-10-18 18:06:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:06:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:06:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:06:58 --> Total execution time: 2.5846
DEBUG - 2022-10-18 18:07:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:07:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:07:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:07:31 --> Total execution time: 0.1295
DEBUG - 2022-10-18 18:07:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:07:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:07:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:07:40 --> Total execution time: 2.8702
DEBUG - 2022-10-18 18:08:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 18:08:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 18:08:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 18:08:07 --> Total execution time: 2.8427
DEBUG - 2022-10-18 19:33:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:33:47 --> No URI present. Default controller set.
DEBUG - 2022-10-18 19:33:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:33:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:33:47 --> Total execution time: 0.0595
DEBUG - 2022-10-18 19:33:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:33:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:33:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:33:49 --> Total execution time: 0.0730
DEBUG - 2022-10-18 19:34:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:01 --> Total execution time: 0.2861
DEBUG - 2022-10-18 19:34:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:01 --> Total execution time: 0.2362
DEBUG - 2022-10-18 19:34:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:04 --> Total execution time: 0.0653
DEBUG - 2022-10-18 19:34:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:06 --> Total execution time: 0.0944
DEBUG - 2022-10-18 19:34:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:29 --> Total execution time: 0.0820
DEBUG - 2022-10-18 19:34:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:51 --> Total execution time: 0.0975
DEBUG - 2022-10-18 19:34:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:34:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:34:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:34:56 --> Total execution time: 0.0448
DEBUG - 2022-10-18 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:35:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:35:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:35:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:35:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:35:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:35:00 --> Total execution time: 0.1039
DEBUG - 2022-10-18 19:35:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:35:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:35:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:35:05 --> Total execution time: 0.0468
DEBUG - 2022-10-18 19:35:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:35:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:35:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:35:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:35:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:35:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:35:07 --> Total execution time: 0.0835
DEBUG - 2022-10-18 19:35:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:35:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:35:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:35:10 --> Total execution time: 1.5172
DEBUG - 2022-10-18 19:35:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:35:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:35:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:35:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 19:35:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 19:35:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 19:35:17 --> Total execution time: 1.7315
DEBUG - 2022-10-18 21:13:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:12 --> No URI present. Default controller set.
DEBUG - 2022-10-18 21:13:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:12 --> Total execution time: 0.1907
DEBUG - 2022-10-18 21:13:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:14 --> Total execution time: 0.0801
DEBUG - 2022-10-18 21:13:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:21 --> Total execution time: 0.0923
DEBUG - 2022-10-18 21:13:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:27 --> Total execution time: 0.5471
DEBUG - 2022-10-18 21:13:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:29 --> Total execution time: 0.1018
DEBUG - 2022-10-18 21:13:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:34 --> Total execution time: 0.1206
DEBUG - 2022-10-18 21:13:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:37 --> Total execution time: 2.4293
DEBUG - 2022-10-18 21:13:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:49 --> Total execution time: 0.1339
DEBUG - 2022-10-18 21:13:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:13:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:13:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:13:54 --> Total execution time: 2.4049
DEBUG - 2022-10-18 21:20:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:20:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:20:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:20:20 --> Total execution time: 2.6636
DEBUG - 2022-10-18 21:20:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:20:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:20:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:21:01 --> Total execution time: 2.2198
DEBUG - 2022-10-18 21:21:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:21:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:21:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:21:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:21:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:21:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:21:06 --> Total execution time: 0.0898
DEBUG - 2022-10-18 21:21:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:21:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:21:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:21:11 --> Total execution time: 0.1093
DEBUG - 2022-10-18 21:21:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:21:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:21:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:21:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:21:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:21:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:21:20 --> Total execution time: 0.0879
DEBUG - 2022-10-18 21:21:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:21:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:21:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:21:23 --> Total execution time: 2.3326
DEBUG - 2022-10-18 21:22:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:22:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:22:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:22:20 --> Total execution time: 0.1245
DEBUG - 2022-10-18 21:32:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:32:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:32:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-18 21:32:54 --> Severity: Notice --> Undefined variable: lista_produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure.php 164
ERROR - 2022-10-18 21:32:54 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure.php 164
ERROR - 2022-10-18 21:32:54 --> Severity: Notice --> Undefined variable: lista_produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure.php 186
DEBUG - 2022-10-18 21:32:54 --> Total execution time: 0.1210
DEBUG - 2022-10-18 21:34:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:34:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:34:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:34:10 --> Total execution time: 0.1011
DEBUG - 2022-10-18 21:34:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:34:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:34:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:34:41 --> Total execution time: 0.1024
DEBUG - 2022-10-18 21:34:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:34:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:34:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:34:49 --> Total execution time: 0.1064
DEBUG - 2022-10-18 21:34:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:34:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:34:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:34:59 --> Total execution time: 0.0907
DEBUG - 2022-10-18 21:37:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:37:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:37:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:37:28 --> Total execution time: 0.0878
DEBUG - 2022-10-18 21:37:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:37:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:37:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:37:42 --> Total execution time: 0.1190
DEBUG - 2022-10-18 21:38:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:38:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:38:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:38:09 --> Total execution time: 0.1000
DEBUG - 2022-10-18 21:40:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:40:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:40:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:40:12 --> Total execution time: 0.0894
DEBUG - 2022-10-18 21:40:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:40:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:40:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:40:30 --> Total execution time: 0.0728
DEBUG - 2022-10-18 21:40:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:40:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:40:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:40:56 --> Total execution time: 0.0996
DEBUG - 2022-10-18 21:47:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:47:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:47:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:47:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:47:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:47:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:47:26 --> Total execution time: 0.0956
DEBUG - 2022-10-18 21:47:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:47:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:47:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:47:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 21:47:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 21:47:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 21:47:36 --> Total execution time: 0.0916
DEBUG - 2022-10-18 23:15:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 23:15:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 23:15:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 23:15:51 --> Total execution time: 0.2140
DEBUG - 2022-10-18 23:16:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 23:16:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 23:16:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 23:16:30 --> Total execution time: 1.7170
DEBUG - 2022-10-18 23:29:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-18 23:29:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-18 23:29:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-18 23:29:45 --> Total execution time: 1.7282
