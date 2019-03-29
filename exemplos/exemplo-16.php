<?php

require_once('../src/WidePay.php'); // Caminho para o SDK

$wp = new WidePay('148446', '800440511285a9b0808ea85a94f3dd62'); // ID e token da carteira

$notificacao = $wp->api('recebimentos/carnes/notificacao', array(
    'id' => $_POST["notificacao"] // ID da notificação recebido do Wide Pay via POST
));

if ($notificacao->sucesso) {

    echo $notificacao->carne['id']; // ID do carnê
    echo $notificacao->carne['status']; // Status do carnê

    print_r($notificacao->carne); // Imprime todos os dados do carnê

} else {

    echo $notificacao->erro; // Erro

}