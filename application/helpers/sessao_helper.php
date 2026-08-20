<?php

function getDadosUsuarioLogado()
{
    $ci =& get_instance();

    $dadosUsuario = $ci->session->userdata('usuario');
    return $dadosUsuario;

}

function usuarioLogado()
{
    $ci =& get_instance();

    return !empty($ci->session->userdata('usuario'));
}

function getEmpresasUsuarioLogado()
{
    $ci =& get_instance();
    $usuario = getDadosUsuarioLogado();

    if(empty($usuario)){
        return array();
    }

    return $ci->empresa->getEmpresasPermitidas($usuario['email'], $usuario['id_empresa']);
}

//Retornar json Em API
function responseJson($instance,$dados, $status = 203)
{
  return $instance->output
  ->set_content_type('application/json')
  ->set_status_header($status)
  ->set_output(json_encode(
    $dados
));
}
