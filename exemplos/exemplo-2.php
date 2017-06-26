<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$adicionar = $wp->api('recebimentos/cobrancas/adicionar', array(
    'forma' => 'Boleto,Cartão',
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
    'desconto' => 5,
    'referencia' => 'Fatura 12345',
    'notificacao' => 'http://www.minhaaplicacao.com/script-notificacao.php',
    'redirecionamento' => 'http://www.minhaaplicacao.com/script-redirecionamento.php',
    'vencimento' => '2017-08-10',
    'enviar' => 'E-mail',
    'marketplace' => array(
        array(
            'carteira' => 10500,
            'valor' => 10
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

    echo $adicionar->id; // ID da cobrança gerada

} else {

    echo $adicionar->erro; // Erro

    if ($adicionar->erro == 'Erro na validação dos campos.') {
        print_r($adicionar->validacao); // Imprime os erros de validação
    }

}