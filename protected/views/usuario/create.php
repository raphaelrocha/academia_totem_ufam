<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $modelCurrentUserTipo Usuario */
/*
$situacao;
if($modelCurrentUserTipo != null && ($modelCurrentUserTipo == "diretor" || $modelCurrentUserTipo == "gestor")) $situacao = true;
else $situacao = false;
*/
$this->breadcrumbs=array(

	'Usuarios'=>array('index'),
	'Create',
);

if(!Yii::app()->user->isGuest){
	$this->menu=array(
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/back.png" width="50px" height="50px" alt="Voltar"/>', 'url'=>array('admin')),
	//	array('label'=>'Gerenciar Períodos', 'url'=>array(''), 'visible'=>$situacao),
	//	array('label'=>'Gerar Relatórios', 'url'=>array(''), 'visible'=>$situacao),
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/help.png" width="50px" height="50px" alt="Ajuda"/>', 'url'=>array('ajuda')),
		//array('label'=>'Logout', 'url'=>array('site/logout')),

	);
}

?>

<?php if(Yii::app()->user->isGuest): ?>
<a href="/academia/index.php">Voltar</a></br></br>
<?php endif; ?>

<!--<h1>Criar Conta</h1>-->
<?php
	$GLOBALS['nome'] = "Criar Conta";
?>

<!--Passando a variavel dono -->
<?php $this->renderPartial('_form', array('model'=>$model,'dono'=>'create', 'cursosArray'=>$cursosArray, 'modelCurrentUserTipo'=>$modelCurrentUserTipo)); ?>
