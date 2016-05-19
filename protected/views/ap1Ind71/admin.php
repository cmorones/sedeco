<?php
/* @var $this Ap1Ind71Controller */
/* @var $model Ap1Ind71 */

$this->breadcrumbs=array(
	'Ap1 Ind71s'=>array('index'),
	'Manage',
);

//variable de sesion y periodo activo
$id = Yii::app()->request->getQuery('id');

$this->menu=array(
	//array('label'=>'List Ap9Ind2', 'url'=>array('index')),
	array('label'=>'Agregar', 'url'=>array('create?id='.$id)),
);


?>

<div class="page-header">
  <h2>Administrar Datos de este periodo</h2>
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php 
	error_reporting(0);
	$this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ap1-ind71-grid',
	'dataProvider'=>$model->search($id),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
            'name'=>'entidad',
             'value'=>'HistoricoPeriodos::model()->getEntidad($data->entidad)',
            //'filter'=>HistoricoPeriodos::model()->estados,
            'htmlOptions'=>array('style'=>'width: 80px;  text-align:center;'),
                    ),
		array(
            'name'=>'valor',
            
            //'filter'=>HistoricoPeriodos::model()->estados,
            'htmlOptions'=>array('style'=>'width: 80px;  text-align:center;'),
                    ),
		array(
            'name'=>'anio',
            
            'filter'=>HistoricoPeriodos::model()->anios,
            'htmlOptions'=>array('style'=>'width: 80px;  text-align:center;'),
                    ),
		array(
            'name'=>'mes',
            
            'filter'=>HistoricoPeriodos::model()->meses,
            'htmlOptions'=>array('style'=>'width: 80px;  text-align:center;'),
                    ),

		/*'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
		'columna',
		'periodo_id',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{borrar}',
		    'buttons'=>array
		    (
		        'borrar' => array
		        (
		            'label'=>'',
		            'imageUrl'=>Yii::app()->request->baseUrl.'/images/incorrecto.png',
		            'url'=>'Yii::app()->createUrl("ap1Ind71/borrar", array("id"=>$data->id))',
		            'options' => array(
		            'confirm'=>'Estas seguro de eliminar?',
		            ),
		        ),
		),
	),
),
)); ?>
<div id="sidebar">
    <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'Operations',
            ));
            $this->widget('zii.widgets.CMenu', array(
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();
    ?>
</div>
