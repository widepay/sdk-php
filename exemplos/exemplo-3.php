<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$boleto = $wp->api('recebimentos/cobrancas/boleto', array(
    'id' => '8AF962B49E3920BB',
    'atualizar' => 'Sim',
    'html' => 'Sim',
    'carne' => 'Não'
));

if ($boleto->sucesso) {

    print_r($boleto->parametros); // Imprime os parametros de configuração do boleto

    echo $boleto->codigo; // Código de barras do boleto
    echo $boleto->html; // HTML do boleto

} else {

    echo $boleto->erro; // Erro

}