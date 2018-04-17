<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$adicionar = $wp->api('recebimentos/carnes/adicionar', array(
    'cliente' => 'Lívia Pontarolo Almeida',
    'pessoa' => 'Física',
    'cpf' => '463.384.662-02',
    'itens' => array(
        array(
            'descricao' => 'Descrição item 1',
            'valor' => 22.50
        )
    ),
    'vencimento' => '2018-08-10',
    'parcelas' => '6',
    'dividir' => 'Não'
));

if ($adicionar->sucesso) {

    echo $adicionar->id; // ID do carnê gerado
    echo $adicionar->link; // Link do carnê gerado

    print_r($adicionar->cobrancas); // Imprime todos os IDS das cobranças geradas

} else {

    echo $adicionar->erro;

    if ($adicionar->erro == 'Erro na validação dos campos.') {
        print_r($adicionar->validacao); // Imprime os erros de validação
    }

}