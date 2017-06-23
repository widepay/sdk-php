<?php

class WidePay {

	private $autenticacao = array();

	public $requisicoes = array();

	public function __construct($carteira, $token) {

		$this->autenticacao = array(
			'carteira' => $carteira,
			'token' => $token
		);

	}

	public function api($local, $parametros = array()) {

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, 'https://api.widepay.com/' . trim($local, '/'));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_USERPWD, $this->autenticacao['carteira'] . ':' . $this->autenticacao['token']);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($parametros));
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($curl, CURLOPT_SSLVERSION, 1);
		$exec = curl_exec($curl);
		curl_close($curl);

		if ($exec) {

			$requisicao = json_decode($exec, true);

			if (!is_array($requisicao)) {

				$requisicao = array(
					'sucesso' => false,
					'erro' => 'Não foi possível tratar o retorno.'
				);

			}

		} else {

			$requisicao = array(
				'sucesso' => false,
				'erro' => 'Sem comunicação com o servidor.'
			);

		}

		$this->requisicoes[] = (object) $requisicao;

		return end($this->requisicoes);

	}

}
