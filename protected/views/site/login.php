<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>

<h1>Login</h1>

<p>Por favor, preencha o formulário abaixo com suas credenciais de login:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<div class="row">
		<?php //echo $form->labelEx($model,'username'); ?>
		<?php echo CHtml::label('CPF<font size="1" color="red"><b><i>*</i></b></font>', '',array('id'=>'labelCurso')); ?>
		<?php
			$form->widget('CMaskedTextField', array(
				'model' => $model,
				'attribute' => 'username',
				'mask' => '999.999.999-99',
				'htmlOptions' => array('size' == 11)
			));
		?>
		<?php echo $form->error($model,'username'); ?>
	</div>


	<div class="row">
		<?php //echo $form->labelEx($model,'password'); ?>
		<?php echo CHtml::label('Senha<font size="1" color="red"><b><i>*</i></b></font>', '',array('id'=>'labelCurso')); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			<!--Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.-->
			Dica: Nunca informe suas credenciais para ninguém.
		</p>
	</div>

	<div class="row rememberMe">
		<?php //echo $form->checkBox($model,'rememberMe'); ?>
		<?php //echo $form->label($model,'rememberMe'); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Entrar'); ?>
	</div>


<?php $this->endWidget(); ?>
</div><!-- form -->
