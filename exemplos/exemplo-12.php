<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$montar = $wp->api('recebimentos/carnes/montar', array(
    'cobrancas' => array('5F151D278C9DDC80', '7CF34C1FF5E842B0', '6AB79C5F626436A8')
));

if ($montar->sucesso) {

    echo $montar->id; // ID do carnê gerado
    echo $montar->link; // Link do carnê gerado

} else {

    echo $montar->erro; // Erro

    if ($montar->erro == 'Erro na validação dos campos.') {
        print_r($montar->validacao); // Imprime os erros de validação
    }

}