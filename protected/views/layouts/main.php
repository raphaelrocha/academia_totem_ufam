<?php /* @var $this Controller */
date_default_timezone_set(Yii::app()->params['academiaTimeZone']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="pt-br" />
		<link href='http://fonts.googleapis.com/css?family=Black+Ops+One' rel='stylesheet' type='text/css'>
		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
<![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<?php $tipo = Yii::app()->user->getState('TIPO'); ?>


	<body>

		<div class="container" id="page">

			<div class="span-24" id="header">
				<div class="span-4" id="imagelogo"> <a href="http://www.ufam.edu.br/"><img src="images/ufam.png" width="91px"></a> </div>
				<div class="span-14" id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
				<div class="span-4" id="imagelogo"> <a href="http://www.icomp.ufam.edu.br/"><img src="images/icomp.png" width="165px" height="78px"></a> </div>
			</div><!-- header -->

			<div class="span-5 last">
				<?php if (!Yii::app()->user->isGuest):?>
				<div id="hi">

					<i><a href="index.php?r=/site/logout" >Fechar</a><br></i>

					<br/>
					<!------------------------------------------------->

					<script type="text/javascript">

						var digital = new Date(); // crio um objeto date do javascript
						//digital.setHours(15,59,56); // caso não queira testar com o php, comente a linha abaixo e descomente essa
						digital.setHours(<?php echo date("H,i,s"); ?>); // seto a hora usando a hora do servidor
						<!--
							function clock() {
							var hours = digital.getHours();
							var minutes = digital.getMinutes();
							var seconds = digital.getSeconds();
							digital.setSeconds( seconds+1 ); // aquin que faz a mágica
							// acrescento zero
							if (minutes <= 9) minutes = "0" + minutes;
							if (seconds <= 9) seconds = "0" + seconds;

							dispTime = hours + ":" + minutes + ":" + seconds;
							document.getElementById("clock").innerHTML = dispTime; // coloquei este div apenas para exemplo
							setTimeout("clock()", 1000); // chamo a função a cada 1 segundo

						}

						window.onload = clock;
						//-->

					</script>
					<!-- coloquei este div apenas para exemplo //-->
					<font size="4">
						<?php
						$getDia = new Calendario;
						$timestamp = mktime(date("H")-4, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
						$data_hora = gmdate("d/m/Y H:i:s", $timestamp);
						list($data, $hora) = split(' ',$data_hora);
						echo $getDia->getDiaFormatado()."<br/>";
						echo $data
						?>
						<div id="clock"></div>
					</font>
					<!------------------------------------------------->


				</div>
				<?php endif; ?>


				<div id="mainmenu">

				</div><!-- mainmenu -->
			</div>

			<div class="span-19">
				<?php echo $content; ?>
			</div>

			<div class="clear"></div>

			<div id="footer">
				© ICOMP - Instituto de Computação <br/>
				Desenvolvido no contexto da disciplina ICC410 - 2014/02
			</div><!-- footer -->

		</div><!-- page -->

	</body>
</html>
