<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2022-11-02 00:00:48 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:00:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:00:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:00:49 --> Total execution time: 1.5426
DEBUG - 2022-11-02 00:00:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:00:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:00:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:00:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:00:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:00:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:00:58 --> Total execution time: 3.0151
DEBUG - 2022-11-02 00:01:03 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:01:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:01:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:01:05 --> Total execution time: 1.5522
DEBUG - 2022-11-02 00:01:40 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:01:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:01:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:01:43 --> Total execution time: 3.1700
DEBUG - 2022-11-02 00:03:23 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:03:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:03:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:03:23 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:03:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:03:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:03:30 --> Total execution time: 6.6368
DEBUG - 2022-11-02 00:03:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:03:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:03:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 00:03:33 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 71
ERROR - 2022-11-02 00:03:33 --> Query error: Unknown column 'faturamento_pedido.cod_faturmanto_pedido' in 'where clause' - Invalid query: SELECT `movimentos_conta`.*, `conta`.`nome_conta`, `faturamento_pedido`.`cod_faturamento_pedido`, `metodo_pagamento`.`nome_metodo_pagamento`
FROM `movimentos_conta`
JOIN `faturamento_pedido` ON `faturamento_pedido`.`cod_faturamento_pedido` = `movimentos_conta`.`id_origem`
JOIN `conta` ON `conta`.`cod_conta` = `movimentos_conta`.`cod_conta`
LEFT JOIN `metodo_pagamento` ON `metodo_pagamento`.`cod_metodo_pagamento` = `movimentos_conta`.`cod_metodo_pagamento`
WHERE `faturamento_pedido`.`cod_faturmanto_pedido` IS NULL
AND `movimentos_conta`.`origem_movimento` = 3
DEBUG - 2022-11-02 00:03:38 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:03:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:03:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:03:45 --> Total execution time: 6.5257
DEBUG - 2022-11-02 00:03:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:03:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:03:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 00:03:52 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 71
DEBUG - 2022-11-02 00:03:52 --> Total execution time: 0.2567
DEBUG - 2022-11-02 00:04:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:04:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:04:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:04:16 --> Total execution time: 5.5714
DEBUG - 2022-11-02 00:04:17 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:04:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:04:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:04:24 --> Total execution time: 6.3418
DEBUG - 2022-11-02 00:04:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:04:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:04:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:04:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:04:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:04:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:04:39 --> Total execution time: 9.5988
DEBUG - 2022-11-02 00:04:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:04:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:04:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:04:43 --> Total execution time: 1.8774
DEBUG - 2022-11-02 00:04:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:04:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:04:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:04:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:04:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:04:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:05:01 --> Total execution time: 6.2320
DEBUG - 2022-11-02 00:05:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:05:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:05:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:05:29 --> Total execution time: 6.9554
DEBUG - 2022-11-02 00:05:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:05:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:05:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:05:34 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:05:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:05:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:05:50 --> Total execution time: 15.7789
DEBUG - 2022-11-02 00:05:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:05:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:05:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:05:59 --> Total execution time: 7.4878
DEBUG - 2022-11-02 00:07:16 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:07:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:07:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:07:16 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:07:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:07:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:07:21 --> Total execution time: 4.5309
DEBUG - 2022-11-02 00:07:23 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:07:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:07:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:07:23 --> Total execution time: 0.2792
DEBUG - 2022-11-02 00:07:26 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:07:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:07:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:07:26 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:07:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:07:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:07:27 --> Total execution time: 0.2940
DEBUG - 2022-11-02 00:07:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:07:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:07:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:07:29 --> Total execution time: 0.2899
DEBUG - 2022-11-02 00:07:58 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:07:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:07:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:07:58 --> Total execution time: 0.3256
DEBUG - 2022-11-02 00:09:06 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:09:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:09:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:09:10 --> Total execution time: 4.5750
DEBUG - 2022-11-02 00:09:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:09:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:09:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:09:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:09:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:09:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:09:21 --> Total execution time: 0.2728
DEBUG - 2022-11-02 00:16:39 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:16:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:16:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:16:39 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:16:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:16:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:16:43 --> Total execution time: 4.7369
DEBUG - 2022-11-02 00:16:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:16:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:16:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:16:45 --> Total execution time: 0.2595
DEBUG - 2022-11-02 00:16:49 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:16:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:16:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:16:49 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:16:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:16:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:16:49 --> Total execution time: 0.3165
DEBUG - 2022-11-02 00:16:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:16:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:16:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:16:51 --> Total execution time: 0.2955
DEBUG - 2022-11-02 00:17:01 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:17:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:17:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:17:09 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:17:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:17:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:17:09 --> Total execution time: 0.2835
DEBUG - 2022-11-02 00:17:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:17:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:17:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:17:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:17:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:17:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:17:51 --> Total execution time: 4.6286
DEBUG - 2022-11-02 00:17:53 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:17:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:17:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:17:53 --> Total execution time: 0.2326
DEBUG - 2022-11-02 00:18:03 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:18:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:18:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:18:07 --> Total execution time: 4.6335
DEBUG - 2022-11-02 00:19:14 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:15 --> Total execution time: 0.2189
DEBUG - 2022-11-02 00:19:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:18 --> Total execution time: 0.3001
DEBUG - 2022-11-02 00:19:19 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:20 --> Total execution time: 0.2825
DEBUG - 2022-11-02 00:19:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:34 --> Total execution time: 4.7203
DEBUG - 2022-11-02 00:19:37 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:37 --> Total execution time: 0.2502
DEBUG - 2022-11-02 00:19:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:42 --> Total execution time: 0.2713
DEBUG - 2022-11-02 00:19:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:46 --> Total execution time: 0.2940
DEBUG - 2022-11-02 00:19:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:19:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:19:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:19:55 --> Total execution time: 0.2999
DEBUG - 2022-11-02 00:20:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:20:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:20:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:20:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:20:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:20:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:20:16 --> Total execution time: 4.6786
DEBUG - 2022-11-02 00:20:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:20:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:20:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:20:18 --> Total execution time: 0.2455
DEBUG - 2022-11-02 00:20:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:20:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:20:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:20:23 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:20:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:20:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:20:23 --> Total execution time: 0.2990
DEBUG - 2022-11-02 00:20:24 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:20:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:20:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:20:25 --> Total execution time: 0.2803
DEBUG - 2022-11-02 00:21:14 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:21:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:21:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:21:16 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:21:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:21:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:21:16 --> Total execution time: 0.2719
DEBUG - 2022-11-02 00:22:00 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:22:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:22:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:22:00 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:22:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:22:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:22:05 --> Total execution time: 4.6878
DEBUG - 2022-11-02 00:22:07 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:22:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:22:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:22:07 --> Total execution time: 0.2196
DEBUG - 2022-11-02 00:22:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:22:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:22:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:22:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:22:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:22:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:22:10 --> Total execution time: 0.2874
DEBUG - 2022-11-02 00:28:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:28:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:28:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:28:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:28:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:28:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:28:45 --> Total execution time: 4.2748
DEBUG - 2022-11-02 00:28:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:28:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:28:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:28:47 --> Total execution time: 0.2416
DEBUG - 2022-11-02 00:28:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:28:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:28:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:28:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:28:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:28:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 00:28:51 --> Severity: error --> Exception: Call to undefined method stdClass::getNumero() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 435
DEBUG - 2022-11-02 00:28:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:28:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:28:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:28:56 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:28:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:28:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 00:28:56 --> Severity: error --> Exception: Call to undefined method stdClass::getNumero() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 435
DEBUG - 2022-11-02 00:28:59 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:28:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:28:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:03 --> Total execution time: 4.8718
DEBUG - 2022-11-02 00:29:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:29:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:29:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:29:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:29:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:22 --> Total execution time: 0.2788
DEBUG - 2022-11-02 00:29:24 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:29:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:29:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:24 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:29:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:29:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:29 --> Total execution time: 4.9202
DEBUG - 2022-11-02 00:29:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:29:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:29:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:31 --> Total execution time: 0.2414
DEBUG - 2022-11-02 00:29:34 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:29:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:29:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:34 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:29:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:29:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:34 --> Total execution time: 0.2247
DEBUG - 2022-11-02 00:29:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:29:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:29:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:29:37 --> Total execution time: 0.2419
DEBUG - 2022-11-02 00:30:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:30:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:30:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:30:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:30:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:30:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:30:09 --> Total execution time: 4.3063
DEBUG - 2022-11-02 00:31:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:31:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:31:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:31:09 --> Total execution time: 0.2466
DEBUG - 2022-11-02 00:31:13 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:31:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:31:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:31:13 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:31:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:31:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:31:13 --> Total execution time: 0.2962
DEBUG - 2022-11-02 00:31:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:31:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:31:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:31:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:31:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:31:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:31:36 --> Total execution time: 0.2253
DEBUG - 2022-11-02 00:32:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:32:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:32:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:32:12 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:32:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:32:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:32:16 --> Total execution time: 4.6829
DEBUG - 2022-11-02 00:32:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:32:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:32:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:32:18 --> Total execution time: 0.2793
DEBUG - 2022-11-02 00:32:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:32:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:32:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:32:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:32:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:32:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:32:22 --> Total execution time: 0.2982
DEBUG - 2022-11-02 00:32:23 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:32:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:32:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:32:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:32:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:32:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:32:38 --> Total execution time: 4.8498
DEBUG - 2022-11-02 00:32:43 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:32:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:32:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:32:43 --> Total execution time: 0.2556
DEBUG - 2022-11-02 00:33:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:23 --> Total execution time: 4.7200
DEBUG - 2022-11-02 00:33:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:25 --> Total execution time: 0.2583
DEBUG - 2022-11-02 00:33:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:29 --> Total execution time: 0.3102
DEBUG - 2022-11-02 00:33:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:31 --> Total execution time: 0.3042
DEBUG - 2022-11-02 00:33:42 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:42 --> Total execution time: 0.2547
DEBUG - 2022-11-02 00:33:54 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:54 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:33:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:33:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:33:59 --> Total execution time: 4.8077
DEBUG - 2022-11-02 00:40:53 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:40:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:40:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 00:40:57 --> Severity: Notice --> Undefined variable: listaConta C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\VendasController.php 788
DEBUG - 2022-11-02 00:40:57 --> Total execution time: 4.3268
DEBUG - 2022-11-02 00:41:19 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:41:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:41:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:41:25 --> Total execution time: 5.2076
DEBUG - 2022-11-02 00:45:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 00:45:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 00:45:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 00:45:33 --> Total execution time: 0.5343
DEBUG - 2022-11-02 01:46:12 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:46:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:46:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:46:12 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:46:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:46:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:46:13 --> Total execution time: 0.2133
DEBUG - 2022-11-02 01:46:14 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:46:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:46:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:46:14 --> Total execution time: 0.7169
DEBUG - 2022-11-02 01:46:16 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:46:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:46:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:46:16 --> Total execution time: 0.6654
DEBUG - 2022-11-02 01:46:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:46:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:46:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:46:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:46:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:46:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:46:47 --> Total execution time: 0.0756
DEBUG - 2022-11-02 01:46:49 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:46:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:46:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:46:49 --> Total execution time: 0.1096
DEBUG - 2022-11-02 01:46:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:46:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:46:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:46:51 --> Total execution time: 0.1731
DEBUG - 2022-11-02 01:47:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:47:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:47:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:47:33 --> Total execution time: 0.1013
DEBUG - 2022-11-02 01:47:38 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:47:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:47:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:47:38 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:47:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:47:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:47:38 --> Total execution time: 0.1377
DEBUG - 2022-11-02 01:49:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:49:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:49:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:49:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:49:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:49:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:49:47 --> Total execution time: 0.1943
DEBUG - 2022-11-02 01:55:17 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:55:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:55:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:55:17 --> Total execution time: 0.1150
DEBUG - 2022-11-02 01:55:24 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:55:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:55:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:55:24 --> Total execution time: 0.1099
DEBUG - 2022-11-02 01:56:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:33 --> Total execution time: 0.1575
DEBUG - 2022-11-02 01:56:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:36 --> Total execution time: 0.1067
DEBUG - 2022-11-02 01:56:39 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:39 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:39 --> Total execution time: 0.1443
DEBUG - 2022-11-02 01:56:42 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:42 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:42 --> Total execution time: 0.1113
DEBUG - 2022-11-02 01:56:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:45 --> Total execution time: 0.1421
DEBUG - 2022-11-02 01:56:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 01:56:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 01:56:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 01:56:47 --> Total execution time: 0.1181
DEBUG - 2022-11-02 02:11:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:11:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:11:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:11:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:11:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:11:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:11:47 --> Total execution time: 0.0994
DEBUG - 2022-11-02 02:12:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:12:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:12:33 --> Total execution time: 0.0761
DEBUG - 2022-11-02 02:12:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:12:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:12:36 --> Total execution time: 0.0679
DEBUG - 2022-11-02 02:12:48 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:12:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:12:48 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:12:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:12:48 --> Total execution time: 0.0657
DEBUG - 2022-11-02 02:12:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:12:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:12:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:12:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:12:51 --> Total execution time: 0.0703
DEBUG - 2022-11-02 02:12:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:12:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:12:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:12:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:12:55 --> Total execution time: 0.0704
DEBUG - 2022-11-02 02:12:59 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:12:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:13:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:13:00 --> Total execution time: 0.0798
DEBUG - 2022-11-02 02:13:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:13:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:13:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:13:35 --> Total execution time: 0.0709
DEBUG - 2022-11-02 02:14:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:14:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:14:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:14:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:14:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:14:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:14:05 --> Total execution time: 0.1638
DEBUG - 2022-11-02 02:14:07 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:14:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:14:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:14:07 --> Total execution time: 0.1045
DEBUG - 2022-11-02 02:14:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:14:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:14:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:14:28 --> Total execution time: 0.1137
DEBUG - 2022-11-02 02:16:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:16:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:16:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:16:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:16:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:16:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:16:20 --> Total execution time: 0.0818
DEBUG - 2022-11-02 02:16:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:16:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:16:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:16:22 --> Total execution time: 0.0712
DEBUG - 2022-11-02 02:16:26 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:16:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:16:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:16:26 --> Total execution time: 0.0764
DEBUG - 2022-11-02 02:16:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:16:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:16:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:16:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:16:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:16:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:16:36 --> Total execution time: 0.0734
DEBUG - 2022-11-02 02:16:40 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:16:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:16:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:16:40 --> Total execution time: 0.0814
DEBUG - 2022-11-02 02:17:58 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:17:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:17:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:17:58 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:17:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:17:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:17:58 --> Total execution time: 0.0810
DEBUG - 2022-11-02 02:17:59 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:17:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:17:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:17:59 --> Total execution time: 0.0696
DEBUG - 2022-11-02 02:18:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:18:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:18:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:18:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:18:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:18:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:18:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:18:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:18:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:18:05 --> Total execution time: 0.0734
DEBUG - 2022-11-02 02:18:07 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:18:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:18:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:18:07 --> Total execution time: 0.0864
DEBUG - 2022-11-02 02:20:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:20:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 02:20:20 --> Severity: Notice --> Undefined variable: numOrdemProducao C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 483
DEBUG - 2022-11-02 02:20:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:20:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:20:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:20:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:20:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:20:21 --> Total execution time: 0.2535
DEBUG - 2022-11-02 02:20:30 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:20:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:20:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:20:30 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:20:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:20:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:20:30 --> Total execution time: 0.0669
DEBUG - 2022-11-02 02:20:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:20:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:20:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:20:31 --> Total execution time: 0.0651
DEBUG - 2022-11-02 02:20:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:20:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:20:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:20:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:20:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:20:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:20:33 --> Total execution time: 0.0760
DEBUG - 2022-11-02 02:22:07 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:07 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:07 --> Total execution time: 0.0870
DEBUG - 2022-11-02 02:22:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:11 --> Total execution time: 0.0721
DEBUG - 2022-11-02 02:22:13 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:13 --> Total execution time: 0.1695
DEBUG - 2022-11-02 02:22:15 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:15 --> Total execution time: 0.0821
DEBUG - 2022-11-02 02:22:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:20 --> Total execution time: 0.0836
DEBUG - 2022-11-02 02:22:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:22:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:22:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:22:22 --> Total execution time: 0.0853
DEBUG - 2022-11-02 02:25:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:25:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:25:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:25:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:25:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:25:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:25:33 --> Total execution time: 0.1552
DEBUG - 2022-11-02 02:25:42 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:25:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:25:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:25:42 --> Total execution time: 0.1090
DEBUG - 2022-11-02 02:26:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:26:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:26:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:26:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:26:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:26:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:26:20 --> Total execution time: 0.1163
DEBUG - 2022-11-02 02:26:26 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:26:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:26:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:26:26 --> Total execution time: 0.0870
DEBUG - 2022-11-02 02:26:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:26:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:26:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:26:30 --> Total execution time: 0.0916
DEBUG - 2022-11-02 02:26:44 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:26:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:26:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:26:44 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 02:26:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 02:26:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 02:26:44 --> Total execution time: 0.1125
DEBUG - 2022-11-02 03:04:09 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:10 --> Total execution time: 0.0687
DEBUG - 2022-11-02 03:04:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:18 --> Total execution time: 0.0993
DEBUG - 2022-11-02 03:04:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:25 --> Total execution time: 0.0740
DEBUG - 2022-11-02 03:04:38 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:38 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:38 --> Total execution time: 0.0776
DEBUG - 2022-11-02 03:04:40 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:40 --> Total execution time: 0.0840
DEBUG - 2022-11-02 03:04:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:50 --> Total execution time: 0.0953
DEBUG - 2022-11-02 03:04:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:52 --> Total execution time: 0.0802
DEBUG - 2022-11-02 03:04:57 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:04:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:04:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:04:57 --> Total execution time: 0.0614
DEBUG - 2022-11-02 03:06:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:06:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:06:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:06:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:06:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:06:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:06:02 --> Total execution time: 0.0950
DEBUG - 2022-11-02 03:06:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:06:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:06:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:06:05 --> Total execution time: 0.1209
DEBUG - 2022-11-02 03:09:06 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:09:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:09:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:09:06 --> Total execution time: 0.1103
DEBUG - 2022-11-02 03:09:34 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:09:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:09:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:09:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:09:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:09:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:09:35 --> Total execution time: 0.0796
DEBUG - 2022-11-02 03:10:09 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:10:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:10:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:10:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:10:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:10:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:10:10 --> Total execution time: 0.1307
DEBUG - 2022-11-02 03:10:14 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:10:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:10:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:10:14 --> Total execution time: 0.0742
DEBUG - 2022-11-02 03:10:16 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:10:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:10:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:10:17 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:10:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:10:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:10:17 --> Total execution time: 0.1069
DEBUG - 2022-11-02 03:10:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:10:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:10:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:10:18 --> Total execution time: 0.1028
DEBUG - 2022-11-02 03:10:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:10:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:10:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:10:25 --> Total execution time: 0.1013
DEBUG - 2022-11-02 03:13:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:13:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:13:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:13:28 --> Total execution time: 0.0928
DEBUG - 2022-11-02 03:13:39 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:13:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:13:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:13:39 --> Total execution time: 0.1036
DEBUG - 2022-11-02 03:13:49 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:13:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:13:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:13:49 --> Total execution time: 0.1136
DEBUG - 2022-11-02 03:15:43 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:15:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:15:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:15:43 --> Total execution time: 0.1110
DEBUG - 2022-11-02 03:15:56 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:15:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:15:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:15:56 --> Total execution time: 0.0870
DEBUG - 2022-11-02 03:16:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:16:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:16:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:16:03 --> Total execution time: 0.1290
DEBUG - 2022-11-02 03:16:14 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:16:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:16:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:16:14 --> Total execution time: 0.1165
DEBUG - 2022-11-02 03:16:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:16:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:16:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:16:33 --> Total execution time: 0.1118
DEBUG - 2022-11-02 03:17:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:17:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:17:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:17:22 --> Total execution time: 0.1129
DEBUG - 2022-11-02 03:17:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:17:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:17:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:17:46 --> Total execution time: 0.0856
DEBUG - 2022-11-02 03:19:39 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:19:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:19:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:19:39 --> Total execution time: 0.1102
DEBUG - 2022-11-02 03:19:44 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:19:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:19:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:19:44 --> Total execution time: 0.0945
DEBUG - 2022-11-02 03:19:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:19:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:19:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:19:45 --> Total execution time: 0.0917
DEBUG - 2022-11-02 03:19:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:19:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:19:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:19:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:19:50 --> No URI present. Default controller set.
DEBUG - 2022-11-02 03:19:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:19:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:19:50 --> Total execution time: 0.0650
DEBUG - 2022-11-02 03:19:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:19:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:19:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:19:51 --> Total execution time: 0.0921
DEBUG - 2022-11-02 03:19:57 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:19:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:19:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:19:58 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:19:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:19:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:19:58 --> Total execution time: 0.1297
DEBUG - 2022-11-02 03:20:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:03 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:03 --> Total execution time: 0.1020
DEBUG - 2022-11-02 03:20:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:05 --> Total execution time: 0.0780
DEBUG - 2022-11-02 03:20:07 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:07 --> Total execution time: 0.0765
DEBUG - 2022-11-02 03:20:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:08 --> Total execution time: 0.0864
DEBUG - 2022-11-02 03:20:09 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:09 --> Total execution time: 0.0981
DEBUG - 2022-11-02 03:20:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:10 --> Total execution time: 0.0982
DEBUG - 2022-11-02 03:20:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:11 --> Total execution time: 0.0994
DEBUG - 2022-11-02 03:20:12 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:12 --> Total execution time: 0.0768
DEBUG - 2022-11-02 03:20:13 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:13 --> Total execution time: 0.0849
DEBUG - 2022-11-02 03:20:13 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:14 --> Total execution time: 0.0931
DEBUG - 2022-11-02 03:20:15 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:15 --> Total execution time: 0.0901
DEBUG - 2022-11-02 03:20:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:18 --> No URI present. Default controller set.
DEBUG - 2022-11-02 03:20:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:18 --> Total execution time: 0.0842
DEBUG - 2022-11-02 03:20:19 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:19 --> Total execution time: 0.0545
DEBUG - 2022-11-02 03:20:27 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:27 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:27 --> Total execution time: 0.1642
DEBUG - 2022-11-02 03:20:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:29 --> Total execution time: 0.1027
DEBUG - 2022-11-02 03:20:30 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:30 --> Total execution time: 0.0938
DEBUG - 2022-11-02 03:20:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:31 --> Total execution time: 0.1182
DEBUG - 2022-11-02 03:20:32 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:32 --> Total execution time: 0.1185
DEBUG - 2022-11-02 03:20:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:33 --> Total execution time: 0.1105
DEBUG - 2022-11-02 03:20:34 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:34 --> Total execution time: 0.1272
DEBUG - 2022-11-02 03:20:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:35 --> Total execution time: 0.1288
DEBUG - 2022-11-02 03:20:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:36 --> Total execution time: 0.1183
DEBUG - 2022-11-02 03:20:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:42 --> Total execution time: 0.2006
DEBUG - 2022-11-02 03:20:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:50 --> Total execution time: 0.1097
DEBUG - 2022-11-02 03:20:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:52 --> Total execution time: 0.0796
DEBUG - 2022-11-02 03:20:56 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:56 --> Total execution time: 0.0781
DEBUG - 2022-11-02 03:20:58 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:20:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:20:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:20:58 --> Total execution time: 0.0937
DEBUG - 2022-11-02 03:21:01 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:21:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:21:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:21:01 --> Total execution time: 0.0700
DEBUG - 2022-11-02 03:21:04 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:21:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:21:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:21:04 --> Total execution time: 0.0984
DEBUG - 2022-11-02 03:21:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:21:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:21:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:21:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:21:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:21:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:21:18 --> Total execution time: 0.0636
DEBUG - 2022-11-02 03:21:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:21:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:21:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:21:21 --> Total execution time: 0.1635
DEBUG - 2022-11-02 03:22:01 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:22:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:22:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:22:01 --> Total execution time: 0.1170
DEBUG - 2022-11-02 03:22:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:22:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:22:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:22:21 --> Total execution time: 0.1043
DEBUG - 2022-11-02 03:22:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:22:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:22:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:22:22 --> Total execution time: 0.0851
DEBUG - 2022-11-02 03:22:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:22:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:22:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:22:29 --> Total execution time: 0.1234
DEBUG - 2022-11-02 03:22:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:22:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:22:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:22:41 --> Total execution time: 0.0875
DEBUG - 2022-11-02 03:24:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:24:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:24:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:24:46 --> Total execution time: 0.1098
DEBUG - 2022-11-02 03:25:38 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:25:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:25:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:25:38 --> Total execution time: 0.1092
DEBUG - 2022-11-02 03:26:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:26:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:26:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:26:10 --> Total execution time: 0.1248
DEBUG - 2022-11-02 03:26:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:26:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:26:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:26:20 --> Total execution time: 0.0980
DEBUG - 2022-11-02 03:26:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:26:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:26:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:26:31 --> Total execution time: 0.1099
DEBUG - 2022-11-02 03:26:32 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:26:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:26:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:26:32 --> Total execution time: 0.0920
DEBUG - 2022-11-02 03:26:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:26:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:26:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:26:33 --> Total execution time: 0.1122
DEBUG - 2022-11-02 03:26:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:26:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:26:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:26:35 --> Total execution time: 0.0936
DEBUG - 2022-11-02 03:27:00 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:27:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:27:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:27:00 --> Total execution time: 0.1117
DEBUG - 2022-11-02 03:27:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:27:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:27:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:27:10 --> Total execution time: 0.0944
DEBUG - 2022-11-02 03:27:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:27:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:27:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:27:47 --> Total execution time: 0.1011
DEBUG - 2022-11-02 03:28:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:28:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:28:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:28:21 --> Total execution time: 0.1171
DEBUG - 2022-11-02 03:28:24 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:28:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:28:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:28:24 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:28:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:28:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:28:24 --> Total execution time: 0.1588
DEBUG - 2022-11-02 03:28:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:28:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:28:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:28:47 --> Total execution time: 0.0813
DEBUG - 2022-11-02 03:29:13 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:29:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:29:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:29:13 --> Total execution time: 0.1197
DEBUG - 2022-11-02 03:31:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:31:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:31:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:31:52 --> Total execution time: 0.1069
DEBUG - 2022-11-02 03:33:34 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:33:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:33:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:33:34 --> Total execution time: 0.1238
DEBUG - 2022-11-02 03:34:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:34:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:34:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:34:46 --> Total execution time: 0.1131
DEBUG - 2022-11-02 03:35:26 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:35:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:35:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:35:26 --> Total execution time: 0.1126
DEBUG - 2022-11-02 03:35:56 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:35:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:35:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:35:56 --> Total execution time: 0.1177
DEBUG - 2022-11-02 03:36:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:36:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:36:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:36:05 --> Total execution time: 0.1076
DEBUG - 2022-11-02 03:37:19 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:37:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:37:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:37:19 --> Total execution time: 0.1065
DEBUG - 2022-11-02 03:37:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:37:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:37:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:37:31 --> Total execution time: 0.0992
DEBUG - 2022-11-02 03:42:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:42:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:42:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:42:37 --> Total execution time: 0.1067
DEBUG - 2022-11-02 03:43:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:43:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:43:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:43:41 --> Total execution time: 0.0907
DEBUG - 2022-11-02 03:44:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:44:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:44:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:44:31 --> Total execution time: 0.1175
DEBUG - 2022-11-02 03:46:54 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:46:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:46:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:46:54 --> Total execution time: 0.0934
DEBUG - 2022-11-02 03:47:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:47:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:47:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Undefined variable: produto C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
ERROR - 2022-11-02 03:47:31 --> Severity: Notice --> Trying to get property 'color' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\producao\producao.php 324
DEBUG - 2022-11-02 03:47:31 --> Total execution time: 0.5712
DEBUG - 2022-11-02 03:48:10 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:48:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:48:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:48:10 --> Total execution time: 0.0942
DEBUG - 2022-11-02 03:51:37 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:51:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:51:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:51:37 --> Total execution time: 0.0969
DEBUG - 2022-11-02 03:51:39 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:51:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:51:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:51:39 --> Total execution time: 0.0931
DEBUG - 2022-11-02 03:51:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:51:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:51:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:51:41 --> Total execution time: 0.0988
DEBUG - 2022-11-02 03:51:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:51:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:51:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:51:45 --> Total execution time: 0.1555
DEBUG - 2022-11-02 03:52:58 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:52:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:52:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 03:52:59 --> Severity: error --> Exception: Call to undefined function ptint_r() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1238
DEBUG - 2022-11-02 03:53:09 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:53:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:53:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:53:10 --> Total execution time: 0.0931
DEBUG - 2022-11-02 03:56:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:56:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:56:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
ERROR - 2022-11-02 03:56:33 --> Severity: Warning --> A non-numeric value encountered C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1236
DEBUG - 2022-11-02 03:56:33 --> Total execution time: 0.1309
DEBUG - 2022-11-02 03:56:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:56:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:56:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:56:52 --> Total execution time: 0.1594
DEBUG - 2022-11-02 03:57:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:57:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:57:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:57:20 --> Total execution time: 0.1031
DEBUG - 2022-11-02 03:58:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:58:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:58:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 03:58:21 --> Severity: Notice --> Undefined variable: color C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1357
ERROR - 2022-11-02 03:58:21 --> Severity: Notice --> Undefined variable: color C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1357
ERROR - 2022-11-02 03:58:21 --> Severity: Notice --> Undefined variable: color C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1357
ERROR - 2022-11-02 03:58:21 --> Severity: Notice --> Undefined variable: color C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1357
ERROR - 2022-11-02 03:58:21 --> Severity: Notice --> Undefined variable: color C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\ProducaoController.php 1357
DEBUG - 2022-11-02 03:58:21 --> Total execution time: 0.1034
DEBUG - 2022-11-02 03:58:56 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 03:58:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 03:58:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 03:58:56 --> Total execution time: 0.0912
DEBUG - 2022-11-02 04:00:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:00:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:00:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:00:02 --> Total execution time: 0.1039
DEBUG - 2022-11-02 04:01:07 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:01:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:01:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:01:07 --> Total execution time: 0.1020
DEBUG - 2022-11-02 04:01:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:01:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:01:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:01:36 --> Total execution time: 0.0896
DEBUG - 2022-11-02 04:02:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:02:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:02:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:02:51 --> Total execution time: 0.1022
DEBUG - 2022-11-02 04:04:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:04:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:04:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:04:31 --> Total execution time: 0.1185
DEBUG - 2022-11-02 04:05:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:05:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:05:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:05:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:05:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:05:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:05:41 --> Total execution time: 0.1021
DEBUG - 2022-11-02 04:05:43 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:05:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:05:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:05:43 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:05:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:05:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:05:43 --> Total execution time: 0.1111
DEBUG - 2022-11-02 04:05:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:05:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:05:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:05:45 --> Total execution time: 0.0879
DEBUG - 2022-11-02 04:08:23 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:08:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:08:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:08:23 --> Total execution time: 0.0893
DEBUG - 2022-11-02 04:08:41 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:08:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:08:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:08:41 --> Total execution time: 0.1297
DEBUG - 2022-11-02 04:08:42 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:08:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:08:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:08:42 --> Total execution time: 0.0851
DEBUG - 2022-11-02 04:08:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:08:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:08:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:08:55 --> Total execution time: 0.0920
DEBUG - 2022-11-02 04:11:31 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:11:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:11:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:11:31 --> Total execution time: 0.1165
DEBUG - 2022-11-02 04:11:32 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:11:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:11:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:11:32 --> Total execution time: 0.1248
DEBUG - 2022-11-02 04:11:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:11:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:11:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:11:33 --> Total execution time: 0.0918
DEBUG - 2022-11-02 04:11:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:11:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:11:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:11:53 --> Total execution time: 0.1119
DEBUG - 2022-11-02 04:14:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:14:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:14:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:14:28 --> Total execution time: 0.1166
DEBUG - 2022-11-02 04:18:57 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:18:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:18:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:18:57 --> Total execution time: 0.1247
DEBUG - 2022-11-02 04:19:13 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:19:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:19:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:19:13 --> Total execution time: 0.0884
DEBUG - 2022-11-02 04:20:17 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:20:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:20:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:20:17 --> Total execution time: 0.0875
DEBUG - 2022-11-02 04:20:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:20:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:20:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:20:35 --> Total execution time: 0.0833
DEBUG - 2022-11-02 04:20:53 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:20:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:20:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:20:53 --> Total execution time: 0.0910
DEBUG - 2022-11-02 04:22:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:22:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:22:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:22:11 --> Total execution time: 0.1029
DEBUG - 2022-11-02 04:22:43 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:22:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:22:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:22:43 --> Total execution time: 0.0961
DEBUG - 2022-11-02 04:22:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:22:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:22:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:22:55 --> Total execution time: 0.1018
DEBUG - 2022-11-02 04:23:15 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:23:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:23:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:23:15 --> Total execution time: 0.1206
DEBUG - 2022-11-02 04:23:38 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:23:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:23:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:23:38 --> Total execution time: 0.0856
DEBUG - 2022-11-02 04:23:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:23:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:23:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:23:47 --> Total execution time: 0.0956
DEBUG - 2022-11-02 04:23:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:23:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:23:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:23:55 --> Total execution time: 0.1075
DEBUG - 2022-11-02 04:30:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:30:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:30:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:30:11 --> Total execution time: 0.1019
DEBUG - 2022-11-02 04:30:53 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:30:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:30:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:30:53 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:30:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:30:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:30:53 --> Total execution time: 0.0859
DEBUG - 2022-11-02 04:30:54 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:30:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:30:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:30:54 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:30:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:30:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:30:55 --> Total execution time: 0.1311
DEBUG - 2022-11-02 04:31:09 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:31:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:31:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:31:09 --> Total execution time: 0.6112
DEBUG - 2022-11-02 04:31:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:31:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:31:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:31:12 --> Total execution time: 0.4601
DEBUG - 2022-11-02 04:31:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:31:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:31:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:31:23 --> Total execution time: 0.5044
DEBUG - 2022-11-02 04:31:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:31:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:31:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:31:37 --> Total execution time: 0.4767
DEBUG - 2022-11-02 04:31:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:31:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:31:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:31:52 --> Total execution time: 0.0941
DEBUG - 2022-11-02 04:33:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:33:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:33:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:33:29 --> Total execution time: 0.0930
DEBUG - 2022-11-02 04:33:55 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:33:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:33:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:33:55 --> Total execution time: 0.1020
DEBUG - 2022-11-02 04:34:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:34:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:34:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:34:08 --> Total execution time: 0.0877
DEBUG - 2022-11-02 04:36:22 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:36:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:36:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:36:22 --> Total execution time: 0.1158
DEBUG - 2022-11-02 04:36:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:36:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:36:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:36:52 --> Total execution time: 0.0960
DEBUG - 2022-11-02 04:47:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:47:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:47:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:47:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:47:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:47:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:47:08 --> Total execution time: 0.1541
DEBUG - 2022-11-02 04:48:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:48:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:48:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:48:25 --> Total execution time: 0.0807
DEBUG - 2022-11-02 04:48:56 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:48:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:48:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:48:56 --> Total execution time: 0.1058
DEBUG - 2022-11-02 04:52:54 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:52:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:52:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:52:54 --> Total execution time: 0.0964
DEBUG - 2022-11-02 04:53:06 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:53:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:53:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:53:06 --> Total execution time: 0.0976
DEBUG - 2022-11-02 04:54:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:54:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:54:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:54:35 --> Total execution time: 0.0811
DEBUG - 2022-11-02 04:54:57 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:54:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:54:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:54:58 --> Total execution time: 0.1044
DEBUG - 2022-11-02 04:57:06 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:57:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:57:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:57:06 --> Total execution time: 0.1145
DEBUG - 2022-11-02 04:57:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:57:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:57:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:57:08 --> Total execution time: 0.1110
DEBUG - 2022-11-02 04:57:53 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:57:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:57:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:57:53 --> Total execution time: 0.1094
DEBUG - 2022-11-02 04:58:09 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:58:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:58:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:58:09 --> Total execution time: 0.0926
DEBUG - 2022-11-02 04:58:11 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:58:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:58:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:58:11 --> Total execution time: 0.0812
DEBUG - 2022-11-02 04:58:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:58:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:58:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:58:20 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:58:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:58:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:58:20 --> Total execution time: 0.1234
DEBUG - 2022-11-02 04:58:23 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:58:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:58:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:58:24 --> Total execution time: 0.8552
DEBUG - 2022-11-02 04:58:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:58:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:58:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:58:26 --> Total execution time: 0.4607
DEBUG - 2022-11-02 04:58:59 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:58:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:58:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:58:59 --> Total execution time: 0.0827
DEBUG - 2022-11-02 04:59:16 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:59:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:59:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:59:16 --> Total execution time: 0.1036
DEBUG - 2022-11-02 04:59:36 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 04:59:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 04:59:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 04:59:36 --> Total execution time: 0.1152
DEBUG - 2022-11-02 05:03:27 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:03:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:03:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:03:27 --> Total execution time: 0.1050
DEBUG - 2022-11-02 05:04:16 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:04:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:04:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:04:17 --> Total execution time: 0.0918
DEBUG - 2022-11-02 05:06:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:06:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:06:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:06:25 --> Total execution time: 0.0860
DEBUG - 2022-11-02 05:06:27 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:06:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:06:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:06:27 --> Total execution time: 0.1035
DEBUG - 2022-11-02 05:06:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:06:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:06:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:06:29 --> Total execution time: 0.0930
DEBUG - 2022-11-02 05:23:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:23:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:23:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:23:28 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:23:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:23:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 96
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 96
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 112
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 112
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 113
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 113
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 115
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 115
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 96
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 96
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 112
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 112
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 113
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 113
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 115
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 115
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 96
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 96
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 112
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 112
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 113
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 113
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 115
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 115
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 96
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 96
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 112
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 112
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 113
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 113
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_entrada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 115
ERROR - 2022-11-02 05:23:28 --> Severity: Notice --> Undefined property: stdClass::$proj_saida C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 115
DEBUG - 2022-11-02 05:23:28 --> Total execution time: 0.2527
DEBUG - 2022-11-02 05:24:48 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:24:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:24:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Undefined property: stdClass::$saldo_contas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 95
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Undefined property: stdClass::$saldo_contas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 97
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Undefined property: stdClass::$saldo_contas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 103
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Undefined variable: titulos_pendente C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 103
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Trying to get property 'entradas' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 103
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Undefined variable: titulos_pendente C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 103
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Trying to get property 'saidas' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 103
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Undefined property: stdClass::$saldo_contas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 105
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Undefined variable: titulos_pendente C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 105
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Trying to get property 'entradas' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 105
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Undefined variable: titulos_pendente C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 105
ERROR - 2022-11-02 05:24:48 --> Severity: Notice --> Trying to get property 'saidas' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-pagar.php 105
DEBUG - 2022-11-02 05:24:48 --> Total execution time: 0.1553
DEBUG - 2022-11-02 05:25:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:25:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:25:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:25:25 --> Total execution time: 0.0898
DEBUG - 2022-11-02 05:26:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:26:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:26:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:26:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:26:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:26:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-11-02 05:26:08 --> Severity: Notice --> Undefined variable: saldoConfirTotal C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-receber.php 96
ERROR - 2022-11-02 05:26:08 --> Severity: Notice --> Undefined variable: saldoConfirTotal C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-receber.php 99
ERROR - 2022-11-02 05:26:08 --> Severity: Notice --> Undefined variable: saldoProjTotal C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-receber.php 103
ERROR - 2022-11-02 05:26:08 --> Severity: Notice --> Undefined variable: saldoProjTotal C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\financeiro\contas-receber.php 106
DEBUG - 2022-11-02 05:26:08 --> Total execution time: 0.1130
DEBUG - 2022-11-02 05:26:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 05:26:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 05:26:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 05:26:18 --> Total execution time: 0.0935
DEBUG - 2022-11-02 16:06:15 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:06:15 --> No URI present. Default controller set.
DEBUG - 2022-11-02 16:06:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:06:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:06:15 --> Total execution time: 0.2047
DEBUG - 2022-11-02 16:06:16 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:06:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:06:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:06:16 --> Total execution time: 0.0798
DEBUG - 2022-11-02 16:06:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:06:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:06:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:06:21 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:06:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:06:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:06:22 --> Total execution time: 0.2622
DEBUG - 2022-11-02 16:06:23 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:06:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:06:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:06:24 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:06:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:06:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:06:24 --> Total execution time: 0.1012
DEBUG - 2022-11-02 16:06:25 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:06:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:06:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:06:25 --> Total execution time: 0.0896
DEBUG - 2022-11-02 16:06:27 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:06:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:06:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:06:27 --> Total execution time: 0.2044
DEBUG - 2022-11-02 16:07:01 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:07:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:07:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:07:01 --> Total execution time: 0.1424
DEBUG - 2022-11-02 16:10:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:10:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:10:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:10:46 --> Total execution time: 0.1408
DEBUG - 2022-11-02 16:10:48 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:10:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:10:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:10:48 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:10:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:10:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:10:48 --> Total execution time: 0.0959
DEBUG - 2022-11-02 16:10:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:10:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:10:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:10:50 --> Total execution time: 0.0874
DEBUG - 2022-11-02 16:10:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:10:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:10:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:10:51 --> Total execution time: 0.0723
DEBUG - 2022-11-02 16:10:52 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:10:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:10:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:10:52 --> Total execution time: 0.1963
DEBUG - 2022-11-02 16:11:09 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:11:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:11:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:11:09 --> Total execution time: 0.1149
DEBUG - 2022-11-02 16:11:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:11:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:11:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:11:51 --> Total execution time: 0.1137
DEBUG - 2022-11-02 16:13:17 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:13:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:13:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:13:17 --> Total execution time: 0.1846
DEBUG - 2022-11-02 16:23:58 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:23:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:23:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:23:58 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:23:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:23:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:23:58 --> Total execution time: 0.0885
DEBUG - 2022-11-02 16:24:00 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:00 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:00 --> Total execution time: 0.0922
DEBUG - 2022-11-02 16:24:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:02 --> Total execution time: 0.0946
DEBUG - 2022-11-02 16:24:04 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:04 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:04 --> Total execution time: 0.0886
DEBUG - 2022-11-02 16:24:06 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:06 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:06 --> Total execution time: 0.0873
DEBUG - 2022-11-02 16:24:48 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:48 --> Total execution time: 0.0843
DEBUG - 2022-11-02 16:24:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:24:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:24:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:24:51 --> Total execution time: 0.0899
DEBUG - 2022-11-02 16:25:30 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:25:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:25:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:25:30 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:25:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:25:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:25:30 --> Total execution time: 0.1244
DEBUG - 2022-11-02 16:25:32 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:25:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:25:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:25:32 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:25:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:25:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:25:32 --> Total execution time: 0.0918
DEBUG - 2022-11-02 16:25:34 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:25:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:25:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:25:34 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:25:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:25:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:25:34 --> Total execution time: 0.0756
DEBUG - 2022-11-02 16:25:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:25:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:25:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:25:35 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 16:25:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 16:25:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 16:25:35 --> Total execution time: 0.0856
DEBUG - 2022-11-02 17:54:43 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 17:54:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 17:54:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 17:54:43 --> Total execution time: 0.3404
DEBUG - 2022-11-02 17:56:19 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 17:56:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 17:56:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 17:56:19 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 17:56:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 17:56:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 17:56:19 --> Total execution time: 0.0489
DEBUG - 2022-11-02 17:56:37 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 17:56:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 17:56:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 17:56:37 --> Total execution time: 0.1295
DEBUG - 2022-11-02 17:58:00 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 17:58:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 17:58:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 17:58:01 --> Total execution time: 0.1474
DEBUG - 2022-11-02 17:58:03 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 17:58:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 17:58:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 17:58:04 --> Total execution time: 0.1309
DEBUG - 2022-11-02 17:58:24 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 17:58:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 17:58:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 17:58:25 --> Total execution time: 0.1290
DEBUG - 2022-11-02 19:02:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 19:02:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 19:02:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 19:02:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 19:02:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 19:02:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 19:02:46 --> Total execution time: 0.0587
DEBUG - 2022-11-02 22:52:32 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:52:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:52:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:52:32 --> Total execution time: 0.2876
DEBUG - 2022-11-02 22:52:37 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:52:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:52:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:52:37 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:52:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:52:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:52:37 --> Total execution time: 0.2583
DEBUG - 2022-11-02 22:52:40 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:52:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:52:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:52:40 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:52:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:52:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:52:40 --> Total execution time: 0.0967
DEBUG - 2022-11-02 22:52:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:52:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:52:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:52:45 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:52:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:52:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:52:45 --> Total execution time: 0.1410
DEBUG - 2022-11-02 22:52:47 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:52:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:52:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:52:47 --> Total execution time: 0.6839
DEBUG - 2022-11-02 22:53:49 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:53:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:53:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:53:49 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:53:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:53:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:53:49 --> Total execution time: 0.0922
DEBUG - 2022-11-02 22:54:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:54:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:54:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:54:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:54:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:54:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:54:02 --> Total execution time: 0.0732
DEBUG - 2022-11-02 22:54:03 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:54:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:54:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:54:03 --> Total execution time: 0.1012
DEBUG - 2022-11-02 22:55:29 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:55:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:55:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:55:29 --> Total execution time: 0.0733
DEBUG - 2022-11-02 22:55:33 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:55:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:55:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:55:33 --> Total execution time: 0.0817
DEBUG - 2022-11-02 22:55:40 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:55:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:55:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:55:40 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:55:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:55:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:55:40 --> Total execution time: 0.0646
DEBUG - 2022-11-02 22:56:00 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:00 --> Total execution time: 0.0797
DEBUG - 2022-11-02 22:56:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:05 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:05 --> Total execution time: 0.0695
DEBUG - 2022-11-02 22:56:07 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:07 --> Total execution time: 0.0633
DEBUG - 2022-11-02 22:56:08 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:09 --> Total execution time: 0.0918
DEBUG - 2022-11-02 22:56:42 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:42 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:42 --> Total execution time: 0.2208
DEBUG - 2022-11-02 22:56:44 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:44 --> Total execution time: 0.1186
DEBUG - 2022-11-02 22:56:46 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:56:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:56:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:56:46 --> Total execution time: 0.1511
DEBUG - 2022-11-02 22:57:14 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:57:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:57:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:57:14 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:57:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:57:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:57:14 --> Total execution time: 0.0995
DEBUG - 2022-11-02 22:57:15 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 22:57:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 22:57:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 22:57:15 --> Total execution time: 0.1082
DEBUG - 2022-11-02 23:21:43 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:21:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:21:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:21:43 --> Total execution time: 0.2612
DEBUG - 2022-11-02 23:24:30 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:24:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:24:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:24:30 --> Total execution time: 0.1089
DEBUG - 2022-11-02 23:24:50 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:24:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:24:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:24:50 --> Total execution time: 0.1051
DEBUG - 2022-11-02 23:25:56 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:25:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:25:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:25:56 --> Total execution time: 0.0944
DEBUG - 2022-11-02 23:26:02 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:26:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:26:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:26:02 --> Total execution time: 0.0817
DEBUG - 2022-11-02 23:26:18 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:26:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:26:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:26:18 --> Total execution time: 0.0859
DEBUG - 2022-11-02 23:26:51 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:26:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:26:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:26:51 --> Total execution time: 0.0772
DEBUG - 2022-11-02 23:27:04 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:27:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:27:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:27:04 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:27:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:27:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:27:04 --> Total execution time: 0.1156
DEBUG - 2022-11-02 23:31:39 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:31:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:31:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:31:39 --> Total execution time: 0.1008
DEBUG - 2022-11-02 23:32:14 --> UTF-8 Support Enabled
DEBUG - 2022-11-02 23:32:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-11-02 23:32:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-11-02 23:32:14 --> Total execution time: 0.0930
