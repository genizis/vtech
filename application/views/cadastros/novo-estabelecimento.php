<?php
$titulo_pagina = 'Novo Estabelecimento';
$acao_formulario = base_url('estabelecimentos/novo-estabelecimento');
$url_cancelar = base_url('estabelecimentos');
$cadastro_empresa = true;
$cadastro_estabelecimento = true;
$url_lista = base_url('estabelecimentos');
$titulo_lista = 'Estabelecimentos';
$this->load->view('cadastros/dados-empresa', compact(
    'titulo_pagina', 'acao_formulario', 'url_cancelar', 'cadastro_empresa', 'cadastro_estabelecimento',
    'url_lista', 'titulo_lista', 'empresa', 'lista_cidade', 'lista_conta', 'lista_centro_custo',
    'lista_conta_contabil', 'lista_metodo_pagamento', 'lista_natureza_operacao', 'menu'
));
?>
