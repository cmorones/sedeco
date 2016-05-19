<?php

class PermisosController extends Controller
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
				'actions'=>array('create','update','permisos','Desactivar','reqTest01','ReqTest02'),
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
		$model=new Permisos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Permisos']))
		{
			$model->attributes=$_POST['Permisos'];
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Permisos']))
		{
			$model->attributes=$_POST['Permisos'];
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
		public function actionIndex()
	{
		
		$model = CatPerfiles::model()->findAll((array(
    //'condition'=>"id_trimestre=$id_trim and partida=$id_partida  and id_periodo=$id_periodo",
    //'order'=>'id desc'
	)));



$titulo = "Privilegios por Perfil";
//$titulo = "Informe por Presupuesto 2014";

/*$url = "http://132.248.152.124/spdgm/index.php/apiIng/ing?id_ejercicio=$id_ejercicio&id_trim=$id_trim&id_tipo=$id_tipo";
//$url = $baseUrl;
$data = file_get_contents($url);
$model= CJSON::decode($data);*/

//echo $model;
$this->render('index', array(
			'model'=>$model,
			'titulo'=>$titulo));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Permisos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Permisos']))
			$model->attributes=$_GET['Permisos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Permisos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Permisos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Permisos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='permisos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

		public function actionPermisos($id)
	{
		
		$menus_principales = Menus::model()->findAll("parent_id=0");
		//echo $this->renderPartial('_permisos', array('menus_principales'=>$menus_principales, 'id_persona'=>$_GET['id_persona'], 'nombre'=>$_GET['nombre']), false, true);

		$this->render('_permisos',array('menus_principales'=>$menus_principales,'id_perfil'=>$id));
	}

	public function actionDesactivar($id_menu, $id_perfil)
	{
		
	//	$privilegio = Permisos::model()->find("id_menu=:id_menu AND id_perfil=:id_perfil", array(":id_menu" => $id_menu, ":id_perfil" => $id_perfil));
      //      if(!empty($privilegio)){
		//echo $this->renderPartial('_permisos', array('menus_principales'=>$menus_principales, 'id_persona'=>$_GET['id_persona'], 'nombre'=>$_GET['nombre']), false, true);

		$this->render('_opcion',array('id_menu'=>$id_menu,'id_perfil'=>$id_perfil));
//	}
	}

	public function actionReqTest01() {
		$id_menu= $_GET['id_menu'];
		$id_perfil= $_GET['id_perfil'];

    $privilegio = Permisos::model()->find("id_menu=:id_menu AND id_perfil=:id_perfil", array(":id_menu" => $id_menu, ":id_perfil" => $id_perfil));
     if(!empty($privilegio)){
     	$privilegio->delete();
     }

	echo CHtml::ajaxButton('Activar',
		Yii::app()->createUrl('permisos/reqTest02',array('id_menu'=>$id_menu,'id_perfil'=>$id_perfil)),
		array(
		'dataType' => 'html',
		'type' => 'get',
		'update' => '#req_res'.$id_menu.'',
		
		), // ajax
		 array(
                                    //coloco la clase que quiero que tenga el boton y listo
                                    'class'=>'btn btn-success',
                                    "onclick"=>"if (!confirm('Permitir Acceso?\\r\\nEsta opcion aparecera en el menu principal.')){return}",
                                )
		); 

	Yii::app()->end();
}

public function actionReqTest02() {

		$id_menu= $_GET['id_menu'];
		$id_perfil= $_GET['id_perfil'];

    $sql = "SELECT * from menus where id=$id_menu"; 
	$menu = Yii::app()->db->createCommand($sql)->queryRow();


	//if($menu[parent_id]==0){

	$q = "INSERT INTO permisos (id_menu,id_perfil) values($menu[id],$id_perfil)";
	$cmd = Yii::app()->db->createCommand($q);

	/*}else {

		 $sql = "SELECT TOP 1 id from permisos where id_menu=$menu[parent_id]"; 
		$menup = Yii::app()->db->createCommand($sql)->queryRow();

		$q = "INSERT INTO permisos (id_menu,id_perfil,parent_id,label,position,link,bloq) values($menu[id],$id_perfil,$menup[id],'$menu[label]',$menu[position],'$menu[link]',0)";
	$cmd = Yii::app()->db->createCommand($q);

	}*/


 $cmd->execute();



	

	
	echo CHtml::ajaxButton('Deshabilitar',
		Yii::app()->createUrl('permisos/reqTest01',array('id_menu'=>$id_menu,'id_perfil'=>$id_perfil)),
		array(
		'dataType' => 'html',
		'type' => 'get',
		'update' => '#req_res'.$id_menu.'',
		 
		), // ajax
		array(
		                                    //coloco la clase que quiero que tenga el boton y listo
		                                    'class'=>'btn btn-danger',
		                                    "onclick"=>"if (!confirm('Estas seguro?\\r\\nNo se mostrara en el menu de este perfil.')){return}",
		                                )
		); // script
	Yii::app()->end();


}

}
