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
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
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
		$this->render('index');
	}
    
    public function actionInfografia()
	{
		$dataProvider=new CActiveDataProvider('Infografia');
		$this->render('infografia',array(
			'dataProvider'=>$dataProvider,
		));

		//$this->render('infografia');
	}


	public function actionPresent()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('presentacion');
	}

		public function actionMain($id)
	{

		$sql = "SELECT id,id_ind from historico_periodos  where id_ind=$id and autorizado=1"; 
       	$id_periodo = Yii::app()->db->createCommand($sql)->queryRow();


		if($id==72){
			$sql = "SELECT id,id_ind from historico_periodos  where id_ind=71 and autorizado=1"; 
        	$id_periodo = Yii::app()->db->createCommand($sql)->queryRow();

		}elseif($id==78){
			$sql = "SELECT id,id_ind from historico_periodos  where id_ind=77 and autorizado=1"; 
        	$id_periodo = Yii::app()->db->createCommand($sql)->queryRow(); 

		}elseif($id==84){
			$sql = "SELECT id,id_ind from historico_periodos  where id_ind=77 and autorizado=1"; 
        	$id_periodo = Yii::app()->db->createCommand($sql)->queryRow(); 

		}elseif($id==125){
			$sql = "SELECT id,id_ind from historico_periodos  where id_ind=124 and autorizado=1"; 
        	$id_periodo = Yii::app()->db->createCommand($sql)->queryRow(); 

		}
			
		
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		


        if($id_periodo['id']!=''){

        	//saco el modelo de la vista
			$sql_m = "SELECT modelo from menus  where id=".$id_periodo['id_ind']; 
        	$ind_modelo = Yii::app()->db->createCommand($sql_m)->queryRow();
        	$modelo = $ind_modelo['modelo'];
        	//si hay modelo busco si hay datos insertados
        	if($modelo){
        		$sql_d = "SELECT count(id) as d from $modelo where periodo_id=".$id_periodo['id']; 
        		$ind_datos = Yii::app()->db->createCommand($sql_d)->queryRow();
        	}

        	if($ind_datos['d']>0){
				if ($id==1){
					$this->render('index');
				} else {
					$this->render('page'.$id.'',array('id'=>$id,'id_p'=>$id_periodo['id'], 'modelo'=>$modelo));
				}
			}else{
				$this->render('error_datos'); 
			}
		}else{

			$sql_m = "SELECT modelo from menus  where id=".$id; 
        	$model = Yii::app()->db->createCommand($sql_m)->queryRow();

			if($model['modelo']=='resumen'){
				if ($id==1){
					$this->render('index');
				} else {
					$this->render('page'.$id.'',array('id'=>$id,'id_p'=>$id_periodo['id'], 'modelo'=>$ind_datos['modelo']));
				}
			}else{
				$this->render('error_periodos'); 
			}

		}
		
	}
        public function actionMain2($id)
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		if ($id==1){
			$this->render('index');
		} else {
			$this->render('page'.$id.'',array('id'=>$id));
		}
		
	}

	
	public function actionGrafico($id)
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$sql = "SELECT id,id_ind from historico_periodos  where id_ind=$id and autorizado=1"; 
       	$id_periodo = Yii::app()->db->createCommand($sql)->queryRow();

		if ($id==1){
			$this->render('index');
		} else {
		
		if($id_periodo['id']>0){			
			$this->render('grafico'.$id.'',array('id'=>$id));
		}else {
			$this->render('error_periodos'); 
		}
		
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
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */


public function menuadmin($perfil){
//select menus.label as label, menus.link as link  from menus, permisos where menus.id=permisos.id_menu and permisos.id_perfil=1;


 $q = "SELECT m.id, m.label, m.link, p.id_menu 
  		     FROM menus m, permisos p 
  		     where m.id=p.id_menu and m.parent_id=0 and p.id_perfil=$perfil   
		     order by m.position";
$cmd = Yii::app()->db->createCommand($q);
$resultado = $cmd->queryAll();

  $json =array();


	foreach ($resultado as $row) {

			

			$sql = "SELECT count(m.id) as contador 
  		     FROM menus m, permisos p 
  		     where m.id=p.id_menu and m.parent_id=$row[id_menu] and p.id_perfil=$perfil";
				$cuenta = Yii::app()->db->createCommand($sql)->queryRow();


        if($cuenta['contador']>0){
        	//echo "cuenta vale 0";
			$json[] = array(
				'label'=>$row["label"], 
				'url'=> array(
					$row["link"],
					),
				'items'=>$this->menunivel2($perfil,$row["id_menu"]),
			);
		}else {

			$json[] = array(
				'label'=>$row["label"], 
				'url'=> array(
					$row["link"],
					),
			  // 'items'=>0,//$this->menunivel2($perfil,$row["id_menu"]),
			
			);
		}


	}

	

	return $json;  
			
}

public function menunivel2($perfil,$id_menu){



		 $q = "SELECT m.id, m.label, m.link, p.id_menu 
  		     FROM menus m, permisos p 
  		     where m.id=p.id_menu and m.parent_id=$id_menu and p.id_perfil=$perfil   
		     order by m.position";
			$cmd = Yii::app()->db->createCommand($q);
			$resultado = $cmd->queryAll();






	foreach ($resultado as $key => $row) {

		
		$sql = "SELECT count(m.id) as contador 
  		     FROM menus m, permisos p 
  		     where m.id=p.id_menu and m.parent_id=$row[id_menu] and p.id_perfil=$perfil";
				$cuenta = Yii::app()->db->createCommand($sql)->queryRow();


        if($cuenta['contador']>0){
        	//echo "cuenta vale 0";
			$json[] = array(
				'label'=>$row["label"], 
				'url'=> array(
					$row["link"],
					),
				'items'=>$this->menunivel2($perfil,$row["id_menu"]),
			);
		}else {

			$json[] = array(
				'label'=>$row["label"], 
				'url'=> array(
					$row["link"],
					),
			  // 'items'=>0,//$this->menunivel2($perfil,$row["id_menu"]),
			
			);
		}
	 
	
}

return $json;
}



public function actionLogin()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'r
		//error_reporting(0);
		$model=new LoginForm;

		$this->layout='login';

		//Yii::app()->theme = 'abound';

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
				$baseUrl = Yii::app()->params['baserecm'];
				$baseUrl2 = YiiBase::getPathOfAlias("webroot");
				//$url = $this->menuadmin($perfil);
				//$fh = fopen($baseUrl2.'/static/menuf'. $perfil .'.json', 'w')
     			//	 or die("Error al abrir fichero de salida");
				//fwrite($fh, json_encode($this->menuadmin($perfil),JSON_UNESCAPED_UNICODE));
				//fclose($fh);


               

				//$menus= $baseUrl2.'/static/menuf.json';


				//$datos = file_get_contents($menus);


               
          	   //$menucache = json_decode($datos);

                //print_r($menucache);
                //die();
       		   
				

				//$menucache = Permisos::model()->getMenuItems(0, false, $perfil);
				
				
				//Yii::app()->cache->set("Menus",$menucache,3600*24*365);
				$this->redirect(array('main/index'));
			}
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
}