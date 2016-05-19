<?php

class MenusController extends Controller
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','nuevoMenu','editarMenu','borrarMenu','actualizarMenu'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Menus;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menus']))
		{
			$model->attributes=$_POST['Menus'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
	public function actionUpdate2($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menus']))
		{
			$model->attributes=$_POST['Menus'];
			if($model->save())


				$link = $_POST['Menus']['link'];
	
			



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
	public function actionIndex()
	{
        $this->layout='main2';
		
        $menus_principales= Menus::model()->findAll('nivel=0 ORDER BY position');
		$this->render('index',array(
			'menus_principales'=>$menus_principales,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Menus('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Menus']))
			$model->attributes=$_GET['Menus'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Menus the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Menus::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Menus $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menus-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionNuevoMenu()
	{
        $model=new Menus;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Menus']))
		{
                    $model->attributes=$_POST['Menus'];
                    if(isset($_GET['nivel'])){
                        $model->nivel=$_GET['nivel'];
                    }
                    else{
                        $model->nivel=0;
                    }
                    if(isset($_GET['parent_id'])){
                        $model->parent_id=$_GET['parent_id'];
                    }
                    else{
                        $model->parent_id=0;
                    }
                    if($model->save()){
                        echo 'EXITO!!!';
                        DIE;
                    }
            }
            if(!isset($_GET['nivel'])){
                echo $this->renderPartial('_formMenuPrincipal', array('model'=>$model), false, true);
            }
            else if($_GET['nivel']==1){
                echo $this->renderPartial('_formMenu1', array('model'=>$model, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==2){
                echo $this->renderPartial('_formMenu2', array('model'=>$model, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==3){
                echo $this->renderPartial('_formMenu3', array('model'=>$model, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==4){
                echo $this->renderPartial('_formMenu4', array('model'=>$model, 'parent_id'=>$_GET['parent_id']), false, true);
            }
                
	}
        
	public function actionEditarMenu()
	{
            $model=$this->loadModel($_GET['id']);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
            if(isset($_POST['Menus']))
            {
                $model->attributes=$_POST['Menus'];
                if($model->save()){
                	$link = $_POST['Menus']['link'];
                	$label = $_POST['Menus']['label'];
                	$position = $_POST['Menus']['position'];

                	$baseUrl2 = YiiBase::getPathOfAlias("webroot");
                	$fh = fopen($baseUrl2.'/static/menus.json', 'w')
     				 or die("Error al abrir fichero de salida");
						fwrite($fh, json_encode($this->menuadmin(),JSON_UNESCAPED_UNICODE));
					fclose($fh);

                	/*$q = "UPDATE permisos set link='$link',label='$label',position='$position'   WHERE id_menu=$model->id";
					$cmd = Yii::app()->db->createCommand($q);
					//echo $cmd->getText();
					$resultado = $cmd->query();*/
                    echo 'EXITO!!!';
                    DIE;
                }
            }
            if(!isset($_GET['nivel'])){
                echo $this->renderPartial('_formMenuPrincipal', array('model'=>$model), false, true);
            }
            else if($_GET['nivel']==1){
                echo $this->renderPartial('_formMenu1', array('model'=>$model, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==2){
                echo $this->renderPartial('_formMenu2', array('model'=>$model, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==3){
                echo $this->renderPartial('_formMenu3', array('model'=>$model, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==4){
                echo $this->renderPartial('_formMenu4', array('model'=>$model, 'parent_id'=>$_GET['parent_id']), false, true);
            }
	}
        
	public function actionBorrarMenu()
	{
            $this->loadModel($_GET['id'])->delete();
                    echo 'BORRADO!!!';
	}
        
        public function actionActualizarMenu()
	{
            if(!isset($_GET['nivel'])){
                $menus_principales= Menus::model()->findAll('nivel=0 ORDER BY id');
                echo $this->renderPartial('_MenuPrincipal', array('menus_principales'=>$menus_principales), false, true);
            }
            else if($_GET['nivel']==1){
                $menus_nivel1= Menus::model()->findAll('nivel=1  AND parent_id= '. $_GET["parent_id"] .'  ORDER BY id');
                echo $this->renderPartial('_Menu1', array('menus_nivel1'=>$menus_nivel1, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==2){
                $menus_nivel2= Menus::model()->findAll('nivel=2  AND parent_id= '. $_GET["parent_id"] .'  ORDER BY id');
                echo $this->renderPartial('_Menu2', array('menus_nivel2'=>$menus_nivel2, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==3){
                $menus_nivel3= Menus::model()->findAll('nivel=3  AND parent_id= '. $_GET["parent_id"] .'  ORDER BY id');
                echo $this->renderPartial('_Menu3', array('menus_nivel3'=>$menus_nivel3, 'parent_id'=>$_GET['parent_id']), false, true);
            }
            else if($_GET['nivel']==4){
                $menus_nivel4= Menus::model()->findAll('nivel=4  AND parent_id= '. $_GET["parent_id"] .'  ORDER BY id');
                echo $this->renderPartial('_Menu4', array('menus_nivel4'=>$menus_nivel4, 'parent_id'=>$_GET['parent_id']), false, true);
            }
	}

	public function menuadmin(){

$this->layout=false;

$resultado = Menus::model()->findAll((array(
    'condition'=>'activar_site=1 and nivel=1',
    'order'=>'position'
	)));





	foreach ($resultado as $key => $row) {

		if( !isset($json[$row["label"]])): 
			$json[$row["label"]] = array(
				
				'label'=> $row->label,
				'url'=> $row->id,

			
	          	);

			/*$json[$row["label"]]['items']['Resumen'] = array(
				
				'label'=> 'Resumen',
				'url'=> $row->id,
			
	          	);*/
			
	    endif;

		$resultado2 = Menus::model()->findAll((array(
		    'condition'=>'activar_site=1 and nivel=2 and parent_id='.$row->id.'',
		    'order'=>'position'
			)));




			foreach ($resultado2 as $key2 => $row2) {

				
				if( !isset($json['items'][$row2["label"]])):

				$json[$row["label"]]['items']['Resumen'] = array(
				
				'label'=> 'Resumen',
				'url'=> $row->id,
			
	          	);
	          	 
				$json[$row["label"]]['items'][$row2["label"]] = array(
				
				'label'=> $row2->label,
				'url'=> $row2->id,
			
	          	);
	    endif;


			}


		
		

		 
	
}


return $json;
}
}
