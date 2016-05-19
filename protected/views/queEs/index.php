<?php
/* @var $this QueEsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Que Es',
);

$this->menu=array(
	array('label'=>'Create QueEs', 'url'=>array('create')),
	array('label'=>'Manage QueEs', 'url'=>array('admin')),
);
?>

<h1>Que Es</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
