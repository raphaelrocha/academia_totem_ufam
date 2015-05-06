<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $MATRICULA
 * @property string $NOME
 * @property string $SEXO
 * @property string $DATANASC
 * @property string $CURSO
 * @property string $TIPO
 * @property string $SENHA
 * @property string $EMAIL
 *
 * The followings are the available model relations:
 * @property Agenda[] $agendas
 */
class Usuario extends CActiveRecord
{
	/**
	* @return string the associated database table name
	*/
	public function tableName()
	{
		return 'USUARIO';
	}

	/**
	* @return array validation rules for model attributes.
	*/
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MATRICULA, NOME, SOBRENOME, SEXO, DATANASC,FUNCIONARIO, ALUNO, CURSO, TIPO, SENHA, EMAIL', 'required'),
			array('MATRICULA, SENHA', 'length', 'max'=>20),
			array('NOME, SOBRENOME, CURSO, EMAIL', 'length', 'max'=>50),
			array('CURSO', 'length', 'max'=>10),
			array('FUNCIONARIO, ALUNO', 'length', 'max'=>3),
			array('SEXO, TIPO', 'length', 'max'=>50),
			//array('DATANASC', 'isValidDateNasc'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('MATRICULA, NOME, SOBRENOME, SEXO, DATANASC, CURSO, TIPO, SENHA, EMAIL', 'safe', 'on'=>'search'),
		);
	}

	/**
	* @return array relational rules.
	*/
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'agendas' => array(self::HAS_MANY, 'Agenda', 'MAT_USUARIO'),
		);
	}

	/**
	* @return array customized attribute labels (name=>label)
	*/
	public function attributeLabels()
	{
		return array(
			'MATRICULA' => 'CPF',
			'NOME' => 'Primeiro nome',
			'SOBRENOME' => 'Segundo nome',
			'SEXO' => 'Sexo',
			'DATANASC' => 'Data de nascimento',
			'FUNCIONARIO' => 'Funcionário',
			'ALUNO' => 'Aluno',
			'CURSO' => 'Curso',
			'TIPO' => 'Tipo de usuário',
			'SENHA' => 'Senha',
			'EMAIL' => 'e-Mail',
		);
	}

	/**
	* Retrieves a list of models based on the current search/filter conditions.
	*
	* Typical usecase:
	* - Initialize the model fields with values from filter form.
	* - Execute this method to get CActiveDataProvider instance which will filter
	* models according to data in model fields.
	* - Pass data provider to CGridView, CListView or any similar widget.
	*
	* @return CActiveDataProvider the data provider that can return the models
	* based on the search/filter conditions.
	*/
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('MATRICULA',$this->MATRICULA,true);
		$criteria->compare('NOME',$this->NOME,true);
		$criteria->compare('SOBRENOME',$this->SOBRENOME,true);
		$criteria->compare('SEXO',$this->SEXO,true);
		$criteria->compare('DATANASC',$this->DATANASC,true);
		$criteria->compare('FUNCIONARIO',$this->FUNCIONARIO,true);
		$criteria->compare('ALUNO',$this->ALUNO,true);
		$criteria->compare('CURSO',$this->CURSO,true);
		$criteria->compare('TIPO',$this->TIPO,true);
		$criteria->compare('SENHA',$this->SENHA,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	* Returns the static model of the specified AR class.
	* Please note that you should have this exact method in all your CActiveRecord descendants!
	* @param string $className active record class name.
	* @return Usuario the static model class
	*/
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	/*
	public function isValidDateNasc($attribute, $params)
	{
		$currentDateLess16 = date("Y-m-d",strtotime("-16 year"));
		$currentDateLess70 = date("Y-m-d",strtotime("-70 year"));
		if(!strtotime($this->$attribute) || strtotime($this->$attribute) >= strtotime($currentDateLess16) || strtotime($this->$attribute) <= strtotime($currentDateLess70))
		{
			$this->addError($attribute, $attribute . ' Não é uma data válida');
		}
	}*/
}
