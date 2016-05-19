<?php

class Ap1Ind3HistController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

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
				'actions'=>array('create','update','excel','previo','grafico'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
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

	  public function actionPrevio($id)
    {
        $perfil = Yii::app()->user->perfil;
        $autoriza=$this->mostrarAutorizar($perfil,1,2,4);
        $model=Ap1Ind3Hist::model()->findByPk($id);
       // $baseUrl = YiiBase::getPathOfAlias("webroot");
        $url = "http://localhost/recm/index.php/api2/ap1Ind2b?id=$id";
        //$url = $baseUrl;
        $data = file_get_contents($url);
        $model= CJSON::decode($data);

        $this->render('_previo',array(
            'model'=>$model,
            'id'=>$id,
            'autoriza'=>$autoriza,
            'model'=>$model,
        ));
    }

        public function actionGrafico($id)
    {
        $this->render('_grafico',array(
            'model'=>$this->loadModel($id),
        ));
    }

       public function mostrarAutorizar()
        {

        $arg_list = func_get_args();
        $perfil=$arg_list[0];
        //$id_reporte=$arg_list[0];

        unset($arg_list[0]);
        //unset($arg_list[1]);
        $arg_list =array_values($arg_list);

        if (in_array($perfil,$arg_list)) {

            
                $html =true;
           
        } else {

        $html =false;

        }

        return $html;
        }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Ap1Ind2aHist;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ap1Ind2aHist']))
		{
			$model->attributes=$_POST['Ap1Ind2aHist'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionExcel($id)
    {
        //$model=Apa1Ind1Hist::model()->findByPk($id);
          Yii::import( "xupload.models.XUploadForm" );
          $uploads = new XUploadForm;
        

        $this->render('_excel',array(
            //'model'=>$model,
            'id'=>$id,
            'uploads'=>$uploads,
        ));
    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ap1Ind2aHist']))
		{
			$model->attributes=$_POST['Ap1Ind2aHist'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	   public function actionIndex() {

        $layout = '//layouts/main';
        $criteria = new CDbCriteria();

        $item_count = Ap1Ind3Hist::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize(10);
        $pages->applyLimit($criteria);  // the trick is here!

        $model= Ap1Ind3Hist::model()->findAll($criteria);
        
        $this->render('index', array(
            'model' => $model,
            'item_count' => $item_count,
            'page_size' => 10,
            'items_count' => $item_count,
            'pages' => $pages,
        ));
    }




	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ap1Ind2aHist('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ap1Ind2aHist']))
			$model->attributes=$_GET['Ap1Ind2aHist'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ap1Ind2aHist the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ap1Ind2aHist::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ap1Ind2aHist $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ap1-ind2a-hist-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
