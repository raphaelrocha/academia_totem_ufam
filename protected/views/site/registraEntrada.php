<?php $varStatus=null ?>

<?php if(Yii::app()->user->hasFlash('SUCESSO')): ?>

<div class="flash-success" align="center">
	<?php echo Yii::app()->user->getFlash('SUCESSO'); ?>
</div>

<?php elseif(Yii::app()->user->hasFlash('tecladoError')): ?>
<div class="flash-error" align="center">
	<?php echo Yii::app()->user->getFlash('tecladoError'); ?>
</div>

<?php elseif(Yii::app()->user->hasFlash('tecladoAlert')): ?>
<div class="flash-notice" align="center">
	<?php echo Yii::app()->user->getFlash('tecladoAlert'); ?>
</div>

<?php else:?>

<?php if($sinal == 0): ?>
<h1 align="center"><b><font size=28 color="#FFD700">INFORME SEU CPF.</font></b></h1>
<?php $varStatus=false; ?>
<?php elseif($sinal == 1):?>
<div align="center">
	<h1 align="center"><b><font size=28 color="#008000">ENTRADA LIBERADA.</font></b></h1>
	<img src="images/ok.png" width=150 height=150 align="center">
</div>
<?php $varStatus=true; ?>
<script>
	window.onload = setupRefresh;

	function setupRefresh() {
		setTimeout("refreshPage('form');", 5000); // milliseconds
	}
	function refreshPage() {
		window.location = location.href;
	}
</script>
<?php else:?>
<div align="center">
	<h1 align="center"><b><font size=28 color="#FF0000">ENTRADA NÃO AUTORIZADA.</font></b></h1>
	<img src="images/error.png" width=150 height=150 align="center">
</div>
<?php $varStatus=true;?>
<script>
	window.onload = setupRefresh;

	function setupRefresh() {
		setTimeout("refreshPage('form');", 5000); // milliseconds
	}
	function refreshPage() {
		window.location = location.href;
	}
</script>
<?php endif; ?>



<div class="form" >

	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reg-entrada-form',
	//'enableClientValidation'=>true,
	'clientOptions'=>array(
		//'validateOnSubmit'=>true,
	),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row" align="center">
		<?php //echo $form->labelEx($model,'matricula'); ?>
		<?php $form->widget('CMaskedTextField', array(
	'id' => 'matField',
	'model' => $model,
	'attribute' => 'matricula',
	'mask' => '999.999.999-99',
	'htmlOptions' => array('size' == 11, 'disabled'=> $varStatus, 'autofocus'=>'autofocus'),
)); ?>
		<?php //echo $form->error($model,'matricula'); ?>
	</div>





	<!-- Teclado numérico -->
	<!-- OBS: Trocar os textos por botões -->
	<?php if($sinal == 0):?>


	<table id="teclado" height="290" width="240" >
		<tr height="60">
			<td id="null" align="center"> </td>
			<td align="right" width="90" > <button id="1" type="button" style="width:100%;height:100%"><font size="6" ><b>1</b></font></button></td>
			<td align="center" width="90" > <button id="2" type="button" style="width:100%;height:100%"><font size="6"><b>2</b></font></button></td>
			<td align="left" width="90" > <button id="3" type="button" style="width:100%;height:100%"><font size="6"><b>3</b></font></button></td>
			<td id="null" align="center"> </td>
		</tr>
		<tr height="60">
			<td id="null" align="center"> </td>
			<td align="right" width="90" > <button id="4" type="button" style="width:100%;height:100%"><font size="6"><b>4</b></font></button></td>
			<td align="center" width="90" > <button id="5" type="button" style="width:100%;height:100%"><font size="6"><b>5</b></font></button></td>
			<td align="left" width="90" > <button id="6" type="button" style="width:100%;height:100%"><font size="6"><b>6</b></font></button></td>
			<td id="null" align="center"> </td>
		</tr>
		<tr height="60">
			<td id="null" align="center"> </td>
			<td align="right" width="90" > <button id="7" type="button" style="width:100%;height:100%"><font size="6"><b>7</b></font></button></td>
			<td align="center" width="90" > <button id="8" type="button" style="width:100%;height:100%"><font size="6"><b>8</b></font></button></td>
			<td align="left" width="90" > <button id="9" type="button" style="width:100%;height:100%"><font size="6"><b>9</b></font></button></td>
			<td id="null" align="center"> </td>
		</tr>
		<tr height="60">
			<td id="null" align="center"> </td>
			<td align="right" width="90" > <button id="limpar" type="button" style="width:100%;height:100%;background-color:yellow"><font size="4"><b>LIMPAR</b></font></button></td>
			<td align="center" width="90" > <button id="0" type="button" style="width:100%;height:100%"><font size="6"><b>0</b></font></button></td>
			<td align="left" width="90" > <button id="entrar" type="submit" style="width:100%;height:100%;background-color:lightgreen"><font size="4"><b>ENTRAR</b></font></button></td>
			<td id="null" align="center"> </td>
		</tr>
	</table>
	<!--
<div class="row buttons">
<?php echo CHtml::submitButton('ENTRAR',array('disabled'=> $varStatus)); ?>
</div>
-->

	<?php endif; ?>







	<?php $this->endWidget(); ?>

</div><!-- form -->

<!-- Parte "inteligente" do teclado -->

<script type="text/javascript">
	var matricula = "";
	var cont=0;
	$(document).ready(function(){

		$("#1").click(function(){
			$("#1").click(myFunction("1"));
		});
		$("#2").click(function(){
			$("#2").click(myFunction("2"));
		});
		$("#3").click(function(){
			$("#3").click(myFunction("3"));
		});
		$("#4").click(function(){
			$("#4").click(myFunction("4"));
		});
		$("#5").click(function(){
			$("#5").click(myFunction("5"));
		});
		$("#6").click(function(){
			$("#6").click(myFunction("6"));
		});
		$("#7").click(function(){
			$("#7").click(myFunction("7"));
		});
		$("#8").click(function(){
			$("#8").click(myFunction("8"));
		});
		$("#9").click(function(){
			$("#9").click(myFunction("9"));
		});
		$("#0").click(function(){
			$("#0").click(myFunction("0"));
		});
		$("#limpar").click(function(){
			$("#limpar").click(myFunction("-1"));
		});
	});
</script>

<!-- Concatena cada número informado pelo usuário para então formar o número de matrícula. -->
<!-- OBS: Falta mostrar esses números na caixa de texto, e então passá-los para o controlador. -->
<script>
	function myFunction(new_number){
		//matricula = matricula + new_number;
		if (new_number==-1){
			cont=0;
			matricula="";
			$(function(){
				$('#matField').val(matricula);
			});
		}else {
			if(cont<=2){
				matricula = matricula + new_number;
				$(function(){
					$('#matField').val(matricula);
				});
			}else if(cont==3){
				matricula=matricula+"."+new_number;
				$(function(){
					$('#matField').val(matricula);
				});
			}else if ((cont>3)&&(cont<=5)){
				matricula = matricula + new_number;
				$(function(){
					$('#matField').val(matricula);
				});
			}else if(cont==6){
				matricula=matricula+"."+new_number;
				$(function(){
					$('#matField').val(matricula);
				});
			}else if ((cont>6)&&(cont<=8)){
				matricula = matricula + new_number;
				$(function(){
					$('#matField').val(matricula);
				});
			}else if(cont==9){
				matricula=matricula+"-"+new_number;
				$(function(){
					$('#matField').val(matricula);
				});
			}else if ((cont>9)&&(cont<=10)){
				matricula = matricula + new_number;
				$(function(){
					$('#matField').val(matricula);
				});
			}
			cont++;
		}

	}
</script>

<?php endif; ?>













