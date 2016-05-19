<?php

class InfografiaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','borrar'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$layout='//layouts/main2';
		$model=new Infografia;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Infografia']))
		{
			$baseUrl2 = YiiBase::getPathOfAlias("webroot");
			$model->attributes=$_POST['Infografia'];
			$model->_archivo = CUploadedFile::getInstance($model, '_archivo');
			$model->_archivo2 = CUploadedFile::getInstance($model, '_archivo2');
			
            $model->fecha_reg = date("Y-m-d");
            /*$destino = $baseUrl2.'/analisis/' . $model->_archivo->name;
            copy($_FILES['HomePrincipal']['_archivo'],$destino);
            $uf = CUploadedFile::getInstance($model, '_archivo');*/
            if($model->_archivo->name!='' || $model->_archivo2->name!=''){          
            $model->filename =$model->_archivo->name; 
            $model->alt =$model->_archivo2->name;
            $model->_archivo->saveAs($baseUrl2.'/pdf/'.$model->_archivo->getName());
			$model->_archivo2->saveAs($baseUrl2.'/images/'.$model->_archivo2->getName());
            	
            }      
			if($model->save()){
			$this->redirect(array('admin','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$layout='//layouts/main2';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Infografia']))
		{
			$baseUrl2 = YiiBase::getPathOfAlias("webroot");
			$model->attributes=$_POST['Infografia'];
			$model->_archivo = CUploadedFile::getInstance($model, '_archivo');
			$model->_archivo2 = CUploadedFile::getInstance($model, '_archivo2');
			
			
            $model->fecha_reg = date("Y-m-d");
            /*$destino = $baseUrl2.'/analisis/' . $model->_archivo->name;
            copy($_FILES['HomePrincipal']['_archivo'],$destino);
            $uf = CUploadedFile::getInstance($model, '_archivo');*/
            if($model->_archivo->name!='' and $model->_archivo2->name!=''){           
            $model->filename =$model->_archivo->name; 
            $model->alt =$model->_archivo2->name;
            $model->_archivo->saveAs($baseUrl2.'/static/'.$model->_archivo->getName());
			$model->_archivo2->saveAs($baseUrl2.'/static/'.$model->_archivo2->getName());
            }	      
			if($model->save()){
				$this->redirect(array('admin','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

                if(Yii::app()->request->isPostRequest)
                {
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	}

	


		public function actionBorrar($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Infografia');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout='//layouts/main2';
		$model=new Infografia('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Infografia']))
			$model->attributes=$_GET['Infografia'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Infografia the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Infografia::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Infografia $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='infografia-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
