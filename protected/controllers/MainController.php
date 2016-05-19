<?php

class MainController extends Controller
{

		public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','admin2'),
				'users'=>array('admin','admin2'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->layout='main2';
		//Yii::app()->theme = 'abound';
		
		$this->render('index');
	}

	public function actionPrivilegios()
	{
		
		$menus_principales = Menu::model()->findAll("parent_id=0");
		//echo $this->renderPartial('_permisos', array('menus_principales'=>$menus_principales, 'id_persona'=>$_GET['id_persona'], 'nombre'=>$_GET['nombre']), false, true);

		$this->render('_permisos',array('menus_principales'=>$menus_principales));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}