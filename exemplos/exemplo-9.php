<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$notificacao = $wp->api('recebimentos/cobrancas/notificacao', array(
    'id' => $_POST["notificacao"] // ID da notificação recebido do Wide Pay via POST
));

if ($notificacao->sucesso) {

    echo $notificacao->cobranca['id']; // ID da cobrança
    echo $notificacao->cobranca['status']; // Status da cobrança

    print_r($notificacao->cobranca); // Imprime todos os dados da cobrança

} else {

    echo $notificacao->erro; // Erro

}