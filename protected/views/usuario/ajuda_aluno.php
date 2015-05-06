<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $modelCurrentUser Usuario */

$situacao;
if($modelCurrentUser->TIPO == "diretor" || $modelCurrentUser->TIPO == "gestor") $situacao = true;
else $situacao = false;


$this->breadcrumbs=array(
    'Usuarios'=>array('index'),
    'Create',
);



if(!Yii::app()->user->isGuest){
		
    $this->menu=array(
    	array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/back.png" width="50px" height="50px" alt="Voltar"/>', 'url'=>array('admin'), 'visible'=>$situacao),
    	//array('label'=>'Gerenciar Períodos', 'url'=>array(''), 'visible'=>$situacao),
    	//array('label'=>'Gerar Relatórios', 'url'=>array(''), 'visible'=>$situacao),
    	array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/help.png" width="50px" height="50px" alt="Ajuda"/>', 'url'=>array("ajuda")),
    	//array('label'=>'Logout', 'url'=>array('site/logout')),
    );
}



?>

<?php
    $GLOBALS['nome'] = "Ajuda";
?>

<p align="justify"> <b>HEEEELP o.O"</b></p>

