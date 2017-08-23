<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$consultar = $wp->api('recebimentos/cobrancas/consultar', array(
    'id' => '264C51BE984C7718'
));

if ($consultar->sucesso) {

    echo $consultar->cobrancas[0]['id']; // ID da cobrança
    echo $consultar->cobrancas[0]['status']; // Status da cobrança

    print_r($consultar->cobrancas[0]); // Imprime todos os dados da cobrança

} else {

    echo $consultar->erro; // Erro

}