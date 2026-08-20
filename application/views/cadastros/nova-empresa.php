<?php
$titulo_pagina = 'Nova Empresa';
$acao_formulario = base_url('empresas/nova-empresa');
$url_cancelar = base_url('empresas');
$cadastro_empresa = true;
$this->load->view('cadastros/dados-empresa', compact(
    'titulo_pagina', 'acao_formulario', 'url_cancelar', 'cadastro_empresa', 'empresa',
    'lista_cidade', 'lista_conta', 'lista_centro_custo', 'lista_conta_contabil',
    'lista_metodo_pagamento', 'lista_natureza_operacao', 'menu'
));
?>
