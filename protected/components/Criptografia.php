<?php
class Criptografia{
	public function encript($senhaNormal){
		$salt = openssl_random_pseudo_bytes(22); // É necessário usar OpenSSL.
		$salt = '$2a$%13$' . strtr(base64_encode($salt), array('_' => '.', '~' => '/'));

		$senhaCript = crypt($senhaNormal,$salt);

		return $senhaCript;
	}
}
?>
