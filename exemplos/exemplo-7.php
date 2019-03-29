<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$manual = $wp->api('recebimentos/cobrancas/manual', array(
    'id' => '8AF962B49E3920BB'
));

if ($manual->sucesso) {

    echo $manual->total; // Total de cobranças afetadas

} else {

    echo $manual->erro; // Erro

}