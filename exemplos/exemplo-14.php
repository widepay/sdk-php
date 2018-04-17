<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$cancelar = $wp->api('recebimentos/carnes/cancelar', array(
    'id' => '16700'
));

if ($cancelar->sucesso) {

    echo $cancelar->total; // Total de carnês cancelados

} else {

    echo $cancelar->erro; // Erro

}