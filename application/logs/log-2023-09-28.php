<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2023-09-28 00:01:54 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:01:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:01:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:01:55 --> Total execution time: 0.8667
DEBUG - 2023-09-28 00:05:08 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:05:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:05:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:05:09 --> Total execution time: 0.8603
DEBUG - 2023-09-28 00:05:28 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:05:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:05:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:05:29 --> Total execution time: 0.9169
DEBUG - 2023-09-28 00:13:44 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:13:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:13:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:13:44 --> Total execution time: 0.9182
DEBUG - 2023-09-28 00:19:24 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:19:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:19:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:19:25 --> Total execution time: 0.9324
DEBUG - 2023-09-28 00:20:31 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:20:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:20:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:20:32 --> Total execution time: 0.8366
DEBUG - 2023-09-28 00:24:37 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:24:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:24:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:24:37 --> Total execution time: 0.8977
DEBUG - 2023-09-28 00:39:52 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:39:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:39:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:39:53 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 00:39:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 00:39:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 00:39:54 --> Total execution time: 1.0619
DEBUG - 2023-09-28 02:05:59 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:05:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:05:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:06:01 --> Total execution time: 1.9981
DEBUG - 2023-09-28 02:11:24 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:11:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:11:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:11:26 --> Total execution time: 1.4425
DEBUG - 2023-09-28 02:12:48 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:12:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:12:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:12:49 --> Total execution time: 1.1370
DEBUG - 2023-09-28 02:13:56 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:13:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:13:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:13:57 --> Total execution time: 1.1903
DEBUG - 2023-09-28 02:16:59 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:17:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:17:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 02:17:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ')
                              and movimentos_conta.confirmado = 1
         ...' at line 11 - Invalid query: SELECT `tim`.`db_date` as `data`, SUM(IFNULL(movimento.entradas, 0)) as entradas, SUM(IFNULL(movimento.saidas, 0)) as saidas                           
                        from time_dimension tim
LEFT JOIN (
                            SELECT movimentos_conta.data_confirmacao as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and conta.cod_conta in ()
                              and movimentos_conta.confirmado = 1
                            GROUP BY movimentos_conta.data_confirmacao                            
                            UNION 
                            SELECT if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento) as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and conta.cod_conta in ()
                              and movimentos_conta.confirmado = 0
                            GROUP BY if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)
                        ) as movimento ON `movimento`.`data_fluxo` = `tim`.`db_date`
WHERE `tim`.`db_date` >= '2023-09-01'
AND `tim`.`db_date` <= '2023-09-30'
GROUP BY `tim`.`db_date`
ORDER BY `tim`.`db_date`
DEBUG - 2023-09-28 02:18:58 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:18:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:18:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:18:59 --> Total execution time: 1.2768
DEBUG - 2023-09-28 02:31:54 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:31:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:31:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:31:55 --> Total execution time: 1.4550
DEBUG - 2023-09-28 02:33:44 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:33:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:33:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:33:46 --> Total execution time: 1.3763
DEBUG - 2023-09-28 02:33:49 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:33:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:33:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:33:50 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:33:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:33:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:33:51 --> Total execution time: 1.3728
DEBUG - 2023-09-28 02:37:13 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:37:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:37:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:37:15 --> Total execution time: 1.7839
DEBUG - 2023-09-28 02:38:44 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:38:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:38:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:38:45 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:38:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:38:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:38:47 --> Total execution time: 1.7841
DEBUG - 2023-09-28 02:39:30 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:39:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:39:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:39:31 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:39:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:39:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:39:33 --> Total execution time: 1.8325
DEBUG - 2023-09-28 02:47:32 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:47:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:47:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:47:33 --> Total execution time: 1.4720
DEBUG - 2023-09-28 02:47:55 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:47:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:47:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:47:56 --> Total execution time: 1.2581
DEBUG - 2023-09-28 02:49:04 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:49:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:49:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 02:49:05 --> Severity: Notice --> Undefined variable: saldo D:\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\fluxo-caixa.php 145
ERROR - 2023-09-28 02:49:05 --> Severity: Notice --> Undefined variable: saldo D:\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\fluxo-caixa.php 146
ERROR - 2023-09-28 02:49:06 --> Severity: Notice --> Undefined variable: saldo D:\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\fluxo-caixa.php 147
ERROR - 2023-09-28 02:49:06 --> Severity: Notice --> Undefined variable: saldo D:\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\fluxo-caixa.php 154
DEBUG - 2023-09-28 02:49:06 --> Total execution time: 1.5911
DEBUG - 2023-09-28 02:50:01 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:50:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:50:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:50:02 --> Total execution time: 1.1418
DEBUG - 2023-09-28 02:50:31 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:50:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:50:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:50:33 --> Total execution time: 1.4025
DEBUG - 2023-09-28 02:50:55 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:50:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:50:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:50:56 --> Total execution time: 1.2386
DEBUG - 2023-09-28 02:51:06 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:51:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:51:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:51:07 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:51:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:51:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:51:09 --> Total execution time: 2.1833
DEBUG - 2023-09-28 02:52:01 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:52:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:52:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:52:03 --> Total execution time: 1.4680
DEBUG - 2023-09-28 02:52:22 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:52:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:52:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:52:23 --> Total execution time: 1.2637
DEBUG - 2023-09-28 02:53:03 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:53:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:53:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:53:04 --> Total execution time: 1.2264
DEBUG - 2023-09-28 02:54:07 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:54:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:54:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:54:08 --> Total execution time: 1.2622
DEBUG - 2023-09-28 02:54:29 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:54:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:54:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:54:30 --> Total execution time: 1.2134
DEBUG - 2023-09-28 02:55:09 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:55:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:55:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:55:10 --> Total execution time: 1.1548
DEBUG - 2023-09-28 02:55:27 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:55:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:55:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:55:28 --> Total execution time: 1.0620
DEBUG - 2023-09-28 02:55:45 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:55:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:55:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:55:46 --> Total execution time: 1.2841
DEBUG - 2023-09-28 02:56:01 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:56:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:56:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:56:01 --> Total execution time: 1.0329
DEBUG - 2023-09-28 02:57:02 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:57:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:57:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:57:03 --> Total execution time: 1.2381
DEBUG - 2023-09-28 02:58:33 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 02:58:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 02:58:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 02:58:34 --> Total execution time: 1.2051
DEBUG - 2023-09-28 03:00:12 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:00:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:00:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:00:13 --> Total execution time: 1.0723
DEBUG - 2023-09-28 03:01:14 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:01:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:01:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:01:16 --> Total execution time: 1.1683
DEBUG - 2023-09-28 03:06:10 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:06:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:06:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:06:11 --> Total execution time: 1.3407
DEBUG - 2023-09-28 03:06:41 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:06:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:06:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:06:42 --> Total execution time: 1.2624
DEBUG - 2023-09-28 03:07:03 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:07:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:07:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:07:04 --> Total execution time: 1.0810
DEBUG - 2023-09-28 03:07:27 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:07:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:07:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:07:28 --> Total execution time: 1.3264
DEBUG - 2023-09-28 03:07:45 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:07:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:07:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:07:46 --> Total execution time: 1.2715
DEBUG - 2023-09-28 03:08:56 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:08:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:08:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:08:57 --> Total execution time: 1.2478
DEBUG - 2023-09-28 03:10:05 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:10:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:10:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:10:06 --> Total execution time: 1.2675
DEBUG - 2023-09-28 03:12:25 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:12:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:12:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:12:26 --> Total execution time: 1.0839
DEBUG - 2023-09-28 03:13:16 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:13:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:13:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:13:17 --> Total execution time: 1.2030
DEBUG - 2023-09-28 03:17:21 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:17:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:17:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:17:21 --> Total execution time: 1.0288
DEBUG - 2023-09-28 03:18:53 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:18:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:18:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:18:54 --> Total execution time: 1.1084
DEBUG - 2023-09-28 03:20:22 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:20:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:20:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:20:23 --> Total execution time: 1.1002
DEBUG - 2023-09-28 03:21:20 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:21:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:21:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:21:21 --> Total execution time: 1.0078
DEBUG - 2023-09-28 03:23:22 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:23:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:23:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:23:23 --> Total execution time: 1.0245
DEBUG - 2023-09-28 03:27:21 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:27:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:27:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:27:22 --> Total execution time: 1.1459
DEBUG - 2023-09-28 03:32:30 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:32:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:32:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:32:31 --> Total execution time: 1.3051
DEBUG - 2023-09-28 03:33:34 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:33:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:33:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:33:35 --> Total execution time: 1.0003
DEBUG - 2023-09-28 03:33:50 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:33:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:33:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:33:51 --> Total execution time: 1.1784
DEBUG - 2023-09-28 03:36:14 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:36:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:36:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:36:15 --> Total execution time: 1.1470
DEBUG - 2023-09-28 03:36:31 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:36:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:36:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:36:32 --> Total execution time: 1.2606
DEBUG - 2023-09-28 03:36:48 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:36:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:36:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:36:49 --> Total execution time: 1.1082
DEBUG - 2023-09-28 03:37:22 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:37:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:37:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:37:23 --> Total execution time: 1.0831
DEBUG - 2023-09-28 03:37:46 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:37:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:37:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:37:47 --> Total execution time: 1.0489
DEBUG - 2023-09-28 03:38:03 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:38:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:38:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:38:04 --> Total execution time: 1.1712
DEBUG - 2023-09-28 03:39:00 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:39:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:39:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:39:01 --> Total execution time: 1.1715
DEBUG - 2023-09-28 03:39:43 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:39:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:39:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:39:44 --> Total execution time: 1.1810
DEBUG - 2023-09-28 03:40:01 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:40:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:40:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:40:02 --> Total execution time: 1.0228
DEBUG - 2023-09-28 03:43:42 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:43:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:43:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:43:43 --> Total execution time: 1.5400
DEBUG - 2023-09-28 03:45:04 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:45:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:45:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:45:05 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:45:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:45:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:45:06 --> Total execution time: 1.2044
DEBUG - 2023-09-28 03:45:13 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:45:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:45:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:45:15 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:45:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:45:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:45:16 --> Total execution time: 1.2147
DEBUG - 2023-09-28 03:45:21 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:45:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:45:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:45:22 --> Total execution time: 1.1375
DEBUG - 2023-09-28 03:45:29 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:45:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:45:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:45:31 --> Total execution time: 1.2909
DEBUG - 2023-09-28 03:45:45 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:45:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:45:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:45:46 --> Total execution time: 1.2924
DEBUG - 2023-09-28 03:45:50 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:45:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:45:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:45:51 --> Total execution time: 1.2434
DEBUG - 2023-09-28 03:52:41 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:52:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:52:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:52:42 --> Total execution time: 1.4269
DEBUG - 2023-09-28 03:54:09 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:54:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:54:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:54:10 --> Total execution time: 1.2842
DEBUG - 2023-09-28 03:54:12 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 03:54:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 03:54:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 03:54:13 --> Total execution time: 1.1919
DEBUG - 2023-09-28 04:06:47 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:06:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:06:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 04:06:49 --> Query error: Unknown column 'vendedor.nome_vendedor' in 'field list' - Invalid query: SELECT `movimentos_conta`.*, `conta`.`nome_conta`, `centro_custo`.`nome_centro_custo`, `cliente`.`nome_cliente`, `fornecedor`.`nome_fornecedor`, `vendedor`.`nome_vendedor`, `conta_contabil`.`nome_conta_contabil`, `metodo_pagamento`.`nome_metodo_pagamento`, if(movimentos_conta.confirmado = 1, `movimentos_conta`.`data_confirmacao`, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) as data_titulo, `conta`.`nome_conta`, `cliente`.`nome_cliente`, `fornecedor`.`nome_fornecedor`, `usu_c`.`nome_usuario` `nome_usuario_criacao`, `usu_l`.`nome_usuario` `nome_usuario_liquidacao`
FROM `movimentos_conta`
JOIN `conta` ON `conta`.`cod_conta` = `movimentos_conta`.`cod_conta`
LEFT JOIN `centro_custo` ON `centro_custo`.`cod_centro_custo` = `movimentos_conta`.`cod_centro_custo` and `centro_custo`.`id_empresa` = 48
LEFT JOIN `conta_contabil` ON `conta_contabil`.`cod_conta_contabil` = `movimentos_conta`.`cod_conta_contabil` and `conta_contabil`.`id_empresa` = 48
LEFT JOIN `metodo_pagamento` ON `metodo_pagamento`.`cod_metodo_pagamento` = `movimentos_conta`.`cod_metodo_pagamento` and `metodo_pagamento`.`id_empresa` = 48
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `movimentos_conta`.`cod_emitente`
LEFT JOIN `fornecedor` ON `fornecedor`.`cod_fornecedor` = `movimentos_conta`.`cod_emitente`
LEFT JOIN `usuario` `usu_c` ON `usu_c`.`email` = `movimentos_conta`.`usuario_criacao`
LEFT JOIN `usuario` `usu_l` ON `usu_l`.`email` = `movimentos_conta`.`usuario_liquidacao`
WHERE `conta`.`id_empresa` = '48'
AND if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) >= '2023-09-01'
AND if(movimentos_conta.confirmado = 1, movimentos_conta.data_confirmacao, if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)) <= '2023-09-30'
ORDER BY `data_titulo` ASC, `cod_movimento_conta` ASC
DEBUG - 2023-09-28 04:07:08 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:07:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:07:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 04:07:09 --> Severity: Notice --> Undefined variable: tipoData D:\Meu Drive\Projetos Web\shopfloor\application\controllers\FinanceiroController.php 2053
DEBUG - 2023-09-28 04:07:09 --> Total execution time: 1.3615
DEBUG - 2023-09-28 04:07:28 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:07:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:07:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:07:30 --> Total execution time: 1.4294
DEBUG - 2023-09-28 04:10:00 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:10:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:10:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 04:10:01 --> Severity: Notice --> Undefined variable: tipoData D:\Meu Drive\Projetos Web\shopfloor\application\controllers\FinanceiroController.php 2053
DEBUG - 2023-09-28 04:10:01 --> Total execution time: 1.2448
DEBUG - 2023-09-28 04:10:42 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:10:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:10:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 04:10:43 --> Severity: Notice --> Undefined variable: tipoData D:\Meu Drive\Projetos Web\shopfloor\application\controllers\FinanceiroController.php 2053
DEBUG - 2023-09-28 04:10:43 --> Total execution time: 1.1709
DEBUG - 2023-09-28 04:11:11 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:11:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:11:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:11:12 --> Total execution time: 1.1959
DEBUG - 2023-09-28 04:12:12 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:12:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:12:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:12:13 --> Total execution time: 1.1909
DEBUG - 2023-09-28 04:13:33 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:13:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:13:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:13:34 --> Total execution time: 1.2425
DEBUG - 2023-09-28 04:14:51 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:14:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:14:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:14:52 --> Total execution time: 1.3031
DEBUG - 2023-09-28 04:15:00 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:15:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:15:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:15:01 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:15:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:15:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:15:04 --> Total execution time: 2.3974
DEBUG - 2023-09-28 04:15:23 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:15:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:15:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:15:24 --> Total execution time: 1.6904
DEBUG - 2023-09-28 04:15:25 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:15:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:15:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:15:28 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:15:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:15:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:15:30 --> Total execution time: 2.6318
DEBUG - 2023-09-28 04:15:42 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:15:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:15:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:15:43 --> Total execution time: 1.4533
DEBUG - 2023-09-28 04:15:45 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:15:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:15:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:15:48 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:15:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:15:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:15:50 --> Total execution time: 2.1833
DEBUG - 2023-09-28 04:16:54 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:16:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:16:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:16:56 --> Total execution time: 1.6879
DEBUG - 2023-09-28 04:16:57 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:16:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:16:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:17:00 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:17:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:17:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:17:02 --> Total execution time: 2.8595
DEBUG - 2023-09-28 04:17:14 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:17:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:17:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:17:15 --> Total execution time: 1.4547
DEBUG - 2023-09-28 04:17:18 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:17:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:17:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:17:20 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:17:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:17:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:17:22 --> Total execution time: 2.2902
DEBUG - 2023-09-28 04:18:17 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:18:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:18:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 04:18:18 --> Severity: error --> Exception: syntax error, unexpected '}', expecting end of file D:\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\lancamento-contas.php 218
DEBUG - 2023-09-28 04:18:42 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:18:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:18:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:18:44 --> Total execution time: 1.6571
DEBUG - 2023-09-28 04:22:49 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:22:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:22:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:22:51 --> Total execution time: 1.6505
DEBUG - 2023-09-28 04:23:13 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:23:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:23:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:23:14 --> Total execution time: 1.3288
DEBUG - 2023-09-28 04:24:08 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:24:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:24:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:24:09 --> Total execution time: 0.9777
DEBUG - 2023-09-28 04:24:36 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:24:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:24:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:24:37 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:24:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:24:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:24:38 --> Total execution time: 0.9504
DEBUG - 2023-09-28 04:27:03 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:27:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:27:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:27:04 --> Total execution time: 1.1156
DEBUG - 2023-09-28 04:27:53 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:27:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:27:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:27:54 --> Total execution time: 1.1052
DEBUG - 2023-09-28 04:28:05 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:28:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:28:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:28:06 --> Total execution time: 1.1065
DEBUG - 2023-09-28 04:28:44 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 04:28:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 04:28:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 04:28:45 --> Total execution time: 1.1304
DEBUG - 2023-09-28 23:10:43 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:10:43 --> No URI present. Default controller set.
DEBUG - 2023-09-28 23:10:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:10:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 23:10:44 --> Severity: error --> Exception: syntax error, unexpected '$this' (T_VARIABLE), expecting '(' D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1752
DEBUG - 2023-09-28 23:39:38 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:39:38 --> No URI present. Default controller set.
DEBUG - 2023-09-28 23:39:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:39:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 23:39:39 --> Total execution time: 1.4135
DEBUG - 2023-09-28 23:39:42 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:39:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:39:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 23:39:43 --> Total execution time: 0.9740
DEBUG - 2023-09-28 23:42:07 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:42:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:42:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 23:42:08 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:42:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:42:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 23:42:10 --> Total execution time: 1.8675
DEBUG - 2023-09-28 23:44:22 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:44:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:44:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 23:44:23 --> Total execution time: 1.3378
DEBUG - 2023-09-28 23:44:30 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:44:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:44:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 23:44:31 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1754
ERROR - 2023-09-28 23:44:31 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1754
ERROR - 2023-09-28 23:44:31 --> Severity: Notice --> Only variables should be passed by reference D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1756
ERROR - 2023-09-28 23:44:31 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1757
ERROR - 2023-09-28 23:44:31 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1760
ERROR - 2023-09-28 23:44:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '60 GROUP BY movimentos_conta.data_confirmacao                            
   ...' at line 11 - Invalid query: SELECT `tim`.`db_date` as `data`, SUM(IFNULL(movimento.entradas, 0)) as entradas, SUM(IFNULL(movimento.saidas, 0)) as saidas                           
                        from time_dimension tim
LEFT JOIN (
                            SELECT movimentos_conta.data_confirmacao as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 1 60 GROUP BY movimentos_conta.data_confirmacao                            
                            UNION 
                            SELECT if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento) as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 0 60 GROUP BY if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)
                        ) as movimento ON `movimento`.`data_fluxo` = `tim`.`db_date`
WHERE `tim`.`db_date` >= '2023-09-01'
AND `tim`.`db_date` <= '2023-09-30'
GROUP BY `tim`.`db_date`
ORDER BY `tim`.`db_date`
ERROR - 2023-09-28 23:44:31 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at D:\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) D:\Meu Drive\Projetos Web\shopfloor\system\core\Common.php 570
DEBUG - 2023-09-28 23:47:46 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:47:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:47:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 23:47:47 --> Severity: Notice --> Only variables should be passed by reference D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1756
ERROR - 2023-09-28 23:47:47 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1760
ERROR - 2023-09-28 23:47:47 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1760
ERROR - 2023-09-28 23:47:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0 GROUP BY movimentos_conta.data_confirmacao                            
    ...' at line 11 - Invalid query: SELECT `tim`.`db_date` as `data`, SUM(IFNULL(movimento.entradas, 0)) as entradas, SUM(IFNULL(movimento.saidas, 0)) as saidas                           
                        from time_dimension tim
LEFT JOIN (
                            SELECT movimentos_conta.data_confirmacao as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 1 0 GROUP BY movimentos_conta.data_confirmacao                            
                            UNION 
                            SELECT if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento) as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 0 0 GROUP BY if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)
                        ) as movimento ON `movimento`.`data_fluxo` = `tim`.`db_date`
WHERE `tim`.`db_date` >= '2023-09-01'
AND `tim`.`db_date` <= '2023-09-30'
GROUP BY `tim`.`db_date`
ORDER BY `tim`.`db_date`
DEBUG - 2023-09-28 23:48:14 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:48:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:48:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 23:48:15 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1754
ERROR - 2023-09-28 23:48:15 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1754
ERROR - 2023-09-28 23:48:15 --> Severity: Notice --> Only variables should be passed by reference D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1756
ERROR - 2023-09-28 23:48:15 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1757
ERROR - 2023-09-28 23:48:15 --> Severity: Warning --> A non-numeric value encountered D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1760
ERROR - 2023-09-28 23:48:15 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '60 GROUP BY movimentos_conta.data_confirmacao                            
   ...' at line 11 - Invalid query: SELECT `tim`.`db_date` as `data`, SUM(IFNULL(movimento.entradas, 0)) as entradas, SUM(IFNULL(movimento.saidas, 0)) as saidas                           
                        from time_dimension tim
LEFT JOIN (
                            SELECT movimentos_conta.data_confirmacao as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 1 60 GROUP BY movimentos_conta.data_confirmacao                            
                            UNION 
                            SELECT if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento) as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 0 60 GROUP BY if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)
                        ) as movimento ON `movimento`.`data_fluxo` = `tim`.`db_date`
WHERE `tim`.`db_date` >= '2023-09-01'
AND `tim`.`db_date` <= '2023-09-30'
GROUP BY `tim`.`db_date`
ORDER BY `tim`.`db_date`
ERROR - 2023-09-28 23:48:15 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at D:\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) D:\Meu Drive\Projetos Web\shopfloor\system\core\Common.php 570
DEBUG - 2023-09-28 23:54:30 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:54:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:54:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 23:54:31 --> Severity: Notice --> Only variables should be passed by reference D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1756
ERROR - 2023-09-28 23:54:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ') GROUP BY movimentos_conta.data_confirmacao                            
    ...' at line 11 - Invalid query: SELECT `tim`.`db_date` as `data`, SUM(IFNULL(movimento.entradas, 0)) as entradas, SUM(IFNULL(movimento.saidas, 0)) as saidas                           
                        from time_dimension tim
LEFT JOIN (
                            SELECT movimentos_conta.data_confirmacao as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_confirmado, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_confirmado, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 1 and(movimentos_conta.cod_conta = 60 or ) GROUP BY movimentos_conta.data_confirmacao                            
                            UNION 
                            SELECT if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento) as data_fluxo, 
                                sum(if(movimentos_conta.tipo_movimento = 1, movimentos_conta.valor_titulo, 0)) entradas,
                                sum(if(movimentos_conta.tipo_movimento = 2, movimentos_conta.valor_titulo, 0)) saidas
                            FROM movimentos_conta 
                            JOIN conta ON conta.cod_conta = movimentos_conta.cod_conta
                            where conta.id_empresa = 48
                              and conta.ativo = 1
                              and movimentos_conta.confirmado = 0 and(movimentos_conta.cod_conta = 60 or ) GROUP BY if(movimentos_conta.data_vencimento < CURRENT_DATE(), CURRENT_DATE(), movimentos_conta.data_vencimento)
                        ) as movimento ON `movimento`.`data_fluxo` = `tim`.`db_date`
WHERE `tim`.`db_date` >= '2023-09-01'
AND `tim`.`db_date` <= '2023-09-30'
GROUP BY `tim`.`db_date`
ORDER BY `tim`.`db_date`
DEBUG - 2023-09-28 23:57:27 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:57:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:57:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2023-09-28 23:57:27 --> Severity: Notice --> Only variables should be passed by reference D:\Meu Drive\Projetos Web\shopfloor\application\models\Financeiro.php 1756
DEBUG - 2023-09-28 23:57:27 --> Total execution time: 0.7641
DEBUG - 2023-09-28 23:58:57 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:58:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:58:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 23:58:58 --> Total execution time: 0.8217
DEBUG - 2023-09-28 23:59:07 --> UTF-8 Support Enabled
DEBUG - 2023-09-28 23:59:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2023-09-28 23:59:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2023-09-28 23:59:08 --> Total execution time: 0.8783
