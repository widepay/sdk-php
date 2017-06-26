<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$baixar = $wp->api('recebimentos/cobrancas/baixar', array(
    'id' => array('8AF962B49E3920BB', '922FEDBE9835857A')
));

if ($baixar->sucesso) {

    echo $baixar->total; // Total de cobranças canceladas

} else {

    echo $baixar->erro; // Erro

}