<?php

class RecmController extends Controller
{
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'r
		
		$model=new LoginForm;

		$this->layout='login';

		Yii::app()->theme = 'abound';

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
			if($model->validate() && $model->login()){
				    $perfil = Yii::app()->user->perfil;
				   	$menucache = Permisos::model()->getMenuItems(0, false, $perfil);
				//	Yii::app()->cache->set("Menus",$menucache,3600*24*365);
				    $this->redirect(array('main/index'));
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}


}