<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $modelCurrentUser Usuario */

$verifPat = new VerificaPatente;
$situacao = $verifPat->isGestorOrDiretor($modelCurrentUser->TIPO);
$funcionario = $verifPat->isFuncionario($modelCurrentUser->FUNCIONARIO);

/*
if($modelCurrentUser->TIPO == "diretor" || $modelCurrentUser->TIPO == "gestor"){
	$situacao = true;

}
else{
	$situacao = false;

}*/


$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->MATRICULA,
);
if ($situacao==true){
	$this->menu=array(
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/back.png" width="50px" height="50px" alt="Voltar"/>', 'url'=>array('admin')),
		//array('label'=>'Gerenciar Períodos', 'url'=>array('diretor'), 'visible'=>$situacao), //Link temporário
		//array('label'=>'Gerar Relatórios', 'url'=>array('diretor'), 'visible'=>$situacao), //Link temporário
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/file_add.png" width="50px" height="50px" alt="Enviar documento"/>', 'url'=>array('arquivo/upload&id='.$model->MATRICULA), 'visible'=>$funcionario),
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/edit_user.png" width="50px" height="50px" alt="Editar dados"/>', 'url'=>array('usuario/update&id='.$model->MATRICULA)),
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/help.png" width="50px" height="50px" alt="Ajuda"/>', 'url'=>array("ajuda")),
		//array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/cancel.png" width="50px" height="50px" alt="Cancelar"/>', 'url'=>array("site/configuracao&view=configuracao")),
		//array('label'=>'Logout', 'url'=>array('site/logout')),
	);
}
else{
	$this->menu=array(
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/back.png" width="50px" height="50px" alt="Voltar"/>', 'url'=>array('site/index')),
		//array('label'=>'Gerenciar Períodos', 'url'=>array('diretor'), 'visible'=>$situacao), //Link temporário
		//array('label'=>'Gerar Relatórios', 'url'=>array('diretor'), 'visible'=>$situacao), //Link temporário
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/file_add.png" width="50px" height="50px" alt="Enviar documento"/>', 'url'=>array('arquivo/upload&id='.$model->MATRICULA), 'visible'=>$funcionario),
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/file-check.png" width="50px" height="50px" alt="arquivos"/>', 'url'=>array('arquivo/adminUser&id='.$model->MATRICULA)/*, 'visible'=>$situacao*/),
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/edit_user.png" width="50px" height="50px" alt="Editar dados"/>', 'url'=>array('usuario/update&id='.$model->MATRICULA)),
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/help.png" width="50px" height="50px" alt="Ajuda"/>', 'url'=>array("ajuda")),
		//array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/cancel.png" width="50px" height="50px" alt="Cancelar"/>', 'url'=>array("site/index")),
		//array('label'=>'Logout', 'url'=>array('site/logout')),
	);
}


?>

<h2>Visualização do Usuario: <?php echo $model->NOME; ?></h2>

<?php
	$GLOBALS['nome'] = "Dados do Usuário";
?>

<?php
$modelCurrentUser = Usuario::model()->findByPk(Yii::app()->user->getState('MATRICULA'));
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'MATRICULA',
		'NOME',
		'SOBRENOME',
		'SEXO',
		'DATANASC',
		'FUNCIONARIO',
		'ALUNO',
		'CURSO',
		'TIPO',
		'EMAIL',
	),
)); ?>
</br>



