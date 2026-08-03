<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2022-10-04 00:57:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 00:57:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 00:57:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 00:57:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 00:57:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 00:57:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 00:57:51 --> Total execution time: 0.0956
DEBUG - 2022-10-04 00:58:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 00:58:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 00:58:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 00:58:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 00:58:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 00:58:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 00:58:01 --> Total execution time: 0.3798
DEBUG - 2022-10-04 00:58:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 00:58:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 00:58:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 00:58:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 00:58:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 00:58:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 00:58:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '1
WHERE `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`data_caixa` = '2...' at line 10 - Invalid query: SELECT `venda_caixa`.*, `cliente`.`nome_cliente`, (select sum(metodo_pagamento_venda_caixa.valor_pagamento) 
                             from metodo_pagamento_venda_caixa
                            where metodo_pagamento_venda_caixa.num_venda_caixa = venda_caixa.num_venda_caixa) valor_total_pedido, (select sum(metodo_pagamento_venda_caixa.valor_pagamento) 
                             from metodo_pagamento_venda_caixa
                            where metodo_pagamento_venda_caixa.num_venda_caixa = venda_caixa.num_venda_caixa
                              and metodo_pagamento_venda_caixa.cod_metodo_pagamento = empresa.metodo_pagamento_frente_caixa)  valor_dinheiro_pedido, `tb_fat_nota_fiscal`.`c_stat`, `tb_fat_nota_fiscal`.`chave`, `tb_fat_nota_fiscal`.`id` as `nf_id`, `tb_fat_nota_fiscal`.`serie`, `tb_fat_nota_fiscal`.`numero`
FROM `venda_caixa`
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `venda_caixa`.`cod_cliente`
JOIN `empresa` ON `empresa`.`id_empresa` = `venda_caixa`.`id_empresa`
LEFT JOIN `tb_fat_nota_fiscal` ON `tb_fat_nota_fiscal`.`cod_faturamento_pedido` = `venda_caixa`.`num_venda_caixa` and `tb_fat_nota_fiscal`.`c_stat` = "100" and `limit`1
WHERE `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`data_caixa` = '2022-10-04'
DEBUG - 2022-10-04 01:02:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:02:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:02:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:02:29 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:02:29 --> Total execution time: 0.1445
DEBUG - 2022-10-04 01:07:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:07:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:07:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:07:54 --> Total execution time: 0.1338
DEBUG - 2022-10-04 01:07:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:07:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:07:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:07:58 --> Total execution time: 0.0989
DEBUG - 2022-10-04 01:09:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:09:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:51 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:51 --> Total execution time: 0.2056
DEBUG - 2022-10-04 01:09:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:53 --> Total execution time: 0.1548
DEBUG - 2022-10-04 01:09:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:53 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:53 --> Total execution time: 0.1763
DEBUG - 2022-10-04 01:09:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:54 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:54 --> Total execution time: 0.1957
DEBUG - 2022-10-04 01:09:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:55 --> Total execution time: 0.2009
DEBUG - 2022-10-04 01:09:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:55 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:56 --> Total execution time: 0.1979
DEBUG - 2022-10-04 01:09:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:56 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:56 --> Total execution time: 0.2078
DEBUG - 2022-10-04 01:09:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:57 --> Total execution time: 0.1970
DEBUG - 2022-10-04 01:09:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:57 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:58 --> Total execution time: 0.2287
DEBUG - 2022-10-04 01:09:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:09:58 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:09:58 --> Total execution time: 0.1890
DEBUG - 2022-10-04 01:09:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:09:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:09:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:09:59 --> Total execution time: 0.1613
DEBUG - 2022-10-04 01:10:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:10:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:10:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:10:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:10:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:10:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:10:02 --> Total execution time: 0.2136
DEBUG - 2022-10-04 01:10:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:10:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:10:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:10:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:10:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:10:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:10:04 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:10:04 --> Total execution time: 0.2248
DEBUG - 2022-10-04 01:11:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 01:11:07 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 01:11:08 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 01:11:08 --> Total execution time: 0.2542
DEBUG - 2022-10-04 01:11:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:13 --> Total execution time: 0.1427
DEBUG - 2022-10-04 01:11:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:17 --> Total execution time: 2.5091
DEBUG - 2022-10-04 01:11:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:26 --> Total execution time: 0.1071
DEBUG - 2022-10-04 01:11:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:30 --> Total execution time: 0.1683
DEBUG - 2022-10-04 01:11:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:33 --> Total execution time: 0.1337
DEBUG - 2022-10-04 01:11:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:11:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:11:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:11:43 --> Total execution time: 0.1645
DEBUG - 2022-10-04 01:17:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:17:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:17:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:17:43 --> Total execution time: 0.1881
DEBUG - 2022-10-04 01:17:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:17:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:17:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:17:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:17:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:17:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:17:46 --> Total execution time: 0.1952
DEBUG - 2022-10-04 01:17:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:17:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:17:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:17:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:17:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:17:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:17:55 --> Total execution time: 0.1477
DEBUG - 2022-10-04 01:21:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:21:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:21:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:21:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:21:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:21:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:21:43 --> Total execution time: 0.1867
DEBUG - 2022-10-04 01:21:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:21:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:21:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:21:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:21:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:21:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:21:53 --> Total execution time: 0.1547
DEBUG - 2022-10-04 01:21:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:21:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:21:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:21:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:21:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:21:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:21:57 --> Total execution time: 0.1596
DEBUG - 2022-10-04 01:22:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:22:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:22:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:22:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:22:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:22:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:22:07 --> Total execution time: 0.1610
DEBUG - 2022-10-04 01:23:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:23:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:23:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:23:06 --> Total execution time: 0.1314
DEBUG - 2022-10-04 01:23:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:23:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:23:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:23:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:23:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:23:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:23:09 --> Total execution time: 0.1665
DEBUG - 2022-10-04 01:23:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:23:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:23:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:23:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:23:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:23:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:23:18 --> Total execution time: 0.1502
DEBUG - 2022-10-04 01:24:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:06 --> Total execution time: 0.1371
DEBUG - 2022-10-04 01:24:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:09 --> Total execution time: 0.1518
DEBUG - 2022-10-04 01:24:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:21 --> Total execution time: 0.1735
DEBUG - 2022-10-04 01:24:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:41 --> Total execution time: 0.1707
DEBUG - 2022-10-04 01:24:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:24:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:24:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:24:51 --> Total execution time: 0.1568
DEBUG - 2022-10-04 01:26:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:26:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:26:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:26:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:26:01 --> No URI present. Default controller set.
DEBUG - 2022-10-04 01:26:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:26:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:26:01 --> Total execution time: 0.1073
DEBUG - 2022-10-04 01:26:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:26:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:26:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:26:03 --> Total execution time: 0.1054
DEBUG - 2022-10-04 01:26:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:26:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:26:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:26:11 --> Total execution time: 0.1310
DEBUG - 2022-10-04 01:26:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:26:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:26:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:26:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:26:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:26:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:26:15 --> Total execution time: 0.1276
DEBUG - 2022-10-04 01:26:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:26:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:26:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:26:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:26:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:26:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:26:28 --> Total execution time: 0.0961
DEBUG - 2022-10-04 01:27:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:27:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:27:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:27:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:27:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:27:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:27:17 --> Total execution time: 0.5167
DEBUG - 2022-10-04 01:27:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:27:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:27:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:27:22 --> Total execution time: 0.1347
DEBUG - 2022-10-04 01:27:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:27:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:27:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:27:27 --> Total execution time: 2.9265
DEBUG - 2022-10-04 01:27:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:27:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:27:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:27:38 --> Total execution time: 0.1823
DEBUG - 2022-10-04 01:30:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:01 --> Total execution time: 0.4594
DEBUG - 2022-10-04 01:30:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:03 --> Total execution time: 0.1566
DEBUG - 2022-10-04 01:30:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:05 --> Total execution time: 0.8494
DEBUG - 2022-10-04 01:30:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:07 --> Total execution time: 0.1306
DEBUG - 2022-10-04 01:30:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:09 --> Total execution time: 0.1432
DEBUG - 2022-10-04 01:30:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:10 --> Total execution time: 0.1175
DEBUG - 2022-10-04 01:30:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:30:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:30:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:30:11 --> Total execution time: 0.1321
DEBUG - 2022-10-04 01:31:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:31:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:31:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:31:34 --> Total execution time: 0.1533
DEBUG - 2022-10-04 01:31:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:31:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:31:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:31:36 --> Total execution time: 0.1131
DEBUG - 2022-10-04 01:31:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:31:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:31:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:31:41 --> Total execution time: 0.1370
DEBUG - 2022-10-04 01:32:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:32:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:32:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:32:30 --> Total execution time: 0.1434
DEBUG - 2022-10-04 01:32:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:32:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:32:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:32:31 --> Total execution time: 0.1451
DEBUG - 2022-10-04 01:32:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:32:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:32:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:32:33 --> Total execution time: 0.1402
DEBUG - 2022-10-04 01:32:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:32:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:32:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:32:58 --> Total execution time: 0.1296
DEBUG - 2022-10-04 01:33:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:33:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:33:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:33:01 --> Total execution time: 0.1118
DEBUG - 2022-10-04 01:33:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:33:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:33:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:33:03 --> Total execution time: 0.1228
DEBUG - 2022-10-04 01:33:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:33:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:33:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:33:04 --> Total execution time: 0.1469
DEBUG - 2022-10-04 01:33:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:33:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:33:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:33:10 --> Total execution time: 0.1400
DEBUG - 2022-10-04 01:35:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:09 --> Total execution time: 0.1469
DEBUG - 2022-10-04 01:35:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:11 --> Total execution time: 0.1534
DEBUG - 2022-10-04 01:35:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:30 --> Total execution time: 0.1229
DEBUG - 2022-10-04 01:35:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:32 --> Total execution time: 0.1133
DEBUG - 2022-10-04 01:35:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:34 --> Total execution time: 0.1267
DEBUG - 2022-10-04 01:35:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:36 --> Total execution time: 0.1300
DEBUG - 2022-10-04 01:35:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:38 --> Total execution time: 0.1472
DEBUG - 2022-10-04 01:35:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:46 --> Total execution time: 0.1337
DEBUG - 2022-10-04 01:35:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:47 --> Total execution time: 0.1259
DEBUG - 2022-10-04 01:35:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:35:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:35:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:35:59 --> Total execution time: 0.1317
DEBUG - 2022-10-04 01:36:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:37 --> Total execution time: 0.1905
DEBUG - 2022-10-04 01:36:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:39 --> Total execution time: 0.1236
DEBUG - 2022-10-04 01:36:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:41 --> Total execution time: 0.1542
DEBUG - 2022-10-04 01:36:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:42 --> Total execution time: 0.1489
DEBUG - 2022-10-04 01:36:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:44 --> Total execution time: 0.1305
DEBUG - 2022-10-04 01:36:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:45 --> Total execution time: 0.1155
DEBUG - 2022-10-04 01:36:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:47 --> Total execution time: 0.1477
DEBUG - 2022-10-04 01:36:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:53 --> Total execution time: 0.1375
DEBUG - 2022-10-04 01:36:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:36:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:36:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:36:57 --> Total execution time: 0.1006
DEBUG - 2022-10-04 01:37:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:37:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:37:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:37:03 --> Total execution time: 0.1466
DEBUG - 2022-10-04 01:37:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:37:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:37:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:37:34 --> Total execution time: 0.1318
DEBUG - 2022-10-04 01:37:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:37:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:37:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:37:35 --> Total execution time: 0.1288
DEBUG - 2022-10-04 01:37:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:37:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:37:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:37:37 --> Total execution time: 0.1412
DEBUG - 2022-10-04 01:37:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:37:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:37:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:37:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:37:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:37:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:37:44 --> Total execution time: 0.1388
DEBUG - 2022-10-04 01:37:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:37:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:37:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:37:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:37:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:37:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:37:58 --> Total execution time: 0.1516
DEBUG - 2022-10-04 01:38:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:38:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:38:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:38:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:38:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:38:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:38:01 --> Total execution time: 0.1264
DEBUG - 2022-10-04 01:38:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:38:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:38:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:38:02 --> Total execution time: 0.1276
DEBUG - 2022-10-04 01:38:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:38:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:38:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:38:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:38:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:38:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:38:07 --> Total execution time: 0.9197
DEBUG - 2022-10-04 01:38:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:38:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:38:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:38:29 --> Total execution time: 0.1583
DEBUG - 2022-10-04 01:38:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:38:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:38:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:38:36 --> Total execution time: 0.0985
DEBUG - 2022-10-04 01:39:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:39:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:39:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:39:07 --> Total execution time: 0.1232
DEBUG - 2022-10-04 01:39:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:39:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:39:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:39:10 --> Total execution time: 0.1163
DEBUG - 2022-10-04 01:41:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:41:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:41:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:41:43 --> Total execution time: 0.1728
DEBUG - 2022-10-04 01:41:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:41:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:41:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:41:47 --> Total execution time: 2.8320
DEBUG - 2022-10-04 01:41:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:41:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:41:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:41:47 --> Total execution time: 0.1504
DEBUG - 2022-10-04 01:42:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:42:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:42:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:42:18 --> Total execution time: 0.1555
DEBUG - 2022-10-04 01:42:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:42:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:42:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:42:19 --> Total execution time: 0.1509
DEBUG - 2022-10-04 01:42:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:42:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:42:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:42:20 --> Total execution time: 0.1142
DEBUG - 2022-10-04 01:42:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:42:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:42:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:42:24 --> Total execution time: 0.1886
DEBUG - 2022-10-04 01:42:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:42:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:42:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:42:59 --> Total execution time: 0.1757
DEBUG - 2022-10-04 01:43:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:43:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:43:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:43:00 --> Total execution time: 0.1937
DEBUG - 2022-10-04 01:43:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:43:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:43:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:43:03 --> Total execution time: 0.1426
DEBUG - 2022-10-04 01:43:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:43:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:43:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:43:08 --> Total execution time: 2.7554
DEBUG - 2022-10-04 01:43:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:43:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:43:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:43:12 --> Total execution time: 0.1373
DEBUG - 2022-10-04 01:43:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:43:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:43:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:43:16 --> Total execution time: 2.7316
DEBUG - 2022-10-04 01:43:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:43:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:43:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:44:00 --> Total execution time: 2.8368
DEBUG - 2022-10-04 01:44:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:44:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:44:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:44:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:44:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:44:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:44:02 --> Total execution time: 0.2470
DEBUG - 2022-10-04 01:44:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:44:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:44:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:44:11 --> Total execution time: 2.8431
DEBUG - 2022-10-04 01:45:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:45:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:45:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:45:34 --> Total execution time: 2.7331
DEBUG - 2022-10-04 01:45:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:45:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:45:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:45:36 --> Total execution time: 0.1453
DEBUG - 2022-10-04 01:45:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:45:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:45:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:45:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:45:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:45:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:45:38 --> Total execution time: 1.0134
DEBUG - 2022-10-04 01:45:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:45:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:45:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:45:41 --> Total execution time: 0.1393
DEBUG - 2022-10-04 01:46:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:46:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:46:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:46:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:46:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:46:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:46:39 --> Total execution time: 0.1727
DEBUG - 2022-10-04 01:47:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:47:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:47:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:47:27 --> Total execution time: 0.1760
DEBUG - 2022-10-04 01:47:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:47:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:47:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:47:31 --> Severity: Notice --> Undefined variable: lista_segmento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 528
ERROR - 2022-10-04 01:47:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 528
ERROR - 2022-10-04 01:47:31 --> Severity: Notice --> Undefined variable: lista_cidade C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 611
ERROR - 2022-10-04 01:47:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 611
DEBUG - 2022-10-04 01:47:31 --> Total execution time: 2.6634
DEBUG - 2022-10-04 01:47:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:47:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:47:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:47:33 --> Total execution time: 0.1584
DEBUG - 2022-10-04 01:47:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:47:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:47:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:47:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:47:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:47:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:47:37 --> Total execution time: 0.1176
DEBUG - 2022-10-04 01:47:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:47:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:47:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:47:41 --> Total execution time: 0.5025
DEBUG - 2022-10-04 01:47:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:47:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:47:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:47:52 --> Total execution time: 0.3732
DEBUG - 2022-10-04 01:48:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:26 --> Total execution time: 0.1496
DEBUG - 2022-10-04 01:48:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:29 --> Total execution time: 0.1374
DEBUG - 2022-10-04 01:48:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:32 --> Total execution time: 1.7356
DEBUG - 2022-10-04 01:48:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:36 --> Total execution time: 0.1274
DEBUG - 2022-10-04 01:48:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:37 --> Total execution time: 0.1280
DEBUG - 2022-10-04 01:48:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 01:48:39 --> Query error: Unknown column 'faturamento_pedido.data_movimento' in 'field list' - Invalid query: SELECT `vendas`.`cod_cliente`, `vendas`.`nome_cliente`, `vendas`.`data_movimento`, `vendas`.`pedido` as `pedido`, `vendas`.`venda` as `venda`, `vendas`.`cod_produto`, `vendas`.`nome_produto`, `vendas`.`nome_tipo_produto`, `vendas`.`cod_unidade_medida`, `vendas`.`quant_movimentada`, `vendas`.`valor_desconto`, `vendas`.`valor_movimento`
FROM (SELECT `cliente`.`cod_cliente`, `cliente`.`nome_cliente`, `faturamento_pedido`.`data_movimento`, `pedido_venda`.`num_pedido_venda` as `pedido`, `faturamento_pedido`.`cod_faturamento_pedido` as `venda`, `movimentos_estoque`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, `faturamento_pedido`.`valor_desconto`, `movimentos_estoque`.`quant_movimentada`, `movimentos_estoque`.`valor_movimento`
FROM `faturamento_pedido`
JOIN `pedido_venda` ON `pedido_venda`.`num_pedido_venda` = `faturamento_pedido`.`num_pedido_venda`
JOIN `cliente` ON `cliente`.`cod_cliente` = `pedido_venda`.`cod_cliente`
WHERE `pedido_venda`.`id_empresa` = '63'
AND `cliente`.`id_empresa` = '63'
AND `faturamento_pedido`.`estornado` = '0'
AND `faturamento_pedido`.`data_faturamento` >= '2022-10-01'
AND `faturamento_pedido`.`data_faturamento` <= '2022-10-04' UNION SELECT `cliente`.`cod_cliente`, `cliente`.`nome_cliente`, `movimentos_estoque`.`data_movimento`, DATE_FORMAT(controle_caixa.data_caixa, "%d/%m/%Y") as pedido, `venda_caixa`.`num_venda_caixa` as `venda`, `movimentos_estoque`.`cod_produto`, `produto`.`nome_produto`, `tipo_produto`.`nome_tipo_produto`, `produto`.`cod_unidade_medida`, if(venda_caixa.tipo_desconto = 1, `venda_caixa`.`valor_desconto`, movimentos_estoque.valor_movimento * (venda_caixa.valor_desconto / 100)) valor_desconto, `movimentos_estoque`.`quant_movimentada`, `movimentos_estoque`.`valor_movimento`
FROM `movimentos_estoque`
JOIN `produto` ON `produto`.`cod_produto` = `movimentos_estoque`.`cod_produto`
JOIN `tipo_produto` ON `tipo_produto`.`cod_tipo_produto` = `produto`.`cod_tipo_produto`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `movimentos_estoque`.`id_origem`
JOIN `controle_caixa` ON `controle_caixa`.`data_caixa` = `venda_caixa`.`data_caixa`
LEFT JOIN `cliente` ON `cliente`.`cod_cliente` = `venda_caixa`.`cod_cliente` and `cliente`.`id_empresa` = 63
WHERE `venda_caixa`.`id_empresa` = '63'
AND `controle_caixa`.`id_empresa` = '63'
AND `produto`.`id_empresa` = '63'
AND `tipo_produto`.`id_empresa` = '63'
AND `movimentos_estoque`.`origem_movimento` = '6'
AND `venda_caixa`.`status` = '2'
AND `movimentos_estoque`.`data_movimento` >= '2022-10-01'
AND `movimentos_estoque`.`data_movimento` <= '2022-10-04') vendas
ORDER BY `vendas`.`data_movimento` DESC, `vendas`.`pedido` DESC
DEBUG - 2022-10-04 01:48:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:47 --> Total execution time: 0.1193
DEBUG - 2022-10-04 01:48:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:52 --> Total execution time: 1.5895
DEBUG - 2022-10-04 01:48:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:55 --> Total execution time: 0.1382
DEBUG - 2022-10-04 01:48:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:48:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:48:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:48:59 --> Total execution time: 2.6545
DEBUG - 2022-10-04 01:49:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:02 --> Total execution time: 0.1412
DEBUG - 2022-10-04 01:49:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:14 --> Total execution time: 0.1707
DEBUG - 2022-10-04 01:49:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:18 --> Total execution time: 2.8795
DEBUG - 2022-10-04 01:49:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:22 --> Total execution time: 0.1554
DEBUG - 2022-10-04 01:49:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:37 --> Total execution time: 0.1198
DEBUG - 2022-10-04 01:49:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:49:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:49:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:49:43 --> Total execution time: 0.1710
DEBUG - 2022-10-04 01:50:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:50:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:50:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:50:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:50:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:50:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:50:01 --> Total execution time: 0.1298
DEBUG - 2022-10-04 01:50:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:50:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:50:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:50:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:50:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:50:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:50:06 --> Total execution time: 0.1436
DEBUG - 2022-10-04 01:52:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 01:52:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 01:52:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 01:52:44 --> Total execution time: 0.3708
DEBUG - 2022-10-04 02:01:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:09 --> Total execution time: 0.1208
DEBUG - 2022-10-04 02:01:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:11 --> Total execution time: 0.1369
DEBUG - 2022-10-04 02:01:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:14 --> Total execution time: 0.3361
DEBUG - 2022-10-04 02:01:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:18 --> Total execution time: 0.2801
DEBUG - 2022-10-04 02:01:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:32 --> Total execution time: 0.3174
DEBUG - 2022-10-04 02:01:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:37 --> Total execution time: 0.1417
DEBUG - 2022-10-04 02:01:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:39 --> Total execution time: 0.1901
DEBUG - 2022-10-04 02:01:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:40 --> Total execution time: 0.1601
DEBUG - 2022-10-04 02:01:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:52 --> Total execution time: 0.1689
DEBUG - 2022-10-04 02:01:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:01:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:01:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:01:55 --> Total execution time: 0.3054
DEBUG - 2022-10-04 02:05:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:05:10 --> Total execution time: 0.1551
DEBUG - 2022-10-04 02:05:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:05:13 --> Total execution time: 0.3391
DEBUG - 2022-10-04 02:05:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:05:48 --> Total execution time: 0.1469
DEBUG - 2022-10-04 02:05:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:05:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:05:52 --> Total execution time: 0.4751
ERROR - 2022-10-04 02:05:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\VendasController.php 641
DEBUG - 2022-10-04 02:05:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:05:52 --> Total execution time: 0.2248
DEBUG - 2022-10-04 02:05:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:05:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 02:05:59 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\VendasController.php 641
DEBUG - 2022-10-04 02:05:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:05:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:05:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:05:59 --> Total execution time: 0.4758
DEBUG - 2022-10-04 02:05:59 --> Total execution time: 0.4262
DEBUG - 2022-10-04 02:06:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:02 --> Total execution time: 0.3824
ERROR - 2022-10-04 02:06:02 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\VendasController.php 641
DEBUG - 2022-10-04 02:06:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:02 --> Total execution time: 0.1918
DEBUG - 2022-10-04 02:06:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:21 --> Total execution time: 0.1800
DEBUG - 2022-10-04 02:06:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 02:06:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\VendasController.php 641
DEBUG - 2022-10-04 02:06:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:24 --> Total execution time: 0.4750
DEBUG - 2022-10-04 02:06:24 --> Total execution time: 0.4420
DEBUG - 2022-10-04 02:06:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:26 --> Total execution time: 0.4040
ERROR - 2022-10-04 02:06:26 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\VendasController.php 641
DEBUG - 2022-10-04 02:06:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:06:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:06:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:06:27 --> Total execution time: 0.1967
DEBUG - 2022-10-04 02:07:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:07:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:07:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:07:48 --> Total execution time: 0.1452
DEBUG - 2022-10-04 02:08:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:08:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:08:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:08:47 --> Total execution time: 0.1546
DEBUG - 2022-10-04 02:08:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:08:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:08:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:08:49 --> Total execution time: 0.1389
DEBUG - 2022-10-04 02:09:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:09:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:09:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 02:09:45 --> Severity: Notice --> Undefined variable: pedido C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 877
ERROR - 2022-10-04 02:09:45 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 877
DEBUG - 2022-10-04 02:09:45 --> Total execution time: 0.2037
DEBUG - 2022-10-04 02:11:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:11:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:11:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:11:58 --> Total execution time: 0.1662
DEBUG - 2022-10-04 02:13:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:13:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:13:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:13:26 --> Total execution time: 0.1396
DEBUG - 2022-10-04 02:13:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:13:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:13:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:13:32 --> Total execution time: 0.1707
DEBUG - 2022-10-04 02:14:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:14:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:14:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:14:29 --> Total execution time: 0.1512
DEBUG - 2022-10-04 02:14:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:14:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:14:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:14:58 --> Total execution time: 0.1730
DEBUG - 2022-10-04 02:15:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:15:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:15:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:15:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:15:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:15:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:15:02 --> Total execution time: 0.8712
DEBUG - 2022-10-04 02:16:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:07 --> Total execution time: 0.3739
DEBUG - 2022-10-04 02:16:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:26 --> Total execution time: 0.1894
DEBUG - 2022-10-04 02:16:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:27 --> Total execution time: 0.5470
DEBUG - 2022-10-04 02:16:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:29 --> Total execution time: 0.3970
DEBUG - 2022-10-04 02:16:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:40 --> Total execution time: 0.1820
DEBUG - 2022-10-04 02:16:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:41 --> Total execution time: 0.4838
DEBUG - 2022-10-04 02:16:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:43 --> Total execution time: 0.4649
DEBUG - 2022-10-04 02:16:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 658
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 660
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 662
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 664
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 667
ERROR - 2022-10-04 02:16:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 668
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 671
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 673
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 690
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 691
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 697
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-04 02:16:46 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
DEBUG - 2022-10-04 02:16:46 --> Total execution time: 0.3317
DEBUG - 2022-10-04 02:16:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:46 --> Total execution time: 0.4852
DEBUG - 2022-10-04 02:16:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:49 --> Total execution time: 0.1783
DEBUG - 2022-10-04 02:16:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:49 --> Total execution time: 0.5679
DEBUG - 2022-10-04 02:16:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:16:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:16:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:16:52 --> Total execution time: 0.4391
DEBUG - 2022-10-04 02:17:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:17:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:17:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:17:20 --> Total execution time: 0.1660
DEBUG - 2022-10-04 02:17:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:17:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:17:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:17:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:17:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:17:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:17:20 --> Total execution time: 0.4873
DEBUG - 2022-10-04 02:17:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:17:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:17:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:17:23 --> Total execution time: 0.4735
DEBUG - 2022-10-04 02:19:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:24 --> Total execution time: 0.0618
DEBUG - 2022-10-04 02:19:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:25 --> Total execution time: 0.2279
DEBUG - 2022-10-04 02:19:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:28 --> Total execution time: 1.6855
DEBUG - 2022-10-04 02:19:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:40 --> Total execution time: 0.0914
DEBUG - 2022-10-04 02:19:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:40 --> Total execution time: 0.2382
DEBUG - 2022-10-04 02:19:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:42 --> Total execution time: 0.1612
DEBUG - 2022-10-04 02:19:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:19:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:19:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:19:59 --> Total execution time: 0.0868
DEBUG - 2022-10-04 02:20:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:20:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:20:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:20:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:20:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:20:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:20:00 --> Total execution time: 0.2537
DEBUG - 2022-10-04 02:20:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:20:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:20:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:20:01 --> Total execution time: 0.1971
DEBUG - 2022-10-04 02:22:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:22:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:22:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:22:15 --> Total execution time: 0.0769
DEBUG - 2022-10-04 02:22:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:22:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:22:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:22:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:22:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:22:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:22:15 --> Total execution time: 0.2632
DEBUG - 2022-10-04 02:22:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:22:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:22:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:22:17 --> Total execution time: 0.1636
DEBUG - 2022-10-04 02:26:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:26:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:26:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:26:50 --> Total execution time: 0.0844
DEBUG - 2022-10-04 02:26:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:26:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:26:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:26:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:26:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:26:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:26:50 --> Total execution time: 0.2414
DEBUG - 2022-10-04 02:26:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:26:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:26:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:26:52 --> Total execution time: 0.1975
DEBUG - 2022-10-04 02:27:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:27:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:27:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:27:15 --> Total execution time: 0.1493
DEBUG - 2022-10-04 02:33:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:33:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:33:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:33:35 --> Total execution time: 0.0648
DEBUG - 2022-10-04 02:33:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:33:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:33:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:33:38 --> Total execution time: 0.1526
DEBUG - 2022-10-04 02:35:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:35:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:35:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:35:40 --> Total execution time: 0.0740
DEBUG - 2022-10-04 02:35:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:35:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:35:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:35:43 --> Total execution time: 1.1201
DEBUG - 2022-10-04 02:35:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:35:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:35:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:35:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:35:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:35:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:35:45 --> Total execution time: 0.1251
DEBUG - 2022-10-04 02:35:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:35:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:35:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:35:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:35:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:35:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:35:51 --> Total execution time: 1.1969
DEBUG - 2022-10-04 02:35:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:35:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:35:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:35:55 --> Total execution time: 0.0915
DEBUG - 2022-10-04 02:36:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:36:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:36:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:36:41 --> Total execution time: 0.0768
DEBUG - 2022-10-04 02:36:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:36:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:36:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:36:44 --> Total execution time: 1.3670
DEBUG - 2022-10-04 02:36:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:36:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:36:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:36:45 --> Total execution time: 0.0761
DEBUG - 2022-10-04 02:37:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:37:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:37:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:37:10 --> Total execution time: 0.0777
DEBUG - 2022-10-04 02:37:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:37:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:37:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:37:13 --> Total execution time: 1.2509
DEBUG - 2022-10-04 02:39:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:39:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:39:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:39:10 --> Total execution time: 1.3084
DEBUG - 2022-10-04 02:39:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:39:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:39:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:39:13 --> Total execution time: 0.0984
DEBUG - 2022-10-04 02:39:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:39:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:39:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:40:00 --> Total execution time: 1.3154
DEBUG - 2022-10-04 02:40:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:40:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:40:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:40:02 --> Total execution time: 0.1328
DEBUG - 2022-10-04 02:43:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:43:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:43:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:43:30 --> Total execution time: 0.0732
DEBUG - 2022-10-04 02:43:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:43:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:43:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:43:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:43:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:43:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:43:51 --> Total execution time: 1.2654
DEBUG - 2022-10-04 02:43:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:43:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:43:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:43:53 --> Total execution time: 0.1011
DEBUG - 2022-10-04 02:43:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:43:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:43:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:43:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:43:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:43:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:43:56 --> Total execution time: 0.1400
DEBUG - 2022-10-04 02:44:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:44:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:44:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:44:34 --> Total execution time: 0.1115
DEBUG - 2022-10-04 02:44:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:44:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:44:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:44:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:44:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:44:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:44:39 --> Total execution time: 1.2264
DEBUG - 2022-10-04 02:44:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:44:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:44:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:44:44 --> Total execution time: 0.1360
DEBUG - 2022-10-04 02:46:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:46:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:46:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:46:55 --> Total execution time: 0.0966
DEBUG - 2022-10-04 02:47:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:47:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:47:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:47:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:47:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:47:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:47:04 --> Total execution time: 1.2794
DEBUG - 2022-10-04 02:47:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:47:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:47:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:47:07 --> Total execution time: 0.0958
DEBUG - 2022-10-04 02:47:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:47:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:47:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:47:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:47:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:47:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:47:11 --> Total execution time: 0.0962
DEBUG - 2022-10-04 02:51:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:51:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:51:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:51:42 --> Total execution time: 0.1573
DEBUG - 2022-10-04 02:51:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:51:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:51:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:51:43 --> Total execution time: 0.1344
DEBUG - 2022-10-04 02:53:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:53:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:53:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:53:07 --> Total execution time: 0.0948
DEBUG - 2022-10-04 02:53:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:53:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:53:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:53:08 --> Total execution time: 0.1282
DEBUG - 2022-10-04 02:56:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:56:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:56:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:56:24 --> Total execution time: 0.0684
DEBUG - 2022-10-04 02:56:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:56:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:56:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:56:26 --> Total execution time: 0.1075
DEBUG - 2022-10-04 02:59:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:59:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:59:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:59:21 --> Total execution time: 0.0635
DEBUG - 2022-10-04 02:59:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:59:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:59:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:59:23 --> Total execution time: 1.3226
DEBUG - 2022-10-04 02:59:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:59:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:59:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:59:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:59:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:59:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:59:24 --> Total execution time: 0.1359
DEBUG - 2022-10-04 02:59:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:59:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:59:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:59:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:59:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:59:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:59:27 --> Total execution time: 1.2005
DEBUG - 2022-10-04 02:59:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 02:59:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 02:59:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 02:59:32 --> Total execution time: 0.0976
DEBUG - 2022-10-04 03:01:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:01:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:01:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:01:17 --> Total execution time: 0.0764
DEBUG - 2022-10-04 03:02:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:02:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:02:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:02:05 --> Total execution time: 0.0671
DEBUG - 2022-10-04 03:04:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:04:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:04:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:04:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:04:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:04:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:04:40 --> Total execution time: 0.1181
DEBUG - 2022-10-04 03:04:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:04:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:04:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:04:48 --> Total execution time: 0.1787
DEBUG - 2022-10-04 03:10:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:10:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:10:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:10:40 --> Total execution time: 0.1254
DEBUG - 2022-10-04 03:10:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:10:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:10:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:10:43 --> Total execution time: 1.2381
DEBUG - 2022-10-04 03:10:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:10:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:10:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:10:46 --> Total execution time: 0.0715
DEBUG - 2022-10-04 03:10:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:10:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:10:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:10:49 --> Total execution time: 1.2870
DEBUG - 2022-10-04 03:24:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:24:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:24:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:24:53 --> Total execution time: 0.0801
DEBUG - 2022-10-04 03:24:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:24:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:24:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:24:59 --> Total execution time: 0.0912
DEBUG - 2022-10-04 03:26:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:26:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:26:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
ERROR - 2022-10-04 03:26:42 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 104
DEBUG - 2022-10-04 03:26:42 --> Total execution time: 0.1345
DEBUG - 2022-10-04 03:28:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:28:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:28:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 03:28:04 --> Severity: Notice --> Undefined property: stdClass::$indicador_final C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 92
ERROR - 2022-10-04 03:28:04 --> Severity: Notice --> Undefined property: stdClass::$indicador_final C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 92
DEBUG - 2022-10-04 03:28:04 --> Total execution time: 0.0833
DEBUG - 2022-10-04 03:30:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:30:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:30:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:30:06 --> Total execution time: 0.0628
DEBUG - 2022-10-04 03:30:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:30:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:30:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:30:18 --> Total execution time: 0.0760
DEBUG - 2022-10-04 03:32:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:32:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:32:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:32:44 --> Total execution time: 0.0806
DEBUG - 2022-10-04 03:32:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:32:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:32:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:32:45 --> Total execution time: 0.0877
DEBUG - 2022-10-04 03:34:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:34:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:34:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:34:09 --> Total execution time: 0.0752
DEBUG - 2022-10-04 03:34:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:34:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:34:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:34:18 --> Total execution time: 0.0858
DEBUG - 2022-10-04 03:34:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:34:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:34:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:34:20 --> Total execution time: 0.0867
DEBUG - 2022-10-04 03:58:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:58:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:58:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:58:04 --> Total execution time: 0.0747
DEBUG - 2022-10-04 03:58:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:58:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:58:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:58:06 --> Total execution time: 1.2861
DEBUG - 2022-10-04 03:58:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:58:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:58:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:58:11 --> Total execution time: 0.0920
DEBUG - 2022-10-04 03:58:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:58:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:58:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:58:13 --> Total execution time: 0.0593
DEBUG - 2022-10-04 03:58:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 03:58:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 03:58:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 03:58:15 --> Total execution time: 1.2309
DEBUG - 2022-10-04 04:08:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:08:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:08:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:08:48 --> Total execution time: 0.2498
DEBUG - 2022-10-04 04:17:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:17:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:17:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:17:24 --> Total execution time: 0.2011
DEBUG - 2022-10-04 04:17:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:17:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:17:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:17:39 --> Total execution time: 0.1665
DEBUG - 2022-10-04 04:18:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:18:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:18:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:18:29 --> Total execution time: 0.1473
DEBUG - 2022-10-04 04:19:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:19:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:19:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:19:36 --> Total execution time: 0.1534
DEBUG - 2022-10-04 04:19:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:19:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:19:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:19:37 --> Total execution time: 0.1844
DEBUG - 2022-10-04 04:19:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:19:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:19:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:19:51 --> Total execution time: 0.1666
DEBUG - 2022-10-04 04:20:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:01 --> Total execution time: 0.1523
DEBUG - 2022-10-04 04:20:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:14 --> Total execution time: 0.1670
DEBUG - 2022-10-04 04:20:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:28 --> Total execution time: 0.1639
DEBUG - 2022-10-04 04:20:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:30 --> Total execution time: 0.1659
DEBUG - 2022-10-04 04:20:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:31 --> Total execution time: 0.1787
DEBUG - 2022-10-04 04:20:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:34 --> Total execution time: 0.1453
DEBUG - 2022-10-04 04:20:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:48 --> No URI present. Default controller set.
DEBUG - 2022-10-04 04:20:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:48 --> Total execution time: 0.0742
DEBUG - 2022-10-04 04:20:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:20:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:20:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:20:49 --> Total execution time: 0.0789
DEBUG - 2022-10-04 04:21:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:21:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:21:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:21:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:21:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:21:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:21:03 --> Total execution time: 0.1379
DEBUG - 2022-10-04 04:21:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:21:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:21:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:21:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:21:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:21:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:21:41 --> Total execution time: 0.1285
DEBUG - 2022-10-04 04:22:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:22:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:22:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:22:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:22:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:22:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:22:01 --> Total execution time: 0.1122
DEBUG - 2022-10-04 04:22:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:22:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:22:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:22:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:22:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:22:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:22:01 --> Total execution time: 0.1901
DEBUG - 2022-10-04 04:22:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:22:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:22:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:22:06 --> Total execution time: 0.1293
DEBUG - 2022-10-04 04:22:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:22:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:22:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:22:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:22:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:22:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:22:06 --> Total execution time: 0.1836
DEBUG - 2022-10-04 04:23:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:23:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:23:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:23:15 --> Total execution time: 0.1579
DEBUG - 2022-10-04 04:24:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:24:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:24:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:24:19 --> Total execution time: 0.1211
DEBUG - 2022-10-04 04:24:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:24:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:24:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:24:42 --> Total execution time: 0.1251
DEBUG - 2022-10-04 04:24:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:24:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:24:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:24:43 --> Total execution time: 0.1037
DEBUG - 2022-10-04 04:25:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:25:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:25:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:25:09 --> Total execution time: 0.1387
DEBUG - 2022-10-04 04:25:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:25:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:25:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:25:32 --> Total execution time: 0.1254
DEBUG - 2022-10-04 04:25:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:25:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:25:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:25:42 --> Total execution time: 0.1183
DEBUG - 2022-10-04 04:25:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:25:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:25:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:25:43 --> Total execution time: 0.1297
DEBUG - 2022-10-04 04:25:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:25:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:25:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:25:49 --> Total execution time: 0.1293
DEBUG - 2022-10-04 04:25:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:25:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:25:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:25:50 --> Total execution time: 0.1350
DEBUG - 2022-10-04 04:26:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:26:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:26:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:26:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:26:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:26:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:26:27 --> Total execution time: 0.1330
DEBUG - 2022-10-04 04:27:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:27:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:27:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:27:49 --> Total execution time: 0.1214
DEBUG - 2022-10-04 04:27:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:27:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:27:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:27:56 --> Total execution time: 0.1250
DEBUG - 2022-10-04 04:27:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:27:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:27:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:27:57 --> Total execution time: 0.1155
DEBUG - 2022-10-04 04:27:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:27:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:27:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:27:58 --> Total execution time: 0.1267
DEBUG - 2022-10-04 04:29:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:29:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:29:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:29:19 --> Total execution time: 0.1285
DEBUG - 2022-10-04 04:29:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:29:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:29:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:29:25 --> Total execution time: 0.1461
DEBUG - 2022-10-04 04:29:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:29:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:29:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:29:36 --> Total execution time: 0.1523
DEBUG - 2022-10-04 04:29:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:29:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:29:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:29:42 --> Total execution time: 0.1188
DEBUG - 2022-10-04 04:29:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:29:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:29:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:29:49 --> Total execution time: 0.1286
DEBUG - 2022-10-04 04:30:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:30:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:30:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:30:06 --> Total execution time: 0.1276
DEBUG - 2022-10-04 04:30:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:30:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:30:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:30:16 --> Total execution time: 0.1202
DEBUG - 2022-10-04 04:30:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:30:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:30:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:30:39 --> Total execution time: 0.1409
DEBUG - 2022-10-04 04:30:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:30:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:30:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:30:58 --> Total execution time: 0.1251
DEBUG - 2022-10-04 04:31:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:31:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:31:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:31:12 --> Total execution time: 0.1309
DEBUG - 2022-10-04 04:31:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:31:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:31:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:31:26 --> Total execution time: 0.1106
DEBUG - 2022-10-04 04:31:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:31:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:31:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:31:38 --> Total execution time: 0.1052
DEBUG - 2022-10-04 04:32:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:32:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:32:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:32:01 --> Total execution time: 0.1253
DEBUG - 2022-10-04 04:32:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:32:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:32:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:32:02 --> Total execution time: 0.1253
DEBUG - 2022-10-04 04:32:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:32:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:32:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:32:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:32:22 --> No URI present. Default controller set.
DEBUG - 2022-10-04 04:32:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:32:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:32:22 --> Total execution time: 0.0588
DEBUG - 2022-10-04 04:32:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:32:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:32:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:32:24 --> Total execution time: 0.0645
DEBUG - 2022-10-04 04:32:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:32:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:32:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:32:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:32:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:32:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:32:30 --> Total execution time: 0.1564
DEBUG - 2022-10-04 04:33:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:33:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:33:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:33:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:33:53 --> No URI present. Default controller set.
DEBUG - 2022-10-04 04:33:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:33:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:33:53 --> Total execution time: 0.0720
DEBUG - 2022-10-04 04:33:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:33:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:33:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:33:54 --> Total execution time: 0.0664
DEBUG - 2022-10-04 04:34:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:34:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:34:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:34:11 --> Total execution time: 0.0675
DEBUG - 2022-10-04 04:34:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:34:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:34:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:34:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:34:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:34:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:34:15 --> Total execution time: 0.1448
DEBUG - 2022-10-04 04:34:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:34:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:34:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:34:58 --> Total execution time: 0.1249
DEBUG - 2022-10-04 04:39:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:39:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:39:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:39:59 --> Total execution time: 0.1100
DEBUG - 2022-10-04 04:40:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:40:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:40:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:40:10 --> Total execution time: 0.1035
DEBUG - 2022-10-04 04:40:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:40:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:40:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:40:16 --> Total execution time: 0.1200
DEBUG - 2022-10-04 04:41:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:41:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:41:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:41:20 --> Total execution time: 0.1334
DEBUG - 2022-10-04 04:41:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:41:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:41:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:41:21 --> Total execution time: 0.1246
DEBUG - 2022-10-04 04:41:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:41:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:41:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:41:26 --> Total execution time: 0.1290
DEBUG - 2022-10-04 04:41:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:41:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:41:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:41:34 --> Total execution time: 0.1351
DEBUG - 2022-10-04 04:41:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:41:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:41:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:41:48 --> Total execution time: 0.1049
DEBUG - 2022-10-04 04:43:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:43:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:43:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:43:46 --> Total execution time: 0.1200
DEBUG - 2022-10-04 04:44:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:44:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:44:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:44:25 --> Total execution time: 0.1333
DEBUG - 2022-10-04 04:44:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:44:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:44:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:44:45 --> Total execution time: 0.1246
DEBUG - 2022-10-04 04:45:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:45:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:45:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:45:40 --> Total execution time: 0.1273
DEBUG - 2022-10-04 04:47:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:47:37 --> No URI present. Default controller set.
DEBUG - 2022-10-04 04:47:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:47:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:47:37 --> Total execution time: 0.0484
DEBUG - 2022-10-04 04:47:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:47:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:47:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:47:39 --> Total execution time: 0.0450
DEBUG - 2022-10-04 04:47:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:47:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:47:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:47:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:47:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:47:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:47:48 --> Total execution time: 0.1904
DEBUG - 2022-10-04 04:48:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:48:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:48:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:48:57 --> Total execution time: 0.1063
DEBUG - 2022-10-04 04:48:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:48:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:48:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:48:58 --> Total execution time: 0.1196
DEBUG - 2022-10-04 04:49:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:49:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:49:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:49:20 --> Total execution time: 0.1260
DEBUG - 2022-10-04 04:49:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:49:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:49:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:49:45 --> Total execution time: 0.1321
DEBUG - 2022-10-04 04:49:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:49:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:49:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:49:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:49:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:49:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:49:59 --> Total execution time: 0.1219
DEBUG - 2022-10-04 04:50:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:50:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:50:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:50:00 --> Total execution time: 0.1415
DEBUG - 2022-10-04 04:50:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:50:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:50:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:50:17 --> Total execution time: 0.0600
DEBUG - 2022-10-04 04:50:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:50:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:50:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:50:28 --> Total execution time: 0.1086
DEBUG - 2022-10-04 04:55:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:55:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:55:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:55:55 --> Total execution time: 0.1117
DEBUG - 2022-10-04 04:55:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:55:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:55:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:55:57 --> Total execution time: 0.1152
DEBUG - 2022-10-04 04:56:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:56:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:56:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:56:28 --> Total execution time: 0.1268
DEBUG - 2022-10-04 04:56:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:56:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:56:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:56:31 --> Total execution time: 0.1221
DEBUG - 2022-10-04 04:56:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:56:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:56:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:56:46 --> Total execution time: 0.1050
DEBUG - 2022-10-04 04:57:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:57:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:57:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:57:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:57:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:57:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:57:30 --> Total execution time: 0.0710
DEBUG - 2022-10-04 04:57:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:57:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:57:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:57:32 --> Total execution time: 0.1305
DEBUG - 2022-10-04 04:58:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:58:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:58:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:58:37 --> Total execution time: 0.1421
DEBUG - 2022-10-04 04:59:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 04:59:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 04:59:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 04:59:10 --> Total execution time: 0.1044
DEBUG - 2022-10-04 05:00:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:00:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:00:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:00:02 --> Total execution time: 0.1287
DEBUG - 2022-10-04 05:00:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:00:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:00:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:00:27 --> Total execution time: 0.1161
DEBUG - 2022-10-04 05:00:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:00:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:00:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:00:50 --> Total execution time: 0.1100
DEBUG - 2022-10-04 05:01:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:01:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:01:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:01:22 --> Total execution time: 0.1251
DEBUG - 2022-10-04 05:01:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:01:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:01:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:01:31 --> Total execution time: 0.1356
DEBUG - 2022-10-04 05:02:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:02:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:02:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:02:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:02:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:02:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:02:17 --> Total execution time: 0.0724
DEBUG - 2022-10-04 05:02:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:02:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:02:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:02:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:02:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:02:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:02:19 --> Total execution time: 0.0732
DEBUG - 2022-10-04 05:02:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:02:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:02:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:02:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:02:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:02:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:02:21 --> Total execution time: 0.0888
DEBUG - 2022-10-04 05:02:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:02:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:02:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:02:22 --> Total execution time: 0.1293
DEBUG - 2022-10-04 05:03:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:03:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:03:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:03:22 --> Total execution time: 0.1231
DEBUG - 2022-10-04 05:03:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:03:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:03:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:03:39 --> Total execution time: 0.1288
DEBUG - 2022-10-04 05:04:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:04:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:04:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:04:18 --> Total execution time: 0.1205
DEBUG - 2022-10-04 05:04:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:04:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:04:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:04:28 --> Total execution time: 0.1193
DEBUG - 2022-10-04 05:04:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:04:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:04:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:04:36 --> Total execution time: 0.1204
DEBUG - 2022-10-04 05:04:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:04:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:04:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:04:43 --> Total execution time: 0.1443
DEBUG - 2022-10-04 05:04:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:04:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:04:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:04:55 --> Total execution time: 0.1453
DEBUG - 2022-10-04 05:05:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:05:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:05:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:05:38 --> Total execution time: 0.1172
DEBUG - 2022-10-04 05:06:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:06:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:06:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:06:06 --> Total execution time: 0.1260
DEBUG - 2022-10-04 05:10:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:10:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:10:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:10:29 --> Total execution time: 0.1062
DEBUG - 2022-10-04 05:11:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:11:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:11:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:11:58 --> Total execution time: 0.1073
DEBUG - 2022-10-04 05:12:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:12:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:12:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:12:10 --> Total execution time: 0.1117
DEBUG - 2022-10-04 05:12:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:12:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:12:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:12:28 --> Total execution time: 0.1263
DEBUG - 2022-10-04 05:12:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:12:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:12:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:12:37 --> Total execution time: 0.1284
DEBUG - 2022-10-04 05:12:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:12:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:12:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:12:50 --> Total execution time: 0.1197
DEBUG - 2022-10-04 05:12:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:12:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:12:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:12:55 --> Total execution time: 0.1136
DEBUG - 2022-10-04 05:14:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:14:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:14:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:14:25 --> Total execution time: 0.1291
DEBUG - 2022-10-04 05:15:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:15:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:15:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:15:36 --> Total execution time: 0.1324
DEBUG - 2022-10-04 05:15:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:15:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:15:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:15:37 --> Total execution time: 0.1261
DEBUG - 2022-10-04 05:18:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:18:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:18:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:18:58 --> Total execution time: 0.1059
DEBUG - 2022-10-04 05:19:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:19:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:19:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:19:46 --> Total execution time: 0.1970
DEBUG - 2022-10-04 05:20:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:20:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:20:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:20:31 --> Total execution time: 0.1259
DEBUG - 2022-10-04 05:20:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:20:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:20:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:20:55 --> Total execution time: 0.1308
DEBUG - 2022-10-04 05:21:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:21:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:21:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:21:01 --> Total execution time: 0.1485
DEBUG - 2022-10-04 05:21:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:21:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:21:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:21:43 --> Total execution time: 0.1335
DEBUG - 2022-10-04 05:24:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:24:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:24:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:24:29 --> Total execution time: 0.1140
DEBUG - 2022-10-04 05:24:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:24:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:24:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:24:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:24:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:24:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:24:30 --> Total execution time: 0.1231
DEBUG - 2022-10-04 05:25:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:25:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:25:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:25:01 --> Total execution time: 0.1578
DEBUG - 2022-10-04 05:25:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:25:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:25:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:25:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:25:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:25:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:25:01 --> Total execution time: 0.1299
DEBUG - 2022-10-04 05:25:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:25:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:25:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:25:21 --> Total execution time: 0.1231
DEBUG - 2022-10-04 05:25:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:25:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:25:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:25:44 --> Total execution time: 0.1259
DEBUG - 2022-10-04 05:25:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:25:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:25:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:25:48 --> Total execution time: 0.1374
DEBUG - 2022-10-04 05:27:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 05:27:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 05:27:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 05:27:29 --> Total execution time: 0.1231
DEBUG - 2022-10-04 17:27:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:27:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:27:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:27:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:27:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:27:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:27:51 --> Total execution time: 0.0843
DEBUG - 2022-10-04 17:28:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:28:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:28:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:28:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:28:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:28:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:28:01 --> Total execution time: 0.6264
DEBUG - 2022-10-04 17:28:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:28:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:28:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:28:18 --> Total execution time: 0.1103
DEBUG - 2022-10-04 17:28:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:28:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:28:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:28:20 --> Total execution time: 0.1223
DEBUG - 2022-10-04 17:40:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:40:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:40:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:40:07 --> Total execution time: 0.0763
DEBUG - 2022-10-04 17:40:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:40:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:40:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:09 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:10 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:11 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
DEBUG - 2022-10-04 17:40:11 --> Total execution time: 2.1268
DEBUG - 2022-10-04 17:40:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:40:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:40:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:40:34 --> Total execution time: 0.0777
DEBUG - 2022-10-04 17:40:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:40:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:40:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Produto.php 267
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:35 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 219
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 224
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 229
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 230
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 233
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 235
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 236
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 238
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 241
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:36 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 431
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 444
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 445
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'cod_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'nome_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 450
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'nome_tipo_produto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 455
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'cod_unidade_medida' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 460
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 466
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 467
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 476
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 477
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 487
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'valor_unitario' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'quantidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 488
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 497
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:37 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 590
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 591
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 593
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 598
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 605
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 606
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 608
ERROR - 2022-10-04 17:40:38 --> Severity: Notice --> Trying to get property 'seq_produto_nf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 613
DEBUG - 2022-10-04 17:40:38 --> Total execution time: 2.8778
DEBUG - 2022-10-04 17:40:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 17:40:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 17:40:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 17:40:55 --> Total execution time: 0.0852
DEBUG - 2022-10-04 19:00:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:00:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:00:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:00:03 --> Total execution time: 0.0889
DEBUG - 2022-10-04 19:00:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:00:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:00:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:00:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:00:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:00:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:00:06 --> Total execution time: 0.3701
DEBUG - 2022-10-04 19:00:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:00:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:00:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:00:09 --> Total execution time: 0.0570
DEBUG - 2022-10-04 19:00:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:00:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:00:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:00:11 --> Total execution time: 0.0941
DEBUG - 2022-10-04 19:04:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:04:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:04:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:04:45 --> Total execution time: 0.0964
DEBUG - 2022-10-04 19:04:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:04:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:04:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:04:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:04:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:04:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:04:47 --> Total execution time: 0.1776
DEBUG - 2022-10-04 19:04:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:04:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:04:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:04:49 --> Total execution time: 0.0811
DEBUG - 2022-10-04 19:08:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:08:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:08:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:08:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:08:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:08:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:08:58 --> Total execution time: 0.1730
DEBUG - 2022-10-04 19:09:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:09:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:09:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:09:00 --> Total execution time: 0.0631
DEBUG - 2022-10-04 19:32:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:32:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:32:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:32:50 --> Total execution time: 0.1990
DEBUG - 2022-10-04 19:32:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:32:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:32:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:32:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:32:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:32:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:32:54 --> Total execution time: 0.2174
DEBUG - 2022-10-04 19:32:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:32:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:32:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:32:56 --> Total execution time: 0.0682
DEBUG - 2022-10-04 19:33:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:33:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:33:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:33:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:33:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:33:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:33:52 --> Total execution time: 0.1670
DEBUG - 2022-10-04 19:33:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:33:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:33:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:33:54 --> Total execution time: 0.0798
DEBUG - 2022-10-04 19:33:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:33:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:33:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:33:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:33:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:33:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:33:55 --> Total execution time: 0.1776
DEBUG - 2022-10-04 19:33:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:33:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:33:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:33:57 --> Total execution time: 0.0890
DEBUG - 2022-10-04 19:34:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:34:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:34:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:34:29 --> Total execution time: 0.0963
DEBUG - 2022-10-04 19:34:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:34:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:34:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:34:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:34:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:34:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:34:31 --> Total execution time: 0.2101
DEBUG - 2022-10-04 19:34:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:34:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:34:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:34:33 --> Total execution time: 0.0681
DEBUG - 2022-10-04 19:34:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:34:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:34:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:34:37 --> Total execution time: 0.0854
DEBUG - 2022-10-04 19:34:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:34:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:34:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:34:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:34:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:34:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:34:39 --> Total execution time: 0.2139
DEBUG - 2022-10-04 19:34:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:34:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:34:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:34:41 --> Total execution time: 0.0739
DEBUG - 2022-10-04 19:38:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:38:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:38:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:38:02 --> Total execution time: 0.0830
DEBUG - 2022-10-04 19:38:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:38:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:38:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:38:04 --> Severity: Notice --> Undefined variable: row C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Faturamento\FaturamentoNotaFiscal.php 88
ERROR - 2022-10-04 19:38:04 --> Severity: error --> Exception: Call to a member function row() on null C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Faturamento\FaturamentoNotaFiscal.php 88
DEBUG - 2022-10-04 19:38:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:38:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:38:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:38:51 --> Total execution time: 0.0797
DEBUG - 2022-10-04 19:38:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:38:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:38:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:38:53 --> Query error: Unknown column 'faturamento_pedido.valor_frete' in 'field list' - Invalid query: SELECT `tb_fat_nota_fiscal`.*, `faturamento_pedido`.`valor_frete`, `faturamento_pedido`.`valor_desconto`
FROM `tb_fat_nota_fiscal`
WHERE `tb_fat_nota_fiscal`.`cod_faturamento_pedido` = '1'
AND `tb_fat_nota_fiscal`.`origem_nf` = 3
 LIMIT 1
DEBUG - 2022-10-04 19:40:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:40:17 --> Total execution time: 0.0884
DEBUG - 2022-10-04 19:40:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:40:19 --> Severity: Notice --> Undefined variable: faturamento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 937
ERROR - 2022-10-04 19:40:19 --> Severity: Notice --> Trying to get property 'cod_cliente' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 952
ERROR - 2022-10-04 19:40:19 --> Severity: Notice --> Trying to get property 'codigo_uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 966
ERROR - 2022-10-04 19:40:19 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 973
ERROR - 2022-10-04 19:40:19 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1045
DEBUG - 2022-10-04 19:40:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:40:19 --> Total execution time: 0.0752
DEBUG - 2022-10-04 19:40:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:40:30 --> Total execution time: 0.0789
DEBUG - 2022-10-04 19:40:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:40:36 --> Total execution time: 0.0731
DEBUG - 2022-10-04 19:40:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:40:37 --> Total execution time: 0.1344
DEBUG - 2022-10-04 19:40:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:40:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:40:47 --> Total execution time: 0.0820
DEBUG - 2022-10-04 19:40:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:40:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:40:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:40:55 --> Severity: Notice --> Undefined variable: faturamento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 937
ERROR - 2022-10-04 19:40:55 --> Severity: Notice --> Undefined property: stdClass::$nf_id C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 942
ERROR - 2022-10-04 19:40:55 --> Severity: Notice --> Trying to get property 'cod_cliente' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 952
ERROR - 2022-10-04 19:40:55 --> Severity: Notice --> Trying to get property 'codigo_uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 966
ERROR - 2022-10-04 19:40:55 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 973
ERROR - 2022-10-04 19:40:55 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1045
ERROR - 2022-10-04 19:40:55 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\helpers\url_helper.php 564
DEBUG - 2022-10-04 19:41:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:41:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:41:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:41:19 --> Total execution time: 0.0937
DEBUG - 2022-10-04 19:41:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:41:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:41:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:41:21 --> Severity: Notice --> Undefined property: stdClass::$nf_id C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 942
ERROR - 2022-10-04 19:41:21 --> Severity: Notice --> Undefined property: stdClass::$c_enq C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1082
ERROR - 2022-10-04 19:41:21 --> Query error: Unknown column 'inf_complementares' in 'field list' - Invalid query: UPDATE `nota_fiscal` SET `inf_complementares` = 'TESTE 1 - ', `status` = 2
WHERE `id_empresa` = '63'
AND `cod_nota_fiscal` = '1'
DEBUG - 2022-10-04 19:43:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:43:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:43:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:43:26 --> Total execution time: 0.0837
DEBUG - 2022-10-04 19:43:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:43:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:43:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:43:27 --> Severity: Notice --> Undefined property: stdClass::$c_enq C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1082
ERROR - 2022-10-04 19:43:27 --> Query error: Unknown column 'inf_complementares' in 'field list' - Invalid query: UPDATE `nota_fiscal` SET `inf_complementares` = 'TESTE 1 - ', `status` = 2
WHERE `id_empresa` = '63'
AND `cod_nota_fiscal` = '1'
DEBUG - 2022-10-04 19:45:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:45:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:45:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:45:39 --> Total execution time: 0.0965
DEBUG - 2022-10-04 19:46:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:46:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:46:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:46:05 --> Query error: Unknown column 'inf_complementares' in 'field list' - Invalid query: UPDATE `nota_fiscal` SET `inf_complementares` = 'TESTE 1 - ', `status` = 2
WHERE `id_empresa` = '63'
AND `cod_nota_fiscal` = '1'
DEBUG - 2022-10-04 19:46:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:46:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:46:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:46:34 --> Total execution time: 0.1130
DEBUG - 2022-10-04 19:46:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:46:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:46:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:46:35 --> Severity: Notice --> Undefined variable: codVendedor C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\models\Fiscal.php 52
DEBUG - 2022-10-04 19:46:35 --> Total execution time: 0.0771
DEBUG - 2022-10-04 19:46:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:46:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:46:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:46:55 --> Total execution time: 0.1230
DEBUG - 2022-10-04 19:59:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:59:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:59:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 19:59:31 --> Query error: Unknown column 'nota_fiscal.valor_unitario' in 'field list' - Invalid query: SELECT `nota_fiscal`.*, (select sum(produto_nota_fiscal.quantidade * nota_fiscal.valor_unitario)
                              from produto_nota_fiscal
                             where produto_nota_fiscal.cod_nota_fiscal = nota_fiscal.cod_nota_fiscal) valor_total
FROM `nota_fiscal`
WHERE `id_empresa` = '63'
AND `cod_nota_fiscal` = '1'
DEBUG - 2022-10-04 19:59:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 19:59:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 19:59:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 19:59:54 --> Total execution time: 0.0780
DEBUG - 2022-10-04 20:04:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:04:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:04:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:04:37 --> Query error: Column 'id_empresa' in where clause is ambiguous - Invalid query: SELECT `nota_fiscal`.*, (select sum(produto_nota_fiscal.quantidade * produto_nota_fiscal.valor_unitario)
                              from produto_nota_fiscal
                             where produto_nota_fiscal.cod_nota_fiscal = nota_fiscal.cod_nota_fiscal) valor_total, `tb_fat_nota_fiscal`.`c_stat`, `tb_fat_nota_fiscal`.`chave`, `tb_fat_nota_fiscal`.`id` as `nf_id`
FROM `nota_fiscal`
LEFT JOIN `tb_fat_nota_fiscal` ON `tb_fat_nota_fiscal`.`cod_faturamento_pedido` = `nota_fiscal`.`cod_nota_fiscal` and `tb_fat_nota_fiscal`.`origem_nf` = 3
WHERE `id_empresa` = '63'
AND `cod_nota_fiscal` = '1'
DEBUG - 2022-10-04 20:05:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:05:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:05:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:05:03 --> Total execution time: 0.0867
DEBUG - 2022-10-04 20:05:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:05:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:05:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:05:45 --> Total execution time: 0.0650
DEBUG - 2022-10-04 20:05:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:05:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:05:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:05:47 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1172
ERROR - 2022-10-04 20:05:47 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 36
ERROR - 2022-10-04 20:05:47 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 38
ERROR - 2022-10-04 20:05:47 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 39
ERROR - 2022-10-04 20:05:47 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 41
ERROR - 2022-10-04 20:05:47 --> Severity: Notice --> Undefined property: NotaFiscalController::$makenfe C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1224
ERROR - 2022-10-04 20:05:47 --> Severity: error --> Exception: Call to a member function getInfNFe() on null C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1224
ERROR - 2022-10-04 20:05:47 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Common.php 570
DEBUG - 2022-10-04 20:06:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:06:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:06:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:06:26 --> Total execution time: 0.0885
DEBUG - 2022-10-04 20:06:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:06:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:06:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:06:28 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1172
ERROR - 2022-10-04 20:06:28 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 36
ERROR - 2022-10-04 20:06:28 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 38
ERROR - 2022-10-04 20:06:28 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 39
ERROR - 2022-10-04 20:06:28 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 41
ERROR - 2022-10-04 20:06:28 --> Severity: Notice --> Undefined property: NotaFiscalController::$makenfe C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1224
ERROR - 2022-10-04 20:06:28 --> Severity: error --> Exception: Call to a member function getInfNFe() on null C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1224
ERROR - 2022-10-04 20:06:28 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Common.php 570
DEBUG - 2022-10-04 20:07:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:07:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:07:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:07:36 --> Total execution time: 0.0790
DEBUG - 2022-10-04 20:07:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:07:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:07:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:07:39 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 36
ERROR - 2022-10-04 20:07:39 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 38
ERROR - 2022-10-04 20:07:39 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 39
ERROR - 2022-10-04 20:07:39 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 41
ERROR - 2022-10-04 20:07:39 --> Severity: Notice --> Undefined property: NotaFiscalController::$makenfe C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1224
ERROR - 2022-10-04 20:07:39 --> Severity: error --> Exception: Call to a member function getInfNFe() on null C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1224
ERROR - 2022-10-04 20:07:39 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Common.php 570
DEBUG - 2022-10-04 20:08:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:08:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:08:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:08:41 --> Total execution time: 0.0867
DEBUG - 2022-10-04 20:08:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:08:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:08:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:08:42 --> Severity: Notice --> Undefined property: NotaFiscalController::$makenfe C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1224
ERROR - 2022-10-04 20:08:42 --> Severity: error --> Exception: Call to a member function getInfNFe() on null C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1224
DEBUG - 2022-10-04 20:10:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:10:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:10:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:10:00 --> Total execution time: 0.0957
DEBUG - 2022-10-04 20:10:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:10:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:10:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:10:19 --> Total execution time: 0.0879
DEBUG - 2022-10-04 20:10:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:10:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:10:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'cnpj_cpf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 139
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'razao_social' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 140
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'tipo_contrib_icms' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 146
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'insc_estadual' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 147
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'bairro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 153
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'endereco' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 154
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'numero' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 155
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'nome_cidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 156
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 157
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'codigo_municipio' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 158
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'cep' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 159
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'complemento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 160
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'email' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 161
ERROR - 2022-10-04 20:10:20 --> Severity: Notice --> Trying to get property 'tel_fixo' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 162
ERROR - 2022-10-04 20:10:20 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\helpers\url_helper.php 564
DEBUG - 2022-10-04 20:13:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:13:06 --> Total execution time: 0.1013
DEBUG - 2022-10-04 20:13:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:13:12 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:13:12 --> Total execution time: 0.1796
DEBUG - 2022-10-04 20:13:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:13:15 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:13:15 --> Total execution time: 0.1427
DEBUG - 2022-10-04 20:13:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:13:18 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:13:18 --> Total execution time: 0.1485
DEBUG - 2022-10-04 20:13:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:13:19 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:13:19 --> Total execution time: 0.1353
DEBUG - 2022-10-04 20:13:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:13:21 --> Total execution time: 0.0561
DEBUG - 2022-10-04 20:13:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:13:22 --> Total execution time: 0.0937
DEBUG - 2022-10-04 20:13:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:13:24 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:13:24 --> Total execution time: 0.1541
DEBUG - 2022-10-04 20:13:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:13:28 --> Total execution time: 0.1057
DEBUG - 2022-10-04 20:13:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:13:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:13:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:13:30 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:13:30 --> Total execution time: 0.1485
DEBUG - 2022-10-04 20:14:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:14:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:14:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:14:27 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:14:27 --> Total execution time: 0.1338
DEBUG - 2022-10-04 20:15:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:15:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:15:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:15:46 --> Total execution time: 0.0899
DEBUG - 2022-10-04 20:15:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:15:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:15:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:15:48 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:15:48 --> Total execution time: 0.1348
DEBUG - 2022-10-04 20:15:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:15:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:15:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:15:50 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:15:50 --> Total execution time: 0.1551
DEBUG - 2022-10-04 20:15:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:15:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:15:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:15:57 --> Total execution time: 0.1152
DEBUG - 2022-10-04 20:16:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:16:01 --> Total execution time: 0.0795
DEBUG - 2022-10-04 20:16:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:16:03 --> Total execution time: 0.0744
DEBUG - 2022-10-04 20:16:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:16:05 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:16:05 --> Total execution time: 0.1354
DEBUG - 2022-10-04 20:16:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:16:07 --> Total execution time: 0.1006
DEBUG - 2022-10-04 20:16:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:16:43 --> Total execution time: 0.0812
DEBUG - 2022-10-04 20:16:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:16:45 --> Total execution time: 0.1077
DEBUG - 2022-10-04 20:16:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:16:47 --> Total execution time: 0.0791
DEBUG - 2022-10-04 20:16:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:16:49 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:16:49 --> Total execution time: 0.1607
DEBUG - 2022-10-04 20:16:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:16:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:16:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:16:51 --> Total execution time: 0.0864
DEBUG - 2022-10-04 20:18:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:18:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:18:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:18:00 --> Total execution time: 0.0975
DEBUG - 2022-10-04 20:18:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:18:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:18:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:18:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:18:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:18:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:18:04 --> Total execution time: 0.0917
DEBUG - 2022-10-04 20:18:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:18:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:18:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:18:06 --> Total execution time: 0.0833
DEBUG - 2022-10-04 20:18:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:18:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:18:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:18:09 --> Total execution time: 0.1244
DEBUG - 2022-10-04 20:18:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:18:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:18:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:18:10 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:18:10 --> Total execution time: 0.1509
DEBUG - 2022-10-04 20:18:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:18:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:18:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:18:13 --> Total execution time: 0.1162
DEBUG - 2022-10-04 20:19:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:19:03 --> Total execution time: 0.0948
DEBUG - 2022-10-04 20:19:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:19:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:19:05 --> Total execution time: 0.0719
DEBUG - 2022-10-04 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:19:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:19:07 --> Total execution time: 0.0848
DEBUG - 2022-10-04 20:19:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:19:09 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:19:10 --> Total execution time: 0.1576
DEBUG - 2022-10-04 20:19:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:19:19 --> Total execution time: 0.0816
DEBUG - 2022-10-04 20:19:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:19:19 --> Total execution time: 0.0724
DEBUG - 2022-10-04 20:19:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:19:22 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:19:23 --> Total execution time: 0.1412
DEBUG - 2022-10-04 20:19:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:19:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:19:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:19:24 --> Total execution time: 0.0766
DEBUG - 2022-10-04 20:27:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:27:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:27:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:27:29 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:27:29 --> Total execution time: 0.1307
DEBUG - 2022-10-04 20:27:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:27:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:27:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:27:33 --> Total execution time: 0.0905
DEBUG - 2022-10-04 20:28:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:28:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:28:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:28:22 --> Total execution time: 0.1220
DEBUG - 2022-10-04 20:28:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:28:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:28:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:28:24 --> Severity: Notice --> Undefined property: stdClass::$outras_despesas C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 223
DEBUG - 2022-10-04 20:29:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:29:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:29:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:29:36 --> Total execution time: 0.0879
DEBUG - 2022-10-04 20:29:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:29:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:29:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:29:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:29:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:29:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 96
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 97
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 98
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 103
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 108
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 113
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 36
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 38
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 39
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 41
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'data_emissao' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 66
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'nome' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 71
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'operacao_fiscal' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 77
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indentificador_destino' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 78
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'finalidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 84
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_final' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 85
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 86
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cnpj_cpf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 139
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'razao_social' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 140
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'tipo_contrib_icms' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 146
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'insc_estadual' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 147
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'bairro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 153
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'endereco' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 154
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'numero' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 155
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'nome_cidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 156
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 157
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'codigo_municipio' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 158
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cep' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 159
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'complemento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 160
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'email' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 161
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'tel_fixo' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 162
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'tipo_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 469
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'informacoes_complementares' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 542
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 143
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'x_motivo' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 144
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 10
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 43
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 48
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 53
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_cliente' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 58
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'nome_cliente' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 58
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'data_faturamento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 66
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'valor_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 74
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'valor_seguro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 80
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'outras_despesas' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 86
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'valor_desconto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 92
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'valor_total' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 100
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'valor_total' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 106
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'valor_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 106
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'valor_seguro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 106
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'outras_despesas' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 106
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'valor_desconto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 107
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 121
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 121
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 121
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_final' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 136
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_final' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 136
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'informacoes_complementares' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 158
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 168
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 227
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 335
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 339
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 340
ERROR - 2022-10-04 20:29:39 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 421
DEBUG - 2022-10-04 20:29:39 --> Total execution time: 0.7730
DEBUG - 2022-10-04 20:31:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:31:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:31:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:31:11 --> Total execution time: 0.0788
DEBUG - 2022-10-04 20:31:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:31:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:31:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:31:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:31:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:31:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 96
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 97
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 98
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 103
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 108
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 113
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 36
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 38
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 39
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 41
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'data_emissao' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 66
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'nome' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 71
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'operacao_fiscal' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 77
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indentificador_destino' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 78
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'finalidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 84
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_final' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 85
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 86
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cnpj_cpf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 139
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'razao_social' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 140
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'tipo_contrib_icms' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 146
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'insc_estadual' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 147
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'bairro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 153
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'endereco' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 154
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'numero' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 155
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'nome_cidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 156
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 157
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'codigo_municipio' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 158
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cep' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 159
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'complemento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 160
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'email' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 161
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'tel_fixo' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 162
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'tipo_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 469
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'informacoes_complementares' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFe.php 542
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'c_stat' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 143
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'x_motivo' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 144
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 10
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 43
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 48
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 53
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cod_cliente' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 58
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'nome_cliente' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 58
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'data_faturamento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 66
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'valor_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 74
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'valor_seguro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 80
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'outras_despesas' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 86
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'valor_desconto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 92
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'valor_total' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 100
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'valor_total' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 106
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'valor_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 106
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'valor_seguro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 106
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'outras_despesas' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 106
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'valor_desconto' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 107
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 121
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 121
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 121
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_final' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 136
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_final' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 136
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 148
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'informacoes_complementares' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 158
ERROR - 2022-10-04 20:31:13 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 168
ERROR - 2022-10-04 20:31:14 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 227
ERROR - 2022-10-04 20:31:14 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 335
ERROR - 2022-10-04 20:31:14 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 339
ERROR - 2022-10-04 20:31:14 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 340
ERROR - 2022-10-04 20:31:14 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\faturamento\configure-edit.php 421
DEBUG - 2022-10-04 20:31:14 --> Total execution time: 0.8773
DEBUG - 2022-10-04 20:31:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:31:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:31:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:31:42 --> Total execution time: 0.0801
DEBUG - 2022-10-04 20:32:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:32:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:32:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:32:16 --> Total execution time: 0.0864
DEBUG - 2022-10-04 20:32:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:32:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:32:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:32:17 --> Total execution time: 0.1406
DEBUG - 2022-10-04 20:32:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:32:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:32:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:32:41 --> Total execution time: 0.0770
DEBUG - 2022-10-04 20:32:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:32:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:32:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:32:44 --> Total execution time: 0.1519
DEBUG - 2022-10-04 20:32:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:32:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:32:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:32:49 --> Total execution time: 0.1641
DEBUG - 2022-10-04 20:33:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:33:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:33:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:33:10 --> Total execution time: 0.1330
DEBUG - 2022-10-04 20:34:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:34:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:34:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:34:35 --> Total execution time: 0.0715
DEBUG - 2022-10-04 20:34:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:34:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:34:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:34:44 --> Total execution time: 0.0663
DEBUG - 2022-10-04 20:35:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:35:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:35:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:35:23 --> Total execution time: 0.0883
DEBUG - 2022-10-04 20:36:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:36:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:36:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:36:39 --> Total execution time: 0.0823
DEBUG - 2022-10-04 20:37:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:37:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:37:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:37:03 --> Total execution time: 0.0877
DEBUG - 2022-10-04 20:37:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:37:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:37:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:37:17 --> Total execution time: 0.0948
DEBUG - 2022-10-04 20:38:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:38:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:38:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:38:41 --> Total execution time: 0.0837
DEBUG - 2022-10-04 20:39:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:39:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:39:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:39:00 --> Total execution time: 0.1635
DEBUG - 2022-10-04 20:39:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:39:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:39:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:39:38 --> Total execution time: 0.0906
DEBUG - 2022-10-04 20:39:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:39:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:39:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:39:43 --> Total execution time: 0.0866
DEBUG - 2022-10-04 20:40:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:40:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:40:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:40:28 --> Total execution time: 0.0774
DEBUG - 2022-10-04 20:40:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:40:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:40:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:40:31 --> Total execution time: 0.0976
DEBUG - 2022-10-04 20:40:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:40:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:40:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:40:34 --> Total execution time: 0.1417
DEBUG - 2022-10-04 20:45:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:45:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:45:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:45:00 --> Total execution time: 0.0869
DEBUG - 2022-10-04 20:45:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:45:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:45:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:45:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:45:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:45:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:45:02 --> Total execution time: 0.0825
DEBUG - 2022-10-04 20:45:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:45:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:45:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:45:56 --> Total execution time: 0.0812
DEBUG - 2022-10-04 20:46:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:05 --> Total execution time: 0.0677
DEBUG - 2022-10-04 20:46:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:08 --> Total execution time: 0.0774
DEBUG - 2022-10-04 20:46:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:09 --> Total execution time: 0.1416
DEBUG - 2022-10-04 20:46:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:21 --> Total execution time: 0.0745
DEBUG - 2022-10-04 20:46:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:23 --> Total execution time: 0.0759
DEBUG - 2022-10-04 20:46:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:25 --> Total execution time: 0.1503
DEBUG - 2022-10-04 20:46:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:46:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:46:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:46:37 --> Total execution time: 0.0984
DEBUG - 2022-10-04 20:47:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:04 --> Total execution time: 0.0976
DEBUG - 2022-10-04 20:47:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:05 --> Total execution time: 0.0599
DEBUG - 2022-10-04 20:47:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:08 --> Total execution time: 0.1579
DEBUG - 2022-10-04 20:47:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:44 --> Total execution time: 0.0971
DEBUG - 2022-10-04 20:47:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:46 --> Total execution time: 0.0859
DEBUG - 2022-10-04 20:47:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:48 --> Total execution time: 0.0879
DEBUG - 2022-10-04 20:47:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:47:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:47:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:47:51 --> Total execution time: 0.1576
DEBUG - 2022-10-04 20:54:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:54:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:54:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:54:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:54:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:54:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:54:51 --> Total execution time: 0.1083
DEBUG - 2022-10-04 20:55:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:55:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:55:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:55:01 --> Total execution time: 0.0834
DEBUG - 2022-10-04 20:55:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:55:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:55:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:55:02 --> Total execution time: 0.0909
DEBUG - 2022-10-04 20:55:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:55:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:55:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:55:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:55:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:55:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:55:18 --> Total execution time: 0.0718
DEBUG - 2022-10-04 20:55:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:55:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:55:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:55:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:55:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:55:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:55:19 --> Total execution time: 0.0756
DEBUG - 2022-10-04 20:55:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:55:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:55:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:55:22 --> Total execution time: 0.1664
DEBUG - 2022-10-04 20:56:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:56:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:56:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:56:16 --> Total execution time: 0.0791
DEBUG - 2022-10-04 20:56:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:56:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:56:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:56:17 --> Total execution time: 0.0866
DEBUG - 2022-10-04 20:57:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:57:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:57:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:57:29 --> Total execution time: 0.0951
DEBUG - 2022-10-04 20:58:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:58:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:58:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:58:43 --> Total execution time: 0.1201
DEBUG - 2022-10-04 20:58:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 20:58:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 20:58:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 20:58:52 --> Total execution time: 0.0843
DEBUG - 2022-10-04 21:01:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:01:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:01:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:01:24 --> Total execution time: 0.0822
DEBUG - 2022-10-04 21:01:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:01:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:01:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:01:26 --> Total execution time: 0.0962
DEBUG - 2022-10-04 21:01:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:01:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:01:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:01:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:01:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:01:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:01:37 --> Total execution time: 0.0875
DEBUG - 2022-10-04 21:01:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:01:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:01:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:01:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:01:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:01:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:01:41 --> Total execution time: 0.0814
DEBUG - 2022-10-04 21:03:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:03:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:03:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:03:43 --> Total execution time: 0.1377
DEBUG - 2022-10-04 21:05:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:05:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:05:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:05:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:05:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:05:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:05:11 --> Total execution time: 0.0914
DEBUG - 2022-10-04 21:05:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:05:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:05:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:05:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:05:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:05:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:05:18 --> Total execution time: 0.0669
DEBUG - 2022-10-04 21:05:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:05:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:05:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:05:21 --> Total execution time: 0.1732
DEBUG - 2022-10-04 21:06:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:06:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:06:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:06:24 --> Total execution time: 0.1123
DEBUG - 2022-10-04 21:06:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:06:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:06:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:06:29 --> Total execution time: 0.0790
DEBUG - 2022-10-04 21:06:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:06:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:06:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:06:30 --> Total execution time: 0.0855
DEBUG - 2022-10-04 21:07:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:07:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:07:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 21:07:20 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 340
ERROR - 2022-10-04 21:07:20 --> Severity: Notice --> Trying to get property 'id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 340
ERROR - 2022-10-04 21:07:20 --> Severity: Notice --> Undefined variable: nota C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 341
ERROR - 2022-10-04 21:07:20 --> Severity: Notice --> Trying to get property 'num_pedido_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 341
DEBUG - 2022-10-04 21:07:20 --> Total execution time: 0.1168
DEBUG - 2022-10-04 21:08:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:08:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:08:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:08:00 --> Total execution time: 0.0953
DEBUG - 2022-10-04 21:08:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:08:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:08:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:08:10 --> Total execution time: 0.0934
DEBUG - 2022-10-04 21:20:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:20:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:20:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:20:40 --> Total execution time: 0.0840
DEBUG - 2022-10-04 21:20:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:20:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:20:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 36
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 38
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 39
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 41
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'data_emissao' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 66
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'nome' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 71
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'operacao_fiscal' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 77
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'indentificador_destino' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 78
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'finalidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 84
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'indicador_final' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 85
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 86
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'cnpj_cpf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 139
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'razao_social' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 140
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'tipo_contrib_icms' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 146
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'insc_estadual' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 147
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'bairro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 153
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'endereco' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 154
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'numero' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 155
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'nome_cidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 156
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 157
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'codigo_municipio' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 158
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'cep' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 159
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'complemento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 160
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'email' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 161
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'tel_fixo' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 162
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'tipo_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 469
ERROR - 2022-10-04 21:20:43 --> Severity: Notice --> Trying to get property 'informacoes_complementares' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 542
ERROR - 2022-10-04 21:20:44 --> Severity: Warning --> DOMDocument::loadXML(): Empty string supplied as input C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\CommonNFe.php 69
ERROR - 2022-10-04 21:20:44 --> Severity: error --> Exception: Call to a member function getAttribute() on null C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\CommonNFe.php 83
ERROR - 2022-10-04 21:20:44 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Common.php 570
DEBUG - 2022-10-04 21:22:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:22:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:22:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:22:22 --> Total execution time: 0.0859
DEBUG - 2022-10-04 21:22:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:22:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:22:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:22:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:22:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:22:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:22:25 --> Total execution time: 0.0697
DEBUG - 2022-10-04 21:22:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:22:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:22:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:22:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:22:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:22:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:22:26 --> Total execution time: 0.0964
DEBUG - 2022-10-04 21:22:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:22:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:22:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:22:29 --> Total execution time: 0.1508
DEBUG - 2022-10-04 21:22:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:22:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:22:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 36
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'tb_fis_natureza_operacao_id' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 38
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'cod_faturamento_pedido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 39
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'cod_transportador' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 41
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'data_emissao' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 66
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'nome' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 71
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'operacao_fiscal' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 77
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'indentificador_destino' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 78
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'finalidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 84
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'indicador_final' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 85
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'indicador_presencial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 86
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'cnpj_cpf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 139
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'razao_social' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 140
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'tipo_contrib_icms' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 146
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'insc_estadual' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 147
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'bairro' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 153
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'endereco' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 154
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'numero' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 155
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'nome_cidade' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 156
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'uf' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 157
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'codigo_municipio' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 158
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'cep' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 159
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'complemento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 160
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'email' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 161
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'tel_fixo' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 162
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'tipo_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 469
ERROR - 2022-10-04 21:22:37 --> Severity: Notice --> Trying to get property 'informacoes_complementares' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\MakeNFeAvulsa.php 542
ERROR - 2022-10-04 21:22:37 --> Severity: Warning --> DOMDocument::loadXML(): Empty string supplied as input C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\CommonNFe.php 69
ERROR - 2022-10-04 21:22:37 --> Severity: error --> Exception: Call to a member function getAttribute() on null C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\CommonNFe.php 83
ERROR - 2022-10-04 21:22:37 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Exceptions.php:271) C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\system\core\Common.php 570
DEBUG - 2022-10-04 21:24:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:24:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:24:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:24:47 --> Total execution time: 0.2214
DEBUG - 2022-10-04 21:24:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:24:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:24:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:24:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:24:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:24:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:24:51 --> Total execution time: 0.0724
DEBUG - 2022-10-04 21:24:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:24:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:24:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:24:54 --> Total execution time: 0.1519
DEBUG - 2022-10-04 21:33:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:33:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:33:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:33:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:33:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:33:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:33:14 --> Total execution time: 0.0984
DEBUG - 2022-10-04 21:33:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:33:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:33:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:33:17 --> Total execution time: 0.1629
DEBUG - 2022-10-04 21:38:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:38:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:38:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:38:28 --> Total execution time: 0.1339
DEBUG - 2022-10-04 21:39:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:39:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:39:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:39:18 --> Total execution time: 0.0760
DEBUG - 2022-10-04 21:39:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:39:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:39:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:39:31 --> Total execution time: 0.0956
DEBUG - 2022-10-04 21:39:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:39:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:39:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:39:32 --> Total execution time: 0.0903
DEBUG - 2022-10-04 21:39:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:39:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:39:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:39:46 --> Total execution time: 0.0892
DEBUG - 2022-10-04 21:39:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:39:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:39:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:39:53 --> Total execution time: 0.1129
DEBUG - 2022-10-04 21:41:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:41:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:41:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:41:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:41:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:41:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:41:24 --> Total execution time: 0.1006
DEBUG - 2022-10-04 21:44:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:44:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:44:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:44:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:44:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:44:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:44:14 --> Total execution time: 0.0969
DEBUG - 2022-10-04 21:45:25 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:45:25 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:45:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:45:25 --> Total execution time: 0.0623
DEBUG - 2022-10-04 21:50:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:50:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:50:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:50:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:50:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:50:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:50:45 --> Total execution time: 0.0871
DEBUG - 2022-10-04 21:50:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:50:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:50:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:50:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:50:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:50:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:50:47 --> Total execution time: 0.0943
DEBUG - 2022-10-04 21:50:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:50:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:50:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:50:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:50:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:50:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:50:51 --> Total execution time: 0.1097
DEBUG - 2022-10-04 21:50:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:50:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:50:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:50:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:50:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:50:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:50:57 --> Total execution time: 0.0858
DEBUG - 2022-10-04 21:51:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:01 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:01 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:01 --> Total execution time: 0.1179
DEBUG - 2022-10-04 21:51:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:04 --> Total execution time: 0.1054
DEBUG - 2022-10-04 21:51:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:13 --> Total execution time: 0.0822
DEBUG - 2022-10-04 21:51:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:17 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:17 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:17 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:17 --> Total execution time: 0.0896
DEBUG - 2022-10-04 21:51:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:18 --> Total execution time: 0.0929
DEBUG - 2022-10-04 21:51:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:23 --> Total execution time: 0.1518
DEBUG - 2022-10-04 21:51:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:51:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:51:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:51:26 --> Total execution time: 0.1088
DEBUG - 2022-10-04 21:56:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:56:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:56:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:56:46 --> Total execution time: 0.0767
DEBUG - 2022-10-04 21:56:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:56:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:56:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:56:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:56:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:56:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:56:50 --> Total execution time: 0.0980
DEBUG - 2022-10-04 21:56:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:56:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:56:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:56:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:56:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:56:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:56:52 --> Total execution time: 0.0670
DEBUG - 2022-10-04 21:56:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:56:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:56:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:56:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:56:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:56:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:56:56 --> Total execution time: 0.1023
DEBUG - 2022-10-04 21:57:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:57:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:57:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:57:23 --> Total execution time: 0.1522
DEBUG - 2022-10-04 21:57:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:57:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:57:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:57:56 --> Total execution time: 0.0748
DEBUG - 2022-10-04 21:57:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:57:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:57:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:57:58 --> Total execution time: 0.0813
DEBUG - 2022-10-04 21:58:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:03 --> Total execution time: 0.0775
DEBUG - 2022-10-04 21:58:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:33 --> Total execution time: 0.0805
DEBUG - 2022-10-04 21:58:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:36 --> Total execution time: 0.0583
DEBUG - 2022-10-04 21:58:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:38 --> Total execution time: 0.0940
DEBUG - 2022-10-04 21:58:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:41 --> Total execution time: 0.0565
DEBUG - 2022-10-04 21:58:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:42 --> Total execution time: 0.0581
DEBUG - 2022-10-04 21:58:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:43 --> Total execution time: 0.0897
DEBUG - 2022-10-04 21:58:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:47 --> Total execution time: 0.1002
DEBUG - 2022-10-04 21:58:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:50 --> Total execution time: 0.0779
DEBUG - 2022-10-04 21:58:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:58:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:58:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:58:52 --> Total execution time: 0.0601
DEBUG - 2022-10-04 21:59:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:59:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:59:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:59:21 --> Total execution time: 0.0526
DEBUG - 2022-10-04 21:59:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:59:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:59:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 21:59:22 --> Query error: Unknown column 'tb_fat_nota_fiscal.id_empresa' in 'where clause' - Invalid query: SELECT `nota_fiscal`.*, (select sum(produto_nota_fiscal.quantidade * produto_nota_fiscal.valor_unitario)
                              from produto_nota_fiscal
                             where produto_nota_fiscal.cod_nota_fiscal = nota_fiscal.cod_nota_fiscal) valor_total
FROM `nota_fiscal`
WHERE `nota_fiscal`.`id_empresa` = '63'
AND `tb_fat_nota_fiscal`.`id_empresa` = '63'
AND `cod_nota_fiscal` = '2'
DEBUG - 2022-10-04 21:59:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:59:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:59:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 21:59:30 --> Severity: Notice --> Undefined property: stdClass::$nf_id C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\fiscal\editar-nota-fiscal.php 671
DEBUG - 2022-10-04 21:59:30 --> Total execution time: 0.0844
DEBUG - 2022-10-04 21:59:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:59:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:59:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:59:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:59:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:59:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:59:41 --> Total execution time: 0.0725
DEBUG - 2022-10-04 21:59:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 21:59:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 21:59:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 21:59:57 --> Total execution time: 0.0675
DEBUG - 2022-10-04 22:00:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:02 --> Total execution time: 0.0720
DEBUG - 2022-10-04 22:00:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:05 --> Total execution time: 0.0914
DEBUG - 2022-10-04 22:00:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:08 --> Total execution time: 0.0954
DEBUG - 2022-10-04 22:00:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:10 --> Total execution time: 0.1556
DEBUG - 2022-10-04 22:00:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:18 --> Total execution time: 0.1602
DEBUG - 2022-10-04 22:00:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 22:00:30 --> Severity: Notice --> Undefined variable: infCompProcessada C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1167
ERROR - 2022-10-04 22:00:30 --> Severity: Notice --> Undefined variable: avulsa C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1170
ERROR - 2022-10-04 22:00:30 --> Severity: Notice --> Trying to get property 'cod_nota_fiscal' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1170
DEBUG - 2022-10-04 22:00:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:30 --> Total execution time: 0.1192
DEBUG - 2022-10-04 22:00:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:32 --> Total execution time: 0.1279
DEBUG - 2022-10-04 22:00:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:45 --> Total execution time: 0.0881
DEBUG - 2022-10-04 22:00:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:00:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:00:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:00:47 --> Total execution time: 0.0823
DEBUG - 2022-10-04 22:01:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:01:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:01:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:01:31 --> Total execution time: 0.0950
DEBUG - 2022-10-04 22:01:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:01:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:01:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:01:32 --> Total execution time: 0.0828
DEBUG - 2022-10-04 22:01:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:01:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:01:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:01:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:01:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:01:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:01:41 --> Total execution time: 0.0742
DEBUG - 2022-10-04 22:02:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:02:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:02:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:02:36 --> Total execution time: 0.0956
DEBUG - 2022-10-04 22:02:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:02:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:02:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:02:38 --> Total execution time: 0.1140
DEBUG - 2022-10-04 22:02:46 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:02:46 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:02:46 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:02:46 --> Total execution time: 0.0806
DEBUG - 2022-10-04 22:02:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:02:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:02:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:02:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:02:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:02:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:02:49 --> Total execution time: 0.0973
DEBUG - 2022-10-04 22:03:02 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:03:02 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:03:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:03:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:03:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:03:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:03:03 --> Total execution time: 0.0786
DEBUG - 2022-10-04 22:03:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:03:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:03:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:03:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:03:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:03:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:03:06 --> Total execution time: 0.0678
DEBUG - 2022-10-04 22:03:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:03:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:03:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:03:08 --> Total execution time: 0.1650
DEBUG - 2022-10-04 22:03:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:03:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:03:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 22:03:18 --> Severity: Notice --> Undefined variable: avulsa C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1169
ERROR - 2022-10-04 22:03:18 --> Severity: Notice --> Trying to get property 'cod_nota_fiscal' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php 1169
DEBUG - 2022-10-04 22:03:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:03:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:03:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:03:18 --> Total execution time: 0.0704
DEBUG - 2022-10-04 22:03:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:03:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:03:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:03:21 --> Total execution time: 0.0892
DEBUG - 2022-10-04 22:04:07 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:04:07 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:04:07 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:04:07 --> Total execution time: 0.1192
DEBUG - 2022-10-04 22:04:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:04:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:04:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:04:15 --> Total execution time: 0.1265
DEBUG - 2022-10-04 22:05:39 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:05:39 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:05:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:05:39 --> Total execution time: 0.0598
DEBUG - 2022-10-04 22:05:40 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:05:40 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:05:40 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:05:40 --> Total execution time: 0.0621
DEBUG - 2022-10-04 22:06:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:04 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:04 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:04 --> Total execution time: 0.0831
DEBUG - 2022-10-04 22:06:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:09 --> Total execution time: 0.0745
DEBUG - 2022-10-04 22:06:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:12 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:12 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:12 --> Total execution time: 0.0818
DEBUG - 2022-10-04 22:06:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:18 --> Total execution time: 0.0798
DEBUG - 2022-10-04 22:06:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:22 --> Total execution time: 0.1041
DEBUG - 2022-10-04 22:06:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:26 --> Total execution time: 0.0744
DEBUG - 2022-10-04 22:06:28 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:28 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:28 --> Total execution time: 0.1612
DEBUG - 2022-10-04 22:06:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:45 --> Total execution time: 0.0990
DEBUG - 2022-10-04 22:06:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:47 --> Total execution time: 0.1440
DEBUG - 2022-10-04 22:06:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:06:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:06:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:06:53 --> Total execution time: 0.0744
DEBUG - 2022-10-04 22:07:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:21 --> Total execution time: 0.0779
DEBUG - 2022-10-04 22:07:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:37 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:37 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:37 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:37 --> Total execution time: 0.0955
DEBUG - 2022-10-04 22:07:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:41 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:41 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:41 --> Total execution time: 0.0669
DEBUG - 2022-10-04 22:07:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:44 --> Total execution time: 0.1012
DEBUG - 2022-10-04 22:07:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:48 --> Total execution time: 0.0759
DEBUG - 2022-10-04 22:07:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:52 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:52 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:52 --> Total execution time: 0.0742
DEBUG - 2022-10-04 22:07:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:55 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:55 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:55 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:55 --> Total execution time: 0.0925
DEBUG - 2022-10-04 22:07:57 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:07:57 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:07:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:07:57 --> Total execution time: 0.1449
DEBUG - 2022-10-04 22:08:03 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:08:03 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:08:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:08:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:08:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:08:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:08:05 --> Total execution time: 0.0797
DEBUG - 2022-10-04 22:08:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:08:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:08:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:08:08 --> Total execution time: 0.1476
DEBUG - 2022-10-04 22:08:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:08:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:08:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:08:14 --> Total execution time: 0.0900
DEBUG - 2022-10-04 22:08:29 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:08:29 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:08:29 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:08:29 --> Total execution time: 0.0978
DEBUG - 2022-10-04 22:08:31 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:08:31 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:08:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:08:31 --> Total execution time: 0.0772
DEBUG - 2022-10-04 22:08:34 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:08:34 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:08:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:08:34 --> Total execution time: 0.0846
DEBUG - 2022-10-04 22:09:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:09:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:09:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:09:22 --> Total execution time: 0.0786
DEBUG - 2022-10-04 22:38:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:38:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:38:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:38:56 --> Total execution time: 0.0846
DEBUG - 2022-10-04 22:42:30 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:42:30 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:42:30 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:42:30 --> Total execution time: 0.0667
DEBUG - 2022-10-04 22:42:49 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:42:49 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:42:49 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:42:49 --> Total execution time: 0.0640
DEBUG - 2022-10-04 22:42:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:42:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:42:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:42:58 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:42:58 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:42:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:42:58 --> Total execution time: 0.4770
DEBUG - 2022-10-04 22:43:00 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:43:00 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:43:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:43:00 --> Total execution time: 0.0991
DEBUG - 2022-10-04 22:44:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:44:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:44:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:44:32 --> Total execution time: 0.0882
DEBUG - 2022-10-04 22:44:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:44:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:44:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-04 22:44:48 --> Severity: error --> Exception: Argument 2 passed to ToolsNFe::cancelaSefaz() must be of the type string, null given, called in C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\controllers\Faturamento\NotaFiscalController.php on line 607 C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\libraries\ToolsNFe.php 94
DEBUG - 2022-10-04 22:44:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:44:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:44:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:44:54 --> Total execution time: 0.0749
DEBUG - 2022-10-04 22:45:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:45:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:45:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:45:44 --> Total execution time: 0.0948
DEBUG - 2022-10-04 22:45:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:45:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:45:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:45:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:45:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:45:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:45:53 --> Total execution time: 0.0742
DEBUG - 2022-10-04 22:45:56 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:45:56 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:45:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:45:56 --> Total execution time: 0.1687
DEBUG - 2022-10-04 22:46:14 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:46:14 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:46:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:46:14 --> Total execution time: 0.0826
DEBUG - 2022-10-04 22:46:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:46:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:46:18 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:46:18 --> Total execution time: 0.0960
DEBUG - 2022-10-04 22:46:26 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:46:26 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:46:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:46:27 --> Total execution time: 0.1404
DEBUG - 2022-10-04 22:46:36 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:46:36 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:46:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:46:36 --> Total execution time: 0.0634
DEBUG - 2022-10-04 22:47:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:47:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:47:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:47:17 --> Total execution time: 0.0762
DEBUG - 2022-10-04 22:55:22 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:55:22 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:55:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:55:22 --> Total execution time: 0.1968
DEBUG - 2022-10-04 22:55:24 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:55:24 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:55:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:55:24 --> Total execution time: 0.0800
DEBUG - 2022-10-04 22:56:44 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:56:44 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:56:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:56:44 --> Total execution time: 0.0829
DEBUG - 2022-10-04 22:56:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:56:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:56:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:56:50 --> Total execution time: 0.1271
DEBUG - 2022-10-04 22:59:15 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 22:59:15 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 22:59:15 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 22:59:15 --> Total execution time: 0.1054
DEBUG - 2022-10-04 23:01:50 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 23:01:50 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 23:01:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 23:01:50 --> Total execution time: 0.0869
DEBUG - 2022-10-04 23:01:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 23:01:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 23:01:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 23:01:51 --> Total execution time: 0.0869
DEBUG - 2022-10-04 23:01:53 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 23:01:53 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 23:01:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 23:01:53 --> Total execution time: 0.0831
DEBUG - 2022-10-04 23:01:54 --> UTF-8 Support Enabled
DEBUG - 2022-10-04 23:01:54 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-04 23:01:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-04 23:01:54 --> Total execution time: 0.0941
