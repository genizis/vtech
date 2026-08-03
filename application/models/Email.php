<?php

class Email extends CI_Model{

    public function emailBoasVindas($empresa, $telefone, $nome, $usuario, $validade, $idEmpresa, $hashEmail){   
        
        $this->load->library("PhpMailerLib");
        $mail = $this->phpmailerlib->load();

        $mail->SMTPDebug = 0;  
        $mail->CharSet = "UTF-8";                             
        $mail->isSMTP();                                      
        $mail->Host = 'mail.shopfloor.com.br';  
        $mail->SMTPAuth = true;                               
        $mail->Username = 'contato@shopfloor.com.br';                 
        $mail->Password = 'P%UAHYw-!e.r';                    
        $mail->SMTPSecure = 'ssl';                            
        $mail->Port = 465;
        $mail->setFrom('contato@shopfloor.com.br', 'Contato do ShopFloor');  

        //$this->setConfigServidor();
        
        $mail->addAddress($usuario);    
        $mail->addReplyTo('contato@shopfloor.com.br', 'Contato');
        $mail->AddBCC("contato@shopfloor.com.br");
        $mail->AddBCC("genizisvinicius@gmail.com");
        $mail->AddBCC("renealvesteles@gmail.com");

        $texto = '<html>
        <head>
            <style>
            .corpo{
                background-color: #f8f8f8!important;
            }
            .conteudo {	
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
            .card {			  
                border: 1px solid rgb(206, 212, 218);
                border-radius: 0.25rem;
                font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                font-size: 0.875rem;
                font-weight: 400;
                line-height: 1.5;
                color: #3E3F3A;
                text-align: center!important;
                background-color: #fff!important;
                width: 600px;
            }
            
            .card-body {
                min-height: 1px;
                padding: 2rem;
            }
            
            .card-header {
                padding: 1.5rem 3rem;
                margin-bottom: 0;
                color: #fff!important;
                background-color: #29ABE0;
                border-bottom: 1px solid #29ABE0;		  
            }
            
            .display-1 {		  
                font-size: 2.9rem;
                font-weight: 400;
                line-height: 1.2;
            }
            
            .subtitulo {		  
                font-weight: 500;
                line-height: 1.5;
            }
            
            .hr-header {
                border: 1px solid #fff;
            }
            
            .hr-body {
                border: 1px solid rgb(206, 212, 218);
                width: 20%;
            }
            
            .img-logo {
                margin-bottom: 40px;			
            }
            
            .table-usu{
                border: 0px;
                text-align: center!important;
                font-size: 0.9rem;
                font-weight: 400;
                line-height: 1.5;
                width: 100%;
                font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"
            }
            
            .table-label{
                text-align: left!important;
                font-weight: 600;
                color: #3E3F3A !important;
            }
            .table-info{
                text-align: right!important;
                font-weight: 400;
                color: #8E8C84 !important;
            }
            
            .text-dark{
                color: #55544f !important;
            }
            
            .text-muted{
                color: #8E8C84 !important;
            }
            
            .paragrafo{
                width: 80%;
                color: #63625c !important;
                font-size: 15px;
                margin-bottom: 40px;
            }
            
            .suporte{
                width: 80%;
                color: #63625c !important;
                font-size: 15px;
                margin-top: 40px;
                margin-bottom: 40px;
            }
            
            .table-processo{
                font-size: 15px;
                text-align: center!important;
                align: center;
            }

            .btn-confirma {
                text-decoration: none;
                padding: 0.5rem 1rem;
                font-size: 1.09375rem;
                line-height: 1.5;
                border-radius: 0.3rem;
                color: #fff!important;
                background-color: #d9534f;
                border-color: #d9534f;
            }
            
            </style>
        </head>
        <body>
            <div class="corpo" style="background-color: #f8f8f8!important;">
                <div class="conteudo" style="padding-top: 1rem;padding-bottom: 1rem;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="center">
                                <div class="card" style="border: 1px solid rgb(206, 212, 218);border-radius: 0.25rem;font-family: &quot;Roboto&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;font-size: 0.875rem;font-weight: 400;line-height: 1.5;color: #3E3F3A;width: 600px;text-align: center!important;background-color: #fff!important;">
                                    <div class="card-header" style="padding: 1.5rem 3rem;margin-bottom: 0;background-color: #29ABE0;border-bottom: 1px solid #29ABE0;color: #fff!important;">
                                        <img src="cid:logo" class="img-logo" style="margin-bottom: 40px;">
                                        <hr class="hr-header" style="border: 1px solid #fff;">
                                        <h1 class="display-1" style="font-size: 2.9rem;font-weight: 400;line-height: 1.2;">Bem-vindo!</h1>
                                        <h2 class="subtitulo" style="font-weight: 500;line-height: 1.5;">Agora você já pode aproveitar seu período grátis e descobrir por que somos a melhor solução para o seu negócio.</h2>
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <a href="https://shopfloor.com.br/valida-email/' . $hashEmail . '/' . $idEmpresa . '"
                                                    class="btn-confirma" >Clique aqui para ativar o seu acesso à plataforma</a>	
                                                </td>
                                            </tr>
                                        </table>                                        
                                    </div>
                                    <div class="card-body" style="min-height: 1px;padding: 2rem;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <img src="cid:vendas">
                                                    <h2 class="text-dark" style="color: #55544f !important;">Vendas</h2>
                                                    <p class="paragrafo" style="width: 80%;font-size: 15px;margin-bottom: 40px;color: #63625c !important;">Gerencie pedidos, emita notas fiscais, monitore o desempenho da sua equipe de vendas, avalie a performance comercial da sua empresa e controle a frente de caixa para vendas a clientes finais.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <img src="cid:compras">
                                                    <h2 class="text-dark" style="color: #55544f !important;">Compras</h2>
                                                    <p class="paragrafo" style="width: 80%;font-size: 15px;margin-bottom: 40px;color: #63625c !important;">Gerencie as compras da sua empresa, realizando cotações de ordens por fornecedor, controle a emissão de pedidos e registre o recebimento de materiais.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <img src="cid:estoque">
                                                    <h2 class="text-dark" style="color: #55544f !important;">Estoque</h2>
                                                    <p class="paragrafo" style="width: 80%;font-size: 15px;margin-bottom: 40px;color: #63625c !important;">Gerencie o estoque da sua empresa com base nas movimentações de itens comprados, vendidos e produzidos. Realize inventários regularmente para manter a precisão do controle de estoque.</p>
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td align="center">
                                                    <img src="cid:financeiro">
                                                    <h2 class="text-dark" style="color: #55544f !important;">Financeiro</h2>
                                                    <p class="paragrafo" style="width: 80%;font-size: 15px;margin-bottom: 40px;color: #63625c !important;">Gerencie o orçamento da sua empresa e administre o fluxo de caixa, acompanhando pagamentos e recebimentos, tudo de forma totalmente integrada com os demais módulos.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <img src="cid:engrenagem">
                                                    <h2 class="text-dark" style="color: #55544f !important;">Produção</h2>
                                                    <p class="paragrafo" style="width: 80%;font-size: 15px;margin-bottom: 40px;color: #63625c !important;">Gerencie a fabricação dos seus produtos emitindo ordens e reportando a produção. Calcule os custos de materiais e mão de obra, além de controlar o estoque de insumos e produtos acabados.</p>
                                                </td>
                                            </tr>
                                        </table>
                                        <hr class="hr-body" style="border: 1px solid rgb(206, 212, 218);width: 20%;margin-bottom: 40px">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <img src="cid:smartphone">
                                                    <p class="suporte" style="width: 80%;font-size: 15px;margin-top: 20px;margin-bottom: 40px;color: #63625c !important;">Conheça também o nosso app de <i>vendas externas</i>: nele, sua equipe de vendas pode emitir pedidos, registrar atendimentos a clientes e acompanhar seu desempenho de vendas enquanto estiver em campo, tudo integrado à plataforma em tempo real.</p>	
                                                </td>
                                            </tr>
                                        </table>
                                        <hr class="hr-body" style="border: 1px solid rgb(206, 212, 218);width: 20%;">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <p class="suporte" style="width: 80%;font-size: 15px;margin-top: 40px;margin-bottom: 40px;color: #63625c !important;">Se tiver alguma dúvida, entre em contato com nosso suporte através do e-mail <b>suporte@shopfloor.com.br</b> ou pelo WhatsApp: (42) 98819-2794.</p>	
                                                </td>
                                            </tr>
                                        </table>	
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center">
                                                    <h2 class="text-dark" style="color: #55544f !important;">Seus dados</h2>
                                                    <table class="table-usu" style="border: 0px;font-size: 0.9rem;font-weight: 400;line-height: 1.5;width: 100%;font-family: &quot;Roboto&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;;text-align: center!important;">
                                            <tr>
                                                <td class="table-label" style="font-weight: 600;text-align: left!important;color: #3E3F3A !important;">Empresa:</td>
                                                <td class="table-info" style="font-weight: 400;text-align: right!important;color: #8E8C84 !important;">' . $empresa . '</td>
                                            </tr>
                                            <tr>
                                                <td class="table-label" style="font-weight: 600;text-align: left!important;color: #3E3F3A !important;">Telefone:</td>
                                                <td class="table-info" style="font-weight: 400;text-align: right!important;color: #8E8C84 !important;">' . $telefone . '</td>
                                            </tr>
                                            <tr>
                                                <td class="table-label" style="font-weight: 600;text-align: left!important;color: #3E3F3A !important;">Nome:</td>
                                                <td class="table-info" style="font-weight: 400;text-align: right!important;color: #8E8C84 !important;">' . $nome . '</td>
                                            </tr>                                            
                                            <tr>
                                                <td class="table-label" style="font-weight: 600;text-align: left!important;color: #3E3F3A !important;">Usuário:</td>
                                                <td class="table-info" style="font-weight: 400;text-align: right!important;color: #8E8C84 !important;">' . $usuario . '</td>
                                            </tr>
                                            <tr>
                                                <td class="table-label" style="font-weight: 600;text-align: left!important;color: #3E3F3A !important;">Data de Expiração:</td>
                                                <td class="table-info" style="font-weight: 400;text-align: right!important;color: #8E8C84 !important;">' . str_replace('-', '/', date("d-m-Y", strtotime($validade))) . '</td>
                                            </tr>
                                        </table>
                                                </td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </body></html>';

        $mail->isHTML(true);                                  
        $mail->Subject = 'Bem-vindo ao ShopFloor, ' . $nome;
        $mail->Body    = $texto;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->AddEmbeddedImage('img/logo-branco.png', 'logo');

        $mail->AddEmbeddedImage('img/icon/compras.png', 'compras');
        $mail->AddEmbeddedImage('img/icon/estoque.png', 'estoque');
        $mail->AddEmbeddedImage('img/icon/financeiro.png', 'financeiro');
        $mail->AddEmbeddedImage('img/icon/vendas.png', 'vendas');
        $mail->AddEmbeddedImage('img/icon/engrenagem.png', 'engrenagem');
        $mail->AddEmbeddedImage('img/icon/smartphone.png', 'smartphone');
        //$mail->AddAttachment('img/logo-branco.png');

        $mail->send();

    }

}