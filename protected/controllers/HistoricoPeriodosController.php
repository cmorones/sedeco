<?php

class HistoricoPeriodosController extends Controller
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
				'actions'=>array('create','update','main', 'excel','datos','aceptar','desAceptar','validar','desValidar','borrar'),
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
		//$layout = '//layouts/main';
		$this->layout='main2';
		//Yii::app()->theme = 'abound';
        $criteria = new CDbCriteria();
        $criteria->condition = 'id_ind=:id_ind';
		$criteria->params = array(':id_ind'=>$id);

        $item_count = HistoricoPeriodos::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize(10);
        $pages->applyLimit($criteria);  // the trick is here!

        $model= HistoricoPeriodos::model()->findAll($criteria);


        $sql1 = "SELECT modelo, id from menus where id=$id"; 
        $modelo = Yii::app()->db->createCommand($sql1)->queryRow();


        
        $this->render('view', array(
        	'ind' => $modelo['id'],
            'model' => $model,
            'item_count' => $item_count,
            'page_size' => 10,
            'items_count' => $item_count,
            'pages' => $pages,
            'modelo'=>$modelo['modelo']
            
        ));
	}

	public function actionMain($id,$graf_int=0)
	{
		$this->layout='main2';
		//Yii::app()->theme = 'abound';

		//if($id==14 || $id==16){

      
        //$ind = $id;

     


        //}else {


        $sql = "SELECT id_ind from historico_periodos  where id=$id"; 
        $indicador = Yii::app()->db->createCommand($sql)->queryRow();

        $ind = $indicador['id_ind'];

        $sql1 = "SELECT grafico from menus where id=$ind"; 
        $graf = Yii::app()->db->createCommand($sql1)->queryRow();

        $grafico = $graf['grafico'];

       // }


	     //echo $ind ;
		$this->render('_previo' ,array('id'=>$ind, 'ind'=>$ind, 'grafico'=>$grafico,'id_p'=>$id,'graf_int'=>$graf_int,'id_grafico'=>$id));
		
		
	}

	public function actionDatos($id)
	{
		$this->layout='main2';
		//Yii::app()->theme = 'abound';

		$sql = "SELECT id_ind from historico_periodos  where id=$id"; 
        $indicador = Yii::app()->db->createCommand($sql)->queryRow();

        $ind = $indicador['id_ind'];

        $sql1 = "SELECT grafico from menus where id=$ind"; 
        $graf = Yii::app()->db->createCommand($sql1)->queryRow();

        $grafico = $graf['grafico'];

	
		$this->render('_previo' ,array('id'=>$ind, 'ind'=>$ind, 'grafico'=>$grafico));
		
		
	}
      
      


	public function actionExcel($id)
	    {
	     $this->layout='main2';
		//Yii::app()->theme = 'abound';
		//$model=Apa1Ind1Hist::model()->findByPk($id);
		  Yii::import( "xupload.models.XUploadForm" );
		  $uploads = new XUploadForm;
	
		$sql = "SELECT id_ind from historico_periodos  where id=$id"; 
        $indicador = Yii::app()->db->createCommand($sql)->queryRow();

        $ind = $indicador['id_ind'];

		$this->render('_excel',array(
		    //'model'=>$model,
		    'id'=>$id,
		    'uploads'=>$uploads,
		    'ind'=>$ind,
		));
	    }

	 public function mostrarAutorizar()
        {
        $this->layout='main2';

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

         public function mostrarValidar()
        {
        $this->layout='main2';
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

           public function mostrarConfiguracion()
        {
        $this->layout='main2';
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

              public function mostrarNuevoPeriodo()
        {
        //$this->layout='main2';
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

        public function mostrarDatos()
        {
        $this->layout='main2';
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

         public function mostrarExcel()
        {
        $this->layout='main2';
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

 public function estado($id)
        {
        $this->layout='main2';
        $sql = "SELECT autorizado, validado from historico_periodos  where id=$id"; 
        $estado = Yii::app()->db->createCommand($sql)->queryRow();
        $autorizado = $estado['autorizado'];
        $validado = $estado['validado'];


        if ($autorizado==0 and $validado==0) {

            
                $html ='NO VALIDADO';
           
        } 

        if ($autorizado==0 and $validado==1) {

            
                $html ='VALIDADO';
           
        }

        if ($autorizado==1) {

            
                $html ='AUTORIZADO';
           
        }

        return $html;
        }


      public function autorizado($id)
        {

        $sql = "SELECT autorizado from historico_periodos  where id=$id"; 
        $autorizado = Yii::app()->db->createCommand($sql)->queryRow();
        $autorizado = $autorizado['autorizado'];


        if ($autorizado==1) {

            
                $html =true;
           
        } else {

        $html =false;

        }

        return $html;
        }

        public function validado($id)
        {

        $sql = "SELECT validado from historico_periodos  where id=$id"; 
        $validado = Yii::app()->db->createCommand($sql)->queryRow();
        $validado = $validado['validado'];


        if ($validado==1) {

            
                $html =true;
           
        } else {

        $html =false;

        }

        return $html;
        }



          public function hayautorizados($id)
        {

        $sql = "SELECT id from historico_periodos  where id_ind=$id and autorizado=1"; 
        $autorizado = Yii::app()->db->createCommand($sql)->queryRow();
       


        if (is_array($autorizado)) {

            
                $html =true;
           
        } else {

        $html =false;

        }

        return $html;
        }

          public function isValido($id)
        {

        $sql = "SELECT id from historico_periodos  where id=$id and validado=1"; 
        $autorizado = Yii::app()->db->createCommand($sql)->queryRow();
       


        if (is_array($autorizado)) {

            
                $html =true;
           
        } else {

        $html =false;

        }

        return $html;
        }

         public function tienegrafico($ind)
        {

        $sql = "SELECT grafico from menus  where id=$ind"; 
        $menus = Yii::app()->db->createCommand($sql)->queryRow();
        $menus = $menus['grafico'];


        if ($menus==1) {

            $html =true;
           
        } else {

        $html =false;

        }

        return $html;
        }

           public function 	traerIndicador($ind)
        {

        $sql = "SELECT label from menus  where id=$ind"; 
        $nombre = Yii::app()->db->createCommand($sql)->queryRow();
        $nombre = $nombre['label'];


       

        return $nombre;
        }

     


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$this->layout='mainedit';
       // Yii::app()->theme = 'abound';
        $model=new HistoricoPeriodos;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['HistoricoPeriodos']))
		{
			$model->attributes=$_POST['HistoricoPeriodos'];
            $model->id_ind=$id;
             $model->fecha_reg= date("Y\-n\-j H:i:s");
            $model->user_reg = Yii::app()->user->id;

			if($model->save())
				$this->redirect(array('view','id'=>$id));
		}

		$this->render('create',array(
			'model'=>$model,
            'id'=>$id,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)


	{

		error_reporting(0);
		$this->layout='mainedit';
		//Yii::app()->theme = 'abound';

		$sql = "SELECT id_ind from historico_periodos  where id=$id"; 
        $indicador = Yii::app()->db->createCommand($sql)->queryRow();

        $ind = $indicador['id_ind'];

        $sql = "SELECT config from menus  where id=$ind"; 
        $config = Yii::app()->db->createCommand($sql)->queryRow();

        $configuracion = $config['config'];

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);


		$model=$this->loadModel($id);


		if($configuracion==1){

			 $data = CJSON::decode($model->config);
                foreach ($data as $key => $value) {
                        $model->$key = $value;
                    
        		}

		}

		if($configuracion==2){

			 $data = CJSON::decode($model->config);
                foreach ($data as $key => $value) {
                        $model->$key = $value;
                    
        		}

		}

		if($configuracion==3){

			 $data = CJSON::decode($model->config);
                foreach ($data as $key => $value) {
                        $model->$key = $value;
                    
        		}

		}

		if($configuracion==4){

			 $data = CJSON::decode($model->config);
                foreach ($data as $key => $value) {
                        $model->$key = $value;
                    
        		}

		}
		if($configuracion==5){

			 $data = CJSON::decode($model->config);
                foreach ($data as $key => $value) {
                        $model->$key = $value;
                    
        		}

		}
                if($configuracion==6){

			 $data = CJSON::decode($model->config);
                foreach ($data as $key => $value) {
                        $model->$key = $value;
                    
        		}

		}
                
                 if($configuracion==7){

			 $data = CJSON::decode($model->config);
                foreach ($data as $key => $value) {
                        $model->$key = $value;
                    
        		}

		}
                
                if($configuracion==8){

                if($model->config){	
				    $data = CJSON::decode($model->config);
	                foreach ($data as $key => $value) {
	                        $model->$key = $value;
	                    
	        		}
	        	}

		}
                if($configuracion==9){

			 $data = CJSON::decode($model->config);
                foreach ($data as $key => $value) {
                        $model->$key = $value;
                    
        		}

		}




		if(isset($_POST['HistoricoPeriodos']))
		{
            //subida de imagenes
            
            $model->attributes=$_POST['HistoricoPeriodos'];
            $baseUrl2 = YiiBase::getPathOfAlias("webroot");

            $model->_archivo = CUploadedFile::getInstance($model, '_archivo');

            if($model->_archivo->name!=''){
                $model->filename =$model->_archivo->name;
            }else{
                $model->filename =$model->filename2;
            }

            if($model->_archivo->imagen==''){
                $model->imagen="";
            }

             


			//Configuración 1 por Entidades
            if($configuracion==1){

            	foreach ($model->config as $key => $val) {

						$ent[]=intval($val);
				}
				$model->config = CJSON::encode(array('config' => $ent));
			}

			///////////////////////////////

			//Configuración 1 por Anio y Entidades
            if($configuracion==2){

            	foreach ($model->config as $key => $val) {

						$ent[]=intval($val);
				}
				$model->config = CJSON::encode(array('config' => $ent, 'anios_ini'=>$model->anios_ini, 'anios_fin'=>$model->anios_fin));
			}

			///////////////////////////////

			//Configuración 1 por Anio y Entidades
            if($configuracion==3){

            	if(is_array($model->config)){
	            	foreach ($model->config as $key => $val) {

							$ent[]=intval($val);
					}
				}else {
					$ent[]="{}";
				}

				$model->config = CJSON::encode(array('config' => $ent, 'anios_ini'=>$model->anios_ini));
			}

			///////////////////////////////

			//Configuración por rango de años y Entidades
            if($configuracion==4){

            	if(is_array($model->config)){
	            	foreach ($model->config as $key => $val) {

							$ent[]=intval($val);
					}
				}else {
					$ent[]="{}";
				}

					$model->config = CJSON::encode(array('anios_ini'=>$model->anios_ini, 'anios_fin'=>$model->anios_fin));
		}
                //Configuración 1 por Anio y mes y entidad
                if($configuracion==5){

                    foreach ($model->config as $key => $val) {

                                    $ent[]=intval($val);
                    }
                    foreach ($model->mes_ini as $key => $val) {

                                    $mini[]=intval($val);
                    }
                    
                    foreach ($model->mes_fin as $key => $val) {

                                    $mfin[]=intval($val);
                    }
                    $model->config = CJSON::encode(array('config' => $ent, 'mes_ini' => $model->mes_ini, 'mes_fin' => $model->mes_fin, 'anios_ini'=>$model->anios_ini, 'anios_fin'=>$model->anios_fin));
                }


			///////////////////////////////


                if($configuracion==6){

            	if(is_array($model->config)){
                    
	            	foreach ($model->config as $key => $val) {

                                $ent[]=intval($val);
                            }
                            }else {
				$ent[]="{}";
                                
				}

				$model->config = CJSON::encode(array('config' => $ent, 'anios_ini'=>$model->anios_ini, 'anios_fin'=>$model->anios_fin));
			}

			///////////////////////////////
                        
                       if($configuracion==7){

                            if(is_array($model->config)){
                                    foreach ($model->config as $key => $val) {

                                                                    $ent[]=intval($val);
                                                    }
                                            }else {
                                                    $ent[]="{}";
                                            }

                                                    $model->config = CJSON::encode(array('anios_ini'=>$model->anios_ini, 'anios_fin'=>$model->anios_fin));
                        }
                            
                        //Configuración 1 por Anio y mes y entidad
                if($configuracion==8){

                    foreach ($model->config as $key => $val) {

                                    $ent[]=intval($val);
                    }
                    foreach ($model->mes_ini as $key => $val) {

                                    $mini[]=intval($val);
                    }
                    
                    foreach ($model->mes_fin as $key => $val) {

                                    $mfin[]=intval($val);
                    }
                    $model->config = CJSON::encode(array('config' => $ent, 'mes_ini' => $model->mes_ini, 'mes_fin' => $model->mes_fin, 'anios_ini'=>$model->anios_ini, 'anios_fin'=>$model->anios_fin));
                }

                if($configuracion==9){

                    foreach ($model->config as $key => $val) {

                                    $ent[]=intval($val);
                    }
                    foreach ($model->mes_ini as $key => $val) {

                                    $mini[]=intval($val);
                    }
                    
                    foreach ($model->mes_fin as $key => $val) {

                                    $mfin[]=intval($val);
                    }
                    $model->config = CJSON::encode(array('config' => $ent, 'mes_ini' => $mini, 'mes_fin' => $mfin, 'anios_ini'=>$model->anios_ini, 'anios_fin'=>$model->anios_fin));
                }
        
                       
			///////////////////////////////
            $model->fecha_mod = date("Y\-n\-j H:i:s");
            $model->user_mod = Yii::app()->user->id;
            
			if($model->save())
				//print $model->config;

				//die();
               
               if($model->_archivo->name!=''){
                    $model->_archivo->saveAs($baseUrl2.'/uploads/'.$model->_archivo->getName());
                }else{

                }
               $this->redirect(array('view','id'=>$ind));
		}

		$this->render('update',array(
			'model'=>$model,
			'ind'=>$ind,
			'config'=>$configuracion,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionBorrar($id)
	{


	
        $sql = "SELECT id_ind from historico_periodos  where id=$id"; 
        $indicador = Yii::app()->db->createCommand($sql)->queryRow();

        $sql1 = "SELECT modelo, id from menus where id=$indicador[id_ind]"; 
        $modelo = Yii::app()->db->createCommand($sql1)->queryRow();



        if($this->loadModel($id)->delete()){

         $sql = "DELETE from $modelo[modelo] where periodo_id=$id";

         $data = Yii::app()->db->createCommand($sql)->query();

          $this->redirect(array('historicoPeriodos/view/'.$indicador['id_ind']));

    
        }

        /*$sql = "SELECT id_ind from historico_periodos  where id=$id"; 
        $indicador = Yii::app()->db->createCommand($sql)->queryRow();

        $sql_m = "SELECT modelo from menus  where id=".$indicador['id_ind']; 
        $ind_modelo = Yii::app()->db->createCommand($sql_m)->queryRow();
        $modelo = $ind_modelo['modelo'];*/

      
        //$this->redirect(array('view','id'=>$$indicador['id_ind']));
        

     

  
     
    }

	/**
	 * Lists all models.
	 */
	/*public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('HistoricoPeriodos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/



	 public function actionIndex($ind) {

        die();
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new HistoricoPeriodos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['HistoricoPeriodos']))
			$model->attributes=$_GET['HistoricoPeriodos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return HistoricoPeriodos the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=HistoricoPeriodos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param HistoricoPeriodos $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='historico-periodos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAceptar($id)
	{
		

		$model=HistoricoPeriodos::model()->findByPk($id);

		$model->autorizado=1;

		if($model->update())
				$this->redirect(array('historicoPeriodos/main/'.$id));
		

	
		
		
		
	}

	public function actionDesAceptar($id)
	{
		

		$model=HistoricoPeriodos::model()->findByPk($id);

		$model->autorizado=0;

		if($model->update())
				$this->redirect(array('historicoPeriodos/main/'.$id));
		

	
		
		
		
	}

	public function actionValidar($id)
	{
		

		$model=HistoricoPeriodos::model()->findByPk($id);

		$model->validado=1;

		if($model->update())
				$this->redirect(array('historicoPeriodos/main/'.$id));
		

	
		
		
		
	}

	public function actionDesValidar($id)
	{
		

		$model=HistoricoPeriodos::model()->findByPk($id);

		$model->validado=0;

		if($model->update())
				$this->redirect(array('historicoPeriodos/main/'.$id));
		

	
		
		
		
	}
}
