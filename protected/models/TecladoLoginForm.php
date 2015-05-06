<?php
class TecladoLoginForm extends CFormModel {
	//public $URL;
	public $LOGIN;
	public $SENHA;
	public function rules () {
		return array (
			//array('URL', 'length', 'max'=>500),
			//array('LOGIN, SENHA', 'required'),
			array('LOGIN, SENHA', 'length', 'max'=>10),
		);
	}
}
