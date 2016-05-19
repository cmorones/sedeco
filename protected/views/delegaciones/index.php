<?php
/* @var $this DelegacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Delegaciones',
);

$this->menu=array(
	array('label'=>'Create Delegaciones', 'url'=>array('create')),
	array('label'=>'Manage Delegaciones', 'url'=>array('admin')),
);
?>

<h1>Delegaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
