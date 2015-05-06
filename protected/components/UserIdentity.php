<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	* Authenticates a user.
	* The example implementation makes sure if the username and password
	* are both 'demo'.
	* In practical applications, this should be changed to authenticate
	* against some persistent user identity storage (e.g. database).
	* @return boolean whether authentication succeeds.
	*/
	/*public function authenticate()
	{
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}*/
	private $_username;
	private $_tipo;
	public function authenticate()
	{
		$record = Usuario::model()->findByAttributes(array('MATRICULA'=>$this->username));
		$cript = new Criptografia;
		$senhaEncriptada = $cript->encript($this->password);

		if($record === null){
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		//} elseif ($record->SENHA !== $this->password){
		} elseif ($record->SENHA !== $senhaEncriptada){
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$verifPat = new VerificaPatente;
			$ehDiretorOuGestor = $verifPat->isGestorOrDiretor($record->TIPO);
			if($ehDiretorOuGestor==false){
				$this->errorCode = self::ERROR_USERNAME_INVALID;
			}else{
				$this->username=$record->NOME;
				$this->setState('MATRICULA', $record->MATRICULA);
				$this->setState('TIPO', $record->TIPO);
				$this->setState('FUNCIONARIO', $record->FUNCIONARIO);
				//$this->tipo=$record->TIPO;
				//$this->setState('nome', $record->nome);
				$this->errorCode=self::ERROR_NONE;
			}

		}
		return !$this->errorCode;
	}

	/*public function getId()
	{
		return $this->_name;
	}*/
}
