<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

DEBUG - 2022-10-28 15:25:48 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:25:48 --> No URI present. Default controller set.
DEBUG - 2022-10-28 15:25:48 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:25:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:25:48 --> Total execution time: 0.2501
DEBUG - 2022-10-28 15:25:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:25:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:25:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:25:51 --> Total execution time: 0.1411
DEBUG - 2022-10-28 15:25:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:25:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:25:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:25:59 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:25:59 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:25:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:26:00 --> Total execution time: 0.4777
DEBUG - 2022-10-28 15:26:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:26:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:26:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:26:06 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:26:06 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:26:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 15:26:06 --> Query error: Unknown column 'metodo_pagamento_venda_caixa.nome_metodo_pagamento' in 'field list' - Invalid query: SELECT `venda_caixa`.`data_caixa`, `metodo_pagamento_venda_caixa`.`cod_metodo_pagamento`, `metodo_pagamento_venda_caixa`.`nome_metodo_pagamento`, `metodo_pagamento`.`nome_metodo_pagamento`, `metodo_pagamento`.`dias_recebimento`, `metodo_pagamento`.`taxa_operacao`, `metodo_pagamento`.`cod_conta`, sum(metodo_pagamento_venda_caixa.valor_pagamento) total_venda
FROM `metodo_pagamento_venda_caixa`
JOIN `metodo_pagamento` ON `metodo_pagamento`.`cod_metodo_pagamento` = `metodo_pagamento_venda_caixa`.`cod_metodo_pagamento`
JOIN `venda_caixa` ON `venda_caixa`.`num_venda_caixa` = `metodo_pagamento_venda_caixa`.`num_venda_caixa`
WHERE `venda_caixa`.`id_empresa` = '63'
AND `venda_caixa`.`status` = '2'
AND `venda_caixa`.`data_caixa` = '2022-10-28'
GROUP BY `metodo_pagamento_venda_caixa`.`cod_metodo_pagamento`
DEBUG - 2022-10-28 15:26:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:26:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:26:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 705
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 712
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 713
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 716
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 718
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 735
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 736
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 741
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 742
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 747
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 748
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 753
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:26:32 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
DEBUG - 2022-10-28 15:26:32 --> Total execution time: 0.1353
DEBUG - 2022-10-28 15:26:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:26:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:26:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:26:43 --> Total execution time: 0.3275
DEBUG - 2022-10-28 15:26:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:26:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:26:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:26:45 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:26:45 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:26:45 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 705
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 712
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 713
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 716
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 718
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 735
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 736
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 741
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 742
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 747
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 748
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 753
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:26:45 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
DEBUG - 2022-10-28 15:26:45 --> Total execution time: 0.1328
DEBUG - 2022-10-28 15:26:47 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:26:47 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:26:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:26:47 --> Total execution time: 0.1107
DEBUG - 2022-10-28 15:27:09 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:27:09 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:27:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 705
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 712
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 713
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 716
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 718
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 735
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 736
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 741
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 742
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 747
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 748
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 753
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:27:09 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
DEBUG - 2022-10-28 15:27:09 --> Total execution time: 0.1127
DEBUG - 2022-10-28 15:27:11 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:27:11 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:27:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:27:11 --> Total execution time: 0.0927
DEBUG - 2022-10-28 15:27:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:27:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:27:33 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:27:33 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:27:33 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:27:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:27:34 --> Total execution time: 0.1168
DEBUG - 2022-10-28 15:27:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:27:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:27:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:27:38 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:27:38 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:27:38 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:27:40 --> Total execution time: 1.7093
DEBUG - 2022-10-28 15:27:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:27:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:27:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:27:51 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:27:51 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:27:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:27:51 --> Total execution time: 0.0401
DEBUG - 2022-10-28 15:28:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 703
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 705
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 707
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 712
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 713
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 716
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 718
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 735
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 736
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 741
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 742
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 747
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 748
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 753
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
ERROR - 2022-10-28 15:28:14 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 759
DEBUG - 2022-10-28 15:28:14 --> Total execution time: 0.0968
DEBUG - 2022-10-28 15:28:16 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:16 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:16 --> Total execution time: 0.0827
DEBUG - 2022-10-28 15:28:18 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:18 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:19 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:19 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:19 --> Total execution time: 0.0873
DEBUG - 2022-10-28 15:28:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 15:28:25 --> Severity: Notice --> Undefined variable: lista_segmento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 620
ERROR - 2022-10-28 15:28:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 620
ERROR - 2022-10-28 15:28:25 --> Severity: Notice --> Undefined variable: lista_cidade C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 704
ERROR - 2022-10-28 15:28:25 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 704
DEBUG - 2022-10-28 15:28:25 --> Total execution time: 1.4997
DEBUG - 2022-10-28 15:28:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:27 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:27 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 15:28:28 --> Severity: Notice --> Undefined variable: lista_segmento C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 620
ERROR - 2022-10-28 15:28:28 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 620
ERROR - 2022-10-28 15:28:28 --> Severity: Notice --> Undefined variable: lista_cidade C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 704
ERROR - 2022-10-28 15:28:28 --> Severity: Warning --> Invalid argument supplied for foreach() C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\editar-venda-caixa.php 704
DEBUG - 2022-10-28 15:28:28 --> Total execution time: 1.5425
DEBUG - 2022-10-28 15:28:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:35 --> Total execution time: 0.1301
DEBUG - 2022-10-28 15:28:41 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:42 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:42 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:42 --> Total execution time: 0.0823
DEBUG - 2022-10-28 15:28:43 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 15:28:43 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 15:28:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 15:28:45 --> Total execution time: 1.3112
DEBUG - 2022-10-28 16:00:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:00:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:00:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 16:00:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:00:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:00:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 16:00:23 --> Total execution time: 0.0477
DEBUG - 2022-10-28 16:00:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:00:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:00:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 16:00:23 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:00:23 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:00:23 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 16:00:23 --> Total execution time: 0.0429
DEBUG - 2022-10-28 16:01:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:01:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:01:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 16:01:05 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:01:05 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:01:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 16:01:06 --> Total execution time: 0.4984
DEBUG - 2022-10-28 16:01:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:01:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:01:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 16:01:10 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:01:10 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:01:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 704
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 706
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 708
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 710
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 710
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 710
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 713
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 714
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 717
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 719
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 736
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 737
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 742
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 743
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 748
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 749
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 753
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 754
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 760
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 760
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 760
ERROR - 2022-10-28 16:01:10 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 760
DEBUG - 2022-10-28 16:01:10 --> Total execution time: 0.0937
DEBUG - 2022-10-28 16:02:08 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:02:08 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:02:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 698
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 700
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 700
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 700
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 705
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 706
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 711
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 728
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 729
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 734
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 735
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 740
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 741
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 745
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 746
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 16:02:08 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
DEBUG - 2022-10-28 16:02:08 --> Total execution time: 0.0907
DEBUG - 2022-10-28 16:02:13 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 16:02:13 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 16:02:13 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 16:02:13 --> Total execution time: 0.0979
DEBUG - 2022-10-28 23:59:20 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 23:59:20 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 23:59:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 23:59:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 23:59:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 23:59:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 23:59:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 23:59:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 23:59:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 23:59:21 --> Total execution time: 0.1245
DEBUG - 2022-10-28 23:59:21 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 23:59:21 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 23:59:21 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 23:59:21 --> Total execution time: 0.1136
DEBUG - 2022-10-28 23:59:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 23:59:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 23:59:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 23:59:32 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 23:59:32 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 23:59:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 23:59:32 --> Total execution time: 0.6098
DEBUG - 2022-10-28 23:59:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 23:59:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 23:59:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
DEBUG - 2022-10-28 23:59:35 --> UTF-8 Support Enabled
DEBUG - 2022-10-28 23:59:35 --> Global POST, GET and COOKIE data sanitized
DEBUG - 2022-10-28 23:59:35 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 696
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 698
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 700
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 700
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 700
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda_geral' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 702
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 705
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_frete' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 706
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 709
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda_liquido' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 711
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 728
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 729
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 734
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 735
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 740
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 741
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 745
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 746
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'saldo_inicial' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_venda' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_incremento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
ERROR - 2022-10-28 23:59:35 --> Severity: Notice --> Trying to get property 'total_recolhimento' of non-object C:\Users\genizis.meneghel\Meu Drive\Projetos Web\shopfloor\application\views\vendas\frente-caixa.php 752
DEBUG - 2022-10-28 23:59:35 --> Total execution time: 0.2085
