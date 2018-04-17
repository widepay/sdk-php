<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$consultar = $wp->api('recebimentos/carnes/consultar', array(
    'id' => '16758'
));

if ($consultar->sucesso) {

    echo $consultar->carnes[0]['id']; // ID do carnê
    echo $consultar->carnes[0]['status']; // Status do carnê

    print_r($consultar->carnes[0]); // Imprime todos os dados do carnê

} else {

    echo $consultar->erro; // Erro

}