<?php

class Ap1Ind73HistController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'preview','previo'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'validar'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
  
     public function actionView($id) {
        $registros= Ap1Ind1::model()->findAll("id_periodo=:id_periodo", array(":id_periodo"=>$id));
        
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'registros' => $registros,
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
    public function actionPrevio($id)
    {
        $perfil = Yii::app()->user->perfil;
        $autoriza=$this->mostrarAutorizar($perfil,1,2,4);
        $model=Ap1Ind73Hist::model()->findByPk($id);

        $this->render('_previo',array(
            'model'=>$model,
            'id'=>$id,
            'autoriza'=>$autoriza,
        ));
    }
    
    public function actionPreview($id) {
        $registros= Ap1ind1::model()->findAll("id_periodo=:id_periodo", array(":id_periodo"=>$id));
        /*$criteria= new CDbCriteria;
        $criteria->select="entidad";
        $criteria->group="entidad";
        $criteria->addCondition("id_periodo=".$id);
        $entidades= Ap1ind1::model()->findAll($criteria);*/
        $criteria= new CDbCriteria;
        $criteria->select="municipio";
        $criteria->group="municipio";
        $criteria->addCondition("id_periodo=".$id);
        $municipios= Ap1ind1::model()->findAll($criteria);
        $criteria= new CDbCriteria;
        $criteria->select="actividad";
        $criteria->group="actividad";
        $criteria->addCondition("id_periodo=".$id);
        $criteria->order="MIN(id)";
        $actividades= Ap1ind1::model()->findAll($criteria);
        $array= array();
        foreach($actividades as $actividad){
            foreach($registros as $registro){
                if($registro->actividad==$actividad->actividad){
                    /*if(empty($registro->municipio)){
                        $registro->municipio= "09 Distrito federal";
                    }*/
                    $array[$actividad->actividad][$registro->municipio]=$registro->valor;
                }
            }
            //echo $actividad->actividad."<br />";
        }
        $totales= array();
        foreach($registros as $registro){
            if(!isset($totales[$registro->municipio])){
                $totales[$registro->municipio]=$registro->valor;
            }else{
                $totales[$registro->municipio]+=$registro->valor;
            }
        }
        //var_dump($array);die;
        
        $this->render('preview', array(
            'model' => $this->loadModel($id),
            'municipios' => $municipios,
            'actividades' => $actividades,
            'array' => $array,
            'totales' => $totales,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $layout = '//layouts/column2';
        $model = new Ap1Ind73Hist;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Ap1Ind73Hist'])) {
            $model->attributes = $_POST['Ap1Ind73Hist'];
            $model->_archivo = CUploadedFile::getInstance($model, '_archivo');
            $model->fecha_reg = date("Y-m-d");
            $model->user_reg = 1;
            $model->validado = 0;
            $model->autorizado = 0;
            $model->activo = 0;
            if ($model->validate()) {
                if (!empty($model->_archivo)) {
                    $posicion = strrpos($model->_archivo->name, '.');
                    $nombre_arc = substr($model->_archivo->name, 0, $posicion) . '_' . time() . substr($model->_archivo->name, $posicion);
                    $model->_archivo->saveAs(Yii::app()->basePath . '/../indicadores/' . $nombre_arc);
                    $model->_archivo = $nombre_arc;
                }
                if ($model->save()) {
                    Yii::import('ext.phpexcelreader.JPhpExcelReader');
                    $data = new JPhpExcelReader(Yii::app()->basePath . '/../indicadores/' . $nombre_arc);
                    //$data->dump($row_numbers=false,$col_letters=false,$sheet=0,$table_class='excel')
                    //define datos del examen


                    $rows = $data->rowcount($sheet_index = 0);
                    $cols = $data->colcount($sheet_index = 0);
                    /* echo $rows;
                      echo $cols;
                      echo max(count($data->sheets[$sheet_index]['cells']) - 1, 0);
                      die; */
                    for ($i = 1; $i <= $rows; $i++) {
                        $registro = new Ap1ind1;
                        $registro->entidad = $data->val($i, 1);
                        $registro->municipio = $data->val($i, 2);
                        $registro->actividad = $data->val($i, 3);
                        $registro->valor = $data->val($i, 4);
                        $registro->id_periodo = $model->id;
                        $registro->save();
                    }
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        $model->periodo= utf8_encode($model->periodo);
        //$model->titulo= utf8_encode($model->titulo);

        if (isset($_POST['Ap1Ind73Hist'])) {
            $model->attributes = $_POST['Ap1Ind73Hist'];
            $model->_archivo = CUploadedFile::getInstance($model, '_archivo');
            $model->fecha_reg = date("Y-m-d");
            $model->user_reg = 1;
            $model->validado = 0;
            $model->autorizado = 0;
            $model->activo = 0;
            if ($model->validate()) {
                if (!empty($model->_archivo)) {
                    $posicion = strrpos($model->_archivo->name, '.');
                    $nombre_arc = substr($model->_archivo->name, 0, $posicion) . '_' . time() . substr($model->_archivo->name, $posicion);
                    $model->_archivo->saveAs(Yii::app()->basePath . '/../indicadores/' . $nombre_arc);
                    $model->_archivo = $nombre_arc;
                }
                if ($model->save()) {
                    if (!empty($model->_archivo)) {
                        Yii::import('ext.phpexcelreader.JPhpExcelReader');
                        $data = new JPhpExcelReader(Yii::app()->basePath . '/../indicadores/' . $nombre_arc);
                        //$data->dump($row_numbers=false,$col_letters=false,$sheet=0,$table_class='excel')
                        //define datos del examen


                        $rows = $data->rowcount($sheet_index = 0);
                        $cols = $data->colcount($sheet_index = 0);
                        /* echo $rows;
                          echo $cols;
                          echo max(count($data->sheets[$sheet_index]['cells']) - 1, 0);
                          die; */
                        for ($i = 1; $i <= $rows; $i++) {
                            $registro = new Ap1ind1;
                            $registro->entidad = $data->val($i, 1);
                            $registro->municipio = $data->val($i, 2);
                            $registro->actividad = $data->val($i, 3);
                            $registro->valor = $data->val($i, 4);
                            $registro->id_periodo = $model->id;
                            $registro->save();
                        }
                    }
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $criteria = new CDbCriteria();

        $item_count = Ap1Ind73Hist::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize(10);
        $pages->applyLimit($criteria);  // the trick is here!

        $model= Ap1Ind73Hist::model()->findAll($criteria);
        
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
    public function actionAdmin() {
        $model = new Ap1Ind73Hist('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ap1Ind73Hist']))
            $model->attributes = $_GET['Ap1Ind73Hist'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Ap1Ind73Hist the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Ap1Ind73Hist::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Ap1Ind73Hist $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ap1ind1-hist-jorge-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionValidar($id){
        $model= $this->loadModel($id);
        $model->validado=!$model->validado;
        $model->update();
        $this->redirect(array('index'));
    }
    
    public function actionAutorizar($id){
        $model= $this->loadModel($id);
        $model->autorizado=!$model->autorizado;
        $model->update();
        $this->redirect(array('index'));
    }
    
    public function actionActivar($id){
        $model= $this->loadModel($id);
        $model->activo=!$model->activo;
        $model->update();
        $this->redirect(array('index'));
    }

}
