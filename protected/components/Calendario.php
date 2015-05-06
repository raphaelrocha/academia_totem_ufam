<?php
class Calendario{

	public function getDia()
	{
		date_default_timezone_set(Yii::app()->params['academiaTimeZone']);
		$date = new DateTime();
		$ano = $date->format('Y');
		$mes = $date->format('m');
		$dia = $date->format('d');
		$nomeDia = date("D", mktime(0, 0, 0, $mes, $dia, $ano));
		$nomeDiaPtb;
		if($nomeDia=="Mon"){
			return "segunda";
		}else if($nomeDia=="Tue"){
			return "terca";
		}else if($nomeDia=="Wed"){
			return "quarta";
		}else if($nomeDia=="Thu"){
			return "quinta";
		}else if($nomeDia=="Fri"){
			return "sexta";
		}else if($nomeDia=="Sat"){
			return "sabado";
		}else if($nomeDia=="Sun"){
			return "domingo";
		}else{
			return "falhou";
		}
	}
	public function getDiaFormatado()
	{
		date_default_timezone_set(Yii::app()->params['academiaTimeZone']);
		$date = new DateTime();
		$trata = new TrataString;
		$ano = $date->format('Y');
		$mes = $date->format('m');
		$dia = $date->format('d');
		$nomeDia = date("D", mktime(0, 0, 0, $mes, $dia, $ano));
		$nomeDiaPtb;
		if($nomeDia=="Mon"){
			//return $trata->converte("Segunda-Feira");
			return "Segunda Feira";
		}else if($nomeDia=="Tue"){
			//return $trata->converte("Terça-Feira");
			return "Terça-Feira";
		}else if($nomeDia=="Wed"){
			//return $trata->converte("Quarta-Feira");
			return "Quarta-Feira";
		}else if($nomeDia=="Thu"){
			//return $trata->converte("Quinta-Feira");
			return "Quinta-Feira";
		}else if($nomeDia=="Fri"){
			//return $trata->converte("Sexta-Feira");
			return "Sexta-Feira";
		}else if($nomeDia=="Sat"){
			//return $trata->converte("Sábado");
			return "Sábado";
		}else if($nomeDia=="Sun"){
			//return $trata->converte("Domingo");
			return "Domingo";
		}else{
			return "falhou";
		}
	}
}
