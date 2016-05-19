<?php
/* @var $this HistoricoPeriodosController */
/* @var $model HistoricoPeriodos */

$this->breadcrumbs=array(
	'Historico Periodoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HistoricoPeriodos', 'url'=>array('index')),
	array('label'=>'Create HistoricoPeriodos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#historico-periodos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="page-header">
  <h2>Administrar periodos<small> </small></h2>
</div>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'historico-periodos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_ind',
		'nombre',
		'config',
		'titulo1',
		'titulo2',
		/*
		'titulo3',
		'nota1',
		'nota2',
		'nota3',
		'fuente',
		'validado',
		'autorizado',
		'fecha_reg',
		'user_reg',
		'fecha_mod',
		'user_mod',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
