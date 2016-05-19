<?php
/* @var $this HomePrincipalController */
/* @var $model HomePrincipal */

$this->breadcrumbs=array(
	'Home Principals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List HomePrincipal', 'url'=>array('index')),
	array('label'=>'Create HomePrincipal', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#home-principal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="page-header">
  <h2>Sección Principal</h2>
</div>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'home-principal-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'titulo',
		'subtutulo',
		'nombre_btn',
		'archivo',
		'activo',
		//'fecha_reg',
		/*
		'fecha_mod',
		'user_reg',
		'user_mod',
		*/
		array
(
    'class'=>'CButtonColumn',
    'template'=>'{update}',
)
	),
)); ?>
