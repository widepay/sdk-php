<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$adicionar = $wp->api('recebimentos/cobrancas/adicionar', array(
    'forma' => 'Cartão',
    'cliente' => 'Lívia Pontarolo Almeida',
    'pessoa' => 'Física',
    'cpf' => '463.384.662-02',
    'itens' => array(
        array(
            'descricao' => 'Descrição item 1',
            'valor' => 22.50
        )
    )
));

if ($adicionar->sucesso) {

    echo $adicionar->id; // ID da cobrança gerada

} else {

    echo $adicionar->erro;

    if ($adicionar->erro == 'Erro na validação dos campos.') {
        print_r($adicionar->validacao); // Imprime os erros de validação
    }

}