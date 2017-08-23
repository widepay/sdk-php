<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$cancelar = $wp->api('recebimentos/cobrancas/cancelar', array(
    'id' => '8AF962B49E3920BB'
));

if ($cancelar->sucesso) {

    echo $cancelar->total; // Total de cobranças canceladas

} else {

    echo $cancelar->erro; // Erro

}