<?php
/* @var $this Ap3Ind2aController */
/* @var $model Ap3Ind2a */

$this->breadcrumbs=array(
	'Ap3 Ind2as'=>array('index'),
	'Manage',
);

//variable de sesion y periodo activo
$id = Yii::app()->request->getQuery('id');

$this->menu=array(
	//array('label'=>'List Ap9Ind2', 'url'=>array('index')),
	array('label'=>'Agregar', 'url'=>array('create?id='.$id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ap3-ind2a-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="page-header">
  <h2>Administrar datos de este periodo</h2>
</div>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ap3-ind2a-grid',
	'dataProvider'=>$model->search($id),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
            'name'=>'trimestre',
            
            //'filter'=>HistoricoPeriodos::model()->estados,
            'htmlOptions'=>array('style'=>'width: 80px;  text-align:center;'),
                    ),
		array(
            'name'=>'anio',
            
            //'filter'=>HistoricoPeriodos::model()->estados,
            'htmlOptions'=>array('style'=>'width: 80px;  text-align:center;'),
                    ),
		array(
            'name'=>'rubro',
            'value'=>'HistoricoPeriodos::model()->getRelacion($data->rubro,"ap3Ind2a")',
            'htmlOptions'=>array('style'=>'width:120px;  text-align:center;'),
                    ),
		array(
            'name'=>'pea',
            
            //'filter'=>HistoricoPeriodos::model()->estados,
            'htmlOptions'=>array('style'=>'width: 80px;  text-align:center;'),
                    ),
		array(
            'name'=>'po',
            
            //'filter'=>HistoricoPeriodos::model()->estados,
            'htmlOptions'=>array('style'=>'width: 80px;  text-align:center;'),
                    ),
		/*
		'pdes',
		'fecha_reg',
		'fecha_mod',
		'user_reg',
		'user_mod',
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
		            'url'=>'Yii::app()->createUrl("ap3Ind2a/borrar", array("id"=>$data->id))',
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