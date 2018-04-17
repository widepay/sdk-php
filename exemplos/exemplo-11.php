<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$adicionar = $wp->api('recebimentos/carnes/adicionar', array(
    'cliente' => 'Lívia Pontarolo Almeida',
    'pessoa' => 'Física',
    'cpf' => '463.384.662-02',
    'email' => 'emaildalivia@gmail.com',
    'telefone' => '67 98888-0000',
    'endereco' => array(
        'rua' => 'Rua Primeiro de Julho',
        'numero' => '192',
        'complemento' => 'Sala 25',
        'bairro' => 'Vila Carvalho',
        'cep' => '79005-610',
        'cidade' => 'Campo Grande',
        'estado' => 'MS'
    ),
    'itens' => array(
        array(
            'descricao' => 'Descrição item 1',
            'valor' => 20,
            'quantidade' => 2,
            'desconto' => 4.99
        ),
        array(
            'descricao' => 'Descrição item 2',
            'valor' => 10.50
        )
    ),
    'referencia' => 'Fatura 12345',
    'notificacao' => 'http://www.minhaaplicacao.com/script-notificacao.php',
    'vencimento' => '2018-08-10',
    'parcelas' => '6',
    'dividir' => 'Não',
    'enviar' => 'E-mail',
    'mensagem' => 'Mensagem personalizada no e-mail',
    'marketplace' => array(
        array(
            'carteira' => 10500,
            'valor' => 10,
            'item' => 0
        ),
        array(
            'carteira' => 10800,
            'valor' => 5
        )
    ),
    'boleto' => array(
        'desconto' => 4.5,
        'multa' => 2,
        'juros' => 1,
        'instrucoes' => array(
            'Instrução personalizada ao cliente, linha 1',
            'Instrução personalizada ao cliente, linha 2'
        )
    )
));

if ($adicionar->sucesso) {

    echo $adicionar->id; // ID do carnê gerado
    echo $adicionar->link; // Link do carnê gerado

    print_r($adicionar->cobrancas); // Imprime todos os IDS das cobranças geradas

} else {

    echo $adicionar->erro; // Erro

    if ($adicionar->erro == 'Erro na validação dos campos.') {
        print_r($adicionar->validacao); // Imprime os erros de validação
    }

}