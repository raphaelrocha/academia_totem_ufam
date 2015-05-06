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
	$tipo;
	if($modelCurrentUser->TIPO == "aluno") $tipo = "ajuda_aluno";
	else $tipo = "ajuda";
		
    $this->menu=array(
    	array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/back.png" width="50px" height="50px" alt="Voltar"/>', 'url'=>array('admin'), 'visible'=>$situacao),
    	//array('label'=>'Gerenciar Períodos', 'url'=>array(''), 'visible'=>$situacao),
    	//array('label'=>'Gerar Relatórios', 'url'=>array(''), 'visible'=>$situacao),
    	array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/help.png" width="50px" height="50px" alt="Ajuda"/>', 'url'=>array($tipo)),
    	//array('label'=>'Logout', 'url'=>array('site/logout')),
    );
}



?>

<?php
    $GLOBALS['nome'] = "Ajuda";
?>

<p align="justify">Você está na área: Usuário. Os únicos usuários permitidos aqui são gestores e diretores.
As operações disponíveis são: (1)'Gerenciar Usuários', (2)'Gerenciar Períodos', (3)'Gerar relatórios', (4)'Ajuda' e (5)'Logout'. </p>
<p align="justify"><b>(1) - Gerenciar Usuários:</b> Essa funcionalidade tem como objetivo permitir que gestores e diretores possam controlar os usuários do sistema e saber quantos
      usuários existem que estão frequentando a academia.
      Aqui são feitas operações as operações: adicionar, excluir, pesquisar, visualiar e editar um usuário.
      Ao clicar nessa opção, uma tabela irá aparecer. Cada elemento dessa tabela é um usuário cadastrado no sistema. Do lado direito
      da tabela, estão presentes as operações de 'pesquisar', 'editar' e 'excluir' (Cada uma representada por uma figura)
      Existe o botão 'Novo Usuário', onde ao ser clicado, aparecerá um formulário pronto para ser preenchido. Ao final do preenchimento,
      clicar em 'Criar Conta' para que o novo cadastro seja salvo no sistema. </p>

<p align="justify"> <b>(2) - Gerenciar Períodos:</b> [Ainda por implementar] </p>
<p align="justify"> <b>(3) - Gerar Relatórios:</b> [Ainda por implementar] </p>
<p align="justify"> <b>(4) - Ajuda:</b> É a página atual que você está visualizando </p>
<p align="justify"> <b>(5) - Logout:</b> Precionando esse botão, o usuário encerra a sessão dele no sistema. </p>

