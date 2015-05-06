<?php

class SiteController extends Controller
{

	/**
	* Declares class-based actions.
	*/

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	* This is the default 'index' action that is invoked
	* when an action is not explicitly requested by users.
	*/
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if(!Yii::app()->user->isGuest){
			$model=new RegEntradaForm;
			if(isset($_POST['RegEntradaForm'])){
				$model->attributes=$_POST['RegEntradaForm'];
				$porteiro = new RegistraEntrada();
				$verificaMarcacao = $porteiro->gravaEntrada($model->matricula);
				if($verificaMarcacao == true){
					$this->render('registraEntrada',array('model'=>$model,'sinal'=>1));
				}else{
					$this->render('registraEntrada',array('model'=>$model,'sinal'=>2));
				}
			}else{
				$this->render('registraEntrada',array('model'=>$model,'sinal'=>0));
			}
		}
		else{
			//echo 'nÃ£o esta logado';
			$this->redirect('index.php?r=site/login');
		}
	}

	/**
	* This is the action to handle external exceptions.
	*/
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	* Displays the contact page
	*/


	/**
	* Displays the login page
	*/
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect('index.php?r=site/index');//redireciona para a tela principal apÃ³s o login.

		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	* Logs out the current user and redirect to homepage.
	*/
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/*
	Garante que a tela de configuraÃ§Ã£o nÃ£o serÃ¡ acessada por usuÃ¡rios nÃ£o logados.
	*/






}
